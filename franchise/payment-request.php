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
   MODERN STUDENT ADMISSION FORM
========================================= */

#innerDiv
{
    background:#ffffff !important;
    border-radius:18px !important;
    padding:10px 0 30px 0;
    box-shadow:0 5px 25px rgba(0,0,0,0.06);
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
    color:#444444;
    margin-bottom:7px;
}

/* Required star */

#innerDiv form label span
{
    color:#ff4f81 !important;
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

    background:#fffaf9 !important;
    border:1px solid #ffd2c2 !important;
    border-radius:9px !important;

    color:#444444;
    font-size:14px;

    outline:none;

    transition:all .25s ease;
    box-sizing:border-box;
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
    background:#fff !important;

    box-shadow:
        0 0 0 3px rgba(255,138,101,0.12);

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

    color:#e85d04 !important;

    background:linear-gradient(
        135deg,
        #fff0f3,
        #fff3e8
    );

    border-left:5px solid #ff7b54;
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
        #ff6b9a,
        #ff8a00
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

    height:42px !important;

    padding:7px 10px;

    background:#fff8f6;

    border:1px dashed #ffb08f;
    border-radius:9px;

    color:#555;

    font-size:13px;

    box-sizing:border-box;
}

/* File hover */

#innerDiv form input[type="file"]:hover
{
    background:#fff2ed;
    border-color:#ff7b54;
}

/* File size text */

#innerDiv form input[type="file"] + span
{
    display:block;
    margin-top:5px;

    color:#e85d04 !important;
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
        #ff5f9e,
        #ff7b54,
        #ff9a44
    ) !important;

    color:#ffffff !important;

    font-size:14px !important;
    font-weight:bold !important;
    letter-spacing:.5px;

    cursor:pointer;

    box-shadow:
        0 6px 16px rgba(255,105,120,0.25);

    transition:all .25s ease;
}

/* Button hover */

