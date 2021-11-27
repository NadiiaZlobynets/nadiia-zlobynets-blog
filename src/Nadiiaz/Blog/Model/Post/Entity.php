<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Model\Post;

class Entity
{
    private int $postId;

    private string $name;

    private string $url;

    private string $description;

    private int $date;

    private string $author;

    private int $authorId;

    private string $authorPostsUrl;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): Entity
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Entity
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return $this
     */
    public function setDate(int $date): Entity
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): Entity
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Entity
     */
    public function setAuthorId(int $authorId): Entity
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorPostsUrl(): string
    {
        return $this->authorPostsUrl;
    }

    /**
     * @param string $authorPostsUrl
     * @return Entity
     */
    public function setAuthorPostsUrl(string $authorPostsUrl): Entity
    {
        $this->authorPostsUrl = $authorPostsUrl;

        return $this;
    }
}
