<?php
session_start();
include('includes/function.php');

if($_SESSION['fid'] || $_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{
$sql="INSERT INTO `ab_student` (`franchise`,`name`,`address`,`phone`,`email`,`course`,`duration`,`dob`,`admission`,`gender`,`date`,`branch`,`registrationno`,`registrationno_old`,`admissionno`,`course_cat`,`mfees`,`addfees`,`nomonth`,`startdate`,`session`,`batch`,`fname`,`mname`,`fnumber`,`mnumber`,`photo`,`document`,`refname`,`status`,`actstatus`,`remarks`) values('".mysqli_real_escape_string($conn,trim($_POST['franchise']))."','".mysqli_real_escape_string($conn,trim($_POST['name']))."','".mysqli_real_escape_string($conn,trim($_POST['address']))."','".mysqli_real_escape_string($conn,trim($_POST['phone']))."','".mysqli_real_escape_string($conn,trim($_POST['email']))."','".mysqli_real_escape_string($conn,trim($_POST['course']))."','".mysqli_real_escape_string($conn,trim($_POST['duration']))."','".mysqli_real_escape_string($conn,trim($_POST['dob']))."','".mysqli_real_escape_string($conn,trim($_POST['admission']))."','".mysqli_real_escape_string($conn,trim($_POST['gender']))."','".date('Y-m-d')."',0,'','','','',0,0,0,0,'',0,0,'','','','','','','','R','A','')";
$res=query($conn,$sql);

redirect('franchise-student.php?fran='.$_REQUEST['fran']);
}

if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ab_student` WHERE `registrationno`='".mysqli_real_escape_string($conn,trim($_POST['registrationno']))."' AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('student-add.php?case=edit&m=1&id='.$_REQUEST['id'].'&page='.$_REQUEST['page'].'&fran='.$_REQUEST['fran']);
}
else
{
$sql="UPDATE `ab_student` SET `franchise`='".mysqli_real_escape_string($conn,trim($_SESSION['fid']))."',`registrationno`='".mysqli_real_escape_string($conn,trim($_POST['registrationno']))."',`name`='".mysqli_real_escape_string($conn,trim($_POST['name']))."',`gender`='".mysqli_real_escape_string($conn,trim($_POST['gender']))."',`address`='".mysqli_real_escape_string($conn,trim($_POST['address']))."',`phone`='".mysqli_real_escape_string($conn,trim($_POST['phone']))."',`dob`='".mysqli_real_escape_string($conn,trim($_POST['dob']))."',`email`='".mysqli_real_escape_string($conn,trim($_POST['email']))."',`course`='".mysqli_real_escape_string($conn,trim($_POST['course']))."',`duration`='".mysqli_real_escape_string($conn,trim($_POST['duration']))."',`admission`='".mysqli_real_escape_string($conn,trim($_POST['admission']))."' WHERE `id`='".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('franchise-student.php?page='.$_REQUEST['page'].'&fran='.$_REQUEST['fran']);
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_student` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('franchise-student.php?page='.$_REQUEST['page'].'&fran='.$_REQUEST['fran']);
}

if($_REQUEST['st']=='R'){$st='C';}else{$st='R';}{
$sql="UPDATE `ab_student` SET `status`='".$st."' WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('franchise-student.php?page='.$_REQUEST['page'].'&fran='.$_REQUEST['fran']);
}

}

?>