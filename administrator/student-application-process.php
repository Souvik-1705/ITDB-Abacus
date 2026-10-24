<?php 
session_start(); 
include('includes/function.php'); 

if(!isset($_SESSION['sid'])) 
{ 
redirect('index.php'); 
} 

if($_SESSION['sid']) 
{ 
if($_SERVER['REQUEST_METHOD']=='POST') 
{ 

if($_REQUEST['case']=='edit') 
{ 


if($_FILES['file']['name']) 
{ 
if(strpos($_FILES['file']['name'], 'php') == false) 
{ 
$rand=rand(1,999999); 
$target="../franchise/profile/"; 
$path=$rand.$_FILES['file']['name']; 
$ext=pathinfo($path,PATHINFO_EXTENSION); 

if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif') 
{ 
$target=$target.basename($path); 
move_uploaded_file($_FILES['file']['tmp_name'],$target); 

$sql1="UPDATE `ab_student_application` SET `photo`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'"; 
$res1=query($conn,$sql1); 
} 
} 
} 



$sql="UPDATE `ab_student_application` SET 
`franchise`='".input($_POST['franchise'])."',
`name`='".input($_POST['name'])."',
`age`='".input($_POST['age'])."',
`gender`='".input($_POST['gender'])."',
`fname`='".input($_POST['fname'])."',
`mname`='".input($_POST['mname'])."',
`phone`='".input($_POST['phone'])."',
`address`='".input($_POST['address'])."',
`city`='".input($_POST['city'])."',
`state`='".input($_POST['state'])."',
`district`='".input($_POST['district'])."',
`pincode`='".input($_POST['pincode'])."',
`religion`='".input($_POST['religion'])."',
`category`='".input($_POST['category'])."',
`dob`='".input($_POST['dob'])."',
`admission`='".input($_POST['admission'])."'
WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'"; 

$res=query($conn,$sql); 

redirect('student-application.php'); 
} 

} 
} 
?>