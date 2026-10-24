<?php include('../administrator/includes/function.php'); 
session_start();
if(!isset($_SESSION['fid']))
{
redirect('../index.php');
}
checkFranchiseStatus($conn);

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
/*function printDivList() {
window.print();
}*/
</script>

<script>
function printDivList()
{
var divToPrint=document.getElementById('printDiv');

var newWin=window.open('','Print-Window','width=980,height=1000');

newWin.document.open();

newWin.document.write(`
<html>
<head>

<title>ITDB Abacus - Application Form</title>

<link rel="stylesheet" href="css/bootstrap.min.css">

<style>

@page
{
size:A4;
margin:10mm;
}

html,body
{
margin:0;
padding:0;
width:100%;
background:#fff;
}

body
{
font-family:Arial, sans-serif;
color:#000;
}

#printDiv
{
width:100%;
margin:0;
padding:10mm;
box-sizing:border-box;
background:#fff;
}

.application-header-img
{
display:block;
max-width:100%;
height:auto;
margin:0 auto;
}

table
{
width:80%;
border-collapse:collapse;
margin-left:auto;
margin-right:auto;
}

table td
{
padding:5px 8px;
font-size:13px;
vertical-align:top;
}

table td:first-child
{
width:30%;
font-weight:700;
}

table td:nth-child(2)
{
width:70%;
}

@media print
{
html,body
{
width:100%;
margin:0;
padding:0;
}

#printDiv
{
width:100%;
padding:0;
}
}

</style>

</head>

<body onload="window.print();">

<div id="printDiv">
${divToPrint.innerHTML}
</div>

</body>
</html>
`);

newWin.document.close();
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
@media (max-width: 767px)
{
    .kids-shape
    {
        display:none;
    }

    .print-outer-container
    {
        width:100% !important;
        max-width:100% !important;
        padding:10px !important;
        box-sizing:border-box !important;
    }

    .print-box-wrapper
    {
        width:100% !important;
        max-width:100% !important;
        padding:8px !important;
        box-sizing:border-box !important;
    }

    #printDiv
    {
        width:100% !important;
        max-width:100% !important;
        overflow-x:hidden !important;
        box-sizing:border-box !important;
    }

    #printDiv table
    {
        width:100% !important;
        max-width:100% !important;
        table-layout:fixed !important;
        box-sizing:border-box !important;
    }

    #printDiv table td
    {
        box-sizing:border-box !important;
        word-break:break-word !important;
        overflow-wrap:break-word !important;
    }

    /* Application Header Logo */

    #printDiv .application-header-img
    {
        display:block !important;
        width:100% !important;
        max-width:100% !important;
        height:auto !important;
        object-fit:contain !important;
        margin:0 auto !important;
    }

    /* Student Photo */

    #printDiv img[src*="profile/"]
    {
        display:block !important;
        width:100px !important;
        height:125px !important;
        max-width:100% !important;
        object-fit:cover !important;
        margin:0 auto !important;
    }

    /* Heading inside tables */

    #printDiv table h2
    {
        font-size:12px !important;
        line-height:17px !important;
        word-break:break-word !important;
        overflow-wrap:break-word !important;
        margin:0 !important;
        padding:3px !important;
    }

    /* Table text */

    #printDiv table td
    {
        font-size:12px !important;
        padding:5px 4px !important;
        line-height:17px !important;
        vertical-align:middle !important;
    }

    /* First office-use table */

    #printDiv table:first-of-type td:first-child
    {
        width:33% !important;
    }

    #printDiv table:first-of-type td:nth-child(2)
    {
        width:49% !important;
    }

    #printDiv table:first-of-type td:last-child
    {
        width:18% !important;
    }

    /* Applicant details table */

    #printDiv table:nth-of-type(2) td:first-child
    {
        width:11% !important;
    }

    #printDiv table:nth-of-type(2) td:nth-child(2)
    {
        width:31% !important;
    }

    #printDiv table:nth-of-type(2) td:nth-child(3)
    {
        width:58% !important;
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
<li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
<div class="row" style="display:flex; flex-wrap:wrap; align-items:flex-start;">
<?php include('aside.php')?>
<div class="col-md-9" id="dashright">
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
//$sql="SELECT * FROM `ab_student_application`  ORDER BY `id` DESC ";
//$res=query($conn,$sql);
//$num=numrows($res);
//if($num>0)
//{
//$fetch=fetcharray($res);
if($_REQUEST['act']=='pending')
{?>
?>
<div class="text-center mb-3"> 
    <img src="images/headerlogo.png" class="application-header-img" alt="Logo"> 

    <p class="mt-2 mb-1" style="font-size: 13px; line-height: 1.5;"> 
        <?=getContact($conn,'office')?><br />
        Address-1:<?=getContact($conn,'addline1')?><br />
        Address-2:<?=getContact($conn,'addline2')?><br />
        Phone: <?=getContact($conn,'phone1')?> 
        <?php if(getContact($conn,'phone2')) { ?>
        &nbsp; / &nbsp; <?=getContact($conn,'phone2')?>
        <?php } ?>
    </p> 

    <h4 class="mt-3" style="font-weight: 800; text-transform: uppercase;">
        Application Form
    </h4> 
</div>

<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border-left:1px solid #000000;">

<tr height="22" align="center">
<td colspan="2" style="border-top:1px solid #000000;"><h2 style="color:#000000; padding-bottom:0px; padding-top:2px; font-size:18px; font-weight:600;">OFFICE USE ONLY</h2></td>
<td width="18%" rowspan="6" style="border:1px solid #000000; border-bottom:none;">
<img src="profile/<?=getApplideStudentDetails($conn,output($_REQUEST['id']),'photo')?>" height="150" width="120" /></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Code</h2></td>
<td width="49%" align="left">
<?=getFranchiseName($conn,getApplideStudentDetails($conn,output($_REQUEST['id']),'franchise'),'code')?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Name</h2></td>
<td width="49%" align="left">
<?=stripslashes(getFranchiseName($conn,getApplideStudentDetails($conn,output($_REQUEST['id']),'franchise'),'franchise'))?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Area</h2></td>
<td width="49%" align="left">
<?=getDistrict($conn,getFranchiseName($conn,getApplideStudentDetails($conn,output($_REQUEST['id']),'franchise'),'district'),'district')?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Student's Reg. No.</h2></td>
<td width="49%" align="left">&nbsp;</td>
</tr> 
<?php
$sqlsig = "SELECT * FROM `ab_franchise_signature` WHERE `fid`='".$_SESSION['fid']."' ORDER BY `id` DESC LIMIT 1";
$ressig = query($conn, $sqlsig);
$fetchsig = fetcharray($ressig);
?>

<tr height="22" align="center">
<td width="33%" align="left">
<h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;">
Signature of The Centre Head
</h2>
</td>

<td width="49%" align="left">
<?php if(!empty($fetchsig['signature'])) { ?>
<img src="signature/<?=$fetchsig['signature']?>" style="max-width:150px; max-height:60px;" alt="Centre Head Signature">
<?php } ?>
</td>
</tr>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr height="22" align="center">
<td colspan="3" style="border:1px solid #000000;"><h2 style="color:#000000; padding-top:2px; padding-bottom:0px; font-size:18px; font-weight:600;">APPLICANT DETAILS</h2></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">1</td>
<td width="31%" style="border:1px solid #000000; border-left:none;border-right:none; border-top:none;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Course Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;">
    <?=getCourseNameByID($conn,getApplideStudentDetails($conn,output($_REQUEST['id']),'course'),'course_name')?>
    (<?=getCourseNameByID($conn,getApplideStudentDetails($conn,output($_REQUEST['id']),'course'),'code')?>)
</td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">2</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Name of The Applicant</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'name')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">3</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Father's Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'fname')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">4</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Mother's Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'mname')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">5</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Date of Birth</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'dob')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">6</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Gender</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'gender')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">7</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Religion</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'religion')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">8</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Category</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'category')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">10</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Mobile Number</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'phone')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">11</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Age</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'age')?> years</td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">12</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Address</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'address')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">13</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Pincode</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getApplideStudentDetails($conn,output($_REQUEST['id']),'pincode')?></td>
</tr> 

