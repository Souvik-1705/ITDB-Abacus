<?php
session_start();
include('includes/function.php');
if($_SESSION['sid']=='' && $_SESSION['fid']=='')
{
redirect('index.php');
}

 if(isset($_SESSION['fid'])){$fid12=$_SESSION['fid'];}else{$fid12=$_SESSION['sid'];}

?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title><?=$title?></title>
<link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
<link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
<link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
<link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
<!--<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
<link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/pagination.css">
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>

<?php if(isset($_SESSION['fid']))
{ ?>
<?php /*?><script>


function get_logout(exp1)
{
let diff;
setInterval(function(){
//console.log(exp1);
$timer=parseInt(new Date().getTime()/1000);
diff=exp1-$timer;
var hour=parseInt(diff/3600);
var minute_sec=diff%3600;
var minute=parseInt(minute_sec/60);
var sec=minute_sec%60;
$('#timer_div').html(hour+':'+minute+':'+sec);
if($timer>exp1)
{
window.location.href('logout.php');
}
},1000);
}


document.addEventListener('DOMContentLoaded',(fn)=>{
get_logout(<?=$expired_time?>);
})



</script><?php */?>

<?php }?>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>

  

<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
Function disableclick(event)
{
if(event.button==2)
{
alert(status);
return false;    
}
}
</script>

<style>
#blink{
position: absolute;
top: 52%;
left: 50%;
transform: translate(-50%, -50%);
}

#blink{
font-size: 1.4em;
font-family: serif;
color:#008000;
text-align: center;
animation: animate 2.2s linear infinite;
} 

@keyframes animate{
0%{
opacity: 0;
}
50%{
opacity: 0.7;
}
100%{
opacity: 0;
}
}

th{
text-align:center;
}
</style>
<!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
<div class="navbar-wrapper">
<div class="navbar-header" >
<ul class="nav navbar-nav">
<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1" style="color:#000000;"></i></a></li>
<li class="nav-item"><a href="dashboard.php" class="navbar-brand nav-link"><img alt="branding logo" src="images/logo.png" data-expand="images/logo.png" data-collapse="app-assets/images/logo/robust-logo-small.png" width="100" ></a></li>
<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right" style="color:#000000;"></i></a></li>
</ul>
</div>
<div class="navbar-container content container-fluid" style="background:#fff;">
<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
<ul class="nav navbar-nav">
<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5" style="color:#000000;">         </i></a></li>


</ul>
<ul class="nav navbar-nav float-xs-right" >
<?php 
$stdate=getRenewalDate($conn);
$today=date('Y-m-d');
$nodays=(strtotime($stdate)-strtotime($today));
$day=round($nodays/86400);
if($stdate !='')
{
?>

<p align="center" style="margin:4px;" id="blink"><?php if($day>=7){?><span style="color:#000066;margin-top:5px;" ><?=$day?> Days remaining for renewal !!</span><?php }else{?><span style="color:#CC0000;margin-top:5px;"><?php if($day>0){?><?=$day?><?php }else{?>0<?php }?> Days to expire, please renewal soon !!</span><?php }?></p><div style="color:#009900; font-weight:bold;" id="timer_div"></div>
<?php }?>



<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="images/member.png" alt="avatar"><i></i></span><span class="user-name"><?php if($_SESSION['sid']){ ?><?=ucwords(strtolower(base64_decode(getUser($conn,$_SESSION['sid'],'uname'))))?><?php }else{ ?><?=ucwords(strtolower(base64_decode(getUser($conn,$_SESSION['sid'],'uname'))))?><?php } ?></span></a>
<div class="dropdown-menu dropdown-menu-right"><a href="dashboard.php" class="dropdown-item"><i class="icon-library" style="color:#000000;"></i>Home</a>
<div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item" onClick="return confirm('Are you sure want to logout?');"><i class="icon-power3" style="color:#000000;"></i> Logout</a>
</div>
</li>
</ul>
</div>
</div>
</div>

</nav>