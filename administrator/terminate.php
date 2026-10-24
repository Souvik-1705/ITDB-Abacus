<?php
if(isset($_SESSION['fid']))
{
$salt='bbuTFFytgfgG';


$saltkey=base64_encode(base64_encode($_SESSION['fid'].'-'.$salt));

$sqltyu="SELECT * FROM `ab_login_session` WHERE `sesssion`='".$saltkey."' ";
$restyu=query($conn,$sqltyu);
$numtyu=numrows($restyu);
if($numtyu>0)
{
$fetchtyu=fetcharray($restyu);

$expired_time=$fetchtyu['endtime'];
$start_time=$fetchtyu['starttime'];
//$diff=($expired_time-$start_time)
$now=time();

}
else
{
$expired_time=0;
$now=0;
$start_time=0;


}

if($now>$expired_time)
{
unset($_SESSION['fid']);

redirect('index.php');
}
}
?>