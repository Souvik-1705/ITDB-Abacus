<?php include('header.php'); 
$left=4;
?>
<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printDiv');
var newWin=window.open('','Print-Window','width=980px,height=1000');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()" style="padding:10px;">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12" style="font-family:Verdana, Arial, Helvetica, sans-serif">
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
<div class="card-body collapse in table-responsive">
<div id="printDiv" style="font-size:10px;width:1100px;font-family:Geneva, Arial, Helvetica, sans-serif">
<table width="540px" cellpadding="0" cellspacing="0" border="0" align="left" style="margin-left:5px;font-size:12px;border-top:1px solid #000000;border-left:1px solid #000000;border-right:1px solid #000000">
<tr>
<td width="90%"></td>
<td width="10%" style="border:.5px solid black;font-weight:bold;white-space:nowrap;padding:5px">Office Copy</td>
</tr>
<tr height="10">
<td colspan="2"></td>
</tr>
</table>

<table width="540px" cellpadding="0" cellspacing="0" border="0" align="right" style="margin-right:5px;font-size:12px;border-top:1px solid #000000;border-left:1px solid #000000;border-right:1px solid #000000">
<tr>
<td width="90%"></td>
<td width="10%" style="border:.5px solid black;font-weight:bold;white-space:nowrap;padding:5px">Student Copy</td>
</tr>
<tr height="10">
<td colspan="2"></td>
</tr>
</table>
<?php
$sql="SELECT * FROM `ab_student` WHERE `registrationno`='".$_REQUEST['reg']."'";
$res=query($conn,$sql);
$fetch=fetcharray($res);
?>

<table width="540px" cellpadding="0" cellspacing="0" border="0" align="left" style="margin-left:5px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr>
<td style="background-size:80px 80px;border-left:1px solid black" width="15%"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle" width="70%"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px" width="15%" align="right"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>
<tr height="10">
<td colspan="3"></td>
</tr>
</tr>
</table>


