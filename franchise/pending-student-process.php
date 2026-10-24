<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}

if($_SESSION['fid'])
{
if($_REQUEST['val']=='Reject')
{
$sql="DELETE FROM `ab_student_application` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('pending-student.php');
}

if($_REQUEST['val']=='Accept')
{
$sql="SELECT * FROM `ab_student_application` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."' AND `franchise`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$sqlup="UPDATE `ab_student_application` SET `status`='A' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$resup=query($conn,$sqlup);

$sql1="INSERT INTO `ab_student`(`franchise`,`name`,`coursecat`,`course`,`duration`,`phone`,`address`,`age`,`dob`,`fname`,`mname`,`gender`,`religion`,`category`,`state`,`district`,`city`,`pincode`,`photo`,`identity`,`date`,`status`,`certificate`,`admission`,`email`,`registration`,`approved`) values('".input($fetch['franchise'])."','".input($fetch['name'])."','".input($fetch['coursecat'])."','".input($fetch['course'])."','".input($fetch['duration'])."','".input($fetch['phone'])."','".input($fetch['address'])."','".input($fetch['age'])."','".input($fetch['dob'])."','".input($fetch['fname'])."','".input($fetch['mname'])."','".input($fetch['gender'])."','".input($fetch['religion'])."','".input($fetch['category'])."','".input($fetch['state'])."','".input($fetch['district'])."','".input($fetch['city'])."','".input($fetch['pincode'])."','".input($fetch['photo'])."','".input($fetch['identity'])."','".date('Y-m-d')."','I','P','".input($fetch['admission'])."','".input($fetch['email'])."','','')";
$res1=query($conn,$sql1);
}
}

redirect('pending-student.php');
}

}
?>