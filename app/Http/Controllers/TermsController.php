<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function addterms()
    {
        return view('addterms');
    }

    public function saveterms(Request $request)
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
            Terms::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
            'rental_agreement'=>$request->rental_agreement,
            'min_days'=>$request->min_days,
            'max_days'=>$request->max_days,
            'check_in_time'=>$request->check_in_time,
            'check_out_time'=>$request->check_out_time,
            'smoking_allowed'=>$request->smoking_allowed,
            'pets_allowed'=>$request->pets_allowed,
            'party_allowed'=>$request->party_allowed,
            'safe_for_children'=>$request->safe_for_children,
            'additional_info'=>$request->additional_info
                ]);
            return response()->json([
                'status' => 200,
                'messages' => 'Add Terms Successfully !'
            ]);
        //}
    }
}
