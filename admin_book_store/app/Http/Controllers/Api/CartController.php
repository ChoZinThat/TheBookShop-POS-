<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //get cart data
    public function getCartData(Request $request){
        $id = $request->user_id;

        $cartData = Cart::where('user_id',$id)
                    ->select('carts.*','books.*')
                    ->leftJoin('books','carts.book_id','books.book_id')
                    ->get();



        return response()->json(['cartData'=> $cartData ]);
    }

    //delete cart order
    public function deleteCartOrder(Request $request){
        Cart::where('cart_id',$request->cart_id)->delete();

        $message = "One Item deleted";
         return response()->json(['message' => $message]);
    }

    //get delviery data
    public function getDelivery(){
        $delivery = Delivery::get();

        return response()->json(['delivery' => $delivery]);
    }
}
