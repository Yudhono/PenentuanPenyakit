<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Fullscreen Background Image Slideshow with CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style11.css')}}" /><!-- menu style sheet -->
        <link href="{{ asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" media="all">
        <link href="{{ asset('frontend/css/style11.css')}}" type="text/css" rel="stylesheet" media="all">
        <!-- //Custom Theme files -->
        <!-- font-awesome icons -->
        <link href="{{ asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontendLogin/css/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontendLogin/css/style1.css')}}" />
		<script type="text/javascript" src="{{ asset('frontendLogin/js/modernizr.custom.86080.js')}}"></script>
    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3></h3></div></li>
            <li><span>Image 02</span><div><h3></h3></div></li>
            <li><span>Image 03</span><div><h3></h3></div></li>
            <li><span>Image 04</span><div><h3></h3></div></li>
            <li><span>Image 05</span><div><h3></h3></div></li>
            <li><span>Image 06</span><div><h3></h3></div></li>
        </ul>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <div class="bottons-agileits-w3layouts2" style="margin-top:15px;">
                  @if (Route::has('login'))
                    @auth
                      <a class="page-scroll" href="#myModal4" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}</a>
                    @else
                    <a class="page-scroll" href="#myModal2" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>.
                    <a class="page-scroll" href="#myModal3" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Register</a>
                    @endauth
                 @endif
                </div>
                @include('frontEnd.partials.logoutModal')
                @include('frontEnd.partials.loginModal')
                @include('frontEnd.partials.registerModal')
            </div><!--/ Codrops top bar -->
        </div>

        <script type='text/javascript' src="{{ asset('frontend/js/jquery-2.2.3.min.js')}}"></script>
        <!-- //js -->
        <script src="{{ asset('frontend/js/scripts.js')}}"></script>
        <!--menu script-->
        <script type="text/javascript" src="{{ asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
        <script src="{{ asset('frontend/js/classie.js')}}"></script>
        <script src="{{ asset('frontend/js/demo1.js')}}"></script>
        <!--//menu script-->
        <script type="text/javascript">
        	jQuery(document).ready(function($) {
        		$(".scroll").click(function(event){
        			event.preventDefault();
        			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        		});
        	});
        </script>
        <!--js for bootstrap working-->
        	<script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
        <!-- //for bootstrap working -->
    </body>
</html>
