  <?php
          $message = Session::get('message');
            if($message)
             {
               echo"<div class='alert alert-success'>$message</div>";
               Session::put('message',null);
             }
          ?>
@foreach ($get_product as $items)
    <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <a href="{{ route('product_details',['id'=>$items->id]) }}">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img id="img" src="{{ asset("public/uploads/products/{$items->image}") }}" alt="" />
                                <h2 id="price">{{number_format($items->price)}}.Đ</h2>
                                <p id="name">{{$items->name}}</p>
                                <a onclick="AddCart({{$items->id}})" href="javascript:" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </a>
                  
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a onclick="add_wishlist({{$items->id}});" href="javascript:"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                <input type="hidden" id="customer_id" value="{{Session::get('customer_id')}}">
                            </li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    @endforeach
