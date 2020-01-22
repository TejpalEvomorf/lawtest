<?php $__env->startSection('content'); ?>
<h2>Login</h2>
 <form id="login_form" method="post">
 <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="email">Phone number:</label>
    <input type="text" class="form-control" id="LF_phone" name="phone">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="LF_password" name="password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="button" class="btn btn-default btn-primary" id="LF_submit">Submit</button>
  <button type="button" class="btn btn-default btn-primary" id="LF_process">Submitting...</button>
  <a href="/register">Go to register page</button></a>
</form> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\masterLawyer\resources\views/login.blade.php ENDPATH**/ ?>