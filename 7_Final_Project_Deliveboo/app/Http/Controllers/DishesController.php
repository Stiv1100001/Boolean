<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id', '=', Auth::user()->id)->orderby('name', 'ASC')->paginate(10);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:250',
            'price' => 'numeric|min:0',
            'description' => 'string',
            'ingredients' => 'string',
            'img_url' => 'required|file'
        ], [
            'required' => 'Il campo è obbligatorio',
            'price' => 'Il campo deve essere un numero',
            'string' => 'Il campo deve contenere del testo',
            'file' => 'Il piatto necessita di una immagine'
        ]);

        $data = $request->all();

        if (!isset($data['availability'])) {
            $data['availability'] = false;
        } else {
            $data['availability'] = true;
        }

        $newDish = new Dish();

        $newDish->fill($data);
        $newDish->user_id = Auth::user()->id;
        $newDish->img_url = Storage::put('uploads', $data['img_url']);

        $newDish->save();


        return redirect()->route('admin.dishes.index', $newDish)->with('message', 'Il nuovo piatto ' . $newDish->name . ' è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        if ($dish->user_id != Auth::user()->id) {
            abort(401, 'Unauthorized action.');
        }

        return view('admin.dishes.show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        if ($dish->user_id != Auth::user()->id) {
            abort(401, 'Unauthorized action.');
        }

        return view('admin.dishes.edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        if ($dish->user_id != Auth::user()->id) {
            abort(401, 'Unauthorized action.');
        }


        $request->validate([
            'name'=> 'max:250',
            'price' => 'numeric|min:0',
            'description' => 'string',
            'ingredients' => 'string',
            'img_url' => 'file'
        ], [
            'required' => 'Il campo è obbligatorio',
            'numeric' => 'Il campo deve essere un numero',
            'string' => 'Il campo deve contenere del testo',
            'file' => 'Il piatto necessita di una immagine'
        ]);

        $data = $request->all();

        if (!isset($data['availability'])) {
            $data['availability'] = false;
        } else {
            $data['availability'] = true;
        }


        $dish->fill($data);

        $dish->save();

        return redirect()->route('admin.dishes.index', $dish)->with('message', 'Il piatto ' . $dish->name . ' è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route("admin.dishes.index", $dish)->with('message', 'Il piatto ' . $dish->name . ' è stato modificato correttamente');
    }
}
