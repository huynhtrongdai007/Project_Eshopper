<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Session;

use App\Models\Customer\CustomerModel as MainModel;
session_start();
class LoginController extends Controller
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
        return view('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       $email = $request->email;
       $password = md5($request->password);
       $result = $this->instants->loginCustomer($email,$password);
     
        if ($result) {
            Session::put('customer_id',$result->id);
            return redirect()->route('view-checkout');
        } else {
             return redirect()->back()->with('error_message','Login Not Success');
        }

    }

    public function logout(Request $request) {
        $request->session()->flush();
         return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'email'=>'unique:tbl_customers',
            'password'=>'max:8',
            'password_confirm'=>'max:8|same:password'
        ]);

        $data = $request->except('_token');
        $data['password'] = md5($request->password);
            $data['password_confirm'] = md5($request->password);
        $data['created_at'] = new DateTime; 
        $this->instants->createAcount($data);
        return redirect()->back()->with('message','Registered Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
