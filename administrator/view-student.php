<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.class2
{
background:#F4F4F4;
height:30px;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Student</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<p>&nbsp;</p>
<?php
$sql="SELECT * FROM `ab_student` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table align="center" style="font-size:16px;" width="90%" class="custview">
<tr height="40%" class="class1">
<td style="padding-left:10px; font-weight:700;">Franchise</td>
<td style="padding-left:10px;"><?=stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise'))?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Registration</td>
<td width="39%" style="padding-left:10px;"><?php if(output($fetch['registration'])){ ?><?=output($fetch['registration'])?> <?php }else{ ?> ---- <?php } ?></td>
</tr>
<tr height="40%" class="class2">
<td width="13%" style="padding-left:10px; font-weight:700;">Course Category</td>
<td width="39%" style="padding-left:10px;"><?=getCategoryName($conn,output($fetch['coursecat']),'category')?></td>
<td width="12%" style="padding-left:10px; font-weight:700;">Course</td>
<td width="36%" style="padding-left:10px;"><?=getCourse($conn,output($fetch['course']),'course_name')?>(<?=getCourse($conn,output($fetch['course']),'code')?>)</td>
</tr>

<tr height="40%" class="class1">
<td width="12%" style="padding-left:10px; font-weight:700;">Name</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['name'])?></td>
<td width="12%" style="padding-left:10px; font-weight:700;">Age</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['age'])?> Years</td>
</tr>

<tr height="40%" class="class2">
<td width="13%" style="padding-left:10px; font-weight:700;">Father's Name</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['fname'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">State</td>
<td width="39%" style="padding-left:10px;"><?=getStateName($conn,output($fetch['state']),'state')?></td>
</tr>
<tr height="40%" class="class1">
<td width="12%" style="padding-left:10px; font-weight:700;">Mother's Name</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['mname'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">District</td>
<td width="39%" style="padding-left:10px;"><?=getDistrict($conn,output($fetch['district']),'district')?></td>
</tr>

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">Gender</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['gender'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">City</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['city'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="13%" style="padding-left:10px; font-weight:700;">Address</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['address'])?></td>
</tr>

<tr height="40%" class="class2">
<td width="13%" style="padding-left:10px; font-weight:700;">Pincode</td>
<td width="39%" style="padding-left:10px;"><?=output($fetch['pincode'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="12%" style="padding-left:10px; font-weight:700;">Date Of Birth</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['dob'])?></td>
</tr>

<tr height="40%" class="class2">
<td width="12%" style="padding-left:10px; font-weight:700;">Religion</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['religion'])?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">ID Proof</td>
<td width="39%" style="padding-left:10px;"><img src="../franchise/identify/<?=$fetch['identity']?>" height="60" width="70"></td>
</tr>

<tr height="40%" class="class1">
<td width="13%" style="padding-left:10px; font-weight:700;">Status</td>
<td style="font-weight:bold; color:#009900;padding-left:10px;"><?php if($fetch['status']=='A'){?><span style="color:#00CC00;">Approved</span><?php }else{?><span style="font-weight:bold; color:#CC0000;">Pending</span><?php }?></td>
<td width="13%" style="padding-left:10px; font-weight:700;">Photo</td>
<td width="39%" style="padding-left:10px;"><img src="../franchise/profile/<?=$fetch['photo']?>" height="60" width="70" /></td>
</tr>

<tr height="40%" class="class1">
<td width="13%" style="padding-left:10px; font-weight:700;">Phone</td>
<td width="36%" style="padding-left:10px;"><?=output($fetch['phone'])?></td>
<?php /*?><td width="13%" style="padding-left:10px;">Session</td>
<td width="36%" style="padding-left:10px;"><?=getSession($conn,output($fetch['session']),'session')?></td><?php */?>
</tr>
</table>
<?php } ?>
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php') ?>
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