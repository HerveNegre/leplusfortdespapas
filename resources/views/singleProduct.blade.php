@extends('layouts.master')

@section('content')

<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->
	<!--================Single Product Area =================-->
    <section class="lattest-product-arrea pb-40 category-list">
            <div class="product_image_area">
                <div class="container">
                    <div class="row s_product_inner">
                        <div class="col-lg-6">
                            <div class="s_Product_carousel">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="{{ asset('../images/'.$product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="{{ asset('../images/'.$product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="{{ asset('../images/'.$product->image) }}" alt="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <div class="s_product_text">
                                <h3>{{ $product->name }}</h3>
                                <h2>{{ $product->price }} €</h2>
                                <ul class="list">
                                	<li><a class="active" href="#"><span>Categorie</span> : {{ $product->category->name }}</a></li>
                                </ul>
                                <p>{{ $product->details }}</p>
                                <div class="card_area d-flex align-items-center">
                                    <form action="{{ route('cart.store') }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $product->id }}">
										<input type="hidden" name="name" value="{{ $product->name }}">
										<input type="hidden" name="price" value="{{ $product->price }}">
										<button class="primary-btn" type="submit">Ajouter au panier</button>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Commentaires</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{ $product->description }}</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Largeur</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Hauteur</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Poids</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				{{-- Commentaires du produit --}}
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Répondre</a>
										</div>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Laissez un commentaire !</h4>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Votre Prénom">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Valider</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection