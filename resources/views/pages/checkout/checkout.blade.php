	<!DOCTYPE html>
<html lang="en">
<head>
   @include('pages.blocks.head')
</head><!--/head-->

<body>
<!--header-->
<header id="header">
    @include('pages.blocks.header')
</header>
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
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
							$total=0;
							$subtotal =0;
						@endphp
						@if (empty(Session::get('cart')))
							<tr><td><h3>Cart Empty</h3></td></tr>
						@else
					
						    


						@foreach (Session::get('cart') as $items)
						@php
							$subtotal = $items['qty'] * $items['price'];
							$total += $subtotal;
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img width="80" src="{{ asset("public/uploads/products/{$items['image']}") }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$items['name']}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($items['price'])}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$items['qty']}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal)}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="" id="{{$items['id']}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
							@endif
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{number_format($total)}}</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{number_format($total)}}</span></td>
										<td><input type="hidden" id="total" value="{{$total}}"></td>
									</tr>
								</table>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
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

   <!-- footer -->
    @include('pages.blocks.footer')
   
    <!-- end footer -->
    <!--foot-->
    @include('pages.blocks.foot')
    <!--end foor-->
</body>
</html>

   <script type="text/javascript">
   	 $(document).ready(function() {
        $('.cart_quantity_delete').click(function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var row = this;
            var _token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url:"{{ route('destroy-cart') }}",
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
   </script>
 
   <script type="text/javascript">
   	$(document).ready(function(){
   		$('#continue').click(function(event) {
   			 event.preventDefault();
   			 var customer_id = $("#customer_id").val();
   			 var lastname = $("#lastname").val();
   			 var middlename = $("#middlename").val();
   			 var firstname = $("#firstname").val();
   			 var phone = $("#phone").val();
   			 var email = $("#email").val();
   			 var address = $("#address").val();
			 var note = $("#notes").val();
			 var total = $("#total").val();
			 var paymen_option = $('#paymen_option').val();
 		 	 var _token = $("meta[name='csrf-token']").attr("content");
 		 
 		 	 $.ajax({
 		 	 	url: '{{ route('save-checkout') }}',
 		 	 	type: 'POST',
 		 	 	data: {customer_id:customer_id,lastname:lastname,middlename:middlename,firstname:firstname,phone:phone,email:email,address:address,note:note,total:total,method:paymen_option,_token:_token},
 		 	 	success:function() {
 		 	
 		 	 			swal( "Check Success","", "success");
 		 	 		setTimeout(function(){
						location.reload();
					},1000);
 		 	 		
 		 	 	}
 		 	 });
 		
 		
   		});
   	});
   </script>