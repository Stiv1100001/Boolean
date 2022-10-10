<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Model\Dish;

class OrderController extends Controller
{
    public function generateToken(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            "success" => true,
            "token" => $token,
        ];

        return response()->json($data, 200);
    }


    public function makeOrderPayment(Request $request, Gateway $gateway)
    {
        $data = $request->all();

        $request->validate(
            [
                "name_customer" => 'required|string',
                "address_customer" => 'required|string',
                "phone_number_customer" => 'required',
                "email" => 'required|email',
                "nonce" => 'required',
                "order" => 'array',
            ],
            [
                "required" => 'Il campo è obbligatorio',
                "string" => "il campo deve contenere testo",
                "numeric" => 'Il campo deve essere numerico',
            ]
        );


        $amount = 0;

        foreach ($data['order'] as $item) {
            $dish = Dish::find($item['id']);

            $amount += $dish->price * $item['quantity'];
        }

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $request->nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $response = [
            "success" => null,
            "messsage" => null,
        ];

        if ($result->success) {
            $newOrder = new Order();

            $newOrder->fill($data);
            $newOrder->total_price = $amount;

            $newOrder->save();

            foreach ($data['order'] as $item) {
                $newOrder->dishes()->attach($item['id'], ['quantity' => $item['quantity']]);
            }

            $response['success'] = true;
            $response['messsage'] = "Transazione eseguita correttamente";
            $response['orderID'] = $newOrder->id;
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['messsage'] = $result;

            return response()->json($response, 401);
        }
    }

    public function show(int $id)
    {
        $order = Order::with('dishes')->findOrFail($id);

        return response()->json($order);
    }
}
