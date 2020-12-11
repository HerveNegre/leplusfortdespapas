<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="logo_papa-collapse" top="20px" href="{{ route('home') }}"><img src="{{ asset('images/logo_papa_light.png') }}"  alt="logo"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav mr-auto ml-5">
						<li class="nav-item">
							<a class="nav-link"  style="color:#f6bc30" href="{{ route('home') }}">
								<i class="fas fa-home"></i>
								Accueil
							</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a style="color:#154c7b" href="{{ route('products') }}" class="nav-link">
								<i class="fas fa-shopping-bag"></i>
								Produits
							</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="{{ route('contact') }}" class="nav-link">
								<i class="fas fa-envelope"></i>
								Contact
							</a>
						</li>
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">
									<i class="fas fa-wifi"></i>
									Se connecter
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">
									<i class="fas fa-user-plus"></i>
									S'inscrire
								</a>
							</li>
						@else
						<li class="nav-item submenu dropdown">
							<a href="{{ route('orders') }}" class="nav-link">
								<i class="fas fa-truck"></i>
								Commandes
							</a>
						</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('logout') }}">
									<i class="fas fa-sign-out-alt"></i>
									Se déconnecter
								</a>
							</li>
						@endguest
							<li class="nav-item">
								<a class="nav-link" style="color:#1b838c" href="{{ route('cart') }}">
									<i class="fas fa-shopping-cart"></i>
									Mon panier
									@if(Cart::instance('default')->count() > 0)
										<span class="badge badge-warning">{{ Cart::instance('default')->count() }}</span>
									@endif
								</a>
							</li>
					</ul>

				</div>
			</div>
		</nav>
	</div>
	
	{{-- <div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div> --}}
</header>