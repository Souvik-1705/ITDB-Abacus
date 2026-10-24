<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$sql="UPDATE `helping_member` SET `name`='".mysqli_real_escape_string($conn,trim($_POST['name']))."',`address`='".mysqli_real_escape_string($conn,trim($_POST['address']))."',`phone`='".mysqli_real_escape_string($conn,trim($_POST['phone']))."',`bname`='".mysqli_real_escape_string($conn,trim($_POST['bname']))."',`branch`='".mysqli_real_escape_string($conn,trim($_POST['branch']))."',`accname`='".mysqli_real_escape_string($conn,trim($_POST['accname']))."',`accno`='".mysqli_real_escape_string($conn,trim($_POST['accno']))."',`ifsc`='".mysqli_real_escape_string($conn,trim($_POST['ifsc']))."' WHERE `id`='".$_SESSION['mid']."'";

$res=query($conn,$sql);

redirect('edit-profile.php?m=1');

}
?>