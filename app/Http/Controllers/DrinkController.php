<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'name'=>'required|unique:drinks|max:20',
            'origin'=>'string|max:20',
            'ingredients'=>'required|string',
            'price'=>'required|numeric',
        ]);
        
        $drink = new Drink;
        $drink->name = $data['name'];
        $drink->origin = $data['origin'];
        $drink->ingredients = $data['ingredients'];
        $drink->price = $data['price'];

        $drink->save();

        return redirect()->route('drinks.show', $drink);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drink = Drink::find($id); // SELECT * FROM books WHERE id = $id;
        
        return view("show", ["drink" => $drink]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validatedData=Validator::make($request->all(), [
            'name'=>'required|unique:drinks|max:20',
            'origin'=>'string|max:20',
            'ingredients'=>'required|string',
            'price'=>'required|numeric',
        ]);

        if ($validatedData->fails()) {
            return redirect() 
                            ->route('drink.edit', $id)
                            ->withErrors($validatedData)
                            ->withImput();
        }



        $drink = Drink::findOrFail($id);

        $drink->fill($data);

        $drink->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
