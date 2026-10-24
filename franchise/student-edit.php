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

#dashright
{
    font-family:Arial, Helvetica, sans-serif !important;
}

/* Main White Form Box */
#innerDiv
{
    background:linear-gradient(135deg,#ffffff,#f5f9ff,#eaf4ff) !important;
    border-radius:18px !important;
    padding:10px 20px 30px 20px !important;
    box-shadow:0 5px 25px rgba(30,80,130,0.10);
}

/* Form */
#innerDiv form
{
    font-family:Arial, Helvetica, sans-serif !important;
}


/* Labels */
#innerDiv form label
{
    display:block;
    margin-bottom:7px !important;
    font-size:15px;
    font-weight:600;
    color:#405466;
}

/* Required Star */
#innerDiv form label span
{
    color:#d9534f !important;
    font-weight:bold;
}

/* =========================================
   SECTION HEADINGS
========================================= */

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
    background:linear-gradient(135deg,#eaf4ff,#f5f9ff);
    border-left:5px solid #23689b;
    border-radius:8px;
}

#innerDiv form h2:after
{
    content:"";
    position:absolute;
    left:18px;
    bottom:-7px;
    width:45px;
    height:3px;
    background:linear-gradient(to right,#174a78,#4d91c4);
    border-radius:5px;
}

/* Form Rows */
#innerDiv form .row
{
    margin-bottom:15px;
}

/* =========================================
   ALL INPUTS + SELECT
========================================= */

#innerDiv form input[type="text"],
#innerDiv form input[type="email"],
#innerDiv form input[type="date"],
#innerDiv form select
{
    width:100% !important;
    max-width:100% !important;
    height:43px !important;
    padding:8px 13px !important;
    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:9px !important;
    color:#333f4d !important;
    font-size:14px !important;
    box-sizing:border-box;
    outline:none;
    transition:all .25s ease;
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

/* Disabled Course Category */
#innerDiv form select:disabled
{
    background:#eaf4ff !important;
    color:#6f8090 !important;
    border-color:#c9def2 !important;
    cursor:not-allowed;
    opacity:1;
}

/* AJAX Boxes */
#distEdit,
#divCourse,
#sDiv
{
    width:100%;
}

/* =========================================
   UPDATE BUTTON
========================================= */

#innerDiv form input[type="submit"]
{
    width:180px !important;
    height:46px !important;
    margin-top:20px !important;
    border:none !important;
    border-radius:25px !important;
    background:linear-gradient(135deg,#174a78,#23689b,#4d91c4) !important;
    color:#ffffff !important;
    font-size:14px !important;
    font-weight:bold !important;
    letter-spacing:.5px;
    cursor:pointer;
    box-shadow:0 6px 16px rgba(30,90,140,0.25);
    transition:all .25s ease;
}

#innerDiv form input[type="submit"]:hover
{
    transform:translateY(-2px);
    box-shadow:0 9px 22px rgba(30,90,140,0.35);
    background:linear-gradient(135deg,#0b3557,#174a78,#367cae) !important;
}

/* =========================================
   SUCCESS MESSAGE
========================================= */

#innerDiv p[align="center"]
{
    color:#17608f !important;
    background:#eaf4ff;
    border:1px solid #b9d8f2;
    border-radius:8px;
    padding:10px 15px;
    font-size:14px;
    font-weight:bold;
}

/* =========================================
   MOBILE
========================================= */

@media(max-width:767px)
{
    #innerDiv
    {
        padding:10px 0px 25px 0px !important;
    }

    #innerDiv form .col-md-1,
    #innerDiv form .col-md-2,
    #innerDiv form .col-md-4,
    #innerDiv form .col-md-5,
    #innerDiv form .col-md-6,
    #innerDiv form .col-md-8
    {
        width:100%;
        margin-left:0 !important;
        padding-left:15px;
        padding-right:15px;
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

<div style="min-height:900px;">
<div class="container" style="padding-bottom:20px; padding-top:20px; padding-right:30px; ">
<div class="row">
<?php include('aside.php')?>

<div class="col-md-9" id="dashright" style="background-image:radial-gradient(circle, #ffffff, #f5f9ff, #eaf4ff, #e4f1ff);padding:20px;border-radius:16px;">
<?php include('inner-header.php');?>
<div id="innerDiv" style="padding-bottom:10px; padding-top:0;background:#FFFFFF;border-radius:10px;">
<div class="container">
<p>&nbsp;</p>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#009900;">Your application has been sent for approval!</p><?php }?>
<?php
if($_REQUEST['case']=='application')
{
$sql="SELECT * FROM `ab_student_application` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
}else{
$sql="SELECT * FROM `ab_student` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
}
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form name="frm" method="post" action="student-edit-process.php" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?=trim($_REQUEST['id'])?>" />
<input type="hidden" name="case" id="case" value="<?=trim($_REQUEST['case'])?>" />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<h2 style="font-size:18px;color:#000000;">Student Location</h2>
</div>
<div class="col-md-6"></div></div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>State<span style="color:#FF0000;">*</span></label>
<select name="state" id="state" style="width:250px;height:26px;" class="form-control" onChange="getDistrict(this.value);" >
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
<option value="<?=$fetchst['id']?>" <?php if($fetch['state']==$fetchst['id']){echo 'selected';}?>><?=$fetchst['state']?></option>
<?php }}?>
</select>
</div>
<div class="col-md-2"></div>

<div class="col-md-4">
<label>District<span style="color:#FF0000;">*</span></label>
<div id="distEdit">
<select name="district" id="district" class="form-control" style="width:250px;height:26px;" > 
<option value="">Select District</option>
<?php
$sqlci="SELECT * FROM `ab_district` WHERE `state`='".mysqli_real_escape_string($conn,trim($fetch['state']))."' ORDER BY `district`";
$resci=query($conn,$sqlci);
$numci=numrows($resci);
if($numci>0)
{
while($fetchci=fetcharray($resci))
{
?>
<option value="<?=$fetchci['id']?>"<?php if($fetch['district']==$fetchci['id']){echo 'selected';}?>><?=ucwords(strtolower($fetchci['district']))?></option>
<?php }}?>
</select> 
</div>
</div>

</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Address<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px"name="address" id="address" class="form-control"  placeholder="Enter Address" value="<?=$fetch['address']?>" />
</div>
<div class="col-md-2"></div>

<div class="col-md-4">
<label>City<span style="color:#FF0000;">*</span></label>
<input type="text"style="width:250px;height:26px" name="city" id="city" class="form-control" value="<?=$fetch['city']?>"  placeholder="Enter City" />
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Pin Code<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px"name="pincode" id="pincode" class="form-control"  placeholder="Enter Pin Code" value="<?=$fetch['pincode']?>" />
</div>
<div class="col-md-6"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<h2 style="font-size:18px; margin-top:20px;color:#000000;white-space:nowrap;">Student Information</h2>
</div>
<div class="col-md-6"></div></div>

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-4">
<label style="margin-top:0;">Course Category<span style="color:#FF0000;">*</span></label>
<select name="coursecat" id="coursecat" style="width:250px;height:26px;" class="form-control"  onChange="getCourseList();" disabled="disabled">
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
<option value="<?=$fetchs['id']?>" <?php if($fetch['coursecat']==$fetchs['id']){echo 'selected';}?>><?=$fetchs['category']?></option>
<?php }}?>
</select>
</div>
<div class="col-md-2"></div>
<div class="col-md-4">
<label style="margin-bottom:0;">Duration  <span style="color:#FF0000;">*</span></label>
<div id="sDiv">
<select name="duration" id="duration" class="form-control" style="width:250px;height:26px;" onChange="getCourseList(this.value)">
<option value="" "form-control border-primary">Select Duration</option>
<?php
$sql1="SELECT * FROM `ab_duration`";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
?>
<option value="<?=$fetch1['id']?>" <?php if($fetch['duration']==$fetch1['id']){echo 'selected';}?>><?=ucwords(strtolower($fetch1['duration']))?></option>
<?php }}?>
</select>
</div>
</div>
<div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-4">
<label style="margin-top:0;">Course<span style="color:#FF0000;">*</span></label>
<div id="divCourse">
<select name="course" id="course" class="form-control" style="width:250px;height:26px;">
<option value="">Select Course</option>
<?php

$sqlco="SELECT * FROM `ab_course`
WHERE `category`='".mysqli_real_escape_string($conn,trim($fetch['coursecat']))."'
AND `duration`='".mysqli_real_escape_string($conn,trim($fetch['duration']))."'
GROUP BY `course_name`
ORDER BY `id` ASC";


$resco=query($conn,$sqlco);
$numco=numrows($resco);

if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>" <?php if($fetch['course']==$fetchco['id']){echo 'selected';}?>><?=ucwords(($fetchco['course_name']))?> (<?=$fetchco['code']?>)</option>
<?php
}
}
?>
</select>
</div>
</div>
</div>	
	
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="name" id="name" class="form-control"  placeholder="Enter Name" value="<?=$fetch['name']?>" />
</div>

