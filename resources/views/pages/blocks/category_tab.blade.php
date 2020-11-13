<div class="col-sm-12">
  <ul class="nav nav-tabs">
    @foreach ($get_tabs_category as $indexCategory => $categoryItem)
      <li class="{{ $indexCategory == 0 ? 'active' : '' }}">
          <a href="#category_tab_{{$categoryItem->id}}" data-toggle="tab">
              {{$categoryItem->category_name}}
          </a>
      </li>
    @endforeach
          
  </ul>
</div>
 <div class="tab-content">
  @foreach ($get_tabs_category as $indexCategoryProduct => $categoryItemProduct)
  <div class="tab-pane fade {{$indexCategoryProduct == 0 ? 'active in' : ''}}" id="category_tab_{{$categoryItemProduct->id}}">
      @foreach ($get_tabs_product as $tabsProduct)
        <div class="col-sm-3">
          <a href="">
             <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                      <img src="{{ asset("public/uploads/products/{$tabsProduct->image}") }}" alt="" />
                      <h2>{{number_format($tabsProduct->price)}}</h2>
                      <p>{{$tabsProduct->name}}</p>
                      <a onclick="AddCart({{$tabsProduct->id}});" href="javascript:"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                  
              </div>
          </div>
          </a>
         
      </div>
      @endforeach
      
  </div>   
  @endforeach   
</div>