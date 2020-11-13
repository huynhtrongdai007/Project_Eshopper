    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                            @php
                                 $i=0;
                             @endphp
                        <div class="carousel-inner">
                            @foreach ($get_slider as $items)
                             @php
                                 $i++;
                             @endphp
                            <div class="item {{$i==1 ? 'active' : ''}}">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-{{$items->name}}</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>{{$items->description}}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/uploads/sliders/'.$items->image) }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('public/frontend/images/home/pricing.png') }}"  class="pricing" alt="" />
                                </div>
                            </div>

                            @endforeach
                         
                           
                         
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
 