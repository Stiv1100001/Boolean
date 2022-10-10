<?php

namespace App\Http\Requests\Orders;

use App\Rules\ValidDish;
use Illuminate\Foundation\Http\FormRequest;


class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * qui mi creo la richiesta per il pagamento
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'dish' =>   [
                'required',
                new ValidDish()   // andiamo a validare il prodotto recuperando il prodotto dall'id
            ]

        ];
    }
}

