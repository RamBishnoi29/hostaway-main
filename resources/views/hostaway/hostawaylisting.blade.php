@extends('layouts.appdashboard')
@section('title', 'My Listing')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
@section('customcss')
    <link href='{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}' rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">My Listings</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink" style="">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Published</a>
                        <a class="dropdown-item" href="#">Draft</a>
                        <a class="dropdown-item" href="#">Pending</a>
                        <a class="dropdown-item" href="#">Disabled</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            @csrf
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 57px;">Thumbnail</th>
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 61px;">Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 49px;">Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 60px;">Bedrooms</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Baths</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 67px;">Tenants</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 67px;">Property ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Source</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Hostaway Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listingdata as $key => $item)
                                            <tr class="odd">
                                                <td class="">{{ $key + 1 }}</td>
                                                <td class="sorting_1">{{ $item['title'] }}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $item['no_of_bedrooms'] }}</td>
                                                <td>{{ $item['no_of_bathrooms'] }}</td>
                                                <td></td>
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item['status'] }}</td>
                                                <td></td>
                                                <td> <a href="#"
                                                        onclick='addHostway({{ $item["id"] }},{{ $item["hostaway"] }})'
                                                        class="btn btn-warning btn-sm" style="margin-top: 5px">
                                                        {{ $item['hostaway'] == '0' ? 'Add' : 'Update' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div style="align-items: center; justify-content: center;">

                                                        <a href="#" onclick='addHostway({{ $item }})'
                                                            class="btn btn-warning btn-sm" style="margin-top: 5px">
                                                            <i class="fas fa-splotch"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-info btn-sm"
                                                            style="margin-top: 5px">
                                                            <i class="fas fa-play"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-secondary btn-sm"
                                                            style="margin-top: 5px">
                                                            <i class="fas fa-long-arrow-alt-right"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('customscript')
    <script src='{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}'></script>
    <script src='{{ asset('admin/js/demo/datatables-demo.js') }}'></script>
@endsection


@section('script')
    <script>
        function addHostway(index, status) {     
            $.ajax({
                    url: '{{ route('hostaway') }}',
                    method: 'post',
                    data: "_token="+$("[name='_token']").val()+"&id="+index+"&status="+status,
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 200) {
                            alert(res.messages);
                        }
                    }
                });
        }

        // $(function() {
        //     $("#bedtype_form").submit(function(e) {
        //         e.preventDefault();
        //         $("#addamenity_btn").val('Please Wait ...');
        //         $.ajax({
        //             url: '{{ route('addPropertyTypes') }}',
        //             method: 'post',
        //             data: $(this).serialize(),
        //             dataType: 'json',
        //             success: function(res) {
        //                 if (res.status == 200) {
        //                     alert(res.messages);
        //                 }
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
