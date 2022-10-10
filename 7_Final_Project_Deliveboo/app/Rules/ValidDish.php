<?php

namespace App\Rules;

use App\Model\Dish;
use Illuminate\Contracts\Validation\Rule;

class ValidDish implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         // recupero il prodotto dall'id se esiste e se è disponibile mandamelo altrimenti dammi il messaggio non esiste
        if(Dish::find($value)){
            return true;
        }
            return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Il prodotto non esiste';
    }
}
