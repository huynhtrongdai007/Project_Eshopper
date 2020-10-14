
@foreach ($get_product as $items)
    <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <a href="{{ route('product_details',['id'=>$items->id]) }}">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset("public/uploads/products/{$items->image}") }}" alt="" />
                                <h2>{{number_format($items->price)}}.Đ</h2>
                                <p>{{$items->name}}</p>
                                <a onclick="AddCart({{$items->id}})" href="javascript:" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
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
