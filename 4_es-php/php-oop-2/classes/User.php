<?php

require_once __DIR__ . "./Card.php";
require_once __DIR__ . "./Cart.php";

abstract class User
{
    protected string $username;
    protected string $password;
    protected ?Card $card;
    protected Cart $cart;
    protected ?string $billingAddress;

    /**
     * Summary of __construct
     * @param string $username
     * @param string $password
     * @param string|null $billingAddress
     * @param Card|null $card
     */
    public function __construct(string $username, string $password, string $billingAddress = null, Card $card = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->billingAddress = $billingAddress;

        if ($card) {
            $this->card = $card;
        }

        $this->cart = new Cart();
    }
    
    /**
    * Pay for bought products
    * @return bool
    */
    public function pay(): bool
    {
        return !$this->card->isExpired();
    }

    /**
     * Get User's username
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * get user's card
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * Get Cart amount
     * @return float
     */
    public function getCartTotal(): float
    {
        return $this->cart->getTotal();
    }
    
    /**
     *
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     *
     * @return string
     */
    public function getBillingAddress(): string
    {
        return $this->billingAddress;
    }
    
    /**
     *
     * @param string $billingAddress
     * @return User
     */
    public function setBillingAddress(string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
}
