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
    	
        $request->validate([
            'username'=>'required',
            'email'=>'required|unique:tbl_user',
            'password'=>'required|max:8',
            'password_confirm'=>'required:max:8|same:password'
        ]);


    	$data = $request->except('_token','password_confirm');
        $get_image = $request->file('image');
       if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('./public/uploads/users',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $data['password'] = bcrypt($request->password);
            $data['created_at'] = new DateTime;
            $this->instants->registerUser($data);
            return redirect()->route('admin.register');
        }
        $data['password'] = bcrypt($request->password);
    	$data['created_at'] = new DateTime;

    	$this->instants->registerUser($data);  
        return redirect()->route('admin.register');
    }
}
