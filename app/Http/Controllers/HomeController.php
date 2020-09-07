<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;
use App\Models\Category\CategoryModel;
use App\Models\Brand\BrandModel;
class HomeController extends Controller
{

	private $instants_slider;
	private $instants_category;

    public function __construct() {
    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    	$this->instants_brand = new BrandModel;
    }

	public function index() {
		$get_slider = $this->instants_slider->getDataIndex();
		$get_category = $this->instants_category->getAllDataIndex();
		$get_brand = $this->instants_brand->getAllDataIndex();
		return view('pages.master',['get_slider'=>$get_slider,'get_category'=>$get_category,'get_brand'=>$get_brand]);
	}


}
