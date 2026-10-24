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

<h4 class="card-title" id="basic-layout-colored-form-control"><?php if($_REQUEST['case']=='add'){?>New Course<?php }else{ ?> Edit Course <?php } ?></h4>
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
<form class="form" action="course-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">

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
<label for="userinput1">Category<b style="color:#FF0000;">*</b></label>
<select id="category" class="form-control border-primary" name="category" required onchange="getDuration(this.value)"><option value="">Select Category</option>
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
<select name="duration" id="duration" class="form-control border-primary" required>
<option value="">Select Duration</option>
</select>
</div>  
</div>



<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Course Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="course_name"  class="form-control border-primary" placeholder="Course Name" name="course_name" required value="">
</div>
</div>



<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Code<b style="color:#FF0000;">*</b></label>
<input type="text" id="course_code"  class="form-control border-primary" placeholder="Code" name="course_code" required value="">
</div>
</div>

<div class="col-md-12">
<div class="form-group">

<label>Level <b style="color:#FF0000;">*</b></label>

<div style="padding-top:5px;">

<label style="margin-right:20px;">
<input type="checkbox" name="level[]" value="1"> Level 1
</label>

<label style="margin-right:20px;">
<input type="checkbox" name="level[]" value="2"> Level 2
</label>

<label style="margin-right:20px;">
<input type="checkbox" name="level[]" value="3"> Level 3
</label>

<label style="margin-right:20px;">
<input type="checkbox" name="level[]" value="4"> Level 4
</label>

<label>
<input type="checkbox" name="level[]" value="5"> Level 5
</label>

</div>

</div>
</div>



<div class="col-md-12">
<div class="form-group">

<label for="image">Course Image <b style="color:#FF0000;">*</b></label>

<input type="file"
       id="image"
       class="form-control border-primary"
       name="file"
       accept="image/*"
       required>

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
$sql1="SELECT * FROM `ab_course` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);

?>
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Course already exists. </strong></div>
<?php } ?>
<form class="form" action="course-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">
<div class="form-body">

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
<select id="category"  class="form-control border-primary" name="category" required value="">
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
<label for="userinput1">Course Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="course_name"  class="form-control border-primary" placeholder="Course Name" name="course_name" required value="<?=$fetch1['course_name']?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Code<b style="color:#FF0000;">*</b></label>
<input type="text" id="course_code"  class="form-control border-primary" placeholder="Code" name="course_code" required value="<?=$fetch1['code']?>">
</div>
</div>


<div class="col-md-12">
<div class="form-group">

<label for="image">Course Image</label>

<input type="file"
       id="image"
       class="form-control border-primary"
       name="file"
       accept="image/*">

<?php
if($fetch1['image']!="")
{
?>

<div style="padding-top:10px;">
<img src="course/<?=$fetch1['image']?>" style="width:120px; height:80px; object-fit:cover; border-radius:8px;">
</div>

<?php
}
?>

</div>
</div>

</div>


<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update
</button>
</div>
</form>
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
