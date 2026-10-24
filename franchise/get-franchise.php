<?php
session_start();
include('../administrator/includes/function.php');
?>
<select name="franchise" id="franchise" class="form-group"required tabindex="3">
<option value="">Select Franchise</option>
<?php
$sqlf="SELECT * FROM `ab_franchise` WHERE `state`='".mysqli_real_escape_string($conn,trim(input($_REQUEST['sid'])))."' AND `district`='".mysqli_real_escape_string($conn,trim(input($_REQUEST['dist'])))."' ORDER BY `franchise`";
$resf=query($conn,$sqlf);
$numf=numrows($resf);
if($numf>0)
{
while($fetchf=fetcharray($resf))
{
?>
<option value="<?=$fetchf['id']?>"><?=ucwords(($fetchf['franchise']))?></option>
<?php }}?>
</select>