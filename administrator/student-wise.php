<?php include('header.php'); 
$left=11;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script>
function getFranchiseSearch(val)
{
window.location.href='franchise-student-fees.php?act=search&fran='+val;
}
</script>
<script>
function getRunningStudent(val)
{
xmlhttp.open('GET','get-running-student-fees.php?val='+val);
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
<h4 class="card-title">Student Wise Fees</h4>
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
<table class="table table-bordered table-striped">
<tr>
<td width="692">&nbsp;</td>
<?php if($_SESSION['sid']){ ?>
<td width="278" align="right" style="padding:5px;">
<select name="franchise" id="franchise" class="form-control border-primary" style="width:270px;" required onChange="getFranchiseSearch(this.value)">
<option value="">Select Branches/Franchaises</option>
<?php
$sqlfr="SELECT * FROM `ab_admin` WHERE `type`='F' ORDER BY `bname`";
$resfr=query($conn,$sqlfr);
$numfr=numrows($resfr);
if($numfr>0)
{
while($fetchfr=fetcharray($resfr))
{
?>
<option value="<?=$fetchfr['id']?>"><?=ucwords(strtolower($fetchfr['bname']))?></option>
<?php }}?>
</select>
</td>
<?php } ?>
<td width="331" style="padding:5px;"><input type="text" name="search" id="search" class="form-control border-primary" placeholder="Search By Registration, Phone, Email" onKeyUp="getRunningStudent(this.value);"></td>
</tr>
</table>
<div class="table-responsive">
<div align="center">
<a href="export-running-student-fees.php" title="expot to excel"><img src="images/export-to-excel.png" height="40" width="40" style="border-radius:50%; margin-bottom:5px; margin-top:5px; margin-right:7%;"></a>
</div>
<div id="studentDiv">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th>Sl_No.</th>
<th>Branches/Franchaises</th>
<th>Registration_No</th>
<th>Name</th>
<th>Total_Fees</th>
<th>Paid_Fees</th>
<th>Due_Fees</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ab_student';
$lim=100;
$tpage='student-wise.php';
if($_SESSION['fid']){
$where="WHERE `status`='R' AND `franchise`='".$_SESSION['fid']."' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='R' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
$paidfees=getPaidFees($conn,$fetch['registrationno']);
$totfees=getCourseFees($conn,$fetch['session'],$fetch['course']);
$duefees=$totfees-$paidfees;
?>
<tr>
<td style="margin:2px;padding:2px;" align="center"><?=$i?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower(getUser($conn,$fetch['franchise'],'bname')))?></td>
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['registrationno']){?><?=strtoupper($fetch['registrationno'])?><?php }else{ ?>----<?php } ?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower($fetch['name']))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$totfees?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$paidfees?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$duefees?></td>
<td style="margin:2px;padding:2px;" align="center">
<a href="view-student-fees.php?id=<?=$fetch['id']?>" target="_blank"><img src="images/view.png" title="Fees Details" height="22" width="22"></a>
</td>                              
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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