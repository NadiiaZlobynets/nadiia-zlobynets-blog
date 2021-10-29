<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Block;

use Nadiiaz\Blog\Model\Category\Entity as CategoryEntity;

class CategoryList extends \Nadiiaz\Framework\View\Block
{
    private \Nadiiaz\Blog\Model\Category\Repository $categoryRepository;

    protected string $template = '../src/Nadiiaz/Blog/view/category_list.php';

    /**
     * @param \Nadiiaz\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(\Nadiiaz\Blog\Model\Category\Repository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryEntity[]
     */
    public function getCategories(): array
    {
        return $this->categoryRepository->getList();
    }
}
