<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use DB;
class PostModel extends Model
{
    
	public function getAllData()
	{
		$result = DB::table('tbl_posts')->orderby("id","DESC")->get();
		return $result;
		
	}

	public function getById($id)
	{
		$result = DB::table('tbl_posts')->where('id',$id)->first();
		return $result;
	}

	public function insertData($data) {
		DB::table("tbl_posts")->insert($data);
	}

	public function updateData($id,$data) {
		DB::table('tbl_posts')->where('id',$id)->update($data);

	}

	public function deleteData($id)
	{
		DB::table('tbl_posts')->where('id',$id)->delete();
	}

	public function updateStatusActive($id) {
   		DB::table('tbl_posts')->where('id',$id)->update(['status'=>1]);
   	}

	public function updateStatusUnctive($id) {
		DB::table('tbl_posts')->where('id',$id)->update(['status'=>0]);
	}
   
	//-----------code frond-end-----------

	public function getIndexAllData()
	{
		$result = DB::table('tbl_posts')->orderby("id","DESC")->get();
		return $result;
		
	}

}
