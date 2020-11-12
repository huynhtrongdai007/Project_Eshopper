<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      @foreach ($get_recommended_product as $keyRecommend => $recommendedProduct)
       @if ($keyRecommend % 3 == 0)
        <div class="item {{$keyRecommend == 0 ? 'active' : ''}}"> 
       @endif
          <div class="col-sm-4">
              <div class="product-image-wrapper">
                  <div class="single-products">
                      <div class="productinfo text-center">
                          <img src="{{ asset("public/uploads/products/{$recommendedProduct->image}") }}" alt="" />
                          <h2>{{number_format($recommendedProduct->price)}}</h2>
                          <p>{{$recommendedProduct->name}}</p>
                          <a onclick="AddCart({{$recommendedProduct->id}})" href="javascript:" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                  </div>
              </div>
          </div>
          @if ($keyRecommend % 3 == 2)
          </div>
          @endif
      @endforeach
  </div>
   <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>          
</div>


{{--   <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      @foreach ($get_recommended_product as $keyRecommend => $recommendedProduct)
       @if ($keyRecommend % 3 == 0)
        <div class="item {{$keyRecommend == 0 ? 'active' : ''}}"> 
       @endif                  
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="images/home/recommend1.jpg" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>
              
            </div>
          </div>
        </div>
       @if ($keyRecommend % 3 == 2)
        </div>
        @endif
    @endforeach
     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
      </a>      
  </div> --}}