<?php include('header.php'); 
$left=4;
?>
<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printDiv');
var newWin=window.open('','Print-Window','width=980px,height=1000');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()" style="padding:15px;border:1px solid black;">'+divToPrint.innerHTML+'</body></html>');
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
<div id="printDiv" style="font-size:12px;width:1100px;font-family:Geneva, Arial, Helvetica, sans-serif">
<?php
$sql="SELECT * FROM `ab_student` WHERE `registrationno`='".$_REQUEST['reg']."'";
$res=query($conn,$sql);
$fetch=fetcharray($res);


$feeid=getAddFeesPaid($conn,$_REQUEST['reg'],'feesid');
?>
<table width="540px" cellpadding="0" cellspacing="0" border="0" align="left" style="margin-left:5px">
<tr>
<td width="90%"></td>
<td width="10%" style="border:1px solid black;padding:5px;font-weight:bold;white-space:nowrap">Office Copy</td>

</tr>
</table>
<table width="540px" cellpadding="0" cellspacing="0" border="0" align="right" style="margin-right:5px">
<tr>
<td width="90%"></td>
<td width="10%" style="border:1px solid black;padding:5px;font-weight:bold;white-space:nowrap">Student Copy</td>
</tr>
</table>

<table width="540px" cellpadding="0" cellspacing="0" border="0" align="left" style="margin-left:5px">
<tr><td colspan="3"></td></tr>
<tr>
<td style="background-size:100px 100px" width="15%"> <img src="images/logo.png"  width="80" height="80" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle" width="70%"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:14px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:100px 100px" width="15%" align="right"><img src="images/logo2.png"  width="80"  height="80"/>
</td>
</tr>
</table>
<table width="540px" cellpadding="0" cellspacing="0" border="0" align="right"  style="margin-right:5px">
<tr>
<td style="background-size:100px 100px" width="15%"> <img src="images/logo.png"  width="80" height="80" /></td>
<td style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle" width="70%"><h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:14px; margin:0; font-weight:300" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,HINDU MILAN MANDIR KALIBARI LUMDING NAGAON,ASSAM,782447</h3>
</td>
<td style="background-size:100px 100px" width="15%" align="right"><img src="images/logo2.png"  width="80"  height="80"/>
</td>
</tr>
</table>
<table width="540px" border="0" cellpadding="0" cellspacing="0" align="left" style="margin-left:5px">
<tr height="20">
<td colspan="2" ><strong>Bill To</strong></td>
</tr>

<tr height="20">
<td align="left" >Student Name- &nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td align="Right"><strong>Invoice#-</strong>
PCIF00000<?=$_REQUEST['invoice']?>
</td>
</tr>


</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="right" style="margin-right:5px">
<tr height="20">
<td colspan="2" ><strong>Bill To</strong></td>
</tr>

<tr height="20">
<td align="left" >Student Name- &nbsp;<?=ucwords(strtolower($fetch['name']))?> (<?=$fetch['registrationno']?>)</td>
<td align="Right"><strong>Invoice#-</strong>
PCIF00000<?=$_REQUEST['invoice']?>
</td>
</tr>


</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="left" style="line-height:1.5rem;margin-left:5px">
<tr height="20">
<td width="16%" align="left">Admission No- &nbsp;<?=ucwords(strtolower($fetch['admissionno']))?></td>
<td width="13%" align="right"><strong>Fees Date-</strong> &nbsp;<?=date('d-m-Y',strtotime(getCollectionDetails($conn,$_REQUEST['id'],'date')))?></td>
</tr>
<tr height="20">
<td align="left" >Course Name- &nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td  align="right">Payment Mode- &nbsp;<?=getCollectionDetails($conn,$_REQUEST['id'],'paymode')?></td>

</tr>

</table>

<table width="540px" border="0" cellpadding="0" cellspacing="0" align="right" style="line-height:1.5rem;margin-right:5px">
<tr height="20">
<td width="16%" align="left">Admission No- &nbsp;<?=ucwords(strtolower($fetch['admissionno']))?></td>
<td width="13%" align="right"><strong>Fees Date-</strong> &nbsp;<?=date('d-m-Y',strtotime(getCollectionDetails($conn,$_REQUEST['id'],'date')))?></td>
</tr>
<tr height="20">
<td align="left" >Course Name- &nbsp;<?=ucwords(getCourse($conn,$fetch['course'],'course'))?></td>
<td  align="right">Payment Mode- &nbsp;<?=getCollectionDetails($conn,$_REQUEST['id'],'paymode')?></td>

</tr>

</table>
	
<table width="540px" cellpadding="0" cellspacing="0" align="left" style="margin-left:5px;font-weight:bold">

<thead>
<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">
<td  width="5%" align="left" style="padding:5px;border-right:1px solid white">Item Name</td>
<td  width="5%" align="right" style="padding:5px;border-right:1px solid white">Rate</td>
<td width="5%" align="right" style="padding:5px;border-right:1px solid white">Amount</td>
<td width="5%" align="right" style="padding:5px;border-right:1px solid white">Due</td>

