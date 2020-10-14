<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\ProductModel;
use App\Cart;
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




	public function deleteAllCart() {
		$cart = Session::get('Cart')->products;
		if ($cart==true) {
			Session::forget('Cart');
		}
		return redirect()->back();
	}



	 public function AddCart(Request $request,$id) {
 		$product = DB::table('tbl_products')->where('id',$id)->first();
 		if ($product != null) {
 			$oldCart = Session('Cart') ? Session('Cart') : null; 
 			$newCart = new Cart($oldCart);
 			$newCart->AddCart($product,$id);	 

 			 $request->session()->put('Cart',$newCart);
 		
 		}

 		return back();
    }

 public function AddCartDetail(Request $request,$id) {
        $product = DB::table('tbl_products')->where('id',$id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null; 
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product,$id);     
             $request->session()->put('Cart',$newCart);
        }
        
     
    }
   public function deleteCart(Request $request,$id) {
   	$oldCart = Session('Cart') ? Session('Cart') : null;
    	$newCart = new Cart($oldCart);
    	$newCart->DeleteItemCart($id);

    	if (count($newCart->products) > 0) {
    		$request->Session()->put('Cart',$newCart);
    	} else {
    		$request->Session()->forget('Cart');
    	}
    	return view('pages.carts.cart');
   }

	public function SaveListItemCart(Request $request,$id,$quantity) {
		
		$oldCart = Session('Cart') ? Session('Cart') : null;
    	$newCart = new Cart($oldCart);
    	$newCart->updateItemCart($id,$quantity);

    	$request->Session()->put('Cart',$newCart);
    
    	return view('pages.carts.cart');
	}
}
