<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserModel as MainModel;
use DateTime;
class UserController extends Controller
{

    private $instants;

    public function __construct() {
        $this->instants = new MainModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->instants->getAllData();
       return view('admin.modules.users.index',['data_users'=>$data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'username' =>'required|unique:tbl_user',
                'email' =>'required|unique:tbl_user',
                'password' =>'required'
        ],[
                'required'=>'o nhap khong duoc de trong',
                'email.unique'=>'Email đã được sử dụng'
        ]);
        $data = $request->except('_token');
        $get_image = $request->file('image');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new DateTime;

        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/users',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $this->instants->insertData($data);
            return redirect()->route('admin.user.index')->with('message','Insertd User SuccessFully');
        }
        $this->instants->insertData($data);
        return redirect()->route('admin.user.index')->with('message','Insertd User SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->instants->getById($id);
        return view('admin.modules.users.edit',['data_user'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->except('_token');
        $get_image = $request->file('image');
        $data['updated_at'] = new DateTime;

        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/users',$get_image->getClientOriginalName());
        
            $data['image'] = $new_image;
            $this->instants->updateData($id,$data);
            return redirect()->route('admin.user.index')->with('message','Updated User SuccessFully');
        }
        $this->instants->updateData($id,$data);
        return redirect()->route('admin.user.index')->with('message','Updated User SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->instants->deleteData($id);
        return redirect()->route('admin.user.index')->with('message','Deleted User SuccessFully');
    }
}
