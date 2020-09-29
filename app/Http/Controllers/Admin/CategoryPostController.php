<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost\CategoryPostModel as MainModel;
use DateTime;
class CategoryPostController extends Controller
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
       $data['getAllData'] = $this->instants->getAllData();
        return view("admin.modules.categoryposts.index",$data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.modules.categoryposts.create");
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
        $data['getById'] =  $this->instants->getById($id);
        return view("admin.modules.categoryposts.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except("_token");
        $data["updated_at"] = new DateTime();
        $this->instants->updateData($id,$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->id;
        $this->instants->deleteData($id);
    }


    public function updateUntive(Request $request) {
         $id = $request->id;
        $this->instants->updateStatusUnctive($id);
    }

    public function updateActive(Request $request)
    {
        $id = $request->id;
        $this->instants->updateStatusActive($id);
    }
}
