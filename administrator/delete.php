<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{

if($_REQUEST['case']=='feedback')
{
$sql="DELETE FROM `ab_feedback` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('feedback.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='suggestion')
{
$sql="DELETE FROM `ab_suggestion` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('suggestion.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='placement')
{
$sql="DELETE FROM `ab_placement` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('job-highlight.php?page='.$_REQUEST['page']);
}


if($_REQUEST['case']=='application')
{
$sql="DELETE FROM `ab_student_application` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('student-application.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='pending')
{
$sql="DELETE FROM `ab_student` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('pending-student.php?page='.$_REQUEST['page']);
}


if($_REQUEST['case']=='franreply')
{
$sql="DELETE FROM `ab_message_reply` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('franchise-reply.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='student')
{
$sql="DELETE FROM `ab_student` WHERE `id`='".input($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('student.php?page='.$_REQUEST['page']);
}


if($_REQUEST['case']=='franapp')
{
$sql="DELETE FROM `ab_fran_app` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('franchise-application.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='payment')
{
$sql="DELETE FROM `ab_payment_request` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('payment-request.php?page='.$_REQUEST['page']);
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ab_franchise` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('view-fran.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='msg')
{
$sql="DELETE FROM `ab_msg_request` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('msg-req.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='enquiry')
{
$sql="DELETE FROM `ab_franchise_enquery` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('franchise-enquery.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='kitpayment')
{
$sql="DELETE FROM `ab_kit_payment_request` WHERE `id`='".mysqli_real_escape_string($conn,input($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('kit-payment-request.php?page='.$_REQUEST['page']);
}

}
?>