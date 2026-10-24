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

$course=trim($_POST['course']);  

$course=mysqli_real_escape_string($conn,$course);  


/*-----------------------COURSE DATA-----------------------*/

$sql="SELECT * FROM `ab_course` WHERE `code`='".$course."'";  
$res=query($conn,$sql);  


if(numrows($res)>0)  
{  

$fetch=fetcharray($res);  

$course_id=$fetch['id'];  

$already=0;  


/*-----------------------CHECK LEVEL DESCRIPTION-----------------------*/

$sql1="SELECT * FROM `ab_course` WHERE `code`='".$course."'";  
$res1=query($conn,$sql1);  


while($fetch1=fetcharray($res1))  
{  

$level=$fetch1['level'];  


$sql2="SELECT * FROM `ab_level_description`  
WHERE `course`='".$course_id."'  
AND `level`='".$level."'";  

$res2=query($conn,$sql2);  


if(numrows($res2)>0)  
{  
$already=1;  
break;  
}  

}  


if($already==1)  
{  

redirect('course-description.php?case=add&m=1');  

}  
else  
{  


/*-----------------------INSERT LEVEL DESCRIPTION-----------------------*/

$sql3="SELECT * FROM `ab_course` WHERE `code`='".$course."'";  
$res3=query($conn,$sql3);  


while($fetch3=fetcharray($res3))  
{  

$level=$fetch3['level'];  


$duration=mysqli_real_escape_string($conn,trim($_POST['level_duration'][$level]));  

$description=mysqli_real_escape_string($conn,trim($_POST['description'][$level]));  

$age=mysqli_real_escape_string($conn,trim($_POST['age'][$level]));  


$sql4="INSERT INTO `ab_level_description`  
(`course`,`level`,`level_duration`,`description`,`age`)  
VALUES  
(  
'".$course_id."',  
'".$level."',  
'".$duration."',  
'".$description."',  
'".$age."'  
)";  


$res4=query($conn,$sql4);  

}  


redirect('course-description.php?case=add&s=1');  

}  

}  

}
if($_REQUEST['case']=='edit')  
{  

$course=mysqli_real_escape_string($conn,trim($_POST['course']));  


/*-----------------------GET COURSE ID-----------------------*/

$sql="SELECT * FROM `ab_course` WHERE `code`='".$course."'";  
$res=query($conn,$sql);  


if(numrows($res)>0)  
{  

$fetch=fetcharray($res);  

$course_id=$fetch['id'];  


/*-----------------------UPDATE COURSE DESCRIPTION-----------------------*/

$sql1="UPDATE `ab_level_description` SET   
`course`='".$course_id."',  
`level_duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."',  
`description`='".mysqli_real_escape_string($conn,trim($_POST['description']))."',  
`age`='".mysqli_real_escape_string($conn,trim($_POST['age']))."'  
WHERE `id`='".$_REQUEST['id']."'";   

$res1=query($conn,$sql1);   


redirect('view-course-description.php?page='.$_REQUEST['page']);  

}  

}

if($_REQUEST['case']=='delete')
{

$sql="delete from `ab_level_description` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('view-course-description.php?page='.$_REQUEST['page']);
}

}
?>