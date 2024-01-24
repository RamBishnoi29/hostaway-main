<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayPricing;
use Illuminate\Http\Request;

class HostawayPricingController extends Controller
{
    public function hostawaypricings()
    {
        return view('hostaway.addhostawaypricings');
    }
    public function saveHostawaypricing(Request $request)
    {
        //return response($_POST);
        // $validator = Validator::make($request->all(), [
        //     'listing_title' => 'required',
        //     'listing_bedrooms' => 'required',
        //     'listing_bathrooms' => 'required',
        //     'listing_size' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'messages' => $validator->getMessageBag()
        //     ]);
        // } else {
           // HostawayPricing::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
           
            $obj = new  HostawayPricing();
             $obj->listing_id=$request->session()->get('listing_id');
            $obj->type_of_rent = $request->type_of_rent;
            $obj->host_fee=$request->host_fee;
            $obj->fixed_amount_check=$request->fixed_amount_check;
            $obj->fixed_amont=$request->fixed_amount;
            $obj->monthly_rent=$request->monthly_rent;
            $obj->night_price=$request->night_price;
            $obj->extra_service_price=json_encode($request->extra_price);
            $obj->cleaning_fee=$request->cleaning_fee;
            $obj->tax=$request->tax;
            $obj->security_deposit=$request->security_deposit;
            $obj->additional_guest_allow=$request->additional_guest_allow;
            $obj->additional_guest_price=$request->additional_guest_price;
            $obj->additional_no_of_guests=$request->additional_no_of_guests;
            $obj->save();           
           
            return response()->json([
                'status' => 200,
                'messages' => 'Add Pricing Successfully !'
            ]);
        //}
    }
}
