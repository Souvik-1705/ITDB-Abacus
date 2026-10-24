<?php
session_start(); 
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('../index.php');
}

if($_SESSION['fid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql="SELECT * FROM `ab_franchise` WHERE `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['current']))."' AND `id`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if($_POST['newpass']==$_POST['conpass'])
{
$sql="UPDATE `ab_franchise` SET `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['conpass']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."'";
$res=query($conn,$sql);
redirect('password.php?m=2');
}else{
redirect('password.php?m=3');
}
}else{
redirect('password.php?m=1');
}
}
}
?>