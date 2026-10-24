<?php include('header.php'); 
$left=3;
?>
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
<h4 class="card-title">View Student Details</h4>
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
<table class="table table-bordered table-striped" >
<thead class="bg-teal bg-lighten-4">
<tr >
<th style="text-align:center">Sl_No.</th>
<th style="text-align:center">Session</th>
<th style="text-align:center">Name</th>
<th style="text-align:center">Registration_No</th>
<th style="text-align:center">Email</th>
<th style="text-align:center">Phone</th>
<th style="text-align:center">Category</th>
<th style="text-align:center">Course</th>
<th style="text-align:center">Admission_Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ab_student';
$lim=100;
$tpage='view-course-student.php';
if($_REQUEST['search']){
$where="WHERE (`name` LIKE '%".trim($_REQUEST['search'])."%' OR `phone` LIKE '%".trim($_REQUEST['search'])."%' OR `registrationno` LIKE '%".trim($_REQUEST['search'])."%' OR `email` LIKE '%".trim($_REQUEST['search'])."%') AND `status`='R' ORDER BY `id` DESC";
}else{
$where="WHERE `course`='".$_REQUEST['id']."' AND `status`='R'  ORDER BY `course` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr >
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=getSession($conn,$fetch['session'],'session')?></td>

<td style="margin:2px;padding:2px;text-align:center" align="center"><?=$fetch['name']?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=ucwords(strtolower($fetch['registrationno']))?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=ucwords(strtolower($fetch['email']))?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=ucwords(strtolower($fetch['phone']))?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=ucwords(strtolower(getCourseCategory($conn,$fetch['course_cat'],'category')))?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=ucwords(strtolower(getCourse($conn,$_REQUEST['id'],'course')))?></td>
<td style="margin:2px;padding:2px;text-align:center" align="center"><?=$fetch['admission']?></td>
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