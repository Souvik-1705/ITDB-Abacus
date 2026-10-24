<?php
session_start();
include('../administrator/includes/function.php');

if($_SESSION['fid'])
{
$SQL = "SELECT * FROM `ab_student` WHERE `franchise`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."' AND `status`='I' ORDER BY `id` DESC";
$header = '';
$result ='';
$exportData = mysqli_query ($conn,$SQL ) or die ( "Sql error : " . mysqli_error($conn) );

$header = "Sl No" . "\t" . "Centre" . "\t" . "Student Name" . "\t" . "Father's Name" ." \t " . "Course" . "\t" ."Admission" . "\t" ."DOB" . "\t" ."Age" . "\t" ."Status" . "\t" ."Phone" . "\t" ."Address" . "\t" ."Registration" . "\t" . "Date" . "\t";

$i=1; 
while( $row = mysqli_fetch_array( $exportData ) )
{
	$value = $i ."\t";
	$value .= getFranchiseName($conn,$row['franchise'],'franchise') ."\t";
	$value .= $row['name'] ."\t";
	$value .= $row['fname'] ."\t";
	$value .= getCourseNameByID($conn,$row['course'],'course_name') ."\t";
	$value .= $row['admission'] ."\t";
	$value .= $row['dob'] ."\t";
	$value .= $row['age'] ."\t";
	$value .= $row['status'] ."\t";
	$value .= $row['phone'] ."\t";
	$value .= $row['address'] ."\t";
	$value .= $row['registration'] ."\t";
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