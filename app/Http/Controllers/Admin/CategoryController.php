<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Str;
use App\Models\category\CategoryModel as MainModel;
use App\Components\Recusive;
class CategoryController extends Controller
{
    private $instant;
    private $htmlselect;

    public function __construct() {
        $this->instant = new MainModel;
        $this->htmlselect = '';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->instant->getAllData();
        return view('admin.modules.category.index',['data_cat'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $htmlOption =  $this->getCategory($parent_id = '');
         return view('admin.modules.category.create',compact('htmlOption'));
    }

    public function getCategory($parent_id) {
        $data = $this->instant->getAllData();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['category_name'=>'unique:tbl_category']);
        $data = $request->except('_token');
        $data['slug'] = Str::slug($request->category_name);
        $data['created_at'] = new DateTime();
        $this->instant->insertData($data);
        return back()->with('message','Inserted SuccessFully');

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
        $getByid = $this->instant->getByid($id); 
        $htmlOption =  $this->getCategory($getByid->parent);
        return view('admin.modules.category.edit',compact('getByid','htmlOption'));
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
        $this->instant->updateData($data,$id);
        return redirect()->route('admin.category.index')->with('message','Updated Category SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->instant->deleteData($id);
         return redirect()->route('admin.category.index')->with('message','Deleted SuccessFully');
    }

    public function updateUntive(Request $request)
    {
        $id = $request->id;
        $this->instant->updateStatusUnctive($id);
    }

    public function updateActive(Request $request)
    {
        $id = $request->id;
        $this->instant->updateStatusActive($id);
    }
}
