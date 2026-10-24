<?php include('header.php');
$left=7;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->

<script>
function getSearch(){
var fromdate=document.getElementById("fdate").value;
var todate=document.getElementById("tdate").value;
window.location.href='acc-info.php?fdate='+fromdate+'&tdate='+todate;
}
</script>

<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<?php  if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Account Information</h4>
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
<div class="row">
<div class="col-md-2">
<div style="margin:5px">
<span>From Date</span>
<input type="date" value="<?=$_REQUEST['fdate']?>" name="fdate" id="fdate" class="form-control border-primary" onChange="getSearch();"/>
</div>
</div>
<div class="col-md-2">
<div style="margin:5px">
<span>To Date</span>
<input type="date" value="<?=$_REQUEST['tdate']?>" name="tdate" id="tdate" class="form-control border-primary" onChange="getSearch();"/>
</div>
</div>
<form name="frm1" action="acc-info.php?act=search" method="post" style="padding-top:23px;">
<div class="col-md-2">
<div style="margin:5px">
<select name="course" id="course" class="form-control border-primary">
<option value="<?=$_REQUEST['search']?>">Select Course</option>
<?php
$sqlst="SELECT * FROM `ab_course` GROUP BY `course_name` ORDER BY `course_name`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0){
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['course_name']))?>(<?=$fetchst['code']?>) </option>
<?php }}?>
</select>
</div>
</div>
<div class="col-md-2">
<div style="margin:5px">
<select name="franchise" id="franchise" class="form-control border-primary">
<option value="">Select Franchise</option>
<?php
$sqlst="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY `franchise` ASC";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0){
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower(stripslashes($fetchst['franchise'])))?> (<?=strtoupper($fetchst['code'])?>)</option>
<?php }}?>
</select>
</div>
</div>

<?php /*?><div class="col-md-2">
<div style="margin:5px">
<select name="sessionid" id="sessionid" class="form-control border-primary">
<option value="">Select Session</option>
<?php
$sqls="SELECT * FROM `csdb_session` ORDER BY `id` DESC";
$ress=query($conn,$sqls);
while($rows=fetcharray($ress))
{
?>
<option value="<?=$rows['id']?>"><?=$rows['session']?></option>
<?php }?>
</select>
</div>
</div><?php */?>

<div class="col-md-2">
<div style="margin:5px">
<input type="submit" value="Search" class="btn btn-primary"/>
</div>
</div>
</form>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td style="text-align:center;" width="10%">Sl_No</td>
<td style="text-align:center;" width="10%">Code</td>
<td style="text-align:center;" width="10%">Franchise</td>
<!--<td style="text-align:center;" width="10%">Session</td>-->
<td style="text-align:center;" width="10%">Wallet</td>
<td style="text-align:center;" width="10%">Amount</td>
<td style="text-align:center;" width="10%">Registration</td>
<td style="text-align:center;" width="10%">Name</td>
<td style="text-align:center;" width="10%">Course</td>
<td style="text-align:center;" width="10%">Date</td>
</tr>
</thead>
<tbody>
<?php
$tname='ab_student_approve';
$lim=100;
$tpage='acc-info.php';

if($_REQUEST['act']=='search')
{
if($_POST['franchise'])
{
$where="WHERE `franchise`='".input($_POST['franchise'])."'";
}
elseif($_POST['course'])
{
$where="WHERE `course`='".input($_POST['course'])."'";
}
elseif($_POST['sessionid'])
{
$where="WHERE `session`='".input($_POST['sessionid'])."'";
}
else
{
$where="";
}

$where.=" ORDER BY `id` DESC";
}

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
<td align="center" style="padding:2px;"><?=strtoupper(getFranchiseName($conn,output($fetch['franchise']),'code'))?></td>
<td align="center" style="padding:2px;"><?=ucwords(stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise')))?></td>
<?php /*?><td align="center" style="padding:2px;"><?=getSession($conn,output($fetch['session']),'session')?></td><?php */?>
<td align="center" style="padding:2px;"><?=output($fetch['wallet'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['amount'])?></td>
<td align="center" style="padding:2px;color:#FF0000;"><?=strtoupper(output($fetch['registration']))?></td>
<td align="center" style="padding:2px;"><?=output(getStudentDetails($conn,$fetch['registration'],'name'))?></td>
<td align="center" style="padding:2px;"><?=ucwords((getCourse($conn,output($fetch['course']),'course_name')))?>(<?=getCourse($conn,output($fetch['course']),'code')?>)</td>
<td align="center" style="padding:2px;"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="12" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
