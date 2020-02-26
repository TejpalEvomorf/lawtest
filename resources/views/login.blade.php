@extends('layout')
@section('loginSignUpLink', '/register')
@section('loginSignUpLinkText', 'Sign up')
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
                    <label class="col-sm-2 control-label">Enter the OTP sent on your <span id="FPEO_otp_phoneText">mobile phone</span><span id="FPEO_otp_emailText" style="display:none;">email id</span></label>
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
                                    <label class="col-sm-2 control-label">Enter your Mobile number</label>
                                    <div class="col-sm-8 number-parent">
                                        <span><img src="{{asset('theme/img/flag.png')}}" width="32px">+91</span><input type="text" class="form-control login-numbers" id="form_fp_phone" name="phone">
                                    </div>
                                </div>
                                <div class="form-group" id="form_fp_emailId">
                                    <label class="col-sm-2 control-label">Enter your Email id</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="form_fp_email" name="email">
                                    </div>
                                </div>
                                
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="form_fp_option" id="form_fp_optionPhone" value="1" checked>
                                  <label class="form-check-label" for="form_fp_optionPhone">
                                    Reset using Mobile number
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="form_fp_option" id="form_fp_optionEmail" value="2">
                                  <label class="form-check-label" for="form_fp_optionEmail">
                                    Reset using Email Id
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
 
 
 
 <!-- Modal -->
				<div class="modal fade" id="forgotPasswordROModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!--<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Modal title</h2>
							</div>-->
							<div class="modal-body">
                            <form id="form_fpro">
							 @csrf
                                <div class="form-group" id="form_fp_phoneNo">
                                    <label class="col-sm-2 control-label">Resend OTP to <span id="form_fpro_phoneNoPrefix">+91 </span><span id="form_fpro_phoneNoEmailEntered"></span>?</label>
                                </div>
                              </form>
							</div>
                            
							<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-raised btn-primary" id="form_fpro_submit">Ok</button>
                                <button type="button" class="btn btn-raised btn-primary" id="form_fpro_process">Sending OTP...</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
<!--Modal ENDS-->
    
    
@endsection