@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block">
        <div class="p-5">
            <div class="text-center">
                <img src="{{asset('admin/images/icon.png')}}" height="280" />
                <h1 class="h4 text-gray-900 mb-4" style="margin-top: 25px">Unlock The Full Potential of Your Rental Properties</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register in Houzlet</h1>
            </div>
    <div id="show_success_alert"></div>
<form action="#" method="POST" id="register_form">
    @csrf
    <div class="mb-3">
        <input type="text" name="name" id="name" class="form-control form-control-user"
         placeholder="Full Name" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3">
        <input type="email" name="email" id="email" class="form-control form-control-user"
         placeholder="E-mail" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3">
        <input type="password" name="password" id="password" class="form-control form-control-user"
         placeholder="Password" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3">
        <input type="password" name="cpassword" id="cpassword" class="form-control form-control-user"
         placeholder="Confirm Password" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3 d-grid">
        <input type="submit" value="Register" class="btn btn-primary btn-user btn-block"
        id="register_btn">
    </div>

    <hr>
                <a href="" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a>

                <hr>
                <div class="text-center">
                    Already have an account? <a class="small" href="/login">Login Here!</a>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section('script')
<script>
    $(function(){
        $("#register_form").submit(function(e){
            e.preventDefault();
            $("#register_btn").val('Please Wait ...');
            $.ajax({
                url:'{{route('auth.register')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                success:function(res){
                    if(res.status==400){
                        showError('name',res.messages.name);
                        showError('email',res.messages.email);
                        showError('password',res.messages.password);
                        showError('cpassword',res.messages.cpassword);
                        $("#register_btn").val('Register');
                    }else if(res.status==200){
                        $("#show_success_alert").html(showMessage('success',res.messages));
                        $("#register_form")[0].reset();
                        removeValidationClasses("#register_form");
                        $("#register_btn").val('Register');
                        $("#show_success_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                }
            });
        });
    });
</script>
@endsection
