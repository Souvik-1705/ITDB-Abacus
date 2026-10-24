<?php
session_start(); 
include('includes/function.php');
if($_SESSION['fid']=='' && $_SESSION['sid']=='')
{
redirect('index.php');
}

if($_SESSION['sid'] || $_SESSION['fid'])
{
$sql="SELECT * FROM `ab_admin` WHERE `id`='".mysqli_real_escape_string($conn,$_SESSION['sid'])."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['current']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if($_POST['newpass']==$_POST['conpass'])
{
$sql="UPDATE `ab_admin` SET `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['password']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_SESSION['sid'])."'";
$res=query($conn,$sql);
redirect('change-password.php?n=2');
}else{
redirect('change-password.php?p=3');

}

}else{
redirect('change-password.php?m=1');
}}
?>