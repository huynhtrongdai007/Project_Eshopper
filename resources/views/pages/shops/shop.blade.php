 @extends('pages.master')
 @section('content')
	<section id="advertisement">
		<div class="container">
			<img src="{{ asset("public/frontend/images/shop/advertisement.jpg") }} " alt="" />
		</div>
	</section>
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
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($pagination as $items)			
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset("public/uploads/products/{$items->image}") }}" alt="" />
										<h2>{{number_format($items->price)}}.Đ</h2>
										<p>{{$items->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>
						<ul class="pagination">
							{!! $pagination->links() !!}
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	   <script type="text/javascript">
    $(document).ready(function(){
 
 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });
 
 function fetch_data(page)
 {
  $.ajax({
   url:"get_ajax_data?page="+page,
   success:function(data)
   {
    $('.single-productinfo').html(data);
   }
  });
 }
 
});
</script>
 @endsection
