<?php
session_start();
include('administrator/includes/function.php');


if($_SERVER['REQUEST_METHOD']=='POST')
{
if(strtolower(trim($_POST['captcha'])) == strtolower(trim($_SESSION['captcha'])))
{


$sql="SELECT * FROM `ab_franchise` WHERE `code`='".input(mysqli_real_escape_string($conn,$_POST['code']))."' AND `password`='".base64_encode(input(mysqli_real_escape_string($conn,$_POST['password'])))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['fid']=$fetch['id'];



redirect('franchise/dashboard.php');
}else{
redirect('franchise-login.php?m=1');
}
}
else{
redirect('franchise-login.php?m=2');
}
}
?>