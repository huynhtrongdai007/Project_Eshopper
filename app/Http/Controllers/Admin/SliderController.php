<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,DateTime;
use App\Models\Slider\SliderModel as MainModel;
class SliderController extends Controller
{

    private $instant;

    public function __construct() {
        $this->instant = new MainModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->instant->getAllData();
        return view('admin.modules.slider.index',['data_slider'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.slider.create');
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
        $get_image = $request->image;
        $new_image = $get_image->getClientOriginalName();
        $get_image->move('./public/uploads/sliders',$get_image->getClientOriginalName());
        $data['image'] = $new_image;
        $data['created_at'] = new DateTime;
        $this->instant->insertData($data);
         return redirect()->route('admin.slider.index')->with('message','Inserted SuccessFully');

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
        $data = $this->instant->getById($id);
        return view('admin.modules.slider.edit',['data_slider'=>$data]);
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
        if ($get_image) {
             $new_image = $get_image->getClientOriginalName();
            $get_image->move('./public/uploads/sliders',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $this->instant->updateData($id,$data);
            return redirect()->route('admin.slider.index')->with('message','Updated Slider SuccessFully');
        }
          $data['updated_at'] = new DateTime;
        $this->instant->updateData($id,$data);
         return redirect()->route('admin.slider.index')->with('message','Updated Slider SuccessFully');
        
       
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
         return redirect()->route('admin.slider.index')->with('message','Deleted Slider SuccessFully');
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
