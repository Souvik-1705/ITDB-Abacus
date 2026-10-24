<?php include('header.php');
$left=6;
?>

<style>
.button
{
background:#FF6600;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
padding:3px 10px;
border-radius:5px;
}
.button:hover
{
background:#009900;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
}
.headback{
background-color:#DFDFDF;
}

.tooltip1 {
position: relative;
display: inline-block;
/* border-bottom: 1px dotted black;*/
}

.tooltip1 .tooltiptext1 {
visibility: hidden;
width: 400px;
background-color: #000000;
color: #FFFFFF;
text-align: center;
border-radius: 6px;
padding: 5px 0;
position: absolute;
z-index: 1;

left: 50%;
top: 120%;
margin-left: -200px;
opacity: 0;
transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
content: "";
position: absolute;
top: 100%;
left: 50%;
/* margin-left: -5px;
border-width: 5px;
border-style: solid;
border-color: #FF0000 transparent transparent transparent;*/
}

.tooltip1:hover .tooltiptext1 {
visibility: visible;
opacity: 1;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title">Grid View</h2>
</div>

</div>
<div class="content-body"><!-- Description -->
<section id="description" class="card">
<div class="card-header">
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="portlet-body" style="overflow:auto;">
<?php if($_REQUEST['placement']){?><h3 align="center" style="color:#24847A;font-size:20px;line-height:20px;">User ID: <?=$_REQUEST['placement']?>&nbsp;&nbsp;&nbsp;Name: <?=getMemberUserid($conn,$_REQUEST['placement'],'name')?></h3><?php }?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 1</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
if($_REQUEST['placement'])
{
$sql="SELECT * FROM `helping_member` WHERE `sponsor`='".$_REQUEST['placement']."' AND `status`='A'";
}else{
$sql="SELECT * FROM `helping_member` WHERE `sponsor`='".getMember($conn,$_SESSION['mid'],'userid')."' AND `status`='A'";
}
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch['userid']?>"><?=$fetch['userid']?></a></td>
<td align="center"><?=$fetch['name']?></td>
<td align="center"><?=$fetch['phone']?></td>
<td align="center"><?=$fetch['date']?></td>
<td align="center"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch['placement']){?><?=$fetch['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}?>
</tbody>
</table>

<?php
$count=count($arr);
if($count>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 2</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr1=array();
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr[$k]."' AND `status`='A'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$i]=$fetch1['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch1['userid']?>"><?=$fetch1['userid']?></a></td>
<td align="center"><?=$fetch1['name']?></td>
<td align="center"><?=$fetch1['phone']?></td>
<td align="center"><?=$fetch1['date']?></td>
<td align="center"><?php if($fetch1['sponsor']){?><?=$fetch1['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch1['placement']){?><?=$fetch1['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch1['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch1['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count1=count($arr1);
if($count1>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 3</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr2=array();
for($k=0;$k<$count1;$k++)
{
$sql2="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr1[$k]."' AND `status`='A'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$i]=$fetch2['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch2['userid']?>"><?=$fetch2['userid']?></a></td>
<td align="center"><?=$fetch2['name']?></td>
<td align="center"><?=$fetch2['phone']?></td>
<td align="center"><?=$fetch2['date']?></td>
<td align="center"><?php if($fetch2['sponsor']){?><?=$fetch2['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch2['placement']){?><?=$fetch2['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch2['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch2['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count2=count($arr2);
if($count2>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 4</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr3=array();
for($k=0;$k<$count2;$k++)
{
$sql3="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr2[$k]."' AND `status`='A'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$i]=$fetch3['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch3['userid']?>"><?=$fetch3['userid']?></a></td>
<td align="center"><?=$fetch3['name']?></td>
<td align="center"><?=$fetch3['phone']?></td>
<td align="center"><?=$fetch3['date']?></td>
<td align="center"><?php if($fetch3['sponsor']){?><?=$fetch3['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch3['placement']){?><?=$fetch3['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch3['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch3['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count3=count($arr3);
if($count3>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 5</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr4=array();
for($k=0;$k<$count3;$k++)
{
$sql4="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr3[$k]."' AND `status`='A'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$i]=$fetch4['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch4['userid']?>"><?=$fetch4['userid']?></a></td>
<td align="center"><?=$fetch4['name']?></td>
<td align="center"><?=$fetch4['phone']?></td>
<td align="center"><?=$fetch4['date']?></td>
<td align="center"><?php if($fetch4['sponsor']){?><?=$fetch4['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch4['placement']){?><?=$fetch4['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch4['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch4['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count4=count($arr4);
if($count4>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 6</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr5=array();
for($k=0;$k<$count4;$k++)
{
$sql5="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr4[$k]."' AND `status`='A'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>0)
{
while($fetch5=fetcharray($res5))
{
$arr5[$i]=$fetch5['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch5['userid']?>"><?=$fetch5['userid']?></a></td>
<td align="center"><?=$fetch5['name']?></td>
<td align="center"><?=$fetch5['phone']?></td>
<td align="center"><?=$fetch5['date']?></td>
<td align="center"><?php if($fetch5['sponsor']){?><?=$fetch5['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch5['placement']){?><?=$fetch5['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch5['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch5['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }?>
<?php
$count5=count($arr5);
if($count5>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 7</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr6=array();
for($k=0;$k<$count5;$k++)
{
$sql6="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr5[$k]."' AND `status`='A'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>0)
{
while($fetch6=fetcharray($res6))
{
$arr6[$i]=$fetch6['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch6['userid']?>"><?=$fetch6['userid']?></a></td>
<td align="center"><?=$fetch6['name']?></td>
<td align="center"><?=$fetch6['phone']?></td>
<td align="center"><?=$fetch6['date']?></td>
<td align="center"><?php if($fetch6['sponsor']){?><?=$fetch6['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch6['placement']){?><?=$fetch6['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch6['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch6['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }?>
<?php
$count6=count($arr6);
if($count6>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 8</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr7=array();
for($k=0;$k<$count6;$k++)
{
$sql7="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr6[$k]."' AND `status`='A'";
$res7=query($conn,$sql7);
$num7=numrows($res7);
if($num7>0)
{
while($fetch7=fetcharray($res7))
{
$arr7[$i]=$fetch7['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch7['userid']?>"><?=$fetch7['userid']?></a></td>
<td align="center"><?=$fetch7['name']?></td>
<td align="center"><?=$fetch7['phone']?></td>
<td align="center"><?=$fetch7['date']?></td>
<td align="center"><?php if($fetch7['sponsor']){?><?=$fetch7['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch7['placement']){?><?=$fetch7['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch7['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch7['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count7=count($arr7);
if($count7>0)
{?>
<h2 style="color:#24847A;font-size:20px;">&nbsp;Genealogy - Level 9</h2>
<table class="table">
<thead>
<tr class="headback">
<td align="center"><strong>User ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Phone</strong></td>
<td align="center"><strong>Join</strong></td>
<td align="center"><strong>Sponsor</strong></td>
<td align="center"><strong>Placement</strong></td>
<td align="center"><strong>Status</strong></td>
<td align="center"><strong>Paystatus</strong></td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr8=array();
for($k=0;$k<$count7;$k++)
{
$sql8="SELECT * FROM `helping_member` WHERE `sponsor`='".$arr7[$k]."' AND `status`='A'";
$res8=query($conn,$sql8);
$num8=numrows($res8);
if($num8>0)
{
while($fetch8=fetcharray($res8))
{
$arr8[$i]=$fetch8['userid'];
?>
<tr>
<td align="center"><a href="grid-view.php?placement=<?=$fetch8['userid']?>"><?=$fetch8['userid']?></a></td>
<td align="center"><?=$fetch8['name']?></td>
<td align="center"><?=$fetch8['phone']?></td>
<td align="center"><?=$fetch8['date']?></td>
<td align="center"><?php if($fetch8['sponsor']){?><?=$fetch8['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch8['placement']){?><?=$fetch8['placement']?><?php }else{?>----<?php }?></td>
<td align="center"><?php if($fetch8['status']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="center"><?php if($fetch8['paystatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count8=count($arr8);
if($count8>0)
{?>
<?php }?>

</div>
</section>

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
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
