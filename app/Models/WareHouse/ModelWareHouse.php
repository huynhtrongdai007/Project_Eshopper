<?php

namespace App\Models\WareHouse;

use Illuminate\Database\Eloquent\Model;
use DB;
class ModelWareHouse extends Model
{

	public function getAllData() {
		$result = DB::table('tbl_warehouses')
		->join('tbl_products','tbl_warehouses.product_id','=','tbl_products.id')
		->select('tbl_warehouses.*','tbl_warehouses.created_at as ngaythemhang','tbl_products.*')
		->orderby('tbl_warehouses.created_at','DESC',)->get();
		return $result;
	}


	public function getById($id) {
		$result = DB::table('tbl_products')->where('id',$id)->first();
		return $result;
	}
     // nhap them so luong 
    public function inputQuantity($id,$data) {
      DB::table('tbl_products')->where('id',$id)->update(['remain'=>$data]);
    }

    public function insertWareHouse($data) {
      DB::table('tbl_warehouses')->insert($data);
    }
}
