<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Post;

class Repository
{
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()->setPostId(1)
                ->setName('Post 1')
                ->setUrl('post-1')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1633424400)
                ->setAuthor('Nadiiaz'),
            2 => $this->makeEntity()->setPostId(2)
                ->setName('Post 2')
                ->setUrl('post-2')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1667642400)
                ->setAuthor('Nadiiaz'),
            3 => $this->makeEntity()->setPostId(3)
                ->setName('Post 3')
                ->setUrl('post-3')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1642845600)
                ->setAuthor('Vladp'),
            4 => $this->makeEntity()->setPostId(4)
                ->setName('Post 4')
                ->setUrl('post-4')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1643018400)
                ->setAuthor('Marinah'),
            5 => $this->makeEntity()->setPostId(5)
                ->setName('Post 5')
                ->setUrl('post-5')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1637920800)
                ->setAuthor('Nadiiaz'),
            6 => $this->makeEntity()->setPostId(6)
                ->setName('Post 6')
                ->setUrl('post-6')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1648288800)
                ->setAuthor('Marinah'),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIds
     * @return Entity[]
     */
    public function getByIds(array $postIds)
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
    }
    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
