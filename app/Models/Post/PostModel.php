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
		$result = DB::table('tbl_posts')->where('status',1)->orderby("id","DESC")->get();
		return $result;
	}

	public function getPostSingle($title,$id)
	{
		$result = DB::table('tbl_posts')
		->where('title',$title)
		->where('id',$id)
		->first();
		return $result;
	}

	  // phuong thuc de show gallery image theo chuyen muc
    public function getRecommenPost($category_post_id,$post_id) {
      $result = DB::table('tbl_posts')
      ->join('tbl_category_posts','tbl_category_posts.id','=','tbl_posts.category_post_id')
      ->where('tbl_category_posts.id',$category_post_id)
      ->whereNotIn('tbl_posts.id',[$post_id])
      ->orderby('tbl_posts.id','DESC')
      ->limit(5)
      ->get();
      return $result;
    }
}
