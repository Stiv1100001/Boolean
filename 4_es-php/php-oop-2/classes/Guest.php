<?php

include_once __DIR__ . "./User.php";

/**
 * Summary of Guest
 */
class Guest extends User
{
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        parent::__construct("Guest", "Guest");
    }

    public function pay(): bool
    {
        if ($this->card == null || $this->billingAddress == null) {
            throw new ErrorException("Missing payment info");
        } else {
            return parent::pay();
        }
    }
}
