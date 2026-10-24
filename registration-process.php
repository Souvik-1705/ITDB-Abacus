<?php
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$rand=rand(1,999999);
if($_FILES['photo']['name'])
{
$target="franchise/profile/";
$path=$rand.$_FILES['photo']['name'];

$ext = pathinfo($path, PATHINFO_EXTENSION);
$target=$target.basename($path); 
move_uploaded_file($_FILES['photo']['tmp_name'], $target);
}

if($_FILES['identity']['name'])
{
$target1="franchise/identify/";
$identity=$rand.$_FILES['identity']['name'];

$ext1 = pathinfo($identity, PATHINFO_EXTENSION);
$target1=$target1.basename($identity); 
move_uploaded_file($_FILES['identity']['tmp_name'], $target1);
}
$check="SELECT * FROM `ab_student_application` 
WHERE `email`='".input($_POST['email'])."' 
OR `phone`='".input($_POST['phone'])."'";

$checkres=query($conn,$check);
$checknum=numrows($checkres);

if($checknum>0)
{
    redirect('registration.php?e=1');
}
if($ext=='jpeg' || $ext=='png' || $ext=='jpg' || $ext=='pjp')
{
$sql="INSERT INTO `ab_student_application` (`franchise`,`name`,`coursecat`,`course`,`duration`,`phone`,`address`,`age`,`dob`,`fname`,`mname`,`gender`,`religion`,`category`,`state`,`district`,`city`,`pincode`,`photo`,`identity`,`status`,`date`,`email`,`admission`,`certificate`,`approved`,`registration`) values ('".input($_POST['franchise'])."','".input($_POST['name'])."','".input($_POST['coursecat'])."','".input($_POST['course'])."','".input($_POST['duration'])."','".input($_POST['phone'])."','".input($_POST['address'])."','".input($_POST['age'])."','".input($_POST['dob'])."','".input($_POST['fname'])."','".input($_POST['mname'])."','".input($_POST['gender'])."','".input($_POST['religion'])."','".input($_POST['category'])."','".input($_POST['state'])."','".input($_POST['district'])."','".input($_POST['city'])."','".input($_POST['pincode'])."','".$path."','".$identity."','I','".date('Y-m-d')."','".input($_POST['email'])."','".input($_POST['admission'])."','','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn); 
$desired_dir="profile/";

if(is_dir($desired_dir)==false)
{
mkdir("$desired_dir", 0700);	// Create directory if it does not exist
}
if($id)
{
$headers="From:".$welcome."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);

$subject="Welcome To ".$title1;

$message="Dear ".trim($_POST['name']).", <br>Your registration is successfully submitted. We will verify your application & approve.<br /><br>Thanks.";



//mail($to,$subject,$message,$headers);
}

redirect('registration.php?id='.$id);
}
}
}
?>