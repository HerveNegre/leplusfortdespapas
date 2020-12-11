
@extends('layouts.master')

@section('content')
<br><br><br><br>
<section class="contact_area section_gap_bottom">
    <div class="container mt-5">
        <img class="img_papa d-flex" src="images/logo_papa_02.png">
        {{-- <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="2 rue du Professeur Charles Appleton, 69007 Lyon, France."
         data-mlat="40.701083" data-mlon="-74.1522848">
        </div> --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="fas fa-envelope"></i>
                        <h6><a href="#">leplusfortdespapas@outlook.fr</a></h6>
                        <p>Envoyez-nous votre demande</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 ml-5">
                <form class="row contact_form" action="{{ route('contact') }}" method="post" id="contactForm" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre Prénom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Prénom'">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse Email'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Objet'">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre message'"></textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <button type="submit" value="submit" class="primary-btn d-flex justify-content-center">Envoyer le message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- <section class="contact_area section_gap_bottom">
    <div class="container mt-5">
        <img class="img_papa d-flex" src="images/logo_papa_02.png">
        <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="2 rue du Professeur Charles Appleton, 69007 Lyon, France."
         data-mlat="40.701083" data-mlon="-74.1522848">
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="fas fa-envelope"></i>
                        <h6><a href="#">leplusfortdespapas@hotmail.fr</a></h6>
                        <p class="blog_papa">Envoyez-nous votre demande</p>
                    </div>
                </div>
            </div>
            <br/>
            <div class="col-lg-12">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre nom'">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse Email'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Objet'">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre message'"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary-btn">Envoyer le message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection --}}