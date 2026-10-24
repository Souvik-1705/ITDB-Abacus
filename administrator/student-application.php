<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pagination.css">
<link rel="stylesheet" href="assets/css/style.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<?php if($_REQUEST['case']=='edit'){?>

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
<h4 class="card-title">Student Application</h4>
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

<?php if($_REQUEST['p']==1){?>
<p align="center" style="color:#00CC33; padding-bottom:8px;">
Edit Successfully !!
</p>
<?php }?>

<?php

$sql1="SELECT * FROM `ab_student_application` WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);

if($num1>0)
{
$fetch1=fetcharray($res1);

?>

<form class="form" action="student-application-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">

<div class="form-body">

<div class="form-group">
<label>Franchise<span style="color:#CC0000;">*</span></label>

<select name="franchise" id="franchise" class="form-control border-primary" required>

<option value="">Select Franchise</option>

<?php

$sql="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY `franchise` ASC";
$res=query($conn,$sql);
$num=numrows($res);

if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<option value="<?=$fetch['id']?>" <?php if($fetch1['franchise']==$fetch['id']){echo 'selected';}?>>
<?=stripslashes($fetch['franchise'])?> (<?=$fetch['code']?>)
</option>

<?php }}?>

</select>
</div>


<div class="form-group">
<label>Name<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="name"
value="<?=output($fetch1['name'])?>">
</div>


<div class="form-group">
<label>Age<span style="color:#CC0000;">*</span></label>

<select class="form-control border-primary"
name="age"
id="age"
required>

<option value="">Select Age</option>

<option value="1" <?php if($fetch1['age']=='1'){echo 'selected';}?>>1 Year</option>
<option value="2" <?php if($fetch1['age']=='2'){echo 'selected';}?>>2 Year</option>
<option value="3" <?php if($fetch1['age']=='3'){echo 'selected';}?>>3 Year</option>
<option value="4" <?php if($fetch1['age']=='4'){echo 'selected';}?>>4 Year</option>
<option value="5" <?php if($fetch1['age']=='5'){echo 'selected';}?>>5 Year</option>
<option value="6" <?php if($fetch1['age']=='6'){echo 'selected';}?>>6 Year</option>
<option value="7" <?php if($fetch1['age']=='7'){echo 'selected';}?>>7 Year</option>
<option value="8" <?php if($fetch1['age']=='8'){echo 'selected';}?>>8 Year</option>
<option value="9" <?php if($fetch1['age']=='9'){echo 'selected';}?>>9 Year</option>
<option value="10" <?php if($fetch1['age']=='10'){echo 'selected';}?>>10 Year</option>

</select>
</div>


<div class="form-group">
<label>Gender<span style="color:#CC0000;">*</span></label>

<select class="form-control"
name="gender"
id="gender"
required>

<option value="">Select Gender</option>

<option value="Male" <?php if($fetch1['gender']=='Male'){echo 'selected';}?>>Male</option>

<option value="Female" <?php if($fetch1['gender']=='Female'){echo 'selected';}?>>Female</option>


</select>
</div>


<div class="form-group">
<label>Father's Name<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="fname"
value="<?=output($fetch1['fname'])?>">
</div>


<div class="form-group">
<label>Mother's Name<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="mname"
value="<?=output($fetch1['mname'])?>">
</div>


<div class="form-group">
<label>Phone<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="phone"
value="<?=output($fetch1['phone'])?>">
</div>


<div class="form-group">
<label>Address<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="address"
value="<?=output($fetch1['address'])?>">
</div>


<div class="form-group">
<label>City<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="city"
value="<?=output($fetch1['city'])?>">
</div>


<div class="form-group">
<label>State<span style="color:#CC0000;">*</span></label>

<select name="state"
id="state"
class="form-control border-primary"
required
onChange="getDistrict(this.value);">

<option value="">Select State</option>

<?php

$sql="SELECT * FROM `ab_state` ORDER BY `state` ASC";
$res=query($conn,$sql);
$num=numrows($res);

if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<option value="<?=$fetch['id']?>"
<?php if($fetch1['state']==$fetch['id']){echo 'selected';}?>>

<?=$fetch['state']?>

</option>

<?php }}?>

</select>
</div>


<div class="form-group">

<label>District<span style="color:#CC0000;">*</span></label>

<div id="distEdit">

<select name="district"
id="district"
class="form-control border-primary"
required>

<option value="">Select District</option>

<?php

$sql="SELECT * FROM `ab_district` WHERE `state`='".trim($fetch1['state'])."' ORDER BY `district` ASC";

$res=query($conn,$sql);
$num=numrows($res);

if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<option value="<?=$fetch['id']?>"
<?php if($fetch1['district']==$fetch['id']){echo 'selected';}?>>

<?=$fetch['district']?>

</option>

<?php }}?>

</select>

</div>

</div>


<div class="form-group">
<label>Pin Code<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="text"
required
name="pincode"
value="<?=output($fetch1['pincode'])?>">
</div>


<div class="form-group">
<label for="userinput5">Religion<span style="color:#CC0000;">*</span></label>
<select class="form-control" name="religion" id="religion" required>
<option value="Hinduism"<?php if($fetch1['religion']=='Hinduism'){echo 'selected';}?>>Hinduism</option>
<option value="Islam"<?php if($fetch1['religion']=='Islam'){echo 'selected';}?>>Islam</option>
<option value="Christianism"<?php if($fetch1['religion']=='Christianism'){echo 'selected';}?>>Christianism</option>
<option value="Others"<?php if($fetch1['religion']=='Others'){echo 'selected';}?>>Others</option>
</select>
</div>


<div class="form-group">
<label>Category<span style="color:#CC0000;">*</span></label>

