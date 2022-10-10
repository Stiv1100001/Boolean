<?php

include_once __DIR__ . "./ProductInCart.php";

class Cart
{
    private array $productsInCarts;

    public function __construct()
    {
        $this->productsInCarts = [];
    }

    /**
     * Summary of addProductToCart
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function addProductToCart(Product $product, int $quantity): void
    {
        $finded = false;

        foreach ($this->productsInCarts as $productInCart) {
            if ($productInCart->getProduct()->getId() == $product->getId()) {
                $productInCart->setQuantity($productInCart->getQuantity() + $quantity);
                $finded = true;
            }
        }

        if (!$finded) {
            $newProduct = new ProductInCart($product, $quantity);
            array_push($this->productsInCarts, $newProduct);
        }
    }

    /**
     * Summary of removeProductToCart
     * @param int $id
     * @return void
     */
    public function removeProductToCart(int $id): void
    {
        $this->setProductQuantityById($id, 0);
    }

    /**
     * Summary of setProductQuantityById
     * @param int $id
     * @param int $quantity
     * @return void
     */
    public function setProductQuantityById(int $id, int $quantity): void
    {
        if ($quantity > 0) {
            foreach ($this->productsInCarts as $productInCart) {
                if ($productInCart->getProduct()->getId() == $id) {
                    $productInCart->setQuantity($quantity);
                }
            }
        } elseif ($quantity == 0) {
            $newProductsInCart = [];
            
            foreach ($this->productsInCarts as $productInCart) {
                if ($productInCart->getProduct()->getId() != $id) {
                    array_push($newProductsInCart, $productInCart);
                }
            }

            $this->productsInCarts = $newProductsInCart;
        } else {
            throw new Exception("Quantity must be a positive integer", 1);
        }
    }

    
    /**
     *  Get all prducts in cart
     * @return array of Product
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * Get total price of cart
     * @return float
     */
    public function getTotal(): float
    {
        $total = 0.0;

        foreach ($this->productsInCarts as $productInCart) {
            $total += $productInCart->getProduct()->getPrice() * $productInCart->getQuantity();
        }

        return $total;
    }
}
