@extends('pages.master')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>

							<form action="" method="post">
								@php
								$customer_id = Session::get('customer_id');

								@endphp
								<input type="hidden" name="customer_id" id="customer_id" value="{{$customer_id}}">
								<input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" placeholder="Enter last Name*">
								<input type="text" name="middlename" id="middlename" value="{{old('middlename')}}" placeholder="Enter middle Name">
								<input type="text" name="firstname" id="firstname" value="{{old('firstname')}}" placeholder="Enter first Name*">
								<input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder="Enter Phone">
								<input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Enter Email">
								<textarea style="height: 100px;" name="address" id="address" placeholder="Enter Address*">{{old('address')}}</textarea>
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" id="continue" href="">Continue</a>
						</div>
					</div>
		
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="note" id="notes" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
			<span>Cart Sub Total:</span>
			@if (Session::has('Cart')!=null)
			<input type="text" disabled="" id="total" value="{{number_format(Session::get('Cart')->totalPrice)}}">
			@else
				<input type="text" id="total" value="0">
			@endif
			

			<h4>Hình thức thanh toán</h4><br/>
			<div class="payment-options mt-5">
					<span>
						<label><input name="method" id="paymen_option" value="ATM" type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input name="method" id="paymen_option" value="Tiền Mặt" type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input name="method" id="paymen_option" value="Ghi Nợ" type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
	@endsection
{{--    <script type="text/javascript">
   	 $(document).ready(function() {
        $('.cart_quantity_delete').click(function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var row = this;
            var _token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url:"",
                type:"POST",
                data:{id:id,_token:_token},
                success:function() {
                  
                    // $(row).closest("tr").hide();
                    setTimeout(function(){
                        location.reload();
                    });
                }

            });

        });
    });
   </script> --}}
 
