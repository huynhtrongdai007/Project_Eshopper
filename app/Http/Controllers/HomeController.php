<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;
use App\Models\Category\CategoryModel;
use App\Models\Brand\BrandModel;
use App\Models\Product\ProductModel;
use App\Models\Post\PostModel;
class HomeController extends Controller
{

	private $instants_slider;
	private $instants_category;
	private $instants_brand;
	private $instants_product;
    private $instants_post;

    public function __construct() {

    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    	$this->instants_brand = new BrandModel;
    	$this->instants_product = new ProductModel;
    	$this->instants_post = new PostModel;
    }

	public function index() {

		$get_slider = $this->instants_slider->getDataIndex();
		$get_category = $this->instants_category->getAllDataIndex();
		$get_brand = $this->instants_brand->getAllDataIndex();
		$get_product = $this->instants_product->getDataIndex();
		$get_tab_category = $this->instants_category->getDataTabCategory();
		$get_tab_product = $this->instants_category->getDataTabProduct();
		return view('pages.master',['get_slider'=>$get_slider,'get_category'=>$get_category,'get_brand'=>$get_brand,'get_product'=>$get_product,'get_tab_category'=>$get_tab_category,'get_tab_product'=>$get_tab_product]);
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

	public function blog() {
		$data['get_category'] = $this->instants_category->getAllDataIndex();
		$data['get_brand'] = $this->instants_brand->getAllDataIndex();
		$data['get_post'] = $this->instants_post->getAllData();
		return view('pages.blogs.blog_list',$data);
	}
	
}
