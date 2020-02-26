<?php 
$userTypeList=userTypeList();
?>
@extends('layout')

@section('content')
<h2>Register</h2>
 <form id="register_send_otp" method="post">
 @csrf
  <div class="form-group">
    <label for="phone">Phone number:</label>
    <input type="text" class="form-control" id="RSO_phone" name="phone">
  </div>
  <button type="button" class="btn btn-default btn-primary" id="RSO_btn">Send OTP</button>
  <button type="button" class="btn btn-default btn-primary" id="RSO_process">Sending OTP...</button>
  <a href="/">Go to Login page</a>
</form> 

<form id="register_enter_otp" method="post">
 @csrf
  <div class="form-group">
    <label for="phone">Enter OTP</label>
    <input type="text" class="form-control" id="REO_otp" name="otp">
  </div>
  <input type="hidden" name="phone" id="REO_phone" />
  <button type="button" class="btn btn-default btn-primary" id="REO_btn">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="REO_process">Submitting...</button>
  <button type="button" class="btn btn-default btn-primary" id="REO_resendOTP">Resend OTP</button>
  <button type="button" class="btn btn-default btn-primary" id="REO_resendOTP_process">Resending...</button>
  <a href="/">Go to Login page</a>
</form> 

 <form id="register_form" method="post">
 @csrf
  <div class="form-group">
    <label for="register_pwd">Password:</label>
    <input type="password" class="form-control" id="register_pwd" name="password">
  </div>
  <div class="form-group">
    <label for="register_pwd_c">Confirm password:</label>
    <input type="password" class="form-control" id="register_pwd_c" name="password_c">
  </div>
  <div class="form-group">
    <label for="register_fname">First name:</label>
    <input type="text" class="form-control" id="register_fname" name="fname">
  </div>
  <div class="form-group">
    <label for="register_lname">Surname:</label>
    <input type="text" class="form-control" id="register_lname" name="lname">
  </div>
  <div class="form-group">
    <label for="register_email">Email:</label>
    <input type="text" class="form-control" id="register_email" name="email">
  </div>
  <div class="form-group">
      <label for="account_type">Account type:</label>
      <select class="form-control" id="register_account_type" name="account_type">
	      <option value="">Select one</option>
          @foreach ($userTypeList as $utK=>$userType)
          <option value="{{$utK}}">{{$userType}}</option>
          @endforeach
      </select>
  </div> 
  <input type="hidden" name="phone" id="R_phone" />
  <button type="button" class="btn btn-default btn-primary" id="register_submit">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="register_submit_process">Submitting...</button>
  <a href="/register">Go to register page</button></a>
</form>

@endsection