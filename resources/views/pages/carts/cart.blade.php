<!DOCTYPE html>
<html lang="en">
<head>
@include('pages.blocks.head')
</head><!--/head-->

<body>
<header id="header">
    @include('pages.blocks.header')
</header>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home') }}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
				<form action="{{ route('update-cart') }}" method="POST">
				@csrf
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
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
						<tr>
							<td id="cart_empty"><h3>Cart Empty</h3></td>
						</tr>
							@else
						
						
					@foreach (Session::get('cart') as $key => $items)
						@php
							$subtotal = $items['qty'] * $items['price'];
							$total += $subtotal;
						@endphp
						<tr>
							<td class="cart_product ">
								<a href=""><img  width="100" src="{{ asset("public/uploads/products/{$items['image']}") }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$items['name']}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p class="price_jq">{{number_format($items['price'])}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"   href=""> + </a>
									<input class="cart_quantity_input" id="{{$items['qty']}}"  value="{{$items['qty']}}" type="text" name="quantity[{{$items['id']}}]" autocomplete="off" size="2">
									<a class="cart_quantity_down"  href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal)}}</p>
							</td>
							<td class="cart_delete">
									<a class="cart_quantity_delete" id="{{$items['id']}}" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
							
					@endforeach
 						<tr>
							<td><input class="btn btn-default btn-sm update" value="Update" type="submit"></td>
					  </tr>
						@endif
						  
					</tbody>
				 
				</table>
			</div>
		</form>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="total">{{number_format($total)}}</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
						
						    <a class="btn btn-default delete"  href="">Delete All Cart</a> 
							@if (empty(Session::get('customer_id')))
								<a class="btn btn-default check_out" href="{{ route('login') }}">Check Out</a> 
							@else
								<a class="btn btn-default check_out" href="{{ route('view-checkout') }}">Check Out</a>
							@endif
							 
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
	@include('pages.blocks.footer')
	</footer><!--/Footer-->
    @include('pages.blocks.foot')
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
		$('.delete').click(function(event) {
			event.preventDefault();
			$.ajax({
				url:"{{ route('destroy-all-cart') }}",
				type:"GET",
				success:function() {
					setTimeout(function(){
						location.reload();
					});
				}
			});
		});
		

	});
</script	