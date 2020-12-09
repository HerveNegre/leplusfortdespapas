<?php

namespace App\Http\Controllers\Admin;

use App\Product;
//use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    // fonctions CRUD Users 
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    public function registeredEdit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);
    }

    public function registerUpdate(Request $request, $id)
    {
        $users           = User::find($id);
        $users->name     = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->isBan    = $request->input('isBan');
        $users->update();
        
        return redirect('/role-register')->with('status', 'Modifications effectuées');
    }

    public function registerDelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('status', 'Suppression éffectuée');
    }

    // fonctions CRUD produits
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productAdmin()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('singleProduct', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productAdminAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data                 = $request->all();
            $product              = new Product;
            $product->name        = $data['name'];
            $product->slug        = $data['slug'];
            $product->details     = $data['details'];
            $product->price       = $data['price'];
            $product->category_id = $data['category_id'];

            if (!empty($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = "";
            }
            if ($request->hasFile('image')) {
                echo $img_tmp = Input::file('image');
                if($img_tmp->isValid()) {

                    //chemin vers le fichier des images
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999). '.'.$extension;
                    $img_path = 'public/images/'.$filename;

                    //image redimensionner
                    Image::make($img_tmp)->resize(500,500)->save($img_path);
                    $product->image = $filename;
                }
            }
            $product->save();
            return redirect('/productAdmin')->with('status', 'Nouveau produit ajouté');
        }
        return view('admin.product-add');
    }

    public function productAdminEdit(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        return view('admin.product-edit')->with('products', $products);
    }

    public function productAdminUpdate(Request $request, $id)
    {
        $products               = Product::find($id);
        $products->name         = $request->input('name');
        $products->slug         = $request->input('slug');
        $products->details      = $request->input('details');
        $products->price        = $request->input('price');
        $products->description  = $request->input('description');
        $products->categorie_id = $request->input('categorie_id');
        $products->image        = $request->input('image');

        $products->update();
        
        return redirect('/productAdmin')->with('status', 'Modifications effectuées');
    }

    public function productAdminDelete($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect('/productAdmin')->with('status', 'Suppression éffectuée');
    }
}
