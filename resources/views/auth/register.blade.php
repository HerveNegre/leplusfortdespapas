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
                <div class="col-lg-6 bg-white">
                    <div class="login_box_img h-100 d-flex align-items-center">
                        <img class="img-fluid h-100" src="../images/login.jpg" alt="register">
                        <div class="hover">
                            <h4>Déjà inscrit ?</h4>
                            <a class="primary-btn" href="{{ route('login') }}">Connectez vous</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>S'inscrire</h3>
                        <form class="row login_form" method="POST" action="{{ route('register') }}" id="contactForm" novalidate="novalidate">
                            {{ csrf_field() }} <!-- securité traitement donnees du formulaire -->
                            
                            <!--Nom-->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Votre prénom" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <!--Email-->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Votre Email" value="{{ old('email') }}">
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

                            <!--Confirmer Mot de passe-->
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmez le mot de passe">
                            </div>
                            
                            <!--Boutton de validation -->
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
