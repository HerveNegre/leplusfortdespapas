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
        <h3 class="title_confirmation"><b>Merci ! Votre commande a été validé.</b></h3>
        <a href="{{ route('products') }}" class="btn primary-btn d-flex justify-content-center">Retour aux produits</a>
    </div>
</section>
@endsection