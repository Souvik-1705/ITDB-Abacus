<?php include('header.php');
$left=2;
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
<h4 class="card-title" id="basic-layout-colored-form-control">New Bank Details</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Bank Details Added Successfully!!</p><?php }?>

<form class="form" action="bank-details-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">

<div class="form-group">
<label for="userinput5">Bank Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="bname" placeholder="Enter Bank Name" required id="bname" name="bname" value="" />
</div>

<div class="form-group">
<label for="userinput5">Branch Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="branch" placeholder="Branch Name" required id="branch" name="branch" value="" />
</div> 
<div class="form-group">
<label for="userinput5">Account Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="name" placeholder="Enter Name" id="name" name="name" value="" required />
</div>
<div class="form-group">
<label for="userinput5">Account No<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="accno" placeholder="Enter Account No" required id="accno" name="accno" value="" />
</div>
<div class="form-group">
<label for="userinput5">IFSC Code<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="ifscode" placeholder="Enter Ifsc Code" id="ifscode" name="ifscode" value="" />
</div>


<div class="form-group">
<label for="userinput5">QR Code<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="file" placeholder="" id="file" name="file" value="" accept=".jpg,.png,.jpeg,.pjp" />
</div>
</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
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

<?php }else if($_REQUEST['case']=='edit'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Bank Details</h4>
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


<?php 
$sql="SELECT * FROM `ab_bank_details` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="bank-details-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">
<div class="form-body">

<div class="form-group">
<label for="userinput5">Bank Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="bname" placeholder="Enter Bank Name" required id="bname" name="bname" value="<?=$fetch['bname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Branch Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="branch" placeholder="Branch Name" required id="branch" name="branch" value="<?=$fetch['branch']?>" />
</div> 

<div class="form-group">
<label for="userinput5">Account Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="name" placeholder="Enter Name" id="name" name="name" value="<?=$fetch['name']?>" required />
</div>

<div class="form-group">
<label for="userinput5">Account No<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Account No" id="accno" name="accno" value="<?=$fetch['accno']?>" required />
</div>



<div class="form-group">
<label for="userinput5">Ifsc Code<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="ifscode" placeholder="Enter Ifsc Code" id="ifscode" name="ifscode" value="<?=$fetch['ifscode']?>" required />
</div>


<div class="form-group">
<img src="bankqrcode/<?=$fetch['qrcode']?>" width="20%" />
</div>


<div class="form-group">
<label for="userinput5">Qr Code<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="file" placeholder="" id="file" name="file" value=""/>
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
</div>
</form>
<?php }?>
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
<h4 class="card-title">View Bank Details</h4>
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
<div align="center" style="padding:5px;">
<form name="form" method="post" action="bank-details.php?act=search" style="display:flex; justify-content:right; align-items:center; gap:5px;">

<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="Bank Name" style="width:280px;">

<input type="submit" value="Search" class="btn btn-primary">
</form>
</div>


<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td style="text-align:center;" width="5%">Sl_No.</td>
<td style="text-align:center;" width="16%">Bank_Name</td>
<td style="text-align:center;" width="10%">Branch</td>
<td style="text-align:center;" width="10%">Account_Name</td>
<td style="text-align:center;" width="16%">A/C_No</td>
<td style="text-align:center;" width="16%">IFSC_Code</td>
<td style="text-align:center;" width="16%">QR_Code</td>
<td style="text-align:center;" width="8%">Action</td>
</tr>
</thead>
<tbody>

<?php
$tname='ab_bank_details';
$lim=100;
$tpage='bank-details.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `bname` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."'   ORDER BY `id` DESC";
}else{


$where="ORDER BY `id` DESC";
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
<td align="center"><?php if(output($fetch['bname'])){?><?=output($fetch['bname'])?><?php }else{?>----<?php }?></td>
<td align="center"><?=output($fetch['branch'])?></td>
<td align="center"><?=output($fetch['name'])?></td>
<td align="center"><?php if(output($fetch['accno'])){?><?=output($fetch['accno'])?><?php }else{?>----<?php }?></td>
<td align="center"><?php if(output($fetch['ifscode']))?><?=output($fetch['ifscode'])?></td>
<td align="center"><img src="bankqrcode/<?=$fetch['qrcode']?>" width="100%" /></td>
<td align="center">
<a href="bank-details.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a>&nbsp;
<a href="bank-details-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a></td>
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
