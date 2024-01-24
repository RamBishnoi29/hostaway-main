@extends('layouts.appdashboard')
@section('title', 'Add Media')
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
                        <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addmedia_alert"></div>
                                <form action="#" method="POST" id="media_form" enctype="multipart/form-data">
                                    @csrf
                                    <div style="border-style: dashed;text-align: center; height:200px;padding-top:30px">

                                        <h4>
                                            Drag and drop the images to customize the gallery order.<br>Click on the
                                            star icon to set the featured image<br>
                                            <span>(Minimum size 1440 x 900 px)</span>
                                        </h4>
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="form-control" name="upload_image"
                                                        id="upload_image" multiple=""
                                                        accept="image/jpeg,.jpg,.jpeg,image/gif,.gif,image/png,.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <hr class="row-separator">
                                        <h3 class="sub-title"></h3>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="video_url">Video URL</label>
                                                    <input type="text" class="form-control" name="video_url"
                                                        value=""
                                                        placeholder="Enter the video link or URL. Supported formats: YouTube, Vimeo, SWF and MOV">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="video_url">Caption</label>
                                                    <input type="text" class="form-control" name="caption" value=""
                                                        placeholder="i.e Kitche,hall ">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="video_url">SortOrder</label>
                                                    <input type="number" class="form-control" name="shortorder"
                                                        value="" placeholder="i.e 1,2,3,4 ">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                            <input type="submit" class="btn btn-secondary btn-user btn-block"
                                                value="Save as Draft" id="addmedia_btn">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-8 mb-4 mb-sm-0"></div>
                                        <div class="col-sm-2">
                                            <input type="submit" class="btn btn-success btn-user btn-block"
                                                value="Continue" id="continuemedia_btn">
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
                                        <span id="media-type-view">
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
        $(function() {
            $("#media_form").submit(function(e) {
                e.preventDefault();
                $("#addmedia_btn").val('Please Wait ...');
                $.ajax({
                    url: '{{ route('saveHostamedia') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        // if (res.status == 400) {
                        //     showError('media_title', res.messages.media_title);
                        //     showError('media_bedrooms', res.messages.media_bedrooms);
                        //     showError('media_bathrooms', res.messages.media_bathrooms);
                        //     showError('media_size', res.messages.media_size);
                        //     $("#addmedia_btn").val('Save as Draft');
                        // } else 
                        if (res.status == 200) {
                            $("#addmedia_alert").html(showMessage('success', res.messages));
                            $("#media_form")[0].reset();
                            removeValidationClasses("#media_form");
                            $("#addmedia_btn").val('Save as Draft');
                            $("#addmedia_alert").css("display", "block").delay(2000).fadeOut(
                                400);
                            window.location = '/addhostawayamenities'
                        }
                    }
                });
            });
        });
    </script>
@endsection
