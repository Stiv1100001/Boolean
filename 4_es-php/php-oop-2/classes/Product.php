<?php

class Product
{
    private int $id;
    private string $name;
    private string $category;
    private float $price;


    /**
     * Constructor
     * @param string $name Product's name
     * @param string $category Product's category
     * @param float $price Product's price
     */
    public function __construct(int $id, string $name, string $category, float $price)
    {
        $this->id = $id;
        $this->price = $price;
        $this->name = $name;
        $this->category = $category;
    }

    
    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
    
    /**
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
