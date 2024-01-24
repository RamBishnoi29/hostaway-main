<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayMedia;
use Illuminate\Http\Request;

class HostawayMediaController extends Controller
{
    public function addHostamedia()
    {
        return view('hostaway.addhostawaymedia');
    }
    
    public function saveHostamedia(Request $request)
    {
        HostawayMedia::where('listing_id', $request->session()->get('listing_id'))->orderBy('id', 'desc')->take(1)->update([
            'media_url' => $request->video_url,
            'shortorder'=>$request->shortorder,
            'caption'=>$request->caption,
        ]);
           
        return response()->json([
            'status' => 200,
            'messages' => 'Add Media Successfully !!'
        ]);       
    }
}