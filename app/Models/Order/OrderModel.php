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
    	->select('tbl_orders.status as status_order','tbl_orders.id as id_order','tbl_orders.total','tbl_orders.created_at','tbl_orders.updated_at','tbl_shippings.lastname','tbl_shippings.middlename','tbl_shippings.firstname')
    
    	->orderby('tbl_orders.id','DESC')->get();

    	return $result;	
    }

}
