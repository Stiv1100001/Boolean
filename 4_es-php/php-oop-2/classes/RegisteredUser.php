<?php

include_once __DIR__ . "./User.php";

/**
 * Summary of RegisteredUser
 */
class RegisteredUser extends User
{
    private float $discount = 0.2;
    
    /**
     * Summary of __construct
     * @param string $username
     * @param string $password
     * @param string $billingAddress
     * @param Card $card
     */
    public function __construct(string $username, string $password, string $billingAddress, Card $card)
    {
        parent::__construct($username, $password, $billingAddress, $card);
    }

    /**
     * Get discounted cart's amount
     * @return float
     */
    public function getCartTotal(): float
    {
        $cartTotal = parent::getCartTotal();
        return $cartTotal -= $cartTotal * $this->discount;
    }
}
