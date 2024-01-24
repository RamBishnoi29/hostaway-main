<?php

namespace App\Http\Controllers\Hostaway;
use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayAmenities;
use App\Models\Hostaway\HostawayAmenitiesMapped;
use Illuminate\Http\Request;

class HostawayFeaturesController extends Controller
{
    public function addfeatures()
    {
        $data = HostawayAmenities::all();
        return view('hostaway.addHostawayfeatures', ['amenitiesdata' => $data]);
    }
    public function savefeatures(Request $request)
    {
        $cameraVideo = $request->input('camera_video');
        if($cameraVideo!=null){
        for ($i = 0; $i < count($cameraVideo); $i++) {
            $obj = new  HostawayAmenitiesMapped();  
            $obj->amentity_id= $cameraVideo[$i];
            $obj->save();
        }
        return response()->json([
            'status' => 200,
            'messages' => 'Add Features Successfully !',
            'length'=> count($cameraVideo)
        ]);
    }else{
        return response()->json([
            'status' => 200,
            'messages' => 'unSuccess !',
            'length'=> 0
        ]);
    }
    }

}
