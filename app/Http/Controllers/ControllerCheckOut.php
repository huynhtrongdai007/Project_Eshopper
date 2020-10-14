<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout\CheckoutModel as MainModel;
use Session;
use DateTime;
use App\Cart;
session_start();
class ControllerCheckOut extends Controller
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
        return view('pages.checkout.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // insert shipping
        $data_shipping = $request->except('_token');
        $data_shipping = array(
            'customer_id' => $request->customer_id,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'firstname' => $request->firstname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'note' => $request->notes,
            'created_at' => new DateTime(),
        );
        
        $shipping_id = $this->instants->insertShipping($data_shipping);
         Session::put('shipping_id',$shipping_id);
   
      // khi insert vao bang tbl_payments se lấy id gán vào session
        // insert payment 
        $data_payment = $request->except('_token');
        $data_payment = array(
            'method' =>$request->method,
            'created_at' => new DateTime(),
        );
        
        $payment_id = $this->instants->insertPayment($data_payment);
         Session::put('payment_id',$payment_id);
      

        // insert order
        $data_order = $request->except('_token');
        $data_order = array(
            'customer_id'=> Session::get('customer_id'),
            'shipping_id'=> Session::get('shipping_id'),
            'payment_id'=> Session::get('payment_id'),
            'total'=> $request->total,
            'created_at' => new DateTime(),
        );

     
        $order_id =  $this->instants->insertOrder($data_order);
        Session::put('order_id',$order_id);
        // insert order details

        $Cart = Session::get('Cart')->products;
        foreach ($Cart as  $items) {
            $order_detail['order_id'] = Session::get('order_id');
            $order_detail['product_id'] = $items['productInfo']->id;
            $order_detail['name'] = $items['productInfo']->name;
            $order_detail['price'] = $items['productInfo']->price;
            $order_detail['sales_quantity'] = $items['quantity'];
            $order_detail['created_at'] = new DateTime();
            $this->instants->insertOrderDetail($order_detail);
            
        }
        Session::forget('Cart');
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
