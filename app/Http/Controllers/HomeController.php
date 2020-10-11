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
use  App\Models\Contact\ContactModel;
use DB,DateTime;

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
    public function __construct() {

    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    	$this->instants_brand = new BrandModel;
    	$this->instants_product = new ProductModel;
    	$this->instants_post = new PostModel;
    	$this->instants_reviews = new ReviewsModel;
    	$this->instants_comment = new CommentModel;
    	$this->instants_contact = new ContactModel;

    }

	public function index() {

		$get_slider = $this->instants_slider->getDataIndex();
		$get_category = $this->instants_category->getAllDataIndex();
		$get_brand = $this->instants_brand->getAllDataIndex();
		$get_product = $this->instants_product->getDataIndex();
		$get_tab_category = $this->instants_category->getDataTabCategory();
		$get_tab_product = $this->instants_category->getDataTabProduct();
		return view('pages.home',['get_slider'=>$get_slider,'get_category'=>$get_category,'get_brand'=>$get_brand,'get_product'=>$get_product,'get_tab_category'=>$get_tab_category,'get_tab_product'=>$get_tab_product]);
	}


	public function productDetails($id) {

		$data['product'] = $this->instants_product->getProductDetails($id);
		$category_id = $data['product']->category_id;
		$data['getGallery'] = $this->instants_product->getGallery($category_id);
		$data['getRecommenProduct'] = $this->instants_product->getRecommenProduct($category_id,$id);
		$data['get_category'] = $this->instants_category->getAllDataIndex();
		$data['get_brand'] = $this->instants_brand->getAllDataIndex();
		
		return view('pages.products.product_details',$data);
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
		$get_category = $this->instants_category->getAllDataIndex();
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
	      $get_category = $this->instants_category->getAllDataIndex();
		  $get_brand = $this->instants_brand->getAllDataIndex();
	      return view('pages.shops.shop',compact('pagination','get_category','get_brand'))->render();
	     }
 	}

 	public function contactUs () {
 		return view('pages.contact-us');
 	}

 	public function notFound404() {
 		return view('pages.404');
 	}


}
