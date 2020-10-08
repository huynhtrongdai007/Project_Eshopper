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
								<form id="form-add-cart" method="" action="" enctype="mutipart/form-data">
								
								
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
									<input type="hidden" name="id" id="id" value="{{$product->id}}">
									<input type="hidden" name="name" id="name" value="{{$product->name}}">
									<input type="hidden" name="price" id="price" value="{{$product->price}}">
									<input type="hidden" name="image" id="image" value="{{$product->image}}">
									<button  type="submit" class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Category:</b>{{$product->category_name}}</p>
							{{-- 	<p><b>Condition:</b> New</p> --}}
								<p><b>Brand:</b>{{$product->brand_name}}</p>
								<a href=""><img src="{{ asset('public/frontend/images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
								</form>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#form-add-cart').on('click', '.add-to-cart', function(event) {
			event.preventDefault();
			var id  =  $('#id').val();
			var qty =  $('.cart_quantity_input').val();
			var name = $('#name').val();
			var price = $('#price').val();
			var image = $('#image').val();
			var _token = $("meta[name='csrf-token']").attr("content");
		
			$.ajax({
				url:"{{ route('add-to-cart') }}",
				type:"POST",
				data:{id:id,qty:qty,name:name,price:price,image:image,_token:_token},
				success:function() {
					swal( "Đã Thêm Vào Giỏ Hàng","", "success");
				}
			});
		}); 
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
			function loadReviews() {
			var product_id = $('#id').val();
			var _token = $("meta[name='csrf-token']").attr("content");
			$("#load-Reviews").html("");
			$.ajax({
				url:"{{ route('showComment') }}",
				type:"POST",
				data:{id:product_id,_token:_token},
				success:function(data) {
					console.log(data.name);
					$.each(data,function(key,value){
						$("#load-Reviews").append("<ul>"

							+"<li><a href=''><i class='fa fa-user'>"+value.name+"</i></a></li>"+
							"<li><a href=''><i class='fa fa-calendar-o'></i>"+value.created_at+"</a></li>"+
							"<p>"+value.comment+"</p>"+
							"</ul>");
					});
				}
			});
		}
		loadReviews();

		$("#form-reviews").on('click', '.btn-comment-reviews', function(event) {
			event.preventDefault();

			var product_id = $('#id').val();
			var reviewsname = $("#reviewsname").val();
			var email = $("#email").val();
			var comment = $("#comment").val();
			var _token = $("meta[name='csrf-token']").attr("content");

			if (reviewsname=="" || email=="" || comment=="") {
				alert("Không được để trống ô nhập thông tin");
			}else {
				$.ajax({
				url:"{{ route('admin.add-reviews') }}",
				type:"POST",
				data:{product_id:product_id,name:reviewsname,email:email,comment:comment,_token:_token},
				success:function(){
					swal( "Cám ơn bạn đã đánh giá","", "success");
					 loadReviews();
					$("#form-reviews").trigger("reset");


				}

			});			
			}
			
		});
	});
</script>



