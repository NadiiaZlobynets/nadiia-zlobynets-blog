<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Author;

class Entity
{
    private int $authorId;

    private string $url;

    private string $author;

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

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): Entity
    {
        $this->author = $author;

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
}
