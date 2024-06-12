<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    //delivery direct page
    public function deliveryPage(){
        $deliveryList = Delivery::get();
        return view('admin.delivery.deliverOption',compact('deliveryList'));
    }

    //delivery create
    public function createDelivery(Request $request){
        $this->validateData($request);
        $delivery = [
            'city_name' => $request->cityName,
            'delivery_fees' => $request->deliveryFee,
            'long_time' => $request->longTime,
            'created_at' => Carbon::now()
        ];

        Delivery::create($delivery);

        return redirect()->route('delivery#list');
    }

    //delivery option delete
    public function deleteDelivery($id){
        Delivery::where('delivery_id',$id)->delete();

        return redirect()->route('delivery#list')->with(['deleteSuccess' => "Your Delivery Item deleted successfully"]);
    }

    //search delivery
    public function searchDelivery(Request $request){
        $deliveryList = Delivery::where('city_name','Like','%'.$request->deliverySearch.'%')
                        ->orWhere('delivery_fees','Like','%'.$request->deliverySearch.'%')
                        ->orWhere('long_time','Like','%'.$request->deliverySearch.'%')
                        ->get();
        return view('admin.delivery.deliverOption',compact('deliveryList'));
    }

    //edit delivery direct page
    public function editPage($id){
        $delivery = Delivery::where('delivery_id',$id)->first();
        $deliveryList = Delivery::get();

        return view('admin.delivery.updateDelivery',compact('delivery','deliveryList'));
    }

    //update delivery
    public function updateDelivery(Request $request){

        $this->validateData($request);
        $updateData = [
            'city_name' => $request->cityName,
            'delivery_fees' => $request->deliveryFee,
            'long_time' => $request->longTime,
            'updated_at' => Carbon::now()
        ];

        Delivery::where('delivery_id',$request->id)->update($updateData);

        return redirect()->route('delivery#list');
    }

    //validate delivery data
    private function validateData($request){
        Validator::make($request->all(),[
            'cityName' => 'required|min:3|max:30',
            'deliveryFee' => 'required|min:3|max:6',
            'longTime' => 'required|min:1|max:3'
        ])->validate();
    }
}
