<?php
include('includes/function.php');

$category=$_REQUEST['category'];

$sql="SELECT * FROM `ab_duration` WHERE `category`='".$category."' ORDER BY `id` ASC";
$res=query($conn,$sql);
$num=numrows($res);
?>

<option value="">Select Duration</option>

<?php
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['duration']?></option>
<?php
}
}
?>