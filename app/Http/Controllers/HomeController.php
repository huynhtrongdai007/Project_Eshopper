<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;
use App\Models\Category\CategoryModel;
use App\Models\Brand\BrandModel;
use App\Models\Product\ProductModel;
class HomeController extends Controller
{

	private $instants_slider;
	private $instants_category;
	private $instants_brand;
	private $instants_product;
    
    public function __construct() {

    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    	$this->instants_brand = new BrandModel;
    	$this->instants_product = new ProductModel;
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

		$product =$this->instants_product->getProductDetails($id);
		$get_category = $this->instants_category->getAllDataIndex();
		$get_brand = $this->instants_brand->getAllDataIndex();
		return view('pages.products.product_details',['product'=>$product,'get_category'=>$get_category,'get_brand'=>$get_brand]);
	}

	public function viewCart() {
		return view('pages.carts.cart');
	}
}
