<?php

namespace App\Http\Controllers;

use App\Models\Bedrooms;
use App\Models\Listings;
use App\Models\Location;
use App\Models\Media;
use App\Models\Pricing;
use App\Models\Hostaway\HostawayPricing;
use App\Models\Hostaway\HostawayListing;
use App\Models\Hostaway\HostawayLocation;
use App\Models\Hostaway\HostawayBedroom;
use App\Models\Hostaway\HostawayMedia;
use App\Models\Hostaway\HostawayTerms;
use App\Models\Hostaway\HostawayPropertyType;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HostawayController extends Controller
{
    public function addlisting()
    {
        return view('addlistings');
    }

    public function savelisting(Request $request)
    {
        if($request->status==0){
            $listingdata=HostawayListings::where(['id' => $request->id,'author'=>request()->session()->get('loggedInUser')])->first();
            if($listingdata){
                $pricingdata=HostawayPricing::where('listing_id', $request->id)->first();
                $bedroomdata=HostawayBedrooms::where('listing_id', $request->id)->first();
                $location=HostawayLocation::where('listing_id', $request->id)->first();
               $obj= json(
                [
                    'id'=>$listingdata->id, 
                    'propertyTypeId' => $listingdata->type, 
                    'name' =>  $listingdata->title,
                    'externalListingName'=> $listingdata->title,
                    'houseRules'=>"",
                    "country"=> $location->country,
                    "countryCode"=> "",
                    "state"=> $location->state,
                    "city"=> $location->city,
                    "street"=> $location->street_address_two,
                    "address"=> $location->street_address,
                    "publicAddress"=>  $location->street_address_two+" , "+$location->street_address,
                    "zipcode"=> $location->street_address,
                    "squareMeters"=> $listingdata->unit_size,  
                    "roomType"=> $listingdata->unit_size, 
                    "bathroomType"=> $listingdata->unit_size, 
                    "bedroomsNumber"=> $listingdata->no_of_bedrooms,   
                    "bedsNumber"=> $listingdata->no_of_beds,   
                    "bedType"=> "real_bed",  
                    "bathroomsNumber"=> $listingdata->no_of_bathrooms,  
                    "minNights"=> 1,  
                    "maxNights"=> 1125,  
                    "guestsIncluded"=> 3,   
                ]);
            }
        }

        return response()->json([
            'status' => 200,
            'messages' => 'Add Listing Successfully !',
            'id'=>$request->id,
            'statu'=>$request->status,
        ]);    
    }

    public function hostaway()
    {
        $data=HostawayListing::all()->where('author',request()->session()->get('loggedInUser'));        
        return view('hostaway.hostawaylisting',['listingdata'=>$data]);
    }
}
