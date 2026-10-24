<?php include('header.php'); 
$left=69;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script>
function getFranchiseSearch(val)
{
window.location.href='franchise-student.php?act=search&fran='+val;
}
</script>
<script>
function getRunningStudent(val)
{
xmlhttp.open('GET','get-running-student.php?val='+val);
xmlhttp.onreadystatechange=getsendRequestKeyword2;
xmlhttp.send();
}
function getsendRequestKeyword2()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('studentDiv').innerHTML=response;
}
}
}
</script>

<style>
.bold{
	font-weight:bold;
	
	
	
}
</style>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Student Discount</h4>
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

<div class="container">
<div class="table-responsive">
<style>
td,th{
text-align:center;
}

</style>

<div>&nbsp;</div>


<?php
$sql="SELECT * FROM `ab_branch` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
}
?>
<div class="table-responsive">
<table class="table table-striped" style="width:100%">
<tr style="border-bottom:none;">
<td style="width:20%" class="bold">Franchise</td><td style="width:5%">:</td><td><?=ucwords(strtolower($fetch['franchise']))?></td>
</tr>
<tr>
<td class="bold">Franchise code</td><td>:</td><td><?=$fetch['code']?></td>
</tr>
<tr>
<td class="bold">Center Head Name</td><td>:</td><td><?=ucwords(strtolower($fetch['center_head']))?></td>
</tr>
<tr>
<td class="bold">Password</td><td>:</td><td><?=base64_decode($fetch['password'])?></td>
</tr>
<tr>
<td class="bold">Email</td><td>:</td><td><?=output($fetch['insemail'])?> 
<?php if($fetch['insemail1']){?>
 / <?=output($fetch['insemail1'])?>
 <?php }?>
</tr>
<tr>
<td class="bold">Phone</td><td>:</td><td><?=$fetch['insphone1']?> 
<?php if($fetch['insphone2']){?>
 / <?=output($fetch['insphone2'])?>
 <?php }?>
 </td>
</tr>
<tr>
<td class="bold">State</td><td>:</td><td><?=ucwords(strtolower($fetch['state']))?></td>
</tr>
<tr>
<td class="bold">District</td><td>:</td><td><?=ucwords(strtolower($fetch['district']))?></td>
</tr>
<tr>
<td class="bold">Address</td><td>:</td><td><?=$fetch['address']?></td>
</tr>
<tr>
<td class="bold">City</td><td>:</td><td><?=$fetch['city']?></td>
</tr>
<tr>
<td class="bold">Pincode</td><td>:</td><td><?=$fetch['pincode']?></td>
</tr>

<tr>
<td class="bold">Status</td><td>:</td><td><?php if($fetch['status']=='I'){?>
<span style="color:#FF0000;font-weight:bold">Inactive</span>
<?php }else{?>
<span style="color:#00CC00;font-weight:bold">Active</span>
<?php }?></td>
</tr>

</tr>
</table>

<table class="table table table-striped" style="width:100%" align="center">


<tr>
<td class="bold">Branch Photo:&nbsp;<br>
<a href="file-download-another.php?f=<?=$fetch['center_photo']?>"><button class="btn btn-outline-warning mb-1" style="color:black;font-weight:bold;"><i class="fas fa-download"></i> Download</button></a><br>

 <?php if($fetch['center_photo']){?><img src="branch_document/<?=$fetch['center_photo']?>" style="height:150px;height:150px" loading="lazy"><?php }?></td>
<td class="bold">Branch head Id:&nbsp;<br>
<a href="file-download-another.php?f=<?=$fetch['center_head_identity']?>"><button class="btn btn-outline-warning mb-1" style="color:black;font-weight:bold;"><i class="fas fa-download"></i> Download</button></a><br>
<?php if($fetch['center_head_identity']){?><img src="branch_document/<?=$fetch['center_head_identity']?>" style="height:150px;height:150px" loading="lazy"><?php }?></td>
</tr>
<tr >
<td class="bold">Branch Head Photo:&nbsp;<br>
<a href="file-download-another.php?f=<?=$fetch['photo']?>"><button class="btn btn-outline-warning mb-1" style="color:black;font-weight:bold;"><i class="fas fa-download"></i> Download</button></a><br>
<?php if($fetch['photo']){?><img src="branch_document/<?=$fetch['photo']?>" style="height:150px;height:150px" loading="lazy"><?php }?></td>
<td class="bold">Branch Address Proof:&nbsp;<br>
<a href="file-download-another.php?f=<?=$fetch['address_proof']?>"><button class="btn btn-outline-warning mb-1" style="color:black;font-weight:bold;"><i class="fas fa-download"></i> Download</button></a><br>
<?php if($fetch['address_proof']){?><img src="branch_document/<?=$fetch['address_proof']?>" style="height:150px;height:150px" loading="lazy"><?php }?></td>
</tr>


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