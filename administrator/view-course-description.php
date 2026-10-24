<?php include('header.php'); 
$left=5;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<style>
th{
text-align:center;
}

</style>


<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Course Description</h4>
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

<form action="view-course-description.php" method="post">
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-2">
<div style="padding:5px">
<select id="course"  class="form-control border-primary" name="course" style="width:100%">
<option value="">Select Course</option>
<?php 
$sqlx="SELECT * FROM `ab_course` GROUP BY `course_name` ORDER BY `course_name`";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"<?php if($_REQUEST['course']==$fetchx['id']){echo'selected';}?>><?=$fetchx['course_name']?></option>
<?php }}?></select>
</div>
</div>

<div class="col-md-2">
<div style="padding:5px">
<select name="duration" id="duration" class="form-control border-primary" style="width:100%">
<option value="">Select Duration</option>
<?php
$sqlx1="SELECT DISTINCT `level_duration` FROM `ab_level_description` ORDER BY `level_duration`";
$resx1=query($conn,$sqlx1);
$numx1=numrows($resx1);
if($numx1>0){
while($fetchx1=fetcharray($resx1)){
?>
<option value="<?=$fetchx1['level_duration']?>" <?php if($_REQUEST['duration']==$fetchx1['level_duration']){echo 'selected';}?>>
<?=$fetchx1['level_duration']?>
</option>
<?php }}?>
</select>
</div>
</div>


<div class="col-md-3">
<div style="padding:5px">
<input type="text" placeholder="Enter Code, Name" class="form-control border-primary" name="search" id="saerch" value="<?=$_REQUEST['search']?>" style="width:100%"/>
</div>
</div>
<div class="col-md-2">
<div style="padding:5px">
<input type="submit" class="btn btn-primary"  value="search" style="width:100%"/>

</div>
</div>

</div>

</form>



<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th width="109" >Sl_No.</th>
<th width="165">Course_Name</th>
<th width="100">Level</th>	
<th width="100">Duration</th>									
<th width="351">Description</th>
<th width="351">Age</th>
<th width="105">Action</th>
</tr>
</thead>
<tbody>
<?php

$tname='ab_level_description';
$lim=100;
$tpage='view-course-description.php';

if($_REQUEST['course']!='' && $_REQUEST['search']=='' && $_REQUEST['duration']==''){
$where="WHERE `course`='".trim($_REQUEST['course'])."' ORDER BY `id` DESC";
}
else if($_REQUEST['course']=='' && $_REQUEST['search']!='' && $_REQUEST['duration']==''){
$where="WHERE `course` IN (SELECT `id` FROM `ab_course` WHERE `course_name`='".mysqli_real_escape_string($conn,trim($_REQUEST['search']))."' OR `code`='".mysqli_real_escape_string($conn,trim($_REQUEST['search']))."') ORDER BY `id` DESC";
}
else if($_REQUEST['course']!='' && $_REQUEST['search']=='' && $_REQUEST['duration']!=''){
$where="WHERE `course`='".trim($_REQUEST['course'])."' AND `level_duration`='".mysqli_real_escape_string($conn,trim($_REQUEST['duration']))."' ORDER BY `id` DESC";
}
else if($_REQUEST['course']!='' && $_REQUEST['search']!='' && $_REQUEST['duration']!=''){
$where="WHERE `course`='".trim($_REQUEST['course'])."' AND `level_duration`='".mysqli_real_escape_string($conn,trim($_REQUEST['duration']))."' AND `course` IN (SELECT `id` FROM `ab_course` WHERE `course_name`='".mysqli_real_escape_string($conn,trim($_REQUEST['search']))."' OR `code`='".mysqli_real_escape_string($conn,trim($_REQUEST['search']))."') ORDER BY `id` DESC";
}
else if($_REQUEST['duration']!=''){
$where="WHERE `level_duration`='".mysqli_real_escape_string($conn,trim($_REQUEST['duration']))."' ORDER BY `id` DESC";
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
<td style="margin:2px;padding:2px;" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;" align="center"><?=getCourseName($conn,$fetch['course'],'course_name')?>(<?=getCourseName($conn,$fetch['course'],'code')?>)</td>
<td style="margin:2px;padding:2px;" align="center">Level <?=$fetch['level']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['level_duration']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=($fetch['description'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=($fetch['age'])?></td>
<td style="margin:2px;padding:2px;" align="center">
<a href="course-description.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to edit this Course?');"><img src="images/edit.png" alt="Edit" style="border:none;" title="Edit"/></a>
<a href="course-description-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to delete this Course?');"><img src="images/delete.png" title="Delete" /></a>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>  
</tbody>
</table>
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