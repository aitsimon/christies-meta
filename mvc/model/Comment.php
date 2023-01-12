<?php

class Comment
{
    public int $comment_id;
    public string $content;
    public string $date;
    public int $object_id;
    public int $user_id;

    /**
     * @param int $comment_id
     * @param string $content
     * @param string $date
     * @param int $object_id
     * @param int $user_id
     */
    public function __construct(int $comment_id, string $content, string $date, int $object_id, int $user_id)
    {
        $this->comment_id = $comment_id;
        $this->content = $content;
        $this->date = $date;
        $this->object_id = $object_id;
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->comment_id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getObjectId(): int
    {
        return $this->object_id;
    }

    /**
     * @param int $object_id
     */
    public function setObjectId(int $object_id): void
    {
        $this->object_id = $object_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }


}