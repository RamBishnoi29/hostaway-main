@extends('layouts.appdashboard')
@section('title', 'Add Location')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
@section('customcss')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script language="javascript" type="text/javascript">

    var map;
    var geocoder;
    function InitializeMap() {

        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions =
        {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
    }

    function FindLocaiton() {
        geocoder = new google.maps.Geocoder();
        InitializeMap();

        var address = document.getElementById("addressinput").value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

            }
            else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });

    }


    function Button1_onclick() {
        FindLocaiton();
    }

    window.onload = InitializeMap;

</script>
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Listing</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Location</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addterms_alert"></div>
                                <form action="#" method="POST" id="terms_form">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-sm-8 mb-4 mb-sm-0">
                                            <label for="terms_title">Address*</label>
                                            <input type="text" class="form-control" id="street_address" name="street_address"
                                                placeholder="Enter The Listing Address">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="terms_title">Apt, Suite (Optional)</label>
                                            <input type="text" class="form-control" id="street_address_two" name="street_address_two"
                                                placeholder="EX: #123">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <label for="terms_title">City*</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Enter The City">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="terms_title">State*</label>
                                            <input type="text" class="form-control" id="state" name="state"
                                                placeholder="Enter The State">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="terms_title">Zip Code*</label>
                                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                                                placeholder="Enter Your Zip Code">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Area</label>
                                            <input type="text" class="form-control" id="area" name="area"
                                                placeholder="Enter The Area">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="terms_title">Country</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                placeholder="Enter The Country">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <label for="terms_title">Drag and drop the pin on map to find exact location</label>
                                            <div id ="map" style="height: 253px" ></div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Find the address on the map*</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude"
                                                placeholder="Enter The Latitude">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="terms_title">&nbsp;</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude"
                                                placeholder="Enter The Longitude">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                            <input type="submit" class="btn btn-secondary btn-user btn-block"
                                                value="Save as Draft" id="addterms_btn">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                        <div class="col-sm-2">
                                            <input type="submit" class="btn btn-success btn-user btn-block"
                                                value="Continue" id="continueterms_btn">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
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

@section('script')
    <script>
        $(function(){
            $("#terms_form").submit(function(e){
                e.preventDefault();
                $("#addterms_btn").val('Please Wait ...');
                $.ajax({
                    url:'{{ route('savelocation') }}',
                    method:'post',
                    data:$(this).serialize(),
                    //dataType:'json',
                    success:function(res){
                        console.log(res);
                    //     if(res.status==400){
                    //         showError('terms_title',res.messages.terms_title);
                    //         showError('terms_bedrooms',res.messages.terms_bedrooms);
                    //         showError('terms_bathrooms',res.messages.terms_bathrooms);
                    //         showError('terms_size',res.messages.terms_size);
                    //         $("#addterms_btn").val('Save as Draft');
                    //     }else 
                    if(res.status==200){
                        $("#addterms_alert").html(showMessage('success',res.messages));
                        $("#terms_form")[0].reset();
                        removeValidationClasses("#terms_form");
                        $("#addterms_btn").val('Save as Draft');
                        $("#addterms_alert").css("display", "block").delay(2000).fadeOut(400);
                        window.location='{{route('addhostawaybedrooms')}}'
                    }
                    }
                });
            });
        });
    </script>
@endsection
