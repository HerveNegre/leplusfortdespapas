@extends('layouts.master')

@section('includes')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>Déjà client? <a href="#">Cliquez ici pour vous identifier</a></h2>
            </div>
            <p>
                Si vous avez déjà acheté chez nous, veuillez saisir vos coordonnées dans les cases ci-dessous. Si vous êtes un nouveau client,
                veuillez passer à la section Facturation et expédition.
            </p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="email" name="email">
                    <span class="placeholder" data-placeholder="Email"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="placeholder" data-placeholder="Mot de passe"></span>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Connexion</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Se rappeler de moi</label>
                    </div>
                    <a class="lost_pass" href="#">Mot de passe oublié?</a>
                </div>
            </form>
        </div>

        <!-- Formulaire de livraison -->
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Détails de la facture</h3>
                    <form class="row contact_form" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nom" value="{{ old('first_name') }}">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Prénom" value="{{ old('last_name') }}">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    
                        <!-- Adresse de livraison -->
                        <div class="col-md-12 form-group p_star" id="delivery_address">
                            <label class="p_star"><strong>Adresse de livraison</strong> <i class="fas fa-star-of-life" style="color:rgb(250, 114, 114);"></i></label>
                            <input type="text" class="form-control p_star" id="delivery_street" name="delivery_street" placeholder="Adresse" value="{{ old('delivery_street') }}">
                            <input type="text" class="form-control p_star" id="delivery_street2" name="delivery_street2" placeholder="Complement d'adresse" value="{{ old('delivery_street2') }}">
                            <input type="text" class="form-control p_star" id="delivery_zip_code" name="delivery_zip_code" placeholder="Code postal" value="{{ old('delivery_zip_code') }}">
                            <input type="text" class="form-control p_star" id="delivery_city" name="delivery_city" placeholder="Ville" value="{{ old('delivery_city') }}">
                            <label class="mt-3">Pays</label>
                            <select class="country_select p_star" id="delivery_country" name="delivery_country" value="{{ old('delivery_country') }}">
                                <option value="Allemagne">Allemagne</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Espagne">Espagne</option>
                                <option value="France">France</option>
                                <option value="Italie">Italie</option>
                            </select>
                        </div>

                        <!-- Adresse de facturation -->
                        <div class="col-md-12 form-group p_star" id="bill_address">
                            <label class="p_star"><strong>Adresse de facturation</strong> <i class="fas fa-star-of-life" style="color:rgb(250, 114, 114);"></i></label>
                            <input type="text" class="form-control p_star" id="bill_street" name="bill_street" placeholder="Adresse" value="{{ old('bill_street') }}">
                            <input type="text" class="form-control p_star" id="bill_street2" name="bill_street2" placeholder="Complement d'adresse" value="{{ old('bill_street2') }}">
                            <input type="text" class="form-control p_star" id="bill_zip_code" name="bill_zip_code" placeholder="Code postal" value="{{ old('bill_zip_code') }}">
                            <input type="text" class="form-control p_star" id="bill_city" name="bill_city" placeholder="Ville" value="{{ old('bill_city') }}">
                            <label class="mt-3">Pays</label>
                            <select class="country_select p_star" id="bill_country" name="bill_country" value="{{ old('bill_country') }}">
                                <option value="Allemagne">Allemagne</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Espagne">Espagne</option>
                                <option value="France">France</option>
                                <option value="Italie">Italie</option>
                            </select>
                        </div>
                        
                        <!-- Carte de credit -->
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <div class="form-group">
                                    <label for="card-element">
                                    <h3>Carte de crédit</h3>
                                    </label>
                                    <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>
                        </div>
                        <button id="complete-order" type="submit" class="primary-btn my-3">Valider le paiement</button>
                    </form>
                </div>

                <!-- Résumé commande -->
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Votre commande</h2>
                        <ul class="list">
                            <li><a href="#">Article <span>Total</span></a></li>
                            @foreach (Cart::content() as $product)
                                <li>
                                    <a href="#">{{ $product->name }} <span class="middle">x {{ $product->qty }}</span> <span class="last">{{ $product->price }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Taxe <span>{{ Cart::tax() }}</span></a>
                            </li>
                            <li>
                                <a href="#">Total <span>{{ Cart::total() }}</span></a>
                            </li>
                            <li>
                                <div class="row mt-4">
                                    <a class="mr-auto ml-3" href="#">Livraison</a>
                                    <span class="ml-5 mt-2"><b><h4>Offerte</h4></b></span>
                                    <img src="{{ asset('images/smile.gif') }}" alt="smile" style="width: 20%">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection

@section('js')
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HucQ8Bklr0Wh09BggvQ8gHe89pxLqmNRPjZaEI8BaQtE7AnBXrcvhrbr2XftBMBSKn43d55eY82HkpqMiJ2tx6T00YEBo5g2W');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var options = {
                Nom: document.getElementById('first_name').value,
                Prenom: document.getElementById('last_name').value,
                Email: document.getElementById('email').value,
            }

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection