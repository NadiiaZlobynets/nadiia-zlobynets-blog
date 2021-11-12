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
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setAuthorId(1)
                ->setAuthorName('Nadiiaz')
                ->setAuthorUrl('nadiiaz')
                ->setPostsIds([1, 2, 5]),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setAuthorName('Vladp')
                ->setAuthorUrl('vladp')
                ->setPostsIds([3]),
            3 => $this->makeEntity()
                ->setAuthorId(3)
                ->setAuthorName('Marinah')
                ->setAuthorUrl('mariiah')
                ->setPostsIds([4, 6]),
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
                return $post->getAuthorUrl() === $url;
            }
        );
        return array_pop($data);
    }

    /**
     * @param array $authorIds
     * @return Entity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getByAuthorId(array $authorIds): array
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($authorIds)
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
