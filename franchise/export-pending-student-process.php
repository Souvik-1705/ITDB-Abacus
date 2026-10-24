<?php
session_start();
include('../administrator/includes/function.php');

if($_SESSION['fid'])
{
$SQL = "SELECT * FROM `ab_student_application` WHERE `franchise`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."' AND `status`='I' ORDER BY `id` DESC";
$header = '';
$result ='';
$exportData = mysqli_query ($conn,$SQL ) or die ( "Sql error : " . mysqli_error($conn) );

$header = "Sl No" . "\t" . "Franchise" . "\t" . "Name" . "\t" . "Course" ." \t " . "Duration" . "\t" . "Phone" . "\t". "Address" . "\t". "City" . "\t". "age" . "\t". "DOB" . "\t". "Father's Name" . "\t". "Mother's Name" . "\t". "Gender" ."\t". "Religion" . "\t". "Category" . "\t". "State" . "\t". "District" . "\t". "Pin Code" . "\t". "Status" . "\t". "Date" . "\t";

$i=1; 
while( $row = mysqli_fetch_array( $exportData ) )
{
if($row['status']=='A'){$status='Paid';}else{$status='Pending';}
	$value = $i ."\t";
	$value .= getFranchiseName($conn,$row['franchise'],'franchise') ."\t";
	$value .= $row['name'] ."\t";
	$value .= getCourseNameByID($conn,$row['course'],'course_name') ."\t";
	$value .= $row['duration'] ."\t";
	$value .= $row['phone'] ."\t";
	$value .= $row['address'] ."\t";
	$value .= $row['city'] ."\t";
	$value .= $row['age'] ."\t";
	$value .= $row['dob'] ."\t";
	$value .= $row['fname'] ."\t";
	$value .= $row['mname'] ."\t";
	$value .= $row['gender'] ."\t";
	$value .= $row['religion'] ."\t";
	$value .= $row['category'] ."\t";
	$value .= getStateName($conn,$row['state'])."\t";
	$value .= getDistrict($conn,$row['district'],'district')."\t";
	$value .= $row['pincode'] ."\t";
	$value .= $status ."\t";
	$value .= $row['date'] ."\t";
	
	$result .= trim( $value ) . "\n";
$i++;
}

$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_approved_student.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
}
?>