<?php

declare(strict_types=1);

function blogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Lifestyle',
            'url'         => 'lifestyle',
            'posts'    => [1, 2, 3],
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Travelling',
            'url'         => 'travelling',
            'posts'    => [3, 4, 5],
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Skills',
            'url'         => 'skills',
            'posts'    => [2, 4, 6],
        ]
    ];
}

function blogGetPost(): array
{
    return [
        1 => [
            'post_id'  => 1,
            'name'        => 'Post 1',
            'url'         => 'post-1',
            'text'        => 'Post 1 Description',
            'date'        =>  date("d-m-Y", 1633424400),
            'author'        =>  'nadiiaz'
        ],
        2 => [
            'post_id'  => 2,
            'name'        => 'Post 2',
            'url'         => 'post-2',
            'text' => 'Post 2 Description',
            'date'       => date("d-m-Y", 1667642400),
            'author'        =>  'nadiiaz'
        ],
        3 => [
            'post_id'  => 3,
            'name'        => 'Post 3',
            'url'         => 'post-3',
            'text' => 'Post 3 Description',
            'date'       => date("d-m-Y", 1642845600),
            'author'        =>  'nadiiaz'
        ],
        4 => [
            'post_id'  => 4,
            'name'        => 'Post 4',
            'url'         => 'post-4',
            'text' => 'Post 4 Description',
            'date'       => date("d-m-Y", 1643018400),
            'author'        =>  'nadiiaz'
        ],
        5 => [
            'post_id'  => 5,
            'name'        => 'Post 5',
            'url'         => 'post-5',
            'text' => 'Post 5 Description',
            'date'       => date("d-m-Y", 1637920800),
            'author'        =>  'nadiiaz'
        ],
        6 => [
            'post_id'  => 6,
            'name'        => 'Post 6',
            'url'         => 'post-6',
            'text' => 'Post 6 Description',
            'date'       => date("d-m-Y", 1648288800),
            'author'        =>  'nadiiaz'
        ]
    ];
}

function blogGetCategoryPost(int $categoryId): array
{
    $categories = blogGetCategory();

    if(!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId doesn't exist");
    }
    $postsForCategory = [];
    $posts = blogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])){
            throw new InvalidArgumentException("Post with ID $postId doesn't exist");
        }
        $postsForCategory[] = $posts[$postId];
    }
    return $postsForCategory;
}

function blogGetCategoryByUrl(string $url)
{
    $data = array_filter(blogGetCategory(),
        static function($category) use ($url){
        return $category['url'] === $url;
        }
    );
    return array_pop($data);
}

function blogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetPost(),
        static function($post) use ($url){
        return $post['url'] === $url;
    }
    );
    return array_pop($data);
}