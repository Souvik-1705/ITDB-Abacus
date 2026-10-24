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
$sql="SELECT * FROM `ab_session` WHERE `session`='".mysqli_real_escape_string($conn,trim($_POST['course_session']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('session.php?case=add&m=1');
}
else
{
$sql1="INSERT INTO `ab_session` (`session`) values('".mysqli_real_escape_string($conn,trim($_POST['course_session']))."')";
$res1=query($conn,$sql1);

redirect('session.php?case=add&s=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_session` WHERE `session`='".mysqli_real_escape_string($conn,trim($_POST['course_session']))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('session.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page']);
}
else
{
$sql1="UPDATE `ab_session`  SET `session`='".mysqli_real_escape_string($conn,trim($_POST['course_session']))."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('view-session.php?page='.$_REQUEST['page']);
}
}

if($_REQUEST['case']=='delete')
{

$sql="DELETE FROM `ab_session` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('view-session.php?page='.$_REQUEST['page']);
}

}
?>