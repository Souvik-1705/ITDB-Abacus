<?php
session_start();
include('administrator/includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}
if($_SESSION['sid'])
{
if($_REQUEST['case']=='examper')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `ab_student` SET `examper`='".$st."' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('registered-student.php');
}

}
?>