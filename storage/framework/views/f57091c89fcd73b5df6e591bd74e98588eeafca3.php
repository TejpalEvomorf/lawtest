<?php 
$userTypeList=userTypeList();
?>

<?php $__env->startSection('loginSignUpLink', "/"); ?>
<?php $__env->startSection('loginSignUpLinkText', 'Login'); ?>
<?php $__env->startSection('content'); ?>
    <div id="signup-form" class="forms-container">
        <form class="form-horizontal row-border" id="register_send_otp" method="post">
         <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Enter your Mobile number</label>
                    <div class="col-sm-8 number-parent">
                        <span><img src="<?php echo e(asset('theme/img/flag.png')); ?>" width="32px">+91</span><input type="text" class="form-control login-numbers" id="RSO_phone" name="phone">
                    </div>
                </div>
                <div class="form-group forget"><a href="javascript:;">SMS with an OTP will be sent to your mobile number</a></div>
                
                <div class="stikyBtn" id=''><input class="text-uppercase" type="button" value="Send OTP" id="RSO_btn"></div>
                <div class="stikyBtn" id=''><input type="button" value="Sending OTP..." id="RSO_process"></div>
        </form>
        
        <form class="form-horizontal row-border" id="register_enter_otp" method="post">
         <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Enter the OTP sent to you at +91 <span class="phoneNoEntered"></span></label>
                    <div class="col-sm-8 number-parent">
                        <input type="text" class="form-control " id="REO_otp" name="otp">
                    </div>
                </div>
  				<input type="hidden" name="phone" id="REO_phone" />		
                
                <div class="stikyBtn" id=''><input type="button" value="Verify" id="REO_btn"></div>
                <div class="stikyBtn" id=''><input type="button" value="Verifying..." id="REO_process"></div>
                <div class="stikyBtn" id=''><input type="button" value="Resend OTP" data-toggle="modal" data-target="#REO_ROModal"></div>
        </form>
        
        <form class="form-horizontal row-border" id="register_form" method="post">
         <?php echo csrf_field(); ?>
                
          <div class="form-group">
            <label for="pwd">Firstname</label>
            <input type="text" class="form-control" id="register_fname" name="fname">
          </div>
          
          <div class="form-group">
            <label for="pwd">Surname</label>
            <input type="text" class="form-control" id="register_lname" name="lname">
          </div>
          
          <div class="form-group">
            <label for="pwd">Email</label>
            <input type="text" class="form-control" id="register_email" name="email">
          </div>
          
          <div class="form-group">
              <label for="account_type">Role</label>
              <select class="form-control" id="register_account_type" name="account_type">
                  <option value="">Select one</option>
                  <?php $__currentLoopData = $userTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utK=>$userType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($utK); ?>"><?php echo e($userType); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          
          <div class="form-group">
            <label for="pwd">Set up a password</label>
            <input type="password" class="form-control" id="register_pwd" name="password">
          </div> 
                        
          <input type="hidden" name="phone" id="R_phone" />
          
          <div class="stikyBtn" id=''><input type="button" value="Done" id="register_submit"></div>
          <div class="stikyBtn" id=''><input type="button" value="Submitting..." id="register_submit_process"></div>
        </form>
    </div>

 
 
 <!-- Modal -->
				<div class="modal fade" id="REO_ROModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!--<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Modal title</h2>
							</div>-->
							<div class="modal-body">
                            <form id="form_fpro">
							 <?php echo csrf_field(); ?>
                                <div class="form-group" id="form_fp_phoneNo">
                                    <label class="col-sm-2 control-label">Resend OTP to +91 <span class="phoneNoEntered"></span>?</label>
                                </div>
                              </form>
							</div>
                            
							<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-raised btn-primary" id="REO_resendOTP">Ok</button>
                                <button type="button" class="btn btn-raised btn-primary" id="REO_resendOTP_process">Sending OTP...</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
<!--Modal ENDS-->
 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\masterLawyer\resources\views/register.blade.php ENDPATH**/ ?>