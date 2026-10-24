<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{

if($_REQUEST['case']=='password')
{
$password=rand(111111,999999);

$sql3="UPDATE `ab_student` SET `exampass`='".$password."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('student.php');
}
}
?>