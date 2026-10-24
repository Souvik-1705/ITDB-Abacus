<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('../index.php');
}
checkFranchiseStatus($conn);

$pageid=19;
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?=$title?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="font-flaticon/flaticon.css">
<link rel="stylesheet" href="css/dripicons.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">
<script type="text/javascript" src="js/ajax.js"></script>

<script type="text/javascript">
function getDistrict(id)
{
xmlhttp.open('GET','get-state.php?sid='+id);
xmlhttp.onreadystatechange=getStateRequest;
xmlhttp.send();
}
function getStateRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('distEdit').innerHTML=response;
}
}
}
</script>

<script>
var myVar=setInterval(function(){myTimer()},1000);
function myTimer()
{
var d=new Date();
var t=d.toLocaleTimeString();
document.getElementById("timeTable").innerHTML=t;
}
function myStopFunction()
{
clearInterval(myVar);
}
</script>
<script>
function getCourseList()
{
var category=document.getElementById('coursecat').value;
var duration=document.getElementById('duration').value;

xmlhttp.open('GET','get-course-list2.php?cat='+category+'&duration='+duration);
xmlhttp.onreadystatechange=getSendRequestCourse;
xmlhttp.send();
}

function getSendRequestCourse()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('divCourse').innerHTML=response;
}
}
}
</script>

<style>
#dashright{
font-family:"Times New Roman", Times, serif;
}

/* =========================================
DASHBOARD DECORATIVE SHAPES
========================================= */

.dashboard-shape {
position: absolute;
pointer-events: none;
z-index: 1;
animation: dashboardFloatZoom 4s ease-in-out infinite;
}

/* Floating + Zoom In/Out */

@keyframes dashboardFloatZoom {

0%, 100% {
transform: translateY(0) rotate(0deg) scale(0.75);
opacity: 0.60;
}

50% {
transform: translateY(-18px) rotate(10deg) scale(1.25);
opacity: 1;
}

}

/* =========================================
SHAPE POSITIONS
========================================= */

.dashboard-shape-one {
top: 5%;
left: 3%;
font-size: 42px;
color: #ffb703;
}

.dashboard-shape-two {
top: 8%;
right: 4%;
font-size: 50px;
color: #ff6b9a;
animation-delay: .5s;
}

.dashboard-shape-three {
top: 18%;
left: 7%;
font-size: 22px;
color: #4cc9f0;
animation-delay: 1s;
}

.dashboard-shape-four {
top: 20%;
right: 8%;
font-size: 35px;
color: #ff7b54;
animation-delay: 1.5s;
}

.dashboard-shape-five {
top: 30%;
left: 2%;
font-size: 30px;
color: #ff6b6b;
animation-delay: .8s;
}

.dashboard-shape-six {
top: 32%;
right: 3%;
font-size: 45px;
color: #ffb703;
animation-delay: 1.2s;
}

.dashboard-shape-seven {
top: 42%;
left: 6%;
font-size: 25px;
color: #ff6b9a;
animation-delay: 1.8s;
}

.dashboard-shape-eight {
top: 45%;
right: 7%;
font-size: 20px;
color: #4cc9f0;
animation-delay: 2s;
}

.dashboard-shape-nine {
top: 55%;
left: 2%;
font-size: 40px;
color: #ffb703;
animation-delay: .4s;
}

.dashboard-shape-ten {
top: 58%;
right: 4%;
font-size: 28px;
color: #ff7b54;
animation-delay: 1.6s;
}

.dashboard-shape-eleven {
top: 68%;
left: 7%;
font-size: 18px;
color: #4cc9f0;
animation-delay: 2.2s;
}

.dashboard-shape-twelve {
top: 70%;
right: 8%;
font-size: 38px;
color: #ff6b9a;
animation-delay: 1.1s;
}

.dashboard-shape-thirteen {
top: 80%;
left: 3%;
font-size: 32px;
color: #ffb703;
animation-delay: 1.3s;
}

.dashboard-shape-fourteen {
top: 82%;
right: 3%;
font-size: 22px;
color: #ff6b6b;
animation-delay: 2s;
}

