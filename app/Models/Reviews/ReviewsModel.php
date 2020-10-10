<?php

namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Model;
use DB;

class ReviewsModel extends Model
{
	function getAllData() {
		$result = DB::table('tbl_reviews')->orderby('created_at','DESC')->get();
		return $result;
	}	

	function getById($id) {
		$result = DB::table('tbl_reviews')->where('id',$id)->first();
		return $result;
	}

   function insertData($data) {
   		DB::table('tbl_reviews')->insert($data);
   }

   function deleteData($id) {
   	 DB::table('tbl_reviews')->where('id',$id)->delete();
   }

   //method lay noi dung ra trang product detail voi dieu kien id cua product
   function showReviews($id) {
   		$result = DB::table('tbl_reviews')->where('product_id',$id)->orderby('created_at','DESC')->get();
		return $result;
   } 
}
