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
$course_code=mysqli_real_escape_string($conn,trim($_POST['course_code']));

$sql_check="SELECT * FROM `ab_course` WHERE `code`='".$course_code."'";
$res_check=query($conn,$sql_check);

if(numrows($res_check)>0)
{
redirect('course.php?case=add&m=1');
}
else
{
/*-----------------------STart OF file CODE-----------*/
$image="";
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="course/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
foreach($_POST['level'] as $level)
{
    $level=mysqli_real_escape_string($conn,$level);

$sql="INSERT INTO `ab_course` (`session`,`category`,`duration`,`course_name`,`code`,`level`,`image`,`date`) values('".mysqli_real_escape_string($conn,trim($_POST['session']))."','".mysqli_real_escape_string($conn,trim($_POST['category']))."','".mysqli_real_escape_string($conn,trim($_POST['duration']))."','".mysqli_real_escape_string($conn,trim($_POST['course_name']))."','".mysqli_real_escape_string($conn,trim($_POST['course_code']))."','".$level."','".$path."','".date('Y-m-d')."')";
$res=query($conn,$sql);
}
redirect('course.php?case=add&s=1');
}
}
if($_REQUEST['case']=='edit') 
{ 
/*-----------------------STart OF file CODE-----------*/ 
if($_FILES['file']['name']) 
{ 
if(strpos($_FILES['file']['name'], 'php') == false) 
{ 
$rand=rand(1,999999); 
$target="course/"; 
$path=$rand.$_FILES['file']['name']; 
$ext = pathinfo($path, PATHINFO_EXTENSION); 
 
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif') 
{ 
$target=$target.basename($path); 
move_uploaded_file($_FILES['file']['tmp_name'], $target); 

$sql1="UPDATE `ab_course` SET `image`='".$path."' WHERE `id`='".mysqli_escape_string($conn,input($_REQUEST['id']))."'"; 
$res1=query($conn,$sql1); 
} 
} 
} 


$sql1="UPDATE `ab_course` SET  
`session`='".mysqli_real_escape_string($conn,trim($_POST['session']))."', 
`category`='".mysqli_real_escape_string($conn,trim($_POST['category']))."', 
`code`='".mysqli_real_escape_string($conn,trim($_POST['course_code']))."', 
`course_name`='".mysqli_real_escape_string($conn,trim($_POST['course_name']))."'
WHERE `id`='".$_REQUEST['id']."'";  

$res1=query($conn,$sql1);
redirect('view-course.php?page='.$_REQUEST['page']); 
} 
 



if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_course` WHERE `id` = '".$_REQUEST['id']."' "; 
$res=query($conn,$sql);

redirect('view-course.php?page='.$_REQUEST['page']);
}
}
?>