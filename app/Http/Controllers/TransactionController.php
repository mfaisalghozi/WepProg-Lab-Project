<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Pizza;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMember($id)
    {   
        $transaction = Transaction::where('user_id', $id)->get();
        return view('transaction/index', compact('transaction'));
    }

    public function indexAdmin(){
        $transaction = Transaction::All();
        return view ('transaction/index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    //    $price = Pizza::Where('id', $pizza_id)->value('price'); 
    //    Transaction::create([
    //        'user_id' => $user_id,
    //        'pizza_id' => $pizza_id,
    //        'quantity' => $qty,
    //        'total_price' => ($qty * $price),
    //        'transaction_date' => Carbon::now(),
    //    ]);

            $price = Pizza::Where('id', $request->pizza_id)->value('price'); 
            Transaction::create([
               'user_id' => $request->user_id,
               'pizza_id' => $request->pizza_id,
               'quantity' => $request->quantity,
               'total_price' => ($request->quantity * $price),
               'transaction_date' => Carbon::now(),
            ]);
            
            $cart = session()->get('cart');
            if(isset($cart[$request->pizza_id])){
                unset($cart[$request->pizza_id]);
                session()->put('cart', $cart);
            }
            
        return redirect('/home');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //  
    }

    public function showUser(){
        $user = User::All();
        return view('showUser', compact('user'));
    }

    public function showDetail($id){
        $transaction = Transaction::where('id', $id)->firstOrFail();
        return view('/transaction/show', compact('transaction'));
        // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
