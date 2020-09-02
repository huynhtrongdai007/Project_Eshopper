<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register\RegisterModel as MainModel;
use DB,DateTime;
class RegisterController extends Controller
{
	private $instants;

	public function __construct() {
		$this->instants = new MainModel;
	}

    public function index() {
    	return view('admin.register');
    }

    public function register(Request $request) {
    	
    	$data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
    	$data['created_at'] = new DateTime;

    	$this->instants->registerUser($data);  
        return redirect()->route('admin.register');
    }
}