<tr height="22" align="center">
<td colspan="3" style="border:1px solid #000000; border-bottom:none; border-top:none;"><h2 style="color:#000000; padding-bottom:14px; font-size:14px; padding-top:2px;">I hereby declare that all the above statement are true and correct the best of my knowledge and belief.I shall obey all the Rules and Regulations of the Organization.</h2></td>
</tr> 
<tr height="22" align="center">
<td colspan="2" style="padding-left:17px; border:1px solid #000000; border-top:none;border-right:none;" align="left"><h2 style="color:#000000; padding-bottom:0px; font-size:14px;">Date :</h2></td>
<td style="border:1px solid #000000; border-top:none;border-left:none;"><h2 style="color:#000000; padding-bottom:0px; font-size:14px; font-weight:bold;">Signature of the Applicant</h2></td>
</tr> 
</table>
<?php }else{?>
<div class="text-center mb-3"> 
    <img src="images/headerlogo.png" class="application-header-img" alt="Logo"> 

    <p class="mt-2 mb-1" style="font-size: 13px; line-height: 1.5;"> 
        <?=getContact($conn,'office')?><br />
        Address-1:<?=getContact($conn,'addline1')?><br />
        Address-2:<?=getContact($conn,'addline2')?><br />
        Phone: <?=getContact($conn,'phone1')?> 
        <?php if(getContact($conn,'phone2')) { ?>
        &nbsp; / &nbsp; <?=getContact($conn,'phone2')?>
        <?php } ?>
    </p> 

    <h4 class="mt-3" style="font-weight: 800; text-transform: uppercase;">
        Application Form
    </h4> 
</div>

<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border-left:1px solid #000000;">

<tr height="22" align="center">
<td colspan="2" style="border-top:1px solid #000000;"><h2 style="color:#000000; padding-bottom:0px; padding-top:2px; font-size:18px; font-weight:600;">OFFICE USE ONLY</h2></td>
<td width="18%" rowspan="6" style="border:1px solid #000000; border-bottom:none;">
<img src="profile/<?=getStudent($conn,output($_REQUEST['id']),'photo')?>" height="150" width="120" /></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Code</h2></td>
<td width="49%" align="left">
<?=getFranchiseName($conn,getStudent($conn,output($_REQUEST['id']),'franchise'),'code')?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Name</h2></td>
<td width="49%" align="left">
<?=stripslashes(getFranchiseName($conn,getStudent($conn,output($_REQUEST['id']),'franchise'),'franchise'))?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Study Centre Area</h2></td>
<td width="49%" align="left">
<?=getDistrict($conn,getFranchiseName($conn,getStudent($conn,output($_REQUEST['id']),'franchise'),'district'),'district')?></td>
</tr> 
<tr height="22" align="center">
<td width="33%" colspan="0" align="left"><h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;"> Student's Reg. No.</h2></td>
<td width="49%" align="left"><?=getStudent($conn,output($_REQUEST['id']),'registration')?></td>
</tr>
<?php
$sqlsig = "SELECT * FROM `ab_franchise_signature` WHERE `fid`='".$_SESSION['fid']."' ORDER BY `id` DESC LIMIT 1";
$ressig = query($conn, $sqlsig);
$fetchsig = fetcharray($ressig);
?>

<tr height="22" align="center">
<td width="33%" align="left">
<h2 style="color:#000000; padding-left:4px; padding-bottom:0px; font-size:16px; font-weight:600;">
Signature of The Centre Head
</h2>
</td>

<td width="49%" align="left">
<?php if(!empty($fetchsig['signature'])) { ?>
<img src="signature/<?=$fetchsig['signature']?>" style="max-width:150px; max-height:60px;" alt="Centre Head Signature">
<?php } ?>
</td>
</tr>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr height="22" align="center">
<td colspan="3" style="border:1px solid #000000;"><h2 style="color:#000000; padding-top:2px; padding-bottom:0px; font-size:18px; font-weight:600;">APPLICANT DETAILS</h2></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">1</td>
<td width="31%" style="border:1px solid #000000; border-left:none;border-right:none; border-top:none;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Course Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;">
    <?=getCourseNameByID($conn,getStudent($conn,output($_REQUEST['id']),'course'),'course_name')?>
    (<?=getCourseNameByID($conn,getStudent($conn,output($_REQUEST['id']),'course'),'code')?>)
</td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">2</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Name of The Applicant</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'name')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">3</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Father's Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'fname')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">4</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Mother's Name</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'mname')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">5</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Date of Birth</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'dob')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">6</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Gender</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'gender')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">7</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Religion</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'religion')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">8</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Category</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'category')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">10</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Mobile Number</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'phone')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">11</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Age</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'age')?> years</td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">12</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Address</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'address')?></td>
</tr> 
<tr height="22" align="center">
<td width="11%" style="border:1px solid #000000; border-top:none;">13</td>
<td width="31%" style="border-bottom:1px solid #000000;"><h2 style="color:#000000; padding-bottom:2px; font-size:16px;">Pincode</h2></td>
<td width="58%" style="border:1px solid #000000; border-top:none;"><?=getStudent($conn,output($_REQUEST['id']),'pincode')?></td>
</tr> 

<tr height="22" align="center">
<td colspan="3" style="border:1px solid #000000; border-bottom:none; border-top:none;"><h2 style="color:#000000; padding-bottom:14px; font-size:14px; padding-top:2px;">I hereby declare that all the above statement are true and correct the best of my knowledge and belief.I shall obey all the Rules and Regulations of the Organization.</h2></td>
</tr> 
<tr height="22" align="center">
<td colspan="2" style="padding-left:17px; border:1px solid #000000; border-top:none;border-right:none;" align="left"><h2 style="color:#000000; padding-bottom:0px; font-size:14px;">Date :</h2></td>
<td style="border:1px solid #000000; border-top:none;border-left:none;"><h2 style="color:#000000; padding-bottom:0px; font-size:14px; font-weight:bold;">Signature of the Applicant</h2></td>
</tr> 
</table>
<div>&nbsp;</div>

<?php }?>
</div>
</div>
</div>



</div>



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