<?php

namespace App\Http\Controllers;
use App\Models\Pricing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function addpricing()
    {
        return view('addpricings');
    }
    public function savepricing(Request $request)
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
            Pricing::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
                'type_of_rent' => $request->type_of_rent,
                'host_fee'=>$request->host_fee,
                'fixed_amount_check'=>$request->fixed_amount_check,
                'fixed_amont'=>$request->fixed_amount,
                'monthly_rent'=>$request->monthly_rent,
                'night_price'=>$request->night_price,
                'extra_service_price'=>$request->extra_price,
                'cleaning_fee'=>$request->cleaning_fee,
                'tax'=>$request->tax,
                'security_deposit'=>$request->security_deposit,
                'additional_guest_allow'=>$request->additional_guest_allow,
                'additional_guest_price'=>$request->additional_guest_price,
                'additional_no_of_guests'=>$request->additional_no_of_guests
            ]);
           
            return response()->json([
                'status' => 200,
                'messages' => 'Add Pricing Successfully !'
            ]);
        //}
    }
}
