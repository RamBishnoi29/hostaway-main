<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    
    public function addmedia()
    {
        return view('addmedia');
    }

    public function savemedia(Request $request)
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
            Media::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
                'media_url' => $request->video_url,
            ]);
           
            return response()->json([
                'status' => 200,
                'messages' => 'Add Pricing Successfully !'
            ]);
        // }
    }
}
