<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{
if($_REQUEST['st']=='I')
{
$sql="UPDATE `ab_payment_request` SET `status`='A' WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('payment-request.php?page='.$_REQUEST['page']);
}
}
?>
