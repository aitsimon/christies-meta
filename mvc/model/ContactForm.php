<?php

class ContactForm
{
    public int $id;
    public string $name;
    public string $email;
    public string $content;
    public string $date;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $content
     * @param string $date
     */
    public function __construct(int $id, string $name, string $email, string $content, string $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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


}