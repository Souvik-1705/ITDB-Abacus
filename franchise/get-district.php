<?php
session_start();
include('../administrator/includes/function.php');
?>
<select name="district" id="district" class="form-control" required>
<option value="">Select District</option>
<?php
$sqlci="SELECT * FROM `ab_district` WHERE `state`='".mysqli_real_escape_string($conn,trim(input($_REQUEST['stateid'])))."' ORDER BY `district`";
$resci=query($conn,$sqlci);
$numci=numrows($resci);
if($numci>0)
{
while($fetchci=fetcharray($resci))
{
?>
<option value="<?=$fetchci['id']?>"><?=ucwords(strtolower($fetchci['district']))?></option>
<?php }}?>
</select>