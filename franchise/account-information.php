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
   APPROVE STUDENT PAGE DESIGN
========================================= */

/* Search Form */
#dashright form[name="frm1"]
{
    background:#ffffff !important;
    padding:15px 18px !important;
    border-radius:14px !important;
    box-shadow:0 4px 18px rgba(0,0,0,0.06);
    margin-bottom:15px !important;
    min-height:58px;
    box-sizing:border-box;
}

#dashright form[name="frm1"] > div
{
    float:none !important;
    display:flex;
    justify-content:flex-end;
    align-items:center;
}

#dashright form[name="frm1"] input[type="text"]
{
    width:280px !important;
    max-width:100% !important;
    height:43px !important;
    padding:8px 16px !important;

    background:#fffaf9 !important;
    border:1px solid #ffd0c0 !important;
    border-radius:25px !important;

    color:#444444 !important;
    font-size:14px !important;

    outline:none;
    box-sizing:border-box;
    transition:all .25s ease;
}

#dashright form[name="frm1"] input[type="text"]:focus
{
    background:#ffffff !important;
    border-color:#ff8a65 !important;

    box-shadow:0 0 0 3px rgba(255,138,101,0.12) !important;
}

#dashright form[name="frm1"] input[type="text"]::placeholder
{
    color:#999999;
}


/* Export Excel Button */
#dashright a[href="export-approve-student-process.php"]
{
    display:inline-flex !important;
    align-items:center;
    justify-content:center;

    width:46px;
    height:46px;

    background:#ffffff;
    border:1px solid #ffd0c0;
    border-radius:50%;

    box-shadow:0 4px 12px rgba(255,105,120,0.15);

    transition:all .25s ease;
}

#dashright a[href="export-approve-student-process.php"] img
{
    width:32px !important;
    height:32px !important;
    border-radius:50% !important;
}

#dashright a[href="export-approve-student-process.php"]:hover
{
    transform:translateY(-2px) scale(1.05);

    box-shadow:
        0 7px 18px rgba(255,105,120,0.25);
}


/* Export Icon Position */
#dashright > div[style*="padding-left:330px"]
{
    padding-left:0 !important;
    margin-top:10px !important;
    margin-bottom:15px !important;
    text-align:right !important;
}


/* Student Card Outer */
#dashright > div[style*="border:1px dotted"]
{
    background:#ffffff !important;
    border:1px solid #ffe0d5 !important;
    border-radius:16px !important;

    padding:5px !important;
    margin-bottom:15px !important;

    box-shadow:0 5px 20px rgba(0,0,0,0.06);

    transition:all .25s ease;
}

#dashright > div[style*="border:1px dotted"]:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 9px 25px rgba(255,105,120,0.13);
}


/* Inner Student Area */
#innerSmall
{
    background:#ffffff !important;
    border-radius:13px !important;
    padding:10px !important;
    overflow:auto;
}


/* Student Photo */
#innerSmall img.imgborder
{
    width:100px !important;
    height:120px !important;

    object-fit:cover;

    border:3px solid #ffd0c0 !important;
    border-radius:12px !important;

    box-shadow:
        0 4px 12px rgba(0,0,0,0.08);
}


/* Edit + Print Icons */
#innerSmall img[src="images/edit.png"],
#innerSmall img[src="images/print.png"]
{
    width:30px !important;
    height:30px !important;

    margin:7px 4px 3px 4px;

    padding:5px;

    background:#fff5f1;
    border:1px solid #ffd0c0;
    border-radius:8px;

    transition:all .25s ease;
}

#innerSmall img[src="images/edit.png"]:hover,
#innerSmall img[src="images/print.png"]:hover
{
    transform:translateY(-2px);
    background:#ffe8e8;
    border-color:#ff8a65;
}


/* ID CARD Button */
#innerSmall a[href*="student-idcard.php"] > div
{
    background:linear-gradient(
        135deg,
        #ff5f9e,
        #ff7b54,
        #ff9a44
    ) !important;

    color:#ffffff !important;

    border-radius:20px !important;

    padding:7px 12px !important;

    font-size:12px;
    font-weight:bold;

    margin-top:7px;

    box-shadow:
        0 4px 12px rgba(255,105,120,0.20);

    transition:all .25s ease;
}

#innerSmall a[href*="student-idcard.php"] > div:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 7px 18px rgba(255,105,120,0.30);
}


