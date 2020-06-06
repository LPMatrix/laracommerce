<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="../images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="#">Women</a></li>
			<li><a href="#">Men</a></li>
			<li><a href="#">Kids</a></li>
			<li><a href="#">Home Deco</a></li>
            <li><a href="#">Contact</a></li>
            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        @endif
                    @endauth
                
            @endif
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="../images/phone.svg" alt=""></div></div>
			<div>+1 912-252-7350</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="{{ url('/') }}">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="../images/logo_1.png" alt=""></div>
						<div>Ayency Stores</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="#">Women</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Kids</a></li>
					<li><a href="#">Home Deco</a></li>
                    <li><a href="#">Contact</a></li>
                    @if (Route::has('login'))
                         @auth
                    <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                    <li><a href="{{ route('login') }}">Login</a></li>
    
                            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                   
                @endif
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="../images/search.png" alt=""></button>
					</form>
				</div>
			
				<!-- Cart -->
				<div class="user"><a href="{{ url('cart') }}"><div><img class="svg" src="../images/cart.svg" alt="cart">
					<div id="cart-refresh">{{Session::has('cart') ? Session::get('cart')->totalQty : '' }}</div>
				</div></a></div>
               
				@if (Route::has('login'))
				@auth
				<!-- User -->
				<div class="user"><a href="{{ route('home') }}"><div><img src="../images/user.svg" alt="profile"></div></a></div>
						@else
						<div class="cart"><a href="{{ route('login') }}"><div><img class="svg" src="../images/password.svg" alt="login"></div></a></div>
	
						@endauth
					
				@endif
{{--                 
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="../images/phone.svg" alt=""></div></div>
					<div>+1 912-252-7350</div>
				</div> --}}
			</div>
		</div>
	</header>