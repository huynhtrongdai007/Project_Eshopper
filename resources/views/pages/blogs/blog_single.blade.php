<!DOCTYPE html>
<html lang="en">
<head>
   @include('pages.blocks.head')
</head><!--/head-->

<body>
	<header id="header"><!--header-->
  		@include('pages.blocks.header')
	</header><!--/header-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
								@include('pages.blocks.category')
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							@include('pages.blocks.brands')
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src=" {{ asset('public/frontend/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{$post_single->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{$post_single->author}}</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> {{$post_single->created_at}}</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{ asset("public/uploads/posts/$post_single->image") }}" alt="">
							</a>
							<p>{{$post_single->content}}</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>

							<div class="recommended_items">
								<h2 class="title text-center">recommended posts</h2>
								<ul class="text-uppercase">
									 @foreach ($recommen_post as $items)	
									<li><a href="" ><span >{{$items->title}}</span></a></li>
						
									@endforeach
								</ul>	
							</div>
							



						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="{{ asset('public/frontend/images/blog/socials.png') }}" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{ asset('public/frontend/images/blog/man-one.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Leave a replay</h2>
								<form id="form-comment">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" id="name"  placeholder="write your name...">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" id="email" placeholder="your email address...">
									<div class="blank-arrow">
										<label>Web Site</label>
									</div>
									<input type="email" placeholder="current city...">
								
							</div>
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Comemnt</label>
									</div>
									<span>*</span>
									<textarea name="comment" id="comment" rows="11"></textarea>
									<input type="hidden" id="post_id" value="{{$post_single->id}}">
									<button type="button" class="btn btn-primary btn-comment">post comment</button>
								</div>
							</div>
							</form>
						</div>
					</div><!--/Repaly Box-->
				</div>	
				
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		@include('pages.blocks.footer')
	</footer><!--/Footer-->
  @include('pages.blocks.foot')
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		

		$('.btn-comment').click(function() {
		var post_id = $("#post_id").val();
		var name = $("#name").val();
		var email = $("#email").val();
		var comment = $("#comment").val();
		var _token = $("meta[name='csrf-token']").attr("content");

		if(name=="" || email == "" || comment=="") {
			alert("không được để trống các ô nhập thông tin");
		} else {
			$.ajax({
				url:"{{ route('add-comment') }}",
				type:"POST",
				data:{post_id:post_id,name:name,email:email,comment:comment,_token:_token},
				success:function() {
					setTimeout(function(){
						location.reload();
					});
				 	loadCommant();
					$("#form-comment").trigger("reset");
				}
			});
		}


		});

		function loadCommant() {
			var post_id = $("#post_id").val();
			var _token = $("meta[name='csrf-token']").attr("content");
			$.ajax({
				url:"{{ route('showComment') }}",
				type:"POST",
				data:{post_id:post_id,_token:_token},
				success:function(data) {
					$.each(data,function(index, el) {
						$('.media-list').append("<li class='media'>"+
								
								"<a class='pull-left' href='#'>"+
								"<img class='media-object' src='{{ asset('public/frontend/images/blog/man-two.jpg') }}' alt=''>"+
								"</a>"+
								"<div class='media-body'>"+
									 "<ul class='sinlge-post-meta'>"+
										"<li><i class='fa fa-user'>"+"</i>"+el.name+"</li>"+
										"<li><i class='fa fa-clock-o'>"+"</i> 1:33 pm</li>"+
										"<li><i class='fa fa-calendar'>"+"</i>"+el.created_at+"</li>"+
									"</ul>"+
									"<p>"+el.comment+"</p>"+
									"<button type='button' id="+el.id+"  class='btn btn-primary btn-reply'><i class='fa fa-reply'>"+"</i>"+"Replay"+"</button>"+
									
								"</div>"+
								"<div class='form-reply'>"+
								"</div>"+
							"</li>");
					});
				}

			});
		}

	loadCommant();


	$(".media-list").on('click', '.btn-reply', function(event) {
		event.preventDefault();
		var id = $(this).attr("id");
		alert(id);
	});



	$(".form-reply").append("<div class='row'>"+
								"<div class='col-sm-4'>"+
									"<h2>"+"Leave a replay"+"</h2>"+
									"<form>"+
										"<div class='blank-arrow'>"+
											"<label>"+"Your Name"+"</label>"+
										"</div>"+
										"<span>*</span>"+
										"<input type='text' placeholder='write your name...''>"+
										"<div class='blank-arrow'>"+
											"<label>Email Address</label>"+
										"</div>"+
										"<span>*</span>"+
										"<input type='email' placeholder='your email address...'>"+
										"<div class='blank-arrow'>"+
											"<label>Web Site</label>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"<div class='col-sm-8'>"+
								"<div class='text-area'>"+
									"<div class='blank-arrow'>"+
										"<label>Your Name</label>"+
									"</div>"+
									"<span>*</span>"+
									"<textarea  rows='11'></textarea>"+
									"<a class='btn btn-primary' href=''>post comment</a>"+
								"</div>"+
							"</div>"+
						"</div>");




	});

</script>

 
