<?php

namespace App\Models\Slider;

use Illuminate\Database\Eloquent\Model;
use DB;
class SliderModel extends Model
{

	public function getAllData()
	{
		$result = DB::table('tbl_slider')->orderby('id','DESC')->get();
		return $result;
	}

   	public function insertData($data)
   	{
   		DB::table('tbl_slider')->insert($data);
   	}

   	public function getById($id) {
   		$result = DB::table('tbl_slider')->where('id',$id)->first();
   		return $result;
   	}

   	public function updateData($id,$data) {
   		DB::table('tbl_slider')->where('id',$id)->update($data);
   	}

   	public function deleteData($id)
   	{
   		DB::table('tbl_slider')->where('id',$id)->delete();
   	}

   	public function updateStatusActive($id) {
   		DB::table('tbl_slider')->where('id',$id)->update(['status'=>1]);
   	}

   	public function updateStatusUnctive($id) {
   		DB::table('tbl_slider')->where('id',$id)->update(['status'=>0]);
   	}
}
