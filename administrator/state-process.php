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
$sql="SELECT * FROM `ab_state` WHERE `state`='".mysqli_real_escape_string($conn,input($_POST['state']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{
$sql1="INSERT INTO `ab_state` (`state`) VALUES('".input($_POST['state'])."')";
$res1=query($conn,$sql1); 
     
redirect('state.php?case=add&m=2');
}
else
{
redirect('state.php?case=add&e=1');
}
}
if($_REQUEST['case']=='edit')
{
$sql="UPDATE `ab_state` SET `state`='".input($_POST['state'])."' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('state.php');
}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_state` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('state.php');
}
}
?>