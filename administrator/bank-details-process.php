<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="bankqrcode/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
$sql1="INSERT INTO `ab_bank_details` (`bname`,`name`,`branch`,`ifscode`,`accno`,`qrcode`,`date`) VALUES('".input($_POST['bname'])."','".mysqli_real_escape_string($conn,input($_POST['name']))."','".mysqli_real_escape_string($conn,input($_POST['branch']))."','".mysqli_real_escape_string($conn,input($_POST['ifscode']))."','".mysqli_real_escape_string($conn,input($_POST['accno']))."','".$path."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);    
  
redirect('bank-details.php?case=add&m=2');
}


if($_REQUEST['case']=='edit')
{
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="bankqrcode/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
$sql2="UPDATE `ab_bank_details` SET `bname`='".input($_POST['bname'])."',`name`='".mysqli_real_escape_string($conn,input($_POST['name']))."',`branch`='".mysqli_real_escape_string($conn,input($_POST['branch']))."',`ifscode`='".mysqli_real_escape_string($conn,input($_POST['ifscode']))."',`accno`='".mysqli_real_escape_string($conn,input($_POST['accno']))."',`qrcode`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);
}else{
$sql2="UPDATE `ab_bank_details` SET `bname`='".input($_POST['bname'])."',`name`='".mysqli_real_escape_string($conn,input($_POST['name']))."',`branch`='".mysqli_real_escape_string($conn,input($_POST['branch']))."',`ifscode`='".mysqli_real_escape_string($conn,input($_POST['ifscode']))."',`accno`='".mysqli_real_escape_string($conn,input($_POST['accno']))."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);
}
redirect('bank-details.php?');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_bank_details` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('bank-details.php');
}
}
?>