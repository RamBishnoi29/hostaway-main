@extends('layouts.appdashboard')
@section('title', 'Add Pricing')
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
                        <h6 class="m-0 font-weight-bold text-primary">Pricing</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
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
                                                placeholder="Enter Fixed Amount">
                                                <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="pricing_title">Monthly Rent</label>
                                            <input type="text" class="form-control" id="monthly_rent" name="monthly_rent"
                                                placeholder="Enter Monthly Rent">
                                                <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="pricing_title">Night Price</label>
                                            <input type="text" class="form-control" id="night_price" name="night_price"
                                                placeholder="Enter Night Price">
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
                                            <label for="pricing_title">Allow additional Guest</label>
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
                                                    <input type="radio" class="" id="cleaning_fee_type" name="cleaning_fee_type"
                                                    >  <label for="pricing_title"> Daily</label>
                                                </div>
                                                <div class="col-sm-8 mb-4 mb-sm-0">
                                                    <input type="radio" class="" id="cleaning_fee_type" name="cleaning_fee_type"
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
                                        <span id="pricing-type-view">
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
@endsection
@section('script')
    <script>
        $(function(){
            $("#pricing_form").submit(function(e){
                e.preventDefault();
                $("#addpricing_btn").val('Please Wait ...');
                $.ajax({
                    url:'{{route('saveHostawaypricing')}}',
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
                        window.location='{{route('addHostamedia')}}'
                    }
                    }
                });
            });
        });
    </script>
@endsection
