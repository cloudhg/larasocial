<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @section('head')
        @include('partials.head') {{--head.blade--}}
    @show
</head>


<body>   
	
    @section('nav')
	    @include('partials.nav') {{--head.blade--}}
    @show

    <main class="py-4">
        <div class="container">
			
            @section('content')
			  hallo
			@show			
			
        </div>
    </main>
</body>

<footer>


  {{--@section('fbtest')
<div class="footer">
  <div class="row justify-content-center">
    <div class="col-md-12 col-xs-12 col-sm-6 col-lg-6">
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src=
        "https://connect.facebook.net/sdk.js#xfbml=1&version=v4.0"></script>
      <div class="fb-comments" data-href=
        "http://127.0.0.1/ch07/HelloLaravel/public/board" 
	     data-width="" data-numposts="5"></div>
	</div>
  </div>
</div>
	@stop--}}

	{{--@yield('nav')--}}

</footer>
</html>