</tr>
</thead>
<tbody>
<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfee=0;
if($num12>0){
$fetch12=fetcharray($res12);
if($fetch12['addfees']){
$addfee+=$fetch12['addfees'];
$addfee+=(int)$fetch12['fine'];
?>
<tr >
<td width="50%" align="left" style="padding:5px;background:#EFEFEF">Admission Fees</td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF;"><?=number_format($fetch12['addfees']+$fetch12['due'],2)?></td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF"><?=$fetch12['addfees']?></td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF"><?=$fetch12['due']?></td>
</tr>


<tr height="5">
<td colspan="4" align="right" style="padding:5px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>
<tr height="5">
<td colspan="4" align="right" style="padding:2px;background:#EFEFEF"><strong>Total&nbsp;&nbsp;&nbsp;<?=$addfee?></strong></td>
</tr>
<tr height="5">
<td colspan="4" align="left" style="padding:2px;background:#"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($addfee)?></strong></td>
</tr>


<tr height="5">
<td colspan="4" align="left" style="padding:5px;background:#EFEFEF;font-weight:normal"><strong>Remarks&nbsp;:</strong>&nbsp;&nbsp;<?=$fetch12['remarks']?></td>
</tr>
<?php }}?>
<tr height="20">
<td></td>
</tr>
<tr height="20">
<td colspan="4"  style="font-size:11px;font-weight:normal">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>
</tbody>
</table>
<table width="540px" cellpadding="0" cellspacing="0" align="right" style="margin-right:5px;font-weight:bold">
<thead>
<tr height="30" style="background-color:#666666;color:#FFFFFF;padding:10px;line-height:normal">
<td  width="5%" align="left" style="padding:5px;border-right:1px solid white">Item Name</td>
<td  width="5%" align="right" style="padding:5px;border-right:1px solid white">Rate</td>
<td width="5%" align="right" style="padding:5px;border-right:1px solid white">Amount</td>
<td width="5%" align="right" style="padding:5px;border-right:1px solid white">Due</td>

</tr>
</thead>
<tbody>
<?php
$sql12="SELECT * FROM `ab_collection_details` WHERE `registrationno`='".$_REQUEST['reg']."' AND `feesid`='".$_REQUEST['feesid']."'";
$res12=query($conn,$sql12);
$num12=numrows($res12);
$addfee=0;
if($num12>0){
$fetch12=fetcharray($res12);
if($fetch12['addfees']){
$addfee+=$fetch12['addfees'];
$addfee+=(int)$fetch12['fine'];
?>
<tr >
<td width="50%" align="left" style="padding:5px;background:#EFEFEF">Admission Fees</td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF;"><?=number_format($fetch12['addfees']+$fetch12['due'],2)?></td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF"><?=$fetch12['addfees']?></td>
<td width="5%" align="right" style="padding:5px;background:#EFEFEF"><?=$fetch12['due']?></td>
</tr>


<tr height="5">
<td colspan="4" align="right" style="padding:5px"><strong>Late Fee&nbsp;&nbsp;&nbsp;<?=$fetch12['fine']?></strong></td>
</tr>
<tr height="5">
<td colspan="4" align="right" style="padding:2px;background:#EFEFEF"><strong>Total&nbsp;&nbsp;&nbsp;<?=$addfee?></strong></td>
</tr>
<tr height="5">
<td colspan="4" align="left" style="padding:2px;background:#"><strong>In Words (Rs.) :&nbsp;&nbsp;&nbsp;<?=getNumtoWord($addfee)?></strong></td>
</tr>


<tr height="5">
<td colspan="4" align="left" style="padding:5px;background:#EFEFEF;font-weight:normal"><strong>Remarks&nbsp;:</strong>&nbsp;&nbsp;<?=$fetch12['remarks']?></td>
</tr>
<?php }}?>
<tr height="20">
<td></td>
</tr>
<tr height="20">
<td colspan="4"  style="font-size:11px;font-weight:normal">An IAF ISO 9001:2015 Certified Institute,
Computer Education Institute Reg. Under GOVERNMENT OF INDIA MINISTRY OF CORPORATE AFFAIRS.
The Corporate Identity Number of the company is U85300AS2022NPL023191.
The Institute Registered Under DARPAN ENITI AAYOG) Unique Id of VO/NGO:- AS/2022/0318656
The Institute Registered Under MSME.</td>
</tr>
</tbody>
</table>

<table width="540px" align="left" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px">
<tr height="20">
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
<tr height="30">
<td colspan="2" align="right" style="text-decoration:overline"><strong>Authorised signatory</strong></td>
</tr>

<tr height="30" style="line-height:1.2rem;border:2px solid black">
<td colspan="2" align="center" style="font-size:14px"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
</tr>
</table>
<table width="540px" align="right" border="0" cellpadding="0" cellspacing="0" style="margin-right:5px">
<tr height="20">
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
<tr height="30">
<td colspan="2" align="right" style="text-decoration:overline"><strong>Authorised signatory</strong></td>
</tr>

<tr height="30" style="line-height:1.2rem;border:2px solid black">
<td colspan="2" align="center" style="font-size:14px"><strong>CONTACT NO:-8167692041/8486515670 E-MAIL:-SUPPORT@pcif.in  WEBSITE:WWW.PCIF.IN</strong></td>
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