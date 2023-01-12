<?php

class Virtual_Object
{
    public int $object_id;
    public string $name;
    public string $lat;
    public string $lon;
    public float $price;
    public string $img1;
    public string $img2;
    public string $img3;

    /**
     * @param int $object_id
     * @param string $name
     * @param string $lat
     * @param string $lon
     * @param float $price
     * @param string $img1
     * @param string $img2
     * @param string $img3
     */
    public function __construct(int $object_id, string $name, string $lat, string $lon, float $price, string $img1, string $img2='NULL', string $img3='NULL')
    {
        $this->object_id = $object_id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->price = $price;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
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
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLon(): string
    {
        return $this->lon;
    }

    /**
     * @param string $lon
     */
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

    /**
     * @return string
     */
    public function getImg2(): string
    {
        return $this->img2;
    }

    /**
     * @param string $img2
     */
    public function setImg2(string $img2): void
    {
        $this->img2 = $img2;
    }

    /**
     * @return string
     */
    public function getImg3(): string
    {
        return $this->img3;
    }

    /**
     * @param string $img3
     */
    public function setImg3(string $img3): void
    {
        $this->img3 = $img3;
    }

}