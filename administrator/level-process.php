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
$sql="SELECT * FROM `ab_level` WHERE `level`='".mysqli_real_escape_string($conn,trim($_POST['course_level']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('level.php?case=add&m=1');
}
else
{
$sql1="INSERT INTO `ab_level` (`level`) values('".mysqli_real_escape_string($conn,trim($_POST['course_level']))."')";
$res1=query($conn,$sql1);

redirect('level.php?case=add&s=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_level` WHERE `level`='".mysqli_real_escape_string($conn,trim($_POST['course_level']))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('level.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page']);
}
else
{
$sql1="UPDATE `ab_level`  SET `level`='".mysqli_real_escape_string($conn,trim($_POST['course_level']))."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('view-level.php?page='.$_REQUEST['page']);
}
}

if($_REQUEST['case']=='delete')
{

$sql="DELETE FROM `ab_level` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('view-level.php?page='.$_REQUEST['page']);
}

}
?>