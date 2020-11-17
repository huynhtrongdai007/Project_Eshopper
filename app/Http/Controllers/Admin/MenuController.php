<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use App\Models\MenuModel;
use DateTime;
use Illuminate\Support\Str;
class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive,MenuModel $menu) {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMenu = MenuModel::all();
        return view('admin.modules.menu.index',compact('dataMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionSelect =$this->menuRecusive->MenuRecusiveAdd();
       
        return view('admin.modules.menu.create',compact('optionSelect'));
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
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = new DateTime(); 
        $result =  MenuModel::insert($data);
        if ($result) {
            return back()->with('message','Insertd Menu SuccessFully');
        } else {
            return back()->with('message','Insert Menu Not Success');
        }
       
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
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect =$this->menuRecusive->MenuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.modules.menu.edit',compact('optionSelect','menuFollowIdEdit'));
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
         $data['slug'] = Str::slug($request->name);
        MenuModel::where('id',$id)->update($data);
        return redirect()->route('admin.menu.index')->with('message','Updated Menu SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menu->find($id)->delete();
         return back()->with('message','Deleted Menu SuccessFully');
    }
}
