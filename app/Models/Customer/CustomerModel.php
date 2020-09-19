<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use DB;
class CustomerModel extends Model
{
    public function createAcount($data) {
    	DB::table('tbl_customers')->insert($data);
    }

    public function loginCustomer($email,$password) {
    	$result = DB::table('tbl_customers')
    	->where('email',$email)
    	->where('password',$password)
    	->first();
      return $result;
    }
}
