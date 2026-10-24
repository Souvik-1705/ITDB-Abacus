<?php
session_start();
include('includes/function.php');
if(isset($_SESSION['sid']))
{
unset($_SESSION['sid']);
}

if(isset($_SESSION['fid']))
{
unset($_SESSION['fid']);
}

//session_destroy();
redirect('index.php');
?>