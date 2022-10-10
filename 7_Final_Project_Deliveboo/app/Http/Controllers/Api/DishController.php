<?php

namespace App\Http\Controllers\Api;

use App\Model\Dish;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Http\Requests\Orders\OrderRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //   * @return \Illuminate\Http\Response
     */
    public function index(int $user_id)
    {
        $dishes = Dish::where('user_id', '=', $user_id)->get();

        return DishResource::collection($dishes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $dish = Dish::findOrFail($id);

    //     return response()->json([
    //         'success' => true,
    //         'dish' => $dish
    //     ]);
    // }
}
