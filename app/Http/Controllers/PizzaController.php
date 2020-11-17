<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('pizza/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything 
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'required|string|max:20',
                    'description' => 'required|string|min:20',
                    'price' => 'required|numeric|min:10000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['name'].".".$extension);
                $url = Storage::url($validated['name'].".".$extension);
                $pizaa = Pizza::create([
                   'name' => $request->name,
                   'description' => $request->description,
                   'price' => $request->price,
                   'image_url' => $url,
                ]);
                // Session::flash('success', "Success!");
                return redirect('/home');
            }
        }
        else{
            return $request;
        } 
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
        return view('pizza/edit', compact('pizza'));
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
        if ($request->hasFile('image')) {
            //  Let's do everything 
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'required|string|max:20',
                    'description' => 'required|string|min:20',
                    'price' => 'required|numeric|min:10000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['name'].".".$extension);
                $url = Storage::url($validated['name'].".".$extension);
                $pizaa = Pizza::where('id', $pizza->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'image_url' => $url,
                ]);
                // Session::flash('success', "Success!");
                return redirect('/home');
            }
        }else{
            return $request;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        Pizza::destroy($pizza->id);
        return redirect('/home');
        // return $pizza;
    }

    public function delete($id){
        $pizza = Pizza::Where('id',$id)->firstOrFail();
        return view('pizza/pizzaDelete', compact('pizza'));
    }

    public function showCart(Pizza $pizza, Request $request){
        // return view('cart');
        $request->validate([
            'qty' => 'required',
         ]);
        return view('cart', compact('pizza', 'request'));
    }

    public function search(Request $request){

        $search = $request->search;
        $pizza = Pizza::where('name', 'like', "%".$search."%")->get();
        
        return view('/home', compact('pizza'));
    }

}
