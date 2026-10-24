<?php include('header.php');
$left=9;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<?php if($_REQUEST['case']=='add'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Payment Deduct</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;"> Deduct Already Exists !!</p><?php }?>

<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Deduct Added Successfully!!</p><?php }?>


<form class="form" action="payment-deduct-process.php?case=add" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Franchise<span style="color:#CC0000;">*</span></label>
<select name="franchise" id="franchise" class="form-control border-primary" required>
<option value="">Select Franchise</option>
<?php
$sql="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=ucwords(strtolower(stripslashes($fetch['franchise'])))?> (<?=$fetch['code']?>)</option>
<?php }}?>
</select>
</div>
<div class="form-group">
<label for="userinput5">Wallet<span style="color:#CC0000;">*</span></label>
<select name="wallet" id="wallet" class="form-control border-primary" required>
<option value="">Select Wallet</option>
<option value="MAIN">MAIN</option>
<?php /*?><option value="SRB">SRB</option>
<option value="PROJECT">PROJECT</option><?php */?>
</select>
</div>
<div class="form-group">
<label for="userinput5">Amount<span style="color:#CC0000;">*</span></label>
<input type="number" name="amount" id="amount" class="form-control border-primary"required placeholder="Enter Amount" />
</div>
<div class="form-group">
<label for="userinput5">Remarks<span style="color:#CC0000;">*</span></label>
<input type="text" name="remarks" id="remarks" class="form-control border-primary" required placeholder="Enter Remarks" value="" />
</div>
<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
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

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Deduct</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>

</ul>
</div>
</div>

<form name="frm1" action="payment-deduct.php?act=search" method="post">
<div style="float:right">
<table  border="0" cellspacing="0" cellpadding="0">
<tr >

<td style="width:250px; padding:5px;">
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
					<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower(stripslashes($fetchst['franchise'])))?>(<?=$fetchst['code']?>) </option>
				<?php }}?>
				</select>
				</td>
				<td>&nbsp;&nbsp;</td>
				<td style="padding:8px;">
				<input type="submit" value="Search" class="btn btn-primary"/>
				</td>
				</tr>
				
				</table>
				
				
				</div>
				
</form>



<div class="card-body collapse in">

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td style="text-align:center;" width="10%">Sl_No.</td>
<td style="text-align:center;" width="15%">Code</td>
<td style="text-align:center;" width="15%">Franchise</td>
<td style="text-align:center;" width="15%">Wallet</td>
<td style="text-align:center;" width="15%">Amount</td>
<td style="text-align:center;" width="15%">Remarks</td>
<td style="text-align:center;" width="15%">Date</td>
<td style="text-align:center;" width="10%">Action</td>
</tr>
</thead>
<tbody>
<?php
$tname='ab_payment_deduct';
$lim=100;
$tpage='payment-deduct.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `franchise`='".input($_POST['franchise'])."'  ORDER BY `id` DESC";
}else{
$where="ORDER BY `id` ";
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
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><?=getFranchiseName($conn,output($fetch['franchise']),'code')?></td>
<td align="center" style="padding:2px;"><?=ucwords(strtolower(stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise'))))?></td>
<td align="center" style="padding:2px;"><?=output($fetch['wallet'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['amount'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['remarks'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['date'])?></td>
<td align="center" style="padding:2px;">

<a href="payment-deduct-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
