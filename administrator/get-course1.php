<?php
session_start();
include('includes/function.php');
?>
 
<select name="course" id="course" class="form-control border-primary">
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$_REQUEST['cat']."' ORDER BY `course_name`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"<?php if($fetchco['id']==$_REQUEST['course']){echo'selected';}?>><?=ucwords(strtolower($fetchco['course']))?> (<?=$fetchco['code']?>)</option>
<?php }}?>
</select>