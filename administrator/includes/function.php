<?php
/*-----------------Database Connection-----------------------*/
$conn=mysqli_connect('localhost','root','','itdbabacus');
/*-----------------Database Connection-----------------------*/
$title='ITDB Abacus';
$domain='www.itdbabacus.in';

error_reporting(0);


function redirect($url)
{
header('Location: '.$url);
exit();
}
function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}
function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}
function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}

function getUser($conn,$id,$field)
{
$sql="SELECT * FROM `ab_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function geBranchtUser($conn,$id,$field)
{
$sql="SELECT * FROM `ab_branch` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSession($conn,$id,$field)
{
$sql="SELECT * FROM `ab_session` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getCourse($conn,$id,$field)
{
$sql="SELECT * FROM `ab_course` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getStudent($conn,$id,$field)
{
$sql="SELECT * FROM `ab_student` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getStudentDetails($conn,$id,$field)
{
$sql="SELECT * FROM `ab_student` WHERE `registration`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getMonth($conn,$month)
{
if($month=='01') {echo 'January';}
if($month=='02') {echo 'February';}
if($month=='03') {echo 'March';}
if($month=='04') {echo 'April';}
if($month=='05') {echo 'May';}
if($month=='06') {echo 'June';}
if($month=='07') {echo 'July';}
if($month=='08') {echo 'August';}
if($month=='09') {echo 'September';}
if($month=='10') {echo 'October';}
if($month=='11') {echo 'November';}
if($month=='12') {echo 'December';}
}



function getCompletedStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getDropoutStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='D'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}



function getTodayAdmission($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `admission` BETWEEN '".date("Y-m-01")."' AND '".date("Y-m-t")."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}


function getCourseCategory($conn,$id,$field)
{
$sql="SELECT * FROM `ab_course_category` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

//---------------------------10-03-2022----------------//


function getRenewalDate($conn)
{
$sql="SELECT * FROM `ab_renewal_date` ORDER BY `id` DESC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0){
$fetch=fetcharray($res);

return $fetch['expiredate'];
}
}
//--------------25-09-2024---------------//
//-----------------------------------//

function getDuration($conn,$id)
{
$sql="SELECT * FROM `ab_duration` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['duration'];
}
}



//--------------------30.09.2024----------------//


function getNumtoWord($number){
$no = round($number);
$decimal = round($number - ($no = floor($number)), 2) * 100;    
$digits_length = strlen($no);    
$i = 0;
$str = array();
$words = array(
0 => '',
1 => 'One',
2 => 'Two',
3 => 'Three',
4 => 'Four',
5 => 'Five',
6 => 'Six',
7 => 'Seven',
8 => 'Eight',
9 => 'Nine',
10 => 'Ten',
11 => 'Eleven',
12 => 'Twelve',
13 => 'Thirteen',
14 => 'Fourteen',
15 => 'Fifteen',
16 => 'Sixteen',
17 => 'Seventeen',
18 => 'Eighteen',
19 => 'Nineteen',
20 => 'Twenty',
30 => 'Thirty',
40 => 'Forty',
50 => 'Fifty',
60 => 'Sixty',
70 => 'Seventy',
80 => 'Eighty',
90 => 'Ninety');
$digits = array('', 'Hundred', 'Thousand', 'Lrmh', 'Crore');
while ($i < $digits_length) {
$divider = ($i == 2) ? 10 : 100;
$number = floor($no % $divider);
$no = floor($no / $divider);
$i += $divider == 10 ? 1 : 2;
if ($number) {
$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
} else {
$str [] = null;
}  
}

$Rupees = implode(' ', array_reverse($str));
$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}





function getTotalDue($conn)
{
return getTotalAdmissionDue($conn)+getTotalMonthlyDue($conn);
}


function getStudentTotalFeesBycalendar12($conn,$fromdate,$todate,$reg)
{
$total= getStudentAddFeesBycalendar12($conn,$fromdate,$todate,$reg)+getStudentFeesBycalendar12($conn,$fromdate,$todate,$reg);
return $total;
}


function getAllStudentTotalFeesBycalendar12($conn,$fromdate,$todate)
{
$total= getAllStudentAddFeesBycalendar12($conn,$fromdate,$todate)+getAllStudentFeesBycalendar12($conn,$fromdate,$todate);
return $total;
}



function getTodayTotalFeesCollection($conn)
{
$total=getTodayAdmissionFeesCollection($conn)+getTodayFeesCollection($conn);
return $total;
}



//---------29.10.2024-------//
function getModulePermission($conn,$id,$field)
{
$sql="SELECT * FROM `ab_permission` WHERE `adminid`='".$id."' AND `modules`='".$field."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPermissionCheck($conn,$adminid,$modules)
{

$sql="SELECT * FROM `ab_permission` WHERE `adminid`='".$adminid."' AND `modules`='".$modules."' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;

}
function input($string)
{
$string=addslashes(trim(strip_tags($string)));
return $string;
}

function output($string)
{
$string=stripslashes(trim(strip_tags($string)));
return $string;
}

function getid($id) {
return str_pad($id, 4, '0', STR_PAD_LEFT);
}

function getVoucherId($id) {
return str_pad($id, 3, '0', STR_PAD_LEFT);
}


function getTotalStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getRunningStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='R' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getNoStudentByCourse($conn,$cid)
{
$sql="SELECT * FROM `ab_student` WHERE `course`='".$cid."' AND `status`='R' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}


function getTotalCollection($conn)
{
$total=getTotalAdmissionCollection($conn)+getTotalFeesCollection($conn);
return $total;
}



function getTotalMonthlyDueByCourse($conn,$cidd)
{
$totalDue=0;
$sql = "SELECT * FROM `ab_collection` WHERE `status`='P' AND `course`='".$cidd."' AND `registrationno` IN (SELECT `registrationno` FROM `ab_student` WHERE `actstatus`='A') ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res)){
$dbmonth=strtotime(date('d-m-Y',strtotime($fetch['monthyear'])));
$today=time();
if($dbmonth<=$today)
{
$totalDue+=$fetch['due'];
}
}
}
return $totalDue;
}


//----------05.06.2025----------//


function getStudentFeesStatus($conn,$reg)
{
$sql="SELECT `status` FROM `ab_collection`  WHERE `registrationno`='".$reg."' AND (`status`='C' OR `fees`!=0)";
$res=query($conn,$sql);
$num=numrows($res);
return $num;

}

function getStudentAddmissionFeesStatus($conn,$reg)
{
$sql="SELECT `status` FROM `ab_admission_fees`  WHERE `registrationno`='".$reg."' AND (`status`='C' OR `addfees`!=0)";
$res=query($conn,$sql);
$num=numrows($res);
return $num;

}

function getTotalDueSession($conn,$session)
{
$sql="SELECT SUM(`due`) total FROM `ab_collection` pc INNER JOIN `ab_student` ps ON pc.`registrationno`=ps.`registrationno` WHERE ps.`actstatus`='A' AND ps.`status` IN ('R','C') AND ps.`session`='".$session."' AND pc.`status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['total'];
}
}

function getTotalAdmissionDueSession($conn,$session)
{
$sql="SELECT SUM(`due`) total FROM `ab_admission_fees` pc INNER JOIN `ab_student` ps ON pc.`registrationno`=ps.`registrationno` WHERE ps.`actstatus`='A' AND ps.`status` IN ('R','C') AND ps.`session`='".$session."' AND pc.`status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['total'];
}
}



function getBranchTotalStudent($conn,$id)
{
$sql="SELECT * FROM `ab_student` WHERE `actstatus`='A' AND `branch`='".$id."' ";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getBranchRunningStudent($conn,$id)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='R' AND `actstatus`='A' AND `branch`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}


function getBranchCompletedStudent($conn,$id)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='C' AND `branch`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getBranchDropoutStudent($conn,$id)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='D' AND `branch`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getBranchTodayAdmission($conn,$id)
{
$sql="SELECT * FROM `ab_student` WHERE `admission` BETWEEN '".date("Y-m-01")."' AND '".date("Y-m-t")."' AND `branch`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getBranchStudent($conn,$id,$field,$bid)
{
$sql="SELECT * FROM `ab_student` WHERE `id`='".$id."' AND `branch`='".$bid."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getBranchNoStudentByCourse($conn,$cid,$fid)
{
$sql="SELECT * FROM `ab_student` WHERE `course`='".$cid."' AND `status`='R' AND `actstatus`='A' AND `branch`='".$fid."'";

$res=query($conn,$sql);
$num=numrows($res);

return $num;
}




function getContact($conn,$field)
{
$sql="SELECT * FROM `ab_contact` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getState($conn,$id,$field)
{
	$sql="SELECT * FROM `ab_state` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$fetch=fetcharray($res);
	return $fetch[$field];
}

function getDistrict($conn,$id,$field)
{
	$sql="SELECT * FROM `ab_district` WHERE `id`='".$id."'";
	$res=query($conn,$sql);
	$fetch=fetcharray($res);
	return $fetch[$field];
}

function getCourseName($conn,$id,$field)
{
$sql="SELECT * FROM `ab_course` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getFranchiseName($conn,$id,$field)
{
$sql="SELECT `$field` FROM `ab_franchise` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getStateName($conn,$id)
{
$sql="SELECT * FROM `ab_state` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['state'];
}
}

function getCourseNameByID($conn,$id,$field)
{
$sql="SELECT * FROM `ab_course` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);

if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}
function getCategoryName($conn,$id)
{
$sql="SELECT * FROM `ab_course_category` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['category'];
}
}

function getAvailableBalance($conn,$id)
{
$total=(getTotalMainDeposit($conn,$id)+getTotalPaymentRequestFran($conn,$id))-getTotalMainRegistration($conn,$id)-getTotalMainDeductCharge($conn,$id);
return $total;
}
function getTotalMainDeposit($conn,$id)
{
$sql="SELECT SUM(`amount`) as total FROM `ab_payment_deposit` WHERE `franchise`='".$id."' AND `wallet`='MAIN' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
$savings=0;
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total']; 
}
return $total;
}
function getTotalMainRegistration($conn,$id)
{
$sql="SELECT SUM(`amount`) as total FROM `ab_student_approve` WHERE `franchise`='".$id."' AND `wallet`='Main' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
$savings=0;
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total']; 
}
return $total;
}
function getTotalMainDeductCharge($conn,$id)
{
$sql="SELECT SUM(`amount`) as total FROM `ab_payment_deduct` WHERE `franchise`='".$id."' AND `wallet`='MAIN' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
$savings=0;
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total']; 
}
return $total;
}
function getCourseFees($conn,$course,$duration)
{
$sql="SELECT * FROM `ab_course_fees` WHERE `course`='".$course."' AND `duration`='".$duration."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['fees'];
}
}
function getTotalPaymentRequest($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_request` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}
function getTotalPaymentRequestFran($conn,$id)
{
$sql="SELECT SUM(`amount`) as total FROM `ab_payment_request` WHERE `franchise`='".$id."' AND `status`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
$savings=0;
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total']; 
}
return $total;
}
function getFranchiseTotalPaymentInformationRequestDate($conn,$formdate,$todate,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_student_approve` WHERE `date` BETWEEN '".$formdate."' AND '".$todate."' AND `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}
function getFranchiseTotalInformation($conn,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_student_approve` WHERE `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getFranchiseTotalPaymentDepositRequestDate($conn,$formdate,$todate,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deposit` WHERE `date` BETWEEN '".$formdate."' AND '".$todate."' AND `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}
function getFranchiseTotalDeposite($conn,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deposit` WHERE `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getFranchiseTotalPaymentDeductRequestDate($conn,$formdate,$todate,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deduct` WHERE `date` BETWEEN '".$formdate."' AND '".$todate."' AND `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}
function getFranchiseTotalDeduct($conn,$franchise)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deduct` WHERE `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getTotalFranchise($conn)
{
$sql="SELECT `id` FROM `ab_franchise`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}
function getTotalStudentApplication($conn)
{
$sql="SELECT * FROM `ab_student_application` ";
$res=query($conn,$sql);
$num=numrows($res);
 
return $num;
}
function getTotalAcceptedStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='I'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getTotalRegisteredStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='A' AND `certificate`='P'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getTotalCertifiedStudent($conn)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='A' AND `certificate`='C'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getTotalDeposite($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deposit`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalDeduct($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ab_payment_deduct`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getCategoryimg($conn,$id)
{
$sql="SELECT * FROM `ab_image_category` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['category'];
}
}
function getFirstImage($conn,$category,$field)
{
$sql="SELECT * FROM `ab_gallery_image` WHERE `category`='".$category."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}
function getAppliedStudent($conn,$franchise)
{
$sql="SELECT * FROM `ab_student_application` WHERE `franchise`='".$franchise."' AND `status`='I'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getCertifiedStudent($conn,$franchise)
{
$sql="SELECT * FROM `ab_student` WHERE `certificate`='C' AND `status`='A' AND `franchise`='".$franchise."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getApprovedStudent($conn,$franchise)
{
$sql="SELECT `id` FROM `ab_student` WHERE `status`='I' AND `franchise`='".$franchise."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}
function getRegisteredStudent($conn,$franchise)
{
$sql="SELECT * FROM `ab_student` WHERE `status`='A' AND `franchise`='".$franchise."' AND `certificate`='P'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}
function getApplideStudentDetails($conn,$id,$field)
{
$sql="SELECT `$field` FROM `ab_student_application` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function checkFranchiseStatus($conn)
{
if(isset($_SESSION['fid']) && $_SESSION['fid']!='')
{
$fid=mysqli_real_escape_string($conn,$_SESSION['fid']);

$sql="SELECT `status` FROM `ab_franchise` WHERE `id`='".$fid."'";
$res=query($conn,$sql);
$num=numrows($res);

if($num==0)
{
unset($_SESSION['fid']);
redirect('../index.php');
}

$fetch=fetcharray($res);

if($fetch['status']!='A')
{
unset($_SESSION['fid']);
redirect('../index.php?m=inactive');
}
}
}
function getFailedSuccessHtml($subject,$descripttion,$status)
{
if($status=='success')
{
$subject=$subject;
$color='#3ea714';
$icon='fa-check-circle';
}
else
{
$subject=$subject;
$color='#fa7104';
$icon='fa-times-circle';
}

return '<div class="abacus-popup-overlay" id="overlay">
<div class="abacus-popup" id="popup">

<div class="abacus-popup-icon" style="background:'.$color.';">
<i class="fas '.$icon.'"></i>
</div>

<h2 style="color:'.$color.'">'.$subject.'</h2>

<p>'.$descripttion.'</p>

<button type="button" onClick="hidePopup()" style="background:'.$color.';">
<i class="fas fa-check"></i> Close
</button>

</div>
</div>';
}


function getCourseLevelDescription($conn,$course,$level,$field)
{
$sql="SELECT `$field` FROM `ab_level_description` WHERE `course`='".$course."' AND `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

?>