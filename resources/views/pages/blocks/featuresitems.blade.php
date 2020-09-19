 @foreach ($get_product as $items)

 <div class="col-sm-4">
    <a href="{{ route('product_details',['id'=>$items->id]) }}">
    <div class="product-image-wrapper">

        <div class="single-products">
            
                
          <form id="form-add-cart" method="" action="" enctype="mutipart/form-data">
            @csrf
                <div class="productinfo text-center">
                    <img src="{{ asset("public/uploads/products/{$items->image}") }}" alt="" />
                    <h2>{{number_format($items->price)}}.Đ</h2>
                    <p>{{$items->name}}</p>
                    <input type="hidden" name="id" id="{{$items->id}}">
                    <input type="hidden" name="name" id="name" value="{{$items->name}}">
                    <input type="hidden" name="price" id="price" value="{{$items->price}}">
                    <input type="hidden" name="image" id="image" value="{{$items->image}}">
                    <input type="hidden" name="qty" class="cart_quantity_input" value="1">
                    <button type="submit" class="btn btn-default   add-to-cart" data-id_product="{{$items->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
            </form>
               {{--  <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div> --}}
        </div>
          </a>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>
 @endforeach
