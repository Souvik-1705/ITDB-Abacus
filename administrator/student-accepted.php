<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Student</h4>
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

<?php if(isset($_REQUEST['p'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Edit Successfully !!</p><?php }?>

<?php 
$sql1="SELECT * FROM `ab_student` WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
?>
<form class="form" action="student-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Franchise<span style="color:#CC0000;">*</span></label>
<select name="franchise" id="franchise" class="form-control border-primary" required>
<option value="">Select Franchise</option>
<?php
$sql="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY`franchise`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>" <?php if($fetch1['franchise']==$fetch['id']){echo 'selected';}?>><?=stripslashes($fetch['franchise'])?>  (<?=$fetch['code']?>)</option>
<?php }}?>
</select></div>

<div class="form-group">
<label for="userinput5">Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text"  required id="name" name="name" value="<?=$fetch1['name']?>">
</div>
<div class="form-group">
<label for="userinput5">Gender<span style="color:#CC0000;">*</span></label>
<select class="form-control" style="height:37px;  color:#000000; border:1px solid #CCCCCC;" name="gender" id="gender" ><option>Select Gender</option>
<option value="Male"<?php if($fetch1['gender']=='Male'){echo 'selected';}?>>Male</option>
<option value="Female"<?php if($fetch1['gender']=='Female'){echo 'selected';}?>>Female</option>
</select>
</div>

<div class="form-group">
<label for="userinput5">Father's Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text"  required id="fname" name="fname" value="<?=$fetch1['fname']?>">
</div>
<div class="form-group">
<label for="userinput5">Mother's Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text"  required id="mname" name="mname" value="<?=$fetch1['mname']?>">
</div>
<div class="form-group">
<label for="userinput5">District<span style="color:#CC0000;">*</span></label>
<select name="district" id="district" class="form-control border-primary" required>
<option value="">Select District</option>
<?php
$sql="SELECT * FROM `ab_district`";
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
<div class="form-group">
<label for="userinput5">City<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="city"  required id="city" name="city" value="<?=$fetch1['city']?>">
</div>
<div class="form-group">
<label for="userinput5">Address<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="pin" placeholder="Enter Address" required id="address" name="address" value="<?=$fetch1['address']?>"></div>
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
<label for="userinput5">Your Age</label>
<input class="form-control border-primary" type="text"   id="dob" name="dob" value="<?=$fetch1['dob']?>">
</div>

<div class="form-group">
<label for="userinput5">Age</label>
<select  class="form-control border-primary" name="age" id="age" required>
<option>Select Age</option>
<option value="1"<?php if($fetch1['age']=='1'){echo 'selected';}?>>1 year</option>
<option value="2"<?php if($fetch1['age']=='2'){echo 'selected';}?>>2 Year</option>
<option value="3"<?php if($fetch1['age']=='3'){echo 'selected';}?>>3 Year</option>
<option value="4"<?php if($fetch1['age']=='4'){echo 'selected';}?>>4 Year</option>
<option value="5"<?php if($fetch1['age']=='5'){echo 'selected';}?>>5 Year</option>
<option value="6"<?php if($fetch1['age']=='6'){echo 'selected';}?>>6 Year</option>
<option value="7"<?php if($fetch1['age']=='7'){echo 'selected';}?>>7 Year</option>
<option value="8"<?php if($fetch1['age']=='8'){echo 'selected';}?>>8 Year</option>
<option value="9"<?php if($fetch1['age']=='9'){echo 'selected';}?>>9 Year</option>
<option value="10"<?php if($fetch1['age']=='10'){echo 'selected';}?>>10 Year</option>
</select>
</div>


<div class="form-group">
<label for="userinput5">Phone<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="pin" placeholder="Enter Phone" required id="phone" name="phone" value="<?=$fetch1['phone']?>"></div>

<div class="form-group">
<label for="userinput5">Pin Code<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="pin" placeholder="Enter Pin Code" required id="pincode" name="pincode" value="<?=$fetch1['pincode']?>"></div>
<div class="form-group">
<label for="userinput5">Admission Date<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="date" placeholder="Enter Admission Date" required id="admission" name="admission" value="<?=$fetch1['admission']?>"></div>
<div class="form-group">
<label for="userinput5"></label>
<img src="../franchise/student/<?=$fetch1['photo']?>" height="120" width="180">

<div class="form-group">
<label for="userinput5">Photo <span style="color:#FF0000">  (Size-450 X 450 px)</span></label>
<input class="form-control border-primary" type="file" placeholder="Enter Photo"  id="file" name="file" accept=".jpg,.png,.jpeg,.pjp">
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
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
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Accepted Student</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>

