@extends('layouts.master')

@section('content')

<!-- 
    
ESPACE POUR UN CARROUSEL / IMAGE DE FOND

-->
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
											<a href="{{ url('cart') }}" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">Ajouter au panier</p>
											</a>
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