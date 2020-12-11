@extends('layouts.master')

@section('content')

<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->
    <div class="container">
    <br/>
    <br/>
    <br/>
    <br/>
    </div>
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="../images/login.jpg" alt="login">
                        <div class="hover">
                            <h4>Nouveau sur le site ?</h4>
                            <a class="primary-btn" href="{{ route('register') }}">Créer votre compte</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Se connecter</h3>
                        <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm" novalidate="novalidate">
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
                            
                            <!--Mot de passe-->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Tapez votre mot de passe">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <!--Boutton de validation -->
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">
                                    Connexion
                                </button>
                                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection