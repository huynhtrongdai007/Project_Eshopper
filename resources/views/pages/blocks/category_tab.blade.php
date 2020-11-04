
 <div class="col-sm-12">
    
    <ul class="nav nav-tabs">
         @php
             $i=0;
         @endphp
    @foreach ($get_tab_category as $items)
        @php
          $i++;
        @endphp
        <li class="{{$i==1 ? 'active' : ''}}"><a  href="#{{$items->slug}}" data-toggle="tab">{{$items->category_name}}</a></li>
    @endforeach
    </ul>
  
</div>

   @php
             $j=0;
@endphp
  
     @php
      $j++;
        @endphp
<div class="tab-content">
                            
  @foreach ($get_tab_product as $items1)

  
    <div class="tab-pane fade active in" id="{{$items1->slug_product}}">
         
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset("uploads/products/{$items1->image}") }}" alt="" />
                        <h2>{{number_format($items1->price)}}</h2>
                        <p>{{$items1->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                </div>
            </div>
        </div>
          
    </div>
 @endforeach

 

 

   
</div>
