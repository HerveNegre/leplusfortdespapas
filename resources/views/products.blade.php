@extends('layouts.master')

@section('content')

<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->


<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2></h2>
					<ul class="text-left">
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- collection section start -->
<section class="collection-area collection-area2 section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="single-colect banner collect-one">
					<a href="#"><img src="images/4.jpg" alt="" /></a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="colect-text ">
					<h4><a href="#">Willy le Raton Laveur !</a></h4>
					<h5>Thermomètre de bain <br /> notre nouveautée !</h5>
					<a href="#"><i class="mdi mdi-arrow-right"></i></a>
				</div>
				<div class="collect-img banner margin single-colect">
					<a href="#"><img src="images/5.jpg" alt="" /></a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="collect-img banner single-colect">
					<a href="#"><img src="images/6.jpg" alt="" /></a>
				</div>
				<div class="colect-text ">
					<h4><a href="#">Les indispenssables!</a></h4>
					<p>Rien de tel que notre sélection d'indispenssable pour être le plus fort des papas !</p>
					<a href="#"><i class="mdi mdi-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- collection section end -->
<!-- product-grid-view content section start -->
<section class="pages products-page section-padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<div class="sidebar left-sidebar">
					<div class="s-side-text">
						<div class="sidebar-title clearfix">
							<h4 class="floatleft">Categories</h4>
						
						</div>
						<div class="categories left-right-p">
							<ul id="accordion" class="panel-group clearfix">
								<div class="sidebar-categories">
									
									<ul class="main-categories">
										@foreach ($categories as $category)

										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
												<div class="medium-a">
													{{ $category->name }} 
													<span class="number">({{ count($category->products) }})</span>
												</div>
											</div>
										</li>
											@endforeach
									</ul>
								</div>
							</ul>
						</div>
					</div>
					<div class="s-side-text">
						<div class="sidebar-title">
							<h4>prix</h4>
						</div>
						<div class="range-slider clearfix">
							<form action="#" method="get">
								<label><span>Par tranche</span> <input type="text" id="amount" readonly /></label>
								<div id="slider-range"></div>
							</form>
						</div>
					</div>
					
	
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-9">
				<div class="right-products">
					<div class="row">
						<div class="col-xs-12">
							<div class="col-12">@include('partials.search') <br /></div>
							<div class="section-title clearfix">
								<ul>
									<li>
										<ul class="nav-view">
											<li class="active"><a data-toggle="tab" href="#grid"> <i class="mdi mdi-view-module"></i> </a></li>
											
										</ul>
									</li>
									
										<div class="col-sm-5">
											<div class="pagnation-ul">
												<ul class="clearfix">
													<li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
													<li><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#">5</a></li>
													<li><a href="#">...</a></li>
													<li><a href="#">10</a></li>
													<li><a href="#"><i class="mdi mdi-menu-right"></i></a></li>
												</ul>
											</div>
										</div>
									
									<li class="sort-by floatright">
										voici les articles 1 à 9 parmis nos {{ count($products) }} articles.
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach ($products as $product)
						<div class="tab-content grid-content">
							<div class="tab-pane fade in active text-center" id="grid">
								<div class="col-xs-9 col-sm-6 col-md-4">
									<div class="single-product " >
										<div class="product-img" >
								
											<a href="{{ route('singleProduct', $product->slug) }}"><img src="{{ asset('images/'.$product->image) }}" alt="Product Title"  width="10%"/></a>
											<div class="actions-btn">
												<a><form action="{{ route('cart.store') }}" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{ $product->id }}">
													<input type="hidden" name="name" value="{{ $product->name }}">
													<input type="hidden" name="price" value="{{ $product->price }}">
													<input type="hidden" name="image" value="{{ $product->image }}">
													<button class="papa_mid" type="submit"><i class="mdi mdi-cart"></i></button>
												</form>
												</a>
												<a href="#" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
												<a href="#"><i class="mdi mdi-heart"></i></a>
											</div>
										</div>
										<div class="product-dsc">
											<p><a href="#"><h6>{{ $product->name }}</h6></a></p>
											<div class="ratting">
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star-half"></i>
												<i class="mdi mdi-star-outline"></i>
											</div>
											<span>{{ $product->price }}€</span>
										</div>
									</div>
								</div>
								@endforeach
								
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</section>
<div class="row">
	<div class="col-sm-12">
		<div class="pagnation-ul">
			<ul class="clearfix">
				<li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">...</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#"><i class="mdi mdi-menu-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- product-grid-view content section end -->
