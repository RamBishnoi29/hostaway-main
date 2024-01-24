<?php

namespace App\Http\Controllers\Hostaway;
use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayTerms;

use Illuminate\Http\Request;

class HostawayTermsController extends Controller
{
    public function addterms()
    {
        return view('hostaway.addhostawayterms');
    }

    public function saveterms(Request $request)
    {
            HostawayTerms::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([            
            'min_days'=>$request->min_days,
            'max_days'=>$request->max_days,
            'check_in_time'=>$request->check_in_time,
            'check_in_time_end'=>$request->check_in_time_end,
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
