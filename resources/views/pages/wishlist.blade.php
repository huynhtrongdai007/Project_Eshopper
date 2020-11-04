@extends('pages.master')
@section('content')
	
	 <h2 class="title text-center">Sản Phẩm Yêu Thích</h2>

    <section id="cart_items">
<div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Name</td>
                            <td class="price">Price</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        <div id="change-item-cart">
                            @foreach ($get_wishlists as $items)
                            <tr>
                                <td><img id="img" width="80" src="{{ asset("uploads/products/{$items->image}") }}" alt="" /></td>
                                <td><p id="name">{{$items->name}}</p></td>
                                <td><h2 id="price" class="text-primary">{{number_format($items->price)}}.Đ</h2></td>
                                <td><a href="{{ route('product_details',['id'=>$items->id]) }}">Xem</a></td>
                            </tr>
                           @endforeach
                        </div>
                    </tbody>
                         
                </table>
            </div>
        </section>



@endsection

