<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProductModel extends Model
{
	public function getAllData() {
			$result = DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.id')
		->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.id')
		->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
		->get();
		return $result;
	}

	public function getById($id) {
		$result = DB::table('tbl_products')->where('id',$id)->first();
		return $result;
	}

    public function insertData($data) {
    	DB::table('tbl_products')->insert($data);
    }

    public function updateData($id,$data) {
		DB::table('tbl_products')->where('id',$id)->update($data);
    }

    public function deleteData($id) {
		DB::table('tbl_products')->where('id',$id)->delete();
    }

    public function updateStatusActive($id) {
   		DB::table('tbl_products')->where('id',$id)->update(['status'=>1]);
   	}

   	public function updateStatusUnctive($id) {
   		DB::table('tbl_products')->where('id',$id)->update(['status'=>0]);
   	}

}
