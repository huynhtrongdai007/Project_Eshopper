<!DOCTYPE html>
<html lang="en">
<head>
   @include('pages.blocks.head')
</head><!--/head-->

<body>
	<header id="header"><!--header-->
  		@include('pages.blocks.header')
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
								@include('pages.blocks.category')
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							@include('pages.blocks.brands')
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src=" {{ asset('public/frontend/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				<div class="col-sm-9">
				
						<div class="blog-post-area">

						<h2 class="title text-center">Latest From our Blog</h2>
							@foreach ($get_post as $items)
						<div class="single-blog-post">
							<h3>{{$items->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i>{{$items->created_at}}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="{{ route('blog-single',['title'=>$items->slug,'id'=>$items->id]) }}">
								<img width="" src="{{ asset("public/uploads/posts/{$items->image}") }}" alt="">
							</a>
							<p>{{$items->description}}</p>
							<a  class="btn btn-primary" href="{{ route('blog-single',['title'=>$items->slug,'id'=>$items->id]) }}">Read More</a>
						</div>
							@endforeach

							<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		@include('pages.blocks.footer')
	</footer><!--/Footer-->
	

  @include('pages.blocks.foot')
</body>
</html>