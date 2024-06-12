<?php

namespace App\Http\Controllers;


use App\Models\adminOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //user order list page
    public function userOrderList(){
        $orders = adminOrder::select('admin_orders.*','users.name as user_name')
                  ->leftJoin('users','admin_orders.user_id','users.id')
                  ->get();


        return view('user.Order.list',compact('orders'));
    }

    //user order detail page
    public function orderDetailPage($code){

        //total order for order list
        $orders = adminOrder::select('admin_orders.*','users.name as user_name','deliveries.*')
                ->leftJoin('users','admin_orders.user_id','users.id')
                ->leftJoin('deliveries','admin_orders.delivery_id','deliveries.delivery_id')
                ->get();

        //order detail
        $orderDetail = Order::select('orders.*','books.name as book_name')
                        ->leftJoin('books','orders.book_id','books.book_id')
                        ->where('orders.order_code',$code)
                        ->get();

        //order_code user_id and total price
        $orderDetailInfo = adminOrder::select('admin_orders.*','users.name as user_name')
                            ->leftJoin('users','admin_orders.user_id','users.id')
                            ->where('admin_orders.order_code',$code)->first();

         return view('user.Order.list',compact('orders','orderDetail','orderDetailInfo'));
    }

    //user order delete
    public function orderDelete($code){
        Order::where('order_code',$code)->delete();
        adminOrder::where('order_code',$code)->delete();

        return redirect()->route('userOrder#list')->with(['deleteSuccess' => 'User Order Deleted Successfully']);
    }
}
