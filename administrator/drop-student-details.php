<?php include('header.php'); 
$left=3;
?>
<style>
.table th, .table td {
border-bottom: 1px solid #e3ebf3;
text-align:left; }
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
<h4 class="card-title">View Student Details</h4>
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

<div class="table-responsive">
<?php
$sql="SELECT * FROM `ab_student` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res)
?>
<table class="table table-striped mb-0">

<tbody>
<tr>
<td>&nbsp; Name</td>
<td><?=stripslashes(ucwords($fetch['name']))?></td>
<td>Course</td>
<td><?=stripslashes(strtoupper(getCourse($conn,$fetch['course'],'course')))?></td>
</tr>
<tr>
<td>&nbsp; Gender </td>
<td><?=stripslashes($fetch['gender'])?></td>
<td>Duration</td>
<td><?=stripslashes($fetch['duration'])?></td>
</tr>
<tr>
<td>&nbsp; Phone</td>
<td><?=stripslashes($fetch['phone'])?></td>
<td>Date Of Birth</td>
<td><?=stripslashes(date('d F Y',strtotime($fetch['dob'])))?></td>
</tr>
<tr>
<td>&nbsp; Email</td>
<td><?php if($fetch['email']){ ?><?=stripslashes($fetch['email'])?><?php }else{ ?>----<?php } ?></td>
<td>Admission Date</td>
<td><?=stripslashes(date('d F Y',strtotime($fetch['admission'])))?></td>
</tr>
<tr>
<td>&nbsp; Address</td>
<td><?=stripslashes(ucwords($fetch['address']))?></td>
<td>Status</td>
<td><? if($fetch['status']=='D'){ ?> <span style="font-weight:bold; color:#FF0000;"> Dropout </span><?php } ?> </td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table width="100%" align="center">
<tr style="background:#FF0000;color:#FFFFFF;">
<td align="center">Head</td>
<td align="center">Fees</td>
<td align="center">Date</td>
</tr>
<?php
$sql1="SELECT * FROM `ab_collection` WHERE `registrationno`='".$fetch['registrationno']."' ORDER BY `id`";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
?>
<tr>
<td align="center"><?=$fetch1['head']?></td>
<td align="center"><?=$fetch1['fees']?></td>
<td align="center"><?=$fetch1['date']?></td>
</tr>
<?php }}?>
</table>
<?php } ?>
</div>
</div>
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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>