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
 <!--/header-->

<!--header-->

<!--slider-->
{{--  <section id="slider">
@include('pages.blocks.slider')
 </section> --}}
<!-- end slider-->
    
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
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{ asset('public/frontend/images/home/shipping.jpg') }}" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                       
                        @include('pages.blocks.featuresitems')
                    </div><!--features_items-->
                    
                    <div class="category-tab"><!--category-tab-->
                       @include('pages.blocks.category_tab')
                    </div><!--/category-tab-->
                    
      {{--               <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                      @include('pages.blocks.recommended_items')
                    </div><!--/recommended_items--> --}}
                    
                </div>
            </div>
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