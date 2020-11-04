<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\OrderModel as MainModel;
use PDF;
class OrderController extends Controller
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
        $data['data_orders'] = $this->instants->getAllData();
        return view('admin.modules.orders.index',$data);
    }

    public function printOrder($order_code) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($order_code));
        return $pdf->stream();
    }

    public function print_order_convert($order_code) {
        $getOrderDetail = $this->instants->getByCodeOrderDetail($order_code);
        $customer = $this->instants->getCustomerByCodeOrder($order_code);
        $output = '';

        $output.= '
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <style>body{font-family:Dejavu Sans;}</style>
        <h1 align="center">CÔNG TY CNHH MỘT THÀNH VIÊN ABC</h1>   
        <table class="table mt-5" border="1px">    
          <thead>
              <tr>  

                 <th >tên khách hàng</th>
                 <th>địa chỉ</th>
                 <th>số điên thoại</th>
              </tr>
        </thead>
           <tbody>
         
              <tr>
                <td with>'.$customer->lastname.$customer->middlename.$customer->firstname.'</td>
                <td with="20%">'.$customer->address.'</td>
                <td>'.$customer->phone.'</td>
              </tr>
            
          </tbody>
         </table>
        <table  border="1px" class="table">
         <thead  with="100%">
             <tr>
                 <th>tên sản phẩm</th>
                 <th>Số Lượng</th>
                 <th>Giá</th>
                 <th>Tổng Tiền</th>
              </tr>

      <tbody>';
      
     foreach($getOrderDetail as $key => $items){ 
        $output.=
        '<tr>
          <td with="30%">'.$items->product_name.'</td>
          <td >'.$items->qty.'</td>
          <td with="30%">'.number_format($items->price).'</td>
          <td>'.number_format($items->qty * $items->price).'</td>
        </tr>';

      }
      $output.='<tr>
          <td colspan="4">Tong Thanh Tien:'.$items->total.'</td>

        </tr>
        <tr>
           <td colspan="4">Ma don hang:'.$items->order_code.'</td>
        </tr>';
      $output.='
  </tbody>
</table>';

$output.='
  <p style="float:left ;margin-top:90px;">Người Lập Phiếu</p>  
  <p style="float:right;margin-top:1px;">Người Nhận</p>
';
        return $output;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id,$shipping_id)
    {
         $data['detail_customer'] = $this->instants->getByShippingID($shipping_id);
         $data['getOrderDetail'] = $this->instants->getOrderDetail($order_id);
         return view('admin.modules.orders.show',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->instants->DeleteData($id);
        return back()->with('message','Xóa đơn hàng thành công');
    }
}