.dashboard-shape-fifteen {
top: 92%;
left: 10%;
font-size: 25px;
color: #ff7b54;
animation-delay: 2.4s;
}

.dashboard-shape-sixteen {
top: 90%;
right: 12%;
font-size: 35px;
color: #ffb703;
animation-delay: .9s;
}

.dashboard-shape-seventeen {
top: 12%;
left: 20%;
font-size: 17px;
color: #4cc9f0;
animation-delay: 1.7s;
}

.dashboard-shape-eighteen {
top: 15%;
right: 20%;
font-size: 25px;
color: #ff6b9a;
animation-delay: 2.5s;
}

.dashboard-shape-nineteen {
top: 50%;
left: 15%;
font-size: 18px;
color: #ffb703;
animation-delay: .7s;
}

.dashboard-shape-twenty {
top: 52%;
right: 15%;
font-size: 25px;
color: #4cc9f0;
animation-delay: 1.4s;
}

/* Mobile hide */

@media(max-width:767px){

.dashboard-shape {
display:none;
}

}

/* =========================================
MODERN CHANGE PASSWORD FORM
========================================= */

#innerDiv
{
background:#ffffff !important;
border-radius:18px !important;
padding:15px 20px 30px 20px !important;
box-shadow:0 5px 25px rgba(0,0,0,0.06);
}

/* Success Message */
#success
{
display:inline-block;
padding:10px 18px;
margin:5px 0 15px 0;
background:#fff1f5;
border:1px solid #ffc4d5;
border-radius:8px;
color:#e85d04 !important;
font-size:14px;
font-weight:bold;
}

/* Error Messages */
#wrong
{
display:inline-block;
padding:10px 18px;
margin:5px 0 15px 0;
background:#fff2ed;
border:1px solid #ffbea8;
border-radius:8px;
color:#e85d04 !important;
font-size:14px;
font-weight:bold;
}

/* Password Table */
#innerDiv form table
{
width:65% !important;
max-width:650px;
}

#innerDiv form table tr td
{
padding:10px 8px;
font-size:15px;
color:#444444;
vertical-align:middle;
}

/* Required Star */
#innerDiv form table tr td span
{
color:#ff4f81 !important;
font-weight:bold;
}

/* Password Inputs */
#innerDiv form input[type="password"]
{
width:100% !important;
max-width:320px !important;
height:43px !important;
padding:8px 13px !important;
background:#fffaf9 !important;
border:1px solid #ffd2c2 !important;
border-radius:9px !important;
color:#444444;
font-size:14px !important;
box-sizing:border-box;
outline:none;
transition:all .25s ease;
}

#innerDiv form input[type="password"]::placeholder
{
color:#aaa;
}

#innerDiv form input[type="password"]:focus
{
border-color:#ff8a65 !important;
background:#ffffff !important;
box-shadow:0 0 0 3px rgba(255,138,101,0.12);
outline:none;
}

