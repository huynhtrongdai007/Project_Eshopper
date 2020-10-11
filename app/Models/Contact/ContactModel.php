<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;
use DB;
class ContactModel extends Model
{
    function insertData($data) {
    	DB::table('tbl_contacts')->insert($data);
    }

     function deleteData($id) {
    	DB::table('tbl_contacts')->where('id',$id)->delete();
    }

    function fetchAll() {
    	$result = DB::table('tbl_contacts')->orderby('created_at','DESC')->get();
    	return $result;
    }

     function getById($id) {
    	$result = DB::table('tbl_contacts')->where('id',$id)->first();
    	return $result;
    }
}
