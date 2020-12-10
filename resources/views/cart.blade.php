@extends('layouts.master')

@section('content')
<section class="cart_area">
    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $message }}
            </div>
        @endif
        <div class="cart_inner">
            @if (Cart::count() > 0)
                <h2>{{ Cart::count() }} article(s) dans le panier</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produits</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img class="img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="media-body">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->details }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $product->price }} €</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input disabled type="text" name="qty" id="sst" maxlength="12" value="x {{ $product->qty }}" title="Quantity:"
                                                class="input-text qty">
                                        </div>
                                    </td>
                                    <td>
                                    <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-link">Supprimer</button>
                                    </form>
                                    <form action="{{ route('cart.save', $product->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-link">Sauvegarder pour plus tard</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                
                               
                                
                                <td>
                                    <h5>Hors taxe</h5>
                                    <p>Taxe</p>
                                    <h4>Total du panier</h4>
                                </td>
                                <td>
                                    <h5>{{ Cart::subtotal() }} €</h5>
                                    <p>{{ Cart::tax() }} €</p>
                                    <h4>{{ Cart::total() }} €</h4>
                                </td>
                            </tr>
                        
                            <tr class="out_button_area">
                                
                                
                                
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{ route('products') }}">Retour aux Articles</a>
                                        <a class="primary-btn" href="{{ route('checkout.index') }}">Payer</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="my-3 text-center">Panier vide</h3>
                <div class="d-flex justify-content-around">
                    <a class="gray_btn" href="{{ route('products') }}">Faites votre shopping !</a>
                </div>
            @endif
        </div>
    </div>
    <div class="single-product-slider">
        <div class="container">
            @if (Cart::instance('save')->count() > 0)
                <h2 class="text-center my-5">{{ Cart::instance('save')->count() }} Article(s) sauvegardé(s) pour plus tard</h2>
                <div class="row">
                    @foreach (Cart::instance('save')->content() as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                                <div class="product-details">
                                    <h6>{{ $product->name }}</h6>
                                    <div class="product-price">
                                        <h6>{{ $product->price }}</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <form action="{{ route('save.destroy', $product->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-link">Supprimer</button>
                                        </form>
                                        <form action="{{ route('save.store', $product->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-link">Ajouter au panier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h3 class="tex-center">Aucun article sauvegardé pour plus tard</h3>
            @endif
        </div>
    </div>
</section>
@endsection