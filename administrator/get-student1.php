<?php
session_start();
include('includes/function.php');
?>
<input list="stu_list" id="registration" name="registration" required  class="form-control border-primary"  placeholder="Enter Registration" value="" >  
<datalist id="stu_list">
<?php 
$sql="SELECT * FROM `ab_student` WHERE `course_cat`='".$_REQUEST['cat']."' AND `course`='".$_REQUEST['corid']."' AND `session`='".$_REQUEST['session']."' AND `status` IN ('R','C') AND `actstatus`='A' ORDER BY `name`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0){
while($fetch=fetcharray($res)){
?>
<option value="<?=$fetch['registrationno']?>" ><?=strtoupper($fetch['name'])?></option>

<?php }}?>
</datalist>

 