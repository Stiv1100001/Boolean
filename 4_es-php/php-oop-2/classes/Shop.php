<?php

include_once __DIR__ . "./Product.php";
include_once __DIR__ . "./User.php";

class Shop
{
    private array $products = [];

    public function __construct(array $products = null)
    {
        if ($products) {
            $this->products = $products;
        }
    }

  
    /**
     * Get all products
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProduct(Product $product): void
    {
        array_push($this->products, $product);
    }

    public function removeProductById($id): void
    {
        $newProducts = [];
        
        foreach ($this->products as $product) {
            if ($product->getId() != $id) {
                array_push($newProducts, $product);
            }
        }

        $this->products = $newProducts;
    }
}
