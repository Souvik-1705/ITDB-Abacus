<?php include('header.php'); 
$left=3;
?>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printDiv');
var newWin=window.open('','Print-Window','width=835,height=1120');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
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
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">TAKE A PRINT OUT</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>

<div class="card-body collapse in">

<div class="table-responsive">
<div id="studentDiv">
<div align="center"><a  onClick="printDivList();" style="cursor:pointer;"><img src="images/print1.jpg" width="50" title="Print Out"/></a></div>
<div>&nbsp;</div>
<div align="center">
<div id="printDiv" style="width:800px;">
<?php 
$sql="SELECT * FROM `ab_student` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>

<div class="table-responsive">

<div style="padding:15px">
<div id="pageOne" style="min-height:1050px;border:1px solid #999999;padding:10px;" align="center">
<table width="90%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
<td style="background-size:100px 100px" width="15%"> <img src="images/logo.png"  width="80" height="80" /></td>

<td  style="border:0px solid #333333; border-radius:15px; font-family:cambria; padding:5px;vertical-align:middle" width="70%"> <h3 style="font-size:20px; margin:0; margin-bottom:2px;" align="center"><strong>Pranabananda Computer Institute Foundation</strong></h3><h3 style="font-size:14px; margin:0; font-weight:400" align="center">C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447</h3>
</td>

<td style="background-size:100px 100px" width="15%" align="right"><img src="images/logo2.png"  width="80"  height="80"/>
</td>
</tr>
</table>
<div style="height:50px">&nbsp;</div>

<table width="100%" align="center" style="font-size:16px;" border="0">
<tr>
<td align="center" style="font-weight:bold;text-decoration:underline;">ACKNOWLEDGEMENT FORM</td>
</tr>
</table>
<div style="height:30px">&nbsp;</div>

<table width="60%" align="left" style="font-size:14px;line-height:normal">
<tr height="30">
<td style="padding:0px 40px;white-space:nowrap;width:50%">Registration No.</td>
<td style="white-space:nowrap;width:50%">: <?php if($fetch['registrationno']){?><?=strtoupper($fetch['registrationno'])?><?php }else{ ?>----<?php } ?></td>
</tr>
<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Admission No.</td>
<td>: <?php if($fetch['admissionno']){?><?=strtoupper($fetch['admissionno'])?><?php }else{ ?>----<?php } ?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Session</td>
<td>: <?=getSession($conn,$fetch['session'],'session')?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Category</td>
<td >: <?=ucwords(strtolower(getCourseCategory($conn,$fetch['course_cat'],'category')))?></td>
</tr>

<tr height="40">
<td style="padding:0px 40px;white-space:nowrap">Duration</td>
<td>: <?=getDuration($conn,$fetch['duration'])?></td>
</tr>
</table>


<table width="40%" align="right" style="font-size:14px;line-height:normal">
<tr height="30">
<td align="center" colspan="2" rowspan="5"><?php if($fetch['photo']){?><img src="student/<?=$fetch['photo']?>" style="width:130px;height:130px;margin-top:10px" alt="photo" /><?php }?></td>
</tr>

</table>


<table width="100%" align="center" style="font-size:16px;" border="0">
<tr height="30">
<td style="padding:0px 40px;white-space:nowrap;width:30%">Course</td>
<td style="white-space:nowrap;width:70%">: <?=ucwords(strtolower(getCourse($conn,$fetch['course'],'course')))?></td>
</tr>
<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Batch</td>
<td>: <?=ucwords(strtolower(getBatch($conn,$fetch['batch'],'batch')))?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Admission Fees</td>
<td>: <?=$fetch['addfees']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Monthly Fees</td>
<td>: <?=$fetch['mfees']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Name</td>
<td>: <?=$fetch['name']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Gender</td>
<td>: <?=$fetch['gender']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Phone No</td>
<td>: <?=$fetch['phone']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Email</td>
<td>: <?=$fetch['email']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Date of Birth</td>
<td>: <?=date("d-m-Y",strtotime($fetch['dob']))?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Admission Date</td>
<td>: <?=date("d-m-Y",strtotime($fetch['admission']))?></td>
</tr>



<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Father's Name</td>
<td>: <?=$fetch['fname']?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Father's Phone No.</td>
<td>: <?php if($fetch['fnumber']){?><?=$fetch['fnumber']?> <?php }else{ ?>----<?php } ?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Mother's Name</td>
<td>: <?=$fetch['mname']?></td>
</tr>

<tr height="40">
<td style="padding:0px 40px;white-space:nowrap">Mother's Phone No.</td>
<td>:<?php if($fetch['mnumber']){?> <?=$fetch['mnumber']?> <?php }else{ ?>----<?php } ?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Address</td>
<td>: <?=stripslashes(ucwords($fetch['address']))?></td>
</tr>

<tr height="30">
<td style="padding:0px 40px;white-space:nowrap">Reference Name</td>
<td>: <?php if($fetch['refname']){?> <?=$fetch['refname']?> <?php }else{ ?>----<?php } ?></td>
</tr>
</table>
</div>



