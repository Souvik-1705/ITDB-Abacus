<?php
session_start();
include('includes/function.php');

//error_reporting(-1);

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="Session";

$arr[0][2]="Registration No";
$arr[0][3]="Student Name";
$arr[0][4]="Phone";
$arr[0][5]="Duration";
$arr[0][6]="Course";
$arr[0][7]="Email";
$arr[0][8]="Address";
$arr[0][9]="Gender";
$arr[0][10]="Date Of Birth";
$arr[0][11]="Admission Date";



if($_REQUEST['search']){
$sqlm="SELECT * FROM `ab_student` WHERE (`name` LIKE '%".trim($_REQUEST['search'])."%' OR `phone` LIKE '%".trim($_REQUEST['search'])."%' OR `registrationno` = '".trim($_REQUEST['search'])."' OR `email` LIKE '%".trim($_REQUEST['search'])."%') AND `status`='R' AND `actstatus`='A' ORDER BY `id` DESC";
}else if($_REQUEST['course']!='' && $_REQUEST['category']!='' && $_REQUEST['session']!=''){
$sqlm="SELECT * FROM `ab_student` WHERE `course`='".$_REQUEST['course']."' AND `course_cat`='".$_REQUEST['category']."' AND `session`='".$_REQUEST['session']."' AND `status`='R' AND `actstatus`='A' ORDER BY `id` DESC";
}else if($_REQUEST['course']=='' && $_REQUEST['category']=='' && $_REQUEST['session']!=''){
$sqlm=" SELECT * FROM `ab_student` WHERE `session`='".$_REQUEST['session']."' AND `status`='R' AND `actstatus`='A' ORDER BY `id` DESC";
}else{
$sqlm="SELECT * FROM `ab_student` WHERE `status`='R' AND `actstatus`='A' ORDER BY `id` DESC";
}





$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($row=fetcharray($resm))
{
$arr[$i][0]=$i;
$arr[$i][1]=getSession($conn,$row['session'],'session');

$arr[$i][2]=$row['registrationno'];
$arr[$i][3]=$row['name'];
$arr[$i][4]=$row['phone'];
$arr[$i][5]=getDuration($conn,$row['duration']);
$arr[$i][6]=getCourse($conn,$row['course'],'course');
$arr[$i][7]=$row['email'];
$arr[$i][8]=$row['address'];
$arr[$i][9]=$row['gender'];
$arr[$i][10]=$row['dob'];
$arr[$i][11]=$row['admission'];


$i++;
}}


$name='export_dropout_student-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('downloadfees.php?f='.$name.'.csv');
?>