<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Model;
use DB;
class RegisterModel extends Model
{
    public function registerUser($data) {
    	DB::table('tbl_user')->insert($data);
    }
}
