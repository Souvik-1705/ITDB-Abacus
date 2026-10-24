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
<h4 class="card-title">View Course</h4>
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

<form action="view-course.php" method="post">
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-2">
<div style="padding:5px">
<select id="category"  class="form-control border-primary" name="category" style="width:100%">
<option value="">Select Category</option>
<?php 
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` ";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"<?php if($_REQUEST['category']==$fetchx['id']){echo'selected';}?>><?=$fetchx['category']?></option>
<?php }}?></select>
</div>
</div>

<div class="col-md-2">
<div style="padding:5px">
<select name="duration" id="duration" class="form-control border-primary" style="width:100%">
<option value="">Select Duration</option>
<?php 
$sqlx1="SELECT * FROM `ab_duration` ORDER BY `duration` ";
$resx1=query($conn,$sqlx1);
$numx1=numrows($resx1);
if($numx1>0){
while($fetchx1=fetcharray($resx1)){
?>
<option value="<?=$fetchx1['id']?>"<?php if($_REQUEST['duration']==$fetchx1['id']){echo'selected';}?>><?=$fetchx1['duration']?></option>
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
<th width="165">Session</th>
<th width="165">Category</th>
<th width="185">Duration</th>
<th width="165">Course_Name</th>		
<th width="165">Code</th>	
<th width="165">Level</th>					
<th width="351">Image</th>
<th width="105">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='ab_course';
$lim=100;
$tpage='view-course.php';
if($_REQUEST['category']!='' && $_REQUEST['search']=='' && $_REQUEST['duration']==''){
$where="WHERE `category`='".trim($_REQUEST['category'])."' ORDER BY `id` DESC";
}
else if($_REQUEST['category']=='' && $_REQUEST['search']!='' && $_REQUEST['duration']==''){
$where="WHERE `course_name`='".trim($_REQUEST['search'])."' OR `code`='".trim($_REQUEST['search'])."' ORDER BY `id` DESC";
}
else if($_REQUEST['category']!='' && $_REQUEST['search']=='' && $_REQUEST['duration']!=''){
$where="WHERE `category`='".trim($_REQUEST['category'])."' AND `duration`='".trim($_REQUEST['duration'])."' ORDER BY `id` DESC";
}

else if($_REQUEST['category']!='' && $_REQUEST['search']!=''  && $_REQUEST['duration']!=''){
$where="WHERE `category`='".trim($_REQUEST['category'])."' AND `duration`='".trim($_REQUEST['duration'])."' AND (`course_name`='".trim($_REQUEST['search'])."' OR `code`='".trim($_REQUEST['search'])."') ORDER BY `id` DESC";
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
<td style="margin:2px;padding:2px;" align="center"><?=getSession($conn,$fetch['session'],'session')?></td>
<td style="margin:2px;padding:2px;" align="center"><?=strtoupper(getCourseCategory($conn,$fetch['category'],'category'))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=getDuration($conn,$fetch['duration'])?></td>

<td style="margin:2px;padding:2px;" align="center"><?=ucwords($fetch['course_name'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=strtoupper($fetch['code'])?></td>
<td style="margin:2px;padding:2px;" align="center">Level <?=$fetch['level']?></td>
<td style="margin:2px;padding:2px;" align="center">

<?php
if($fetch['image']!="")
{
?>

<img src="course/<?=$fetch['image']?>" 
     style="width:100px;height:70px;object-fit:cover;border-radius:8px;border:1px solid #ddd;"
     alt="<?=ucwords($fetch['course_name'])?>">

<?php
}
else
{
?>
No Image
<?php
}
?>

</td><td style="margin:2px;padding:2px;" align="center">
<a href="course.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to edit this Course?');"><img src="images/edit.png" alt="Edit" style="border:none;" title="Edit"/></a>
<a href="course-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to delete this Course?');"><img src="images/delete.png" title="Delete" /></a>
</td>
</tr>
<?php 
$i++;
}
}
else{?>
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