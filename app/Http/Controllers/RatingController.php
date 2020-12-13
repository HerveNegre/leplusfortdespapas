<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating()
    {
        $review = Product::content();
        $commentsList = [];
        foreach ($review as $value) {
            $comment = User::where('id', $value->id)->first();
            array_push($commentsList, $comment);
            
        }
        return View::make('singleProduct')->with('ratings', $commentsList);
    }
}
