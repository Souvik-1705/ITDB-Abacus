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
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql1="UPDATE `ab_student` SET `photo`='".$path."' WHERE `id`='".mysqli_escape_string($conn,input($_REQUEST['id']))."'";
$res1=query($conn,$sql1);
}
}
}

$sql="UPDATE `ab_student` SET `franchise`='".input($_POST['franchise'])."',`district`='".input($_POST['district'])."',`city`='".input($_POST['city'])."',`religion`='".input($_POST['religion'])."',`name`='".input($_POST['name'])."',`fname`='".input($_POST['fname'])."',`mname`='".input($_POST['mname'])."',`dob`='".input($_POST['age'])."',`pincode`='".input($_POST['pincode'])."',`phone`='".input($_POST['phone'])."',`address`='".input($_POST['address'])."',`admission`='".$_POST['admission']."',`gender`='".input($_POST['gender'])."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('student-certified.php');
}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_student` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

if($_REQUEST['reg'])
{

$sql3="DELETE FROM `ab_student_approve` WHERE `registration`='".trim(mysqli_real_escape_string($conn,$_REQUEST['reg']))."'";
$res3=query($conn,$sql3);
}

redirect('student-certified.php');
}
}
?>