<form name="frm1" action="student-accepted.php?act=search" method="post">
<div style="float:right">
<table  border="0" cellspacing="0" cellpadding="0">
<tr >
<td>
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>"placeholder="Registration No, Name,Phone Number" style="width:250px;" />
</td>
<td style="width:250px; padding:5px;">
<select name="franchise" id="franchise" class="form-control border-primary">
<option value="">Select Franchise</option>
<?php
$sqlst="SELECT * FROM `ab_franchise` WHERE `status`='A' ORDER BY franchise ASC";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0){
while($fetchst=fetcharray($resst))
{
?>
<?php /*?><option value="<?=$fetchst['id']?>" <?php if(isset($_REQUEST['franchise']) && $_REQUEST['franchise'] == $fetchst['id']) echo 'selected'; ?>>
    <?=ucwords(strtolower(stripslashes($fetchst['franchise'])))?> (<?=$fetchst['code']?>)
</option><?php */?>

<option value="<?=$fetchst['id']?>"
<?php if($_REQUEST['franchise']==$fetchst['id']) echo 'selected'; ?>>
<?=stripslashes($fetchst['franchise'])?> (<?=$fetchst['code']?>)
</option>

<?php }}?>
</select>
</td>

<?php /*?><td style="width:250px; padding:5px;"><select name="sessionid" class="form-control">
<option value="">All Session</option>
<?php
$sqls = "SELECT * FROM `csdb_session` ORDER BY id DESC";
$ress = query($conn,$sqls);
while($rows = fetcharray($ress))
{
?>
<option value="<?=$rows['id']?>"
<?php if($_REQUEST['sessionid']==$rows['id']) echo 'selected'; ?>>
<?=$rows['session']?>
</option>
<?php } ?>
</select></td><?php */?>

<td>&nbsp;&nbsp;</td>
<td style="padding:8px;">
<input type="submit" value="Search" class="btn btn-primary" />
</td>
</tr>
</table>
</div>

</form>
&nbsp;

<div class="card-body collapse in">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="10%">Sl_No</td>
<td width="10%">Franchise</td>
<td width="10%">Registration</td>
<td width="10%">Course</td>
<?php /*?><td width="10%">Session</td><?php */?>
<td width="10%">Name</td>
<td width="10%">Gender</td>
<td width="10%">Phone</td>
<td align="center" width="10%">Address</td>
<td width="10%">Status</td>
<td width="10%">Date</td>
<td width="10%">Photo</td>
<td width="10%">Action</td>
</tr>
</thead>
<tbody>
<?php
$tname='ab_student';
$lim=100;
$tpage='student-accepted.php';

if($_REQUEST['act']=='search')
{
    $where = "WHERE `status`='I' AND `certificate`='P'";

    if(!empty($_REQUEST['franchise']))
    {
        $where .= " AND `franchise`='".input($_REQUEST['franchise'])."'";
    }

  /*  if(!empty($_REQUEST['sessionid']))
    {
        $where .= " AND `session`='".input($_REQUEST['sessionid'])."'";
    }*/

    if(!empty($_REQUEST['search']))
    {
        $search = input($_REQUEST['search']);

        $where .= " AND (
            `name` LIKE '%$search%' OR
            `phone` LIKE '%$search%' OR
            `registration` LIKE '%$search%'
        )";
    }

    $where .= " ORDER BY `id` DESC";

    include('pagination-search.php');
	
}
else
{
    $where = "WHERE `status`='I' AND `certificate`='P' ORDER BY `id` DESC";
    include('pagination.php');
}

$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
$sql1="SELECT * FROM `ab_course` WHERE `id`='".$fetch['course']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$fetch1=fetcharray($res1);
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center" style="padding:2px;"><?=ucwords(stripslashes(getFranchiseName($conn,output($fetch['franchise']),'franchise')))?> (<?=stripslashes(getFranchiseName($conn,output($fetch['franchise']),'code'))?>)</td>
<td align="center" style="padding:2px; color:#FF0000;"><?php if(output($fetch['registration'])){?><?=strtoupper(output($fetch['registration']))?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;"><?=ucwords((output($fetch1['course_name'])))?> (<?=strtoupper(output($fetch1['code']))?>)</td>
<?php /*?><td align="center" style="padding:2px;"><?=getSession($conn,output($fetch['session']),'session')?></t<?php */?>
<td align="center" style="padding:2px;"><?=output($fetch['name'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['gender'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['phone'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['address'])?></td>
<td align="center" style="padding:2px;"><?php if($fetch['status']=='I'){?><span class="label label-info" style="color:#FF0000;">Pending</span><?php }else{?><span class="label label-success" style="color:#00CC00;">Active</span><?php }?></td>
<td style="padding:2px;" align="center"><?=date('d-m-Y',strtotime($fetch['date']))?></td>
<td align="center" style="padding:2px;"><?php if($fetch['photo']){?><img src="../franchise/profile/<?=$fetch['photo']?>" height="60" width="60" /><?php }?></td>
<td align="center"style="padding:2px;">
<a href="student1.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png" /></a><a href="view-student.php?id=<?=$fetch['id']?>"><img src="images/view.png"/></a><a href="student-process.php?case=delete&id=<?=$fetch['id']?>&reg=<?=trim($fetch['registration'])?>" onclick="return confirm('Are you sure want to delete this?')"><img src="images/delete.png" /></a>
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
