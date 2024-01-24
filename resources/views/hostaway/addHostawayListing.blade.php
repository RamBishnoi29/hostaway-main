@extends('layouts.appdashboard')
@section('title', 'Add Listing')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
@section('customcss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
                        <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addlisting_alert"></div>
                                <form action="#" method="POST" id="listing_form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="listing_title">Title</label>
                                        <input type="text" class="form-control" id="listing_title" name="listing_title"
                                            placeholder="Enter The Listing Title">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="listing_title">Description</label>
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <textarea id="listing_content" name="listing_content"></textarea>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="listing_title">Type of Listing</label>
                                            <select name="listing_type" class="form-control" id="listing_type"
                                                data-live-search="false" name="listing_type" data-live-search-style="begins"
                                                tabindex="-98" aria-required="true" required>
                                                <option selected="selected" value="0">Select Listing Type</option>                                                
                                                @foreach ($propertyType as $item)
                                                    <option value="{{ $item['hostaway'] }}"> {{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="listing_title">Number of Bedrooms</label>
                                            <input type="text" class="form-control" id="listing_bedrooms"
                                                name="listing_bedrooms" placeholder="Enter Number of Bedrooms">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="listing_title">Number of Tenants</label>
                                            <input type="text" class="form-control" id="listing_tenants"
                                                name="listing_tenants" placeholder="Enter Number of Occupants">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="listing_title">Number of Beds</label>
                                            <input type="text" class="form-control" id="listing_beds" name="listing_beds"
                                                placeholder="Enter Number of Beds">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="listing_title">Number of Bathrooms*</label>
                                            <input type="text" class="form-control" id="listing_bathrooms"
                                                name="listing_bathrooms" placeholder="Enter Number of Bathrooms">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="listing_title">Number of Rooms</label>
                                            <input type="text" class="form-control" id="listing_rooms"
                                                name="listing_rooms" placeholder="Enter Number of Rooms">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="listing_title">Size*</label>
                                            <input type="text" class="form-control" id="listing_size" name="listing_size"
                                                placeholder="Enter The Size (Only Numbers)">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="listing_title">Unit of Measure</label>
                                            <input type="text" class="form-control" id="listing_measure"
                                                name="listing_measure" placeholder="Enter Unit of Measure. Ex. SqFt">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                            <input type="submit" class="btn btn-secondary btn-user btn-block"
                                                value="Save as Draft" id="addlisting_btn">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                        <div class="col-sm-2">
                                            <input type="submit" class="btn btn-success btn-user btn-block"
                                                value="Continue" id="continuelisting_btn">
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
                                        <span id="listing-type-view">
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
@endsection
@section('script')
    <script>
        $(function() {
            $("#listing_form").submit(function(e) {
                e.preventDefault();
                $("#addlisting_btn").val('Please Wait ...');
                $.ajax({
                    url: '{{ route('savehostawaylisting') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('listing_title', res.messages.listing_title);
                            showError('listing_bedrooms', res.messages.listing_bedrooms);
                            showError('listing_bathrooms', res.messages.listing_bathrooms);
                            showError('listing_size', res.messages.listing_size);
                            showError('listing_type', res.messages.listing_type);
                            $("#addlisting_btn").val('Save as Draft');
                        } else if (res.status == 200) {
                            $("#addlisting_alert").html(showMessage('success', res.messages));
                            $("#listing_form")[0].reset();
                            removeValidationClasses("#listing_form");
                            $("#addlisting_btn").val('Save as Draft');
                            $("#addlisting_alert").css("display", "block").delay(2000).fadeOut(
                                400);
                            window.location = '/addhostawaypricing'
                        }
                    }
                });
            });
        });
    </script>
@endsection
