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
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Avis</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{ $product->description }}</p>
				</div>
				
				{{-- Commentaires du produit --}}
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="media-body">
											@foreach ($user as $value)
												<h4 class="mr-auto">{{ $value->name }}</h4>
											@endforeach
											@foreach ($message as $value)
												<h5>{{ $value->created_at }}</h5>
											<a class="reply_btn" href="#">Repondre</a>
										</div>
									</div>
									<p>{{ $value->message }}</p>
									<hr>
								</div>
								@endforeach
								@if (auth()->check())
									<div class="col-lg-6">
										<div class="review_box">
											<h4 class="col-md-12 d-flex justify-content-center">Donnez votre avis !</h4>
											<form class="row contact_form" action="/comments" method="post" id="comment" role="form" novalidate="novalidate">
												{{ csrf_field() }}
												<div class="col-md-12">
													<div class="form-group mb-5">
														<h6>Notez le produit /5 !</h6>
														<select type="text" class="form-control" name="rating" id="rating">
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</div>
													<div class="form-group mb-5">
														<textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message"></textarea>
													</div>
												</div>
												{{-- <div class="form-group">
													<input type="hidden" name="product_id" value="{{ $product->id }}">
												</div> --}}
												<div class="col-md-12 text-right">
													<button type="submit" value="submit" class="btn primary-btn">Valider</button>
												</div>
											</form>
										</div>
									</div>
								@else
								<a href="/login" class="button primary-btn">
									<p class="d-flex justify-content-center">Connectez vous pour donner votre avis</p>
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection