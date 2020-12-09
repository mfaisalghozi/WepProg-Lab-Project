<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    //Function dibawah merupakan function untuk menampilkan seluruh pizza
    // dari database dan ditampilkan di page home
    public function index(){   
        $pizza = Pizza::All();
        return view('home', compact('pizza'));
    }
}
