<?php
session_start();
include('includes/function.php');
if($_SESSION['fid']=='' && $_SESSION['sid']=='')
{
redirect('index.php');
}

if($_SESSION['sid'] || $_SESSION['fid'])
{

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}
$sql="UPDATE `ab_branch` SET `status`='".$st."' WHERE `id`='".base64_decode(mysqli_real_escape_string($conn,trim($_REQUEST['id'])))."'";
$res=query($conn,$sql);

redirect('view-branch.php');
}
}
?>