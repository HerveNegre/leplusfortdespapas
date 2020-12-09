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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Réinitialiser mot de passe</h3>
                    <form class="row login_form" method="POST" action="{{ route('password.request') }}" id="contactForm" novalidate="novalidate">
                        {{ csrf_field() }} <!--securité traitement donnees du formulaire-->
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <!--Email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre adresse Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!--Nouveau mot de passe -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Nouveau mot de passe" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!--Confirmer nouveau mot de passe -->
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  placeholder="Confirmez mot de passe" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
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
