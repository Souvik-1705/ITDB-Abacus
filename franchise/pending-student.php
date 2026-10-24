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
<<title><?=$title?></title>
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
function viewStatus(id,val)
{
window.location.href='pending-student-process.php?id='+id+'&val='+val;
}
</script>
<style>
#dashright{ 
    font-family:Arial, Helvetica, sans-serif !important;
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
   MODERN STUDENT EDIT FORM
========================================= */

#dashright{ 
    font-family:Arial, Helvetica, sans-serif !important;
}

/* Main White Form Box */
#innerDiv
{
    background:#ffffff !important;
    border-radius:18px !important;
    padding:10px 20px 30px 20px !important;
    box-shadow:0 5px 25px rgba(0,0,0,0.06);
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
    color:#444444;
}

/* Required Star */
#innerDiv form label span
{
    color:#ff4f81 !important;
    font-weight:bold;
}

/* Section Headings */
#innerDiv form h2
{
    position:relative;
    display:inline-block;
    margin-top:22px !important;
    margin-bottom:20px !important;
    padding:10px 18px;
    font-size:18px !important;
    font-weight:bold;
    color:#e85d04 !important;
    background:linear-gradient(135deg,#fff0f3,#fff3e8);
    border-left:5px solid #ff7b54;
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
    background:linear-gradient(to right,#ff6b9a,#ff8a00);
    border-radius:5px;
}

/* Form Rows */
#innerDiv form .row
{
    margin-bottom:15px;
}

/* Text / Email / Date Inputs */
#innerDiv form input[type="text"],
#innerDiv form input[type="email"],
#innerDiv form input[type="date"],
#innerDiv form select
{
    width:100% !important;
    max-width:100% !important;
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

/* Placeholder */
#innerDiv form input::placeholder
{
    color:#aaa;
}

/* Focus */
#innerDiv form input[type="text"]:focus,
#innerDiv form input[type="email"]:focus,
#innerDiv form input[type="date"]:focus,
#innerDiv form select:focus
{
    border-color:#ff8a65 !important;
    background:#ffffff !important;
    box-shadow:0 0 0 3px rgba(255,138,101,0.12);
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
    background:#fff1ed !important;
    color:#888888 !important;
    cursor:not-allowed;
    opacity:1;
}

/* Course / District AJAX boxes */
#distEdit,
#divCourse,
#sDiv
{
    width:100%;
}

/* Submit Button */
#innerDiv form input[type="submit"]
{
    width:180px !important;
    height:46px !important;
    margin-top:20px !important;
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

/* Submit Hover */
#innerDiv form input[type="submit"]:hover
{
    transform:translateY(-2px);
    box-shadow:0 9px 22px rgba(255,105,120,0.35);
    background:linear-gradient(135deg,#ff478c,#ff7043,#ff8c28) !important;
}

/* Success Message */
#innerDiv p[align="center"]
{
    color:#e85d04 !important;
    background:#fff1f5;
    border:1px solid #ffc4d5;
    border-radius:8px;
    padding:10px 15px;
    font-size:14px;
    font-weight:bold;
}

/* Mobile */
@media(max-width:767px)
{
    #innerDiv
    {
        padding:10px 10px 25px 10px !important;
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
        font-size:17px !important;
    }
}

/* =========================================
   PENDING STUDENT SEARCH FORM
========================================= */

#dashright form[name="frm1"]
{
    background:#ffffff !important;
    padding:15px 18px !important;
    border-radius:14px !important;
    box-shadow:0 4px 18px rgba(0,0,0,0.06);
    margin-bottom:18px !important;
    min-height:58px;
    box-sizing:border-box;
}

/* Search Area */

#dashright form[name="frm1"] > div
{
    float:none !important;
    display:flex;
    justify-content:flex-end;
    align-items:center;
}

/* Search Input */

#dashright form[name="frm1"] input[type="text"]
{
    width:280px !important;
    max-width:100% !important;
    height:43px !important;

    padding:8px 16px !important;

    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:25px !important;

    color:#333f4d !important;
    font-size:14px !important;

    box-sizing:border-box;
    outline:none;

    transition:all .25s ease;
}

#dashright form[name="frm1"] input[type="text"]:focus
{
    background:#ffffff !important;
    border-color:#76a9d6 !important;

    box-shadow:
        0 0 0 3px rgba(116,169,214,0.12) !important;
}

#dashright form[name="frm1"] input[type="text"]::placeholder
{
    color:#999999 !important;
    opacity:1 !important;
}

/* =========================================
   EXPORT AREA
========================================= */

#dashright a[href="export-pending-student-process.php"]
{
    display:inline-flex !important;
    align-items:center;
    justify-content:center;

    width:46px;
    height:46px;

    background:#ffffff;

    border:1px solid #c9def2;
    border-radius:50%;

    box-shadow:0 4px 12px rgba(30,90,140,0.12);

    transition:all .25s ease;
}

#dashright a[href="export-pending-student-process.php"] img
{
    width:32px !important;
    height:32px !important;
    border-radius:50% !important;
}

#dashright a[href="export-pending-student-process.php"]:hover
{
    transform:translateY(-2px) scale(1.05);

    box-shadow:
        0 7px 18px rgba(30,90,140,0.22);
}

/* =========================================
   PENDING STUDENT CARD
========================================= */

#innerSmall
{
    background:#ffffff !important;

    border:1px solid #d5e7f8 !important;
    border-radius:16px !important;

    padding:14px !important;
    margin-bottom:15px !important;

    box-shadow:
        0 5px 20px rgba(30,80,130,0.08);

    transition:all .25s ease;
}

#innerSmall:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 9px 25px rgba(30,90,140,0.14);
}


/* Student Photo */

#innerSmall img.imgborder
{
    width:100px !important;
    height:120px !important;

    object-fit:cover;

    border:3px solid #c9def2 !important;
    border-radius:12px !important;

    box-shadow:
        0 4px 12px rgba(30,80,130,0.10);
}


/* Pending Badge */

#innerSmall span
{
    display:inline-block;

    margin-top:7px;
    padding:4px 12px;

    background:#eaf4ff;
    border:1px solid #b9d8f2;

    border-radius:20px;

    color:#17608f !important;

    font-size:12px;
    font-weight:bold;
}


/* Select Action */

#innerSmall select.selectboxps
{
    width:130px !important;
    height:37px !important;

    margin-top:8px;
    padding:5px 9px !important;

    background:#f8fbff !important;
    border:1px solid #c9def2 !important;

    border-radius:9px !important;

    color:#405466 !important;

    font-size:12px !important;

    cursor:pointer;
    outline:none;
}

#innerSmall select.selectboxps:focus
{
    border-color:#76a9d6 !important;

    box-shadow:
        0 0 0 3px rgba(116,169,214,0.10);
}

/* =========================================
   INFORMATION TABLE
========================================= */

#innerSmall table table
{
    width:100% !important;

    border-collapse:separate !important;
    border-spacing:0 !important;

    overflow:hidden;
    border-radius:10px;
}

#innerSmall table table tr.class3
{
    background:#f5f9ff !important;
}

#innerSmall table table tr.class4
{
    background:#eaf4ff !important;
}

#innerSmall table table tr:hover
{
    background:linear-gradient(
        to right,
        #e4f1ff,
        #d5e9ff
    ) !important;
}

#innerSmall table table td
{
    padding:11px 8px !important;

    font-size:14px !important;

    color:#405466 !important;

    border-bottom:1px solid #d5e7f8;

    vertical-align:middle;
}

#innerSmall table table tr.class3 td:first-child,
#innerSmall table table tr.class3 td:nth-child(3),
#innerSmall table table tr.class4 td:first-child,
#innerSmall table table tr.class4 td:nth-child(3)
{
    font-weight:bold !important;
    color:#164e78 !important;
}


/* =========================================
   EDIT INFORMATION BUTTON
========================================= */

#innerSmall input.button
{
    width:190px !important;
    height:42px !important;

    border:none !important;
    border-radius:24px !important;

    background:linear-gradient(
        135deg,
        #174a78,
        #23689b,
        #4d91c4
    ) !important;

    color:#ffffff !important;

    font-size:12px !important;
    font-weight:bold !important;

    cursor:pointer;

    box-shadow:
        0 5px 15px rgba(30,90,140,0.22);

    transition:all .25s ease;
}

#innerSmall input.button:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(30,90,140,0.32);

    background:linear-gradient(
        135deg,
        #0b3557,
        #174a78,
        #367cae
    ) !important;
}


/* =========================================
   MOBILE
========================================= */

@media(max-width:767px)
{
    #dashright form[name="frm1"]
    {
        padding:12px !important;
    }

    #dashright form[name="frm1"] > div
    {
        display:block;
        width:100%;
    }

    #dashright form[name="frm1"] input[type="text"]
    {
        width:100% !important;
    }

    #innerSmall
    {
        padding:10px !important;
    }

    #innerSmall > table,
    #innerSmall > table > tbody,
    #innerSmall > table > tbody > tr,
    #innerSmall > table > tbody > tr > td
    {
        display:block;
        width:100% !important;
    }

    #innerSmall > table > tbody > tr > td:first-child
    {
        text-align:center;
        margin-bottom:10px;
    }

    #innerSmall table table
    {
        margin-top:10px;
    }

    #innerSmall table table td
    {
        padding:9px 7px !important;
        font-size:13px !important;
    }

    #innerSmall input.button
    {
        width:100% !important;
        max-width:220px;
    }
}

#dashright form[name="frm1"] .search-btn
{
    height:43px;
    padding:0 20px;

    border:none;
    border-radius:25px;

    background:linear-gradient(
        135deg,
        #174a78,
        #23689b,
        #4d91c4
    );

    color:#ffffff;

    font-size:14px;
    font-weight:bold;

    cursor:pointer;

    box-shadow:0 5px 14px rgba(30,90,140,0.20);

    transition:all .25s ease;
}

#dashright form[name="frm1"] .search-btn:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 7px 18px rgba(30,90,140,0.30);

    background:linear-gradient(
        135deg,
        #0b3557,
        #174a78,
        #367cae
    );
}

@media(max-width:767px)
{
    /* =========================================
       PENDING SEARCH - MOBILE TOP / BOTTOM
    ========================================= */

    #dashright form[name="frm1"]
    {
        padding:12px !important;
    }

    #dashright form[name="frm1"] > div
    {
        float:none !important;
        display:block !important;
        width:100% !important;
    }

    #dashright form[name="frm1"] table
    {
        width:100% !important;
        display:block !important;
    }

    #dashright form[name="frm1"] tbody
    {
        display:block !important;
        width:100% !important;
    }

    #dashright form[name="frm1"] tr
    {
        display:block !important;
        width:100% !important;
    }

    #dashright form[name="frm1"] td
    {
        display:block !important;
        width:100% !important;
        padding:0 !important;
        margin:0 !important;
        box-sizing:border-box !important;
    }

    /* Search Input */

    #dashright form[name="frm1"] input[type="text"]
    {
        display:block !important;
        width:100% !important;
        max-width:100% !important;
        height:43px !important;
        margin:0 !important;
        box-sizing:border-box !important;
    }

    /* Search Button */

    #dashright form[name="frm1"] .search-btn
    {
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;

        width:100% !important;
        height:43px !important;

        margin:10px 0 0 0 !important;
        padding:0 !important;

        box-sizing:border-box !important;
    }

    /* Search Icon */

    #dashright form[name="frm1"] .search-btn i
    {
        margin-right:6px !important;
        line-height:1 !important;
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
<div style="min-height:500px;">
<div class="container" style="padding-bottom:20px; padding-top:20px; padding-right:30px;">
<div class="row">
<?php include('aside.php')?>

<div class="col-md-9" id="dashright" style="background-image:radial-gradient(circle, #ffffff, #f5f9ff, #eaf4ff, #e4f1ff);padding:20px;border-radius:16px;">
<div width="100%">
<?php include('inner-header.php');?>
<?php
$tname='ab_student_application';
$lim=10;
$tpage='pending-student.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `franchise`='".mysqli_real_escape_string($conn,trim(input($_SESSION['fid'])))."' AND `status`='I' AND (`name` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' OR `phone` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."') ORDER BY `id` DESC";
}else{
$where="WHERE `franchise`='".mysqli_real_escape_string($conn,trim(input($_SESSION['fid'])))."' AND `status`='I'";
}
include('pagination.php');
$numn=numrows($result);
if($numn>0)
{
?>
<form name="frm1" action="pending-student.php?act=search" method="post">
<div style="float:right">
<table  border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>"placeholder="Name,Phone Number" style="width:250px;" required/>
</td>
<td style="padding-left:10px;">
<button type="submit" class="search-btn">
<i class="fas fa-search"></i> Search
</button>
</td>
<td>&nbsp;&nbsp;</td>
</tr>
</table>
</div>

</form>
<div style="margin-bottom:5px; padding-left:330px;">
<a href="export-pending-student-process.php" style="color:#FF0000; text-align:center;"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%;" title="export to excel"></a>
</div>
<?php
while($fetchn=fetcharray($result))
{
?>
<div id="innerSmall" style="border-radius:10px;background:#FFFFFF;margin-bottom:10px;padding:10px;overflow:auto;">
<table width="99%" cellpadding="0" cellspacing="0" border="0" style="overflow:auto;">
<tr>
<td width="16%" valign="top" rowspan="7" align="center"><img src="profile/<?=$fetchn['photo']?>" height="120" width="100" class="imgborder" style="border:1px solid #666666;" /><div align="center"><span style="color:#FF0000;">Pending</span></div>
<div>
<select class="selectboxps" onChange="viewStatus('<?=$fetchn['id']?>',this.value);">
<option>Select Action</option>
<option value="Reject">Reject</option>
<option value="Accept">Accept</option>
</select>
</div>

<div align="center" style="padding:2px;"><a href="edit-student.php?id=<?=base64_encode($fetchn['id'])?>&page=<?=$_REQUEST['page']?>&cat=pending" style="color:#FF0000;"><img src="images/edit.png"></a><a href="print-student.php?id=<?=$fetchn['id']?>&act=pending" style="color:#006600;"><img src="images/print.png" /></a></div>
</td>
<td  valign="top" style="border:2px solid #FFFFFF;">
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
<tr class="class4">
<td width="10%" style="padding-left:8px;">Student Name:</td>
<td width="40%"><?=ucwords(strtolower(output($fetchn['name'])))?></td>
<td style="padding-left:8px;">Admission:</td>
<td width="35%"><?php if($fetchn['admission']){?><?=output($fetchn['admission'])?><?php }else{?><?=output($fetchn['date'])?><?php }?></td>
</tr>
<tr class="class3">
<td style="padding-left:8px;width:35%">Father's Name:</td>
<td ><?=ucwords(strtolower(output($fetchn['fname'])))?></td>
<td style="padding-left:8px;">DOB:</td>
<td width="20%"><?=output($fetchn['dob'])?></td>
</tr>
<tr class="class4">
<td width="17%" style="padding-left:8px;">Course:</td>
<td ><?=ucwords((getCourseNameByID($conn,output($fetchn['course']),'course_name')))?>(<?=ucwords((getCourseNameByID($conn,output($fetchn['course']),'code')))?>)</td>
<td style="padding-left:8px;">Address:</td>
<td colspan="3"><?=output($fetchn['address'])?></td>
</tr>
<tr class="class3">
<td width="10%" style="padding-left:8px;">Duration:</td>
<td width="40%"colspan="3"><?=getDuration($conn,$fetchn['duration'])?></td>

</tr>
<tr class="class4">
<td style="padding-left:8px;">Phone:</td>
<td colspan="3"><?=output($fetchn['phone'])?></td>

</tr>
<tr class="class3">
<td width="10%" style="padding-left:8px;">Age:</td>
<td width="40%"colspan="3"><?=output($fetchn['age'])?> Years</td>
</tr>
<tr class="class4">
<td colspan="4" align="center"><a href="student-edit.php?id=<?=$fetchn['id']?>&case=application" onClick="return confirm('Are you sure want to edit this record?');"><input type="button" name="edit" value="EDIT INFORMATION" class="button" style="background:#FF0000;color:#FFFFFF;" /></a></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<?php }}else{?>
<div width="100%" style="background:#f5f9ff; border:1px solid #d5e7f8; border-radius:12px;">
<div align="center" style="padding:14px;color:#17608f;">
<strong>No Record Found!</strong>
</div>
</div>
<?php }?>
<div align="center"><?=$pagination?></div>

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