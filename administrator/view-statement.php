<?php include('header.php'); 
$left=4;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<script>
function getFranchiseSearch(val)
{
window.location.href='view-statement.php?act=search&fran='+val;
}
</script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<?php if($_REQUEST['case']=="edit"){?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Fees Collection Statement</h4>
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

<form action="view-statement.php?case=edit&id=<?=$_REQUEST['id']?>" method="post">
<div class="form-body">

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5">
<div class="form-group">
<label for="fees">Monthly Fees</label>
<input type="number" class="form-control border-primary" name="fees" id="fees" placeholder="Enter Monthly Fees"/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5">
<div class="form-group">
<label for="due">Due</label>
<input type="number" class="form-control border-primary" name="due" id="due" placeholder="Enter Due"/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-3">
<div class="form-group">
<input type="submit" class="btn btn-primary" style="width:100%"/>
</div>
</div>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php }else{?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Fees Collection Statement</h4>
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
<form  action="view-statement.php" method="post">

<div class="col-md-2" >
<div style="padding:5px">
<input type="text" id="search"  class="form-control border-primary"  placeholder="Registration No" name="search" value="<?=$_REQUEST['search']?>"  style="width:100%">
</div>
</div>

<div class="col-md-2">
<div style="padding:5px">
<input type="submit" class="btn btn-primary" style="width:100%" value="Search">
</div>
</div>

</form>
</div>
<?php /*?><div class="col-md-12" align="center">
<div align="center">
<a href="export-fees-statement-process.php?search=<?=$_REQUEST['search']?>" title="expot to excel"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%; margin-bottom:5px; margin-top:5px; margin-right:7%;"></a>
</div>
</div><?php */?>

<div class="table-responsive">
<div>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th width="109" style="text-align:center">Sl_No.</th>
<th width="264" style="text-align:center">Student</th>
<th width="185" style="text-align:center">Month</th>	
<th width="185" style="text-align:center">Admission_Fees</th>	
<th width="185" style="text-align:center">Fees</th>	
<th width="185" style="text-align:center">Date</th>	

<th width="185" style="text-align:center">Action</th>	
</tr>
</thead>

<tbody>

<?php
$tname='ab_collection_details';
$lim=100;
$tpage='view-statement.php';

if($_REQUEST['search']!=''){
$where="WHERE `registrationno`='".$_REQUEST['search']."' ";
}

else{
$where="ORDER BY `id` DESC";
}
include('pagination-distinct.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
$regg=getStudent($conn,$fetch['student'],'registrationno');
$feeid=getStudentFeesPaymentDetails($conn,$fetch['student'],'feesid');

$totalfees=getStudentFeesPaymentDetailsByFeeid($conn,$fetch['student'],$feeid);
$totalAddfees=getStudentAddFeesPaymentDetailsByFeeid($conn,$fetch['student'],$feeid);

?>
<tr>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=ucwords(strtolower(getStudent($conn,$fetch['student'],'name')))?>&nbsp;(<?=strtoupper(getStudent($conn,$fetch['student'],'registrationno'))?>)</td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=getStudentFeesPaymentDetails($conn,$fetch['student'],'monthyear')?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=$totalAddfees?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=$totalfees?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=getStudentFeesPaymentDetails($conn,$fetch['student'],'date')?></td>

<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><a href="view-statement-details.php?registrationno=<?=$regg?>"><img src="images/view.png" height="20" width="20" alt="_view"/></a>



     
</td>
</tr>

<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
</div>


<?php }?>

<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
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