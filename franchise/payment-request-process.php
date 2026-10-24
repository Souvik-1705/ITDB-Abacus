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
if($_POST['amount'])
{
if(strpos($_FILES['photo']['name'], 'php') == false)
{
if($_FILES['photo']['name'])
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
if($width > 500){$newwidth = 500;}else{$newwidth = $width;}
if($height > 500){$newheight = 500;}else{$newheight = $height;}

$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$sql="INSERT INTO `ab_payment_request` (`franchise`,`bankname`,`transfer`,`amount`,`remarks`,`receipt`,`paydate`,`status`,`date`) VALUES('".input(mysqli_real_escape_string($conn,$_SESSION['fid']))."','".input(mysqli_real_escape_string($conn,$_POST['bankname']))."','".input(mysqli_real_escape_string($conn,$_POST['transfer']))."','".input(mysqli_real_escape_string($conn,$_POST['amount']))."','".input(mysqli_real_escape_string($conn,$_POST['remarks']))."','".$file_name."','".input(mysqli_real_escape_string($conn,$_POST['paydate']))."','I','".date('Y-m-d')."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);

$desired_dir="../administrator/receipt/";

if(is_dir($desired_dir)==false){
mkdir("$desired_dir", 0700);		// Create directory if it does not exist

}

if(is_dir("$desired_dir/".$file_name)==false){
$filename ="$desired_dir/".$rand.$_FILES['photo']['name'];


imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp);
}else{									// rename the file if another one exist

$new_dir="$desired_dir/".$file_name.time();
rename($uploadedfile,$new_dir) ;				
}
}else{
redirect('payment-request.php?m=2');
}
}
if($id)
{
redirect('payment-request.php?m=1');
}else{
redirect('payment-request.php?m=2');
}
}
}
}
}
?>