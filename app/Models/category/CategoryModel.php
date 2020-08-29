<?php

namespace App\Models\category;

use Illuminate\Database\Eloquent\Model;
use DB;
class CategoryModel extends Model
{
   
   public function getAllData() {
   	 $result = DB::table('tbl_category')->orderby('id','DESC')->get();
   	 return $result;
   }

   public function getByid($id) {
   		$result = DB::table('tbl_category')->where('id',$id)->first();
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



}
