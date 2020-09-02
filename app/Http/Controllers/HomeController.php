<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\SliderModel;

class HomeController extends Controller
{

	private $instants;

	    public function __construct() {
	    	$this->instants = new SliderModel;
	    }

	public function index() {
		$get_slider = $this->instants->getDataIndex();
		return view('pages.master',['get_slider'=>$get_slider]);
	}


}
