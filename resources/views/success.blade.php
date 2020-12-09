@extends('layouts.master')

@section('content')
<section class="order_details section_gap">
    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $message }}
            </div>
        @endif
        <h3 class="title_confirmation">Merci ! Votre commande a été validé.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Informations de commande</h4>
                    <ul class="list">
                        <li><a href="#"><span>Numéro de commande</span> : 60235</a></li>
                        <li><a href="#"><span>Date</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Total</span> : USD 2210</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Adresse de facturation </h4>
                    <ul class="list">
                        <li><a href="#"><span>Adresse</span> : 56/8</a></li>
                        <li><a href="#"><span>Ville</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Code postal</span> : United States</a></li>
                        <li><a href="#"><span>Pays</span> : 36952</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Addresse de livraison</h4>
                    <ul class="list">
                        <li><a href="#"><span>Adresse</span> : 56/8</a></li>
                        <li><a href="#"><span>Ville</span> : Los Angeles</a></li>
                        <li><a href="#"><span>Code postal</span> : United States</a></li>
                        <li><a href="#"><span>Pays</span> : 36952</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Détails de la commande</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produits</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2160.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Livraison</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Offerte</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2210.00</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection