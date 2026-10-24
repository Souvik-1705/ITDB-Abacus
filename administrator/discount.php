<?php
$left=14;
?>
<?php include('header.php') ?>

<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->
<script src="js/ajax.js" type="text/javascript"></script>


<script>
function getCourseList()
{
var category=document.getElementById('category').value;
xmlhttp.open('GET','get-student-course1.php?cat='+category);
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
document.getElementById('courseDiv').innerHTML=response;
}
}
}
</script>


<script>
function getStudent()
{
var category=document.getElementById('category').value;
var course=document.getElementById('course').value;

xmlhttp.open('GET','get-student.php?cat='+category+'&corid='+course);
xmlhttp.onreadystatechange=getSendRequestStudent;
xmlhttp.send();
}

function getSendRequestStudent()
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


<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:570px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-2">&nbsp;</div>

<div class="col-md-8">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control"><?php if($_REQUEST['case']=='add'){?>New Discount <?php }else{ ?> Edit Fees Collection <?php } ?></h4>
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

<?php if($_REQUEST['case']=='add'){?>
<?php if($_REQUEST['err']==2){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Invalid Form ID !</strong></div>
<?php } ?>
<form class="form" action="discount-save.php" method="post">
<div class="form-body">

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Category <b style="color:#FF0000;">*</b></label>
<select class="form-control border-primary" required name="category" id="category" onchange="getCourseList();">
<option value="">Select Category</option>
<?php 
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` ";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"><?=ucwords(strtoupper($fetchx['category']))?></option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="course_category">Course<b style="color:#FF0000;">*</b></label>
<div id="courseDiv">
<select class="form-control border-primary" required name="course" id="course">
<option value="">Select Course</option>
</select>

</div>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Student Name<b style="color:#FF0000;">*</b></label>
<div id="studentDiv">
<select class="form-control border-primary" required name="name" id="name">
<option value="">Select Student</option>
</select>
</div>
</div>
</div>
</div>
</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Check
</button>
</div>
</form>

<?php }if($_REQUEST['case']=='edit'){
$sql1="SELECT * FROM `ab_collection` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);

$fees=getCourse($conn,getStudent($conn,$fetch1['student'],'course'),'fees');
$paid=getFeedPaid($conn,$fetch1['student']);
$discount=getStudentDiscount($conn,$fetch1['student'],'amount');

$remaining=($fees-$paid);
if($discount){
$remaining=$remaining-$discount;
}
?>
<div class="card-body collapse in">
<div class="card-block">

<form class="form" action="fees-collection-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">

<div class="form-body">

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Form No<b style="color:#FF0000;">*</b></label>
<input type="text" id="registration"  class="form-control border-primary" placeholder="Form No" name="registration" required value="<?=$fetch1['registrationno']?>" disabled="disabled">

</div>
</div>
</div>

</div>

<div class="table-responsive">
	<table class="table mb-0" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>Student Name :</td>
				<td><?=getStudent($conn,$fetch1['student'],'name')?></td>
				<td>Course : </td>
				<td><?=getCourse($conn,getStudent($conn,$fetch1['student'],'course'),'course_code')?></td>
			</tr>
			<tr>
				<td>Duration : </td>
				<td><?=getCourse($conn,getStudent($conn,$fetch1['student'],'course'),'duration')?></td>
				<td>Total Due : </td>
				<td><?=$remaining?></td>
			</tr>									  
		</tbody>
	</table>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Head<b style="color:#FF0000;">*</b></label>
<input type="text" id="head"  class="form-control border-primary" placeholder="Head" name="head" required value="<?=$fetch1['head']?>" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Fees<b style="color:#FF0000;">*</b></label>
<input type="text" id="fees"  class="form-control border-primary" placeholder="Fees" name="fees" required value="<?=$fetch1['fees']?>" >
</div>
</div>
</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update
</button>
</div>
</form>

</div>
</div>
<?php } ?>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<?php 
if($_REQUEST['e']==1){?>
<script>
$('#iconModal').modal('show');
</script>
<?php } ?>
</body>
</html>