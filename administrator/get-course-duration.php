
<?php
include('includes/function.php');

$code=mysqli_real_escape_string($conn,$_GET['code']);

$sql="SELECT * FROM `ab_course` WHERE `code`='".$code."' LIMIT 1";
$res=query($conn,$sql);

if(numrows($res)>0)
{
    $fetch=fetcharray($res);

    echo getDuration($conn,$fetch['duration']);
}
?>
