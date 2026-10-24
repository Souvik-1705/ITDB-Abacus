<?php
session_start();
include('includes/function.php');
?>

<select class="form-control border-primary" required name="course" id="course" onchange="getStudent();">
<option value="">Select Course</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `category`='".$_REQUEST['cat']."' ORDER BY `course`";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"><?=strtoupper($fetchco['course'])?> <?php if($fetchco['code']){?>(<?=$fetchco['code']?>)<?php }?></option>
<?php }}?>
</select>