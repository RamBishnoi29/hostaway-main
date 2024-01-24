<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayLocation;
use Illuminate\Http\Request;

class HostawayLocationController extends Controller
{
    public function addlocation()
    {
        return view('addlocation');
    }
    public function savelocation(Request $request)
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
            HostawayLocation::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
            'street_address'=>$request->street_address,
            'street_address_two'=>$request->street_address_two,
            'city'=>$request->city,
            'state'=>$request->state,
            'postal_code'=>$request->postal_code,
            'area'=>$request->area,
            'country'=>$request->country,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
            ]);
           
            return response()->json([
                'status' => 200,
                'messages' => 'Add Location Successfully !'
            ]);
        // }
    }
}
