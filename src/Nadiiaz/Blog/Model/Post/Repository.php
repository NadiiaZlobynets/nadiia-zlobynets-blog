<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Post;

class Repository
{
    private \DI\FactoryInterface $factory;

    public const TABLE = 'post';

    public const TABLE_CATEGORY_POST = 'category_post';

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()->setPostId(1)
                ->setName('Post 1')
                ->setUrl('post-1')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1633424400)
                ->setAuthorId(1)
                ->setAuthor('Nadiiaz')
                ->setAuthorPostsUrl('nadiiaz'),
            2 => $this->makeEntity()->setPostId(2)
                ->setName('Post 2')
                ->setUrl('post-2')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1667642400)
                ->setAuthorId(2)
                ->setAuthor('Vladp')
                ->setAuthorPostsUrl('vladp'),
            3 => $this->makeEntity()->setPostId(3)
                ->setName('Post 3')
                ->setUrl('post-3')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1642845600)
                ->setAuthorId(2)
                ->setAuthor('Vladp')
                ->setAuthorPostsUrl('vladp'),
            4 => $this->makeEntity()->setPostId(4)
                ->setName('Post 4')
                ->setUrl('post-4')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1643018400)
                ->setAuthorId(3)
                ->setAuthor('Mariiah')
                ->setAuthorPostsUrl('mariiah'),
            5 => $this->makeEntity()->setPostId(5)
                ->setName('Post 5')
                ->setUrl('post-5')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1637920800)
                ->setAuthorId(1)
                ->setAuthor('Nadiiaz')
                ->setAuthorPostsUrl('nadiiaz'),
            6 => $this->makeEntity()->setPostId(6)
                ->setName('Post 6')
                ->setUrl('post-6')
                ->setDescription('Lorem ipsum dolor sit amet')
                ->setDate(1648288800)
                ->setAuthorId(3)
                ->setAuthor('Mariiah')
                ->setAuthorPostsUrl('mariiah'),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
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
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getByIds(array $postIds): array
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
    }

    /**
     * @return Entity
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
