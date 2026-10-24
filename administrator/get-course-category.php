<?php
include('includes/function.php');

$session=$_REQUEST['session'];

$sql="SELECT DISTINCT `category` FROM `ab_course` WHERE `session`='".$session."' ORDER BY `category` ASC";
$res=query($conn,$sql);
$num=numrows($res);
?>

<option value="">Select Category</option>

<?php
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['category']?>"><?=getCourseCategory($conn,$fetch['category'],'category')?></option>
<?php
}
}
?>