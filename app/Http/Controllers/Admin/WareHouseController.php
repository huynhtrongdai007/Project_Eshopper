<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouse\ModelWareHouse as MainModel;
use App\Models\Product\ProductModel;
use DateTime;
class WareHouseController extends Controller
{

	private $instants;
	private $instants_product;

	public function __construct() {
		$this->instants = new MainModel;
		$this->instants_product = new ProductModel;
	}

    public function index() {
    	$data = $this->instants->getAllData();
    	return view('admin.modules.warehouses.index',compact('data'));
    }

    public function importgoods($id) {
        $single = $this->instants_product->getById($id);
        return view('admin.modules.product.importgoods',compact('single'));
    }


    // method nay dung de nhap them so luong san pham
    public function storeimportgoods(Request $request, $id) {
         $data = $request->except('_token');
         $input_remain = $request->input_remain;        
          $s =  $data['remain'] +  $input_remain;
        $this->instants->inputQuantity($id,$s);
         $insertwarehouse = array(
            'product_id' => $id,
            'input_number' => $input_remain = $request->input_remain,
            'created_at' => new DateTime(),
         );
        $this->instants->insertWareHouse($insertwarehouse);
         return back()->with('message','add quantity SuccessFully');
    }

}
