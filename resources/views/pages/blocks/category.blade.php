        @foreach ($get_category as $items_cat)
        <div class="panel panel-default">
            @if($items_cat->parent==0)
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$items_cat->slug}}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{$items_cat->category_name}}
                    </a>
                </h4>
            </div>
             @endif
            <div id="{{$items_cat->slug}}" class="panel-collapse collapse">
                <div class="panel-body">
                    @foreach ($get_category as $cat_sub)
                        @if($cat_sub->parent == $items_cat->id)
                        <ul>
                            <li><a href="#">{{$cat_sub->category_name}}</a></li>
                        </ul>
                        @endif
                    @endforeach
                    
                </div>
            </div>
           
        </div>
          @endforeach
     
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Kids</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Fashion</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Households</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Interiors</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Clothing</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Bags</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">Shoes</a></h4>
            </div>
        </div>