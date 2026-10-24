<?php
session_start();
include('includes/function.php');
if($_SESSION['fid']=='' && $_SESSION['sid']=='')
{
redirect('index.php');
}

if($_SESSION['sid'] || $_SESSION['fid'])
{
if($_REQUEST['case']=='add')
{
$sql="SELECT * FROM `ab_admin` WHERE `username`='".base64_encode($_POST['uname'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('franchise-add.php?case=add&m=1');
}else{
$sql="INSERT INTO `ab_admin` (`username`,`password`,`franchise_code`,`name`,`phone`,`email`,`bname`,`type`,`date`,`status`) values ('".base64_encode(mysqli_real_escape_string($conn,trim($_POST['uname'])))."','".base64_encode(mysqli_real_escape_string($conn,trim($_POST['password'])))."','".mysqli_real_escape_string($conn,trim($_POST['franchise_code']))."','".mysqli_real_escape_string($conn,trim($_POST['name']))."','".mysqli_real_escape_string($conn,trim($_POST['phone']))."','".mysqli_real_escape_string($conn,trim($_POST['email']))."','".addslashes($_POST['bname'])."','F','".date('Y-m-d')."','A')";
$res=query($conn,$sql);
redirect('franchise.php');
}
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_admin` WHERE `username`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['uname'])))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('franchise-add.php?case=edit&id='.$_REQUEST['id'].'&m=1&page='.$_REQUEST['page']);
}
else
{
$sql="UPDATE `ab_admin`  SET `username`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['uname'])))."',`password`='".base64_encode(mysqli_real_escape_string($conn,trim($_POST['password'])))."',`franchise_code`='".mysqli_real_escape_string($conn,trim($_POST['franchise_code']))."',`name`='".mysqli_real_escape_string($conn,trim($_POST['name']))."',`phone`='".mysqli_real_escape_string($conn,trim($_POST['phone']))."',`email`='".mysqli_real_escape_string($conn,trim($_POST['email']))."',`bname`='".addslashes($_POST['bname'])."' WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('franchise.php?page='.$_REQUEST['page']);
}
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_admin` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('franchise.php?page='.$_REQUEST['page']);
}

if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}{
$sql="UPDATE `ab_admin` SET `status`='".$st."' WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('franchise.php?page='.$_REQUEST['page']);
}
}
?>