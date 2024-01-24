<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\Amenities;
use Illuminate\Http\Request;

class HostawayAmenitiesController extends Controller
{
    public function addamenities()
    {
        $data = Amenities::all();
        return view('hostaway.addamenities', ['amenitiesdata' => $data]);
    }

    public function addamenitiesfromHostaway()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.hostaway.com/v1/amenities",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4Nzg0OSIsImp0aSI6ImNkYzBlZTc4MjhhOTJjYjRlNjU3ZGQwYzM5ZTFiZDFlZjM2Mzg1NGQwODUyYzdjZDVjYmJjMmJkYzIyZWJjYmEzNTkwYTFmNjY1NDcwZDIyIiwiaWF0IjoxNzA1NTc2NTAzLjYzNTI3NSwibmJmIjoxNzA1NTc2NTAzLjYzNTI3NiwiZXhwIjoyMDIxMTk1NzAzLjYzNTI4Miwic3ViIjoiIiwic2NvcGVzIjpbImdlbmVyYWwiXSwic2VjcmV0SWQiOjI1OTYwfQ.hdrNg9TRSiSJG0TZBDQOZ3xZbVIca0keVy1FwmJFQsKKmLKjrCy-akU5nKvOrRYQlOX1NVIaLP_Y-4gzld6rd0qrGPOa-MLseZjWv4u-6xQRgWePZcrVOSGwrE_TPvmR_-mGBUnUUjAwfkfbA8cz1WRF3CDR-DM4zQVmi6tqSr8",
                "Cache-control: no-cache",
                "Content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $d = json_decode($response);
            $arr = $d->result;
            for ($i = 0; $i < count($arr); $i++) {
                $obj = new  Amenities();
                $obj->Name = $arr[$i]->name;
                $obj->hostaway = $arr[$i]->id;
                $obj->save();
            }
            echo "Success";
        }
    }
    public function saveamenities(Request $request)
    {
        $amenities = new  Amenities();
        $amenities->Name = $request->name;
        $amenities->save();
        return response()->json([
            'status' => 200,
            'messages' => 'Add Amenities Successfully !',
            'data' => $amenities
        ]);
    }

    public function update_amenities(Request $request)
    {
        Amenities::where('id', $request->id)->update([
            'name' => $request->name,
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'Update Bedrooms Successfully !'
        ]);
    }
}
