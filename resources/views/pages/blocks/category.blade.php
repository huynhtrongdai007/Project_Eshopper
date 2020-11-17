        @foreach ($get_category as $category)
        <div class="panel panel-default">
        
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->slug}}">
                        <span class="badge pull-right">
                        @if ($category->categoryChidrent->count())
                             <i class="fa fa-plus"></i>
                        @endif
                           
                        </span>
                        {{$category->category_name}}
                    </a>
                </h4>
            </div>  
         
            <div id="{{$category->slug}}" class="panel-collapse collapse">
                <div class="panel-body">
                    @foreach ($category->categoryChidrent as $categoryChidrent)
                        <ul>
                    <li><a href="{{ route('category.product',
                    ['slug'=>$categoryChidrent->slug,'id'=>$categoryChidrent->id]) }}">
                            {{$categoryChidrent->category_name}}
                        </a>
                    </li>
                        </ul>
                    
                    @endforeach
                    
                </div>
            </div>
           
        </div>
         @endforeach
     
     