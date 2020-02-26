<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>    
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500' rel='stylesheet'>
    <link type='text/css'  href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet"> 
    <link href="{{asset('theme/assets/css/forms.css')}}" type="text/css" rel="stylesheet">                                    
	<link href="{{asset('theme/assets/plugins/dropdown.js/jquery.dropdown.css')}}" type="text/css" rel="stylesheet">           
	<link href="{{asset('theme/assets/plugins/form-select2/select2.css')}}" type="text/css" rel="stylesheet">                       
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('theme/style.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/materialicon.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
</head>

    <body class="animated-content infobar-overlay">
    
<div id="top-bar" class="header-top"> @section('header')
  
<img src="{{asset('theme/img/logo.png')}}" width="250px" />
<div class="header-top-right">
<i _ngcontent-xvg-c19="" class="material-icons icon-image-preview" style="font-size: 40px;">menu</i>
<a href="@yield('loginSignUpLink')">@yield('loginSignUpLinkText')</a>
</div>  @show() </div>


<div class="container">
	@section('content')
	<h1>Content part</h1>
    @show()
</div>
<!--<div class="footer">
	@section('footer')
	<h1>Footer part</h1>
    @show()
</div>-->

    <!-- Load site level scripts -->

<script src="{{asset('theme/assets/js/jquery-1.10.2.min.js')}}"></script> 							<!-- Load jQuery -->
<script src="{{asset('theme/assets/js/jqueryui-1.10.3.min.js')}}"></script> 							<!-- Load jQueryUI -->
<script src="{{asset('theme/assets/js/bootstrap.min.js')}}"></script> 								<!-- Load Bootstrap -->
<script src="{{asset('theme/assets/plugins/form-select2/select2.min.js')}}"></script>                     			<!-- Advanced Select Boxes -->
<script src="{{asset('theme/assets/plugins/dropdown.js/jquery.dropdown.js')}}"></script> <!-- Fancy Dropdowns -->
<script src="{{asset('theme/assets/plugins/bootstrap-material-design/js/material.min.js')}}"></script> <!-- Bootstrap Material -->
<script src="{{asset('theme/assets/plugins/bootstrap-material-design/js/ripples.min.js')}}"></script> <!-- Bootstrap Material -->

<script src="assets/js/forms.js"></script>


<script src="{{asset('js/site-ready.js')}}"></script>
<script src="{{asset('js/site-functions.js')}}"></script>
</body>
</html>