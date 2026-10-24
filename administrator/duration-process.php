<?php
session_start();
include('includes/function.php');
if($_SESSION['sid']=='' && $_SESSION['fid']=='')
{
redirect('index.php');
}

if($_SESSION['sid'] || $_SESSION['fid'])
{
if($_REQUEST['case']=='add')
{
$sql="SELECT * FROM `ab_duration` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."' AND `duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('duration.php?case=add&m=1');
}
else
{
$sql="INSERT INTO `ab_duration` (`category`,`duration`) values('".mysqli_real_escape_string($conn,trim($_POST['category']))."','".mysqli_real_escape_string($conn,trim($_POST['duration']))."')";
$res=query($conn,$sql);

redirect('duration.php?case=add&s=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_duration` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."' AND `duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('duration.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page']);
}
else
{
$sql1="UPDATE `ab_duration`  SET `category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."',`duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('view-duration.php?page='.$_REQUEST['page']);
}
}

if($_REQUEST['case']=='delete')
{
$sql="delete from `ab_duration` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);
redirect('view-duration.php?page='.$_REQUEST['page']);
}

}
?>