<div class="col-md-2"></div>
<div class="col-md-4">
<label>Father's Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="fname" id="fname" class="form-control"  placeholder="Enter Father's Name" value="<?=$fetch['fname']?>" />
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Mother's Name<span style="color:#FF0000;">*</span></label>
<input type="text" style="width:250px;height:26px" name="mname" id="mname" class="form-control"  placeholder="Enter Mother's Name" value="<?=$fetch['mname']?>" />
</div>

<div class="col-md-2"></div>
<div class="col-md-4">
<label>Gender</label>
<select name="gender" id="gender" style="width:250px;height:26px" class="form-control" >
<option value="">Select Gender</option>
<option value="Male" <?php if($fetch['gender']=='Male'){echo 'selected';}?>>Male</option>
<option value="Female" <?php if($fetch['gender']=='Female'){echo 'selected';}?>>Female</option>
</select>
</div><div class="col-md-1"></div>
</div>


<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Phone<span style="color:#FF0000;">*</span></label>
<input type="text"style="width:250px;height:26px" name="phone" id="phone" pattern="[0-9]{10}" class="form-control"  placeholder="Enter Phone" value="<?=$fetch['phone']?>" />

</div>

<div class="col-md-2"></div>
<div class="col-md-4">
<label>Age<span style="color:#FF0000;">*</span></label>
<select name="age"style="width:250px;height:26px" id="age" class="form-control" required>
<option value="">Select Age</option>
<option value="1" <?php if($fetch['age']=='1'){echo 'selected';}?>>1 Year</option>
<option value="2" <?php if($fetch['age']=='2'){echo 'selected';}?>>2 Year</option>
<option value="3" <?php if($fetch['age']=='3'){echo 'selected';}?>>3 Year</option>
<option value="4" <?php if($fetch['age']=='4'){echo 'selected';}?>>4 Year</option>
<option value="5" <?php if($fetch['age']=='5'){echo 'selected';}?>>5 Year</option>
<option value="6" <?php if($fetch['age']=='6'){echo 'selected';}?>>6 Year</option>
<option value="7" <?php if($fetch['age']=='7'){echo 'selected';}?>>7 Year</option>
<option value="8" <?php if($fetch['age']=='8'){echo 'selected';}?>>8 Year</option>
<option value="9" <?php if($fetch['age']=='9'){echo 'selected';}?>>9 Year</option>
<option value="10" <?php if($fetch['age']=='10'){echo 'selected';}?>>10 Year</option>

