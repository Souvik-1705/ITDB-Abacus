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

$sql="SELECT * FROM `ab_course_fees` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."' AND `course`='".mysqli_real_escape_string($conn,trim($_POST['course']))."' AND `duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."'"; 
$res=query($conn,$sql); 
$num=numrows($res); 

if($num>0) 
{ 
redirect('course-fees.php?case=add&m=1'); 
} 
else 
{ 

$sql="INSERT INTO `ab_course_fees` (`session`,`category`,`duration`,`course`,`fees`,`date`) values('".mysqli_real_escape_string($conn,trim($_POST['session']))."','".mysqli_real_escape_string($conn,trim($_POST['category']))."','".mysqli_real_escape_string($conn,trim($_POST['duration']))."','".mysqli_real_escape_string($conn,trim($_POST['course']))."','".mysqli_real_escape_string($conn,trim($_POST['fees']))."','".date('Y-m-d')."')"; 
$res=query($conn,$sql); 

redirect('course-fees.php?case=add&s=1'); 
} 
} 


if($_REQUEST['case']=='edit') 
{ 

$sql="SELECT * FROM `ab_course_fees` WHERE `category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."' AND `course`='".mysqli_real_escape_string($conn,trim($_POST['course']))."' AND `duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."' AND `id`!='".$_REQUEST['id']."'"; 
$res=query($conn,$sql); 
$num=numrows($res); 

if($num>0) 
{ 
redirect('course-fees.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page']); 
} 
else 
{ 

$sql1="UPDATE `ab_course_fees` SET `session`='".mysqli_real_escape_string($conn,trim($_POST['session']))."',`category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."',`course`='".mysqli_real_escape_string($conn,trim($_POST['course']))."',`duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."',`fees`='".mysqli_real_escape_string($conn,trim($_POST['fees']))."' WHERE `id`='".$_REQUEST['id']."'"; 
$res1=query($conn,$sql1); 

redirect('view-course-fees.php?page='.$_REQUEST['page']); 
} 
} 


if($_REQUEST['case']=='delete') 
{ 

$sql="DELETE FROM `ab_course_fees` WHERE `id`='".$_REQUEST['id']."'"; 
$res=query($conn,$sql); 

redirect('view-course-fees.php?page='.$_REQUEST['page']); 
} 

} 
?>