@extends('frontEnd.masterLayout')

@section('css')
<!-- Custom Theme files -->
<link href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style11.css')}}" /><!-- menu style sheet -->
<link href="{{ asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" media="all">
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="{{ asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //font-awesome icons -->
@endsection

@section('main-content')
    <!--Services-->
    <div class="projects">
       <div class="container">
    	  <div class="projects-inner">
    	  <div class="ban-text">
    					   <div class="choose">
    							<div class="choose_img">
    								 <h4 class="tittle-w3layouts white">Fasilitas yang Kami Tawarkan</h4>
    								   <!-- choose icon -->
    								   <div class="choose_icon">
    										<div class="choose_left">
    											<i class="fa fa-user-md" aria-hidden="true"></i>
    										</div>
    											<div class="choose_right">
    												<h3>DIAGNOSA PENYAKIT</h3>
    												<p>Aplikasi ini dapat membantu peternak dalam mendiagnosis penyakit pada ternaknya berdasarkan pada gejala yang tampak berikut dengan benyebab, cara pencegahan dan pengobatanya.
</p>
    											</div>
    										<div class="clearfix"></div>
    									 </div>

    								  <!-- choose icon -->
    								  <div class="choose_icon">
    									<div class="choose_left">
    										<i class="fa fa-medkit" aria-hidden="true"></i>
    									</div>
    									<div class="choose_right">
    										<h3>PENGETAHUAN</h3>
    										<p>Aplikasi ini memberikan informasi seputar dunia peternakan seperti kesehatan, pakan, reproduksi dan sebagainya</p>
    									</div>
    									<div class="clearfix"></div>
    								 </div>
    							</div>
    						</div>
    					</div>
    	    <div class="banner-slider">
    							<div class="callbacks_container">
    								<ul class="rslides" id="slider3">
    									<li>
    									  <div class="blog-img">
    									  </div>

    									</li>
    									<li>
    									  <div class="blog-img1">
    									  </div>

    								  </li>
    								  <li>
    									  <div class="blog-img2">
    									  </div>

    								  </li>
    								  <li>
    									  <div class="blog-img3">
    									  </div>

    								  </li>
    								</ul>
    						  </div>
    					</div>

    					<div class="clearfix"></div>
    				</div>
          </div>
        </div>
        <!-- end service -->
        @include('frontEnd.partials.bannerBottom')
@endsection

@section('js')
<!-- js -->
<script type='text/javascript' src="{{ asset('frontend/js/jquery-2.2.3.min.js')}}"></script>
<!-- //js -->
<script src="{{ asset('frontend/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

<!--responsiveslides js-->
<script src="{{ asset('frontend/js/responsiveslides.min.js')}}"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });

						});
			</script>
			<script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 3
							  $("#slider3").responsiveSlides({
								auto: true,
								pager:false,
								nav: true,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });

							});
						  </script>

<!--//responsiveslides js-->
<!-- stats -->
	<script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('frontend/js/jquery.countup.js')}}"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!--jarallax -->

	<script src="{{ asset('frontend/js/jarallax.js')}}"></script>
	<script src="{{ asset('frontend/js/SmoothScroll.min.js')}}"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
<!-- //jarallax -->
<script src="{{ asset('frontend/js/SmoothScroll.min.js')}}"></script>
<!--menu script-->
<script type="text/javascript" src="{{ asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{ asset('frontend/js/classie.js')}}"></script>
<script src="{{ asset('frontend/js/demo1.js')}}"></script>
<!--//menu script-->
<!-- banner -->
<script type='text/javascript' src="{{ asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- //banner -->
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
@endsection
