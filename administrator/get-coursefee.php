<?php
session_start();
include('includes/function.php');
?>

<select name="duration" id="duration" class="form-control border-primary" required>
<option value="">Select Duration</option>
<?php
$sqlco="SELECT * FROM `ab_course` WHERE `id`='".$_REQUEST['id']."' ";
$resco=query($conn,$sqlco);
$numco=numrows($resco);
if($numco>0)
{
while($fetchco=fetcharray($resco))
{
?>
<option value="<?=$fetchco['id']?>"><?=ucwords(strtolower($fetchco['duration']))?> <?php if($fetchco['code']){?>(<?=$fetchco['code']?>)<?php }?></option>
<?php }}?>
</select>