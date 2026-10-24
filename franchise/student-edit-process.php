<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}

if($_SESSION['fid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='application')
{
$sql="UPDATE `ab_student_application` SET `name`='".input($_POST['name'])."',`phone`='".input($_POST['phone'])."',`address`='".input($_POST['address'])."',`age`='".input($_POST['age'])."',`dob`='".input($_POST['dob'])."',`fname`='".input($_POST['fname'])."',`mname`='".input($_POST['mname'])."',`gender`='".input($_POST['gender'])."',`religion`='".input($_POST['religion'])."',`category`='".input($_POST['category'])."',`course`='".input($_POST['course'])."',`duration`='".input($_POST['duration'])."',`state`='".input($_POST['state'])."',`district`='".input($_POST['district'])."',`city`='".input($_POST['city'])."',`pincode`='".input($_POST['pincode'])."',`email`='".input($_POST['email'])."',`admission`='".input($_POST['admission'])."' WHERE `id`='".input($_POST['id'])."' AND `franchise`='".input($_SESSION['fid'])."'";
$res=query($conn,$sql);

redirect('pending-student.php');
}else{
$sql2="UPDATE `ab_student` SET `name`='".input($_POST['name'])."',`phone`='".input($_POST['phone'])."',`address`='".input($_POST['address'])."',`age`='".input($_POST['age'])."',`dob`='".input($_POST['dob'])."',`fname`='".input($_POST['fname'])."',`mname`='".input($_POST['mname'])."',`gender`='".input($_POST['gender'])."',`religion`='".input($_POST['religion'])."',`category`='".input($_POST['category'])."',`course`='".input($_POST['course'])."',`duration`='".input($_POST['duration'])."',`state`='".input($_POST['state'])."',`district`='".input($_POST['district'])."',`city`='".input($_POST['city'])."',`pincode`='".input($_POST['pincode'])."',`email`='".input($_POST['email'])."',`admission`='".input($_POST['admission'])."' WHERE `id`='".input($_POST['id'])."' AND `franchise`='".input($_SESSION['fid'])."'";
$res2=query($conn,$sql2);

redirect('approve-student.php');
}
}
}
?>