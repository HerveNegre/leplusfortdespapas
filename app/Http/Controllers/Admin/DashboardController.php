<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;


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
        return view('admin.product-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'slug'        => 'required',
            'details'     => 'required',
            'price'       => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image'       => 'required'
        ]);

        $products = new Product;

        $products->name        = $request->input('name');
        $products->slug        = $request->input('slug');
        $products->details     = $request->input('details');
        $products->price       = $request->input('price');
        $products->category_id = $request->input('category_id');
        $products->description = $request->input('description');
    
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //extension de l'image
            $fileName = time().'.'.$extension;
            $file->move('images/', $fileName);
            $products->image = $fileName;
        }

        $products->save();
        return redirect('/productAdmin')->with('success', 'Nouveau produit ajouté !');
    }

    public function productAdminEdit($id)
    {
        $products = Product::find($id);
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
        $products->category_id  = $request->input('category_id');
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //extension de l'image
            $fileName = time().'.'.$extension;
            $file->move('images/', $fileName);
            $products->image = $fileName;
        } else {
            return $request;
            $products->image = '';
        }

        $products->save();
        
        return redirect('/productAdmin')->with('products', $products);
    }

    public function productAdminDelete($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/productAdmin')->with('status', 'Suppression éffectuée');
    }


    //CRUD Categories
    public function categoryAdmin()
    {
        $categories = Category::all();
        return view('admin.category', [
            'categories' => $categories
        ]);
    }

    public function categoryAdminAdd(Request $request)
    {
        return view('admin.categoryAdd');
    }

    public function createCategory(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'slug'        => 'required',
        ]);

        $categories = new Category;

        $categories->id          = $request->input('id');
        $categories->name        = $request->input('name');
        $categories->slug        = $request->input('slug');
        
        $categories->save();
        return redirect('/categoryAdmin')->with('success', 'Nouvelle categorie ajoutée !');
    }

    public function categoryAdminEdit($id)
    {
        $categories = Category::find($id);
        return view('admin.categoryEdit')->with('categories', $categories);
    }

    public function categoryAdminUpdate(Request $request, $id)
    {
        $categories               = Category::find($id);

        $categories->name         = $request->input('name');
        $categories->slug         = $request->input('slug');
    
        $categories->save();
        
        return redirect('/categoryAdmin')->with('categories', $categories)->with('success', 'Modification(s) effectuée(s)');
    }

    public function categoryAdminDelete($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect('/categoryAdmin')->with('status', 'Catégorie supprimée');
    }
}