<?php include('header.php'); 
$left=4;
?>

<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printDiv');
var newWin=window.open('','Print-Window','width=1000,height=1000');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()" style="padding:10px;">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:540px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Fees Print</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr height="35">
<td width="96%" align="center"><a onClick="printDivList();" style="cursor:pointer; padding-right:20px;"><img src="images/print1.jpg" height="50" width="50" title="print"/></a><br />
<a onClick="printDivList();" style="cursor:pointer; padding-right:20px; font-weight:bold; color:#003366;">PRINT</a>
</td>
</tr>
</table>

<div>&nbsp;</div>
<div class="card-body collapse in table-responsive">
<div id="printDiv" style="display:none;">

<?php
$sql="SELECT * FROM `ab_student` WHERE `registrationno`='".$_REQUEST['reg']."'";
$res=query($conn,$sql);
$fetch=fetcharray($res);
?>

<div style="border:1px solid black;padding:3px">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr height="10">

<td colspan="1" style="font-weight:bold;white-space:nowrap;width:8%;text-align:left;border:1px solid black;padding:5px">Office Copy</td>

<td colspan="2" style="width:40%;border-right:1px solid #000000;"></td>

<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>

<td colspan="2" style="width:40%"></td>
<td colspan="1" style="font-weight:bold;white-space:nowrap;width:8%;text-align:right;border:1px solid black;padding:5px">Student Copy</td>

</tr>

<tr>
<td style="background-size:80px 80px;width:7.5%" colspan="1"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle;width:32.7%" colspan="1"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px;width:7.5%;border-right:1px solid #000000; " colspan="1" align="center"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>

<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>

<td style="background-size:80px 80px;width:7.5%" colspan="1"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle;width:33%" colspan="1"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px;width:7.5%" colspan="1" align="center"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>
</tr>

<tr height="10">
<td colspan="3" style="border-right:1px solid #000000; "></td>
<td colspan="1" style="border-right:1px solid #000000;"></td>
<td colspan="3" ></td>
</tr>

<tr height="10">
<td colspan="3" style="width:48%;text-align:left;font-size:14px;padding:10px;border-right:1px solid #000000; "><strong>Bill To</strong></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="3" style="width:48%;text-align:left;font-size:14px;padding:10px"><strong>Bill To</strong></td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr height="10">
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Student Name-</strong>&nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;border-right:1px solid #000000; "><strong>Invoice#-</strong>PCIF00<?=$_REQUEST['invoiceno']?></td>

<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="1" style="width:28%;padding:5px;text-align:left"><strong>Student Name-</strong>&nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;"><strong>Invoice#-</strong>PCIF00<?=$_REQUEST['invoiceno']?></td>
</tr>

<tr height="10">
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Admission No-</strong>&nbsp;<?=$fetch['admissionno']?></td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;border-right:1px solid #000000; "><strong>Fees Date-</strong>&nbsp;<?=date('d-m-Y')?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Admission No-</strong>&nbsp;<?=$fetch['admissionno']?></td>
<td colspan="1" style="width:18%;padding:5px;text-align:right"><strong>Fees Date-</strong>&nbsp;<?=date('d-m-Y')?></td>
</tr>

<tr height="10">
<td colspan="2" style="width:45%;padding:5px;text-align:left;border-right:1px solid #000000; font-size:10px"><strong>Course Name-</strong>&nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="2" style="width:45%;padding:5px;text-align:left; font-size:10px;"><strong>Course Name-</strong>&nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
</tr>

<tr height="10">
<td colspan="2" style="width:45%;padding:5px;text-align:left;border-right:1px solid #000000; "><strong>Payment Mode-</strong>&nbsp;<?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="2" style="width:45%;padding:5px;text-align:left"><strong>Payment Mode-</strong>&nbsp;<?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?></td>
</tr>
</table>

<?php 
$x=0;

$totalfees=getCourse($conn,getStudent($conn,$fetch['student'],'course'),'fees');
$givenfees=getFeedPaid($conn,$fetch['student']);
$discount=getStudentDiscount($conn,$fetch['student'],'amount');

