<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    public function getAllData() {
    	$result = DB::table('tbl_user')->get();
    	return $result;
    }

    public function getById($id) {
    	$result = DB::table('tbl_user')->where('id',$id)->first();
    	return $result;
    }

    public function insertData($data) {
    	DB::table('tbl_user')->insert($data);
    }

    public function updateData($id,$data) {
    	DB::table('tbl_user')->where('id',$id)->update($data);
    }

    public function deleteData($id) {
    	DB::table('tbl_user')->where('id',$id)->delete();
    }

}
