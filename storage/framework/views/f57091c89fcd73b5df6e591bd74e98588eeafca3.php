<?php $__env->startSection('content'); ?>
<h2>Register</h2>
 <form id="register_send_otp" method="post">
 <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="phone">Phone number:</label>
    <input type="text" class="form-control" id="RSO_phone" name="phone">
  </div>
  <button type="button" class="btn btn-default btn-primary" id="RSO_btn">Send OTP</button>
  <button type="button" class="btn btn-default btn-primary" id="RSO_process">Sending OTP...</button>
  <a href="/">Go to Login page</a>
</form> 

<form id="register_enter_otp" method="post">
 <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="phone">Enter OTP</label>
    <input type="text" class="form-control" id="REO_otp" name="otp">
  </div>
  <input type="hidden" name="phone" id="REO_phone" />
  <button type="button" class="btn btn-default btn-primary" id="REO_btn">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="REO_process">Submitting...</button>
  <a href="/">Go to Login page</a>
</form> 

 <form id="register_form" method="post">
 <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="email">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <div class="form-group">
    <label for="pwd">Confirm password:</label>
    <input type="password" class="form-control" id="pwd_c" name="password_c">
  </div>
  <div class="form-group">
    <label for="pwd">First name:</label>
    <input type="text" class="form-control" id="fname" name="fname">
  </div>
  <div class="form-group">
    <label for="pwd">Surname:</label>
    <input type="text" class="form-control" id="lname" name="lname">
  </div>
  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
      <label for="sel1">Account type:</label>
      <select class="form-control" id="account_type" name="account_type">
          <option value="2">Lawyer</option>
          <option value="3">Clerk</option>
          <option value="4">Client</option>
      </select>
  </div> 
  <input type="hidden" name="phone" id="R_phone" />
  <button type="button" class="btn btn-default btn-primary" id="register_submit">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="register_submit_process">Submitting...</button>
  <a href="/register">Go to register page</button></a>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\masterLawyer\resources\views/register.blade.php ENDPATH**/ ?>