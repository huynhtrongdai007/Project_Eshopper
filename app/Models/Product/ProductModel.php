<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProductModel extends Model
{
    protected $table = 'tbl_products';
    
	public function getAllData() {
			$result = DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.id')
		->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.id')
		->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
		->get();
		return $result;
	}

	public function getById($id) {
		$result = DB::table('tbl_products')->where('id',$id)->first();
		return $result;
	}

    public function insertData($data) {
    	DB::table('tbl_products')->insert($data);
    }

    public function updateData($id,$data) {
		DB::table('tbl_products')->where('id',$id)->update($data);
    }

    public function deleteData($id) {
		DB::table('tbl_products')->where('id',$id)->delete();
    }

    public function updateStatusActive($id) {
   		DB::table('tbl_products')->where('id',$id)->update(['status'=>1]);
   	}

   	public function updateStatusUnctive($id) {
   		DB::table('tbl_products')->where('id',$id)->update(['status'=>0]);
   	}
   	// phương thức lấy dữ liệu ra trang chủ
   	public function getDataIndex() {
   		$result = DB::table('tbl_products')->where('status',1)->orderby('id','DESC')->limit(6)->get();
   		return $result;
   	}

    // lấy hết tắc cả show ra trang shop
    public function getAllProduct() {
      $result = DB::table('tbl_products')->orderby('id','DESC')->get();
      return $result;
    }






    public function getProductDetails($id) {
      $result = DB::table('tbl_products')
      ->join('tbl_brand','tbl_brand.id','=','tbl_products.brand_id')
      ->join('tbl_category','tbl_category.id','=','tbl_products.category_id')
      ->select('tbl_products.*','tbl_brand.brand_name','tbl_category.category_name')
      ->where('tbl_products.id',$id)->first();
      return $result;
    }

    // phuong thuc de show gallery image theo chuyen muc
    public function getGallery($id) {
      $result = DB::table('tbl_products')
      ->join('tbl_category','tbl_category.id','=','tbl_products.category_id')
      ->where('tbl_category.id',$id)
      ->limit(4)
      ->orderby('tbl_products.id','DESC')
      ->get();
      return $result;
    }

     // phuong thuc de show gallery image theo chuyen muc
    public function getRecommenProduct($category_id,$product_id) {
      $result = DB::table('tbl_products')
      ->join('tbl_category','tbl_category.id','=','tbl_products.category_id')
      ->where('tbl_category.id',$category_id)
      ->whereNotIn('tbl_products.id',[$product_id])
      ->orderby('tbl_products.id','DESC')
      ->limit(3)
      ->get();
      return $result;
    }


   public function pagination() {
        $result = DB::table('tbl_products')->paginate(6);
         return $result; 
    }   


}
