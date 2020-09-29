<?php

namespace App\Models\CategoryPost;

use Illuminate\Database\Eloquent\Model;
use DB;
class CategoryPostModel extends Model
{
	function getAllData() {
		$result = DB::table('tbl_category_posts')->orderby('id','DESC')->get();
		return $result;
	}

	function getById($id) {
		$result = DB::table('tbl_category_posts')->where('id',$id)->first();
		return $result;
	}


   function insertData($data) {
   		DB::table('tbl_category_posts')->insert($data);
   } 

   function updateData($id,$data) {
   		DB::table('tbl_category_posts')->where("id",$id)->update($data);
   }

   function deleteData($id) {
   		DB::table('tbl_category_posts')->where("id",$id)->delete();
   }

   function updateStatusUnctive($id) {
  	 	DB::table('tbl_category_posts')->where('id',$id)->update(['status'=>0]);
   }

    function updateStatusActive($id) {
   		DB::table('tbl_category_posts')->where('id',$id)->update(['status'=>1]);
   	}

}
