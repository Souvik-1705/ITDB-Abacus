<?php include('header.php'); 
$left=3;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<style>
th{
text-align:center;
}

</style>

<!-- / main menu-->
<script>
function getFranchiseSearch(val)
{
window.location.href='total-student.php?act=search&fran='+val;
}
</script>
<script>
function getstatus(val,id)
{

window.location.href='student-status.php?st='+val+'&id='+id;
}
</script>
<script>
function getRunningStudent(val)
{
xmlhttp.open('GET','get-running-student.php?val='+val);
xmlhttp.onreadystatechange=getsendRequestKeyword2;
xmlhttp.send();
}
function getsendRequestKeyword2()
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
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Total Student</h4>
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
<div class="col-md-5"></div>

<div class="col-md-1">
<div align="center">
<a href="export-total-student-process.php" title="expot to excel"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%; margin-bottom:5px; margin-top:5px; margin-right:7%;"></a>
</div>

</div>

<form action="total-student.php" method="post">

<div class="col-md-4">
<div style="padding:5px">
<input type="text" placeholder="Enter Name, Registration No, Phone No" name="search" id="search" class="form-control border-primary" value="<?=$_REQUEST['search']?>" style="width:100%"/>
</div>
</div>


<div class="col-md-2">
<div style="padding:5px">
<input type="submit" value="Search"  class="btn btn-primary" style="width:100%"/>
</div>
</div>


</form>

</div>

<div class="table-responsive">
<div id="studentDiv">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th>Sl_No.</th>
<th>Rgistartion_no.</th>
<th>Course</th>
<th>Name</th>
<th>Phone</th>
<th>DOB</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php
$tname='ab_student';
$lim=100;
$tpage='student.php';
if($_REQUEST['search']){
$where="WHERE (`name` LIKE '%".trim($_REQUEST['search'])."%' OR `phone` LIKE '%".trim($_REQUEST['search'])."%' OR `registrationno` LIKE '%".trim($_REQUEST['search'])."%' OR `email` LIKE '%".trim($_REQUEST['search'])."%') ORDER BY `id` DESC";
}else{
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
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['registrationno']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower(getCourse($conn,$fetch['course'],'course')))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower($fetch['name']))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['phone']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['dob']?></td>
<td style="margin:2px;padding:2px;font-weight:bold;" align="center"><?php if($fetch['status']=='R'){?><span style="color:#00CC00;">Running</span><?php }?>
<?php if($fetch['status']=='C'){?><span style="color:#003399;">Completed</span><?php }?>
<?php if($fetch['status']=='D'){?><span style="color:#990000;">Dropout</span><?php }?>
</td>
<?php /*?><td style="margin:2px;padding:2px;" align="center">
<a href="view-student.php?id=<?=$fetch['id']?>" target="_blank"><img src="images/view.png" title="Student Details" height="22" width="22"></a>
<a href="student-add.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to edit this Student?');"><img src="images/edit.png" title="Edit" /></a>

<a href="student-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Student?');"><img src="images/delete.png" title="Delete" /></a>
</td><?php */?>                              
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