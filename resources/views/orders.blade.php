@extends('layouts.master')

@section('content')
<div class="container">
    <br/>
    <br/>
    <br/>
    <br/>
    </div>
    <div class="container my-5">
        <div class="orders">
            <h2 class="text-center">Détails de commande</h2>
            <div class="table-responsive order_details_table">
                <div class="d-flex justify-content-between my-5 px-5">
                    <h4>
                        <i class="fas fa-receipt"></i>
                        
                    </h4>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col">Produits</td>
                            <td class="col">Quantité</td>
                            <td class="col">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Babyphone</td>
                            <td>x 1</td>
                            <td>15 €</td>
                        </tr>
                        <tr>
                            <td><b>Total de la commande</b></td>
                            <td></td>
                            <td>15 €</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>    
    </div> 
@endsection