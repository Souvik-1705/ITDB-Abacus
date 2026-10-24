<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('../index.php');
}
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
   MODERN STUDY CENTRE INFORMATION
========================================= */

#dashright
{
    font-family:Arial, Helvetica, sans-serif !important;
}

/* White Information Box */
#dashright > div
{
    background:#ffffff !important;
    border-radius:18px !important;
    padding:15px !important;
    box-shadow:0 5px 25px rgba(0,0,0,0.06);
}

/* Information Table */
#dashright table
{
    width:100% !important;
    border-collapse:separate;
    border-spacing:0;
    overflow:hidden;
    border-radius:12px;
}

/* All Rows */
#dashright table tr
{
    transition:all .25s ease;
}

/* Blue Theme Rows */
#dashright table tr.class3
{
    background:#f5f9ff !important;
}

#dashright table tr.class4
{
    background:#eaf4ff !important;
}

/* Table Cells */
#dashright table td
{
    padding:13px 12px !important;
    font-size:15px;
    color:#444444;
    border-bottom:1px solid #d5e7f8;
    vertical-align:middle;
}

/* Left Label */
#dashright table tr td:first-child 
{
    width:25% !important;
    font-weight:bold;
    color:#164e78 !important;
    padding-left:15px !important;
}

/* Right Value */
#dashright table tr td:nth-child(2)
{
    color:#555555;
    font-weight:500;
}

/* Hover */
#dashright table tr:hover 
{
    background:linear-gradient(to right,#e4f1ff,#d5e9ff) !important;
    transform:translateX(2px);
}

#dashright table tr:hover td:first-child
{
    color:#0b3d66 !important;
}
/* First Row */
#dashright table tr:first-child td:first-child
{
    border-top-left-radius:12px;
}

#dashright table tr:first-child td:last-child
{
    border-top-right-radius:12px;
}

/* Last Row */
#dashright table tr:last-child td
{
    border-bottom:none;
}

#dashright table tr:last-child td:first-child
{
    border-bottom-left-radius:12px;
}

#dashright table tr:last-child td:last-child
{
    border-bottom-right-radius:12px;
}

/* Mobile */
@media(max-width:767px)
{
    #dashright
    {
        padding:10px !important;
    }

    #dashright > div
    {
        padding:8px !important;
    }

    #dashright table td
    {
        padding:11px 8px !important;
        font-size:14px;
    }

    #dashright table tr td:first-child
    {
        width:38% !important;
        padding-left:10px !important;
    }

    #dashright table tr td:nth-child(2)
    {
        width:62% !important;
        word-break:break-word;
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

<section style="padding:30px 0; background:#fff;">
<div class="container">
<div class="row">
<?php include('aside.php'); ?>

<div class="col-md-9" id="dashright" style="padding:20px; background-image:radial-gradient(circle, #ffffff, #f5f9ff, #eaf4ff, #e4f1ff); border-radius:16px;">

<?php include('inner-header.php'); ?>

<div style="background:#FFFFFF;padding:10px;border-radius:10px;">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr class="class3"><td width="15%" style="padding-left:10px;">Study Centre</td>
<td width="85%">|&nbsp;<?=stripslashes(getFranchiseName($conn,$_SESSION['fid'],'franchise'))?></td>
</tr>
<tr class="class4"><td style="padding-left:10px;">Centre ID</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'code')?></td></tr>
<tr class="class3"><td style="padding-left:10px;">Director </td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'pname')?></td></tr>
<tr class="class4"><td style="padding-left:10px;">Phone No.</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'insphone1')?></td></tr>
<tr class="class3"><td style="padding-left:10px;">Email</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'insemail')?></td></tr>
<tr class="class4"><td style="padding-left:10px;">State</td><td>|&nbsp;<?=getStateName($conn,getFranchiseName($conn,$_SESSION['fid'],'state'),'state')?></td></tr>
<tr class="class3"><td style="padding-left:10px;">District</td><td>|&nbsp;<?php if(getDistrict($conn,getFranchiseName($conn,$_SESSION['fid'],'district'),'district')){?><?=getDistrict($conn,getFranchiseName($conn,$_SESSION['fid'],'district'),'district')?><?php }else{?>----<?php }?></td></tr>
<tr class="class4"><td style="padding-left:10px;">City</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'city')?></td></tr>
<tr class="class3"><td style="padding-left:10px;">Address</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'insaddress')?></td></tr>
<tr class="class4"><td style="padding-left:10px;">Pin Code</td><td>|&nbsp;<?=getFranchiseName($conn,$_SESSION['fid'],'inspin')?></td></tr>
<tr class="class3"><td style="padding-left:10px;">Member Since</td><td>|&nbsp;<?=date('d F Y',strtotime(getFranchiseName($conn,$_SESSION['fid'],'date')))?></td></tr>
</table>
</div>

</div>

</div>
</section>

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