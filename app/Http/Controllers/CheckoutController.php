<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\OrderProduct;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

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

            // envoie des données de la commande dans la db
             $order = Order::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'first_name'        => $request->first_name,
                'last_name'         => $request->last_name,
                'phone'             => $request->phone,
                'email'             => $request->email,
                'delivery_street'   => $request->delivery_street,
               'delivery_street2'   => $request->delivery_street2,
                'delivery_zip_code' => $request->delivery_zip_code,
                'delivery_city'     => $request->delivery_city,
               'delivery_country'   => $request->delivery_country,
                'bill_street'       => $request->bill_street,
                'bill_street2'      => $request->bill_street2,
                'bill_zip_code'     => $request->bill_zip_code,
                'bill_city'         => $request->bill_city,
                'bill_country'      => $request->bill_country
             ]);

             foreach (Cart::content() as $item) {
                 OrderProduct::create([
                    'order_id'     => $order->id,
                    'product_id' => $item->model->id,
                    'quantity'     => $item->qty,
                 ]);
             }

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
