<?php

declare(strict_types=1);

function blogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Lifestyle',
            'url'         => 'lifestyle',
            'posts'    => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Travelling',
            'url'         => 'travelling',
            'posts'    => [3, 4, 5]
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Skills',
            'url'         => 'skills',
            'posts'    => [2, 4, 6]
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
            'text' => 'Post 1 Description',
            'date'       => 10.09
        ],
        2 => [
            'post_id'  => 2,
            'name'        => 'Post 2',
            'url'         => 'post-2',
            'text' => 'Post 2 Description',
            'date'       => 1.08
        ],
        3 => [
            'post_id'  => 3,
            'name'        => 'Post 3',
            'url'         => 'post-3',
            'text' => 'Post 3 Description',
            'date'       => 8.05
        ],
        4 => [
            'post_id'  => 4,
            'name'        => 'Post 4',
            'url'         => 'post-4',
            'text' => 'Post 4 Description',
            'date'       => 21.02
        ],
        5 => [
            'post_id'  => 5,
            'name'        => 'Post 5',
            'url'         => 'post-5',
            'text' => 'Post 5 Description',
            'date'       => 15.03
        ],
        6 => [
            'post_id'  => 6,
            'name'        => 'Post 6',
            'url'         => 'post-6',
            'text' => 'Post 6 Description',
            'date'       => 20.08
        ]
    ];
}