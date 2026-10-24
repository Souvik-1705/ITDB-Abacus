<?php

session_start();
include('includes/function.php');

if (!isset($_SESSION['sid']))
{
redirect('index.php');
}

if ($_SESSION['sid'])
{

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

/* =========================
EDIT SIGNATURES
========================= */
if (isset($_REQUEST['case']) && $_REQUEST['case'] == 'edit')
{

$rand  = rand(1,999999);
$rand1 = rand(1,999999);
$rand2 = rand(1,999999);


/* =========================
CENTER HEAD
========================= */
if (isset($_FILES['center_head']) && $_FILES['center_head']['name'] != '')
{

$target = "signatures/";

$path = $rand . $_FILES['center_head']['name'];

$target = $target . basename($path);

move_uploaded_file(
$_FILES['center_head']['tmp_name'],
$target
);

$sql = "UPDATE `ab_signature`
SET `center_head`='" . input($path) . "'
WHERE `id`='" . input($_REQUEST['id']) . "'";

$res = query($conn,$sql);
}


/* =========================
DIRECTOR
========================= */
if (isset($_FILES['director']) && $_FILES['director']['name'] != '')
{

$target = "signatures/";

$path = $rand . $_FILES['director']['name'];

$target = $target . basename($path);

move_uploaded_file(
$_FILES['director']['tmp_name'],
$target
);

$sql = "UPDATE `ab_signature`
SET `director`='" . input($path) . "'
WHERE `id`='" . input($_REQUEST['id']) . "'";

$res = query($conn,$sql);
}


/* =========================
EXAM CONTROLLER
========================= */
if (isset($_FILES['exam_controller']) && $_FILES['exam_controller']['name'] != '')
{

$target = "signatures/";

$path = $rand1 . $_FILES['exam_controller']['name'];

$target = $target . basename($path);

move_uploaded_file(
$_FILES['exam_controller']['tmp_name'],
$target
);

$sql = "UPDATE `ab_signature`
SET `exam_controller`='" . input($path) . "'
WHERE `id`='" . input($_REQUEST['id']) . "'";

$res = query($conn,$sql);
}


redirect('signatures.php?page=' . $_REQUEST['page']);
}
}


/* =========================
STATUS CHANGE
========================= */

if (isset($_REQUEST['st']))
{

if ($_REQUEST['st'] == 'A')
{
$st = 'I';
}
else
{
$st = 'A';
}


$sql = "UPDATE `ab_signature`
SET `status`='" . input($st) . "'
WHERE `id`='" . input($_REQUEST['id']) . "'";

$res = query($conn,$sql);


redirect('signatures.php?page=' . $_REQUEST['page']);
}

}
?>