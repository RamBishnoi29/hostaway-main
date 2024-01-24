@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block">
        <div class="p-5">
            <div class="text-center">
                <img src="{{asset('admin/images/icon.png')}}" height="240" />
                <h1 class="h4 text-gray-900 mb-4" style="margin-top: 22px">Unlock The Full Potential of Your Rental Properties</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                    and we'll send you a link to reset your password!</p>
            </div>
            <div id="fogot_alert"></div>
<form action="#" method="POST" id="forgot_form">
    @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user"
                        id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address...">
                        <div class="invalid-feedback"></div>
                </div>
                <input type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block"
                id="forgot_btn">
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="/register">Create an Account!</a>
            </div>
            <div class="text-center">
                <a class="small" href="/login">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $("#forgot_form").submit(function(e){
            e.preventDefault();
            $("#forgot_btn").val('Please Wait ...');
            $.ajax({
                url:'{{route('auth.forgot')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                success:function(res){
                    console.log(res);
                    if(res.status==400){
                        showError('email',res.messages.email);
                        $("#forgot_btn").val('Reset Password');
                    }else if(res.status==200){
                        $("#fogot_alert").html(showMessage('success',res.messages));
                        $("#forgot_form")[0].reset();
                        removeValidationClasses("#forgot_form");
                        $("#forgot_btn").val('Reset Password');
                        $("#forgot_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                    else{
                        $("#forgot_btn").val('Reset Password');
                        $("#fogot_alert").html(showMessage('success',res.messages));
                        $("#forgot_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                }
            });
        });
    });
</script>
@endsection