#innerDiv form input[type="submit"]:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 9px 22px rgba(255,105,120,0.35);

    background:linear-gradient(
        135deg,
        #ff478c,
        #ff7043,
        #ff8c28
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
    background:#fffaf8 !important;
    border:1px solid #ffd0c0 !important;
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
    background:linear-gradient(135deg,#ff6b9a,#ff8a65);
    color:#ffffff;
    font-size:13px;
    font-weight:bold;
    cursor:pointer;
    transition:all .25s ease;
}

#innerDiv form input[type="file"]::file-selector-button:hover
{
    background:linear-gradient(135deg,#ff478c,#ff7043);
}

#innerDiv form input[type="file"]:hover
{
    border-color:#ff9a7a !important;
    background:#fff5f1 !important;
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
    #innerDiv
    {
        padding:5px 10px 25px 10px;
    }

    #innerDiv form .col-md-4,
    #innerDiv form .col-md-5,
    #innerDiv form .col-md-6,
    #innerDiv form .col-md-8,
    #innerDiv form .col-md-10
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
   PAYMENT REQUEST PAGE - BLUE THEME
========================================= */

#dashright > div[style*="background:#FFFFFF"]
{
    background:#ffffff !important;
    padding:20px !important;
    border-radius:18px !important;
    box-shadow:0 5px 25px rgba(30,80,130,0.10);
}


/* Page heading */

#dashright > div[style*="background:#FFFFFF"] h4
{
    display:inline-block;
    margin:0 0 20px 0 !important;
    padding:10px 18px !important;
    font-size:19px !important;
    font-weight:bold !important;
    color:#174a78 !important;
    background:linear-gradient(135deg,#eaf4ff,#f5f9ff) !important;
    border-left:5px solid #23689b;
    border-radius:8px;
    box-sizing:border-box;
}


/* Success Message */

#dashright > div[style*="background:#FFFFFF"] p[style*="009900"]
{
    background:#eaf6ff !important;
    border:1px solid #b9dcf5 !important;
    color:#17608f !important;
    padding:10px 15px !important;
    border-radius:9px;
    font-size:13px;
    font-weight:bold;
}


/* Error Message */

#dashright > div[style*="background:#FFFFFF"] p[style*="FF0000"]
{
    background:#fff1f1 !important;
    border:1px solid #f0bcbc !important;
    color:#c0392b !important;
    padding:10px 15px !important;
    border-radius:9px;
    font-size:13px;
    font-weight:bold;
}


/* =========================================
   PAYMENT REQUEST FORM
========================================= */

#dashright form[name="frm1"]
{
    background:linear-gradient(135deg,#ffffff,#f5f9ff,#eaf4ff);
    padding:20px;
    border:1px solid #d5e7f8;
    border-radius:15px;
    box-shadow:0 4px 18px rgba(30,80,130,0.08);
    margin-bottom:25px;
}


/* Form table */

#dashright form[name="frm1"] > table
{
    width:80% !important;
    max-width:850px;
    border-collapse:separate;
    border-spacing:0 10px;
}


/* Labels */

#dashright form[name="frm1"] td:first-child
{
    color:#405466;
    font-size:14px;
    font-weight:600;
    padding:8px 15px 8px 5px;
    vertical-align:middle;
}


/* Required star */

#dashright form[name="frm1"] td:first-child span
{
    color:#d9534f !important;
    font-weight:bold;
}


/* Inputs */

#dashright form[name="frm1"] input[type="text"],
#dashright form[name="frm1"] input[type="number"],
#dashright form[name="frm1"] input[type="date"],
#dashright form[name="frm1"] select,
#dashright form[name="frm1"] textarea
{
    width:100% !important;
    max-width:100% !important;
    box-sizing:border-box;
    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:9px !important;
    color:#333f4d;
    font-size:14px;
    outline:none;
    transition:all .25s ease;
}


/* Text / Number / Date */

#dashright form[name="frm1"] input[type="text"],
#dashright form[name="frm1"] input[type="number"],
#dashright form[name="frm1"] input[type="date"]
{
    height:43px !important;
    padding:8px 13px !important;
}


/* Select */

#dashright form[name="frm1"] select
{
    height:43px !important;
    padding:8px 13px !important;
    cursor:pointer;
}


/* Remarks */

#dashright form[name="frm1"] textarea
{
    min-height:90px !important;
    padding:10px 13px !important;
    resize:vertical;
}


/* Focus */

#dashright form[name="frm1"] input[type="text"]:focus,
#dashright form[name="frm1"] input[type="number"]:focus,
#dashright form[name="frm1"] input[type="date"]:focus,
#dashright form[name="frm1"] select:focus,
#dashright form[name="frm1"] textarea:focus
{
    background:#ffffff !important;
    border-color:#76a9d6 !important;
    box-shadow:0 0 0 3px rgba(116,169,214,0.12) !important;
    outline:none;
}


/* Placeholder */

#dashright form[name="frm1"] input::placeholder,
#dashright form[name="frm1"] textarea::placeholder
{
    color:#999999 !important;
    opacity:1 !important;
}


/* =========================================
   FILE UPLOAD
========================================= */

#dashright form[name="frm1"] input[type="file"]
{
    width:100% !important;
    max-width:100% !important;
    height:46px !important;
    padding:5px !important;
    background:#f8fbff !important;
    border:1px solid #c9def2 !important;
    border-radius:10px !important;
    color:#405466;
    font-size:13px;
    box-sizing:border-box;
    cursor:pointer;
}


#dashright form[name="frm1"] input[type="file"]::file-selector-button
{
    height:36px;
    padding:0 16px;
    margin-right:10px;
    border:none;
    border-radius:7px;
    background:linear-gradient(135deg,#174a78,#23689b,#4d91c4);
    color:#ffffff;
    font-size:13px;
    font-weight:bold;
    cursor:pointer;
    transition:all .25s ease;
}


#dashright form[name="frm1"] input[type="file"]::file-selector-button:hover
{
    background:linear-gradient(135deg,#0b3557,#174a78,#367cae);
}


#dashright form[name="frm1"] input[type="file"]:hover
{
    border-color:#76a9d6 !important;
    background:#f5f9ff !important;
}


/* File information */

#dashright form[name="frm1"] input[type="file"] + span
{
    display:block;
    margin-top:5px;
    color:#17608f !important;
    font-size:12px;
    font-weight:600;
}


/* =========================================
   SEND BUTTON
========================================= */

#dashright form[name="frm1"] input[type="submit"]
{
    width:150px !important;
    height:45px !important;
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


#dashright form[name="frm1"] input[type="submit"]:hover
{
    transform:translateY(-2px);
    box-shadow:0 9px 22px rgba(30,90,140,0.35);
    background:linear-gradient(135deg,#0b3557,#174a78,#367cae) !important;
}


/* =========================================
   REQUEST HISTORY TABLE
========================================= */

#dashright > div[style*="background:#FFFFFF"] > table
{
    width:100% !important;
    border-collapse:separate !important;
    border-spacing:0;
    overflow:hidden;
    border:1px solid #d5e7f8;
    border-radius:12px;
}


/* Table heading */

#dashright > div[style*="background:#FFFFFF"] > table thead tr
{
    height:45px !important;
    background:linear-gradient(135deg,#174a78,#23689b,#4d91c4) !important;
    color:#ffffff !important;
}


#dashright > div[style*="background:#FFFFFF"] > table thead th
{
    padding:10px 8px !important;
    color:#ffffff !important;
    font-size:13px;
    font-weight:bold;
    border:none !important;
}


/* Alternate rows */

#dashright > div[style*="background:#FFFFFF"] > table tbody tr.class6
{
    background:#f5f9ff !important;
}


#dashright > div[style*="background:#FFFFFF"] > table tbody tr.class7
{
    background:#eaf4ff !important;
}


/* Hover */

#dashright > div[style*="background:#FFFFFF"] > table tbody tr:hover
{
    background:linear-gradient(to right,#e4f1ff,#d5e9ff) !important;
}


/* Table cells */

#dashright > div[style*="background:#FFFFFF"] > table tbody td
{
    padding:11px 8px !important;
    color:#405466 !important;
    font-size:13px;
    border-bottom:1px solid #d5e7f8;
    vertical-align:middle;
}


/* Serial number */

#dashright > div[style*="background:#FFFFFF"] > table tbody td:first-child
{
    color:#164e78 !important;
    font-weight:bold;
}


/* Approved */

#dashright > div[style*="background:#FFFFFF"] > table tbody span[style*="009900"]
{
    display:inline-block;
    padding:5px 12px;
    border-radius:20px;
    background:#eaf6ff;
    border:1px solid #b9dcf5;
    color:#17608f !important;
    font-size:12px;
    font-weight:bold;
}


/* Pending */

#dashright > div[style*="background:#FFFFFF"] > table tbody span[style*="FF0000"]
{
    display:inline-block;
    padding:5px 12px;
    border-radius:20px;
    background:#eaf6ff;
    border:1px solid #b9dcf5;
    color:#17608f !important;
    font-size:12px;
    font-weight:bold;
}


/* =========================================
   NO RECORD FOUND
========================================= */

#dashright > div[style*="background:#FFFFFF"] > table tbody td[style*="color:#FF0000"]
{
    color:#17608f !important;
    background:#f5f9ff;
    padding:18px !important;
    font-weight:bold;
    font-size:14px;
}


/* =========================================
   MOBILE
========================================= */

@media(max-width:767px)
{
    #dashright
    {
        padding:12px !important;
        border-radius:12px !important;
    }

    #dashright > div[style*="background:#FFFFFF"]
    {
        padding:12px !important;
    }

    #dashright > div[style*="background:#FFFFFF"] h4
    {
        display:block;
        font-size:17px !important;
        margin-bottom:15px !important;
    }

    #dashright form[name="frm1"]
    {
        padding:12px !important;
    }

    #dashright form[name="frm1"] > table
    {
        width:100% !important;
        display:block;
    }

    #dashright form[name="frm1"] > table tbody,
    #dashright form[name="frm1"] > table tr
    {
        display:block;
        width:100%;
    }

    #dashright form[name="frm1"] > table tr
    {
        margin-bottom:12px;
        height:auto !important;
    }

    #dashright form[name="frm1"] > table td
    {
        display:block;
        width:100% !important;
        box-sizing:border-box;
        padding:4px 0 !important;
        text-align:left !important;
    }

    #dashright form[name="frm1"] input[type="submit"]
    {
        width:100% !important;
        max-width:220px;
    }

    #dashright > div[style*="background:#FFFFFF"] > table
    {
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

    #dashright > div[style*="background:#FFFFFF"] > table thead th,
    #dashright > div[style*="background:#FFFFFF"] > table tbody td
    {
        padding:9px 7px !important;
        font-size:12px !important;
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
<?php include('inner-header.php');?>
<div style="background:#FFFFFF;padding:10px;border-radius:10px;">
<h4 style="color:#FF0000;font-weight:normal;padding-left:10px; margin-bottom:7px;">Send your request to Administrator</h4>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#009900;">Your request successfully sent to Administrator!</p><?php }?>
<?php if($_REQUEST['m']==2){?><p align="center" style="color:#FF0000;">Upload file format does not support! File format: .png, .jpg, .jpeg, .gif</p><?php }?>
<?php if($_REQUEST['m']==3){?><p align="center" style="color:#FF0000;">Opps! Something wrong please contact support team!</p><?php }?>
<form name="frm1" method="post" action="payment-request-process.php" enctype="multipart/form-data">
<table width="70%" align="center" cellpadding="0" cellspacing="0" border="0">

<tr height="40"><td>Bank Name<span style="color:#FF0000;">*</span></td><td><input type="text" name="bankname" id="bankname" required class="inputbox" placeholder="Enter Bank Name" style="width:290px;border-radius:5px;" /></td></tr>
<tr height="40"><td>Transfer<span style="color:#FF0000;">*</span></td><td>
<select name="transfer" id="transfer" required style="width:290px; height:34px;border-radius:10px;">
<option>Select Transfer</option>
<option value="Online Banking">Online Banking</option>
<option value="NEFT">NEFT</option>
<option value="RTGS">RTGS</option>
</select>
</td></tr>

<tr height="40"><td>Request Amount<span style="color:#FF0000;">*</span></td><td><input type="number" name="amount" id="amount" required class="inputbox" placeholder="Enter Amount." style="width:290px;border-radius:5px;" /></td></tr>

<tr height="40"><td>Payment Date<span style="color:#FF0000;">*</span></td><td><input type="date" name="paydate" id="paydate" required class="inputbox" placeholder="Enter Payment Date" style="width:290px;border-radius:5px;" />
<script>
$(function() {
$( "#paydate" ).datepicker({
changeMonth: true,
changeYear: true
});
});
</script>
</td></tr>
<tr height="40"><td>Remarks<span style="color:#FF0000;">*</span></td><td><textarea name="remarks" id="remarks" class="areabox" required placeholder="Enter your remarks" style="width:290px;border-radius:5px;" ></textarea></td></tr>
<tr height="40"><td>Receipt Upload<span style="color:#FF0000;">*</span></td><td><input type="file" name="photo" id="photo" required accept=".png,.jpg,.jpeg,.pjp" /> <span style="color:#FF0000;">Only image accepted!</span></td></tr>
<tr height="14"><td colspan="2"></td></tr>
<tr><td></td><td><input type="submit"  name="submit" value="SEND" class="button_example" style="width:90px;" /></td></tr>
</table>
</form>
<p>&nbsp;</p>
<div class="specer">&nbsp;</div>
<table width="100%" cellpadding="0" border="1px" cellspacing="0">
<thead align="center">
<tr style="height:35px;background:#333333;color:#FFFFFF;">
<th>Sl_No</th>
<th>Bank</th>
<th>Transfer</th>
<th>Amount</th>
<th>Remarks</th>
<th>Status</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$sql="SELECT * FROM `ab_payment_request` WHERE `franchise`='".mysqli_real_escape_string($conn,trim(input($_SESSION['fid'])))."' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
$i=1;
if($num>0)
{
$total=0;
while($fetch=fetcharray($res))
{
$balance=($fetch['credit']-$fetch['debit']);
$total=$total+$balance;
if($i%2==0){$class='class6';}else{$class='class7';}
?>
<tr class="<?=$class?>">
<td align="center"><?=$i?></td>
<td align="center"><?=output($fetch['bankname'])?></td>
<td align="center"><?=output($fetch['transfer'])?></td>
<td align="center"><?=output($fetch['amount'])?></td>
<td align="center"><?=output($fetch['remarks'])?></td>
<td align="center"><?php if($fetch['status']=='A'){?><span style="color:#009900;">Approved</span><?php }else{ ?><span style="color:#FF0000;">Pending</span><?php } ?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>

<tr>
<tr height="5"><td colspan="7" align="center"></td></tr>
<td uk-width-1-4 uk-text-left colspan="7" align="center" style="color:#FF0000;"> NO RECORD FOUND! </td>
</tr>
<?php }?>
</tbody>
</table>
<div class="specer">&nbsp;</div>

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