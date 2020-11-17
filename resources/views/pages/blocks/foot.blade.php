   
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
  
    function AddCartDetail(id) {

        $.ajax({
            url:"{{ route('AddCartDetail',['id']) }}",
            type:'GET'
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


    $(document).ready(function(){
            function loadReviews() {
            var product_id = $('#id').val();
            var _token = $("meta[name='csrf-token']").attr("content");
            $("#load-Reviews").html("");
            $.ajax({
                url:"{{ route('showReviews') }}",
                type:"POST",
                data:{id:product_id,_token:_token},
                success:function(data) {
                    
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
            console.log(note);
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


   <script type="text/javascript">
       function add_wishlist(id) {
         var product_id = id;
         var customer_id = $('#customer_id').val();
         var _token = $("meta[name='csrf-token']").attr("content");
        if(customer_id=="") {
            alert("xin vui lồng đăng nhâp");
        }else {
            $.ajax({
                url: '{{ route('add-wishlist') }}',
                type: 'POST',
                data: {product_id:product_id,customer_id:customer_id,_token},
                success:function(data) {
                      alertify.success('Đã thêm sản phẩm');
                }
            });
        }
    }
   </script>
   {{-- xóa wishlist --}}
   <script type="text/javascript">
                $(document).ready(function(){
                  $(".delete-wishlist").on('click', function() {
                  
                     var element =(this);
                     var id = $(this).attr('id');
                     console.log(id);
                     var _token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url:"{{ route('destroy-wishlist') }}",
                        type:"POST",
                        data:{id:id,_token:_token},
                        success:function() {
                            $(element).closest('tr').hide();
                        }
                    });
                  });
                });
   </script>

   <script type="text/javascript">
       $("#keywords").keyup(function() {
           var query = $(this).val();
           if (query.length > 0) {
             var _token = $("meta[name='csrf-token']").attr("content");
             $.ajax({
                url:"{{ route('search') }}",
                method:"POST",
                data:{query:query,_token:_token},
                success:function(data) {

                    $("#result-search").fadeIn();
                    $("#result-search").html(data);
                }
             });

           }else {
                $("#result-search").fadeOut();
           }
           
       });
   </script>

