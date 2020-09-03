<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;
use App\Models\Category\CategoryModel;
class HomeController extends Controller
{

	private $instants_slider;
	private $instants_category;

    public function __construct() {
    	$this->instants_slider = new SliderModel;
    	$this->instants_category = new CategoryModel;
    }

	public function index() {
		$get_slider = $this->instants_slider->getDataIndex();
		$get_category = $this->instants_category->getAllDataIndex();
		return view('pages.master',['get_slider'=>$get_slider,'get_category'=>$get_category]);
	}


}
