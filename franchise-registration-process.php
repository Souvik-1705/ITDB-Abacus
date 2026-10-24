<?php
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$sql="INSERT INTO `ab_fran_app` (`state`,`district`,`city`,`franchise`,`year`,`inststatus`,`inspo`,`insps`,`inspin`,`insaddress`,`insphone1`,`insphone2`,`insemail`,`pname`,`position`,`poffice`,`paddress`,`ppincode`,`ppstation`,`pphone`,`pemail`,`dob`,`nationality`,`religion`,`gender`,`date`,`status`) values ('".input($_POST['state'])."','".input($_POST['district'])."','".input($_POST['city'])."','".input($_POST['franchise'])."','".input($_POST['year'])."','".input($_POST['inststatus'])."','".input($_POST['inspo'])."','".input($_POST['insps'])."','".input($_POST['inspin'])."','".input($_POST['insaddress'])."','".input($_POST['insphone1'])."','".input($_POST['insphone2'])."','".input($_POST['insemail'])."','".input($_POST['pname'])."','".input($_POST['position'])."','".input($_POST['poffice'])."','".input($_POST['paddress'])."','".input($_POST['ppincode'])."','".input($_POST['ppstation'])."','".input($_POST['pphone'])."','".input($_POST['pemail'])."','".input($_POST['dob'])."','".input($_POST['nationality'])."','".input($_POST['religion'])."','".input($_POST['gender'])."','".date('Y-m-d')."','P')";

$res=query($conn,$sql);
$inid=mysqli_insert_id($conn);

redirect('print-franchise.php?id='.$id);
}
}
?>