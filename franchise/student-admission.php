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
<script>

function getDuration()
{
    var category=document.getElementById('coursecat').value;

    document.getElementById('divCourse').innerHTML=
    '<select style="width:250px;height:26px" class="selectboxsmall" name="course" id="course" required tabindex="8">' +
    '<option value="">Select Course</option>' +
    '</select>';

    xmlhttp.open('GET','get-duration.php?category='+category);
    xmlhttp.onreadystatechange=getDurationRequest;
    xmlhttp.send();
}

function getDurationRequest()
{
    if(xmlhttp.readyState==4)
    {
        if(xmlhttp.status==200)
        {
            var response=xmlhttp.responseText;
            document.getElementById('sDiv').innerHTML=response;
        }
    }
}

function hidePopup()
{
    var overlay=document.getElementById('overlay');

    if(overlay)
    {
        overlay.remove();
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
   MODERN STUDENT ADMISSION FORM
========================================= */
#innerDiv
{
    background:linear-gradient(135deg,#ffffff,#f5f9ff,#eaf4ff) !important;
    border-radius:18px !important;
    padding:10px 0 30px 0;
    box-shadow:0 5px 25px rgba(30,80,130,0.10);
}

/* Form area */

#innerDiv form
{
    font-family:Arial, Helvetica, sans-serif !important;
}

/* Labels */

#innerDiv form label
{
    display:block;
    font-size:15px;
    font-weight:600;
    color:#405466;
    margin-bottom:7px;
}

/* Required star */

#innerDiv form label span
{
    color:#d9534f !important;
    font-weight:bold;
}
/* Input + Select */

#innerDiv form input[type="text"],
#innerDiv form input[type="email"],
#innerDiv form input[type="date"],
#innerDiv form select
{
    width:100% !important;
    max-width:100% !important;
    height:42px !important;

    padding:8px 13px !important;

    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:9px !important;

    color:#333f4d !important;
    font-size:14px;

    outline:none;

    transition:all .25s ease;
    box-sizing:border-box;
}

/* Placeholder */

#innerDiv form input::placeholder
{
    color:#999999 !important;
    opacity:1 !important;
    filter:none !important;
    -webkit-filter:none !important;
    text-shadow:none !important;
}

/* Focus */

#innerDiv form input[type="text"]:focus,
#innerDiv form input[type="email"]:focus,
#innerDiv form input[type="date"]:focus,
#innerDiv form select:focus
{
    border-color:#76a9d6 !important;
    background:#ffffff !important;

    box-shadow:0 0 0 3px rgba(116,169,214,0.12) !important;

    outline:none;
}
/* Select */

#innerDiv form select
{
    cursor:pointer;
}

/* Section headings */

#innerDiv form h2
{
    position:relative;

    display:inline-block;

    margin-top:22px !important;
    margin-bottom:20px !important;

    padding:10px 18px;

    font-size:18px !important;
    font-weight:bold;

    color:#174a78 !important;

    background:linear-gradient(
        135deg,
        #eaf4ff,
        #f5f9ff
    );

    border-left:5px solid #23689b;
    border-radius:8px;
}

/* Section heading first line */

#innerDiv form h2:after
{
    content:"";
    position:absolute;

    left:18px;
    bottom:-7px;

    width:45px;
    height:3px;

    background:linear-gradient(
        to right,
        #174a78,
        #4d91c4
    );

    border-radius:5px;
}

/* Form rows */

#innerDiv form .row
{
    margin-bottom:15px;
}

/* File upload */

#innerDiv form input[type="file"]
{
    width:100% !important;
    max-width:100% !important;
    height:46px !important;

    padding:5px !important;

    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:10px !important;

    color:#526577;
    font-size:13px;

    box-sizing:border-box;
    cursor:pointer;
}

/* File hover */

#innerDiv form input[type="file"]:hover
{
    background:#fff2ed;
    border-color:#ff7b54;
}

/* File size text */

#innerDiv form input[type="file"] + span,
.upload-note
{
    display:block;
    margin-top:5px;

    color:#527da3 !important;
    font-size:12px;
}
/* Register Button */

#innerDiv form input[type="submit"]
{
    width:190px !important;
    height:46px !important;

    margin-top:20px !important;

    border:none !important;
    border-radius:25px !important;

    background:linear-gradient(
        135deg,
        #174a78,
        #23689b,
        #4d91c4
    ) !important;

    color:#ffffff !important;

    font-size:14px !important;
    font-weight:bold !important;
    letter-spacing:.5px;

    cursor:pointer;

    box-shadow:
        0 6px 16px rgba(30,90,140,0.25);

    transition:all .25s ease;
}
/* Button hover */

#innerDiv form input[type="submit"]:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 9px 22px rgba(30,90,140,0.35);

    background:linear-gradient(
        135deg,
        #0b3557,
        #174a78,
        #367cae
    ) !important;
}

/* Remove old button styling */

#innerDiv form .button_example
{
    border-radius:25px !important;
}
#innerDiv form input[type="file"]
{
    width:100% !important;
    max-width:100% !important;
    height:46px !important;
    padding:5px !important;
    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:10px !important;
    color:#666666;
    font-size:13px;
    box-sizing:border-box;
    cursor:pointer;
}

#innerDiv form input[type="file"]::file-selector-button
{
    height:36px;
    padding:0 16px;
    margin-right:10px;

    border:none;
    border-radius:7px;

    background:linear-gradient(
        135deg,
        #174a78,
        #4d91c4
    );

    color:#ffffff;
    font-size:13px;
    font-weight:bold;

    cursor:pointer;
    transition:all .25s ease;
}


#innerDiv form input[type="file"]::file-selector-button:hover
{
    background:linear-gradient(
        135deg,
        #0b3557,
        #367cae
    );
}


#innerDiv form input[type="file"]:hover
{
    border-color:#76a9d6 !important;
    background:#f1f7fd !important;
}

/* Desktop spacing */

@media(min-width:768px)
{
    #innerDiv form .col-md-4
    {
        padding-left:15px;
        padding-right:15px;
    }
}

/* Mobile */

@media(max-width:767px)
{
    

	/* Mobile Dropdown Responsive */

#innerDiv form select,
#innerDiv form #state,
#innerDiv form #district,
#innerDiv form #coursecat,
#innerDiv form #duration,
#innerDiv form #course,
#innerDiv form #gender,
#innerDiv form #age,
#innerDiv form #religion,
#innerDiv form #category
{
    width:100% !important;
    max-width:100% !important;
    height:42px !important;
    min-height:42px !important;
    box-sizing:border-box !important;
    display:block !important;
}

#innerDiv form #distEdit,
#innerDiv form #sDiv,
#innerDiv form #divCourse
{
    width:100% !important;
    max-width:100% !important;
    display:block !important;
}

#innerDiv form #distEdit select,
#innerDiv form #sDiv select,
#innerDiv form #divCourse select
{
    width:100% !important;
    max-width:100% !important;
    box-sizing:border-box !important;
}
    #innerDiv form .col-md-4,
    #innerDiv form .col-md-5,
    #innerDiv form .col-md-6,
    #innerDiv form .col-md-8,
    #innerDiv form .col-md-10
    {
        width:100%;
        margin-left:0 !important;
        padding-left:5px;
        padding-right:5px;
    }

    #innerDiv form input[type="submit"]
    {
        width:100% !important;
    }

    #innerDiv form h2
    {
        font-size:13px !important;
    }
	
}

.abacus-popup-overlay
{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(2,50,120,0.55);

display:flex;
align-items:center;
justify-content:center;

z-index:99999;
padding:20px;
box-sizing:border-box;
}

.abacus-popup
{
width:400px;
max-width:100%;

padding:30px 25px 25px;

background:#fff;
border-radius:25px;

text-align:center;

box-shadow:0 15px 40px rgba(2,50,120,0.25);

border:4px solid #e4f1ff;

box-sizing:border-box;

animation:abacusPopupShow .25s ease;
}

.abacus-popup-icon
{
width:70px;
height:70px;

margin:0 auto 12px;

display:flex;
align-items:center;
justify-content:center;

border-radius:50%;

color:#fff;
font-size:32px;

box-shadow:0 5px 0 rgba(0,0,0,0.15);
}

.abacus-popup h2
{
margin:8px 0;
font-size:25px;
font-weight:900;
}

.abacus-popup p
{
margin:0 auto 22px;

color:#52708f;

font-size:15px;
font-weight:600;

line-height:1.6;
}

.abacus-popup button
{
min-width:120px;
height:42px;

padding:0 20px;

border:0;
border-radius:22px;

color:#fff;

font-size:14px;
font-weight:800;

cursor:pointer;

box-shadow:0 4px 0 rgba(0,0,0,0.20);

transition:all .2s ease;
}

.abacus-popup button:hover
{
transform:translateY(-2px);

box-shadow:0 6px 0 rgba(0,0,0,0.20);
}

@keyframes abacusPopupShow
{
from
{
opacity:0;
transform:scale(.85);
}

to
{
opacity:1;
transform:scale(1);
}
}

@media(max-width:575px)
{
.abacus-popup
{
width:100%;
padding:25px 18px 22px;
border-radius:20px;
}

.abacus-popup-icon
{
width:60px;
height:60px;
font-size:27px;
}

.abacus-popup h2
{
font-size:22px;
}

.abacus-popup p
{
font-size:14px;
}
}


</style>
</head>


<body>
<?php if(isset($_REQUEST['e']) && $_REQUEST['e']==1){ ?>

<?=getFailedSuccessHtml(
    'Registration Failed',
    'Email ID or Phone Number Already Used!!',
    'failed'
)?>

<?php } ?>
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

<div style="min-height:900px;">
<div class="container" style="padding-bottom:20px; padding-top:20px; padding-right:30px; ">
<div class="row">
<?php include('aside.php')?>

<div class="col-md-9" id="dashright" style="padding:20px; background-image:radial-gradient(circle, #ffffff, #f5f9ff, #eaf4ff, #e4f1ff); border-radius:16px;">
<?php include('inner-header.php');?>
<div id="innerDiv"  style="padding-bottom:10px; padding-top:0;background:#FFFFFF;border-radius:10px;">
<div class="container">
<p>&nbsp;</p>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#009900;">Your application has been sent for approval!</p><?php }?>

<form name="frm" method="post" action="student-admission-process.php?case=add" enctype="multipart/form-data">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<h2 style="font-size:18px;color:#000000;">Student Location</h2>
</div>
<div class="col-md-6"></div></div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>State<span style="color:#FF0000;">*</span></label>
<select name="state" id="state" style="width:250px;height:26px" class="selectboxsmall" onChange="getDistrict(this.value);" required tabindex="1">
<option value="">Select State</option>
<?php
$sqlst="SELECT * FROM `ab_state` ORDER BY `state`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=$fetchst['state']?></option>
<?php }}?>
</select>
</div>
<div class="col-md-0"></div>

