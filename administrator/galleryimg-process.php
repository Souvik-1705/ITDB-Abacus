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
$target="gallery/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/

$sql="INSERT INTO `ab_gallery_image` (`image`,`category`) VALUES('".$path."','".trim($_POST['category'])."')";
$res=query($conn,$sql);

redirect('galleryimg.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="gallery/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
$sql1="UPDATE `ab_gallery_image` SET `image`='".$path."' WHERE `id`='".mysqli_escape_string($conn,input($_REQUEST['id']))."'";
$res1=query($conn,$sql1);
}
}
}

$sql2="UPDATE `ab_gallery_image` SET `category`='".mysqli_real_escape_string($conn,input($_POST['category']))."' WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res2=query($conn,$sql2);
/*-----------------------END OF file CODE-----------*/
redirect('galleryimg.php');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_gallery_image` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('galleryimg.php');
}
}
?> 