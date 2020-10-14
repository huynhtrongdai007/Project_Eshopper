   
    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/sweetalert.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    <script src="{{ asset('public/frontend/js/myscript.js') }}"></script>
    <!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


<script type="text/javascript">
	function AddCart(id) {
		$.ajax({
			url:'AddCart/'+id,
			type:'GET',
		}).done(function(response){
			
			alertify.success('Đã thêm sản phẩm');
		});
	}
  
    $(".cart_delete").on('click', '.cart_quantity_delete', function(event) {
        event.preventDefault();
       
        $.ajax({
            url:'delete-item-cart/'+$(this).data("id"),
            type:'GET',
        }).done(function(){
             setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
             });
        });
    });


    function SaveListItemCart(id) {

         $.ajax({

            url:'save-list-item-cart/'+id+'/'+$("#quantity-item-"+id).val(),
            type:'GET',
        }).done(function(){
             setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
             });
        });
    }

     function RenderCart(response) {
          $("#change-item-cart").empty();
          $("#change-item-cart").html(response);
          $("#total-quantity-show").text($("#total-quantity-cart").val());
          
    }



 </script>