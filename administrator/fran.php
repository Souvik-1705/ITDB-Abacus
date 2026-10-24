<?php include('header.php');
$left=14;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript">
function getDistrict(id)
{
xmlhttp.open('GET','get-state.php?sid='+id);
xmlhttp.onreadystatechange=getStateRequest;
xmlhttp.send();
}
function getStateRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('distDiv').innerHTML=response;
}
}
}
</script>
<script type="text/javascript">
function getDistrictEdit(id)
{
xmlhttp.open('GET','get-state.php?sid='+id);
xmlhttp.onreadystatechange=getStateRequestEdit;
xmlhttp.send();
}
function getStateRequestEdit()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('distEdit').innerHTML=response;
}
}
}

function getfranchise(){
var fran=document.getElementById('fran').value;
window.location.href='fran.php?fran='+encodeURIComponent(fran);
}
</script>
<script>
function togglePassword()
{
var password = document.getElementById("password");
var eye = document.getElementById("passwordEye");

if(password.type === "password")
{
password.type = "text";
eye.className = "fa fa-eye-slash";
}
else
{
password.type = "password";
eye.className = "fa fa-eye";
}
}
</script>
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
<h4 class="card-title" id="basic-layout-colored-form-control">New Franchise</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already exists!!</p><?php }?>
<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Franchise added successfully!!</p><?php }?>

<p style="font-size:16px; color:#fb9d23;">Institute Location</p>

<form class="form" action="fran-process.php?case=add" method="post">
<div class="form-body">

<div class="form-group">
<label for="userinput5">State<span style="color:#CC0000;">*</span></label>
<select name="state" id="state" class="form-control border-primary" required onChange="getDistrict(this.value);">
<option value="">Select State</option>
<?php
$sql="SELECT * FROM `ab_state` ORDER BY `state`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['state']?></option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="userinput5">District<span style="color:#CC0000;">*</span></label>
<div id="distDiv">
<select name="district" id="district" class="form-control border-primary" required>
<option value="">Select District</option>
</select>
</div>
</div>

<div class="form-group">
<label for="userinput5">City<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="area" placeholder="Enter City" required id="city" name="city" value="">
</div>

<p style="font-size:16px; color:#fb9d23;">Institute Information</p>
<div class="form-group">
<label for="userinput5">Institute Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name Of Institute" required id="franchise" name="franchise" value="ITDB Youth Abacus" readonly>
</div>

<div class="form-group">
<label for="userinput5">Address</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Address" id="insaddress" name="insaddress" value="">
</div>
<div class="form-group">
<label for="userinput5">Pincode</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="number" placeholder="Enter Pincode No" id="inspin" name="inspin" value="">
</div>
<div class="form-group">
<label for="userinput5">Contact No</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Contact No" pattern="[0-9]{10}" id="insphone1" name="insphone1" value="" maxlength="10">
</div>

<div class="form-group">
<label for="userinput5">Email</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="email" placeholder="Enter Email" id="insemail" name="insemail" value="">
</div>

<p style="font-size:16px; color:#fb9d23;">Information About Centre Head</p>
<div class="form-group">
<label for="userinput5">Name</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Centre Head Name" id="pname" name="pname" value="">
</div>
<div class="form-group">
<label for="userinput5">Designation</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter designation" id="position" name="position" value=""></div>
<div class="form-group">
<label for="userinput5">Address</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Address" id="paddress" name="paddress" value="" />
</div>
<div class="form-group">
<label for="userinput5">Mobile</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Mobile No" pattern="[0-9]{10}" id="pphone" name="pphone" maxlength="10" value="">
</div>

<div class="form-group">
<label for="userinput5">Email</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="email" placeholder="Enter Email" id="pemail" name="pemail" value="">
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
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