</select>
</div><div class="col-md-1"></div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Religion<span style="color:#FF0000;">*</span></label>
<select name="religion" style="width:250px;height:26px" id="religion" class="form-control" >
<option value="">Select Religion</option>
<option value="Hinduism" <?php if($fetch['religion']=='Hinduism'){echo 'selected';}?>>Hinduism</option>
<option value="Islam" <?php if($fetch['religion']=='Islam'){echo 'selected';}?>>Islam</option>
<option value="Christianism" <?php if($fetch['religion']=='Christianism'){echo 'selected';}?>>Christianism</option>
<option value="Others" <?php if($fetch['religion']=='Others'){echo 'selected';}?>>Others</option>
</select>
</div>

<div class="col-md-2"></div>
<div class="col-md-4">
<label>Category<span style="color:#FF0000;">*</span></label>
<select name="category" style="width:250px;height:26px" id="category" class="form-control" >
<option value="">Select Category</option>
<option value="General" <?php if($fetch['category']=='General'){echo 'selected';}?>>General</option>
<option value="SC" <?php if($fetch['category']=='SC'){echo 'selected';}?>>SC</option>
<option value="ST" <?php if($fetch['category']=='ST'){echo 'selected';}?>>ST</option>
<option value="OBC" <?php if($fetch['category']=='OBC'){echo 'selected';}?>>OBC</option>
</select>
</div><div class="col-md-1"></div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Email</label>
<input type="email" style="width:250px;height:26px" name="email" id="email" class="form-control"  placeholder="Enter Email" value="<?=$fetch['email']?>" />
</div>
<div class="col-md-2"></div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<label>Date of Birth<span style="color:#FF0000;">*</span></label>
<input type="date" style="width:250px;height:26px" name="dob" id="dob" class="form-control" required placeholder="Enter Date of Birth" value="<?=$fetch['dob']?>" />
<script>
$(function() {
$( "#dob" ).datepicker({
changeMonth: true,
changeYear: true
});
});
</script>
</div>

<div class="col-md-2"></div>
<div class="col-md-4">
<label>Admission Date<span style="color:#FF0000;">*</span></label>
<input type="date" style="width:250px;height:26px" name="admission" id="admission" class="form-control" required placeholder="Enter Admission Date" value="<?=$fetch['admission']?>" />
<script>
$(function() {
$( "#dob" ).datepicker({
changeMonth: true,
changeYear: true
});
});
</script>
</div>
</div>


<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
<input type="submit" name="submit" value="UPDATE" class="button_example" style="margin-top:17px;" />
</div>
</div>

</form>
<?php }?>

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