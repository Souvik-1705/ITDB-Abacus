<?php
session_start();
include('../administrator/includes/function.php');
//-------------------

//$userid=getMember($conn,$_SESSION['fid'],'userid');

//$sql1="UPDATE `ab_franchise_login` SET `logout`='".date('Y-m-d H:i:s')."'  WHERE `fid`='".$_SESSION['fid']."' ORDER BY `id` DESC LIMIT 1 ";
//$res1=query($conn,$sql1);

//-----------------------
unset($_SESSION['sid']);
unset($_SESSION['fid']);
session_destroy();
redirect('../index.php');
?>