$balance=$totalfees-($givenfees+$discount);
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:0px solid red;">

<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%">SL No</td>
<td align="center" style="padding:8px;border-right:1px solid white;width:34%">Particulars</td>
<td align="center" style="padding:8px;width:8%;border-right:1px solid #000000; ">Amount</td>

<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%">SL No</td>
<td align="center" style="padding:8px;border-right:1px solid white;width:35%">Particulars</td>
<td align="center" style="padding:8px;width:8%">Amount</td>
</tr>


<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `addfees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfee=0;
if($num12){
$x+=1;
$fetch12=fetcharray($res12);
if($fetch12['addfees']){
$addfee+=$fetch12['addfees'];

?>
<tr height="30" style="background-color:#EFEFEF;color:#000000;padding:10px;line-height:normal">

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$x?></td>
<td align="center" style="padding:8px;border-right:1px solid white;width:34%;font-size:12px;">Admission Fees</td>
<td align="center" style="padding:8px;width:8%;border-right:1px solid #000000; "><?=number_format($fetch12['addfees'])?></td>

<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<td align="left" colspan="1" style="padding:8px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$x?></td>
<td align="center"  colspan="1" style="padding:8px;border-right:1px solid white;width:34%;font-size:12px;">Admission Fees</td>
<td align="center"  colspan="1" style="padding:8px;width:8%;"><?=number_format($fetch12['addfees'])?></td>
</tr>
<?php }}?>


<tr height="30" style="background-color:#EFEFEF;color:#000000;padding:10px;line-height:normal">

<?php 
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotal=0;
$k=1;
if($num1){
$x+=1;
?>

<td align="left" colspan="1" style="padding:8px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$x?></td>
<td align="center"  colspan="1" style="padding:8px;border-right:1px solid white;width:34%;font-size:12px;">Monthly Fees(

<?php 

while($fetch1=fetcharray($res1)){
$subtotal+=$fetch1['fees'];
$totfee+=$fetch1['fees'];

?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$k){?>,<?php }?>
<?php $k+=1;} ?>
)</td>
<td align="center"  colspan="1" style="padding:8px;width:8%;border-right:1px solid #000000; "><?=$totfee?></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<?php }else{?>
<td colspan="3" style="background-color:white;border-right:1px solid #000000;"></td>



<?php 
}
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotal1=0;
$k=1;
if($num1){
//$x+=1;
?>
<td align="left" colspan="1" style="padding:8px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$x?></td>
<td align="center"  colspan="1" style="padding:8px;border-right:1px solid white;width:34%; font-size:12px;">Monthly Fees(
<?php 
while($fetch1=fetcharray($res1)){
$subtotal1+=$fetch1['fees'];
$totfee1+=$fetch1['fees'];
?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$k){?>,<?php }?>
<?php $k+=1;} ?>
)</td>
<td align="center"  colspan="1" style="padding:8px;width:8%"><?=$totfee1?></td>
<?php }else{?>
<td colspan="1" style="background-color:white;border-right:1px solid #000000;"></td>
<?php }?>
</tr>
<?php
$total=$subtotal+$addfee;

$sql12="SELECT DISTINCT(`fine`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$fetch12=fetcharray($res12);
$total1+=(int)$fetch12['fine'];
?>

<tr height="8">
<td colspan="3" align="right" style="padding:8px;border-right:1px solid #000000; "><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="right" style="padding:8px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>

<tr height="8" style="background:#EFEFEF;">
<td colspan="3" align="right" style="padding:8px;border-right:1px solid #000000; "><strong>Total&nbsp;&nbsp;&nbsp;<?=$total?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="right" style="padding:8px"><strong>Total&nbsp;&nbsp;&nbsp;<?=$total?></strong></td>
</tr>
<tr height="8" style="background:#;">
<td colspan="3" align="left" style="padding:8px;border-right:1px solid #000000; "><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($total)?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="left" style="padding:8px"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($total)?></strong></td>
</tr>
<?php
$sql123="SELECT DISTINCT(`remarks`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res123=query($conn,$sql123);
$num123=numrows($res123);
if($num123){
$fetch123=fetcharray($res123);
?>
<tr height="8" style="background:#EFEFEF;">
<td colspan="3" align="left" style="padding:8px;border-right:1px solid #000000; "><strong>Remarks :&nbsp;&nbsp;&nbsp;</strong><?=$fetch123['remarks']?></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="left" style="padding:8px"><strong>Remarks :&nbsp;&nbsp;&nbsp;</strong><?=$fetch123['remarks']?></td>
</tr>
<?php }?>
<tr height="8" style="font-size:12px;font-weight:normal">
<td colspan="3" align="left" style="padding:8px;border-right:1px solid #000000; ">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN NITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
<td align="left" colspan="1" style="border-right:1px solid #000000; background:#FFFFFF"></td>
<td colspan="3" align="left" style="padding:8px">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN NITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>

<tr height="10">
<td colspan="3" align="right" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td colspan="3" align="right" ></td>
</tr>
<tr >
<td align="left" colspan="3" style="text-decoration:underline;border-right:1px solid #000000; ">Terms & Conditions</td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="3" style="text-decoration:underline">Terms & Conditions</td>
</tr>

<tr >
<td align="left" colspan="2" style=" ">i) Fees must be paid in advanced<br />
ii)No refund policy</td>
<td colspan="1" align="right" style="text-decoration:overline;border-right:1px solid #000000;"><strong>Authorised&nbsp;signatory</strong></td>

<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="2"> i) Fees must be paid in advanced<br />
ii)No refund policy</td>
<td colspan="1" align="right" style="text-decoration:overline"><strong>Authorised&nbsp;signatory</strong></td>

</tr>

<tr >
<td align="left" colspan="3" style="font-size:12px;text-align:center;line-height:1 rem;border:1px solid black;"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="3" style="font-size:12px;text-align:center;line-height:1 rem;border:1px solid black;border-left:0;"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
</tr>

<tr height="10">
<td colspan="3" align="right" style="border-right:0px solid #000000; "></td>
<td colspan="1" align="right" style="border-right:0px solid #000000; "></td>
<td colspan="3" align="right" ></td>
</tr>
</table>




</div>




</div>


<div id="printDiv1">
<div style="border:1px solid black;padding:3px">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr height="10">

<td colspan="1" style="font-weight:bold;white-space:nowrap;width:8%;text-align:left;border:1px solid black;padding:5px">Office Copy</td>

<td colspan="2" style="width:40%;border-right:1px solid #000000;"></td>

<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>

<td colspan="2" style="width:40%"></td>
<td colspan="1" style="font-weight:bold;white-space:nowrap;width:8%;text-align:right;border:1px solid black;padding:5px">Student Copy</td>

</tr>

<tr>
<td style="background-size:80px 80px;width:7.5%" colspan="1"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle;width:33.1%" colspan="1"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px;width:7.5%;border-right:1px solid #000000; " colspan="1" align="center"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>

<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>

<td style="background-size:80px 80px;width:7.5%" colspan="1"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle;width:33%" colspan="1"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px;width:7.5%" colspan="1" align="center"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>
</tr>

<tr height="10">
<td colspan="3" style="border-right:1px solid #000000; "></td>
<td colspan="1" style="border-right:1px solid #000000;"></td>
<td colspan="3" ></td>
</tr>

<tr height="10">
<td colspan="3" style="width:48%;text-align:left;font-size:14px;padding:10px;border-right:1px solid #000000; "><strong>Bill To</strong></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="3" style="width:48%;text-align:left;font-size:14px;padding:10px"><strong>Bill To</strong></td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr height="10">
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Student Name-</strong>&nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;border-right:1px solid #000000; "><strong>Invoice#-</strong>PCIF00<?=$_REQUEST['invoiceno']?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="1" style="width:28%;padding:5px;text-align:left"><strong>Student Name-</strong>&nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;"><strong>Invoice#-</strong>PCIF00<?=$_REQUEST['invoiceno']?></td>
</tr>

<tr height="10">
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Admission No-</strong>&nbsp;<?=$fetch['admissionno']?></td>
<td colspan="1" style="width:18%;padding:5px;text-align:right;border-right:1px solid #000000; "><strong>Fees Date-</strong>&nbsp;<?=date('d-m-Y')?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="1" style="width:27%;padding:5px;text-align:left"><strong>Admission No-</strong>&nbsp;<?=$fetch['admissionno']?></td>
<td colspan="1" style="width:18%;padding:5px;text-align:right"><strong>Fees Date-</strong>&nbsp;<?=date('d-m-Y')?></td>
</tr>

<tr height="10">
<td colspan="2" style="width:45%;padding:5px;text-align:left;border-right:1px solid #000000; font-size:10px;"><strong>Course Name-</strong>&nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="2" style="width:45%;padding:5px;text-align:left ; font-size:10px;"><strong>Course Name-</strong>&nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
</tr>

<tr height="10">
<td colspan="2" style="width:45%;padding:5px;text-align:left;border-right:1px solid #000000; "><strong>Payment Mode-</strong>&nbsp;<?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?></td>
<td colspan="1" style="width:1%;border-right:1px solid #000000;"></td>
<td colspan="2" style="width:45%;padding:5px;text-align:left"><strong>Payment Mode-</strong>&nbsp;<?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?></td>
</tr>
</table>

<?php 
$xZ=0;

$totalfeesZ=getCourse($conn,getStudent($conn,$fetch['student'],'course'),'fees');
$givenfeesZ=getFeedPaid($conn,$fetch['student']);
$discountZ=getStudentDiscount($conn,$fetch['student'],'amount');

$balanceZ=$totalfeesZ-($givenfeesZ+$discountZ);
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:0px solid red;">

<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%">SL No</td>
<td align="center" style="padding:10px;border-right:1px solid white;width:34%">Particulars</td>
<td align="center" style="padding:10px;width:8%;border-right:1px solid #000000; ">Amount</td>

<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%">SL No</td>
<td align="center" style="padding:10px;border-right:1px solid white;width:35%">Particulars</td>
<td align="center" style="padding:10px;width:8%">Amount</td>
</tr>


<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `addfees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfeZe=0;
if($num12){
$xZ+=1;
$fetch12=fetcharray($res12);
if($fetch12['addfees']){
$addfeeZ+=$fetch12['addfees'];

?>
<tr height="30" style="background-color:#EFEFEF;color:#000000;padding:8px;line-height:normal">

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$xZ?></td>
<td align="center" style="padding:8px;border-right:1px solid white;width:34%">Admission Fees</td>
<td align="center" style="padding:8px;width:8%;border-right:1px solid #000000; "><?=number_format($fetch12['addfees'])?></td>

<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$xZ?></td>
<td align="center"  colspan="1" style="padding:10px;border-right:1px solid white;width:34%">Admission Fees</td>
<td align="center"  colspan="1" style="padding:10px;width:8%;"><?=number_format($fetch12['addfees'])?></td>
</tr>
<?php }}?>


