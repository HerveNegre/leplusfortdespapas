@extends('layouts.master')

@section('content')
<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('../images/login.jpg') }}" alt="login">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Réinitialiser mot de passe</h3>
                    <form class="row login_form" method="POST" action="{{ route('password.email') }}" id="contactForm" novalidate="novalidate">
                        {{ csrf_field() }} <!-- securité traitement donnees du formulaire -->
                        
                        <!--Email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre adresse Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <!--Boutton de validation -->
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">
                                Réinitialiser
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