/* Student Information Table */
#innerSmall table table
{
    width:100% !important;

    border-collapse:separate !important;
    border-spacing:0 !important;

    overflow:hidden;
    border-radius:10px;
}


/* Alternate Rows */
#innerSmall table table tr.class3
{
    background:#fff8f5 !important;
}

#innerSmall table table tr.class4
{
    background:#fff0f5 !important;
}


/* Row Hover */
#innerSmall table table tr:hover
{
    background:
        linear-gradient(
            to right,
            #fff0f5,
            #fff0e8
        ) !important;
}


/* Table Cells */
#innerSmall table table td
{
    padding:11px 8px !important;

    font-size:14px !important;
    color:#444444 !important;

    border-bottom:1px solid #ffe1d7;

    vertical-align:middle;
}


/* First Column Labels */
#innerSmall table table tr td:first-child
{
    font-weight:bold;
    color:#e85d04 !important;
}


/* Registration / Status Text */
#innerSmall table table span
{
    font-weight:bold;
}


/* Approved Registration */
#innerSmall table table span[style*="#009900"]
{
    color:#16a085 !important;
}


/* Pending */
#innerSmall table table span[style*="#FF0000"]
{
    color:#ff4f81 !important;
}


/* Edit Information Button */
#innerSmall input.button
{
    width:190px !important;
    height:42px !important;

    border:none !important;
    border-radius:24px !important;

    background:
        linear-gradient(
            135deg,
            #ff5f9e,
            #ff7b54,
            #ff9a44
        ) !important;

    color:#ffffff !important;

    font-size:12px !important;
    font-weight:bold !important;

    cursor:pointer;

    box-shadow:
        0 5px 15px rgba(255,105,120,0.22);

    transition:all .25s ease;
}

#innerSmall input.button:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(255,105,120,0.32);
}


/* No Record Found */
#dashright div[style*="color:#FF0000"][style*="background:#FFFFFF"]
{
    background:#ffffff !important;

    border-radius:14px !important;

    padding:18px !important;

    color:#e85d04 !important;

    border:1px solid #ffe0d5;

    box-shadow:
        0 5px 20px rgba(0,0,0,0.05);
}


