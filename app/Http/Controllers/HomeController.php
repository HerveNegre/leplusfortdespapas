<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function myProfile()
    {
        return view('myProfile');
    }

    public function myProfileUpdate(Request $request)
    {
        $user_id     = Auth::user()->id;
        $user        = User::findOrfail($user_id);
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        
        $user->update();
        return redirect()->back()->with('success', "Modifications effectuées !");
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore()
    {
        $mail = request()->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'objet'   => 'required',
            'message' => 'required',
        ]);

        //envoyer un mail
        Mail::to('leplusfortdespapas@outlook.fr')->send(new ContactFormMail($mail));

        return redirect('contact')->with('success', "Merci, votre message a bien été envoyé! Nous vous répondront dans les plus brefs délais");
    }

    public function orders()
    {
        return view('orders');
    }  
}
