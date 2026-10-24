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
if($_FILES['photo']['name'])
{
if($_REQUEST['id'])
{
$rand=rand(111,999999);
/*---------------------------Small Images------------------------------------------*/
$errors= array();
$arr=array();

$file_name=$rand.$_FILES['photo']['name'];
$file_type=$_FILES['photo']['type'];
$arr=explode('/',$file_type);

if($arr[1]=="jpg" || $arr[1]=="jpeg" || $arr[1]=="png" || $arr[1]=="gif"){

if($arr[1]=="jpg" || $arr[1]=="jpeg" )
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
if($arr[1]=="png")
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
if($arr[1]=="gif") 
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefromgif($uploadedfile);
}

list($width,$height)= getimagesize($_FILES['photo']['tmp_name']);
if($width > 110){$newwidth = 110;}else{$newwidth = $width;}
if($height > 130){$newheight = 130;}else{$newheight = $height;}

$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

if($_REQUEST['cat']=='pending')
{
$sql="UPDATE `ab_student_application` SET `photo`='".$file_name."' WHERE `id`='".input($_REQUEST['id'])."' AND `franchise`='".input($_SESSION['fid'])."'";
$res=query($conn,$sql);
}else{
$sql="UPDATE `ab_student` SET `photo`='".$file_name."' WHERE `id`='".input($_REQUEST['id'])."' AND `franchise`='".input($_SESSION['fid'])."'";
$res=query($conn,$sql);
}

$desired_dir="profile/";

if(is_dir($desired_dir)==false){
mkdir("$desired_dir", 0700);	// Create directory if it does not exist
}

if(is_dir("$desired_dir/".$file_name)==false){
$filename ="$desired_dir/".$rand.$_FILES['photo']['name'];

imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp);
}else{							// rename the file if another one exist
$new_dir="$desired_dir/".$file_name.time();
rename($uploadedfile,$new_dir) ;				
}
}
}
}

if($_REQUEST['cat']=='pending')
{
redirect('pending-student.php');
}
if($_REQUEST['cat']=='approve')
{
redirect('approve-student.php');
}
if($_REQUEST['cat']=='registered')
{
redirect('registered-student.php');
}

if($_REQUEST['cat']=='certified')
{
redirect('certified-student.php');
}

}
}
?>