<?php

declare(strict_types=1);

namespace Nadiiaz\Install\Command;

use Nadiiaz\Blog\Model\Category\Repository as CategoryRepository;
use Nadiiaz\Blog\Model\Post\Repository as PostRepository;
use Nadiiaz\Blog\Model\Author\Repository as AuthorRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateData extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'install:generate-data';

    private \Nadiiaz\Framework\Database\Adapter\AdapterInterface $adapter;

    private OutputInterface $output;

    private const POSTS_COUNT = 250;

    private const AUTHORS_COUNT = 100;

    private const MAX_POSTS_PER_AUTHOR = 20;

    /**
     * @param \Nadiiaz\Framework\Database\Adapter\AdapterInterface $adapter
     * @param string|null $name
     */
    public function __construct(
        \Nadiiaz\Framework\Database\Adapter\AdapterInterface $adapter,
        string $name = null
    ) {
        parent::__construct($name);
        $this->adapter = $adapter;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generate demo data for blog testing');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->generateData();
        $output->writeln('Completed!');

        return self::SUCCESS;
    }

    /**
     * Generate test data
     *
     * @return void
     */
    private function generateData(): void
    {
        $this->profile([$this, 'truncateTables']);
        $this->profile([$this, 'generateCategories']);
        $this->profile([$this, 'generatePosts']);
        $this->profile([$this, 'generatePostCategories']);
        $this->profile([$this, 'generateAuthors']);
        $this->profile([$this, 'generatePostAuthors']);
        $this->profile([$this, 'generateDailyStatistics']);
    }


    /**
     * Truncate (empty) tables before inserting new data
     *
     * @return void
     */
    private function truncateTables(): void
    {
        $tables = [
            PostRepository::TABLE_CATEGORY_POST,
            'author_post',
            'author',
            'daily_statistics',
            CategoryRepository::TABLE,
            PostRepository::TABLE,
        ];
        $connection = $this->adapter->getConnection();
        $connection->query('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            $connection->query("TRUNCATE TABLE `$table`");
            $this->output->writeln("Truncated table: $table");
        }

        $connection->query('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Insert seven categories. Add data to random 5 of them
     *
     * @return void
     */
    private function generateCategories(): void
    {
        $categories = [
            'Lifestyle', 'Travelling', 'Skills', 'Sports', 'DIY', 'Finance', 'Business'
        ];
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category (`name`, `url`)
                VALUES (:name, :url);
            SQL);

        foreach ($categories as $category) {
            $statement->bindValue(':name', $category);
            $statement->bindValue(':url', strtolower($category));
            $statement->execute();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generatePosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO post (`name`, `url`, `description`, `date`)
                VALUES (:name, :url, :description, :date);
            SQL);

        for ($i = 1; $i <= self::POSTS_COUNT; $i++) {
            $name = "Post $i";
            $url = str_replace(' ', '_', strtolower($name));
            $statement->bindValue(':name', $name);
            $statement->bindValue(':url', $url);
            $statement->bindValue(':description', "$name short description text");
            $statement->bindValue(':date', date('Y-m-d', random_int(1633046400, 1635724800)));
            $statement->execute();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generatePostCategories(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category_post (`category_id`, `post_id`)
                VALUES (:category_id, :post_id);
            SQL);
        // Get only 5 random categories of total 7
        $categoryIds = array_rand(array_flip(range(1, 7)), 5);

        for ($i = 1; $i <= self::POSTS_COUNT; $i++) {
            if (random_int(1, 3) === 1) {
                continue;
            }

            $postCategories = (array) array_rand(array_flip($categoryIds), random_int(1, 5));

            foreach ($postCategories as $categoryId) {
                $statement->bindValue(':category_id', $categoryId);
                $statement->bindValue(':post_id', $i);
                $statement->execute();
            }
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generateAuthors(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO `author` (`author_id`, `firstname`, `lastname`, `url`, `description`)
                VALUES (:author_id, :firstname, :lastname, :url, :description);
            SQL);

        for ($i = 1; $i <= self::AUTHORS_COUNT; $i++) {
            $statement->bindValue(':author_id', $i);
            $statement->bindValue(':firstname', $firstname = $this->getRandomName());
            $statement->bindValue(':lastname', $lastname = $this->getRandomLastName());
            $url = str_replace(' ', '_', strtolower($firstname . ' ' . $lastname));
            $statement->bindValue(':url', $url);
            $statement->bindValue(':description', "short description text");
            $statement->execute();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generatePostAuthors(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO author_post (`author_id`, `post_id`)
                VALUES (:author_id, :post_id);
            SQL);

        for ($authorId = 1; $authorId <= self::AUTHORS_COUNT; $authorId++) {
            $totalAuthorPosts = random_int(1, self::MAX_POSTS_PER_AUTHOR);

            for ($i = 0; $i < $totalAuthorPosts; $i++) {
                $postId = random_int(1, self::POSTS_COUNT);
                $statement->bindValue(':author_id', $authorId);
                $statement->bindValue(':post_id', $postId);
                $statement->execute();
            }
        }
    }


    /**
     * @return void
     * @throws \Exception
     */
    private function generateDailyStatistics(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO daily_statistics (`post_id`, `date`, `views`)
                VALUES (:post_id, :date, :views);
            SQL
            );

        for ($i = 1; $i <= self::POSTS_COUNT; $i++) {
            $statement->bindValue(':post_id', $i);
            $statement->bindValue(':date', date('Y-m-d', random_int(1633046400, 1635724800)));
            $statement->bindValue(':views', random_int(0, 1000000));
        }
    }

    /**
     * @return void
     */
    private function getRandomName(): string
    {
        static $randomNames = [
            'Norbert','Damon','Laverna','Annice','Brandie','Emogene','Cinthia','Magaret','Daria','Ellyn','Rhoda',
            'Debbra','Reid','Desire','Sueann','Shemeka','Julian','Winona','Billie','Michaela','Loren','Zoraida',
            'Jacalyn','Lovella','Bernice','Kassie','Natalya','Whitley','Katelin','Danica','Willow','Noah','Tamera',
            'Veronique','Cathrine','Jolynn','Meridith','Moira','Vince','Fransisca','Irvin','Catina','Jackelyn',
            'Laurine','Freida','Torri','Terese','Dorothea','Landon','Emelia'
        ];

        return $randomNames[array_rand($randomNames)];
    }

    private function getRandomLastName(): string
    {
        static $randomLastNames = [
            'Anderson','Klein','Payne','Bourne','Stanton','Brennan','Morrison','Wallace','Price','Kim','Mclean',
            'Lang','Reese','Osborne','Townsend','Porter','Mccarthy','Obrien','Carlson','Williamson','Spencer','Lee',
            'Parsons','Hammond','Peters','Tucker','Byrd','Whitley','Fisher','Nelson','Willow','Bush','Armstrong',
            'Campos','Sherman','Coates','Meridith','Hopkins','Vince','Whittle','Ferguson','West','Thompson',
            'Chadwick','Jackson','Watts','Maxwell','Hunt','Mccormick','Huff'
        ];

        return $randomLastNames[array_rand($randomLastNames)];
    }

    /**
     * @param callable $callback
     * @return void
     */
    private function profile(callable $callback): void
    {
        $start = microtime(true);
        $callback();
        $totalTime = number_format(microtime(true) - $start, 4);
        $this->output->writeln("Executing <info>$callback[1]</info> took <info>$totalTime</info>");
    }
}
