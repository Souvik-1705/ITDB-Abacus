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

function captureCurrentDiv()
{
    var element = document.getElementById('printDiv');

    html2canvas(element, {
        useCORS: true,
        allowTaint: true,
        scale: 1
    }).then(function(canvas)
    {
        var img = canvas.toDataURL("image/png");

        $.ajax({
            type: "POST",
            url: "save.php",
            data: {
                data: img
            },
            success: function(file)
            {
                file = $.trim(file);

                if(file == "")
                {
                    alert("File was not created.");
                    return;
                }

                window.location.href =
                    "download-certificate.php?path=" +
                    encodeURIComponent(file);
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
                alert("Unable to create certificate.");
            }
        });
    });
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
    background:#ffffff !important;
    border-radius:18px !important;
    padding:10px 0 30px 0;
    box-shadow:0 5px 25px rgba(0,0,0,0.06);
}

/* Form area */

#innerDiv form
{
    font-family:"Times New Roman", Times, serif;
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

<div class="container" style="min-height:500px; border:1px solid #CCC; margin-top:20px; margin-bottom:20px; padding:70px;" align="center">
<a onClick="captureCurrentDiv()" style="cursor:pointer;"><img src="images/downloadbtn.png" width="50" height="50" title="print"/></a> &nbsp;   
<a onClick="printDivList();" style="cursor:pointer;"><img src="images/print-printer.jpg" width="50" height="50" title="print"/></a>

<div id="printDiv">
<?php
$sqls="SELECT * FROM `ab_student` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."' ORDER BY `id`";
$ress=query($conn,$sqls);
$nums=numrows($ress);
if($nums>0)
{
$fetchs=fetcharray($ress);
$ccat=getCategoryName($conn,$fetchs['coursecat']);
?>
<?php if($ccat=='VOCATIONAL COURSE'){?>
<div style="background:url(images/id1.jpg) no-repeat;height:260px;width:400px;font-family:cambria;color:#000000;">
<?php }else{?><div style="background:url(images/id2.jpg) no-repeat;height:260px;width:400px;font-family:cambria;color:#000000;"><?php }?>
<div style="height:70px; background-color:#">&nbsp;</div>
<table width="100%" style="font-size:12px; margin-top:4px">
<tr><td width="18%">&nbsp;</td>
<td width="60%" >
<div style="background-color:#; margin-top:16px; margin-left:12px; height:20px"><?=ucwords($fetchs['name'])?></div>
<div style="background-color:#;margin-left:12px; height:20px"><?=$fetchs['registration']?></div>
<div style="background-color:#;margin-left:12px; height:20px; width:100%"><?=ucwords(getCourse($conn,$fetchs['course'],'course_name'))?>(<?=ucwords(getCourse($conn,$fetchs['course'],'code'))?>)</div>
<div style="background-color:#; margin-left:12px; height:20px"><?=getDuration($conn,getCourse($conn,$fetchs['course'],'duration'),'duration')?></div>
</td>

<td style="background-color:#" width="22%" align="center"><div style="margin-top:5px; margin-right:3px;"><img src="profile/<?=$fetchs['photo']?>" width="77" height="90" /></div></td></tr>
<tr><td align="center" colspan="2"><div style="margin-top:10px"><?=$fetchs['date']?></div></td></tr>
<tr height="18"><td></td></tr>
<tr><td colspan="4" align="center" style="font-size:13px;font-weight:600"><?=stripslashes(getFranchiseName($conn,$fetchs['franchise'],'franchise'))?></td></tr>


</table>

</div>
<?php }?>
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