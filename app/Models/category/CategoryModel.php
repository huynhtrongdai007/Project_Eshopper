<?php

namespace App\Models\category;

use Illuminate\Database\Eloquent\Model;
use DB;
class CategoryModel extends Model
{
   
   public function getAllData() {
   	 $result = DB::table('tbl_category')
  
     ->orderby('parent','DESC')->get();
   	 return $result;
   }

   public function getByid($id) {
   		$result = DB::table('tbl_category')
      ->join('tbl_products','tbl_category.id','=','tbl_products.category_id')
      ->where('tbl_category.id',$id)
      ->first();
   	    return $result;
   }

	public function insertData($data)
	{
		DB::table('tbl_category')->insert($data);
	}

	public function updateData($data,$id) {
		$result = DB::table('tbl_category')->where('id',$id)->update($data);
   	    return $result;
	}

	public function deleteData($id)
	{
		DB::table('tbl_category')->where('id',$id)->delete();
	}

	public function updateStatusActive($id) {
   		DB::table('tbl_category')->where('id',$id)->update(['category_status'=>1]);
   	}

	public function updateStatusUnctive($id) {
		DB::table('tbl_category')->where('id',$id)->update(['category_status'=>0]);
	}
      // phuong thuc lay du lieu ra trang chu voi dieu kien status = 1

   public function getAllDataIndex() {
   	 $result = DB::table('tbl_category')->where('category_status',1)->orderby('id','DESC')->get();
   	 return $result;
   }

   // phuong thuc lay du lieu ra tab category voi dieu kien parent = 0
   public function getDataTabCategory() {
       $result = DB::table('tbl_category')
       ->where('parent',0)
       ->get();
       return $result;
   }


 public function getDataTabProduct() {
       $result = DB::table('tbl_category')
       ->join('tbl_products','tbl_category.id','=','tbl_products.category_id')
       ->where('tbl_products.status',1)
       ->limit(4)
       ->get();
       return $result;
   }

}
