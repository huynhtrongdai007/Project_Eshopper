<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use DB;
class CommentModel extends Model
{
    function insertData($data) {
    	DB::table('tbl_comment_posts')->insert($data);
    }

    
   //method lay noi dung ra trang product detail voi dieu kien id cua product
   function showComment($id) {
   		$result = DB::table('tbl_comment_posts')->where('post_id',$id)->orderby('created_at','DESC')->get();
		return $result;
	}

}