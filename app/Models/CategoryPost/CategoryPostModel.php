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


   function insertData($data) {
   		DB::table('tbl_category_posts')->insert($data);
   } 

   function updateStatusUnctive($id) {
  	 	DB::table('tbl_category_posts')->where('id',$id)->update(['status'=>0]);
   }

    function updateStatusActive($id) {
   		DB::table('tbl_category_posts')->where('id',$id)->update(['status'=>1]);
   	}

}
