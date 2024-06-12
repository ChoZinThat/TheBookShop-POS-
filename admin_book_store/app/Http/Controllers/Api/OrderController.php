<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\AdminOrder;

class OrderController extends Controller
{
    //order to admin
    public function orderToAdmin(Request $request){

        $orderCode = $this->generateRandomOrderCode();
        $userId = $request->user_id;
        $delivery = $request->delivery_id;

        //create order list
        for ($i = 0; $i < count($request->book_id); $i++) {
            Order::create([
                'user_id'     => $userId,
                'book_id'     => $request->book_id[$i],
                'qty'         => $request->qty[$i],
                'total_price' => $request->price[$i],
                'order_code'   => $orderCode,
                'delivery_id' => $delivery
            ]);
        }

        //create order for admin show
        AdminOrder::create([
            'user_id' => $userId,
            'order_code' => $orderCode,
            'delivery_id' => $delivery,
            'total_price' => $request->final_total,
        ]);

        Cart::where('user_id',$userId)->delete();

        return response()->json("success");
    }

    //generate order code
    private function generateRandomOrderCode($length = 6) {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        $randomNumber = mt_rand($min, $max);
        $orderCode = str_pad($randomNumber, $length, '0', STR_PAD_LEFT);
        return $orderCode;
    }

    //produce  user order list
    public function getUserOrder(Request $request){
        $orderData = Order::select('orders.*','deliveries.*','books.*')
                     ->where('user_id',$request->user_id)
                     ->leftJoin('deliveries','orders.delivery_id','deliveries.delivery_id')
                     ->leftJoin('books','orders.book_id','books.book_id')
                     ->get();

        // $orderTotalPrice = AdminOrder::select('total_price')
        //                    ->where('user_id',$request->user_id)
        //                    ->get();

        return response()->json(['orderData' => $orderData ]);
    }



}