<div class="col-md-5">
<label>District<span style="color:#FF0000;">*</span></label>
<div id="distEdit">
<select name="district" id="district"style="width:250px;height:26px" class="selectboxsmall" required  tabindex="2">
<option value="">Select District</option>
</select>
</div>
</div>
<div class="col-md-0"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>Address<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px"name="address" id="address" class="inputboxsmall" required placeholder="Enter Address" tabindex="3" />
</div>
<div class="col-md-0"></div>

<div class="col-md-5">
<label>City<span style="color:#FF0000;">*</span></label>
<input type="text"style="width:250px;height:26px" name="city" id="city" class="inputboxsmall" value="" required placeholder="Enter City" tabindex="4" />
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Pin Code<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px"name="pincode" id="pincode" class="inputboxsmall" required placeholder="Enter Pin Code" tabindex="5" />
</div>
<div class="col-md-6"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<h2 style="font-size:18px; margin-top:20px;color:#000000; white-space:nowrap;">Student Information</h2>
</div>
<div class="col-md-7"></div>
</div>

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-5">
<label style="margin-top:0;">Course Category<span style="color:#FF0000;">*</span></label>
<select style="width:250px;height:26px" class="selectboxsmall" name="coursecat" id="coursecat" required tabindex="6" onChange="getDuration()">
<option value="">Select Category</option>
<?php
$sqls="SELECT * FROM `ab_course_category` ORDER BY `id`";
$ress=query($conn,$sqls);
$nums=numrows($ress);
if($nums>0)
{
while($fetchs=fetcharray($ress))
{
?>
<option value="<?=$fetchs['id']?>"><?=$fetchs['category']?></option>
<?php }}?>
</select>
</div>
<div class="col-md-0"></div>
<div class="col-md-5">
<label style="margin-top:0;">Duration<span style="color:#FF0000;">*</span></label>
<div id="sDiv">

