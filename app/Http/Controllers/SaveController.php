<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveController extends Controller
{
    public function store($id)
    {
        $item = Cart::instance('save')->get($id);
        Cart::instance('save')->remove($id);

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect()->route('cart')->with('success', "L'article a bien été ajouté au panier");
    }

    public function destroy($id)
    {
        Cart::instance('save')->remove($id);
        return back()->with('success', "L'article a bien été supprimé");
    }
}
