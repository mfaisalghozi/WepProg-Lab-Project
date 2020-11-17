<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pizza::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
    
        return view('pizza/pizzaShow', compact('pizza'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }

    public function showCart(Pizza $pizza, Request $request){
        // return view('cart');
        $request->validate([
            'qty' => 'required',
         ]);
        return view('cart', compact('pizza', 'request'));
    }
}
