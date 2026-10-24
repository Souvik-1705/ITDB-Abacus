<?php include('header.php'); 
$left=2;
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
<h4 class="card-title">View Franchise</h4>
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
<thead class="bg-teal bg-lighten-4">
<tr>
<th>Sl_No.</th>
<th>Code</th>
<th>Username</th>
<th>Password</th>
<th>Business</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ab_admin';
$lim=100;
$tpage='franchise.php';
$where="WHERE `type`='F' ORDER BY `id` DESC";

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
<td style="margin:2px;padding:2px;" align="center"><?=strtoupper($fetch['franchise_code'])?></td>

<td style="margin:2px;padding:2px;" align="center"><?=base64_decode($fetch['username'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=base64_decode($fetch['password'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords($fetch['bname'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords($fetch['name'])?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['phone']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['email']?></td>
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['status']=='A'){?>
<a href="franchise-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to change the status?')">
<span style="color:#00CC00;" >Active</span></a>
<?php }else{?><a href="franchise-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to change the status?')"> <span style="color:#FF0000;">Inactive</span></a><?php }?></td>

<td style="margin:2px;padding:2px;" align="center"><a href="franchise-add.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to edit this Franchise?');"><img src="images/edit.png" title="Edit" /></a> &nbsp;
<?php if($fetch['status']=='I'){ ?>
<a href="franchise-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Franchise?');"><img src="images/delete.png" title="Delete" /></a>
<?php } ?></td>  
</tr>

<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
