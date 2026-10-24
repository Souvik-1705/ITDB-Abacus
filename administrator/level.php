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


<h4 class="card-title" id="basic-layout-colored-form-control"><?php if($_REQUEST['case']=='add'){?>New Session<?php }else{ ?> Edit Session <?php } ?></h4>
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
<?php if(isset($_REQUEST['s'])==1){?><p align="center" style="color:#00CC00; padding-bottom:4px;">Added Succesfully</p><?php }?>
<?php if($_REQUEST['m']==1){ ?>

<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Session already exists. </strong></div>
<?php } ?>
<form class="form" action="level-process.php?case=add" method="post">
<div class="form-body">

<div class="row">
<div class="col-md-12">
<div class="form-group"> 
<label for="userinput1">Level<b style="color:#FF0000;">*</b></label> 

<select name="course_level" id="course_level" class="form-control border-primary" required>
<option value="">Select Level</option>
<option value="1">Level-1</option>
<option value="2">Level-2</option>
<option value="3">Level-3</option>
<option value="4">Level-4</option>
<option value="5">Level-5</option>
</select>

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
$sql1="SELECT * FROM `ab_level` WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);
?>
<?php if($_REQUEST['m']==1){ ?>
<div align="center" style="padding-bottom:12px; color:#FF0000;"><strong>Level already exists. </strong></div>
<?php } ?>
<form class="form" action="level-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Level<b style="color:#FF0000;">*</b></label>
<select name="course_level" id="course_level" class="form-control border-primary" required>
<option value="">Select Level</option>
<option value="1"<?php if($fetch1['level']==1){echo'selected';}?>>Level-1</option>
<option value="2"<?php if($fetch1['level']==2){echo'selected';}?>>Level-2</option>
<option value="3"<?php if($fetch1['level']==3){echo'selected';}?>>Level-3</option>
<option value="4"<?php if($fetch1['level']==4){echo'selected';}?>>Level-4</option>
<option value="5"<?php if($fetch1['level']==5){echo'selected';}?>>Level-5</option>
</select>
</div>
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
