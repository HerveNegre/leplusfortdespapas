<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    //Afficher formulaire
    public function checkout()
    {
        return view('checkout');
    }

    //Gerer le paiement
    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51HucQ8Bklr0Wh09BVw3lEJX32vZk6h2Op7MMC5dgKshMvhx5f9DZ7AQAeKUCR7AkFleSnIEx6lJu8OWo2oNjNeQL00Jg6Y1Qwp');

        try {
            $charge = \Stripe\Charge::create([
                'amount'        => Cart::total() * 100,
                'currency'      => 'eur',
                'description'   => 'Paiement',
                'source'        => $request->stripeToken,
                'receipt_email' => $request->email,
                'metadata'      => [
                    'owner' => $request->name,
                    'products' => Cart::content()->toJson()
                ]
            ]);

            return redirect()->route('checkout.success')->with('success', 'Votre paiement a été validé !');

        }
        catch (\Stripe\Exception\CardErrorException $error) {
            throw $error;
        }
    }

    //Si paiement reussi
    public function success()
    {
        if (!session()->has('success')) {
            return redirect()->route('home');
        }
        return view('success');
    }
}
