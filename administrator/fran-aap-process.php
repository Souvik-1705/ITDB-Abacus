<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['st']=='A'){$st='P';}else{$st='A';}
{
$sql="UPDATE `ab_fran_app` SET `status`='".$st."' WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

$sql1="SELECT * FROM `ab_fran_app` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);

$sql2="INSERT INTO `ab_franchise` (`state`,`district`,`city`,`franchise`,`year`,`inststatus`,`inspo`,`insps`,`inspin`,`insaddress`,`insphone1`,`insphone2`,`insemail`,`pname`,`position`,`poffice`,`paddress`,`ppincode`,`ppstation`,`pphone`,`pemail`,`dob`,`nationality`,`religion`,`gender`,`date`,`status`) values ('".input($fetch1['state'])."',
'".input($fetch1['district'])."',
'".input($fetch1['city'])."',
'".input($fetch1['franchise'])."',
'".input($fetch1['year'])."',
'".input($fetch1['inststatus'])."',
'".input($fetch1['inspo'])."',
'".input($fetch1['insps'])."',
'".input($fetch1['inspin'])."',
'".input($fetch1['insaddress'])."',
'".input($fetch1['insphone1'])."',
'".input($fetch1['insphone2'])."',
'".input($fetch1['insemail'])."',
'".input($fetch1['pname'])."',
'".input($fetch1['position'])."',
'".input($fetch1['poffice'])."',
'".input($fetch1['paddress'])."',
'".input($fetch1['ppincode'])."',
'".input($fetch1['ppstation'])."',
'".input($fetch1['pphone'])."',
'".input($fetch1['pemail'])."',
'".input($fetch1['dob'])."',
'".input($fetch1['nationality'])."',
'".input($fetch1['religion'])."',
'".input($fetch1['gender'])."',
'".date('Y-m-d')."','A')";
$res2=query($conn,$sql2);

$id=mysqli_insert_id($conn);

$code=sprintf('%04d', $id);
$regcode="ITAB".$code;

$password=rand(11111,99999);

$sqlup="UPDATE `ab_franchise` SET `code`='".$regcode."',`password`='".base64_encode($password)."' WHERE `id`='".$id."'";
$resup=query($conn,$sqlup);

}

redirect('franchise-application.php?page='.$_REQUEST['page']);
}
}
?>