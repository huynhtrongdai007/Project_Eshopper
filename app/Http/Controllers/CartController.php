<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\ProductModel;
use Cart;
use Session;
use DB;
session_start();
class CartController extends Controller
{
	private $instants_product;

	  public function __construct() {
    	$this->instants_product = new ProductModel;
    }

    public function viewCart(Request $request) {
    	$url_cannonical = $request->url();
		return view('pages.carts.cart',['url_cannonical'=>$url_cannonical]);
	}

	public function addToCart(Request $request) {
		$data = $request->except('_token');
		$cart = Session::get('cart');
		$session_id = session_id();
		$product_id['id'] = $request->id;
		$qty['qty'] = $request->qty;
		
		
		 if ($cart==true) {
			$is_avaiable = 0;
			foreach ($cart as $key => $val) {
				if ($val['id']==$product_id['id']) {
					$is_avaiable++;
				}
			}

			if ($is_avaiable==0) {
				$cart[]=array(

				'id'=>$product_id['id'],
				'session_id'=>$session_id,
				'name'=>$data['name'],
				'price'=>$data['price'],
				'image'=>$data['image'],
				'qty'=>$qty['qty'],
		

				);
				Session::put('cart',$cart);
			}
		} else {
			$cart[]=array(
				'id'=>$product_id['id'],
				'session_id'=>$session_id,
				'name'=>$data['name'],
				'price'=>$data['price'],
				'image'=>$data['image'],
				'qty'=>$qty['qty'],
			
			);
		}
		Session::put('cart',$cart);
		Session::save();
		// $product_id['id'] = $request->id;
		// $product = $this->instants_product->getById($product_id);
		// dd($product);
		// $data = $request->except('_token');
		// $product_id['id'] = $request->id;
		// $data = DB::table('tbl_products')->where('id',$product_id)->get();
		// dd($data);

	}


	public function updateCart(Request $request) {
		$data = $request->except('_token');
		$cart = Session::get('cart');
		if ($cart==true) {
			foreach ($data['quantity'] as $key => $qty) {
				foreach ($cart as $id => $val) {
					if ($val['id']==$key) {
						$cart[$id]['qty'] = $qty;
					}
				}
			}
			Session::put('cart',$cart);
			return redirect()->back();
		}
	}

	public function deleteItemCart(Request $request) {
	
		 $carts = Session::get('cart');
		 $id = $request->id;
        if($carts==true)
        {
            foreach ($carts as $key => $value) {
                if($value['id']==$id)
                {
                    unset($carts[$key]);
                }
            }
            Session::put('cart',$carts);
        }
        
		
	}


	public function deleteAllCart() {
		$cart = Session::get('cart');
		if ($cart==true) {
			Session::forget('cart');
		}
		return redirect()->back();
	}
}
