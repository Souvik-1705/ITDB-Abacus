<?php include('header.php'); 
$left=3;
?>
<script>
function getFranchiseSearch(val)
{
window.location.href='drop-student.php?act=search&fran='+val;
}
</script>
<script>
function getstatus(val,id,page)
{
window.location.href='student-status.php?st='+val+'&id='+id+'&page='+page;
}
</script>
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
<h4 class="card-title">View Dropout Student</h4>
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
<div class="col-md-5">&nbsp;</div>

<div class="col-md-2">
<div align="center">
<a href="export-drop-student-process.php" title="expot to excel"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%; margin-bottom:5px; margin-top:5px; margin-right:7%;"></a>
</div>
</div>

<form action="drop-student.php" method="post">
<div class="col-md-3">
<div style="padding:5px">
<input type="text" name="search" style="font-size:12px;width:100%" id="search" class="form-control border-primary" placeholder="Search By Name,Form No,Phone" value="<?=$_REQUEST['search']?>"/>
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
$tpage='drop-student.php';

if($_REQUEST['search']){
$where="WHERE (`name` LIKE '%".trim($_REQUEST['search'])."%' OR `phone` LIKE '%".trim($_REQUEST['search'])."%' OR `registrationno` LIKE '%".trim($_REQUEST['search'])."%' OR `email` LIKE '%".trim($_REQUEST['search'])."%') AND `status`='D' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='D' ORDER BY `id` DESC";
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
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['registrationno']){?><?=strtoupper($fetch['registrationno'])?><?php }else{ ?>----<?php } ?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords($fetch['name'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['phone']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>

<td style="margin:2px;padding:2px;" align="center"><?=stripslashes(date('d F Y',strtotime($fetch['admission'])))?></td>
<td style="margin:2px;padding:2px;" align="center">
<?php 
$page='L';
if(isset($_REQUEST['page'])){$page=$_REQUEST['page'];}else{$page=1;}

 if($fetch['status']=='D'){?><span style="color:#FF0000;">Dropout</span><?php }?>
<select class="form-control border-primary"  id="status" name="status" onchange="getstatus(this.value,<?=$fetch['id']?>,<?=$page?>);"  required>
<option value="">Select One</option>
<option value="R">Running</option>
</select>
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