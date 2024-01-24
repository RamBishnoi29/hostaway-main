@extends('layouts.appdashboard')
@section('title', 'Update Listing')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
@section('customcss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 100%;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
    <script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
        </script>
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Listing</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                
                        <div class="tab">
                            <button class="tablinks active" onclick="openCity(event, 'Information')">Information</button>
                            <button class="tablinks" onclick="openCity(event, 'Pricing')">Pricing</button>
                            <button class="tablinks" onclick="openCity(event, 'Media')">Media</button>
                            <button class="tablinks" onclick="openCity(event, 'Features')">Features</button>
                            <button class="tablinks" onclick="openCity(event, 'Location')">Location</button>
                            <button class="tablinks" onclick="openCity(event, 'Bedrooms')">Bedrooms</button>
                            <button class="tablinks" onclick="openCity(event, 'Terms')">Terms</button>
                            <button class="tablinks" onclick="openCity(event, 'Calendar')">Calendar</button>
                          </div>
                          
                          <!-- Tab content -->
                          <div id="Information" class="tabcontent" style="display: block;">
                            <div id="addlisting_alert"></div>
                            <form action="#" method="POST" id="listing_form">
                                @csrf
                                <input type="hidden" name="id" value="{{$listingdata['id']}}">
                                <div class="form-group">
                                    <label for="listing_title">Title </label>
                                    <input type="text" class="form-control" id="listing_title" name="listing_title"
                                        placeholder="Enter The Listing Title" value="{{$listingdata['title']}}">
                                        <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="listing_title">Description</label>
                                    <div class="col-sm-12 mb-6 mb-sm-0">
                                        <textarea id="listing_content" name="listing_content">{{$listingdata['content']}}</textarea>
                                    </div>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="listing_title">Type of Listing</label>
                                        <select name="listing_type" class="form-control" id="listing_type" value="{{$listingdata['type']}}"
                                         data-live-search="false" name="listing_type" data-live-search-style="begins"
                                            tabindex="-98" aria-required="true">
                                            
                                            <option selected="selected" value="">Select Listing Type</option>
                                            <option value="13"> Apartment</option>
                                            <option value="18"> Condo</option>
                                            <option value="3072"> Condo Townhome</option>
                                            <option value="2041"> Condop</option>
                                            <option value="121"> Coop</option>
                                            <option value="112"> Duplex Triplex</option>
                                            <option value="2548"> Farm</option>
                                            <option value="2121"> Land</option>
                                            <option value="27"> Loft</option>
                                            <option value="1231"> Mobile</option>
                                            <option value="51"> Multi Family</option>
                                            <option value="1516"> Other</option>
                                            <option value="50"> Single Family</option>
                                            <option value="70"> Townhome</option>
                                            <option value="1250"> Townhouse</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="listing_title">Number of Bedrooms</label>
                                        <input type="text" class="form-control" id="listing_bedrooms" name="listing_bedrooms"
                                            placeholder="Enter Number of Bedrooms" value="{{$listingdata['no_of_bedrooms']}}"">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="listing_title">Number of Tenants</label>
                                        <input type="text" class="form-control" id="listing_tenants" name="listing_tenants"
                                            placeholder="Enter Number of Occupants" value="{{$listingdata['no_of_tenants']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="listing_title">Number of Beds</label>
                                        <input type="text" class="form-control" id="listing_beds" name="listing_beds"
                                            placeholder="Enter Number of Beds" value="{{$listingdata['no_of_beds']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="listing_title">Number of Bathrooms*</label>
                                        <input type="text" class="form-control" id="listing_bathrooms" name="listing_bathrooms"
                                            placeholder="Enter Number of Bathrooms" value="{{$listingdata['no_of_bathrooms']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="listing_title">Number of Rooms</label>
                                        <input type="text" class="form-control" id="listing_rooms" name="listing_rooms"
                                            placeholder="Enter Number of Rooms" value="{{$listingdata['no_of_rooms']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="listing_title">Size*</label>
                                        <input type="text" class="form-control" id="listing_size" name="listing_size"
                                            placeholder="Enter The Size (Only Numbers)" value="{{$listingdata['size']}}">
                                            <div class="invalid-feedback" ></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="listing_title">Unit of Measure</label>
                                        <input type="text" class="form-control" id="listing_measure" name="listing_measure"
                                            placeholder="Enter Unit of Measure. Ex. SqFt" value="{{$listingdata['unit_size']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-2 mb-sm-0">
                                        
                                    </div>
                                    <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                    <div class="col-sm-2">
                                        <input type="submit" class="btn btn-success btn-user btn-block"
                                            value="Update" id="updatelisting_btn">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                            </form>
                
                          </div>
                          
                          <div id="Pricing" class="tabcontent">
                            <div id="addpricing_alert"></div>
                            <form action="#" method="POST" id="pricing_form">
                                @csrf
                                <div class="form-group">
                                    <label for="type_of_rent">Type of Rent</label>
                                    <select class="form-control" id="type_of_rent"
                                     name="type_of_rent" data-live-search-style="begins"
                                       tabindex="-98" aria-required="true">
                                       <option selected="selected" value="">Select Type of Rent</option>
                                       <option value="Instant"> Instant</option>
                                       <option value="Fixed"> Fixed</option>
                                   </select>
                                        <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="pricing_title">Host Fee</label>
                                        <select class="form-control" id="host_fee"
                                         data-live-search="false" name="host_fee" data-live-search-style="begins"
                                            tabindex="-98" aria-required="true">
                                            <option selected="selected" value="">Select Host Fee</option>
                                            <option value="3"> 3%</option>
                                            <option value="8"> 8%</option>
                                            <option value="15"> 15%</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pricing_title">Fixed Amount Check   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" id="fixed_amount_check" name="fixed_amount_check"/></label>
                                        <input type="text" class="form-control" id="fixed_amount" name="fixed_amount"
                                            placeholder="Enter Fixed Amount" value="{{$pricingdata['fixed_amount']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="pricing_title">Monthly Rent</label>
                                        <input type="text" class="form-control" id="monthly_rent" name="monthly_rent"
                                            placeholder="Enter Monthly Rent" value="{{$pricingdata['monthly_rent']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pricing_title">Night Price</label>
                                        <input type="text" class="form-control" id="night_price" name="night_price"
                                            placeholder="Enter Night Price" value="{{$pricingdata['night_price']}}">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-6 mb-sm-0">
                                    <label for="pricing_title">Setup Extra Services Price</label>
                                    <div id="more_extra_services_main" class="custom-extra-prices">
                                    <div class="more_extra_services_wrap" id="row1" style="background-color: aliceblue;padding:10px">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-10">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="extra_price[0][name]" class="form-control" placeholder="Enter service name">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="price"> Price </label>
                                                    <input type="text" name="extra_price[0][price]" class="form-control" placeholder="Enter price - only digits">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="type"> Type </label>
                                                    <select name="extra_price[0][type]" class="form-control" data-live-search="false" data-live-search-style="begins" tabindex="-98">
                                                        <option value="single_fee">Single Fee</option>
                                                        <option value="per_night">Per Night</option>
                                                        <option value="per_guest">Per Guest</option>
                                                        <option value="per_night_per_guest">Per Night Per Guest</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <button type="button" data-remove="0" id="1" class="remove-extra-services btn btn-primary btn-slim">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                        <div class="col-sm-12 col-xs-12" style="text-align: end;margin-top:10px">
                                            <button type="button" id="add_more_extra_services" data-increment="5" class="btn btn-primary btn-slim"><i class="fa fa-plus"></i> Add More</button>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="pricing_title">Allow additional Tenants</label>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-2 mb-sm-0">
                                                <input type="radio" class="" id="additional_guest_allow" value="1" name="additional_guest_allow"
                                                >  <label for="pricing_title">Yes</label>
                                            </div>
                                            <div class="col-sm-8 mb-4 mb-sm-0">
                                                <input type="radio" class="" id="additional_guest_allow" value="0" name="additional_guest_allow"
                                                > <label for="pricing_title"> No</label>
                                            </div>
                                        </div>
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="pricing_title">Additional Tenants</label>
                                        <input type="text" class="form-control" id="additional_guest_price" name="additional_guest_price"
                                            placeholder="Enter Additional Guest Price">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="pricing_title">No of Guests</label>
                                        <input type="text" class="form-control" id="additional_no_of_guests" name="additional_no_of_guests"
                                            placeholder="Enter No. of Guests">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="pricing_title">Cleaning Fee</label>
                                        <input type="text" class="form-control" id="cleaning_fee" name="cleaning_fee"
                                            placeholder="Enter the Price for Cleaning Fee">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pricing_title"></label>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-2 mb-sm-0">
                                                <input type="radio" class="" id="additional_guest_allow" name="additional_guest_allow"
                                                >  <label for="pricing_title"> Daily</label>
                                            </div>
                                            <div class="col-sm-8 mb-4 mb-sm-0">
                                                <input type="radio" class="" id="additional_guest_allow" name="additional_guest_allow"
                                                > <label for="pricing_title"> Per Rental</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="pricing_title">Security deposit</label>
                                        <input type="text" class="form-control" id="security_deposit" name="security_deposit"
                                            placeholder="Enter the Price for Security deposit">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pricing_title">Tax %</label>
                                        <input type="text" class="form-control" id="tax" name="tax"
                                            placeholder="Enter Tax Persentage ( Only Number )">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-2 mb-sm-0">
                                        <input type="submit" class="btn btn-secondary btn-user btn-block"
                                            value="Save as Draft" id="addpricing_btn">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                    <div class="col-sm-2">
                                        <input type="submit" class="btn btn-success btn-user btn-block"
                                            value="Continue" id="continuepricing_btn">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                            </form>
                          </div>
                          
                          <div id="Media" class="tabcontent">
                            <h3>Media</h3>
                            <p>Tokyo is the capital of Japan.</p>
                          </div>

                          <div id="Features" class="tabcontent">
                            <h3>Features</h3>
                            <p>Tokyo is the capital of Japan.</p>
                          </div>

                          <div id="Location" class="tabcontent">
                            <h3>Location</h3>
                            <p>Tokyo is the capital of Japan.</p>
                          </div>

                          <div id="Bedrooms" class="tabcontent">
                            <div id="addbedrooms_alert"></div>
                                <form action="#" method="POST" id="bedrooms_form">
                                    <input type="hidden" name="id" value="{{$bedroomdata['id']}}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <div id="more_extra_services_main" class="custom-extra-prices">
                                                @if($bedroomdata['bed_data']!=null)
                                    @foreach ($bedroomdata['bed_data'] as $key => $item)
                                                <div class="more_extra_services_wrap" id="row{{$key}}"
                                                    style="margin-top: 10px">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">Bedroom Name</label>
                                                                <input type="text" name="extra_bedroom[{{$key}}][name]"
                                                                    class="form-control" value="{{$item['name']}}"
                                                                    placeholder="Ex. Master Room or Room 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="price"> Number of Guests </label>
                                                                <input type="text" name="extra_bedroom[{{$key}}][guests]"
                                                                    class="form-control" value="{{$item['guests']}}"
                                                                    placeholder="Enter the No. of Guests for this Room">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">Number of Beds </label>
                                                                <input type="text" name="extra_bedroom[{{$key}}][beds]"
                                                                    class="form-control" value="{{$item['beds']}}"
                                                                    placeholder="Enter Number of Beds">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="acc_bedroom_type">Bed type</label>
                                                                <select name="extra_bedroom[{{$key}}][bed_type]"
                                                                    class="form-control" data-live-search="true"
                                                                    data-live-search-style="begins" tabindex="-98">
                                                                    <option value="King bed">King bed</option>
                                                                    <option value="Queen bed">Queen bed</option>
                                                                    <option value="Sofa bed">Sofa bed</option>
                                                                    <option value="Twin bed">Twin bed</option>
                                                                    <option value="Futon">Futon</option>
                                                                    <option value="Murphy bed">Murphy bed</option>
                                                                    <option value="Single bed">Single bed</option>
                                                                    <option value="Bunk bed">Bunk bed</option>
                                                                    <option value="Double bed">Double bed</option>
                                                                    <option value="Cribs">Cribs</option>
                                                                    <option value="Extra bed">Extra bed</option>
                                                                    <option value="Couch">Couch</option>
                                                                    <option value="Air mattress">Air mattress</option>
                                                                    <option value="Floor mattress">Floor mattress</option>
                                                                    <option value="Toddler bed">Toddler bed</option>
                                                                    <option value="Hammock">Hammock</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control control--checkbox">
                                                                    <input type="checkbox"
                                                                        name="extra_bedroom[{{$key}}][acc_private_bathroom]"
                                                                        value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <span class="contro-text">Private Bathroom</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <button type="button" data-remove="0" id="1"
                                                                class="remove-extra-services btn btn-primary btn-slim">Remove
                                                                this Room</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12 col-xs-12" style="text-align: end;margin-top:10px">
                                        <button type="button" id="add_more_extra_services" data-increment="5"
                                            class="btn btn-primary btn-slim"><i class="fa fa-plus"></i> Add another
                                            Room</button>
                                    </div>
                                    
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-2 mb-sm-0">
                               
                            </div>
                            <div class="col-sm-8 mb-4 mb-sm-0"></div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success btn-user btn-block" value="Update"
                                    id="addbedrooms_btn">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        </form>
                          </div>

                          <div id="Terms" class="tabcontent">
                            <h3>Terms</h3>
                            <p>Tokyo is the capital of Japan.</p>
                          </div>

                          <div id="Calendar" class="tabcontent">
                            <h3>Calendar</h3>
                            <p>Tokyo is the capital of Japan.</p>
                          </div>
               
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Information</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="add-new-item item-wrap">
                            <div class="upload-view-media item-media-thumb">
                                <div class="media-image">
                                    <a class="hover-effect" href=""> <img src="http://placehold.it/370x250"
                                            alt="Image">
                                    </a>
                                </div>
                                <div class="item-media-price">
                                    <span class="item-price">
                                        <sup>$</sup>
                                        <span class="price-count" id="price-place">
                                            0
                                        </span>
                                        <sub>/month</sub>
                                    </span>
                                </div>

                                <div class="item-user-image">
                                    <img src="https://houzlet.com/wp-content/themes/homey/images/avatar.png"
                                        class="img-circle" alt="Kelly Sharma" width="36" height="36">
                                </div>
                            </div>
                            <div class="upload-view-body item-body">
                                <div class="item-title-head">
                                    <h3 class="title">
                                        <span id="title-place">
                                            <a href="">
                                                Title </a>
                                        </span>
                                    </h3>
                                    <address class="item-address">
                                        <span id="address-place">
                                            Address
                                        </span>
                                    </address>
                                </div>

                                <ul class="item-amenities">

                                    <li>
                                        <i class="fa fa-bed"></i> <span id="total-beds"></span>
                                        Bedrooms
                                    </li>

                                    <li>
                                        <i class="fa fa-shower"></i> <span id="total-baths"></span>
                                        Baths
                                    </li>

                                    <li>
                                        <i class="fa fa-user"></i> <span id="total-guests"></span>
                                        Tenants
                                    </li>

                                    <li class="item-type">
                                        <span id="terms-type-view">
                                            Type
                                        </span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->
@endsection

@section('customscript')
<!-- Summernite scripts -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#listing_content').summernote({
        placeholder: 'Enter Description....',
        tabsize: 2,
        height: 100
    });
