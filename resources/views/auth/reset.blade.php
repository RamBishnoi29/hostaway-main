@extends('layouts.app')
@section('title', 'Reset Password')
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
                <h1 class="h4 text-gray-900 mb-2">Reset Password?</h1>
            </div>
    <div id="reset_alert"></div>
<form action="#" method="POST" id="reset_form">
    @csrf 
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="token" value="{{$token}}">
    <div class="mb-3">
        <input type="email" name="email" id="email" class="form-control form-control-user"
         placeholder="E-mail" value="{{$email}}" disabled >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3">
        <input type="password" name="password" id="password" class="form-control form-control-user"
         placeholder="New Password" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3">
        <input type="password" name="cpassword" id="cpassword" class="form-control form-control-user"
         placeholder="Confirm New Password" >
        <div class="invalid-feedback"></div>
    </div>

    <div class="mb-3 d-grid">
        <input type="submit" value="Update Password" class="btn btn-primary btn-user btn-block"
        id="reset_btn">
    </div>
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
        $("#reset_form").submit(function(e){
            e.preventDefault();
            $("#reset_btn").val('Please Wait ...');
            $.ajax({
                url:'{{route('auth.reset')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                success:function(res){
                    console.log(res);
                    if(res.status==400){
                        showError('password',res.messages.password);
                        showError('cpassword',res.messages.cpassword);
                        $("#reset_btn").val('Update Password');
                    }else if(res.status==401){
                        $("#reset_alert").html(showMessage('danger',res.messages));
                        removeValidationClasses("#reset_form");
                        $("#reset_btn").val('Update Password');
                        $("#reset_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                    else{
                        $("#reset_form")[0].reset();
                        $("#reset_btn").val('Update Password');
                        $("#reset_alert").html(showMessage('success',res.messages));
                        $("#reset_alert").css("display", "block").delay(2000).fadeOut(400);
                    }
                }
            });
        });
    });
</script>
@endsection