/* Pagination */
#dashright > div[align="center"]
{
    margin-top:15px;
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

    #dashright > div[style*="padding-left:330px"]
    {
        padding-left:0 !important;
        text-align:center !important;
    }

    #dashright > div[style*="border:1px dotted"]
    {
        padding:4px !important;
    }

    #innerSmall
    {
        padding:8px !important;
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

/* =========================================
   ACCOUNTING STUDENT PAGE - BLUE THEME
========================================= */

#dashright > div[style*="width:100%"]
{
    background:#ffffff !important;
    padding:20px !important;
    border-radius:18px !important;
    box-shadow:0 5px 25px rgba(30,80,130,0.10);
}


/* =========================================
   PAGE TITLE
========================================= */

#dashright > div[style*="width:100%"] h5
{
    display:inline-block;

    margin:0 0 20px 0 !important;

    padding:10px 20px;

    color:#174a78 !important;

    font-size:19px !important;

    font-weight:bold;

    background:linear-gradient(
        135deg,
        #eaf4ff,
        #f5f9ff
    );

    border-left:5px solid #23689b;

    border-radius:8px;
}


/* =========================================
   DATE FILTER FORM
========================================= */

#dashright form
{
    background:linear-gradient(
        135deg,
        #ffffff,
        #f5f9ff,
        #eaf4ff
    );

    padding:15px 10px;

    border:1px solid #d5e7f8;

    border-radius:14px;

    margin-bottom:22px;

    box-shadow:0 3px 15px rgba(30,80,130,0.05);
}


/* Labels */

#dashright form label
{
    display:block;

    margin-bottom:7px;

    color:#405466;

    font-size:14px;

    font-weight:600;
}


/* Date inputs */

#dashright form input[type="date"]
{
    width:100% !important;

    height:43px !important;

    padding:8px 13px !important;

    background:#f8fbff !important;

    border:1px solid #c9def2 !important;

    border-radius:9px !important;

    color:#333f4d;

    font-size:14px;

    outline:none;

    box-sizing:border-box;

    transition:all .25s ease;
}


#dashright form input[type="date"]:focus
{
    border-color:#76a9d6 !important;

    box-shadow:
        0 0 0 3px rgba(116,169,214,0.12) !important;

    background:#ffffff !important;
}


/* =========================================
   SUBMIT BUTTON
========================================= */

#dashright form input[type="submit"]
{
    width:120px !important;

    height:43px !important;

    border:none !important;

    border-radius:24px !important;

    background:
        linear-gradient(
            135deg,
            #174a78,
            #23689b,
            #4d91c4
        ) !important;

    color:#ffffff !important;

    font-size:13px !important;

    font-weight:bold !important;

    cursor:pointer;

    box-shadow:
        0 5px 15px rgba(30,90,140,0.22);

    transition:all .25s ease;
	line-height:0;
}


#dashright form input[type="submit"]:hover
{
    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(30,90,140,0.32);

    background:
        linear-gradient(
            135deg,
            #0b3557,
            #174a78,
            #367cae
        ) !important;
}


/* =========================================
   ACCOUNTING TABLE
========================================= */

#dashright > div[style*="width:100%"] > table
{
    width:100% !important;

    border-collapse:separate !important;

    border-spacing:0 !important;

    border:1px solid #d5e7f8;

    border-radius:12px;

    overflow:hidden;
}


/* Table Header */

#dashright > div[style*="width:100%"] > table thead tr
{
    height:45px !important;

    background:
        linear-gradient(
            135deg,
            #174a78,
            #23689b,
            #4d91c4
        ) !important;

    color:#ffffff !important;
}


#dashright > div[style*="width:100%"] > table thead th
{
    padding:11px 8px !important;

    color:#ffffff !important;

    font-size:13px;

    font-weight:bold;

    border:none !important;
}


/* Table Rows */

#dashright > div[style*="width:100%"] > table tbody tr:nth-child(even)
{
    background:#f5f9ff !important;
}


#dashright > div[style*="width:100%"] > table tbody tr:nth-child(odd)
{
    background:#eaf4ff !important;
}


/* Row Hover */

#dashright > div[style*="width:100%"] > table tbody tr:hover
{
    background:
        linear-gradient(
            to right,
            #e4f1ff,
            #d5e9ff
        ) !important;
}


/* Table Cells */

#dashright > div[style*="width:100%"] > table tbody td
{
    padding:11px 8px !important;

    font-size:13px !important;

    color:#405466 !important;

    border-bottom:1px solid #d5e7f8;

    vertical-align:middle;
}


/* Fees */

#dashright > div[style*="width:100%"] > table tbody td:first-child
{
    color:#174a78 !important;

    font-weight:bold;
}


/* Registration */

#dashright > div[style*="width:100%"] > table tbody td:nth-child(2)
{
    color:#23689b !important;

    font-weight:bold;
}


/* Wallet */

#dashright > div[style*="width:100%"] > table tbody td:nth-child(5)
{
    color:#17608f !important;

    font-weight:600;
}


/* =========================================
   TOTAL ROW
========================================= */

#dashright > div[style*="width:100%"] > table tbody tr:last-child td
{
    background:
        linear-gradient(
            135deg,
            #eaf4ff,
            #f5f9ff
        ) !important;

    color:#174a78 !important;

    font-size:17px !important;

    font-weight:bold;

    padding:14px !important;

    border-top:2px solid #c9def2;
}


/* =========================================
   NO RECORD FOUND
========================================= */

#dashright > div[style*="width:100%"] > table tbody td[style*="color:#FF0000"]
{
    background:#f5f9ff !important;

    color:#17608f !important;

    padding:18px !important;

    font-size:14px !important;

    font-weight:bold;

    border-bottom:1px solid #d5e7f8;
}


/* =========================================
   SPACER
========================================= */

#dashright .specer
{
    height:10px;
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


    #dashright > div[style*="width:100%"]
    {
        padding:12px !important;

        border-radius:14px !important;
    }


    #dashright > div[style*="width:100%"] h5
    {
        display:block;

        text-align:center;

        font-size:17px !important;

        margin-bottom:15px !important;
    }


    #dashright form
    {
        padding:12px !important;
    }


    #dashright form .row
    {
        margin-left:0 !important;

        margin-right:0 !important;
    }


    #dashright form .col-md-4,
    #dashright form .col-md-2
    {
        width:100% !important;

        padding-left:5px !important;

        padding-right:5px !important;

        margin-bottom:10px;
    }


    #dashright form .col-md-2 > div
    {
        padding-top:5px !important;

        text-align:center;
    }


    #dashright form input[type="submit"]
    {
        width:100% !important;

        max-width:200px;
    }


    #dashright > div[style*="width:100%"] > table
    {
        display:block;

        overflow-x:auto;

        white-space:nowrap;
    }


    #dashright > div[style*="width:100%"] > table thead th,
    #dashright > div[style*="width:100%"] > table tbody td
    {
        padding:9px 7px !important;

        font-size:12px !important;
    }


    #dashright > div[style*="width:100%"] > table tbody tr:last-child td
    {
        font-size:15px !important;
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
<div style="width:100%;background:#FFFFFF;padding:10px;">
<h5 align="center" style="color:#FF0000;">Accounting Student</h5>
<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">

<div class="row">
<div class="col-md-4" >
<div style="margin:10px">
<label>From Date</label>
<input type="date" name="fdate" value="<?=$_REQUEST['fdate']?>" id="fdate" class="form-control border-primary" style="width:100%" required/>
</div>
</div>
<div class="col-md-4">
<div style="margin:10px">
<label>To Date</label>
<input type="date" name="tdate" id="tdate" class="form-control border-primary" style="width:100%" value="<?=$_REQUEST['tdate']?>" required/>
</div>
</div>
<div class="col-md-2">
<div style="padding-top:43px">
<input type="submit" value="submit" class="btn btn-primary"/>

</div>

</div>
</div>


</form>
<table width="100%" cellpadding="0" border="1" cellspacing="0">
<thead align="center">
<tr style="height:35px;background:#333333;color:#FFFFFF;">
<th>Fees</th>
<th>Registration</th>
<th>Name</th>
<th>Course</th>
<th>Wallet</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
if($_REQUEST['fdate']!='' && $_REQUEST['tdate']!=''){
$sql="SELECT * FROM `ab_student_approve` WHERE `franchise`='".mysqli_real_escape_string($conn,trim($_SESSION['fid']))."' AND `date` BETWEEN '".mysqli_real_escape_string($conn,trim($_REQUEST['fdate']))."' AND '".mysqli_real_escape_string($conn,trim($_REQUEST['tdate']))."'  ORDER BY `id` DESC";
}else{

$sql="SELECT * FROM `ab_student_approve` WHERE `franchise`='".mysqli_real_escape_string($conn,trim($_SESSION['fid']))."'  ORDER BY `id` DESC";
}
$res=query($conn,$sql);
$num=numrows($res);
$i=1;
if($num>0)
{
$total=0;
while($fetch=fetcharray($res))
{
?>
<tr class="<?=$class?>">
<td align="center">Rs.<?=$fetch['amount']?></td>
<td align="center"><?=strtoupper($fetch['registration'])?></td>
<td align="center" style="line-height:15px;"><?=getStudentDetails($conn,$fetch['registration'],'name')?></td>
<td align="center" style="line-height:15px;"><?=getCourse($conn,$fetch['course'],'course_name')?> (<?=getCourse($conn,$fetch['course'],'code')?>)</td>
<td align="center" style="line-height:15px;">
<?php if($fetch['wallet']=='Main'){?>Main Balance<?php }?>

</td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr>
<td uk-width-1-4 uk-text-left colspan="6" align="center" style="color:#FF0000;">No Record Found!</td>
</tr>
<?php }?>
<?php if($_REQUEST['fdate']!='' && $_REQUEST['tdate']!=''){?>
<tr>
<td colspan="6" style="font-family:'Times New Roman', Times, serif;font-size:18px">Total&nbsp;&nbsp;Rs.<?=getFranchiseTotalPaymentInformationRequestDate($conn,$_REQUEST['fdate'],$_REQUEST['tdate'],$_SESSION['fid'])?></td>
</tr>
<?php }else{ ?>
<tr>
<td colspan="6" style="font-family:Arial, Helvetica, sans-serif !important; font-size:18px">Total&nbsp;&nbsp;Rs. <?=getFranchiseTotalInformation($conn,$_SESSION['fid'])?></td>
</tr>
<?php } ?>

</tbody>
</table>
<div align="center">&nbsp;</div>
<div align="center">&nbsp;</div>
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