/* Submit Button */
#innerDiv form input[type="submit"]
{
width:160px !important;
height:44px !important;
margin-top:5px !important;
border:none !important;
border-radius:25px !important;
background:linear-gradient(135deg,#ff5f9e,#ff7b54,#ff9a44) !important;
color:#ffffff !important;
font-size:14px !important;
font-weight:bold !important;
letter-spacing:.5px;
cursor:pointer;
box-shadow:0 6px 16px rgba(255,105,120,0.25);
transition:all .25s ease;
}

#innerDiv form input[type="submit"]:hover
{
transform:translateY(-2px);
box-shadow:0 9px 22px rgba(255,105,120,0.35);
background:linear-gradient(135deg,#ff478c,#ff7043,#ff8c28) !important;
}

/* Mobile */
@media(max-width:767px)
{
#innerDiv
{
padding:10px 10px 25px 10px !important;
}

#innerDiv form table
{
width:100% !important;
}

#innerDiv form table tr td
{
display:block;
width:100% !important;
padding:6px 10px;
box-sizing:border-box;
}

#innerDiv form input[type="password"]
{
max-width:100% !important;
}

#innerDiv form input[type="submit"]
{
width:100% !important;
}
}

/* =========================================
   MODERN STUDENT EDIT FORM
========================================= */
/* =========================================
   FINAL BLUE THEME
========================================= */

#dashright
{
    background-image:radial-gradient(circle,#ffffff,#f5f9ff,#eaf4ff,#e4f1ff) !important;
}


/* Main Form */
#innerDiv
{
    background:linear-gradient(135deg,#ffffff,#f5f9ff,#eaf4ff) !important;
    border:1px solid #d5e7f8 !important;
    box-shadow:0 5px 25px rgba(30,80,130,0.08) !important;
}


/* Success / Error */
#success
{
    background:#f5f9ff !important;
    border:1px solid #c9def2 !important;
    color:#17608f !important;
}

#wrong
{
    background:#f5f9ff !important;
    border:1px solid #c9def2 !important;
    color:#d9534f !important;
}


/* Table */
#innerDiv form table
{
    width:65% !important;
    max-width:650px;
}

#innerDiv form table tr.class3
{
    background:#f5f9ff !important;
}

#innerDiv form table tr.class4
{
    background:#eaf4ff !important;
}

#innerDiv form table tr td
{
    color:#405466 !important;
}


/* Select */
#innerDiv form select
{
    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    color:#405466 !important;
    border-radius:9px !important;
}

#innerDiv form select:focus
{
    border-color:#76a9d6 !important;
    background:#ffffff !important;
    box-shadow:0 0 0 3px rgba(116,169,214,0.12) !important;
}


/* Continue Button */
#innerDiv form input[type="submit"]
{
    width:160px !important;
    height:44px !important;

    border:none !important;
    border-radius:25px !important;

    background:linear-gradient(135deg,#174a78,#23689b,#4d91c4) !important;

    color:#ffffff !important;

    font-size:14px !important;
    font-weight:bold !important;

    box-shadow:0 6px 16px rgba(30,90,140,0.25) !important;

    cursor:pointer;
    transition:all .25s ease;
}

#innerDiv form input[type="submit"]:hover
{
    transform:translateY(-2px);

    background:linear-gradient(135deg,#0b3557,#174a78,#367cae) !important;

    box-shadow:0 9px 22px rgba(30,90,140,0.35) !important;
}


/* Mobile */
@media(max-width:767px)
{
    #innerDiv
    {
        padding:10px 10px 25px 10px !important;
    }

    #innerDiv form table
    {
        width:100% !important;
        max-width:100% !important;
    }

    #innerDiv form table tr td
    {
        display:block;
        width:100% !important;
        box-sizing:border-box;
        padding:7px 10px !important;
    }

    #innerDiv form select
    {
        width:100% !important;
        max-width:100% !important;
    }

    #innerDiv form input[type="submit"]
    {
        width:100% !important;
        max-width:220px !important;
    }
}
</style>
</head>

<body>
<!-- header -->
<!-- header -->
<?php include('header.php')?>
<!-- header-end -->
<!-- header-end -->
<!-- main-area -->

<main style="overflow: hidden;">

<!-- sub-banner / breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Dashboard</h2>

<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="../index.php">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
Dashboard
</li>
</ol>
</nav>
</div>

</div>
</div>
</div>
</div>
</div>
</section>

<!-- Relative Wrapper to anchor shapes directly below sub-banner -->
<div style="position: relative;">

<!-- Dashboard Decorative Shapes -->

<div class="dashboard-shape dashboard-shape-one">★</div>
<div class="dashboard-shape dashboard-shape-two">✦</div>
<div class="dashboard-shape dashboard-shape-three">●</div>
<div class="dashboard-shape dashboard-shape-four">♥</div>

<div class="dashboard-shape dashboard-shape-five">★</div>
<div class="dashboard-shape dashboard-shape-six">✦</div>
<div class="dashboard-shape dashboard-shape-seven">♥</div>
<div class="dashboard-shape dashboard-shape-eight">●</div>

<div class="dashboard-shape dashboard-shape-nine">★</div>
<div class="dashboard-shape dashboard-shape-ten">✦</div>
<div class="dashboard-shape dashboard-shape-eleven">●</div>
<div class="dashboard-shape dashboard-shape-twelve">♥</div>

<div class="dashboard-shape dashboard-shape-thirteen">★</div>
<div class="dashboard-shape dashboard-shape-fourteen">✦</div>
<div class="dashboard-shape dashboard-shape-fifteen">♥</div>
<div class="dashboard-shape dashboard-shape-sixteen">●</div>

<div class="dashboard-shape dashboard-shape-seventeen">★</div>
<div class="dashboard-shape dashboard-shape-eighteen">✦</div>
<div class="dashboard-shape dashboard-shape-nineteen">●</div>
<div class="dashboard-shape dashboard-shape-twenty">♥</div>

<!-- breadcrumb-area-end -->


<!-- blank middle area -->
<!-- Dashboard Area Start -->

<div style="min-height:600px;">
<div class="container" style="padding-bottom:20px; padding-top:20px; padding-right:20px;margin-top:20px">
<div class="row">
<?php include('aside.php')?>

<div class="col-md-9" id="dashright" style="padding:20px; background-image:radial-gradient(circle, #fff5f7, #ffe8e8, #ffd9cf, #ffc6b5, #ffad91); border-radius:16px;">
<div style="width:100%;" align="center"> 
<?php include('inner-header.php');?>

<div id="innerDiv" style="padding-bottom:10px; padding-top:0;background-color:#FFFFFF;border-radius:10px;border-radius:10px;">
<p>&nbsp;</p>
<?php if($_REQUEST['m']==2){?><div id="success" style="color:#009900;text-align:center">New password successfully updated!</div><?php }?>
<?php if($_REQUEST['m']==1){?><div id="wrong" style="color:#CC0000;text-align:center">You have entered wrong password!</div><?php }?>
<?php if($_REQUEST['m']==3){?><div id="wrong" style="color:#CC0000;text-align:center">Current password does not match!</div><?php }?>
<div>&nbsp;</div> 

<form name="frm1" method="post" action="student-status.php">
<input type="hidden" name="id" id="id" value="<?=trim($_REQUEST['id'])?>" />
<?php
	$course = getStudent($conn,$_REQUEST['id'],'course');
	$course_name = ucwords(strtolower(getCourseNameByID($conn,output($fetchn['course']),'course_name')));
	$category = getStudent($conn,$_REQUEST['id'],'coursecat');
	$category_name = strtoupper(getCategoryName($conn,$category));	
?>
<table width="40%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr class="class3"><td width="45%" style="padding:10px;">Wallet<span style="color:#FF0000;">*</span></td>
<td width="64%">

<?php /*?><?php if($category_name=='PROJECT COURSE' || $category_name=='Project Course' || $category_name=='project course'){ ?>
<select name="wallet" id="wallet" style="width:250px;height:26px;" class="selectboxsmall" required>
<option value="">Select Wallet</option>
<option value="PROJECT">Project Balance</option>
</select>
<?php }else{?><?php */?>
<select name="wallet" id="wallet" style="width:250px;height:26px;" class="selectboxsmall" required>
<option value="">Select Wallet</option>
<option value="Main">Main Balance</option>
</select>


</td>
</tr>
<tr class="class4"><td style="padding:10px;"></td><td><input type="submit" name="submit" value="CONTINUE" class="button_example" /></td></tr>
</table>
</form>
<div>&nbsp;</div> 
</div>

</div>
</div>
</div>
</div>

</div>

<!-- Dashboard Area End -->
<!-- blank middle area-end -->

</div> <!-- End Relative Wrapper -->

</main>


<!-- main-area-end -->
<!-- footer -->
<!-- footer -->
<?php include('footer.php')?>
<!-- footer-end -->
<!-- footer-end -->

<!-- JS here -->
<script src="js/modernizr-3.5.0.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/paroller.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/js_isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.meanmenu.min.js"></script>
<script src="js/parallax-scroll.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/element-in-view.js"></script>
<script src="js/main.js"></script>
</body>

</html>