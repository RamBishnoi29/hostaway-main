@extends('layouts.app')
@section('title', 'Login')
@section('content')
<!-- Nested Row within Card Body -->
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
                <h1 class="h4 text-gray-900 mb-4">Welcome to Houzlet</h1>
            </div>
            <div id="login_alert"></div>
            <form action="#" method="POST" id="login_form">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user"
                        id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address...">
                        <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        id="password" name="password" placeholder="Password">
                        <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-user btn-block"
        id="login_btn">
                <hr>
                <a href="" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="/forgot">Forgot Password?</a>
            </div>
            <div class="text-center">
                Don't you have an account? <a class="small" href="/register">Create an Account!</a>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')
<script>
    $(function(){
        $("#login_form").submit(function(e){
            e.preventDefault();
            $("#login_btn").val('Please Wait ...');
            $.ajax({
                url:'{{route('auth.login')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                success:function(res){
                    if(res.status==400){
                        showError('email',res.messages.email);
                        showError('password',res.messages.password);
                        $("#login_btn").val('Login');
                    }else if(res.status==401){
                        $("#login_alert").html(showMessage('danger',res.messages));
                        $("#login_btn").val('Login');
                        $("#login_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                    else{
                        if(res.status==200 && res.messages=='success'){
                            window.location='{{route('dashboard')}}'
                        }
                    }
                }
            });
        });
    });
</script>
@endsection