<!-- quick view start -->
<div class="product-details quick-view modal animated zoomInUp" id="quick-view">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="d-table">
					<div class="d-tablecell">
						<div class="modal-dialog">
							<div class="main-view modal-content">
								<div class="modal-footer" data-dismiss="modal">
									<span>x</span>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-5 col-md-4">
										<div class="quick-image">
											<div class="single-quick-image text-center">
												<div class="list-img">
													<div class="product-img tab-content">
														<div class="simpleLens-container tab-pane fade in" id="q-sin-1">
															<div class="pro-type">
																
															</div>
															<a class="simpleLens-image" data-lens-image="{{ asset('images/'.$product->image) }}" href="#"><img src="img/products/z1.jpg" alt="" class="simpleLens-big-image"></a>
														</div>
														<div class="simpleLens-container tab-pane active fade in" id="q-sin-2">
															<div class="pro-type sell">
																<span>sell</span>
															</div>
															<a class="simpleLens-image" data-lens-image="{{ asset('images/'.$product->image) }}" href="#"><img src="img/products/z2.jpg" alt="" class="simpleLens-big-image"></a>
														</div>
														<div class="simpleLens-container tab-pane fade in" id="q-sin-3">
															<div class="pro-type">
																<span>-15%</span>
															</div>
															<a class="simpleLens-image" data-lens-image="{{ asset('images/'.$product->image) }}" href="#"><img src="img/products/z3.jpg" alt="" class="simpleLens-big-image"></a>
														</div>
														<div class="simpleLens-container tab-pane fade in" id="q-sin-4">
															<div class="pro-type">
																<span>new</span>
															</div>
															<a class="simpleLens-image" data-lens-image="{{ asset('images/'.$product->image) }}" href="#"><img src="img/products/z4.jpg" alt="" class="simpleLens-big-image"></a>
														</div>
													</div>
												</div>
											</div>
											<div class="quick-thumb">
												<ul class="product-slider">
													<li><a data-toggle="tab" href="#q-sin-1"> <img src="img/products/s1.jpg" alt="quick view" /> </a></li>
													<li class="active"><a data-toggle="tab" href="#q-sin-2"> <img src="img/products/s2.jpg" alt="small image" /> </a></li>
													<li><a data-toggle="tab" href="#q-sin-3"> <img src="img/products/s3.jpg" alt="small image" /> </a></li>
													<li><a data-toggle="tab" href="#q-sin-4"> <img src="img/products/s4.jpg" alt="small image" /> </a></li>
												</ul>
											</div>
										</div>						
									</div>
									<div class="col-xs-12 col-sm-7 col-md-8">
										<div class="quick-right">
											<div class="list-text">
												<h3>{{ $product->name }}</h3>
												<span> </span>
												<div class="ratting floatright">
													<p>( 27 notes )</p>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star-half"></i>
													<i class="mdi mdi-star-outline"></i>
												</div>
												<h5> {{ $product->price }}</h5>
												<p>{{ $product->details }}</p>
												
												<div class="list-btn">
													<form class="papa_mid" action="{{ route('cart.store') }}" method="post">
														{{ csrf_field() }}
														<input type="hidden" name="id" value="{{ $product->id }}">
														<input type="hidden" name="name" value="{{ $product->name }}">
														<input type="hidden" name="price" value="{{ $product->price }}">
														<input type="hidden" name="image" value="{{ $product->image }}">
														<button class="papa_mid" type="submit"><i class="fas fa-cart-arrow-down"></i></button>
													</form>
													
													
												</div>
												<div class="share-tag clearfix">
													<ul class="blog-share floatleft">
														<li><h5>share </h5></li>
														<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
														<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
														<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
														<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
														<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
														<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<!--------------------------------------------------------------side_bar categories-------------------------------------------------------------->
				<div class="sidebar-categories">
					<div class="head">Categories</div>
					<ul class="main-categories">
						@foreach ($categories as $category)
							<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
								{{ $category->name }} <span class="number">({{ count($category->products) }})</span>
							</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-7">
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Tri par défaut</option>
							<option value="1">Tri par défaut</option>
							<option value="1">Tri par défaut</option>
						</select>
					</div>
					<div class="pagination ml-auto">
						<a href="#" class="prev-arrow"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fas fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>

				<!-- Catalogue produits -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						@foreach ($products as $product)
						<!-- single product -->
						
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<a href="{{ route('singleProduct', $product->slug) }}">
										<img class="img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
									</a>
									<div class="product-details">
										<h6>{{ $product->name }}</h6>
										<div class="price">
											<h6>{{ $product->price }}</h6>
											<p>{{ $product->details }}</p>
										</div>
										<div class="prd-bottom">
											<form action="{{ route('cart.store') }}" method="post">
												{{ csrf_field() }}
												<input type="hidden" name="id" value="{{ $product->id }}">
												<input type="hidden" name="name" value="{{ $product->name }}">
												<input type="hidden" name="price" value="{{ $product->price }}">
												<input type="hidden" name="image" value="{{ $product->image }}">
												<button class="primary-btn" type="submit">Ajouter au panier</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</section>

				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
						<select>
							<option value="1">Tri par défaut</option>
							<option value="1">Tri par défaut</option>
							<option value="1">Tri par défaut</option>
						</select>
					</div>
					<div class="pagination ml-auto">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fas fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
@endsection