@extends('frontEnd.masterLayout')

@section('css')
<link href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style11.css')}}" /><!-- menu style sheet -->
<link href="{{ asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" media="all">
<link href="{{ asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('main-content')
<div class="projects">
  <div class="container">
    <div class="w3ls_popular_posts">
      <h4 class="tittle-w3layouts">Berita Terkini</h4>
      @foreach($nama as $post)
      <div class="agileits_popular_posts_grid">
        <div class="w3agile_special_deals_grid_left_grid">
          <a href="{{ url('blogSingle/'. $post['id'] ) }}"><img src="{{ asset('/images/posts/' . $post['image'])}}" height="auto" width="auto" class="img-responsive" alt="" /></a>
        </div>
        <h4><a href="{{ url('blogSingle/'. $post['id'] ) }}">{{ $post['title'] }}</a></h4>
        <h5><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post['created_at'] }}</h5>
      </div>
      @endforeach
    </div>
  </div>
  <div class="text-center">
    {!! $posts->links() !!}
	</div>
</div>
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
