
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ route('home') }}"><img src="{{ asset('public/frontend/images/home/logo.png') }}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                 @php
                                    $customer_id = Session::get('customer_id');
                                @endphp
                                <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a  href="{{ route('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
                               
                                <li>
                                     @if (empty($customer_id))
                                       <a href="{{ route('login') }}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                    @else
                                        <a href="{{ route('view-checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                     @endif
                                </li>
                     <li><a href="{{ route('view_cart') }}">
                        <i class="fa fa-shopping-cart"></i>
                        @if (Session::has('Cart')!=null)
                            <span id="total-quantity-show" class="badge badge-pill badge-danger"></span>
                        @else
                            <span id="total-quanty-show" class="badge badge-pill badge-danger"> 
                                0
                            </span></a></li>                                    
                         @endif
                            @if ($customer_id)
                              <li>
                                <a href="{{ route('logout') }}"><i class="fa fa-lock"></i>Logout</a>
                             </li>
                             @else
                              <li>
                                <a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a>
                             </li>
                            @endif   
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('shop') }}">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 

                                        <li>
                                            @if (!empty(Session::get('customer_id')))
                                                <a href="{{ route('view-checkout') }}">Checkout</a>
                                            @else
                                                <a href="{{ route('login') }}">Checkout</a>
                                            @endif
                                                
                                        </li> 
                                        <li><a href="{{ route('view_cart') }}">Cart</a></li> 
                                        <li><a href="{{ route('login') }}">Login</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('blog_list') }}">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                <li><a href="{{ route('404') }}">404</a></li>
                                <li><a href="{{ route('contact-us') }}">Contact</a></li>
                            </ul>
                         </div> 
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" id="keywords"  placeholder="Search"></input>
                            <div id="result-search"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->




  {{--   <li><a href="{{ route('home') }}" class="active">Home</a></li>
                                @foreach ($get_menu as $menuParent)

                                <li class="dropdown"><a href="#">{{$menuParent->name}}<i class="fa fa-angle-down"></i></a>

                                   @include('pages.blocks.sub_menu',['menuParent'=>$menuParent])
                                </li> 
                                @endforeach --}}