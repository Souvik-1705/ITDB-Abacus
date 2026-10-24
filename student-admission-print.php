<?php include('administrator/includes/function.php'); ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?=$title?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!-- CSS here -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/dripicons.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- ================= KIDS FONT ================= -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<script type="text/javascript" src="js/ajax.js"></script>
<script>
function getDistrict(id) {
xmlhttp.open('GET','get-district.php?stateid='+id);
xmlhttp.onreadystatechange=getStateRequest;
xmlhttp.send();
}
function getStateRequest() {
if(xmlhttp.readyState==4 && xmlhttp.status==200) {
var response=xmlhttp.responseText;
document.getElementById('distDiv').innerHTML=response;
}
}
function printDivList() {
window.print();
}
</script>

<style>
/* =========================================
MAIN REGISTRATION & ANIMATIONS
========================================= */
.kids-registration-section {
position: relative;
overflow: hidden;
padding: 60px 0;
background: linear-gradient(135deg, #fffaf1 0%, #f5fbff 50%, #fff6fb 100%);
}

.kids-shape {
position: absolute;
font-family: "Baloo 2", cursive;
pointer-events: none;
z-index: 1;
animation: floatingKids 4s ease-in-out infinite, zoomKids 2.5s ease-in-out infinite;
}

@keyframes floatingKids {
0%, 100% { transform: translateY(0) rotate(0deg); }
50% { transform: translateY(-18px) rotate(8deg); }
}

@keyframes zoomKids {
0%, 100% { scale: 0.75; opacity: 0.65; }
50% { scale: 1.25; opacity: 1; }
}

/* Shape Positions */
.shape-one { top: 5%; left: 4%; font-size: 42px; color: #ffb703; }
.shape-two { top: 12%; right: 5%; font-size: 48px; color: #ff6b9a; animation-delay: .5s; }
.shape-three { top: 35%; left: 2%; font-size: 25px; color: #4cc9f0; animation-delay: 1s; }
.shape-four { top: 42%; right: 3%; font-size: 43px; color: #ff7b54; animation-delay: 1.5s; }
.shape-five { top: 22%; left: 12%; font-size: 22px; color: #ff6b6b; animation-delay: .8s; }
.shape-six { top: 27%; right: 13%; font-size: 30px; color: #ffb703; animation-delay: 1.2s; }
.shape-seven { top: 55%; left: 7%; font-size: 32px; color: #ff6b9a; animation-delay: 1.8s; }
.shape-eight { top: 62%; right: 9%; font-size: 20px; color: #4cc9f0; animation-delay: 2s; }

/* Responsive Container & Print Container Box */
.print-outer-container {
background: #ffffff;
border-radius: 20px;
box-shadow: 0 15px 40px rgba(38, 70, 83, 0.1);
padding: 25px 15px;
margin: 20px auto;
max-width: 900px;
width: 100%;
}

/* Print Container & Form Table Styling */
.print-box-wrapper {
width: 100%;
border: 1px solid #ddd;
border-radius: 12px;
padding: 20px;
background: #fff;
margin: 0 auto;
}

.application-header-img {
max-width: 100%;
height: auto;
}

.app-table {
width: 100%;
border-collapse: collapse;
margin-top: 15px;
}

.app-table tr {
border-bottom: 1px dashed #eee;
}

.app-table td {
padding: 10px 8px;
font-size: 14px;
vertical-align: top;
}

.app-table td.label-col {
width: 35%;
font-weight: 700;
color: #333;
}

.app-table td.value-col {
width: 65%;
color: #555;
}

/* Print Button */
.print-btn-wrap {
text-align: center;
margin-bottom: 20px;
}

.print-btn-wrap img {
cursor: pointer;
transition: transform 0.2s ease;
}

.print-btn-wrap img:hover {
transform: scale(1.1);
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
.kids-shape { display: none; }
.print-outer-container { padding: 15px 10px; }
.print-box-wrapper { padding: 10px; }

.app-table td {
display: block;
width: 100% !important;
padding: 4px 0;
}

.app-table td.label-col {
padding-top: 10px;
color: #ff8c42;
}

.app-table tr {
display: block;
padding-bottom: 8px;
}
}

/* Print Media Styles */
@media print {

@page {
size: A4;
margin: 10mm;
}

/* Hide only things that should not be printed */
header,
footer,
.breadcrumb-area,
.print-btn-wrap,
.print-title,
.kids-shape {
display: none !important;
}

html,
body {
margin: 0 !important;
padding: 0 !important;
width: 100% !important;
background: #fff !important;
}

main {
margin: 0 !important;
padding: 0 !important;
}

.kids-registration-section {
padding: 0 !important;
margin: 0 !important;
background: #fff !important;
overflow: visible !important;
}

.kids-registration-section > .container {
width: 100% !important;
max-width: none !important;
padding: 0 !important;
margin: 0 !important;
}

.print-outer-container {
width: 100% !important;
max-width: none !important;
padding: 0 !important;
margin: 0 !important;
background: #fff !important;
border: none !important;
box-shadow: none !important;
}

#printDiv {
display: block !important;
position: relative !important;

width: 100% !important;
max-width: none !important;

margin: 0 !important;
padding: 10mm !important;

border: none !important;
border-radius: 0 !important;
box-shadow: none !important;

background: #fff !important;
}

.application-header-img {
display: block !important;
max-width: 100% !important;
height: auto !important;
margin: 0 auto !important;
}

.app-table {
width: 100% !important;
border-collapse: collapse !important;
}

.app-table tr {
display: table-row !important;
page-break-inside: avoid !important;
}

.app-table td {
display: table-cell !important;
padding: 8px !important;
font-size: 12px !important;
color: #000 !important;
vertical-align: top !important;
}

.app-table td.label-col {
width: 35% !important;
font-weight: 700 !important;
}

.app-table td.value-col {
width: 65% !important;
}
}
@media print {
.print-title,
.print-btn-wrap {
display: none !important;
}
}
</style>
</head>

<body>
<?php include('header.php')?>

<main>
<!-- ================= BREADCRUMB ================= -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Franchise Registration</h2>
<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Franchise Registration</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- ================= REGISTRATION SECTION ================= -->
<section class="kids-registration-section">

<!-- Decorative Shapes -->
<div class="kids-shape shape-one">★</div>
<div class="kids-shape shape-two">✦</div>
<div class="kids-shape shape-three">●</div>
<div class="kids-shape shape-four">♥</div>
<div class="kids-shape shape-five">★</div>
<div class="kids-shape shape-six">✦</div>
<div class="kids-shape shape-seven">♥</div>
<div class="kids-shape shape-eight">●</div>

<div class="container">
<div class="print-outer-container">
<div class="print-title text-center mb-3">
<h3 class="heading-agileinfo">
<span>TAKE A PRINT OUT</span>
</h3>
</div>

<div class="print-btn-wrap">
<a onClick="printDivList();" style="cursor:pointer;">
<img src="images/print-printer.jpg" width="50" height="50" title="Click to print" alt="Print"/>
</a>
</div>

<div id="printDiv">

<?php 
$sql="SELECT * FROM `ab_student_application`  ORDER BY `id` DESC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<div class="text-center mb-3"> 
    <img src="images/headerlogo.png" class="application-header-img" alt="Logo"> 

    <p class="mt-2 mb-1" style="font-size: 13px; line-height: 1.5;"> 
        <?=getContact($conn,'office')?><br />
        <?=getContact($conn,'addline1')?><br />
        <?=getContact($conn,'addline2')?><br />
        Phone: <?=getContact($conn,'phone1')?> 
        <?php if(getContact($conn,'phone2')) { ?>
        &nbsp; / &nbsp; <?=getContact($conn,'phone2')?>
        <?php } ?>
    </p> 

    <h4 class="mt-3" style="font-weight: 800; text-transform: uppercase;">
        Application Form
    </h4> 
</div>
<table width="80%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr><td colspan="2">&nbsp;</td></tr>
<tr height="20"><td colspan="2"><div align="center" style="font-size:16px;"></div></td></tr>
</table>
<table align="center" width="80%">
<tr height="20">
<td width="30;"><strong style="font-size:13px;align:center">State:</strong></td><td style="font-size:13px;">&nbsp;<?=getState($conn,$fetch['state'],'state')?></td></tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">District:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=getDistrict($conn,$fetch['district'],'district')?></td><td></td>
</tr>

<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Study Centre:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=getFranchiseName($conn,$fetch['franchise'],'franchise')?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Course Category:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['category']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Course:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=getCourseNameByID($conn,$fetch['course'])?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Duration:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=getDuration($conn,$fetch['duration'],'duration')?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Student Name:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['name']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Father's Name:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['fname']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Mother's Name:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['mname']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Date of Birth:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['dob']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Gender:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['gender']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Mobile No.:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['phone']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Address:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['address']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Pin No.:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['pincode']?></td><td></td>
</tr>
<tr height="20"><td width="30%"><div><strong style="font-size:13px;">Date:</strong></div></td><td width="70%" style="font-size:13px;">&nbsp;<?=$fetch['date']?></td><td></td>
</tr>
</table>
<div>&nbsp;</div>
<?php }?>
</div>
</div>
</div>
</section>
</main>

<?php include('footer.php')?>

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