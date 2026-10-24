<?php include('header.php');
$left=9;
?>

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script src="assets/js/ajax.js" type="text/javascript"></script>
<script>
function getsearch(){
var from=document.getElementById("fdate").value;
var to=document.getElementById("tdate").value;
window.location.href='payment-request.php?fdate='+from+'&tdate='+to;

}

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pagination.css">
<link rel="stylesheet" href="assets/css/style.css">
<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Payment Request</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>

</ul>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div style="margin:5px">
<span>From Date</span>
<input type="date" value="<?=$_REQUEST['fdate']?>" name="fdate" id="fdate" class="form-control" onChange="getsearch();"/>
</div>
</div>


<div class="col-md-3">
<div style="margin:5px">
<span>To Date</span>
<input type="date" value="<?=$_REQUEST['tdate']?>" name="tdate" id="tdate" class="form-control" onChange="getsearch();"/>
</div>
</div>

<form name="frm1" action="payment-request.php?act=search" method="post" style="padding-top:23px;">
<div class="col-md-3" align="center">
<div style="margin:5px;">
<select name="franchise" id="franchise" class="form-control border-primary" required>
<option value="<?=$_REQUEST['search']?>">Select Franchise</option>
<?php
$sqlst="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY `franchise` ASC";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0){
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower(stripcslashes($fetchst['franchise'])))?>(<?=$fetchst['code']?>) </option>
<?php }}?>
</select>
</div>
</div>


<div class="col-md-2">
<div style=" margin:5px">
<input type="submit" value="Search" class="btn btn-primary"/>
</div>
</div>

</form>
</div>
<div class="table-responsive">
<div align="center" style="padding:10px;">
<?php if($_REQUEST['fdate']!='' && $_REQUEST['tdate']!=''){?>
<span style="font-size:22px;">Total Amount:</span>&nbsp;&nbsp;&nbsp;<span style="font-size:20px"><?=getTotalPaymentRequestDate($conn,$_REQUEST['fdate'],$_REQUEST['tdate'])?></span></div>
<?php }else{?>
<span style="font-size:22px;">Total Amount:</span>&nbsp;&nbsp;&nbsp;<span style="font-size:20px"><?=getTotalPaymentRequest($conn)?></span></div>
<?php } ?>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="5%" align="center" valign="middle" class="header">Sl_No.</td>
<td width="11%" align="center" valign="middle" class="header">Code</td>
<td width="11%" align="center" valign="middle" class="header">Franchise</td>
<td width="11%" align="center" valign="middle" class="header">Amount</td>
<td width="12%" align="center" valign="middle" class="header">Remarks</td>
<td width="12%" align="center" valign="middle" class="header">Receipt</td>
<td width="12%" align="center" valign="middle" class="header">Date</td>
<td align="center" valign="middle" class="header">Status</td>
<td width="6%" align="center" valign="middle" class="header">Action</td>
</tr>
</thead>
<tbody>
<?php 
$tname='ab_payment_request';
$lim=100;

if($_REQUEST['act']=='search')
{

$where="WHERE `franchise`='".input($_POST['franchise'])."'  ORDER BY `id` DESC";

}elseif($_REQUEST['fdate']!='' && $_REQUEST['tdate']!=''){

$where="WHERE `date` BETWEEN '".$_REQUEST['fdate']."' AND '".$_REQUEST['tdate']."' ORDER BY `id` DESC";
}else{

$where="ORDER BY `id` DESC";
}
$tpage='payment-request.php';
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{ 
?>
<tr>
<td align="center" valign="middle" style="padding:2px;"><?=$i?></td>
<td align="center" valign="middle" style="padding:2px;"><?=strtoupper(getFranchiseName($conn,output($fetch['franchise']),'code'))?></td>
<td align="center" valign="middle" style="padding:2px;"><?=ucwords(strtolower(stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise'))))?></td>
<td align="center" valign="middle" style="padding:2px;"><?=output($fetch['amount'])?></td>
<td align="center" valign="middle" style="padding:2px;"><?=output($fetch['remarks'])?></td>
<td align="center" valign="middle" style="padding:2px;"><a href="download-payment.php?f=<?=$fetch['receipt']?>"><img src="images/download.gif" height="50px" width="150px"></a></td>
<td align="center" valign="middle" style="padding:2px;"><?=output($fetch['paydate'])?></td>
<td width="7%" align="center" style="padding:2px;"><?php if($fetch['status']=='I'){?><a href="payment-request-status.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to approve this transaction?');"><span style="color:#FF0000;corsur:pointer">Pending</span></a><?php }else{?><span style="color:#009900;">Approved</span><?php }?></td>
<td align="center" valign="middle" style="padding:2px;">
<?php if($fetch['status']=='I'){ ?>
<a href="delete.php?case=payment&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Payment request?');"><img src="images/delete.png" title="Delete" /></a>
<?php }else{ ?>----<?php } ?>
</td>
</tr>
<?php $i++;}}else{?> 
<tr height="40">
<td align="center" valign="middle" class="table-border2" colspan="9"><p style="color:#FF0000;font-weight:bold;">No Records Found!</p></td>
</tr>
<?php }?>
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
<!-- END VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
