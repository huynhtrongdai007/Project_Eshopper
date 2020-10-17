@extends('pages.master')
@section('content')
	
	 <h2 class="title text-center">Sản Phẩm Yêu Thích</h2>
@foreach ($get_wishlists as $items)
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
                </div>
            </div>
    @endforeach


@endsection