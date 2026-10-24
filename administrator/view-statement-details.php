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
<h4 class="card-title">View Fees Collection Details</h4>
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
<div>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="white-space:nowrap;text-align:center">Sl_No.</th>
<th style="white-space:nowrap;text-align:center">Student</th>
<th style="white-space:nowrap;text-align:center">Admission_Fees</th>	
<th style="white-space:nowrap;text-align:center">Month</th>
<th style="white-space:nowrap;text-align:center">Fees</th>
<th style="white-space:nowrap;text-align:center">Date</th>
<th style="white-space:nowrap;text-align:center">Collected_By</th>

<th style="white-space:nowrap;text-align:center">Action</th>
</tr>
</thead>

<tbody>

<?php
$tname='ab_collection_details';
$lim=100;
$tpage='view-statement-details.php';

$where="WHERE `registrationno`='".$_REQUEST['registrationno']."' ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
$reg=$_REQUEST['registrationno'];

?>
<tr>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=getStudent($conn,$fetch['student'],'name')?> (<?=getStudent($conn,$fetch['student'],'registrationno')?>)</td>

<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?php if($fetch['addfees']>0){?><?=$fetch['addfees']?><?php }else{?>----<?php }?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?php if($fetch['monthyear']){?><?=$fetch['monthyear']?><?php }else{?>----<?php }?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?php if($fetch['fees']>0){?><?=$fetch['fees']?><?php }else{?>----<?php }?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=$fetch['date']?></td>
<td style="margin:2px;padding:2px;white-space:nowrap" align="center"><?=ucwords(strtolower( getUser($conn,$fetch['adminid'],'name')))?></td>

<td style="margin:2px;padding:2px;white-space:nowrap" align="center">
<?php if($fetch['fees']>0){?>
<a href="fees-print.php?invoice=<?=$fetch['invoiceno']?>&reg=<?=$reg?>&feesid=<?=$fetch['feesid']?>&id=<?=$fetch['id']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to print this fees?');" target="_blank"><img src="images/print.png" alt="Print" style="border:none;" title="Print"/></a>
<?php }else{?>
<a href="fees-print-admission.php?reg=<?=$reg?>&invoice=<?=$fetch['invoiceno']?>&feesid=<?=$fetch['feesid']?>&id=<?=$fetch['id']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to print this fees?');" target="_blank"><img src="images/print.png" alt="Print" style="border:none;" title="Print"/></a>
<?php }?>

<a href="fees-collection-process.php?case=delete&id=<?=$fetch['id']?>&reg=<?=$reg?>&feesid=<?=$fetch['feesid']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to delete this record?');" target="_blank"><img src="images/delete.png" alt="Edit" style="border:none;" title="delete"/></a>
</td>



</tr>

<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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