</script>

<script>
    $(document).ready(function(){  
      var i=1;    
  
      $('#add_more_extra_services').click(function(){    
           i++;    
           $('#more_extra_services_main').append(`
           <div class="more_extra_services_wrap" id="row`+i+`" style="background-color: aliceblue;padding:10px">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-10">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="extra_price[`+(i-1)+`][name]" class="form-control" placeholder="Enter service name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="price"> Price </label>
                                                        <input type="text" name="extra_price[`+(i-1)+`][price]" class="form-control" placeholder="Enter price - only digits">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="type"> Type </label>
                                                        <select name="extra_price[`+(i-1)+`][type]" class="form-control" data-live-search="false" data-live-search-style="begins" tabindex="-98">
                                                            <option value="single_fee">Single Fee</option>
                                                            <option value="per_night">Per Night</option>
                                                            <option value="per_guest">Per Guest</option>
                                                            <option value="per_night_per_guest">Per Night Per Guest</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <button type="button" data-remove="0" id="`+i+`" class="remove-extra-services btn btn-primary btn-slim">Delete</button>
                                                </div>
                                            </div>
                                        </div>
           `);    
      }); 
      $(document).on('click', '.remove-extra-services', function(){    
           var button_id = $(this).attr("id");     
           $('#row'+button_id+'').remove();    
      });    

    });
