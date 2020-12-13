<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.html"><img src="" alt="logo"></a>
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
							<a class="nav-link" href="{{ route('home') }}">
								<i class="fas fa-home mr-1"></i>
								Accueil
							</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="{{ route('products') }}" class="nav-link">
								<i class="fas fa-shopping-bag mr-1"></i>
								Produits
							</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="{{ route('contact') }}" class="nav-link">
								<i class="fas fa-envelope mr-1"></i>
								Contact
							</a>
						</li>
					</ul>

					<ul class="nav navbar-nav menu_nav ml-auto">
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">
									<i class="fas fa-wifi mr-1"></i>
									Se connecter
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">
									<i class="fas fa-user-plus mr-1"></i>
									S'inscrire
								</a>
							</li>
						@else
							<li class="nav-item submenu dropdown">
								<a href="{{ route('orders') }}" class="nav-link">
									<i class="fas fa-truck mr-1"></i>
									Commandes
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('logout') }}">
									<i class="fas fa-sign-out-alt mr-1"></i>
									Se déconnecter
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('myProfile') }}">
									<i class="fas fa-user mr-1"></i>
									Mon Compte
								</a>
							</li>
						@endguest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('cart') }}">
									<i class="fas fa-shopping-cart mr-1"></i>
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