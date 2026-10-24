<?php
session_start();
include('../administrator/includes/function.php');

if($_SESSION['sid'])
{
$sqlch="SELECT * FROM `ab_student_application` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch>0)
{
$fetchch=fetcharray($resch);

$sql1="INSERT INTO `ab_student` (`franchise`,`name`,`coursecat`,`course`,`phone`,`address`,`age`,`dob`,`fname`,`mname`,`gender`,`religion`,`category`,`state`,`district`,`city`,`pincode`,`photo`,`identity`,`date`,`email`,`registration`,`duration`,`status`,`admission`,`certificate`,`approved`) VALUES('".input($fetchch['franchise'])."','".input($fetchch['name'])."','".input($fetchch['coursecat'])."','".input($fetchch['course'])."','".input($fetchch['phone'])."','".input($fetchch['address'])."','".input($fetchch['age'])."','".input($fetchch['dob'])."','".input($fetchch['fname'])."','".input($fetchch['mname'])."','".input($fetchch['gender'])."','".input($fetchch['religion'])."','".input($fetchch['category'])."','".input($fetchch['state'])."','".input($fetchch['district'])."','".input($fetchch['city'])."','".input($fetchch['pincode'])."','".input($fetchch['photo'])."','".input($fetchch['identity'])."','','".input($fetchch['date'])."','".input($fetchch['email'])."','','','I','','P','')";
$res1=query($conn,$sql1);
$tranid=mysqli_insert_id($conn);

if($tranid)
{
if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `ab_student_application` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('student-application.php?page='.$_REQUEST['page']);
}
else{
redirect('student-application.php?m=wrong&page='.$_REQUEST['page']);
}
}
}
}
?>