<div style="height:60px"></div>
<div style="border:1px solid #999999;padding:10px;min-height:1050px" >

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="color:#000000">
<td colspan="2" style="font-weight:bold;text-decoration:underline;text-align:center;text-underline-offset:3px;">TERMS AND CONDITIONS OF PCIF™:</td>

<tr>
<td colspan="2" style="padding:0px 40px;">1.    Admission Fee: Students must pay the admission fee at the time of admission. Fees once paid are non-refundable.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  2.    Discipline: Students must maintain discipline during class hours. Misbehavior with teachers or staff will result in immediate expulsion.</td></tr>
   <tr>
<td colspan="2" style="padding:0px 40px;"> 3.    Attendance: Students must attend at least 80% of theory and practical classes to qualify for certification.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  4.    Course Completion: Students are responsible for successfully completing their course requirements.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  5.    Amendments: The institute reserves the right to modify rules and regulations as needed.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  6.    Application Acceptance: The institute has the authority to accept or cancel any application at its discretion.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  7.    Property Damage: Any damage to institute property (computers, furniture, etc.) will result in penalties or replacement costs borne by the student.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  8.    Mobile Phone Use: Use of mobile phones during class is strictly prohibited unless permitted by the instructor for learning purposes.</td></tr>
   <tr>
<td colspan="2" style="padding:0px 40px;"> 9.    System Usage: Students are prohibited from installing unauthorized software or accessing inappropriate websites on institute systems. Violations may lead to expulsion.</td></tr>
   <tr>
<td colspan="2" style="padding:0px 40px;"> 10.    Login Credentials: Students must safeguard their login credentials and data security during practical sessions. The institute is not liable for data loss or misuse.</td></tr>
  <tr>
<td colspan="2" style="padding:0px 40px;">  11.    Certificates: Certificates will only be issued upon successful course completion, clearing all dues, and meeting attendance requirements.</td>
</tr>
</table>


<table width="100%" cellpadding="0" cellspacing="0" border="0" style="color:#000000">

<tr>
<td colspan="2" style="font-weight:bold;text-decoration:underline;text-align:center;text-underline-offset:3px;">DECLARATION BY APPLICANT</td>
</tr>
<tr>
<td colspan="2" style="padding:10px 40px;">I _____________ hereby certify that the particulars furnished above are true to the best of my knowledge and I shall abide by the rules and regulations stipulated above by PCIF™. I further assure that I shall do nothing inside or outside the institutional campus that goes against the discipline and orderly working of the institution.</td>
</tr>
<tr>
<td colspan="2" style="padding:10px 40px;">I have taken admission to PCIF™ (Name of The Center: &nbsp;<b>Pranabananda Computer Institute Foundation)&nbsp; </b>( Address:&nbsp; <b>C/O SECRETARY BHARAT SEVASHRAM SANGHA,
HINDU MILAN MANDIR KALIBARI LUMDING
NAGAON,ASSAM,782447
</b>) with my own concern and wish where the institution has linked me. For this, I myself in future remain liable for all the circumstances arising henceforth with the mentioned PCIF™ above and not with PCIF™, where I am undergoing my tuitions. I am fully aware that PCIF™ is just a vocational/skill development institution.</td>
</tr>

<tr>
<td width="596" style="padding-left:40px">Place: </td>
<td width="390">Applicant's Signature: </td>
</tr>
<tr>
<td style="padding-left:40px">Date: </td>
<td>Name: </td>
</tr>
<tr>
<td colspan="2" style="padding:10px 40px;"><b>Important Instruction</b>: Candidate is advised to follow the notice board and should check institutional website regularly for information update.</td>
</tr>

<tr>
<td colspan="2" style="padding:10px 40px;line-height:25px;"><b>Official Remarks</b> (if any): ________________________________________________________________</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center" style="padding-right:40px;">-------------------------------</td>
</tr>
<tr>
<td style="padding-left:40px">Date: </td>
<td style="padding-right:40px;">Seal/Signature&nbsp;of&nbsp;Authorized&nbsp;Person&nbsp;of&nbsp;PCIF™</td>
</tr>
</table>


<table width="100%" cellpadding="0" cellspacing="0" border="0" style="color:#000000">

<tr height="25">
<td align="center" valign="middle" colspan="2" style="border-bottom:0px solid #999999;"><strong>DECLARATION BY THE CANDIDATE</strong></td>
</tr>
<tr height="30">
<td align="justify" valign="middle" colspan="2"><strong>I hereby declare that all the above statements are true and correct the best of my knowledge and belief. I shall obey all the Rules and Regulations of the  organization.</strong></td>
</tr>
<tr height="30">
<td align="left" valign="middle" colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr height="50">
<td width="7%" align="left" valign="middle"><strong>Date: </strong></td>
<td width="31%" align="left" valign="middle"><?=$fetch['date']?></td>
<td width="1%" align="left" valign="middle">&nbsp;</td>
<td width="49%" align="center" valign="middle"><strong>Signature of the Applicant : </strong></td>
<td width="12%" align="left" valign="middle">&nbsp;</td>
</tr>
</table>
<div>&nbsp;</div></td>
</tr>
</table>

</div>
</div>
</div>
<?php }?>
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
</div>
<div>&nbsp;</div>
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