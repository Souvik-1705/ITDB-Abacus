<?php include('header.php'); 
$left=3;
?>
<script>
function getFranchiseSearch(val)
{
window.location.href='completed-student.php?act=search&fran='+val;
}
</script>

<style>
th{
text-align:center;
}
</style>

<script>
function getCourseListt()
{
var category=document.getElementById('category').value;
xmlhttp.open('GET','get-course1.php?cat='+category);
xmlhttp.onreadystatechange=getSendRequestCourse;
xmlhttp.send();
}

function getSendRequestCourse()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('courDiv').innerHTML=response;
}
}
}
</script>


<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Completed Student</h4>
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

<div class="col-md-1">
<div align="center">
<a href="export-completed-student-process.php" title="expot to excel"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%; margin-bottom:5px; margin-top:5px; margin-right:7%;"></a>
</div>
</div>

<form action="completed-student.php" method="post">
<div class="col-md-3">
<div style="padding:5px">
<select class="form-control border-primary" name="category" id="category" onchange="getCourseListt()">
<option value="">Select Category</option>
<?php
$sqlco="SELECT * FROM `ab_course_category` ORDER BY `category`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"<?php if($fetchco['id']==$_REQUEST['category']){echo'selected';}?>><?=ucwords(strtolower($fetchco['category']))?></option>
<?php }}?>
</select>
</div>
</div>


<div class="col-md-3">
<div style="padding:5px" id="courDiv">
<select name="course" id="course" class="form-control border-primary" >
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$_REQUEST['category']."' ORDER BY `course_name`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"<?php if($fetchco['id']==$_REQUEST['course']){echo'selected';}?>><?=ucwords(strtolower($fetchco['course_name']))?> (<?=$fetchco['code']?>)</option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-3">
<div style="padding:5px">
<input type="text" name="search" style="font-size:12px;width:100%" id="search" class="form-control border-primary" placeholder="Search By Name,Registration No,Phone"value="<?=$_REQUEST['search']?>"/>
</div>
</div>


<div class="col-md-2">
<div style="padding:5px">
<input type="submit" class="btn btn-primary" value="Search" style="width:100%" />
</div>
</div>



</form>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th>Sl_No.</th>
<th>Registration_No</th>
<th>Name</th>
<th>Phone</th>
<th>Course</th>
<th>Admission_Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='ab_student';
$lim=100;
$tpage='completed-student.php';

if($_REQUEST['search']){
$where="WHERE (`name` LIKE '%".trim($_REQUEST['search'])."%' OR `phone` LIKE '%".trim($_REQUEST['search'])."%' OR `registrationno` LIKE '%".trim($_REQUEST['search'])."%' OR `email` LIKE '%".trim($_REQUEST['search'])."%') AND `status`='C' ORDER BY `id` DESC";
}else if($_REQUEST['course'] && $_REQUEST['category']){
$where="WHERE `course`='".$_REQUEST['course']."' AND `course_cat`='".$_REQUEST['category']."' AND `status`='C' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='C' ORDER BY `id` DESC";
}

$data=http_build_query(array("course"=>trim($_REQUEST['course']),"category"=>trim($_REQUEST['category'])));

include('pagination2.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td style="margin:2px;padding:2px;" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['registrationno']){?><?=strtoupper($fetch['registrationno'])?><?php }else{ ?>----<?php } ?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords($fetch['name'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['phone']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(getCourse($conn,$fetch['course'],'course_name'))?></td>

<td style="margin:2px;padding:2px;" align="center"><?=stripslashes(date('d F Y',strtotime($fetch['admission'])))?></td>
<td style="margin:2px;padding:2px;font-weight:bold" align="center">
<?php if($fetch['status']=='R'){?><a href="student-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to make course completed?');"><span style="color:#FF0000;">Running</span></a><?php }else{?><span style="color:#009900;">Completed</span><?php }?>
</td>
<td>
<a href="view-student.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" target="_blank"><img src="images/view.png" title="Student Details" height="22" width="22"></a>
</td>  
</tr>

<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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