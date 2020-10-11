<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Contact\ContactModel as MainModel;
use DateTime;
class ContactController extends Controller
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
        $data = $this->instants->fetchAll();
        return view('admin.modules.contact.index',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        $this->instants->insertData($data);
        return redirect()->back()->with('message','Cảm ơn bạn đã liên hệ chúng tôi sẽ sớm liên lạc với bạn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showcontact = $this->instants->getById($id);
        return view('admin.modules.contact.show',compact('showcontact'));
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
        return redirect()->back()->with('message','Deleted SuccessFully');
    }
}
