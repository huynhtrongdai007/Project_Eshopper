<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Model;
use DB;
class BrandModel extends Model
{

	public function getAllData() {
		$result = DB::table('tbl_brand')->get();
		return $result;
	}

	public function getById($id) {
		$result = DB::table('tbl_brand')->where('id',$id)->first();
		return $result;
	}

    public function insertData($data) {
    	DB::table('tbl_brand')->insert($data);
    }

    public function updateData($id,$data) {
    	DB::table('tbl_brand')->where('id',$id)->update($data);
    }

    public function deleteData($id) {
    	DB::table('tbl_brand')->where('id',$id)->delete();
    }

    public function updateStatusActive($id) {
    	DB::table('tbl_brand')->where('id',$id)->update(['status'=> 1]);
    }

    public function updateStatusUntive($id) {
    	DB::table('tbl_brand')->where('id',$id)->update(['status'=> 0]);
    }

    public function getAllDataIndex() {
        $result = DB::table('tbl_brand')->where('status',1)->orderby('id','DESC')->get();
        return $result;
    }

}
