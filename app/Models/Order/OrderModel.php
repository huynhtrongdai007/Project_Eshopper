<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use DB;
class OrderModel extends Model
{
    public function getAllData()
    {
    	$result = DB::table('tbl_orders')
    	->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.id')
    	->join('tbl_shippings','tbl_orders.shipping_id','=','tbl_shippings.id')
    	->join('tbl_payments','tbl_orders.payment_id','=','tbl_payments.id')
    	->select('tbl_orders.status as status_order','tbl_orders.id as id_order','tbl_orders.order_code','tbl_orders.total','tbl_orders.created_at','tbl_orders.updated_at','tbl_shippings.lastname','tbl_shippings.middlename','tbl_shippings.firstname','tbl_shippings.id as shipping_id')
    	->orderby('tbl_orders.id','DESC')->get();

    	return $result;	
    }

    public function getByShippingID($id) {
    	$result = DB::table('tbl_shippings')
    	->where('tbl_shippings.id',$id)
    	->select('tbl_shippings.lastname','tbl_shippings.middlename','tbl_shippings.firstname','tbl_shippings.phone','tbl_shippings.address')
    	->first();
    	return $result;
    }

       public function getOrderDetail($id) {
    	$result = DB::table('tbl_orders')
    	->join('tbl_order_details','tbl_order_details.order_id','=','tbl_orders.id')
    	->join('tbl_products','tbl_order_details.product_id','=','tbl_products.id')
    	->where('tbl_orders.id',$id)
    	->orderby('tbl_orders.id','DESC')
    	->select('tbl_orders.total','tbl_orders.order_code','tbl_products.name as product_name','tbl_products.price','tbl_order_details.sales_quantity as qty','tbl_products.image')
    	->get();
    	return $result;
    }

    public function getCustomerByCodeOrder($order_code) {
         $result = DB::table('tbl_orders')
        ->join('tbl_shippings','tbl_shippings.id','=','tbl_orders.shipping_id')
        ->where('tbl_orders.order_code',$order_code)
       ->select('tbl_shippings.lastname','tbl_shippings.middlename','tbl_shippings.firstname','tbl_shippings.phone','tbl_shippings.address')
        ->first();
        return $result;
    }

     public function getByCodeOrderDetail($order_code) {
        $result = DB::table('tbl_orders')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_orders.id')
        ->join('tbl_products','tbl_order_details.product_id','=','tbl_products.id')
        ->where('tbl_order_details.order_code',$order_code)
        ->orderby('tbl_orders.id','DESC')
        ->select('tbl_orders.total','tbl_orders.order_code','tbl_products.name as product_name','tbl_products.price','tbl_order_details.sales_quantity as qty','tbl_products.image')
        ->get();
        return $result;
    }

    public function DeleteData($id) {
        DB::table('tbl_order_details')->where('id',$id)->delete();
    } 

}
