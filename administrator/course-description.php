<?php
$left=5;
?>
<?php include('header.php') ?>

<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->
<script src="js/ajax.js" type="text/javascript"></script>
<script>

function getLevel(val)
{
xmlhttp.open('GET','get-level.php?course='+val);
xmlhttp.onreadystatechange=getLevelRequest;
xmlhttp.send();
}

function getLevelRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
document.getElementById('levelContainer').innerHTML=xmlhttp.responseText;
}
}
}
function getCourseDuration(code)
{
if(code=="")
{
document.getElementById('course_duration').value="";
return;
}

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function()
{
if(this.readyState==4 && this.status==200)
{
document.getElementById('course_duration').value=this.responseText;
}
};

xmlhttp.open("GET","get-course-duration.php?code="+encodeURIComponent(code),true);
xmlhttp.send();
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
<form class="form" action="course-description-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">


<div class="col-md-12">    
<div class="form-group">    
<label for="course">Course Name (Code)<b style="color:#FF0000;">*</b></label>

<select name="course" id="course" class="form-control border-primary" required onchange="getLevel(this.value); getCourseDuration(this.value);">
<option value="">Select Course</option>
<?php
$sqlx2="SELECT * FROM `ab_course` GROUP BY `code` ORDER BY `course_name` DESC";
$resx2=query($conn,$sqlx2);
$numx2=numrows($resx2);

if($numx2>0)
{
while($fetchx2=fetcharray($resx2))
{
?>

<option value="<?=$fetchx2['code']?>"><?=$fetchx2['course_name']?>(<?=$fetchx2['code']?>)</option>

<?php
}
}
?>
</select>

</div>    
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="course_duration">Course Duration</label>
        <input type="text" name="course_duration" id="course_duration" class="form-control border-primary" readonly placeholder="Course Duration">
    </div>
</div>

<div id="levelContainer"></div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
</div>
</form>


<?php }if($_REQUEST['case']=='edit'){
$sql1="SELECT * FROM `ab_level_description` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);

?>
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Course already exists. </strong></div>
<?php } ?>
<form class="form" action="course-description-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">
<div class="form-body">

<div class="col-md-12">     
<div class="form-group">     
<label for="course">Course Name (Code)<b style="color:#FF0000;">*</b></label>     
 
<select name="course" id="course" class="form-control border-primary" required onchange="getLevel(this.value)">   
 
<option value="">Select Course</option>  
  
<?php  
$sqlx2="SELECT * FROM `ab_course` GROUP BY `code` ORDER BY `course_name` DESC";  
$resx2=query($conn,$sqlx2);  
$numx2=numrows($resx2);  
  
if($numx2>0)  
{  
while($fetchx2=fetcharray($resx2))  
{  
?>  
  
<option value="<?=$fetchx2['code']?>"<?php if($fetch1['course']==$fetchx2['id']){echo'selected';}?>><?=$fetchx2['course_name']?> (<?=$fetchx2['code']?>)</option>  
  
<?php  
}  
}  
?>  
  
</select>  
</div>     
</div>
<div class="col-md-12"> 
<div class="form-group"> 
<label for="duration">Duration<b style="color:#FF0000;">*</b></label> 

<input type="text" name="duration" id="duration" class="form-control border-primary" value="<?=$fetch1['level_duration']?>" required>

</div> 
</div>



<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Description</label>
<textarea type="text" id="description"  class="form-control border-primary" placeholder="Description" name="description" ><?=$fetch1['description']?></textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">

<label for="age">Age <b style="color:#FF0000;">*</b></label>

<select name="age" id="age" class="form-control border-primary" required>

<option value="">Select Age</option>

<option value="1-2 Years"<?php if($fetch1['age']=="1-2 Years"){echo'selected';}?>>1-2 Years</option>

<option value="2-3 Years"<?php if($fetch1['age']=="2-3 Years"){echo'selected';}?>>2-3 Years</option>

<option value="3-4 Years"<?php if($fetch1['age']=="3-4 Years"){echo'selected';}?>>3-4 Years</option>

<option value="4-5 Years"<?php if($fetch1['age']=="4-5 Years"){echo'selected';}?>>4-5 Years</option>

<option value="5-6 Years"<?php if($fetch1['age']=="5-6 Years"){echo'selected';}?>>5-6 Years</option>

<option value="6-7 Years"<?php if($fetch1['age']=="6-7 Years"){echo'selected';}?>>6-7 Years</option>

<option value="7-8 Years"<?php if($fetch1['age']=="7-8 Years"){echo'selected';}?>>7-8 Years</option>

<option value="8-10 Years"<?php if($fetch1['age']=="8-10 Years"){echo'selected';}?>>8-10 Years</option>

</select>

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
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>


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
