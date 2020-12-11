<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Accueil
Route::get('/', 'HomeController@home')->name('home');

//Contact
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@contactStore')->name('contactStore');

//Produits
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/search', 'ProductsController@search')->name('products.search');
Route::get('/products/{product}', 'ProductsController@show')->name('singleProduct');


//Panier
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::get('/cart/reset', 'CartController@reset')->name('cart.reset');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/{product}/save', 'CartController@save')->name('cart.save');

//Sauvegarder
Route::delete('/save/{product}', 'SaveController@destroy')->name('save.destroy');
Route::post('/save/{product}/cart', 'SaveController@store')->name('save.store');

//Checkout
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/success', 'CheckoutController@success')->name('checkout.success');

//Commandes
Route::get('/orders', 'HomeController@orders')->name('orders');

//Authentification
Auth::routes();

//Se déconnecter
Route::get('/logout', function () {
    auth()->logout();
    session()->flush();

    return Redirect::to('/');
})->name('logout');

// //User Auth

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/myProfile', 'HomeController@myProfile')->name('myProfile');
    Route::post('/myProfileUpdate', 'HomeController@myProfileUpdate')->name('myProfileUpdate');
});


//Admin Auth
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    });

//CRUD Users
Route::get('/role-register', 'Admin\DashboardController@registered');
Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredEdit');
Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerUpdate');
Route::delete('/role-delete/{id}', 'Admin\DashboardController@registerDelete');

//CRUD Produits
Route::get('/productAdmin', 'Admin\DashboardController@productAdmin')->name('index');
Route::get('/productAdd', 'Admin\DashboardController@productAdminAdd')->name('add');
Route::post('/productCreate', 'Admin\DashboardController@create')->name('create');
Route::get('/productEdit/{id}', 'Admin\DashboardController@productAdminEdit');
Route::put('/productUpdate/{id}', 'Admin\DashboardController@productAdminUpdate');
Route::delete('/productDelete/{id}', 'Admin\DashboardController@productAdminDelete');

//CRUD Categories
Route::get('/categoryAdmin', 'Admin\DashboardController@categoryAdmin')->name('categoryAdmin');
Route::get('/categoryAdd', 'Admin\DashboardController@categoryAdminAdd')->name('categoryAdminAdd');
Route::post('/categoryCreate', 'Admin\DashboardController@createCategory')->name('createCategory');
Route::get('/categoryEdit/{id}', 'Admin\DashboardController@categoryAdminEdit');
Route::put('/categoryUpdate/{id}', 'Admin\DashboardController@categoryAdminUpdate');
Route::delete('/categoryDelete/{id}', 'Admin\DashboardController@categoryAdminDelete');


});