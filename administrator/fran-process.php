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
$password=rand(11111,99999);
$sql="INSERT INTO `ab_franchise` (`password`,`state`,`district`,`city`,`franchise`,`insaddress`,`inspin`,`insphone1`,`pname`,`position`,`paddress`,`pphone`,`pemail`,`date`,`insemail`,`status`,`code`,`year`,`inststatus`,`inspo`,`insps`,`insphone2`,`poffice`,`ppincode`,`ppstation`,`dob`,`nationality`,`religion`,`gender`) values('".base64_encode($password)."','".mysqli_real_escape_string($conn,input($_POST['state']))."','".mysqli_real_escape_string($conn,input($_POST['district']))."','".mysqli_real_escape_string($conn,input($_POST['city']))."','".mysqli_real_escape_string($conn,input($_POST['franchise']))."','".mysqli_real_escape_string($conn,input($_POST['insaddress']))."','".mysqli_real_escape_string($conn,input($_POST['inspin']))."','".mysqli_real_escape_string($conn,input($_POST['insphone1']))."','".mysqli_real_escape_string($conn,input($_POST['pname']))."','".mysqli_real_escape_string($conn,input($_POST['position']))."','".mysqli_real_escape_string($conn,input($_POST['paddress']))."','".mysqli_real_escape_string($conn,input($_POST['pphone']))."','".mysqli_real_escape_string($conn,input($_POST['pemail']))."','".date('Y-m-d')."','".mysqli_real_escape_string($conn,input($_POST['insemail']))."','A','','','','','','','','','','','','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);

$code=sprintf('%04d', $id);
$regcode="ITAB".$code;

$sqlup="UPDATE `ab_franchise` SET `code`='".$regcode."' WHERE `id`='".$id."'";
$resup=query($conn,$sqlup);

redirect('fran.php?case=add&m=2');
}

if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `ab_franchise` SET `password`='".base64_encode(input($_POST['password']))."',`state`='".mysqli_real_escape_string($conn,input($_POST['state']))."',`district`='".mysqli_real_escape_string($conn,input($_POST['district']))."',`city`='".mysqli_real_escape_string($conn,input($_POST['city']))."',`franchise`='".mysqli_real_escape_string($conn,input($_POST['franchise']))."',`insaddress`='".mysqli_real_escape_string($conn,input($_POST['insaddress']))."',`inspin`='".mysqli_real_escape_string($conn,input($_POST['inspin']))."',`insemail`='".mysqli_real_escape_string($conn,input($_POST['insemail']))."',`insphone1`='".mysqli_real_escape_string($conn,input($_POST['insphone1']))."',`pname`='".mysqli_real_escape_string($conn,input($_POST['pname']))."',`position`='".mysqli_real_escape_string($conn,input($_POST['position']))."',`pphone`='".mysqli_real_escape_string($conn,input($_POST['pphone']))."',`pemail`='".mysqli_real_escape_string($conn,input($_POST['pemail']))."',`paddress`='".mysqli_real_escape_string($conn,input($_POST['paddress']))."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('fran.php');
}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_franchise` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('fran.php');
}
else if($_REQUEST['st']=='A')
{
$st='P';

$sql="UPDATE `ab_franchise` SET `status`='".$st."' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('fran.php?page='.$_REQUEST['page']);
}
else if($_REQUEST['st']=='P')
{
$st='A';

$sql="UPDATE `ab_franchise` SET `status`='".$st."' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('fran.php?page='.$_REQUEST['page']);
}


}
?>