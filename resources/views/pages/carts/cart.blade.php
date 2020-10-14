@extends('pages.master')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home') }}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			

				
		<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Save</td>
							
						</tr>
					</thead>

					<tbody>
				@if(Session::has('Cart')!=null)
						@foreach (Session::get('Cart')->products as $items)
							<div id="change-item-cart">
								<tr>
								<td class="cart_product">
									<a href=""><img width="80" src="public/uploads/products/{{$items['productInfo']->image}}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$items['productInfo']->name}}</a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="cart_price">
									<p>{{number_format($items['productInfo']->price)}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" id="quantity-item-{{$items['productInfo']->id}}" type="text" name="quantity" value="{{$items['quantity']}}" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{number_format($items['price'])}}₫</p>
								</td>
								<td>
									<i style="font-size: 20px;" onclick="SaveListItemCart({{$items['productInfo']->id}});" id="save-cart-item-{{$items['productInfo']->id}}" class="fa fa-save"></i>
								</td>
								<td class="cart_delete">
									
									<a class="cart_quantity_delete" data-id="{{$items['productInfo']->id}}" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
							</div>
						@endforeach
						@else
						<tr>
							<td><h3>Cart Empty</h3></td>
						</tr>
					@endif
					</tbody>
						 
				</table>
			</div>
		
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if(Session::has('Cart')!=null)
							<li>Cart Sub Total <span id="total">{{number_format(Session::get('Cart')->totalPrice)}}₫</span></li>
							@else
							<li>Cart Sub Total <span id="total">0 ₫</span></li>

							@endif
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							@if (Session::has('Cart')!=null)
							<a class="btn btn-default delete" id="delete-all-items-cart" href="{{ route('destroy-all-cart') }}">Delete All Cart</a> 
							@endif
							@if (empty(Session::get('customer_id')))
								<a   class="btn btn-default check_out" href="{{ route('login') }}">Check Out</a> 
							@else
								<a class="btn btn-default check_out" href="{{ route('view-checkout') }}">Check Out</a>
							@endif
							 
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