</script>

<script>
    $(document).ready(function() {
        var i = 1;

        $('#add_more_extra_services').click(function() {
            i++;
            $('#more_extra_services_main').append(`
            <div class="more_extra_services_wrap" id="row` + i + `"
                                                style="margin-top: 10px">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="name">Bedroom Name</label>
                                                            <input type="text" name="extra_bedroom[` + (i - 1) + `][name]"
                                                                class="form-control"
                                                                placeholder="Ex. Master Room or Room 1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="price"> Number of Guests </label>
                                                            <input type="text" name="extra_bedroom[` + (i - 1) + `][guests]"
                                                                class="form-control"
                                                                placeholder="Enter the No. of Guests for this Room">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="name">Number of Beds </label>
                                                            <input type="text" name="extra_bedroom[` + (i - 1) + `][beds]"
                                                                class="form-control" placeholder="Enter Number of Beds">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="acc_bedroom_type">Bed type</label>
                                                            <select name="extra_bedroom[` + (i - 1) + `][bed_type]"
                                                                class="form-control" data-live-search="true"
                                                                data-live-search-style="begins" tabindex="-98">
                                                                <option value="King bed">King bed</option>
                                                                <option value="Queen bed">Queen bed</option>
                                                                <option value="Sofa bed">Sofa bed</option>
                                                                <option value="Twin bed">Twin bed</option>
                                                                <option value="Futon">Futon</option>
                                                                <option value="Murphy bed">Murphy bed</option>
                                                                <option value="Single bed">Single bed</option>
                                                                <option value="Bunk bed">Bunk bed</option>
                                                                <option value="Double bed">Double bed</option>
                                                                <option value="Cribs">Cribs</option>
                                                                <option value="Extra bed">Extra bed</option>
                                                                <option value="Couch">Couch</option>
                                                                <option value="Air mattress">Air mattress</option>
                                                                <option value="Floor mattress">Floor mattress</option>
                                                                <option value="Toddler bed">Toddler bed</option>
                                                                <option value="Hammock">Hammock</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="control control--checkbox">
                                                                <input type="checkbox"
                                                                    name="extra_bedroom[` + (i - 1) + `][acc_private_bathroom]"
                                                                    value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span class="contro-text">Private Bathroom</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <button type="button" data-remove="0" id="` + i + `"
                                                            class="remove-extra-services btn btn-primary btn-slim">Remove
                                                            this Room</button>
                                                    </div>
                                                </div>
                                            </div>
       `);
        });
        $(document).on('click', '.remove-extra-services', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
@endsection

@section('script')
    <script>
        $("#listing_form").submit(function(e){
                e.preventDefault();
                $("#updatelisting_btn").val('Please Wait ...');
                $.ajax({
                    url:'{{route('update_listing')}}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    success:function(res){
                        if(res.status==400){
                            showError('listing_title',res.messages.listing_title);
                            showError('listing_bedrooms',res.messages.listing_bedrooms);
                            showError('listing_bathrooms',res.messages.listing_bathrooms);
                            showError('listing_size',res.messages.listing_size);
                            $("#updatelisting_btn").val('Update');
                        }else if(res.status==200){
                        $("#addlisting_alert").html(showMessage('success',res.messages));
                        removeValidationClasses("#listing_form");
                        $("#updatelisting_btn").val('Update');
                        $("#addlisting_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                    }
                });
            });

            $("#pricing_form").submit(function(e){
                e.preventDefault();
                $("#addpricing_btn").val('Please Wait ...');
                $.ajax({
                    url:'{{route('savepricing')}}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    success:function(res){
                       // console.log(res);
                    //     if(res.status==400){
                    //         showError('pricing_title',res.messages.pricing_title);
                    //         showError('pricing_bedrooms',res.messages.pricing_bedrooms);
                    //         showError('pricing_bathrooms',res.messages.pricing_bathrooms);
                    //         showError('pricing_size',res.messages.pricing_size);
                    //         $("#addpricing_btn").val('Save as Draft');
                    //     }else 
                    if(res.status==200){
                        $("#addpricing_alert").html(showMessage('success',res.messages));
                        $("#pricing_form")[0].reset();
                        removeValidationClasses("#pricing_form");
                        $("#addpricing_btn").val('Save as Draft');
                        $("#addpricing_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                    }
                });
            });

            $("#bedrooms_form").submit(function(e) {
                e.preventDefault();
                $("#addbedrooms_btn").val('Please Wait ...');
                $.ajax({
                    url: '{{ route('update_bedrooms') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        //console.log(res);
                        // if(res.status==400){
                        //     showError('bedrooms_title',res.messages.bedrooms_title);
                        //     showError('bedrooms_bedrooms',res.messages.bedrooms_bedrooms);
                        //     showError('bedrooms_bathrooms',res.messages.bedrooms_bathrooms);
                        //     showError('bedrooms_size',res.messages.bedrooms_size);
                        //     $("#addbedrooms_btn").val('Save as Draft');
                        // }else 
                        if (res.status == 200) {
                            $("#addbedrooms_alert").html(showMessage('success', res.messages));
                            removeValidationClasses("#bedrooms_form");
                            $("#addbedrooms_btn").val('Update');
                            $("#addbedrooms_alert").css("display", "block").delay(2000).fadeOut(
                                400);
                        }
                    }
                });
            });
    </script>
@endsection
