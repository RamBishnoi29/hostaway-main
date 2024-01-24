@extends('layouts.appdashboard')
@section('title', 'Add Bedrooms')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
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
                        <h6 class="m-0 font-weight-bold text-primary">Bedrooms</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addbedrooms_alert"></div>
                                <form action="#" method="POST" id="bedrooms_form">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <div id="more_extra_services_main" class="custom-extra-prices">
                                                <div class="more_extra_services_wrap" id="row1"
                                                    style="margin-top: 10px">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">Bedroom Name</label>
                                                                <input type="text" name="extra_bedroom[0][name]"
                                                                    class="form-control"
                                                                    placeholder="Ex. Master Room or Room 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="price"> Number of Guests </label>
                                                                <input type="text" name="extra_bedroom[0][guests]"
                                                                    class="form-control"
                                                                    placeholder="Enter the No. of Guests for this Room">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">Number of Beds </label>
                                                                <input type="text" name="extra_bedroom[0][beds]"
                                                                    class="form-control" placeholder="Enter Number of Beds">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="acc_bedroom_type">Bed type</label>
                                                                <select name="extra_bedroom[0][bed_type]"
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
                                                                        name="extra_bedroom[0][acc_private_bathroom]"
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12" style="text-align: end;margin-top:10px">
                                        <button type="button" id="add_more_extra_services" data-increment="5"
                                            class="btn btn-primary btn-slim"><i class="fa fa-plus"></i> Add another
                                            Room</button>
                                    </div>

                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-2 mb-sm-0">

                            </div>
                            <div class="col-sm-8 mb-4 mb-sm-0"></div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success btn-user btn-block" value="Continue"
                                    id="addbedrooms_btn">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        </form>
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
                                        <span id="bedrooms-type-view">
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
        $(function() {
            $("#bedrooms_form").submit(function(e) {
                e.preventDefault();
                $("#addbedrooms_btn").val('Please Wait ...');
                $.ajax({
                    url: '{{ route('savebedrooms') }}',
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
                            $("#bedrooms_form")[0].reset();
                            removeValidationClasses("#bedrooms_form");
                            $("#addbedrooms_btn").val('Continue');
                            $("#addbedrooms_alert").css("display", "block").delay(2000).fadeOut(
                                400);
                                window.location='{{route('addterms')}}'
                        }
                    }
                });
            });
        });
    </script>
@endsection
