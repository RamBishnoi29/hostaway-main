<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayPropertyType;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class PropertyTypesController extends Controller
{
    public function addPropertyTypes()
    {
        $data = HostawayPropertyType::all();
        return view('hostaway.addPropertyTypes', ['dataList' => $data]);
    }

    public function savePropertytype(Request $request)
    {
        $obj = new  HostawayPropertyType();
        $obj->Name = $request->name;
        $obj->save();
        return response()->json([
            'status' => 200,
            'messages' => 'Add Property Type Successfully !',
            'data' => $obj
        ]);
    }
    public function authHostaway()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.hostaway.com/v1/accessTokens",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=87849&client_secret=70de297b57229523ebbc4ad55f04c633920be531e6c5007119d09bfb4c0b6eaa&scope=general",
            CURLOPT_HTTPHEADER => array(
                "Cache-control: no-cache",
                "Content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    public function addpropertyfromHostaway()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.hostaway.com/v1/propertyTypes",
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
                $obj = new  HostawayPropertyType();
                $obj->Name = $arr[$i]->name;
                $obj->hostaway=$arr[$i]->id;
                $obj->save();
            }
            echo "Success";
        }
    }
    public function update_amenities(Request $request)
    {
        HostawayPropertyType::where('id', $request->id)->update([
            'name' => $request->name,
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'Update Bedrooms Successfully !'
        ]);
    }
}
