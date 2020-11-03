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
        <style>body{font-family:Dejavu Sans;}
            #bill-order {margin-top:20%;}
        #bill-customer{margin-top:10%;}
        </style>
        <h1 align="center">CÔNG TY CNHH MỘT THÀNH VIÊN ABC</h1>   
        <table id="bill-customer" border="1" align="center">    
          <thead>
              <tr>  

                 <th with="40%">tên khách hàng</th>
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
        <table id="bill-order" border="1" align="center" class="table-light">
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
          <td colspan="5">Tong Thanh Tien:'.$items->total.'</td>

        </tr>
        <tr>
           <td colspan="5">Ma don hang:'.$items->order_code.'</td>
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
