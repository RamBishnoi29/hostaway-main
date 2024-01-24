<?php

namespace App\Http\Controllers;

use App\Models\Bedrooms;
use App\Models\Listings;
use App\Models\Location;
use App\Models\Media;
use App\Models\Pricing;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ListingsController extends Controller
{
    public function addlisting()
    {
        return view('addlistings');
    }

    public function savelisting(Request $request)
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
            $listing = new Listings();
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
            $listing=Listings::where('author', $request->session()->get('loggedInUser'))->orderBy('id', 'desc')->first();
            
            $pricing = new Pricing();
            $pricing->listing_id=$listing['id'];
            $pricing->save();

            $media = new Media();
            $media->listing_id=$listing['id'];
            $media->save();

            $location = new Location();
            $location->listing_id=$listing['id'];
            $location->save();

            $bedrooms = new Bedrooms();
            $bedrooms->listing_id=$listing['id'];
            $bedrooms->save();

            $terms = new Terms();
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
            Listings::where('id', $request->id)->update([
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
        $data=Listings::all()->where('author',request()->session()->get('loggedInUser'));
        return view('mylisting',['listingdata'=>$data]);
    }

    public function updatelisting(Request $request)
    {
        $listingdata=Listings::where(['id' => $request->id,'author'=>request()->session()->get('loggedInUser')])->first();
        $pricingdata=Pricing::where('listing_id', $request->id)->first();
        $bedroomdata=Bedrooms::where('listing_id', $request->id)->first();
        if($listingdata)
        return view('updatelisting',['listingdata'=>$listingdata,'pricingdata'=>$pricingdata,'bedroomdata'=>$bedroomdata]);
        else
        return view('dashboard');
    }
}
