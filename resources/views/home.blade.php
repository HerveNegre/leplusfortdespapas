@extends('layouts.master')

@section('content')

<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->
<br><br><br><br><br>

    <h1>Page d'accueil</h1>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="images/p6.jpg" alt="chaussure de sport rouge">
                        <div class="product-details">
                            <h6>{{ $product->name }}</h6>
                            <p>{{ $product->details }}</p>
                            <div class="price">
                                <h6>{{ $product->price }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection