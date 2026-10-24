<?php
session_start();
include('../administrator/includes/function.php');


if($_GET['code'])
{

$sql="SELECT * FROM `ab_franchise` WHERE `code`='".input(mysqli_real_escape_string($conn,$_GET['code']))."' AND `password`='".base64_encode(input(mysqli_real_escape_string($conn,$_GET['password'])))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['fid']=$fetch['id'];



redirect('dashboard.php');
}
}
?>