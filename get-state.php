<?php
session_start();
include('administrator/includes/function.php');
?>
<select name="district" id="district" style="width:250px;height:26px" class="selectboxsmall">
<option value="">Select District</option>
<?php
$sqlci="SELECT * FROM `ab_district` WHERE `state`='".input($_REQUEST['sid'])."' ORDER BY `district`";
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