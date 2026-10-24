<?php
session_start();
include('../administrator/includes/function.php');
include('sms-gateway.php');

if($_SESSION['fid'])
{
$sqlt="SELECT * FROM `ab_student` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."' AND `franchise`='".mysqli_real_escape_string($conn,trim($_SESSION['fid']))."'";
$rest=query($conn,$sqlt);
$numt=numrows($rest);
if($numt>0)
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$franid=getStudent($conn,$_REQUEST['id'],'franchise');

$avamain=getAvailableBalance($conn,$franid);

$state=getFranchiseName($conn,$franid,'state');
$course=getStudent($conn,$_REQUEST['id'],'course');
$duration=getStudent($conn,$_REQUEST['id'],'duration');

$fees=getCourseFees($conn,$course,$duration);



if($fees>0)
{

/***************************************   Project START  *******************************************/

if($_POST['wallet']=='PROJECT' || $_POST['wallet']=='Project' || $_POST['wallet']=='project')
{
if($avaho>=$fees)
{
$franid=getStudent($conn,$_REQUEST['id'],'franchise');
$francode=strtoupper(getFranchiseName($conn,$franid,'code'));

$course=getStudent($conn,$_REQUEST['id'],'course');


$stuid=(1000+$_REQUEST['id']);
$registration=$francode.''.$stuid;

if($registration!='' && $francode!='')
{
$sql="UPDATE `ab_student` SET `status`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

$sqlup="UPDATE `ab_student` SET `registration`='".$registration."',`approved`='".date('Y-m-d')."' WHERE `id`='".trim($_REQUEST['id'])."'";
$resup=query($conn,$sqlup);


$sqlin="INSERT INTO `ab_student_approve` (`student`,`franchise`,`state`,`course`,`registration`,`amount`,`wallet`,`date`) VALUES('".mysqli_real_escape_string($conn,$_REQUEST['id'])."','".$franid."','".$state."','".$course."','".$registration."','".$fees."','PROJECT','".date('Y-m-d')."')";
$resin=query($conn,$sqlin);
redirect('approve-student.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}else{
redirect('approve-student.php?m=3&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}else{
redirect('approve-student.php?e=3&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}

/***************************************   Project END  *******************************************/


/***************************************   MAIN START  *******************************************/
if($_POST['wallet']=='Main')
{
if($avamain>=$fees)
{
$franid=getStudent($conn,trim($_REQUEST['id']),'franchise');

$francode=strtoupper(getFranchiseName($conn,$franid,'code'));



$course=getStudent($conn,trim($_REQUEST['id']),'course');


$stuid=(1000+trim($_REQUEST['id']));
$registration=$francode.''.$stuid;

if($registration!='' && $francode!='')
{
$sql="UPDATE `ab_student` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

$sqlup="UPDATE `ab_student` SET `registration`='".$registration."',`approved`='".date('Y-m-d')."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$resup=query($conn,$sqlup);


$sqlin="INSERT INTO `ab_student_approve` (`student`,`franchise`,`state`,`course`,`registration`,`amount`,`wallet`,`date`) VALUES('".mysqli_real_escape_string($conn,$_REQUEST['id'])."','".$franid."','".$state."','".$course."','".$registration."','".$fees."','Main','".date('Y-m-d')."')";
$resin=query($conn,$sqlin);


redirect('approve-student.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}else{
redirect('approve-student.php?m=3&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}else{
redirect('approve-student.php?e=1&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}

/***************************************   MAIN END  *******************************************/

}else{
redirect('approve-student.php?m=2&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}else{
redirect('approve-student.php?m=4&page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}
?>