<?php }else if($_REQUEST['case']=='edit'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body">

<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Franchise</h4>
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
$sql1="SELECT * FROM `ab_franchise` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
?>
<p style="font-size:16px; color:#fb9d23;">Institute Location</p>

<form class="form" action="fran-process.php?case=edit" method="post">
<input type="hidden" name="id" id="id" value="<?=$_REQUEST['id']?>" />
<div class="form-body">

<div class="form-group">
<label for="userinput5">State<span style="color:#CC0000;">*</span></label>
<select name="state" id="state" class="form-control border-primary" required onchange="getDistrictEdit(this.value);">
<option value="">Select State</option>
<?php
$sql="SELECT * FROM `ab_state` ORDER BY `state`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>" <?php if($fetch1['state']==$fetch['id']){echo 'selected';}?>><?=$fetch['state']?></option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="userinput5">District<span style="color:#CC0000;">*</span></label>
<div id="distEdit">
<select name="district" id="district" class="form-control border-primary" required>
<option value="">Select District</option>
<?php
$sql="SELECT * FROM `ab_district` WHERE `state`='".mysqli_real_escape_string($conn,trim($fetch1['state']))."' ORDER BY `district`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>" <?php if($fetch1['district']==$fetch['id']){echo 'selected';}?>><?=$fetch['district']?></option>
<?php }}?>
</select>
</div>
</div>

<div class="form-group">
<label for="userinput5">City<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter City" required id="city" name="city" value="<?=$fetch1['city']?>" />
</div>

<p style="font-size:16px; color:#fb9d23;">Institute Information</p>
<div class="form-group">
<label for="userinput5">Institute Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name Of Institute" required id="franchise" name="franchise" value="<?=stripslashes($fetch1['franchise'])?>" readonly />
</div>

<div class="form-group">
<label for="userinput5">Password<span style="color:#CC0000;">*</span></label>

<div style="position:relative;">
<input class="form-control border-primary" type="password" placeholder="Enter Password" required id="password" name="password" value="<?=base64_decode($fetch1['password'])?>" style="padding-right:42px;" />

<button type="button" onclick="togglePassword()" style="position:absolute; right:1px; top:1px; height:calc(100% - 2px); width:40px; border:0; background:transparent; color:#666; cursor:pointer; outline:none;">
<i class="fa fa-eye" id="passwordEye"></i>
</button>
</div>

</div>



<div class="form-group">
<label for="userinput5">Address</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Address" id="insaddress" name="insaddress" value="<?=$fetch1['insaddress']?>" />
</div>
<div class="form-group">
<label for="userinput5">Pincode</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="number" placeholder="Enter Pincode No" id="inspin" name="inspin" value="<?=$fetch1['inspin']?>" />
</div>
<div class="form-group">
<label for="userinput5">Contact No</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Contact No" pattern="[0-9]{10}" id="insphone1" name="insphone1" value="<?=$fetch1['insphone1']?>" maxlength="10" />
</div>

<div class="form-group">
<label for="userinput5">Email</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Email" id="insemail" name="insemail" value="<?=$fetch1['insemail']?>" />
</div>

<p style="font-size:16px; color:#fb9d23;">Information About Centre Head</p>
<div class="form-group">
<label for="userinput5">Name</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Centre Head Name" id="pname" name="pname" value="<?=$fetch1['pname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Designation</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter designation" id="position" name="position" value="<?=$fetch1['position']?>" />
</div>

<div class="form-group">
<label for="userinput5">Address</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Address" id="paddress" name="paddress" value="<?=$fetch1['paddress']?>" />
</div>

<div class="form-group">
<label for="userinput5">Mobile</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="text" placeholder="Enter Mobile No" pattern="[0-9]{10}" id="pphone" name="pphone" value="<?=$fetch1['pphone']?>" maxlength="10"/>
</div>

<div class="form-group">
<label for="userinput5">Email</label><span style="color:#CC0000;">*</span>
<input class="form-control border-primary" type="email" placeholder="Enter Email" id="pemail" name="pemail" value="<?=$fetch1['pemail']?>" />
</div>




<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
</div>

</div>
</form>
<?php }?>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
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
<h4 class="card-title">View Franchise</h4>
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
<div class="col-md-3">
<div align="center" style="padding:5px;">
<select name="fran" id="fran" onchange="getfranchise();" class="form-control input-line input-medium">
<option>Select Franchise</option>
<?php
$sqlmp="SELECT * FROM `ab_franchise` ORDER BY `franchise`";
$resmp=query($conn,$sqlmp);
$nummp=numrows($resmp);
if($nummp>0)
{
while($fetchmp=fetcharray($resmp))
{
?>
<option value="<?=$fetchmp['id']?>" <?php if($_REQUEST['fran']==$fetchmp['id']){echo'selected';}?>><?=ucwords(strtolower(stripcslashes($fetchmp['franchise'])))?> (<?=$fetchmp['code']?>)</option>
<?php }}?>

