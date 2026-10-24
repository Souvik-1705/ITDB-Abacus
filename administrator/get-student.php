<?php
session_start();
include('includes/function.php');
?>


<select name="registration" id="registration" class="form-control border-primary" required>
<option value="">Select Student</option>
<?php
$sqlfr="SELECT * FROM `ab_student` WHERE `course_cat`='".$_REQUEST['cat']."' AND `course`='".$_REQUEST['corid']."' AND `status`='R' AND `actstatus`='A' ORDER BY `name`";
$resfr=query($conn,$sqlfr);
$numfr=numrows($resfr);
if($numfr>0)
{
while($fetchfr=fetcharray($resfr))
{
?>
<option value="<?=$fetchfr['registrationno']?>"><?=ucwords(strtolower($fetchfr['name']))?> (<?=$fetchfr['registrationno']?>)</option>
<?php }}?>
</select>
