<?php
session_start();
include('includes/function.php');
if($_SESSION['sid']=='')
{
redirect('index.php');
}

if($_SESSION['sid'] || $_SESSION['fid'])
{
if($_REQUEST['case']=='add')
{
$sql="SELECT * FROM `ab_course_category` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['course_category']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('category.php?case=add&m=1');
}
else
{
$sql="INSERT INTO `ab_course_category` (`category`) values('".mysqli_real_escape_string($conn,trim($_POST['course_category']))."')";
$res=query($conn,$sql);

redirect('category.php?case=add&s=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_course_category` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['course_category']))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('category.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page']);
}
else
{
$sql1="UPDATE `ab_course_category`  SET `category`='".mysqli_real_escape_string($conn,trim($_POST['course_category']))."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('view-category.php?page='.$_REQUEST['page']);
}
}

if($_REQUEST['case']=='delete')
{

$sql="delete from `ab_course_category` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('view-category.php?page='.$_REQUEST['page']);
}

}
?>