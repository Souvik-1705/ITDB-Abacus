<?php include('header.php'); 
$left=5;
?>
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
<h4 class="card-title">View Course Fees</h4>
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
<thead class="bg-teal bg-lighten-4"><tr>
<th width="109" >Sl_No.</th>
<th scope="col">Session</th>
<th scope="col">Category</th>
<th scope="col">Duration</th>
<th scope="col">Course</th>
<th scope="col">Fees</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='ab_course_fees';
$lim=100;
$tpage='view-course-fees.php';

$where="ORDER BY `id`";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>

<tr>
<th scope="row"style="margin:2px;padding:2px;" align="center"><?=$i?></th>

<td style="margin:2px;padding:2px;" align="center"><?=getSession($conn,$fetch['session'],'session')?></td>
<td style="margin:2px;padding:2px;" align="center"><?=(getCourseCategory($conn,$fetch['category'],'category'))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=getDuration($conn,$fetch['duration'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=getCourseName($conn,$fetch['course'],'course_name')?>(<?=getCourseName($conn,$fetch['course'],'code')?>)</td>
<td style="margin:2px;padding:2px;" align="center"><?=output($fetch['fees'])?></td>
<td style="margin:2px;padding:2px;" align="center" style="white-space:nowrap">
<a href="course-fees.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a>&nbsp;
<a href="course-fees-process.php?case=delete&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to delete this?')"><img src="images/delete.png" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="11" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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