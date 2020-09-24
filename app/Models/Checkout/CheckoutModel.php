<?php

namespace App\Models\Checkout;

use Illuminate\Database\Eloquent\Model;
use DB;
class CheckoutModel extends Model
{
    function insertShipping($data) {
    	$result = DB::table('tbl_shippings')->insertGetId($data);
    	return $result;
    }

    function insertPayment($data) {
		$result = DB::table('tbl_payments')->insertGetId($data);
		return $result;
    }

    function insertOrder($data) {
		$result = DB::table('tbl_orders')->insertGetId($data);
		return $result;
    }

    function insertOrderDetail($data) {
    	 DB::table('tbl_order_details')->insert($data);
    }
}
