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

              <div class="options-wthree">
                <div class="container">
                  <div class="form-agileits">
                    <div class="form-group">
                      <table>
                        <tbody>
                          <tr>
                            <td>
                              <a href="{{ route('about')}}" class="opt-grids">
                                  <img src="{{ asset('/frontend/icon/aboutIcon.png')}}" height="auto" width="auto" class="img-responsive" alt="" />
                              </a>
                            </td>
                            <td>
                              <a href="{{ route('blog')}}" class="opt-grids">
                                  <img src="{{ asset('/frontend/icon/newsIcon.png')}}" height="auto" width="auto" class="img-responsive" alt="" />
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <a href="{{ route('diagRuminansia')}}" class="opt-grids">
                                  <img src="{{ asset('/frontend/icon/ruminIcon.png')}}" height="auto" width="auto" class="img-responsive" alt="" />
                              </a>
                            </td>
                            <td>
                              <a href="{{ route('diagUnggas')}}" class="opt-grids">
                                  <img src="{{ asset('/frontend/icon/unggasIcon.png')}}" height="auto" width="auto" class="img-responsive" alt="" />
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
