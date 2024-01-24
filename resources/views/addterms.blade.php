@extends('layouts.appdashboard')
@section('title', 'Add Terms')
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
                        <h6 class="m-0 font-weight-bold text-primary">Terms</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addterms_alert"></div>
                                <form action="#" method="POST" id="terms_form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type_of_rent">Rental Agreement</label>
                                        <input type="text" class="form-control" id="rental_agreement"
                                            name="rental_agreement" placeholder="Copy Past Your Rental Agreement">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Minimum Days for Rental</label>
                                            <input type="text" class="form-control" id="min_days" name="min_days"
                                                placeholder="i.e. 7 Days, 30 Days, 180 Days etc. ( Only Numbers )">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="terms_title">Maximum Days of a Booking</label>
                                            <input type="text" class="form-control" id="max_days" name="max_days"
                                                placeholder="Enter Maximum Days of Booking ( Only Numbers )">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Arrival Time?</label>
                                            <select name="check_in_time" class="form-control" id="check_in_time"
                                                data-live-search="false" title="Select" tabindex="-98">
                                                <option class="bs-title-option" value="">Select</option>
                                                <option value="8:00 AM">8:00 AM</option>
                                                <option value="8:30 AM">8:30 AM</option>
                                                <option value="9:00 AM">9:00 AM</option>
                                                <option value="9:30 AM">9:30 AM</option>
                                                <option value="10:00 AM">10:00 AM</option>
                                                <option value="10:30 AM">10:30 AM</option>
                                                <option value="11:00 AM">11:00 AM</option>
                                                <option value="11:30 AM">11:30 AM</option>
                                                <option value="12:00 PM">12:00 PM</option>
                                                <option value="12:30 PM">12:30 PM</option>
                                                <option value="1:00 PM">1:00 PM</option>
                                                <option value="1:30 PM">1:30 PM</option>
                                                <option value="2:00 PM">2:00 PM</option>
                                                <option value="2:30 PM">2:30 PM</option>
                                                <option value="3:00 PM">3:00 PM</option>
                                                <option value="3:30 PM">3:30 PM</option>
                                                <option value="4:00 PM">4:00 PM</option>
                                                <option value="4:30 PM">4:30 PM</option>
                                                <option value="5:00 PM">5:00 PM</option>
                                                <option value="5:30 PM">5:30 PM</option>
                                                <option value="6:00 PM">6:00 PM</option>
                                                <option value="6:30 PM">6:30 PM</option>
                                                <option value="7:00 PM">7:00 PM</option>
                                                <option value="7:30 PM">7:30 PM</option>
                                                <option value="8:00 PM">8:00 PM</option>
                                                <option value="8:30 PM">8:30 PM</option>
                                                <option value="9:00 PM">9:00 PM</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="terms_title">Leave By?</label>
                                            <select name="check_out_time" class="form-control" id="check_out_time"
                                                data-live-search="false" title="Select" tabindex="-98">
                                                <option class="bs-title-option" value="">Select</option>
                                                <option value="8:00 AM">8:00 AM</option>
                                                <option value="8:30 AM">8:30 AM</option>
                                                <option value="9:00 AM">9:00 AM</option>
                                                <option value="9:30 AM">9:30 AM</option>
                                                <option value="10:00 AM">10:00 AM</option>
                                                <option value="10:30 AM">10:30 AM</option>
                                                <option value="11:00 AM">11:00 AM</option>
                                                <option value="11:30 AM">11:30 AM</option>
                                                <option value="12:00 PM">12:00 PM</option>
                                                <option value="12:30 PM">12:30 PM</option>
                                                <option value="1:00 PM">1:00 PM</option>
                                                <option value="1:30 PM">1:30 PM</option>
                                                <option value="2:00 PM">2:00 PM</option>
                                                <option value="2:30 PM">2:30 PM</option>
                                                <option value="3:00 PM">3:00 PM</option>
                                                <option value="3:30 PM">3:30 PM</option>
                                                <option value="4:00 PM">4:00 PM</option>
                                                <option value="4:30 PM">4:30 PM</option>
                                                <option value="5:00 PM">5:00 PM</option>
                                                <option value="5:30 PM">5:30 PM</option>
                                                <option value="6:00 PM">6:00 PM</option>
                                                <option value="6:30 PM">6:30 PM</option>
                                                <option value="7:00 PM">7:00 PM</option>
                                                <option value="7:30 PM">7:30 PM</option>
                                                <option value="8:00 PM">8:00 PM</option>
                                                <option value="8:30 PM">8:30 PM</option>
                                                <option value="9:00 PM">9:00 PM</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Smoking Allowed?</label>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2 mb-sm-0">
                                                    <input type="radio" class="" id="smoking_allowed" value="1"
                                                        name="smoking_allowed"> <label for="terms_title">Yes</label>
                                                </div>
                                                <div class="col-sm-8 mb-4 mb-sm-0">
                                                    <input type="radio" class="" id="smoking_allowed" value="0"
                                                        name="smoking_allowed"> <label for="terms_title">
                                                        No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Pets Allowed?</label>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2 mb-sm-0">
                                                    <input type="radio" class="" id="pets_allowed" value="1"
                                                        name="pets_allowed"> <label for="terms_title">Yes</label>
                                                </div>
                                                <div class="col-sm-8 mb-4 mb-sm-0">
                                                    <input type="radio" class="" id="pets_allowed" value="0"
                                                        name="pets_allowed"> <label for="terms_title">
                                                        No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Parties Allowed?</label>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2 mb-sm-0">
                                                    <input type="radio" class="" id="party_allowed" value="1"
                                                        name="party_allowed"> <label for="terms_title">Yes</label>
                                                </div>
                                                <div class="col-sm-8 mb-4 mb-sm-0">
                                                    <input type="radio" class="" id="party_allowed" value="0"
                                                        name="party_allowed"> <label for="terms_title">
                                                        No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="terms_title">Safe for Children?</label>
                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-2 mb-sm-0">
                                                    <input type="radio" class="" id="safe_for_children" value="1"
                                                        name="safe_for_children"> <label for="terms_title">Yes</label>
                                                </div>
                                                <div class="col-sm-8 mb-4 mb-sm-0">
                                                    <input type="radio" class="" id="safe_for_children" value="0"
                                                        name="safe_for_children"> <label for="terms_title">
                                                        No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <label for="terms_title">Additional Rules Information (Optional)</label>
                                            <textarea id="additional_info" class="form-control" name="additional_info"></textarea>
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
                    url:'{{ route('saveterms') }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
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
                        $("#addterms_btn").css("display", "block").delay(2000).fadeOut(400);
                    }
                    }
                });
            });
        });
    </script>
@endsection
