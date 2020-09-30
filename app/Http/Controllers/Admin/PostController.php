<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post\PostModel as MainModel;
use DateTime;
class PostController extends Controller
{

    private $instants;

    public function __construct()
    {
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
        return view('admin.modules.posts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.modules.posts.create');
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
            'title'=>'required',
            'content'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

            $data = $request->except('_token');
            $get_image = $request->file('image');
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/posts',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $data['created_at'] = new DateTime();
            $this->instants->insertData($data);
            return redirect()->route('admin.post.create')->with('message','Created Post SeccessFully');
         
       
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
        return view('admin.modules.posts.edit',$data);
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
            $get_image->move('public/uploads/posts',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $data['updated_at'] = new DateTime;
            $this->instants->updateData($id,$data);
            return redirect()->route('admin.post.index')->with('message','Updated Post SuccessFully');
        }

        $this->instants->updateData($id,$data);
        return redirect()->route('admin.post.index')->with('message','Updated Post SuccessFully');
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
          return redirect()->back();
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