<select name="duration" id="duration" style="width:250px;height:26px" class="selectboxsmall" onChange="getCourseList()" required tabindex="7">

<option value="">Select Duration</option>

</select>

</div>
</div>
<div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-5">
<label style="margin-top:0;">Course<span style="color:#FF0000;">*</span></label>
<div id="divCourse">
<select style="width:250px;height:26px" class="selectboxsmall" name="course" id="course" required tabindex="8">
<option value="">Select Course</option>
</select>
</div>
</div>





<div class="col-md-0"></div>
<div class="col-md-5">
<label>Parent's Email ID<span style="color:#FF0000;">*</span></label>
<input type="email" style="width:250px;height:26px" name="email" id="email" class="inputboxsmall" required placeholder="Enter Email ID" tabindex="9" />
</div>
</div>	
	
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="name" id="name" class="inputboxsmall" required placeholder="Enter Name" tabindex="10"/>
</div>

<div class="col-md-0"></div>
<div class="col-md-5">
<label>Father's Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="fname" id="fname" class="inputboxsmall" required placeholder="Enter Father's Name" tabindex="11"/>
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>Mother's Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="mname" id="mname" class="inputboxsmall" required placeholder="Enter Mother's Name" tabindex="12"/>
</div>

<div class="col-md-0"></div>
<div class="col-md-5" id="genDiv">
<label>Gender<span style="color:#FF0000;">*</span></label>
<select name="gender" id="gender" style="width:250px;height:26px" class="inputboxsmall" onChange="getHusband()" required tabindex="13">
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div><div class="col-md-1"></div>
</div>


