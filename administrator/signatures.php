<?php include('header.php');
$left=2;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->
<?php  
if($_REQUEST['case']=='edit')
{
$sql1="SELECT * FROM `ab_signature` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Signatures</h4>
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

<?php if($_REQUEST['e']=='1'){?><p align="center" style=" color:#FF0000;">Already exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated successfully!</p><?php }?>

<form class="form" action="signatures-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">
<div class="form-body">
<div class="form-group">
<label for="userinput5"></label>
<img src="signatures/<?=$fetch1['exam_controller']?>" height="60" width="200" />
</div>

<div class="form-group">
<label for="userinput5">Exam_controller<span style="color:#FF0000;">*</span></label>
<input type="file" placeholder="Enter Signature" id="exam_controller" name="exam_controller" value="" accept=".jpg,.png,.jpeg,.pjp" />
</div>

<div class="form-group">
<label for="userinput5"></label>
<img src="signatures/<?=$fetch1['director']?>" height="60" width="200" />
</div>

<div class="form-group">
<label for="userinput5">Chairman<span style="color:#FF0000;">*</span></label>
<input type="file" placeholder="Enter Signature" id="director" name="director" value="" accept=".jpg,.png,.jpeg,.pjp" />
</div>




<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>UPDATE</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>
<?php }?>
<?php }else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Signatures</h4>
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
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td style="text-align:center;">Sl_No.</td>
<td style="text-align:center;">Exam_controller</td>
<td style="text-align:center;">Chairman</td>
<td style="text-align:center;">Status</td>
<td style="text-align:center;">Action</td>
</tr>
</thead>
<tbody>
<?php
$tname='ab_signature';
$lim=100;
$tpage='signatures.php';
$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center"><img src="signatures/<?=$fetch['exam_controller']?>" height="60" width="200" title="Exam_controller" /></td>
<td align="center"><img src="signatures/<?=$fetch['director']?>" height="60" width="200" title="Director" /></td>

<td align="center"><?php if($fetch['status']=='A') {?><a href="signatures-process.php?case=status&st=<?=$fetch['status']?>&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to change status?')"><img src="images/enable.gif" /></a><?php }else{ ?><a href="signatures-process.php?case=status&st=<?=$fetch['status']?>&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to change status?')"><img src="images/disable.gif" /></a><?php } ?></td>
<td align="center"valign="middle">
<a href="signatures.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?');"><i class="fa fa-edit" style="font-size:25px;color:#66CCCC;"></i></a>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<?php }?>

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
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
