<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        
        return view('products', [
            'products'   => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product  = Product::where('slug', $slug)->firstOrFail();
        $user     = User::all();
        $message  = Comment::all();
        return view('singleProduct', [
            'product'  => $product,
            'user'     => $user,
            'message'  => $message
        ]);
    }
    public function search()
{
    $q=request()->input('q');

    $categories = Category::all();
    $products = Product::where('name', 'like', "%$q%")
                ->orWhere('details', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(9);

                return view('products.search', [
                    'products'   => $products,
                    'categories' => $categories
                ]);
                    
                    
    
                    
               
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
        //
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
