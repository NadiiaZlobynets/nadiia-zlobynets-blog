<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Author;

class Entity
{
    private int $authorId;

    private string $authorUrl;

    private string $authorName;

    private array $posts;

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId(int $authorId): Entity
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @param string $author
     */
    public function setAuthorName(string $authorName): Entity
    {
        $this->authorName = $authorName;

        return $this;
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
     * @return string
     */
    public function getAuthorUrl(): string
    {
        return $this->authorUrl;
    }

    /**
     * @param string $authorUrl
     * @return Entity
     */
    public function setAuthorUrl(string $authorUrl): Entity
    {
        $this->authorUrl = $authorUrl;

        return $this;
    }
}