<tr height="30" style="background-color:#EFEFEF;color:#000000;padding:10px;line-height:normal">

<?php 
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotalZ=0;
$kZ=1;
if($num1){
$xZ+=1;
?>

<td align="left" colspan="1" style="padding:8px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$xZ?></td>
<td align="center"  colspan="1" style="padding:8px;border-right:1px solid white;width:34%;">Monthly Fees(

<?php 

while($fetch1=fetcharray($res1)){
$subtotalZ+=$fetch1['fees'];
$totfeeZ+=$fetch1['fees'];

?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$kZ){?>,<?php }?>
<?php $kZ+=1;} ?>
)</td>
<td align="center"  colspan="1" style="padding:10px;width:8%;border-right:1px solid #000000; "><?=$totfeeZ?></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>

<?php }else{?>
<td colspan="3" style="background-color:white;border-right:1px solid #000000;"></td>



<?php 
}
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotal1Z=0;
$kZ=1;
if($num1){
//$xZ+=1;
?>
<td align="left" colspan="1" style="padding:10px;border-right:1px solid white;white-space:nowrap;width:5%"><?=$xZ?></td>
<td align="center"  colspan="1" style="padding:10px;border-right:1px solid white;width:34%">Monthly Fees(
<?php 
while($fetch1=fetcharray($res1)){
$subtotal1Z+=$fetch1['fees'];
$totfee1Z+=$fetch1['fees'];
?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$kZ){?>,<?php }?>
<?php $kZ+=1;} ?>
)</td>
<td align="center"  colspan="1" style="padding:10px;width:8%"><?=$totfee1Z?></td>
<?php }else{?>
<td colspan="1" style="background-color:white;border-right:1px solid #000000;"></td>

</tr>
<?php }
$totalZ=$subtotalZ+$addfeeZ;

