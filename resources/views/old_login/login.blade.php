@extends('layout')

@section('content')
<h2>Login</h2>
 <form id="login_form" method="post">
 @csrf
  <div class="form-group">
    <label for="email">Phone number:</label>
    <input type="text" class="form-control" id="LF_phone" name="phone">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="LF_password" name="password">
  </div>
  <!--<div class="checkbox">
    <label><input type="checkbox" name="remember" value="1"> Remember me</label>
  </div>-->
  <button type="button" class="btn btn-default btn-primary" id="LF_submit">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="LF_process">Submitting...</button>
  <a href="javascript:;" data-toggle="modal" data-target="#forgotPasswordModal">Forot password?</button></a><span> | </span>
  <a href="/register">Go to register page</button></a>
</form> 

<form id="form_fp_enter_otp" method="post">
 @csrf
  <div class="form-group">
    <label for="phone">Enter the OTP sent on your <span id="FPEO_otp_phoneText">mobile phone</span><span id="FPEO_otp_emailText" style="display:none;">email id</span></label>
    <input type="text" class="form-control" id="FPEO_otp" name="otp">
  </div>
  <input type="hidden" name="user" id="FPEO_user" />
  <button type="button" class="btn btn-default btn-primary" id="FPEO_btn">Verify</button>
  <button type="button" class="btn btn-default btn-primary" id="FPEO_process">Verifying...</button>
  <button type="button" class="btn btn-default btn-primary" id="FPEO_resendOTP">Resend OTP</button>
</form> 

<form id="form_fp_resetPass" method="post">
 @csrf
  <div class="form-group">
    <label for="register_pwd">Password:</label>
    <input type="password" class="form-control" id="FPRPpwd" name="password">
  </div>
  <div class="form-group">
    <label for="register_pwd_c">Confirm password:</label>
    <input type="password" class="form-control" id="FPRPpwd_c" name="password_c">
  </div>
  <input type="hidden" name="user" id="FPRP_user" />
  <button type="button" class="btn btn-default btn-primary" id="FPRP_btn">Reset</button>
  <button type="button" class="btn btn-default btn-primary" id="FPRP_process">Reseting...</button>
</form>


<!-- Modal -->
				<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!--<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Modal title</h2>
							</div>-->
							<div class="modal-body">
                            <form id="form_fp">
							 @csrf
                                <div class="form-group" id="form_fp_phoneNo">
                                    <label for="email">Enter your mobile number</label>
                                    <input type="text" class="form-control" id="form_fp_phone" name="phone">
                                </div>
                                <div class="form-group" id="form_fp_emailId">
                                    <label for="email">Enter your Email id</label>
                                    <input type="text" class="form-control" id="form_fp_email" name="email">
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="form_fp_option" id="form_fp_optionPhone" value="1" checked>
                                  <label class="form-check-label" for="form_fp_optionPhone">
                                    Reset using mobile number
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="form_fp_option" id="form_fp_optionEmail" value="2">
                                  <label class="form-check-label" for="form_fp_optionEmail">
                                    Reset using email id
                                  </label>
                                </div>
                              </form>
							</div>
                            
							<div class="modal-footer">
								<button type="button" class="btn btn-raised btn-primary" id="form_fp_submit">Next</button>
                                <button type="button" class="btn btn-raised btn-primary" id="form_fp_process">Sending OTP...</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
<!--Modal ENDS-->

@endsection