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
$sql="SELECT * FROM `ab_district` WHERE `district`='".mysqli_real_escape_string($conn,input($_POST['district']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{
$sql1="INSERT INTO `ab_district` (`state`,`district`)values('".input($_REQUEST['state'])."','".input($_REQUEST['district'])."')";
$res1=query($conn,$sql1); 
     
redirect('district.php?case=add&m=2');
}else{
redirect('district.php?case=add&e=1');
}
}
if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `ab_district` SET `state`='".input($_POST['state'])."',`district`='".mysqli_real_escape_string($conn,input($_POST['district']))."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);

redirect('district.php?');
}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_district` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('district.php');
}
}
?>