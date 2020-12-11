<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        $productsList = [];
        foreach ($cart as $value) {
            $product = Product::where('id', $value->id)->first();
            array_push($productsList, $product);
            
        }
        return View::make('cart')->with('products', $productsList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect()->route('cart')->with('success', "L'article a été ajouté dans le panier");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', "L'article a bien été supprimé du panier");
    }

    public function reset()
    {
        Cart::destroy();
    }

    public function save($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);
        Cart::instance('save')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->route('cart')->with('success', "Article sauvegardé");
    }
}
