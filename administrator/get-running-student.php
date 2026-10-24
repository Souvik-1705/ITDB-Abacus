<?php
session_start();
include('includes/function.php');
?>
<script>
function getstatus(val,id)
{

window.location.href='student-status.php?st='+val+'&id='+id;
}
</script>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th>Sl_No.</th>
<th>Franchise</th>
<th>Registration_No</th>
<th>Course</th>
<th>Name</th>
<th>Phone</th>
<th>DOB</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ab_student';
$lim=100;
$tpage='student.php';
if($_SESSION['fid']){
$where="WHERE (`name` LIKE '%".$_REQUEST['val']."%' OR `phone` LIKE '%".$_REQUEST['val']."%' OR `registrationno` LIKE '%".$_REQUEST['val']."%' OR `email` LIKE '%".$_REQUEST['val']."%') AND `status`='R' AND `franchise`='".$_SESSION['fid']."' ORDER BY `id` DESC";
}else{
$where="WHERE (`name` LIKE '%".$_REQUEST['val']."%' OR `phone` LIKE '%".$_REQUEST['val']."%' OR `registrationno` LIKE '%".$_REQUEST['val']."%' OR `email` LIKE '%".$_REQUEST['val']."%') AND `status`='R' ORDER BY `id` DESC";
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
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower(getUser($conn,$fetch['franchise'],'bname')))?></td>
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['registrationno']){?><?=strtoupper($fetch['registrationno'])?><?php }else{ ?>----<?php } ?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower(getCourse($conn,$fetch['course'],'course')))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=ucwords(strtolower($fetch['name']))?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['phone']?></td>
<td style="margin:2px;padding:2px;" align="center"><?=$fetch['dob']?></td>
<td style="margin:2px;padding:2px;" align="center"><?php if($fetch['status']=='R'){?><span style="color:#FF0000;">Running</span><?php }?>
<select class="form-control border-primary"  id="status" name="status" onchange="getstatus(this.value,<?=$fetch['id']?>);"  required>
<option value="">Select One</option>
<option value="C">Completed</option>
<option value="D">Dropout</option>
</select>
</td>
<td style="margin:2px;padding:2px;" align="center">
<a href="view-student.php?id=<?=$fetch['id']?>" target="_blank"><img src="images/view.png" title="Student Details" height="22" width="22"></a>
<a href="student-add.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to edit this Student?');"><img src="images/edit.png" title="Edit" /></a>

<a href="student-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to delete this Student?');"><img src="images/delete.png" title="Delete" /></a>
</td>                              
</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>