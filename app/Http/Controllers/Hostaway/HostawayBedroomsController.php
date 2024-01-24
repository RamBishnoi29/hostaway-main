<?php

namespace App\Http\Controllers\Hostaway;
use App\Http\Controllers\Controller;
use App\Models\Bedrooms;
use Illuminate\Http\Request;
use App\Models\Hostaway\BedTypes;
use App\Models\Hostaway\HostawayBedroom;
use Illuminate\Support\Facades\Validator;

class HostawayBedroomsController extends Controller
{
    public function addbedrooms()
    {
        $data = BedTypes::all();
        return view('hostaway.addhosatwaybedrooms', ['bedTypedata' => $data]);
    }

    public function savebedrooms(Request $request)
    {
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
            HostawayBedroom::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
                'bed_data'=>$request->extra_bedroom
                ]);
            return response()->json([
                'status' => 200,
                'messages' => 'Add Bedroom Successfully !'
            ]);
        //}
    }

    public function update_bedrooms(Request $request)
    {
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
            Bedrooms::where('id', $request->id)->update([
                'bed_data' => $request->extra_bedroom,
            ]);
            return response()->json([
                'status' => 200,
                'messages' => 'Update Bedrooms Successfully !'
            ]);
        //}
    }
}
