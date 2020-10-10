<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css') }} " rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }} " rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/responsive.css') }} " rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
			<a href="index.html"><img src="{{ asset('public/frontend/images/home/logo.png') }} " alt="" /></a>
		</div>
		<div class="content-404">
			<img src="{{ asset('public/frontend/images/404/404.png') }}" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="{{ route('home') }}">Bring me back Home</a></h2>
		</div>
	</div>

  
    <script src="{{ asset('public/frontend/js/jquery.js') }} "></script>
	<script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
</body>
</html>