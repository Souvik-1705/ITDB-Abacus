<?php include('header.php');
$left=14;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<body>
<?php if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Franchise Application</h4>
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

<div align="center" style="padding:5px;">
    <form name="frm1" method="post" action="franchise-application.php?act=search" class="form-inline">
        <div style="display: flex; justify-content: center; gap: 5px; max-width: 380px;">
            <input type="text" name="search" id="search" class="form-control" value="<?=$_REQUEST['search']?>" placeholder="Franchise, Person, Phone, Email" style="width:250px;"required />
            <button type="submit" class="btn btn-primary">
                <i class="icon-search4"></i> Search
            </button>
        </div>
    </form>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="10%" align="center" valign="middle" class="header">Sl_No.</td>
<td width="13%" align="center" valign="middle" class="header">Franchise</td>
<td width="11%" align="center" valign="middle" class="header">Name</td>
<td width="12%" align="center" valign="middle" class="header">Email</td>
<td width="12%" align="center" valign="middle" class="header">Phone</td>
<td width="21%" align="center" valign="middle" class="header">Address</td>
<td width="12%" align="center" valign="middle" class="header">Status</td>
<td width="21%" align="center" valign="middle" class="header">Date</td>
<td width="9%" align="center" valign="middle" class="header">Action</td>
</tr>
</thead>
<tbody>
<?php
$tname='ab_fran_app';
$lim=100;
$tpage='franchise-application.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `franchise` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' OR `pname` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' OR `insphone1` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' OR `pphone` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' OR `insemail` LIKE '".mysqli_real_escape_string($conn,trim(input($_POST['search'])))."' ORDER BY `id` DESC";
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
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><?=output($fetch['franchise'])?> </td>
<td align="center" style="padding:2px;"><?=output($fetch['pname'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['insemail'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['insphone1'])?></td>
<td align="center" style="padding:2px;"><?=output($fetch['insaddress'])?></td>
<td align="center" style="padding:2px;">
<?php if($fetch['status']=='A'){?><img src="images/enable.gif" border="0" class="status" title="Active" /><?php }else{?><a href="fran-aap-process.php?id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to change the status?')"><img src="images/disable.gif" border="0" class="status" title="Inactive" /></a>
<?php }?>
</td>
<td align="center" style="padding:2px;"><?=$fetch['date']?></td>
<td align="center" valign="middle" style="padding:2px;"><a href="view-franapp.php?id=<?=$fetch['id']?>" style="cursor:pointer;"><img src="images/view.png" height="25" width="30" /></a>
<?php if($fetch['status']=='P'){ ?>
<a href="delete.php?case=franapp&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Franchise?')"><img src="images/delete.png" title="Delete" /></a>
<?php } ?>
</td>
</tr>
<?php $i++;}}else{?> 
<tr height="80">
<td align="center" valign="middle" class="table-border2" colspan="9"><p style="color:#FF0000;font-weight:bold;">No Records Found!</p></td>
</tr>
<?php }?>
</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>

</div>
</div>
</div>
</div>
</div>

</div>
</div>
<?php }?>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>