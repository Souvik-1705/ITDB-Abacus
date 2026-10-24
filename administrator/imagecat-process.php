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
if($_REQUEST['case']=='add')
{
$sql1="INSERT INTO `ab_image_category` (`category`) VALUES('".input($_POST['category'])."')";
$res1=query($conn,$sql1); 
     
redirect('imagecat.php?case=add&m=2');
}


if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `ab_image_category` SET `category`='".input($_POST['category'])."'WHERE `id`='".input($_REQUEST['id'])."'";
$res2=query($conn,$sql2);

redirect('imagecat.php');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_image_category` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('imagecat.php');
}
}
?>