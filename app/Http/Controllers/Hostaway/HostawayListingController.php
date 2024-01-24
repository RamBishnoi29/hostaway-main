<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use App\Models\Hostaway\HostawayPricing;
use App\Models\Hostaway\HostawayListing;
use App\Models\Hostaway\HostawayLocation;
use App\Models\Hostaway\HostawayBedroom;
use App\Models\Hostaway\HostawayMedia;
use App\Models\Hostaway\HostawayTerms;
use App\Models\Hostaway\HostawayPropertyType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class HostawayListingController extends Controller
{
    public function addHostawayListing()
    {
        $data = HostawayPropertyType::where('status',"1")->get();
        $data1=HostawayListing::all();
        return view('hostaway.addHostawayListing',['propertyType' => $data]);
    }

    public function savehostawaylisting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'listing_title' => 'required',
            'listing_bedrooms' => 'required',
            'listing_bathrooms' => 'required',
            'listing_size' => 'required',
            'listing_type'=>'required|not_in:"0"'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {           
            $listing = new HostawayListing();           
            $listing->author = $request->session()->get('loggedInUser');
            $listing->title = $request->listing_title;
            $listing->content = $request->listing_content;
            $listing->type=$request->listing_type;
            $listing->no_of_tenants=$request->listing_tenants;
            $listing->no_of_rooms=$request->listing_rooms;
            $listing->no_of_beds=$request->listing_beds;
            $listing->no_of_bedrooms = $request->listing_bedrooms;
            $listing->no_of_bathrooms = $request->listing_bathrooms;
            $listing->size = $request->listing_size;
            $listing->unit_size=$request->listing_measure;
            $listing->status='Draft';
            $listing->save();
            $listing=HostawayListing::where('author', $request->session()->get('loggedInUser'))->orderBy('id', 'desc')->first();
            
            $pricing = new HostawayPricing();
            $pricing->listing_id=$listing['id'];
            $pricing->save();

            $media = new HostawayMedia();
            $media->listing_id=$listing['id'];
            $media->save();

            $location = new HostawayLocation();
            $location->listing_id=$listing['id'];
            $location->save();

            $bedrooms = new HostawayBedroom();
            $bedrooms->listing_id=$listing['id'];
            $bedrooms->save();

            $terms = new HostawayTerms();
            $terms->listing_id=$listing['id'];
            $terms->save();

            session()->put('listing_id',$listing['id']);

            return response()->json([
                'status' => 200,
                'messages' => 'Add Listing Successfully !'
            ]);
        }
    }

    public function update_listing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'listing_title' => 'required',
            'listing_bedrooms' => 'required',
            'listing_bathrooms' => 'required',
            'listing_size' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            HostawayListing::where('id', $request->id)->update([
                'title' => $request->listing_title,
                'size' => $request->listing_size
            ]);
            return response()->json([
                'status' => 200,
                'messages' => 'Update Listing Successfully !'
            ]);
        }
    }

    public function mylisting()
    {
        $data=HostawayListing::all()->where('author',request()->session()->get('loggedInUser'));
        return view('mylisting',['listingdata'=>$data]);
    }

    public function updatelisting(Request $request)
    {
        $listingdata=HostawayListing::where(['id' => $request->id,'author'=>request()->session()->get('loggedInUser')])->first();
        $pricingdata=HostawayPricing::where('listing_id', $request->id)->first();
        $bedroomdata=HostawayBedroom::where('listing_id', $request->id)->first();
        if($listingdata)
        return view('updatelisting',['listingdata'=>$listingdata,'pricingdata'=>$pricingdata,'bedroomdata'=>$bedroomdata]);
        else
        return view('dashboard');
    }
}
