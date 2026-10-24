<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<style>

/* =========================================
   STUDENT APPLICATION DETAILS DESIGN
========================================= */

.class2,
.class1
{
    height:48px;
    transition:all 0.2s ease;
}

/* Alternate Row Colors */
.class2
{
    background:#fff7f2;
}

.class1
{
    background:#fffdfb;
}

/* Row Hover */
.class2:hover,
.class1:hover
{
    background:#fff0e8;
}

/* Main Details Table */
.details-table
{
    width:90%;
    border-collapse:separate;
    border-spacing:0;
    font-size:15px;
    color:#444444;
    overflow:hidden;
    border:1px solid #f0d9cf;
    border-radius:12px;
    box-shadow:0 5px 18px rgba(180,100,70,0.10);
}

/* Labels */
.details-table td:nth-child(1),
.details-table td:nth-child(3)
{
    font-weight:bold;
    color:#b45335;
    background:#fff1eb;
}

/* Values */
.details-table td:nth-child(2),
.details-table td:nth-child(4)
{
    color:#333333;
    background:#fffdfb;
}

/* All Cells */
.details-table td
{
    padding:12px 14px !important;
    border-bottom:1px solid #f3dfd7;
    vertical-align:middle;
}

/* Remove last row border */
.details-table tr:last-child td
{
    border-bottom:none;
}

/* Images */
.details-table img
{
    width:75px !important;
    height:75px !important;
    object-fit:cover;
    border-radius:10px;
    border:3px solid #ffffff;
    box-shadow:0 3px 10px rgba(0,0,0,0.15);
}

/* Main Outer Box */
.application-details-box
{
    background:linear-gradient(135deg,#fffaf7,#fff4ef,#fffafb);
    border:1px solid #f0d8ce;
    border-radius:18px;
    padding:18px 10px;
    margin:20px;
    box-shadow:0 8px 25px rgba(180,90,60,0.10);
}

/* Title */
.details-title
{
    display:inline-block;
    padding:9px 25px;
    margin-bottom:18px;
    border-radius:25px;
    background:linear-gradient(90deg,#ff8a65,#ff6f91);
    color:#ffffff;
    font-size:18px;
    font-weight:bold;
    letter-spacing:.3px;
    box-shadow:0 4px 12px rgba(255,111,145,0.25);
}

/* Status */
.status-approved
{
    display:inline-block;
    padding:5px 14px;
    border-radius:20px;
    background:#e9f9ef;
    color:#159447 !important;
    font-weight:bold;
}

.status-pending
{
    display:inline-block;
    padding:5px 14px;
    border-radius:20px;
    background:#fff0f0;
    color:#dc3545 !important;
    font-weight:bold;
}

/* Responsive */
@media(max-width:767px)
{
    .details-table
    {
        width:100%;
        font-size:13px;
    }

    .details-table td
    {
        padding:9px 7px !important;
    }

    .application-details-box
    {
        margin:10px 0;
        padding:10px 5px;
    }

    .details-table img
    {
        width:60px !important;
        height:60px !important;
    }
}

</style>

<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">


<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Details</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>

</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block">

<div class="portlet-body" style="overflow:auto;">

<div class="application-details-box" align="center">
<div>&nbsp;</div>
<?php
$sql="SELECT * FROM `ab_student_application` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table align="center" style="font-size:16px;" width="90%">

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">State</td>
<td width="36%" style="padding-left:10px;"><?=getStateName($conn,output($fetch['state']),'state')?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">District</td>
<td width="39%" style="padding-left:10px;"><?=getDistrict($conn,output($fetch['district']),'district')?></td>
</tr>

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">Franchise</td>
<td width="36%" style="padding-left:10px;"><?=stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise'))?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Duration</td>
<td width="39%" style="padding-left:10px;"><?=getDuration($conn,output($fetch['duration'],'duration'))?></td>
</tr>

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">Course</td>
<td width="36%" style="padding-left:10px;"><?=getCourseNameByID($conn,output($fetch['course']),'course_name')?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Address</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['address'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="12%" style="padding-left:10px; font-weight:700;">Name</td>
<td width="36%" style="padding-left:10px; "><?=output($fetch['name'])?></td>
<td width="19%" style="padding-left:10px; font-weight:700;">Age</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['age'])?> Years</td>
</tr>

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">Date Of Birth</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['dob'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Phone</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['phone'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="12%" style="padding-left:10px; font-weight:700;">Religion</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['religion'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">District</td>
<td width="39%" style="padding-left:10px;"><?=getDistrict($conn,output($fetch['district']),'district')?></td>
</tr>

<tr height="40%" class="class2">
<td width="13%" style="padding-left:10px; font-weight:700;">ID Proof</td>
<td style="padding-left:10px;"><img src="../franchise/identify/<?=$fetch['identity']?>" height="60" width="70"></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Photo</td>
<td width="39%" style="padding-left:10px;"><img src="../franchise/profile/<?=$fetch['photo']?>" height="60" width="70" /></td>
</tr>

<tr height="40%" class="class1">
<td width="13%" style="padding-left:10px; font-weight:700;">Status</td>
<td style="font-weight:bold; color:#009900; padding-left:10px;"><?php if($fetch['status']=='A'){?><span style="color:#00CC00;">Approved</span><?php }else{?><span style="font-weight:bold; color:#CC0000;">Pending</span><?php }?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Date</td>
<td width="39%" style="padding-left:10px;"><?=stripslashes($fetch['date'])?></td>
</tr>

</table>
<?php } ?>
<div>&nbsp;</div>
</div>
<?php include('footer.php');?>
<div class="scroll-to-top">

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>