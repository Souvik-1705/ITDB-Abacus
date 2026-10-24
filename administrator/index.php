<?php
session_start();
include('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

<meta name="author" content="PIXINVENT">
<title><?=$title?></title>
<link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
<link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
<link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
<link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
<!-- <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
<link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->

<script>

function togglePassword() {

    const password = document.getElementById("password");
    const icon = document.getElementById("passwordIcon");

    if (password.type === "password") {

        password.type = "text";

        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");

    } else {

        password.type = "password";

        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");

    }

}

</script>

<style>
/* Login Card */
.login-card
{
    background:linear-gradient(145deg,#fff7fb,#f3f9ff) !important;
    border-radius:22px !important;
    overflow:hidden;
    border:none !important;
    box-shadow:0 15px 40px rgba(70,80,120,0.20) !important;
}

/* Card Header */
.login-card .card-header
{
    background:linear-gradient(135deg,#ff7eb3,#ff758c,#ffb86c) !important;
    border:none !important;
    padding:20px 10px !important;
}

/* Logo */
.login-card .card-title img
{
    background:#ffffff;
    padding:10px;
    border-radius:18px;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
}

/* Form Area */
.login-card .card-body
{
    background:linear-gradient(145deg,#fff8fb,#f4fbff) !important;
}

.login-card .card-block
{
    padding:25px !important;
}

/* Input */
.login-card input.form-control
{
    height:52px !important;
    border:2px solid #ffd1df !important;
    border-radius:14px !important;
    background:#ffffff !important;
    color:#444 !important;
    font-size:16px !important;
    padding-left:50px !important;
    box-shadow:0 4px 12px rgba(255,120,160,0.08);
    transition:all 0.3s ease;
}

/* Input Focus */
.login-card input.form-control:focus
{
    border-color:#ff7eb3 !important;
    background:#fff !important;
    box-shadow:0 0 0 4px rgba(255,126,179,0.15) !important;
}

/* Placeholder */
.login-card input.form-control::placeholder
{
    color:#aaa;
}

/* Icon */
.login-card .form-control-position
{
    width:48px !important;
    height:52px !important;
    line-height:52px !important;
    text-align:center;
}

.login-card .form-control-position i
{
    color:#ff6f9f !important;
    font-size:20px;
}

/* Login Button */
.login-card button.btn-primary
{
    margin-top:10px;
    height:52px;
    border:none !important;
    border-radius:14px !important;
    background:linear-gradient(135deg,#ff6fa5,#ff8a65) !important;
    box-shadow:0 8px 18px rgba(255,111,165,0.28);
    font-size:17px;
    font-weight:600;
    transition:all 0.3s ease;
}

/* Button Hover */
.login-card button.btn-primary:hover
{
    transform:translateY(-2px);
    box-shadow:0 12px 22px rgba(255,111,165,0.35);
}

/* Renewal Text */
.login-card p
{
    border-radius:8px;
}

/* Error Message */
.login-card p[style*="FF0000"]
{
    color:#e53935 !important;
    background:#fff0f0 !important;
    border-radius:8px;
    margin:10px 20px !important;
    padding:5px;
}
/* ================= PASSWORD FIELD ================= */

.password-wrapper {
    position: relative;
    width: 100%;
    height: 52px;
}


/* Password Input */

.password-wrapper input.form-control {
    width: 100% !important;
    height: 52px !important;

    padding-left: 50px !important;
    padding-right: 55px !important;

    box-sizing: border-box !important;
}


/* Password Left Icon */

.password-wrapper .form-control-position {
    position: absolute !important;

    left: 0 !important;
    top: 0 !important;

    width: 48px !important;
    height: 52px !important;

    line-height: 52px !important;

    z-index: 2;
}


/* Eye Button */

.password-toggle {
    position: absolute !important;

    right: 8px !important;
    top: 50% !important;

    transform: translateY(-50%) !important;

    width: 38px !important;
    height: 38px !important;

    margin: 0 !important;
    padding: 0 !important;

    border: none !important;
    background: transparent !important;

    color: #8d8d8d !important;

    font-size: 17px !important;

    cursor: pointer;

    display: flex !important;
    align-items: center !important;
    justify-content: center !important;

    line-height: 1 !important;

    z-index: 10 !important;
}

.password-toggle:hover {
    color: #ff6f9f !important;
}

.password-toggle:focus {
    outline: none !important;
    box-shadow: none !important;
}


/* Prevent Fieldset Size Change */

.password-wrapper + * {
    box-sizing: border-box;
}
</style>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid" style="background:url(images/stbanner.jpg); background-repeat:no-repeat; background-size:cover; background-position:center">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body" >
<section class="flexbox-container">
<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0"style="border-radius:20px; overflow:hidden;">
<div class="card login-card m-0" style="border-radius:20px; overflow:hidden;">
<div class="card-header no-border">
<div class="card-title text-xs-center">
<div class="p-1"><img src="images/logo.png" alt="branding logo" width="140px;"></div>
</div>
</div>

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#FF0000;background:#FFFFFF;height:20px;line-height:30px;">Invalid Username or Password!</p><?php }?>

<?php 
$stdate=getRenewalDate($conn);
$today=date('Y-m-d');
$nodays=(strtotime($stdate)-strtotime($today));
$day=round($nodays/86400);
if($stdate !='')
{
?>
<p align="center" style="margin:4px; font-size:18px; font-weight:600;"><?php if($day<=0){?><span style="color:#FF0000;margin-top:5px;" >Expired!! Please renewal soon !!</span><?php }else{?><span style="color:#0000FF;margin-top:5px;" ><?=$day?> Days remaining for renewal !!</span><?php }?></p>
<?php }?>

<div class="card-body collapse in">
<div class="card-block">
<form class="form-horizontal form-simple" action="login-process.php" method="post">



<div>&nbsp;</div>
<fieldset class="form-group position-relative has-icon-left mb-0">
<input type="text" class="form-control form-control-lg input-lg" id="uname" name="uname" placeholder="Username" required autocomplete="off">
<div class="form-control-position">
<i class="icon-head"></i>
</div>
</fieldset>
<div>&nbsp;</div>
<fieldset class="form-group position-relative has-icon-left">

<div class="password-wrapper">

<input type="password"
class="form-control form-control-lg input-lg"
id="password"
name="password"
placeholder="Password"
required
autocomplete="off">

<div class="form-control-position">
<i class="icon-key3"></i>
</div>

<button type="button"
class="password-toggle"
onclick="togglePassword()">

<i class="fa-solid fa-eye" id="passwordIcon"></i>

</button>

</div>

</fieldset>

<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
</form>
</div>
</div>

</div>
</div>
</section>

</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