$sql12="SELECT DISTINCT(`fine`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$fetch12=fetcharray($res12);
$total1Z+=(int)$fetch12['fine'];
?>

<tr height="8">
<td colspan="3" align="right" style="padding:10px;border-right:1px solid #000000; "><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="right" style="padding:10px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>

<tr height="8" style="background:#EFEFEF;">
<td colspan="3" align="right" style="padding:10px;border-right:1px solid #000000; "><strong>Total&nbsp;&nbsp;&nbsp;<?=$totalZ?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="right" style="padding:10px"><strong>Total&nbsp;&nbsp;&nbsp;<?=$totalZ?></strong></td>
</tr>
<tr height="8" style="background:#;">
<td colspan="3" align="left" style="padding:10px;border-right:1px solid #000000; "><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($totalZ)?></strong></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="left" style="padding:10px"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($totalZ)?></strong></td>
</tr>
<?php
$sql123="SELECT DISTINCT(`remarks`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res123=query($conn,$sql123);
$num123=numrows($res123);
if($num123){
$fetch123=fetcharray($res123);
?>
<tr height="8" style="background:#EFEFEF;">
<td colspan="3" align="left" style="padding:10px;border-right:1px solid #000000; "><strong>Remarks :&nbsp;&nbsp;&nbsp;</strong><?=$fetch123['remarks']?></td>
<td colspan="1" style="width:1%;background-color:white;border-right:1px solid #000000"></td>
<td colspan="3" align="left" style="padding:10px"><strong>Remarks :&nbsp;&nbsp;&nbsp;</strong><?=$fetch123['remarks']?></td>
</tr>
<?php }?>
<tr height="8" style="font-size:12px;font-weight:normal">
<td colspan="3" align="left" style="padding:10px;border-right:1px solid #000000; ">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
<td align="left" colspan="1" style="border-right:1px solid #000000; background:#FFFFFF"></td>
<td colspan="3" align="left" style="padding:10px">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>

