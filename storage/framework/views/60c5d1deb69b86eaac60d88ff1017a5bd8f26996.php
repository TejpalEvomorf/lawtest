<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--<script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
<link href="<?php echo e(asset('css/app.css')); ?>" type="text/css" rel="stylesheet">-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="<?php echo e(asset('css/custom.css')); ?>" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/site-ready.js')); ?>"></script>

</head>

<body>
<div class="header"> <?php $__env->startSection('header'); ?>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
  </div>
</nav> 
  <?php echo $__env->yieldSection(); ?> </div>
<div class="content">
	<?php $__env->startSection('content'); ?>
	<h1>Content part</h1>
    <?php echo $__env->yieldSection(); ?>
</div>
<!--<div class="footer">
	<?php $__env->startSection('footer'); ?>
	<h1>Footer part</h1>
    <?php echo $__env->yieldSection(); ?>
</div>-->

</body>
</html><?php /**PATH C:\xampp\htdocs\masterLawyer\resources\views/layout.blade.php ENDPATH**/ ?>