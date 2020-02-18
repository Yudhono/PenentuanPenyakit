<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Clinical Care a Mobile App Flat Bootstrap Responsive Website Template | Main :: W3layouts</title>
<!-- For-Mobile-Apps-and-Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clinical Care Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, SmartPhone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps-and-Meta-Tags -->
<link href="{{ asset('frontend/css/navbar.css')}}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@yield('css')

<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- //web-fonts -->
</head>
<body class="bg">
		<section class="header-w3ls">
			<div class="bottons-agileits-w3layouts">
				@if (Route::has('login'))
					@auth
						<a class="page-scroll" href="#myModal4" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}</a>
					@else
					<a class="page-scroll" href="#myModal2" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>.
					<a class="page-scroll" href="#myModal3" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Register</a>
					@endauth
			 @endif
			</div>
		<h1><a href="#" style="float:left; margin-top:7px;">Mantriku</a></h1>
		<div class="clearfix"> </div>
		</section>
		<nav class="main-nav navbar-default" role="navigation">
	  	<div class="container-fluid">
				<ul class="nav navbar-nav">
				  <li class="nav-item"><a class="page-scroll" href="{{ route('landing')}}">Home</a></li>
					<li class="nav-item"><a class="page-scroll" href="{{ route('khususD')}}">Diagnosa</a></li>
				  <li class="nav-item"><a class="page-scroll" href="{{ route('blog')}}">Berita</a></li>
					<li class="nav-item"><a class="page-scroll" href="{{ route('about')}}">Tentang</a></li>
				</ul>
	  	</div>
		</nav>



<!-- //menu -->
<!-- modal -->
	@include('frontEnd.partials.logoutModal')
	@include('frontEnd.partials.loginModal')
	<!-- //modal -->
	<!-- modal -->
	@include('frontEnd.partials.registerModal')
	<!-- //modal -->

<!-- banner slider-->
@include('frontEnd.partials.bannerSlider')
<!-- //banner-bottom -->

<!-- content -->
	@yield('main-content')


<!--  footer -->
  @include('frontEnd.partials.footer')
<!-- //footer -->

@yield('js')
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