<tr height="10">
<td colspan="3" align="right" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td colspan="3" align="right" ></td>
</tr>
<tr >
<td align="left" colspan="3" style="text-decoration:underline;border-right:1px solid #000000; ">Terms & Conditions</td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="3" style="text-decoration:underline">Terms & Conditions</td>
</tr>

<tr >
<td align="left" colspan="2" style=" ">i) Fees must be paid in advanced<br />
ii)No refund policy</td>
<td colspan="1" align="right" style="text-decoration:overline;border-right:1px solid #000000;"><strong>Authorised&nbsp;signatory</strong></td>

<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="2"> i) Fees must be paid in advanced<br />
ii)No refund policy</td>
<td colspan="1" align="right" style="text-decoration:overline"><strong>Authorised&nbsp;signatory</strong></td>

</tr>

<tr >
<td align="left" colspan="3" style="font-size:12px;text-align:center;line-height:1 rem;border:1px solid black;"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
<td align="left" colspan="1" style="border-right:1px solid #000000; "></td>
<td align="left" colspan="3" style="font-size:12px;text-align:center;line-height:1 rem;border:1px solid black;border-left:0;"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
</tr>

<tr height="10">
<td colspan="3" align="right" style="border-right:0px solid #000000; "></td>
<td colspan="1" align="right" style="border-right:0px solid #000000; "></td>
<td colspan="3" align="right" ></td>
</tr>
</table>




</div>




</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>