<?php
session_start();
include('includes/function.php');

if($_REQUEST['search']!='' && $_REQUEST['frmdate']=='' && $_REQUEST['todate']=='')
{
$SQL="SELECT * FROM `ab_collection` WHERE `registrationno`='".$_REQUEST['search']."' ORDER BY `id` DESC";
}
else if($_REQUEST['search']=='' && $_REQUEST['frmdate']!='' && $_REQUEST['todate']!='')
{
$SQL="SELECT * FROM `ab_collection` WHERE `date` BETWEEN '".$_REQUEST['frmdate']."' AND '".$_REQUEST['todate']."'  ORDER BY `id` DESC";
}
else if($_REQUEST['search']!='' && $_REQUEST['frmdate']!='' && $_REQUEST['todate']!='')
{
$SQL="SELECT * FROM `ab_collection` WHERE `date` BETWEEN '".$_REQUEST['frmdate']."' AND '".$_REQUEST['todate']."' AND `registrationno`='".$_REQUEST['search']."' ORDER BY `id` DESC";
}
else{
$SQL="SELECT * FROM `ab_collection` ORDER BY `id` DESC";
}

$header = '';
$result ='';
$exportData = mysqli_query ($conn,$SQL ) or die ( "Sql error : " . mysqli_error( ) );

$header = "Sl No" . "\t" . "Student Name" ." \t " . "Registration No" . "\t" . "fees" . "\t" . "Date" . "\t";

$i=1; 
while( $row = mysqli_fetch_array( $exportData ) )
{
	$value = $i ."\t";
	$value .= ucwords(strtolower(getStudent($conn,$row['student'],'name'))) ."\t";
	$value .= $row['registrationno'] ."\t";
	$value .= $row['monthyear'] ."\t";
	$value .= $row['due'] ."\t";
	$value .= $row['fees'] ."\t";
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
header("Content-Disposition: attachment; filename=export_fees_statement.xlsx");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";

?>