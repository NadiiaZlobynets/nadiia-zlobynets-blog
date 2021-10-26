<?php
declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Category;

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
            1 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Lifestyle')
                ->setUrl('lifestyle')
                ->setPostsIds([1, 2, 3]),
            2 => $this->makeEntity()
                ->setCategoryId(2)
                ->setName('Travelling')
                ->setUrl('travelling')
                ->setPostsIds([3, 4, 5]),
            3 => $this->makeEntity()
                ->setCategoryId(3)
                ->setName('Skills')
                ->setUrl('skills')
                ->setPostsIds([2, 4, 6]),
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
            static function ($category) use ($url) {
                return $category->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
