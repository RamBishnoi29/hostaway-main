@extends('layouts.appdashboard')
@section('title', 'Add BedType')
@extends('layouts.menu')
@extends('layouts.header')
@extends('layouts.model')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add BedType Hostaway</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bed Type</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addbedrooms_alert"></div>
                                <form action="#" method="POST" id="bedtype_form">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <div id="more_extra_services_main" class="custom-extra-prices">
                                                <div class="more_extra_services_wrap" id="row1"
                                                    style="margin-top: 10px">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">BedType Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="Ex. Full Bunk Bed">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-2 mb-sm-0">
                            </div>
                            <div class="col-sm-8 mb-4 mb-sm-0"></div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success btn-user btn-block" value="Add"
                                    id="addamenity_btn">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column ascending"
                                                        style="width: 57px;">Name</th>
                                                    <th class="sorting sorting_desc" tabindex="0"
                                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        aria-sort="descending" style="width: 61px;">Hostaway</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 49px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 31px;">Created</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 60px;">Updated</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 100px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bedTypedata as $item)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $item['name'] }}</td>
                                                        <td>{{ $item['hostaway'] == 1 ? 'Yes' : 'No' }}</td>
                                                        <td>{{ $item['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                                        <td>{{ $item['created_at'] }}</td>
                                                        <td>{{ $item['updated_at'] }}</td>
                                                        <td>
                                                            <div style="align-items: center; justify-content: center;">
                                                                <a href="/updatelisting/{{ $item['id'] }}"
                                                                    class="btn btn-primary btn-sm"
                                                                    style="margin-top: 5px;">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-warning btn-sm"
                                                                    style="margin-top: 5px">
                                                                    <i class="fas fa-trash"></i>
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
        </div>
        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->

@endsection
@section('script')
    <script>
        $(function() {
            $("#bedtype_form").submit(function(e) {
                e.preventDefault();
                $("#addamenity_btn").val('Please Wait ...');
                $.ajax({
                    url: '{{ route('addbedtype') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {                    
                        if (res.status == 200) {
                            $("#addbedrooms_alert").html(showMessage('success', res.messages));
                            $("#bedtype_form")[0].reset();
                            removeValidationClasses("#bedtype_form");
                            $("#addamenity_btn").val('Add');
                            $("#addbedrooms_alert").css("display", "block").delay(2000).fadeOut(400);
                             window.location = '/addbedtype'
                           // { $bedTypedata.push(rea.data) }
                        //    var jobs = @json($bedTypedata);
                        //    jobs.push(res.data);
                        //    $bedTypedata=jobs;
                        //    console.log($bedTypedata);                           
                        }
                    }
                });
            });
        });
    </script>
@endsection
