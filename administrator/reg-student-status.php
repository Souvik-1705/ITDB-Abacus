<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{
if($_REQUEST['case']=='examper')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `ab_student` SET `examper`='".$st."' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('student.php');
}

}

?>
