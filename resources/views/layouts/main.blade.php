<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@yield('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Ayency Stores template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-4.1.2/bootstrap.min.css') }}">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">

@yield('style')
</head>
<body>


<!-- Menu -->



    @include('layouts/nav')
    @yield('content')
    @include('layouts/footer')


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('css/bootstrap-4.1.2/popper.js ') }} "></script>
<script src="{{ asset('css/bootstrap-4.1.2/bootstrap.min.js ') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js ') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js ') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js ') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js ') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js ') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js ') }}"></script>
<script src="{{ asset('plugins/easing/easing.js ') }}"></script>
<script src="{{ asset('plugins/progressbar/progressbar.min.js ') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js ') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/toastr.init.js') }}"></script>
@yield('script')
<script src="{{ asset('js/custom.js ') }}"></script>

<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('[name="_token"]').val()
	    }
	}); 

	 $(function(){
		$('[id^=cart]').each(function(index, el) {
			$(this).click(function(event) {
		    	var id = $(this).text().trim();
		    	console.log(id);

		    	$.ajax({
		    	    url: '/add-to-cart/'+id+'',
		    	    type: "GET", 
		    	    success: function(response) {
		    	         var type = (response.alert);
		    	          switch(type){
		    	              case 'info':
		    	                  toastr.info(response.message);
		    	                  break;
		    	              case 'warning':
		    	                  toastr.warning(response.message);
		    	                  break;
		    	              case 'success':
		    	                  toastr.success(response.message);
		    	                  break;
		    	              case 'error':
		    	                  toastr.error(response.message);
		    	                  break;
		    	         
		    	         }
		    	   
		    	    $('#cart-refresh').load(location.href + ' #cart-refresh');
		    	    console.log(response);     
		    	  }
		    	});

			 });
		   
	   

	  	});


	});   


</script>

<!-- <script>
	$(document).ready(function(){
		alert('hey')
	});
        
</script> -->

</body>
</html>