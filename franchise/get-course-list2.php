<?php
session_start();
include('../administrator/includes/function.php');
?>
<select name="course" id="course" class="form-group" onChange="getRegistration();" required/>
<option value="">Select Course</option>
<?php
$sqlcu="SELECT * FROM `ab_course` WHERE `category`='".mysqli_real_escape_string($conn,trim(input($_REQUEST['cat'])))."' AND `duration`='".mysqli_real_escape_string($conn,trim(input($_REQUEST['duration'])))."' GROUP BY `course_name` ORDER BY `id`";
$rescu=query($conn,$sqlcu);
$numcu=numrows($rescu);
if($numcu>0)
{
while($fetchcu=fetcharray($rescu))
{
?>
<option value="<?=$fetchcu['id']?>"><?=ucwords(($fetchcu['course_name']))?> (<?=$fetchcu['code']?>)</option>
<?php }}?>
</select>