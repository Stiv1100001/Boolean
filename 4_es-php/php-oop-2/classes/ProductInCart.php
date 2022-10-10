<?php

include_once __DIR__ . "./Product.php";

class ProductInCart
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->quantity = $quantity;
        $this->product = $product;
    }

    /**
     *
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
    
    /**
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     *
     * @param int $quantity
     * @return ProductInCart
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}