<table width="540px" cellpadding="0" cellspacing="0" border="0" align="right" style="margin-right:5px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr>
<td style="background-size:80px 80px" width="15%"> <img src="images/logo.png"  width="80px" height="80px" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle" width="70%"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:16px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:80px 80px" width="15%" align="right"><img src="images/logo2.png"  width="80px"  height="80px" style="padding-right:5px"/>
</td>
</tr>
<tr height="10">
<td colspan="3"></td>
</tr>
</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="left" style="margin-left:5px;font-size:14px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr height="15">
<td colspan="2" style="font-size:14px;padding:10px"><strong>Bill To</strong></td>
</tr>
<tr height="15">
<td align="left" style="padding:10px 0 10px 10px"><strong>Student Name-</strong> &nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td align="Right" style="padding:10px 10px 10px 0px"><strong>Invoice#-</strong>PCIF00000<?=$_REQUEST['invoiceno']?></td>
</tr>
</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="right" style="margin-right:5px;font-size:14px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr height="10">
<td colspan="2" style="font-size:14px;padding:10px"><strong>Bill To</strong></td>
</tr>
<tr height="15">
<td align="left" style="padding:10px 0 10px 10px"><strong>Student Name-</strong> &nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td align="Right" style="padding:10px 10px 10px 0"><strong>Invoice#-</strong>PCIF00000<?=$_REQUEST['invoiceno']?></td>
</tr>
</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="left" style="line-height:1 rem;margin-left:5px;font-size:14px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr height="10">
<td width="16%" align="left" style="padding:10px 0 10px 10px"><strong>Admission No-</strong> &nbsp;<?=ucwords(strtolower($fetch['admissionno']))?></td>
<td width="13%" align="right" style="padding:10px 10px 10px 0"><strong>Fees Date-</strong> &nbsp;<?=date('d-m-Y')?></td>
</tr>
<tr height="10">
<td align="left" style="padding:10px 0 10px 10px"><strong>Course Name-</strong> &nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td  align="right" style="padding:10px 10px 10px 0"><strong>Payment Mode-</strong> &nbsp;<?php if(getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')){?><?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?><?php }else{?><?=getAddFeesPaid($conn,$_REQUEST['reg'],'paymode')?><?php }?></td>
</tr>
</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="right" style="line-height:1 rem;margin-right:5px;font-size:14px;border-left:1px solid #000000;border-right:1px solid #000000">
<tr height="10">
<td width="16%" align="left" style="padding:10px 0 10px 10px"><strong>Admission No-</strong> &nbsp;<?=ucwords(strtolower($fetch['admissionno']))?></td>

<td width="13%" align="right" style="padding:10px 10px 10px 0"><strong><strong>Fees Date-</strong></strong> &nbsp;<?=date('d-m-Y')?></td>

</tr>
<tr height="10">
<td align="left" style="padding:10px 0 10px 10px"><strong>Course Name-</strong> &nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td  align="right" style="padding:10px 10px 10px 0"><strong>Payment Mode-</strong> &nbsp;<?php if(getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')){?><?=getStudentFeesByDate($conn,$_REQUEST['recipt'],'paymode')?><?php }else{?><?=getAddFeesPaid($conn,$_REQUEST['reg'],'paymode')?><?php }?></td>
</tr>
</table>
	
<table width="540px" cellpadding="0" cellspacing="0" align="left" style="margin-left:5px;font-weight:bold;font-size:12px;border-left:1px solid #000000;border-right:1px solid #000000;">
<?php 
$x=0;
$totalfees=getCourse($conn,getStudent($conn,$fetch['student'],'course'),'fees');
$givenfees=getFeedPaid($conn,$fetch['student']);
$discount=getStudentDiscount($conn,$fetch['student'],'amount');
$balance=$totalfees-($givenfees+$discount);
?>
<thead>
<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">
<td width="5%" align="left" style="padding:10px;border-right:1px solid white;white-space:nowrap">SL No</td>
<td width="75%" align="center" style="padding:10px;border-right:1px solid white">Particulars</td>
<td width="20%" align="center" style="padding:10px;">Amount</td>
</tr>
</thead>
<tbody>
<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfee=0;
if($num12){
$fetch12=fetcharray($res12);
if($fetch12['addfees']>0){
$addfee+=$fetch12['addfees'];
$x+=1;
?>
<tr>
<td align="left" style="padding:10px;background:#EFEFEF"><?=$x?></td>
<td align="left" style="padding:10px;background:#EFEFEF">Admission Fees</td>
<td align="center" style="padding:10px;background:#EFEFEF"><?=number_format($fetch12['addfees'])?></td>
</tr>
<?php }}?>



<tr >
<?php 
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotal=0;
$k=1;
if($num1){
$x+=1;
?>
<td align="left" style="padding:10px;background:#EFEFEF"><?=$x?></td>
<td align="left" style="padding:10px;background:#EFEFEF" width="10%">Monthly Fees(
<?php 
while($fetch1=fetcharray($res1)){
$subtotal+=$fetch1['fees'];
$totfee+=$fetch1['fees'];
?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$k){?>,<?php }?>
<?php $k+=1;} ?>
)</td>
<td align="center" style="padding:10px;background:#EFEFEF"><?=$totfee?></td>
<?php }?>
</tr>

<?php
$total=$subtotal+$addfee;
$sql12="SELECT DISTINCT(`fine`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$fetch12=fetcharray($res12);
$total+=(int)$fetch12['fine'];
?>
<tr height="8">
<td colspan="4" align="right" style="padding:10px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>
<tr height="8">
<td colspan="4" align="right" style="padding:10px;background:#EFEFEF;border-left:1px solid #000000"><strong>Total&nbsp;&nbsp;&nbsp;<?=$total?></strong></td>
</tr>

<tr height="8">
<td colspan="4" align="left" style="padding:10px;background:#"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($total)?></strong></td>
</tr>
<?php
$sql123="SELECT DISTINCT(`remarks`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res123=query($conn,$sql123);
$num123=numrows($res123);
$fetch123=fetcharray($res123);
?>
<tr height="5">
<td colspan="4" align="left" style="padding:10px;background:#EFEFEF;font-weight:normal;border-left:1px solid #000000"><strong>Remarks&nbsp;:</strong>&nbsp;&nbsp;<?=$fetch123['remarks']?></td>
</tr>
<tr height="10">
<td></td>
</tr>
<tr height="10">
<td colspan="4"  style="font-size:12px;font-weight:normal" valign="bottom" width="80%">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>
</tbody>
</table>

<table width="540px" cellpadding="0" cellspacing="0" align="right" style="margin-right:5px;font-weight:bold;font-size:12px;border-left:1px solid #000000;border-right:1px solid #000000">
<?php 
$x=0;
$totalfees=getCourse($conn,getStudent($conn,$fetch['student'],'course'),'fees');
$givenfees=getFeedPaid($conn,$fetch['student']);
$discount=getStudentDiscount($conn,$fetch['student'],'amount');

$balance=$totalfees-($givenfees+$discount);
?>
<thead>
<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">
<td  width="5%" align="left" style="padding:10px;border-right:1px solid white;white-space:nowrap">SL No</td>
<td  width="75%" align="center" style="padding:10px;border-right:1px solid white">Particulars</td>
<td width="20%" align="center" style="padding:10px;border-right:1px solid black">Amount</td>
</tr>
</thead>
<tbody>
<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfee=0;
if($num12){

$fetch12=fetcharray($res12);
if($fetch12['addfees']>0){
$addfee1 +=$fetch12['addfees'];
$x+=1;
?>
<tr>
<td align="left" style="padding:10px;background:#EFEFEF"><?=$x?></td>
<td align="left" style="padding:10px;background:#EFEFEF">Admission Fees</td>
<td align="center" style="padding:10px;background:#EFEFEF;border-right:1px solid black"><?=number_format($fetch12['addfees'])?></td>
</tr>
<?php }}?>



<tr >
<?php 
$sql1="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `fees`!=0 AND `feesid`='".$_REQUEST['feesid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
$subtotal=0;
$k=1;
if($num1){
$x+=1;
?>
<td align="left" style="padding:10px;background:#EFEFEF"><?=$x?></td>
<td align="left" style="padding:10px;background:#EFEFEF" width="10%">Monthly Fees(
<?php 
while($fetch1=fetcharray($res1)){
$subtotal1+=$fetch1['fees'];
$totfee1+=$fetch1['fees'];

?>
<?=date('M y',strtotime($fetch1['monthyear']))?><?php if($num1>$k){?>,<?php }?>
<?php $k+=1;} ?>
)</td>
<td align="center" style="padding:10px;background:#EFEFEF;border-right:1px solid #000000"><?=$totfee1?></td>
<?php }?>
</tr>

<?php
$total1=$subtotal1+$addfee1;

$sql12="SELECT DISTINCT(`fine`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$fetch12=fetcharray($res12);

$total1+=(int)$fetch12['fine'];
?>
<tr height="5">
<td colspan="4" align="right" style="padding:10px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>
<tr height="5">
<td colspan="4" align="right" style="padding:10px;background:#EFEFEF;border-right:1px solid black;"><strong>Total&nbsp;&nbsp;&nbsp;<?=$total1?></strong></td>
</tr>

<tr height="0">
<td colspan="4" align="left" style="padding:10px;background:#"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($total1)?></strong></td>
</tr>
<?php
$sql123="SELECT DISTINCT(`remarks`) FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res123=query($conn,$sql123);
$num123=numrows($res123);
$fetch123=fetcharray($res123);
?>
<tr height="5">
<td colspan="4" align="left" style="padding:10px;background:#EFEFEF;font-weight:normal;border-right:1px solid black"><strong>Remarks&nbsp;:</strong>&nbsp;&nbsp;<?=$fetch123['remarks']?></td>
</tr>
<tr height="10">
<td></td>
</tr>
<tr height="10">
<td colspan="4"  style="font-size:12px;font-weight:normal" valign="bottom" width="80%">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>
</tbody>
</table>

<table width="540px" align="left" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px;font-size:12px;border-left:1px solid #000000;border-right:1px solid #000000;border-bottom:2px solid #000000;">
<tr height="10">
<td colspan="2" align="right" ></td>
</tr>
<tr >
<td align="left" colspan="2" style="text-decoration:underline">Terms & Conditions</td>
</tr>
<tr style="font-size:12px">
<td colspan="2" align="left">i) Fees must be paid in advanced<br />
ii)No refund policy
</td>
</tr>
<tr height="10">
<td colspan="2" align="right" style="text-decoration:overline"><strong>Authorised signatory</strong></td>
</tr>
<tr height="10">
<td colspan="2" align="right" ></td>
</tr>

<tr height="40" style="line-height:1rem;border:2px solid black">
<td colspan="2" align="center" style="font-size:12px"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
</tr>

<tr height="10">
<td colspan="2" align="right" ></td>
</tr>
</table>
<table width="540px" align="right" border="0" cellpadding="0" cellspacing="0" style="margin-right:5px;font-size:12px;border-left:1px solid #000000;border-right:1px solid #000000;border-bottom:2px solid #000000;">
<tr height="10">
<td align="left"></td>
</tr>
<tr >
<td align="left" colspan="2" style="text-decoration:underline">Terms & Conditions</td>
</tr>

<tr style="font-size:12px">
<td colspan="2" align="left">i) Fees must be paid in advanced<br />
ii)No refund policy
</td>
</tr>
<tr height="10">
<td colspan="2" align="right" style="text-decoration:overline"><strong>Authorised signatory</strong></td>
</tr>
<tr height="10">
<td colspan="2" align="right" ></td>
</tr>
<tr height="40" style="line-height:1rem;border:2px solid black">
<td colspan="2" align="center" style="font-size:12px"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
</tr>
<tr height="10">
<td colspan="2" align="right" ></td>
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