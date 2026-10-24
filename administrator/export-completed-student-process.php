<?php
session_start();
include('includes/function.php');

//error_reporting(-1);

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="Student Name";
$arr[0][2]="Registration No";
$arr[0][3]="Course";
$arr[0][4]="Duration";
$arr[0][5]="Phone";
$arr[0][6]="Email";
$arr[0][7]="Address";
$arr[0][8]="Gender";
$arr[0][9]="Date Of Birth";
$arr[0][10]="Admission Date";

$sqlm = "SELECT * FROM `ab_student` WHERE `status`='C' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($row=fetcharray($resm))
{
$arr[$i][0]=$i;
$arr[$i][1]=$row['name'];
$arr[$i][2]=$row['registrationno'];
$arr[$i][3]=getCourse($conn,$row['course'],'course');
$arr[$i][4]=getDuration($conn,$row['duration']);
$arr[$i][5]=$row['phone'];
$arr[$i][6]=$row['email'];
$arr[$i][7]=$row['address'];
$arr[$i][8]=$row['gender'];
$arr[$i][9]=$row['dob'];
$arr[$i][10]=$row['admission'];


$i++;
}}


$name='export_completed_student-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('downloadfees.php?f='.$name.'.csv');
?>