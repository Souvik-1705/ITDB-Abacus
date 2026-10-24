<?php
$left=5;
?>
<?php include('header.php') ?>

<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getUserIDcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;
document.getElementById('sponname').value=response;
}
}
}

function getFeesBox(val) {
if (val === 'School') {
document.getElementById('feess').style.visibility = 'collapse'; 
document.getElementById('fees').removeAttribute("required");

} else {
document.getElementById('feess').style.visibility = 'visible';
document.getElementById('fees').setAttribute("required", "required");

}
}

function getCourseData(val)
{
var category=document.getElementById('category').value;

xmlhttp.open('GET','get-course-data.php?category='+category+'&duration='+val);
xmlhttp.onreadystatechange=getCourseDataRequest;
xmlhttp.send();
}

function getCourseDataRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
document.getElementById('course').innerHTML=xmlhttp.responseText;
}
}
}
function getDuration(val)
{
xmlhttp.open('GET','get-duration.php?category='+val);
xmlhttp.onreadystatechange=getDurationRequest;
xmlhttp.send();
}

function getDurationRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
document.getElementById('duration').innerHTML=xmlhttp.responseText;

document.getElementById('course').innerHTML='<option value="">Select Course</option>';
}
}
}

function getCategory(val)
{
xmlhttp.open('GET','get-course-category.php?session='+val);
xmlhttp.onreadystatechange=getCategoryRequest;
xmlhttp.send();
}

function getCategoryRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
document.getElementById('category').innerHTML=xmlhttp.responseText;
document.getElementById('duration').innerHTML='<option value="">Select Duration</option>';
document.getElementById('course').innerHTML='<option value="">Select Course</option>';
}
}
}

</script>

<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">

<h4 class="card-title" id="basic-layout-colored-form-control"><?php if($_REQUEST['case']=='add'){?>New Course Fees<?php }else{ ?> Edit Course Fees<?php } ?></h4>
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
<?php if(isset($_REQUEST['s'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px;">Added Succesfully</p><?php }?>

<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Course already exists. </strong></div>
<?php } ?>
<form class="form" action="course-fees-process.php?case=add" method="post">
<div class="form-body">

<div class="row">

<div class="col-md-12">  
<div class="form-group">  

<label for="session">Session<b style="color:#FF0000;">*</b></label>  

<select name="session" id="session" class="form-control border-primary" required onchange="getCategory(this.value)">
<option value="">Select Session</option>

<?php
$sqlx2="SELECT * FROM `ab_session` ORDER BY `session` DESC";
$resx2=query($conn,$sqlx2);
$numx2=numrows($resx2);

if($numx2>0)
{
while($fetchx2=fetcharray($resx2))
{
?>

<option value="<?=$fetchx2['id']?>"><?=$fetchx2['session']?></option>

<?php
}
}
?>

</select>

</div>  
</div>


<div class="col-md-12"> 
<div class="form-group"> 
<label for="category">Category<b style="color:#FF0000;">*</b></label> 

<select id="category" class="form-control border-primary" name="category" required onchange="getDuration(this.value)">
<option value="">Select Category</option>

<?php  
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` "; 
$resx=query($conn,$sqlx); 
$numx=numrows($resx); 

if($numx>0)
{ 
while($fetchx=fetcharray($resx))
{ 
?> 

<option value="<?=$fetchx['id']?>"<?php if($fetch1['category']==$fetchx['id']){echo'selected';}?>><?=$fetchx['category']?></option>

<?php }}?> 

</select>
</div> 
</div>

<div class="col-md-12">  
<div class="form-group">  
<label for="duration">Duration<b style="color:#FF0000;">*</b></label>

<select name="duration" id="duration" class="form-control border-primary" required onchange="getCourseData(this.value)">
<option value="">Select Duration</option>
</select>

</div>  
</div>

<div class="col-md-12">    
<div class="form-group">    
<label for="course">Course Name (Code)<b style="color:#FF0000;">*</b></label>

<select name="course" id="course" class="form-control border-primary" required>
<option value="">Select Course</option>
</select>

</div>    
</div>

<div class="col-md-12"> 
<div class="form-group"> 
<label for="userinput1">Course Fees<b style="color:#FF0000;">*</b></label> 
<input type="text" id="fees" class="form-control border-primary" placeholder="Course Fees" name="fees" required value="<?=$fetch1['fees']?>"> 
</div> 
</div>




</div>
</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
</div>

</form>


<?php }if($_REQUEST['case']=='edit'){
$sql1="SELECT * FROM `ab_course_fees` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);

?>
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Course already exists. </strong></div>
<?php } ?>
<form class="form" action="course-fees-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">

<div class="row">

<div class="col-md-12">  
<div class="form-group">  

<label for="session">Session<b style="color:#FF0000;">*</b></label>  

<select name="session" id="session" class="form-control border-primary" required>

<option value="">Select Session</option>

<?php
$sqlx2="SELECT * FROM `ab_session` ORDER BY `session` DESC";
$resx2=query($conn,$sqlx2);
$numx2=numrows($resx2);

if($numx2>0)
{
while($fetchx2=fetcharray($resx2))
{
?>

<option value="<?=$fetchx2['id']?>"<?php if($fetch1['session']==$fetchx2['id']){echo'selected';}?>><?=$fetchx2['session']?></option>

<?php
}
}
?>

</select>

</div>  
</div>
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Category<b style="color:#FF0000;">*</b></label>
<select id="category" class="form-control border-primary" name="category" required onchange="getDuration(this.value)">
<option value="">Select Category</option>
<?php 
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` ";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"<?php if($fetch1['category']==$fetchx['id']){echo'selected';}?>><?=$fetchx['category']?></option>
<?php }}?>
</select>
</div>
</div>
<div class="col-md-12"> 
<div class="form-group"> 
<label for="duration">Duration<b style="color:#FF0000;">*</b></label> 
<select name="duration" id="duration" class="form-control border-primary" required onchange="getCourseData(this.value)"> 
<option value="">Select Duration</option>

