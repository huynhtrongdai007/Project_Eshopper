<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand\BrandModel as MainModel;
use DateTime;
class BrandController extends Controller
{
    
    private $instant;

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
    	return view('admin.modules.brand.index',['data_brand'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.modules.brand.create');
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
    		'brand_name'=>'required|unique:tbl_brand',
    		'status' =>'required'
    	]);
    	$data = $request->except('_token');
    	$data['created_at'] = new DateTime();
    	$this->instants->insertData($data);
    	return redirect()->route('admin.brand.create')->with('message','inserted Brand SuccessFully');
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
    	$data = $this->instants->getById($id);
    	$data_status = $this->instants->getAllData();
        return view('admin.modules.brand.edit',['data_brand'=>$data,'data_status'=>$data_status]);
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
    	$data['updated_at'] = new DateTime();
        $this->instants->updateData($id,$data);
        return redirect()->route('admin.brand.index')->with('message','Updated Brand SuccessFully');

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
         return redirect()->route('admin.brand.index')->with('message','Delete Brand SuccessFully');
    }


    public function updateUntive(Request $request)
    {
        $id = $request->id;
        $this->instants->updateStatusUntive($id);
    }

    public function updateActive(Request $request)
    {
        $id = $request->id;
        $this->instants->updateStatusActive($id);
    }

}
