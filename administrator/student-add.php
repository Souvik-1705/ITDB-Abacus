<?php
$left=3;
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
var duration=document.getElementById('duration').value;
xmlhttp.open('GET','get-student-course.php?cat='+category+'&duration='+duration);
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

<div class="app-content content container-fluid">
<div class="content-wrapper">
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
<h4 class="card-title" id="basic-layout-colored-form-control"><?php if($_REQUEST['case']=='add'){?>New Student<?php }else{ ?> Edit Student <?php } ?></h4>
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
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Registration No already exists. </strong></div>
<?php } ?>
<form class="form" action="student-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="admissionno">Admission No</label>
<input type="text" id="admissionno"  class="form-control border-primary" placeholder="Enter Admission No" name="admissionno" >
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="category">Category<b style="color:#FF0000;">*</b></label>
<strong>&nbsp; &nbsp; &nbsp; &nbsp; <span id="feeDiv" style="color:#FF0000; font-size:14px;"></span></strong>
<select class="form-control border-primary" required name="category" id="category" onchange="getCourseList();">
<option value="">Select Category</option>
<?php 
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` ";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"><?=$fetchx['category']?></option>
<?php }}?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Duration<b style="color:#FF0000;">*</b></label>
<select name="duration" id="duration" class="form-control border-primary" required onchange="getCourseList();">
<option value="">Select Duration</option>
<?php 
$sqlx1="SELECT * FROM `ab_duration` ORDER BY `duration` ";
$resx1=query($conn,$sqlx1);
$numx1=numrows($resx1);
if($numx1>0){
while($fetchx1=fetcharray($resx1)){
?>
<option value="<?=$fetchx1['id']?>"><?=$fetchx1['duration']?></option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="course_category">Course<b style="color:#FF0000;">*</b></label>
<div id="courseDiv">
<select class="form-control border-primary" required name="course" id="course">
<option value="">Select Course</option>
</select>

</div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="addfees">Admission Fees<b style="color:#FF0000;">*</b></label>
<input type="number" id="addfees"  class="form-control border-primary" placeholder="Admission Fees" name="addfees" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="mfees">Monthly Fees<b style="color:#FF0000;">*</b></label>
<input type="number" id="mfees"  class="form-control border-primary" placeholder="Monthly Fees" name="mfees" required>
</div>
</div>

</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="startdate">Starting Month<b style="color:#FF0000;">*</b></label>
<input type="date" id="startdate"  class="form-control border-primary" name="startdate" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="nomonth">No Of Month<b style="color:#FF0000;">*</b></label>
<input type="number" id="nomonth"  class="form-control border-primary" placeholder="Enter No Of Month" name="nomonth" required>
</div>
</div>

</div>

<div class="row">


<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="name"  class="form-control border-primary" placeholder="Name" name="name" required value="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="userinput3">Gender<b style="color:#FF0000;">*</b></label>
<select name="gender" id="gender" class="form-control border-primary" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="userinput3">Phone No<b style="color:#FF0000;">*</b></label>
<input type="tel" id="phone" class="form-control border-primary" placeholder="Phone No" name="phone" required maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Email<b style="color:#FF0000;">*</b></label>
<input type="email" id="email" class="form-control border-primary" placeholder="Email" name="email" required value="">
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Date of Birth<b style="color:#FF0000;">*</b></label>
<input type="date" name="dob" id="dob" class="form-control border-primary" placeholder="Enter date of Birth" required />
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Admission Date<b style="color:#FF0000;">*</b></label>
<input type="date" name="admission" id="admission" class="form-control border-primary" placeholder="Enter admission date" required />
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Session<b style="color:#FF0000;">*</b></label>
<select id="session"  class="form-control border-primary" name="session" required>
<option value="">Select Session</option>
<?php
$sql="SELECT * FROM `ab_session` ORDER BY `id` DESC "; 
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=mysqli_fetch_array($res)){
?>
<option value="<?=$fetch['id']?>"><?=ucwords($fetch['session'])?></option>
<?php }}?>
</select>

</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Father's Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="fname" class="form-control border-primary" placeholder="Father's Name" name="fname" required value="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Mother's Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="mname" class="form-control border-primary" placeholder="Mother's Name" name="mname" required value="">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Father's Phone No.</label>
<input type="tel" id="fnumber" class="form-control border-primary" placeholder="Father's Phone No." name="fnumber"  maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Mother's Phone No.</label>
<input type="tel" id="mnumber" class="form-control border-primary" placeholder="Mother's Phone No." name="mnumber"  maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Photo Upload<b style="color:#FF0000;"></b></label>
<input type="file" id="file" class="form-control-file" placeholder="Photo Upload" name="file" accept=".jpg,.png,.jpeg"  value="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Document Upload</label>
<input type="file" id="document" class="form-control-file" placeholder="Document Upload" name="document" accept=".jpg,.png,.jpeg,.docx,.pdf"  value="">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Address<b style="color:#FF0000;">*</b></label>
<input type="text" id="address" class="form-control border-primary" placeholder="Address" name="address" required value="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Referrance Name</label>
<input type="text" id="refname" class="form-control border-primary" placeholder="Referrance Name" name="refname"  value="">
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
$sql1="SELECT * FROM `ab_student` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);
?>
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Registration No already exists. </strong></div>
<?php } ?>
<form class="form" action="student-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>&reg=<?=$fetch1['registrationno']?>" method="post"  enctype="multipart/form-data">
<div class="form-body">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="admissionno">Admission No</label>
<input type="text" id="admissionno"  class="form-control border-primary" placeholder="Enter Admission No" name="admissionno" value="<?=$fetch1['admissionno']?>">
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="category">Category<b style="color:#FF0000;">*</b></label>
<strong>&nbsp; &nbsp; &nbsp; &nbsp; <span id="feeDiv" style="color:#FF0000; font-size:14px;"></span></strong>
<select class="form-control border-primary" required name="category" id="category">
<option value="">Select Category</option>
<?php 
$sqlx="SELECT * FROM `ab_course_category` ORDER BY `category` ";
$resx=query($conn,$sqlx);
$numx=numrows($resx);
if($numx>0){
while($fetchx=fetcharray($resx)){
?>
<option value="<?=$fetchx['id']?>"<?php if($fetchx['id']==$fetch1['course_cat']){echo'selected';}?>><?=$fetchx['category']?></option>
<?php }}?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Duration<b style="color:#FF0000;">*</b></label>
<select name="duration" id="duration" class="form-control border-primary" required onchange="getCourseList();">
<option value="">Select Duration</option>
<?php 
$sqlx1="SELECT * FROM `ab_duration` ORDER BY `duration` ";
$resx1=query($conn,$sqlx1);
$numx1=numrows($resx1);
if($numx1>0){
while($fetchx1=fetcharray($resx1)){
?>
<option value="<?=$fetchx1['id']?>"<?php if($fetch1['duration']==$fetchx1['id']){echo'selected';}?>><?=$fetchx1['duration']?></option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="course_category">Course<b style="color:#FF0000;">*</b></label>
<div id="courseDiv">
<select class="form-control border-primary" required name="course" id="course">
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$fetch1['course_cat']."'  ORDER BY `course`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"<?php if($fetchco['id']==$fetch1['course']){echo'selected';}?>><?=ucwords(strtolower($fetchco['course']))?> <?php if($fetchco['code']){?>(<?=$fetchco['code']?>)<?php }?></option>
<?php }}?>

</select>

</div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="addfees">Admission Fees<b style="color:#FF0000;">*</b></label>



<?php 
//echo getStudentAddmissionFeesStatus($conn,$fetch1['registrationno']);

if(getStudentAddmissionFeesStatus($conn,$fetch1['registrationno'])>0)
{?>
<div class="form-control border-primary" style="background:#EEEEEE">
<?=$fetch1['addfees']?>
</div>
<?php }else{?>
<input type="text" id="addfees"  class="form-control border-primary" placeholder="Admission Fees" name="addfees" required value="<?=$fetch1['addfees']?>">
<?php }?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">


<label for="mfees">Monthly Fees<b style="color:#FF0000;">*</b></label>


<?php 
//echo getStudentAddmissionFeesStatus($conn,$fetch1['registrationno']);

if(getStudentFeesStatus($conn,$fetch1['registrationno'])>0)
{?>


<div class="form-control border-primary" style="background:#EEEEEE">
<?=$fetch1['mfees']?></div>

<?php }else{?>

<input type="text" id="mfees"  class="form-control border-primary" placeholder="Monthly Fees" name="mfees" required value="<?=$fetch1['mfees']?>" >

<?php }?>

</div>
</div>

</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="startdate">Starting Date<b style="color:#FF0000;">*</b></label>
<input type="date" id="startdate"  class="form-control border-primary" name="startdate" required value="<?=$fetch1['startdate']?>" readonly="true">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="nomonth">No Of Month<b style="color:#FF0000;">*</b></label>
<input type="number" id="nomonth"  class="form-control border-primary" placeholder="Enter No Of Month" name="nomonth"  value="<?=$fetch1['nomonth']?>" required readonly="true">
</div>
</div>

</div>

<div class="row">


<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="name"  class="form-control border-primary" placeholder="Name" name="name" required value="<?=$fetch1['name']?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="userinput3">Gender<b style="color:#FF0000;">*</b></label>
<select name="gender" id="gender" class="form-control border-primary" required>
<option value="">Select Gender</option>
<option value="Male"<?php if($fetch1['gender']=='Male'){echo'selected';}?>>Male</option>
<option value="Female" <?php if($fetch1['gender']=='Female'){echo'selected';}?>>Female</option>
</select>
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="userinput3">Phone No<b style="color:#FF0000;">*</b></label>
<input type="tel" id="phone" class="form-control border-primary" placeholder="Phone No" name="phone" required value="<?=$fetch1['phone']?>" maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Email<b style="color:#FF0000;">*</b></label>
<input type="email" id="email" class="form-control border-primary" placeholder="Email" name="email" required value="<?=$fetch1['email']?>">
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Date of Birth<b style="color:#FF0000;">*</b></label>
<input type="date" name="dob" id="dob" class="form-control border-primary" placeholder="Enter date of Birth" required value="<?=$fetch1['dob']?>"/>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Admission Date<b style="color:#FF0000;">*</b></label>
<input type="date" name="admission" id="admission" class="form-control border-primary" placeholder="Enter admission date" required value="<?=$fetch1['admission']?>"/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput1">Session<b style="color:#FF0000;">*</b></label>
<select id="session"  class="form-control border-primary" name="session" required onchange="getFeesBox(this.value);">
<option value="">Select Session</option>
<?php
$sql="SELECT * FROM `ab_session` ORDER BY `id` DESC "; 
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=mysqli_fetch_array($res)){
?>
<option value="<?=$fetch['id']?>"<?php if($fetch1['session']==$fetch['id']){echo'selected';}?>><?=ucwords($fetch['session'])?></option>
<?php }}?>
</select>

</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Batch<b style="color:#FF0000;">*</b></label>
<select class="form-control border-primary" required name="batch" id="batch">
<option value="">Select Batch</option>
<?php 
$sqlc="SELECT * FROM `ab_batch` ORDER BY `id` DESC";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0){
while($fetchc=fetcharray($resc)){
?>
<option value="<?=$fetchc['id']?>" <?php if($fetch1['batch']==$fetchc['id']){echo'selected';}?>><?=$fetchc['batch']?></option>
<?php }}?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Father's Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="fname" class="form-control border-primary" placeholder="Father's Name" name="fname" required value="<?=$fetch1['fname']?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Mother's Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="mname" class="form-control border-primary" placeholder="Mother's Name" name="mname" required value="<?=$fetch1['mname']?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Father's Phone No.</label>
<input type="tel" id="fnumber" class="form-control border-primary" placeholder="Father's Phone No." name="fnumber"  value="<?=$fetch1['fnumber']?>" maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Mother's Phone No.</label>
<input type="tel" id="mnumber" class="form-control border-primary" placeholder="Mother's Phone No." name="mnumber"  value="<?=$fetch1['mnumber']?>" maxlength="10" pattern="[6-9][0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Photo Upload<b style="color:#FF0000;"></b></label>
<?php if($fetch['photo']){?>
<a href="file-download.php?f=<?=$fetch['photo']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a>
<?php }?>
<input type="file" id="file" class="form-control-file" placeholder="Photo Upload" name="file" accept=".jpg,.png,.jpeg" value="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Document Upload</label>
<?php if($fetch['document']){?>
<a href="file-download.php?f=<?=$fetch['document']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a>
<?php }?>
<input type="file" id="document" class="form-control-file" placeholder="Document Upload" name="document" accept=".jpg,.png,.jpeg,.docx,.pdf"  value="">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Address<b style="color:#FF0000;">*</b></label>
<input type="text" id="address" class="form-control border-primary" placeholder="Address" name="address" required value="<?=$fetch1['address']?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="userinput2">Referrance Name</label>
<input type="text" id="refname" class="form-control border-primary" placeholder="Referrance Name" name="refname"  value="<?=$fetch1['refname']?>">
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
