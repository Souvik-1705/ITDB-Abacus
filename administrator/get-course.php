<?php
session_start();
include('includes/function.php');
?>
 
<select name="course" id="course" class="selectbox" onChange="getCourseDuration(this.value);" required>
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$_REQUEST['id']."' ORDER BY `course`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"><?=ucwords(strtolower($fetchco['course']))?> <?php if($fetchco['code']){?>(<?=$fetchco['code']?>)<?php }?></option>
<?php }}?>
</select>