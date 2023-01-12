<?php

class Purchase
{
    public int $purch_id;
    public string $date;
    public int $object_id;
    public int $user_id;

    /**
     * @param int $purch_id
     * @param string $date
     * @param int $object_id
     * @param int $user_id
     */
    public function __construct(int $purch_id, string $date, int $object_id, int $user_id)
    {
        $this->purch_id = $purch_id;
        $this->date = $date;
        $this->object_id = $object_id;
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getPurchId(): int
    {
        return $this->purch_id;
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