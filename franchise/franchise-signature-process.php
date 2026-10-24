<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}
if($_SESSION['fid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
if($_FILES['signature']['name'])
{
if(strpos($_FILES['signature']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="signature/";
$path=$rand.$_FILES['signature']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['signature']['tmp_name'], $target);
}
}
}
$sql="INSERT INTO `ab_franchise_signature` (`fid`,`signature`) values('".input($_SESSION['fid'])."','".$path."')";
$res=query($conn,$sql);
redirect('franchise-signature.php?m=1');
}
else if($_REQUEST['case']=='edit'){

if($_FILES['signature']['name']){

if(strpos($_FILES['signature']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="signature/";
$path=$rand.$_FILES['signature']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['signature']['tmp_name'], $target);

$sql=" UPDATE `ab_franchise_signature` SET `signature`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
}
}

}

redirect('franchise-signature.php?m=1&&id='.$_REQUEST['id']);

}
}
elseif($_REQUEST['case']=='delete'){
$sql="DELETE FROM `ab_franchise_signature` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
redirect('franchise-signature.php');

}
}
?>