<?php
$sqlx3="SELECT * FROM `ab_duration` WHERE `category`='".$fetch1['category']."' ORDER BY `id` ASC";
$resx3=query($conn,$sqlx3);
$numx3=numrows($resx3);

if($numx3>0)
{
while($fetchx3=fetcharray($resx3))
{
?>

<option value="<?=$fetchx3['id']?>"<?php if($fetch1['duration']==$fetchx3['id']){echo'selected';}?>><?=$fetchx3['duration']?></option>

<?php
}
}
?>

</select>
</div> 
</div>
<div class="col-md-12">   
<div class="form-group">   
<label for="course">Course (Code)<b style="color:#FF0000;">*</b></label>   
<?php
$sqlx2="SELECT * FROM `ab_course` WHERE `id`='".$fetch1['course']."'";
$resx2=query($conn,$sqlx2);
$fetchx2=fetcharray($resx2);
?>
<select name="course" id="course" class="form-control border-primary" required> 

<option value="">Select Course</option>

<?php
$sqlx4="SELECT * FROM `ab_course` WHERE `category`='".$fetch1['category']."' AND `duration`='".$fetch1['duration']."' GROUP BY `course_name` ORDER BY `id` ASC";
$resx4=query($conn,$sqlx4);
$numx4=numrows($resx4);

if($numx4>0)
{
while($fetchx4=fetcharray($resx4))
{
?>

<option value="<?=$fetchx4['id']?>"<?php if($fetch1['course']==$fetchx4['id']){echo'selected';}?>><?=$fetchx4['course_name']?> (<?=$fetchx4['code']?>)</option>

<?php
}
}
?>

</select>
</div>   
</div>
<div class="col-md-12"> 
<div class="form-group"> 
<label for="userinput1">Course Fees(code)<b style="color:#FF0000;">*</b></label> 
<input type="text" id="fees" class="form-control border-primary" placeholder="Course Fees" name="fees" required value="<?=$fetch1['fees']?>"> 
</div> 
</div>
</div>
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
</div>
</form>
<?php } ?>
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
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<?php 
if($_REQUEST['e']==1){?>
<script>
$('#iconModal').modal('show');
</script>
<?php } ?>
</body>
</html>
