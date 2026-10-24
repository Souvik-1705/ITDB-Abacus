<?php 
session_start();  
include('includes/function.php'); 
error_reporting(0); 

$stdate=getRenewalDate($conn); 
$today=date('Y-m-d'); 
$nodays=(strtotime($stdate)-strtotime($today)); 
$day=round($nodays/86400); 

if($_SERVER['REQUEST_METHOD']=='POST') 
{ 

if($day>0) 
{ 

$sql="SELECT * FROM `ab_admin` WHERE `uname`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['uname'])))."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['password'])))."' AND `status`='A'"; 

$res=query($conn,$sql); 
$num=numrows($res); 

if($num>0) 
{ 

$fetch=fetcharray($res); 

$_SESSION['sid']=$fetch['id']; 

if(isset($_SESSION['fid'])) 
{ 
unset($_SESSION['fid']); 
} 

redirect('dashboard.php'); 

} 
else 
{ 
redirect('index.php?e=1'); 
} 

} 
else 
{ 
redirect('index.php?p=1'); 
} 

} 
?>