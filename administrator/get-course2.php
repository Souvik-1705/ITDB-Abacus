<?php
session_start();
include('includes/function.php');
?>
 
<select name="course1" id="course1" class="form-control border-primary" required>
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$_REQUEST['cat2']."' ORDER BY `course_name`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"<?php if($fetchco['id']==$_REQUEST['course1']){echo'selected';}?>><?=ucwords(strtolower($fetchco['course']))?> (<?=$fetchco['code']?>)</option>
<?php }}?>
</select>