</select>
</div>
</div>

<div class="col-md-4">
<div align="center" style="padding:5px;">
<form name="form" method="post" action="fran.php?act=search" style="display:flex; justify-content:right; align-items:center; gap:5px;">

<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="Franchise, Email, Phone, Person, Code" style="width:280px;">

<input type="submit" value="Search" class="btn btn-primary">
</form>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="5%" align="center" valign="middle" class="header">Sl_No.</td>
<td width="11%" align="center" valign="middle" class="header">Code</td>
<td width="11%" align="center" valign="middle" class="header">Password</td>
<td width="11%" align="center" valign="middle" class="header">Franchise</td>
<td width="11%" align="center" valign="middle" class="header">Name</td>
<td width="12%" align="center" valign="middle" class="header">Email</td>
<td width="12%" align="center" valign="middle" class="header">Phone</td>
<td width="12%" align="center" valign="middle" class="header">State</td>
<td width="12%" align="center" valign="middle" class="header">District</td>
<td align="center" valign="middle" class="header">Status</td>
<td align="center" valign="middle" class="header">Date</td>
<td width="6%" align="center" valign="middle" class="header">Action</td>
</tr>
</thead>
<tbody>

<?php
$tname='ab_franchise';
$lim=50;
$tpage='fran.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `franchise` LIKE '".input($_POST['search'])."' OR `pname` LIKE '".input($_POST['search'])."' OR `insphone1` LIKE '".input($_POST['search'])."' OR `pphone` LIKE '".input($_POST['search'])."' OR `paddress` LIKE '".input($_POST['search'])."' OR `code` LIKE '".input($_POST['search'])."' ORDER BY `id` DESC";
}elseif($_REQUEST['fran']!=''){

$where="WHERE `id`='".input($_REQUEST['fran'])."' ORDER BY `id` DESC";

}
else{
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
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><a href="../franchise/franchise-login-process.php?code=<?=output($fetch['code'])?>&password=<?=base64_decode(output($fetch['password']))?>" style="color:#0066FF; font-weight:bold;" target="_blank"><?=strtoupper(output($fetch['code']))?></a></td>
<td align="center" style="padding:2px;"><?=base64_decode(output($fetch['password']))?></td>
<td align="center" style="padding:2px;"><?=output(stripslashes($fetch['franchise']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(strtolower(output($fetch['pname'])))?></td>
<td align="center" style="padding:2px;"><?=output($fetch['insemail'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['insphone1'])?></td>
<td align="center" style="padding:2px;"><?=getStateName($conn,output($fetch['state']),'state')?></td>
<td align="center" style="padding:2px;"><?=getDistrict($conn,output($fetch['district']),'district')?></td>

<td align="center" style="padding:2px;"><?php if($fetch['status']=='A'){?><a href="fran-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to change the status?')"><img src="images/enable.gif" border="0" class="status" title="Active" /></a><?php }else{?><a href="fran-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to change the status?')"><img src="images/disable.gif" border="0" class="status" title="Inactive" /></a><?php }?>
</td>




<td align="center" style="padding:2px;"><?=$fetch['date']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:2px;"><a href="view-fran.php?id=<?=$fetch['id']?>" style="cursor:pointer;"><img src="images/view.png" title="Franchise Details" height="25" width="25" /></a>&nbsp;<a href="fran.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png" /></a>
<?php if($fetch['status']=='P'){ ?>
<a href="delete.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Franchise?');"><img src="images/delete.png" title="Delete" /></a>
<?php } ?>
</td>
</tr>
<?php $i++;}}else{?> 
<tr>
<td align="center" valign="middle" class="table-border2" colspan="12"><p style="color:#FF0000;font-weight:bold;">No Records Found!</p></td>
</tr>
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

<?php include('footer.php');?>

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