<select class="form-control"name="category"required>
<option value="">Select Category</option>
<option value="General" <?php if($fetch1['category']=='General'){echo 'selected';}?>>General</option>
<option value="SC" <?php if($fetch1['category']=='SC'){echo 'selected';}?>>SC</option>
<option value="ST" <?php if($fetch1['category']=='ST'){echo 'selected';}?>>ST</option>
<option value="OBC" <?php if($fetch1['category']=='OBC'){echo 'selected';}?>>OBC</option>
</select>
</div>


<div class="form-group">
<label>Date of Birth</label>

<input class="form-control border-primary"
type="date"
name="dob"
value="<?=output($fetch1['dob'])?>">
</div>


<div class="form-group">
<label>Admission Date<span style="color:#CC0000;">*</span></label>

<input class="form-control border-primary"
type="date"
required
name="admission"
value="<?=output($fetch1['admission'])?>">
</div>


<div class="form-group">
<label>Photo</label>

<?php if($fetch1['photo']){?>

<div style="margin-bottom:10px;">
<img src="../franchise/profile/<?=$fetch1['photo']?>"
height="100"
width="100">
</div>

<?php }?>

<input class="form-control border-primary"
type="file"
name="file"
accept=".jpg,.png,.jpeg,.pjp">

</div>


<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update
</button>

<a href="student-application.php" class="btn btn-danger">
Cancel
</a>

</div>

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
<h4 class="card-title">Student Application</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>

<form name="frm1" action="student-application.php?act=search" method="post">
<div style="float:left;padding-left:50px">
<div align="center" style="padding:2px;"><a href="print-student.php" style="color:#006600;">
</a></div></div>
<div style="float:right">
<table  border="0" cellspacing="0" cellpadding="0">
<tr >
<td>
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>"placeholder="Search By Name,Phone Number" style="width:250px;" />
</td>
<td style="width:250px; padding:5px;">
<select name="franchise" id="franchise" class="form-control border-primary">
<option value="">Select Franchise</option>
<?php
$sqlst="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY `franchise`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0){
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords((stripslashes($fetchst['franchise'])))?> (<?=$fetchst['code']?>)</option>
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

&nbsp;
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td style="text-align:center;">Sl_No</td>
<td style="text-align:center;">Franchise</td>
<td style="text-align:center;">Course</td>
<?php /*?><td style="text-align:center;">Session</td>
<?php */?>
<td style="text-align:center;">Name</td>
<td style="text-align:center;">Phone</td>
<td style="text-align:center;">Age</td>
<td style="text-align:center;">Address</td>
<td style="text-align:center;">Category</td>
<td style="text-align:center;">State</td>
<td style="text-align:center;">City</td>
<!--<td style="text-align:center;">Status</td>-->
<td style="text-align:center;">Date</td>
<td style="text-align:center;">Action</td>
</tr>
</thead>
<tbody>

<?php
$tname='ab_student_application';
$lim=100;
$tpage='student-application.php';

if($_REQUEST['act']=='search')
{
$where="";

if($_POST['franchise']!='')
{
$where.="WHERE `franchise`='".input($_POST['franchise'])."' ";
}

if($_POST['search']!='')
{
if($where=="")
{
$where.="WHERE (`name` LIKE '%".input($_POST['search'])."%' OR `phone` LIKE '%".input($_POST['search'])."%') ";
}
else
{
$where.="AND (`name` LIKE '%".input($_POST['search'])."%' OR `phone` LIKE '%".input($_POST['search'])."%') ";
}
}


$where.="ORDER BY `id` DESC";
}
else
{
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
<tr style="padding:2px;">
<td style="padding:2px;" align="center"><?=$i?></td>
<td style="padding:2px;" align="center"><?=ucwords((stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise'))))?> (<?=stripslashes(getFranchiseName($conn,output($fetch['franchise']),'code'))?>)</td>
<td style="padding:2px;" align="center"><?=ucwords((getCourseNameByID($conn,output($fetch['course']),'course_name')))?> (<?=getCourseNameByID($conn,output($fetch['course']),'code')?>)</td> 
<?php /*?><td style="padding:2px;" align="center"><?=getSession($conn,output($fetch['session']),'session')?></td><?php */?>
<td style="padding:2px;" align="center"><?=output($fetch['name'])?></td>
<td style="padding:2px;" align="center"><?=output($fetch['phone'])?></td>
<td style="padding:2px;" align="center"><?=output($fetch['age'])?> Years</td>
<td style="padding:2px;" align="center"><?=output($fetch['address'])?></td>
<td style="padding:2px;" align="center"><?=ucfirst(output($fetch['category']))?></td>
<td style="padding:2px;" align="center"><?=getStateName($conn,output($fetch['state']))?></td>
<td style="padding:2px;" align="center"><?=output($fetch['city'])?></td>
<!--<td align="center"><?php if($fetch['status']=='I'){?><img src="images/disable.gif" /><?php }else{ ?><img src="images/enable.gif" /><?php }?></td>-->
<td style="padding:2px;" align="center"><?=date('d-m-Y',strtotime($fetch['date']))?></td>

<td align="center" style="padding:2px;"><a href="view-studentapp.php?id=<?=$fetch['id']?>"><img src="images/view.png"></a>
<a href="student-application.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png" title="Edit" /></a>
<?php if($fetch['status']=='I'){ ?>
<a href="delete.php?case=application&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this ?');"><img src="images/delete.png" title="Delete" /></a>
<?php } ?>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="14" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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


<!-- END ROBUST JS-->
<!-- END PAGE LEVEL JS-->
<?php } ?>

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

<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
</body>
</html>