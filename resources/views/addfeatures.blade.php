@extends('layouts.appdashboard')
@section('title', 'Add Features')
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
                        <h6 class="m-0 font-weight-bold text-primary">Features</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addfeatures_alert"></div>
                                <form action="#" method="POST" id="features_form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type_of_rent">Amenities</label>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <input type="checkbox" class="" id="smoking_allowed"
                                                        name="smoking_allowed"> <label for="features_title">Air Conditioning</label>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                            <input type="submit" class="btn btn-secondary btn-user btn-block"
                                                value="Save as Draft" id="addfeatures_btn">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                        <div class="col-sm-2">
                                            <input type="submit" class="btn btn-success btn-user btn-block"
                                                value="Continue" id="continuefeatures_btn">
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
                                        <span id="features-type-view">
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
            $("#features_form").submit(function(e){
                e.preventDefault();
                // $("#addfeatures_btn").val('Please Wait ...');
                // $.ajax({
                //     url:'{{ route('savepricing') }}',
                //     method:'post',
                //     data:$(this).serialize(),
                //     //dataType:'json',
                //     success:function(res){
                //         console.log(res);
                //     //     if(res.status==400){
                //     //         showError('features_title',res.messages.features_title);
                //     //         showError('features_bedrooms',res.messages.features_bedrooms);
                //     //         showError('features_bathrooms',res.messages.features_bathrooms);
                //     //         showError('features_size',res.messages.features_size);
                //     //         $("#addfeatures_btn").val('Save as Draft');
                //     //     }else if(res.status==200){
                //     //     $("#addfeatures_alert").html(showMessage('success',res.messages));
                //     //     $("#features_form")[0].reset();
                //     //     removeValidationClasses("#features_form");
                //     //     $("#addfeatures_btn").val('Save as Draft');
                //     // }
                //     }
                // });
                window.location='{{route('addlocation')}}'
            });
        });
    </script>
@endsection
