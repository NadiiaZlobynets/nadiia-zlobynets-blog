<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Author;

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
     * @return \Nadiiaz\Blog\Model\Author\Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setAuthorId(1)
                ->setAuthor('Nadiiaz')
                ->setPostsIds([1, 2, 5]),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setAuthor('Vladp')
                ->setPostsIds([3]),
            3 => $this->makeEntity()
                ->setAuthorId(3)
                ->setAuthor('Marinah')
                ->setPostsIds([4, 6]),
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
     * @return array
     */
    public function getPostsIds(): array
    {
        return $this->posts;
    }


    /**
     * @param array $posts
     * @return $this
     */
    public function setPostsIds(array $posts): Entity
    {
        $this->posts = $posts;

        return $this;
    }


    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}