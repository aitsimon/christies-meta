<?php

class Virtual_Object
{
    public int $object_id;
    public string $name;
    public  $lat;
    public  $lon;
    public float $price;
    public string $img1;
    public $img2;
    public $img3;
    public int $cat_id;

    public function __construct(int $object_id, string $name,  $lat=NULL,  $lon=NULL, float $price, string $img1,  $img2=NULL,  $img3=NULL, $cat_id)
    {
        $this->object_id = $object_id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->price = $price;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->cat_id = $cat_id;
    }

    /**
     * @return int
     */
    public function getObjectId(): int
    {
        return $this->object_id;
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
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }


    public function getLat()
    {
        return $this->lat;
    }


    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLon(string $lon): void
    {
        $this->lon = $lon;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getImg1(): string
    {
        return $this->img1;
    }

    /**
     * @param string $img1
     */
    public function setImg1(string $img1): void
    {
        $this->img1 = $img1;
    }


    public function getImg2()
    {
        return $this->img2;
    }


    public function setImg2(string $img2): void
    {
        $this->img2 = $img2;
    }


    public function getImg3()
    {
        return $this->img3;
    }

    public function setImg3(string $img3): void
    {
        $this->img3 = $img3;
    }

}