<?php

class Category
{
    public int $cat_id;
    public string $name;
    public string $description;
    public string $img;
    public $upper_cat_id;

    /**
     * @param $cat_id
     * @param $name
     * @param $description
     * @param $img
     */
    public function __construct($cat_id, $name, $description, $img, $upper_cat_id)
    {
        $this->cat_id = $cat_id;
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->upper_cat_id = $upper_cat_id ?? null;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }


    public function getUpperCatId()
    {
        return $this->upper_cat_id;
    }

    public function setUpperCatId($upper_cat_id): void
    {
        $this->upper_cat_id = $upper_cat_id;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

}