<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>Parent's Phone No<span style="color:#FF0000;">*</span></label>
<input type="text"style="width:250px;height:26px" name="phone" id="phone" pattern="[0-9]{10}" maxlength="10" class="inputboxsmall" required placeholder="Enter Phone" tabindex="16"/>

</div>

<div class="col-md-0"></div>
<div class="col-md-5">
<label>Age<span style="color:#FF0000;">*</span></label>
<select name="age"style="width:250px;height:26px" id="age" class="inputboxsmall" required tabindex="17">
<option value="">Select Age</option>
<option value="1">1 Year</option>
<option value="2">2 Year</option>
<option value="3">3 Year</option>
<option value="4">4 Year</option>
<option value="5">5 Year</option>
<option value="6">6 Year</option>
<option value="7">7 Year</option>
<option value="8">8 Year</option>
<option value="9">9 Year</option>
<option value="10">10 Year</option>
</select>
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<label>Religion<span style="color:#FF0000;">*</span></label>
<select name="religion" style="width:250px;height:26px" id="religion" class="selectboxsmall" required tabindex="18">
<option value="">Select Religion</option>
<option value="Hinduism">Hinduism</option>
<option value="Islam">Islam</option>
<option value="Christianism">Christianism</option>
<option value="Others">Others</option>
</select>
</div>

<div class="col-md-0"></div>
<div class="col-md-5">
<label>Category<span style="color:#FF0000;">*</span></label>
<select name="category" style="width:250px;height:26px" id="category" class="selectboxsmall" required tabindex="19">
<option value="">Select Category</option>
<option value="General">General</option>
<option value="SC">SC</option>
<option value="ST">ST</option>
<option value="OBC">OBC</option>
</select>
</div>
<div class="col-md-1"></div>
</div>
<!-- Date Information -->
<div class="row">

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <label>
            Date of Birth
            <span style="color:#FF0000;">*</span>
        </label>

        <input type="date"
               name="dob"
               id="dob"
               class="inputboxsmall"
               required
               tabindex="20">
    </div>

    <div class="col-md-5">
        <label>
            Admission Date
            <span style="color:#FF0000;">*</span>
        </label>

        <input type="date"
               name="admission"
               id="admission"
               class="inputboxsmall"
               required
               tabindex="21">
    </div>

    <div class="col-md-1"></div>

</div>


<!-- Upload Information -->
<div class="row upload-row">

    <div class="col-md-1"></div>

    <!-- Photo Upload -->
    <div class="col-md-5">

        <label>
            Photo Upload
            <span style="color:#FF0000;">*</span>
        </label>

        <input type="file"
               name="photo"
               id="photo"
               required
               accept=".png,.jpeg,.jpg,.pjp"
               tabindex="22">

        <span class="upload-note">
            (Size- 450 X 450 px)
        </span>

    </div>


    <!-- Photo ID -->
    <div class="col-md-5">

        <label>
            Photo ID (Aadhaar Card)
            <span style="color:#FF0000;">*</span>
        </label>

        <input type="file"
               name="identity"
               id="identity"
               required
               accept=".png,.jpeg,.jpg,.pjp"
               tabindex="23">

        <span class="upload-note">
            Upload valid photo ID
        </span>

    </div>

    <div class="col-md-1"></div>

</div>



<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
<input type="submit" name="submit" value="REGISTER NOW" class="button_example" style="margin-top:17px;background:#003366;color:#FFFFFF;border:1px solid #000000;"  tabindex="24"/>
</div>
</div>

</form>

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