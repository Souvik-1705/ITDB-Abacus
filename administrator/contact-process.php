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
$sql1="INSERT INTO `ab_contact` (`office`,`phone1`,`phone2`,`email1`,`email2`,`addline1`,`addline2`,`date`) VALUES('".trim($_POST['office'])."','".trim($_POST['phone1'])."','".trim($_POST['phone2'])."','".trim($_POST['email1'])."','".trim($_POST['email2'])."','".trim($_POST['address1'])."','".trim($_POST['address2'])."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);
   
redirect('contact.php?case=add&m=1');
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sqlu="UPDATE `ab_contact` SET `office`='".trim($_POST['office'])."',`phone1`='".trim($_POST['phone1'])."',`phone2`='".mysqli_real_escape_string($conn,$_POST['phone2'])."',`email1`='".mysqli_real_escape_string($conn,$_POST['email1'])."',`email2`='".mysqli_real_escape_string($conn,$_POST['email2'])."',`addline1`='".mysqli_real_escape_string($conn,$_POST['address1'])."',`addline2`='".mysqli_real_escape_string($conn,$_POST['address2'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$resu=query($conn,$sqlu);

redirect('contact.php?page='.$_REQUEST['page']);
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_contact` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('contact.php?page='.$_REQUEST['page']);
}
}
?>