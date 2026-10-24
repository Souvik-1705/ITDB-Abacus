<?php
session_start();
include('../administrator/includes/function.php');

if($_SESSION['fid'])
{
$SQL = "SELECT * FROM `ab_student` WHERE `franchise`='".mysqli_real_escape_string($conn,$_SESSION['fid'])."' AND `status`='A' ORDER BY `id` DESC";
$header = '';
$result ='';
$exportData = mysqli_query ($conn,$SQL ) or die ( "Sql error : " . mysqli_error($conn) );

$header = "Sl No" . "\t" . "Name" ."\t". "Father's Name"."\t". "Course" ."\t". "Date" ." \t ". "Phone" . "\t". "DOB" ."\t"."Registration"."\t". "Status" ."\t". "age" . "\t". "Address" . "\t";

$i=1; 
while( $row = mysqli_fetch_array( $exportData ) )
{
if($row['status']=='A'){$status='Approved';}else{$status='Pending';}


		$value = $i ."\t";
	$value .= $row['name'] ."\t";
	$value .= $row['fname'] ."\t";
	$value .= getCourseNameByID($conn,$row['course'],'course_name') ."\t";
	$value .= $row['date'] ."\t";
	$value .= $row['phone'] ."\t";
	$value .= $row['dob'] ."\t";
	$value .= $row['registration'] ."\t";

	$value .= $status ."\t";
	$value .= $row['age'] ."\t";

	$value .= $row['address'] ."\t";
	
	$result .= trim( $value ) . "\n";
$i++;
}

$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_registered_student.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
}
?>