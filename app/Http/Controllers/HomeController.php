<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $products = Product::inRandomOrder()->take(3)->get();
        return view('home', [
            'products' => $products
        ]);
    }
    public function contact()
    {
        return view('contact');
    }
    public function orders()
    {
        return view('orders');
    }  
}
