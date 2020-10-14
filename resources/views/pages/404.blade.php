<!DOCTYPE html>
<html lang="en">
<head>
@include('pages.blocks.head')
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

  
@include('pages.blocks.foot')
</body>
</html>