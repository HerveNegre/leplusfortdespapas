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

//Produits
Route::get('/products', 'ProductsController@index')->name('products');
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
Route::get('/productAdmin', 'Admin\DashboardController@productAdmin');
Route::get('/productAdmin-add', 'Admin\DashboardController@productAdminAdd');
Route::get('/productAdmin-edit/{id}', 'Admin\DashboardController@productAdminEdit');
Route::put('/productAdmin-update/{id}', 'Admin\DashboardController@productAdminUpdate');
Route::delete('/productAdmin-delete/{id}', 'Admin\DashboardController@productAdminDelete');

});