<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category\CategoryModel;
use App\Models\Brand\BrandModel;
use App\Models\Product\ProductModel as MainModel;
use DateTime;
class ProductController extends CategoryController
{

     private $intants_product;
     private $intants_catgory;
     private $intants_brand;

     public function __construct() {
        $this->intants_product = new MainModel;
        $this->intants_catgory = new CategoryModel;
        $this->intants_brand = new BrandModel;
 
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_product = $this->intants_product->getAllData();
        $data_cat = $this->intants_catgory->getAllData(); 
        $data_br = $this->intants_brand->getAllData();
        return view('admin.modules.product.index',['data_product'=>$data_product,'data_br'=>$data_br,'data_cat'=>$data_cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data_cat = $this->intants_catgory->getAllData(); 
        $data_br = $this->intants_brand->getAllData();
        return view('admin.modules.product.create',['data_cat'=>$data_cat,'data_br'=>$data_br]);
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
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'description'=>'required',
            'content'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'status'=>'required'
        ]);

        $data = $request->except('_token');
        $get_image = $request->file('image');
        $data['created_at'] = new DateTime;
        
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/products',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $data['created_at'] = new DateTime;
            $this->intants_product->insertData($data);
            return redirect()->route('admin.product.create')->with('message','Insertd Product SuccessFully');
        }

        $this->intants_product->insertData($data);
        return redirect()->route('admin.product.create')->with('message','Insertd Product SuccessFully');
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
        $data_cat = $this->intants_catgory->getAllData(); 
        $data_br = $this->intants_brand->getAllData();
        $data_pro = $this->intants_product->getById($id);
        return view('admin.modules.product.edit',['data_pro'=>$data_pro,'data_cat'=>$data_cat,'data_br'=>$data_br]);
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
            $get_image->move('public/uploads/products',$get_image->getClientOriginalName());
            $data['image'] = $new_image;
            $data['updated_at'] = new DateTime;
            $this->intants_product->updateData($id,$data);
            return redirect()->route('admin.product.index')->with('message','Updated Product SuccessFully');
        }

        $this->intants_product->updateData($id,$data);
        return redirect()->route('admin.product.index')->with('message','Updated Product SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
       $success =   $this->intants_product->deleteData($id);
           return redirect()->route('admin.product.index')->with('message','Deleted Product SuccessFully');
       
        
    }

     public function updateUntive(Request $request)
    {
        $id = $request->id;
        $this->intants_product->usUnctive($id);
    }

    public function updateActive(Request $request)
    {
        $id = $request->id;
        $this->intants_product->updateStatusActive($id);
    }

}
