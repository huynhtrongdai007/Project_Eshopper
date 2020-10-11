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
    <section>
        <div class="container">
            @yield('content')       
        </div>

    </section>
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
        $('.add-to-cart').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id_product');
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
            $('#search').on('keyup',function(){ 
                $value = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>