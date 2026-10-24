<div style=" background-color:#996633">
<h3 align="center" style="border:1px pink dotted;background-color:#b310b3"class="h2back">Welcome To <?=ucwords(stripslashes(getFranchiseName($conn,$_SESSION['fid'],'franchise')))?></h3>
</div>
<div style="height:10px;"></div>
<p style="margin:0; color:#FF0000;">* SRB : Student Registration Balance &nbsp;&nbsp; <!--* MFB : Master Franchise Balance--></p>
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
<tr height="50">
<td width="15%" colspan="1" align="left"><h4 style="color:#009900;font-size:15px;padding-left:10px ;font-weight:bold;">Centre ID : <?=getFranchiseName($conn,$_SESSION['fid'],'code')?></h4></td>
<?php /*?><td width="20%" colspan="1" align="left"><h4 style="color:#0033CC;padding-left:10px; font-size:15px;font-weight:bold;">Main Balance : <?php if(getAvailableBalance($conn,$_SESSION['fid'])){ ?><?=number_format(getAvailableBalance($conn,$_SESSION['fid']),2)?><?php }else{ ?>0.00<?php } ?></h4></td><?php */?>
<?php /*?><td width="15%" colspan="1" align="left"><h3 style="color:#FF0000;padding-left:10px; font-size:15px;font-weight:bold;">SRB Balance : <?php if(getSRBAvailableBalance($conn,$_SESSION['fid'])){ ?><?=number_format(getSRBAvailableBalance($conn,$_SESSION['fid']),2)?><?php }else{ ?>0.00<?php } ?></h3></td><?php */?>
<?php /*?><td width="20%" colspan="1" align="left"><h3 style="color:#0033CC;padding-left:10px; font-size:15px;font-weight:bold;">Project Balance : <?php if(getHOAvailableBalance($conn,$_SESSION['fid'])){ ?><?=number_format(getHOAvailableBalance($conn,$_SESSION['fid']),2)?><?php }else{ ?>0.00<?php } ?></h3></td><?php */?>
</tr>

<tr>
<?php /*?><td width="25%" colspan="2"  align="left"><h3 style="color:#0033CC;padding-left:10px; font-size:15px;font-weight:bold;">Kit Balance : <?php if(getAvailableKitBalance($conn,$_SESSION['fid'])){ ?><?=number_format(getAvailableKitBalance($conn,$_SESSION['fid']),2)?><?php }else{ ?>0.00<?php } ?></h3></td><?php */?>

<?php /*?><td width="50%"  colspan="2" align="left"><h3 style="color:#0033CC;padding-left:10px; font-size:15px;font-weight:bold;">Dispatch Charge:
<?=number_format(getAvailableCourierBalance($conn,$_SESSION['fid']),2)?></h3></td><?php */?>
</tr>

<?php /*?>
<tr>
<td width="50%" colspan="4"  align="left"><h3 style="color:#0033CC;padding-left:10px; font-size:15px;font-weight:bold;">Master Franchise Balance: <?php if(getRemainingMasterFranBonus($conn,getFranchiseName($conn,$_SESSION['fid'],'code'))>0){?>
<?=number_format(getRemainingMasterFranBonus($conn,getFranchiseName($conn,$_SESSION['fid'],'code')),2)?><?php } else{?>0.00<?php }?></h3></td>
</tr><?php */?>

<tr height="50">
<td width="22%" align="left" colspan="3"><h4 style="color:#0033CC;padding-left:10px;">Centre Director: <?=ucwords(getFranchiseName($conn,$_SESSION['fid'],'pname'))?></h4></td>
<td width="16%" align="right" valign="top" style="color:#FF0000;font-weight:bold;font-size:20px;"><div id="timeTable"></div></td></tr>
</table>
