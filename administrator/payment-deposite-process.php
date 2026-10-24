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
$sql1="INSERT INTO `ab_payment_deposit` (`franchise`,`wallet`,`amount`,`remarks`,`aproved`,`date`)values('".input($_REQUEST['franchise'])."','".input($_REQUEST['wallet'])."','".input($_REQUEST['amount'])."','".input($_REQUEST['remarks'])."','','".date('Y-m-d')."')";
$res1=query($conn,$sql1); 
     
redirect('payment-deposite.php?case=add&m=2');
}
if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `ab_payment_deposit` SET `franchise`='".input($_POST['franchise'])."',`wallet`='".mysqli_real_escape_string($conn,input($_POST['wallet']))."',`amount`='".mysqli_real_escape_string($conn,input($_POST['amount']))."',`remarks`='".mysqli_real_escape_string($conn,input($_POST['remarks']))."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);

redirect('payment-deposite.php');
}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_payment_deposit` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('payment-deposite.php');
}
}
?>