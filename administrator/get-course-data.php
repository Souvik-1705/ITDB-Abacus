<?php
include('includes/function.php');

$category=$_REQUEST['category'];
$duration=$_REQUEST['duration'];

$sql="SELECT * FROM `ab_course` WHERE `category`='".$category."' AND `duration`='".$duration."' GROUP BY `course_name` ORDER BY `id` ASC";
$res=query($conn,$sql);
$num=numrows($res);
?>

<option value="">Select Course</option>

<?php
if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<option value="<?=$fetch['id']?>"><?=$fetch['course_name']?> (<?=$fetch['code']?>)</option>

<?php
}
}
?>