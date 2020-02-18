@extends('frontEnd.masterLayout')

@section('css')
<link href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style11.css')}}" /><!-- menu style sheet -->
<link href="{{ asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" media="all">
<link href="{{ asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('main-content')
<div class="w3l_agileits_breadcrumbs">
   <div class="container">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="{{ url('blog') }}">Blog</a><span>«</span></li>

				<li>Single</li>
				</ul>
		</div>
	</div>
</div>
<!-- blog -->
	<div class="blog">
			<!-- container -->
			<div class="container">

				<div class="col-md-4 blog-top-right-grid">
					<div class="Categories stand-w3ls">
						<h3>{{ $nama['title'] }}</h3>
					</div>
				</div>
				<div class="col-md-8 blog-top-left-grid">
					<div class="left-blog left-single">
						<div class="blog-left">
							<div class="single-left-left">
								<img src="{{ asset('/images/posts/' . $nama['image'])}}" alt="" />
                <hr>
                <p style="font-size:12px;">Diposting Oleh <a href="#">{{ $nama['created_by'] }}</a> &nbsp;&nbsp;pada {{ $nama['created_at'] }} &nbsp;&nbsp;</p>
							</div>
							<div class="blog-left-bottom">
								<p style="text-align: justify;">{{ substr(strip_tags($nama['body']), 0) }}</p>
							</div>
						</div>
            <hr>
						<!---728x90--->
						<div class="response">
							<h3>Komentar</h3>
              @foreach($post2->comments as $comment)
							<div class="media response-info">
								<div class="media-left response-text-left">

									<h5><a href="#">{{ $comment->name }}</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>{{ substr(strip_tags($comment->comment), 0) }}</p>
									<ul>
										<li>{{ $comment->created_at }}</li>

									</ul>

								</div>
								<div class="clearfix"> </div>
							</div>
              @endforeach
						</div>
						<!---728x90--->
						<div class="opinion">
							<h3>Berikan Komentar Anda</h3>

                {{ Form::open(['url' => ['comments', $post2->id], 'method' => 'POST'], array('type' => 'hidden', 'id' => '$post_id', 'value' => '$post2->id')) }}

  								{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nama']) }}

  								{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}

  								{{ Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'comment', 'rows' => '5', 'placeholder' => 'Komentar']) }}

  								{{ Form::submit('Tambah Komentar', ['id' => 'tombolSubmit', 'class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}

                {{ Form::close() }}

						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //container -->
	</div>
	<!-- //blog -->
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
