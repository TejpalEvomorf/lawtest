@extends('layout')

@section('content')
<div id="signup-form" class="forms-container">
        <form class="form-horizontal row-border" id="login_form" method="post">
         @csrf
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile number</label>
                    <div class="col-sm-8 number-parent">
                        <span><img src="{{asset('theme/img/flag.png')}}" width="32px">+91</span><input type="text" class="form-control login-numbers" id="LF_phone" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="LF_password" name="password">
                    </div>
                </div>
                <div class="form-group forget"><a href="javascript:;" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a></div>		
                
                <div class="stikyBtn" id=''><input type="button" value="LOGIN" id="LF_submit"></div>
                <div class="stikyBtn" id=''><input type="button" value="Submitting..." id="LF_process"></div>
        </form>
        
        <form class="form-horizontal row-border" id="form_fp_enter_otp" method="post">
         @csrf
                <div class="form-group">
                    <label class="col-sm-2 control-label">Enter the OTP sent on your mobile number/email id</label>
                    <div class="col-sm-8 number-parent">
                        <input type="text" class="form-control " id="FPEO_otp" name="otp">
                    </div>
                </div>
  				<input type="hidden" name="user" id="FPEO_user" />		
                
                <div class="stikyBtn" id=''><input type="button" value="Verify" id="FPEO_btn"></div>
                <div class="stikyBtn" id=''><input type="button" value="Verifying..." id="FPEO_process"></div>
                <div class="stikyBtn" id=''><input type="button" value="Resend OTP" id="FPEO_resendOTP" data-toggle="modal" data-target="#forgotPasswordROModal"></div>
        </form>
        
        <form class="form-horizontal row-border" id="form_fp_resetPass" method="post">
         @csrf
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Enter new password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="FPRPpwd" name="password">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm new password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="FPRPpwd_c" name="password_c">
                    </div>
                </div>
  				<input type="hidden" name="user" id="FPRP_user" />
                
                <div class="stikyBtn" id=''><input type="button" value="Reset" id="FPRP_btn"></div>
                <div class="stikyBtn" id=''><input type="button" value="Reseting..." id="FPRP_process"></div>
        </form>
    </div>

@endsection