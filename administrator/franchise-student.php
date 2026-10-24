<?php include('header.php'); 
$left=3;
?>

<script>
function getFranchiseSearch(val)
{
window.location.href='franchise-student.php?act=search&fran='+val;
}
</script>
<script>
function getstatus(val,id)
{

window.location.href='student-status.php?st='+val+'&id='+id;
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
<h4 class="card-title">View Running Student</h4>
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

<div class="table-responsive">

<table class="table table-bordered table-striped">
<tr>
<td align="right" style="padding:5px;">
<select name="franchise" id="franchise" class="form-control border-primary" style="width:270px;" required onChange="getFranchiseSearch(this.value)">
<option value="">Select Franchise</option>
<?php
$sqlfr="SELECT * FROM `ab_admin` WHERE `type`='F' ORDER BY `bname`";
$resfr=query($conn,$sqlfr);
$numfr=numrows($resfr);
if($numfr>0)
{
while($fetchfr=fetcharray($resfr))
{
?>
<option value="<?=$fetchfr['id']?>" <?php if($_REQUEST['fran']==$fetchfr['id']){ echo 'selected'; } ?>><?=ucwords(strtolower($fetchfr['bname']))?></option>
<?php }}?>
</select>
</td>
<td width="331" style="padding:5px;"><input type="text" name="search" id="search" class="form-control border-primary" placeholder="Search By Name, Registration, Phone, Email" onKeyUp="getRunningStudent(this.value);"></td>
</tr>
</table>

<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th>SL_No.</th>
<th>Franchise</th>
<th>Form_No</th>
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
$tpage='franchise-student.php';
$where="WHERE `status`='R' AND `franchise`='".$_REQUEST['fran']."' ORDER BY `id` DESC";
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>

<td><?=$i;?></td>
<td><?=getUser($conn,$fetch['franchise'],'bname')?></td>
<td><?php if($fetch['registrationno']){?><?=$fetch['registrationno']?><?php }else{ ?>----<?php } ?></td>

<td><?=ucwords($fetch['name'])?></td>
<td><?=$fetch['phone']?></td>
<td><?=getCourse($conn,$fetch['course'],'course')?></td>
<td><?=stripslashes(date('d F Y',strtotime($fetch['admission'])))?></td>

<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['status']=='R'){?><span style="color:#FF0000;">Running</span><?php }?>
<select class="form-control border-primary"  id="status" name="status" onchange="getstatus(this.value,<?=$fetch['id']?>);"  required>
<option value="">Select One</option>
<option value="C">Completed</option>
<option value="D">Dropout</option>
</select>
</td>

<td>

<a href="view-student.php?id=<?=$fetch['id']?>" style="cursor:pointer;"><img src="images/view.png" title="Student Details" height="22" width="22"></a>
<a href="student-add.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>&fran=<?=$_REQUEST['fran']?>" onClick="return confirm('Are you sure want to edit this Student?');"><img src="images/edit.png" title="Edit" /></a>

<a href="franchise-student-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>&fran=<?=$_REQUEST['fran']?>" onClick="return confirm('Are you sure want to delete this Student?');"><img src="images/delete.png" title="Delete" /></a>

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
