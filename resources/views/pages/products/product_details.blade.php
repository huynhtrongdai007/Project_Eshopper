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
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
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
							<img src="{{ asset('public/frontend/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset("public/uploads/products/{$product->image}") }}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
									
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	  @php
		                                  $i =1;
		                                @endphp
								    	@foreach ($getGallery as $key => $gallery)
										@if ($i % 2 != 0)
										<div class="item {{($key == 0) ? "active" : "" }}">
										  <a  href=""><img width="100" src="{{ asset("public/uploads/products/{$gallery->image}") }}"></a> 
										</div>
										@endif
										@endforeach
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->

								{{-- <img src="{{ asset("public/uploads/images/product-details/news.jpg") }}" class="newarrival" alt="" /> --}}
							
								
								
								<h2>{{$product->name}}</h2>
								
								<img name="image" src="{{ asset('public/frontend/images/product-details/rating.png') }}" alt="" />
								<span>
									<span>{{number_format($product->price)}}.Đ</span>
									<div class="clearfix"></div>
									<label>Quantity:</label>

									<div class="cart_quantity_button">
										<a class="cart_quantity_up"   href=""> + </a>
											<input name="qty"  class="cart_quantity_input" value="1" type="text"  size="2">
										<a class="cart_quantity_down"  href=""> - </a>
									</div>
									<a  onclick="AddCartDetail({{$product->id}})" href="javascript:" class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>	
								</span>
								<p><b>Category:</b>{{$product->category_name}}</p>
							{{-- 	<p><b>Condition:</b> New</p> --}}
								<p><b>Brand:</b>{{$product->brand_name}}</p>
								<a href=""><img src="{{ asset('public/frontend/images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							
						
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<div id="load-Reviews"></div>
										<p><b>Write Your Review</b></p>
									<form id="form-reviews">
										<span>
											<input type="text" id="reviewsname" name="name" placeholder="Your Name"/>
											<input type="email" id="email" name="email" placeholder="Email Address"/>
											<input type="hidden" id="id" value="{{$product->id}}">
										</span>
										<textarea name="comment" id="comment" ></textarea>
										<b>Rating: </b> <img src="{{ asset('public/frontend/images/product-details/rating.png') }}" alt="" />
										<button type="button" class="btn btn-default pull-right btn-comment-reviews">
											Submit
										</button>
									</form>

								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					<div class="recommended_items"><!--recommended_items-->
					 <h2 class="title text-center">recommended items</h2>
                        
                      @include('pages.blocks.recommended_items')
					</div><!--/recommended_items-->
					
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
