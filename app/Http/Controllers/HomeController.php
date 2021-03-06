<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;
use App\Models\Category\CategoryModel;
use App\Models\Brand\BrandModel;
use App\Models\Product\ProductModel;
use App\Models\Post\PostModel;
use App\Models\Reviews\ReviewsModel;
use App\Models\Comment\CommentModel;
use App\Models\Contact\ContactModel;
use App\Models\MenuModel;

use DB,DateTime;
use Session;
class HomeController extends Controller
{

	private $instants_slider;
	private $instants_category;
	private $instants_brand;
	private $instants_product;
    private $instants_post;
    private $instants_reviews;
    private $instants_comment;
    private $instants_contact;
    private $instants_menu;
    
    public function __construct() {

    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    	$this->instants_brand = new BrandModel;
    	$this->instants_product = new ProductModel;
    	$this->instants_post = new PostModel;
    	$this->instants_reviews = new ReviewsModel;
    	$this->instants_comment = new CommentModel;
    	$this->instants_contact = new ContactModel;
    	$this->instants_menu = new MenuModel;
    }

	public function index() {

		$get_slider = $this->instants_slider->getDataIndex();
		$get_category = CategoryModel::where('parent',0)->get(); 	
		$get_brand = $this->instants_brand->getAllDataIndex();
		$get_product = $this->instants_product->getDataIndex();
		$get_recommended_product = $this->instants_product->getRecommendedProduct();
		$get_menu = MenuModel::where('parent_id',0)->get();
		return view('pages.home',compact('get_slider','get_category','get_brand','get_product','get_recommended_product','get_menu'));
	}


	public function categoryDetails($slug,$categoryId) {
		$get_category = CategoryModel::where('parent',0)->get();
		$get_brand = $this->instants_brand->getAllDataIndex();
		$products = ProductModel::where('category_id',$categoryId)->paginate(12);
		return view('pages.products.category.list',compact('get_category','get_brand','products'));
	}


	public function productDetails($id) {

		$product = $this->instants_product->getProductDetails($id);
		$category_id = $product->category_id;
		$getGallery = $this->instants_product->getGallery($category_id);
		$getRecommenProduct = $this->instants_product->getRecommenProduct($category_id,$id);
		$get_category = $this->instants_category->getAllDataIndex();
		$get_brand = $this->instants_brand->getAllDataIndex();
		$get_product = $this->instants_product->getDataIndex();
		return view('pages.products.product_details',compact('product','getRecommenProduct','get_category','get_brand','getGallery'));
	}

	public function showReviews(Request $request) {
		$id = $request->id;
		$result = $this->instants_reviews->showReviews($id);
		return response()->json($result);
	}


	public function blog() {
		$data['get_category'] = $this->instants_category->getAllDataIndex();
		$data['get_brand'] = $this->instants_brand->getAllDataIndex();
		$data['get_post'] = $this->instants_post->getAllData();
		return view('pages.blogs.blog_list',$data);
	}

	public function blogSingle($title,$id) {
		$data['get_category'] = $this->instants_category->getAllDataIndex();
		$data['get_brand'] = $this->instants_brand->getAllDataIndex();
		$data['post_single'] = $this->instants_post->getById($id);
		$category_post_id = $data['post_single']->category_post_id;
		$data['recommen_post'] = $this->instants_post->getRecommenPost($category_post_id,$id);
		return view('pages.blogs.blog_single',$data);
	}
	
	public function showComment(Request $request) {
		$post_id = $request->post_id;
		$result = $this->instants_comment->showComment($post_id);
		return  response()->json($result);
	}

	public function Viewshop() {
		$get_category = CategoryModel::where('parent',0)->get(); 	
		$get_brand = $this->instants_brand->getAllDataIndex();
		$getDataIndex = $this->instants_product->getDataIndex();
		$pagination = $this->instants_product->pagination();

		return view('pages.shops.shop',compact('get_category','get_brand','getDataIndex','pagination'));
	}

	function get_ajax_data(Request $request)
    {
	     if($request->ajax())
	     {
	      $pagination = ProductModel::paginate(6);
	     
	      return view('pages.shops.shop',compact('pagination','get_category','get_brand'))->render();
	     }
 	}


 	function wishlist() {
 		$id = Session::get('customer_id');
 		$get_wishlists = $this->instants_product->getWishLists($id);
 		return view('pages.wishlist',compact('get_wishlists'));
 	}

 	function addWishlist(Request $request) {
 		$data = $request->except("_token");
 		$product_id = $request->product_id;
 		$checkWishList = $this->instants_product->checkWitshList($product_id);
 		if ($checkWishList==true) {
 			return redirect()->route('home')->with('message','sản phẩm này đã được thêm rồi');
 		}
 		
 		$data['created_at'] = new DateTime();
 		$success = $this->instants_product->addWishlist($data);
 		if ($success) {
 			 return back()->with('message','đã thêm sản phẩm yêu thích');

 		}
 	}

 	function destroyWishlist(Request $request) {
 		$id = $request->id;
 		$this->instants_product->deleteWishList($id);
 	}

 	public function search(Request $request) {
 		$data = $request->except('_token');
 		if ($data['query']) {
 			$product = $this->instants_product->searchProduct($data['query']);
 			$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
 			$src = "public/uploads/products/";
 			foreach ($product as $items) {

 				$output.='

 					<li>
 					<img  width="80" src='.asset('public/uploads/products/'.$items->image.'').'>
 					<a href='.route('product_details',['id'=>$items->id]).'>'.$items->name.'</a>
 					</li>

 				';
 			}

 			$output.='</ul>';
 			echo $output;
 		}

 	}

 	function checkWishList(Request $request) {
 		$product_id = $request->product_id;
 		$this->instants_product->checkWitshList($product_id);
 	}

 	public function contactUs () {
 		return view('pages.contact-us');
 	}

 	public function notFound404() {
 		return view('pages.404');
 	}


}
