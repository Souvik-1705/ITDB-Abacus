<?php include('header.php');
$left=14;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

/* =========================================
   VIEW FRANCHISE - MODERN DESIGN
   ========================================= */

.class2
{
    background:#f5f9ff !important;
    height:40px;
}


/* Main table */
.custview
{
    width:90% !important;
    margin:20px auto !important;
	font-weight: 600 !important;
    border-collapse:separate !important;
    border-spacing:0 !important;
    background:#ffffff !important;
    border:1px solid #d9e7f5 !important;
    border-radius:14px !important;
    overflow:hidden !important;
    box-shadow:0 5px 22px rgba(23,54,93,0.08) !important;
    font-family:Arial, Helvetica, sans-serif !important;
}


/* All cells */
.custview td
{
    padding:12px 10px !important;
    font-size:14px !important;
    color: #17365d !important;
    border-bottom:1px solid #e7eef6 !important;
    vertical-align:middle !important;
    line-height:1.5 !important;
}


/* Label cells */
.custview tr.class1 td:first-child,
.custview tr.class2 td:first-child
{
    font-weight:600 !important;
    color:#17365d !important;
}


/* Value cells */
.custview tr td:nth-child(2),
.custview tr td:nth-child(4)
{
    color:#4d5965 !important;
    font-weight:500 !important;
}


/* =========================================
   SECTION HEADINGS
   ========================================= */

.custview tr:first-child
{
    background:linear-gradient(135deg,#023278,#0576de) !important;
}

.custview tr:first-child th
{
    padding:15px !important;
    text-align:left !important;
    font-size:19px !important;
    font-weight:700 !important;
    color:#ffffff !important;
    border:0 !important;
}


/* Institute Information */
.custview tr[style*="FED3A9"] td
{
    padding:13px 15px !important;
    font-size:16px !important;
    font-weight:700 !important;
    color:#023278 !important;
    background:linear-gradient(135deg,#e4f1ff,#f5faff) !important;
    border-top:1px solid #d5e7f8 !important;
    border-bottom:1px solid #d5e7f8 !important;
}


/* Centre Head heading */
.custview tr td[colspan="4"]
{
    padding:13px 15px !important;
    font-size:16px !important;
    font-weight:700 !important;
    color:#023278 !important;
    background:linear-gradient(135deg,#e4f1ff,#f5faff) !important;
    border-top:1px solid #d5e7f8 !important;
    border-bottom:1px solid #d5e7f8 !important;
}


/* =========================================
   ALTERNATE ROWS
   ========================================= */

.custview tr.class1
{
    background:#ffffff !important;
}

.custview tr.class2
{
    background:#f7fbff !important;
}


/* Hover effect */
.custview tr.class1:hover,
.custview tr.class2:hover
{
    background:linear-gradient(90deg,#eef7ff,#ffffff) !important;
    transition:all .2s ease;
}


/* =========================================
   STATUS
   ========================================= */

.custview span
{
    display:inline-block !important;
    padding:4px 12px !important;
    border-radius:20px !important;
    font-size:12px !important;
    line-height:1.4 !important;
}


/* Approved */
.custview span[style*="009900"]
{
    color:#198754 !important;
    background:#e8f7ef !important;
}


/* Pending */
.custview span[style*="CC0000"]
{
    color:#dc3545 !important;
    background:#fff0f1 !important;
}


/* =========================================
   MOBILE RESPONSIVE
   ========================================= */

@media(max-width:767px)
{
    .custview
    {
        width:100% !important;
        margin:10px 0 !important;
        border-radius:10px !important;
        box-shadow:0 3px 14px rgba(23,54,93,0.07) !important;
    }

    .custview td
    {
        padding:9px 6px !important;
        font-size:12px !important;
        line-height:1.4 !important;
    }

    .custview tr:first-child th
    {
        padding:13px 10px !important;
        font-size:16px !important;
    }

    .custview tr[style*="FED3A9"] td,
    .custview tr td[colspan="4"]
    {
        padding:11px 10px !important;
        font-size:14px !important;
    }

    /* 4-column layout */
    .custview tr td:nth-child(1)
    {
        width:22% !important;
    }

    .custview tr td:nth-child(2)
    {
        width:28% !important;
    }

    .custview tr td:nth-child(3)
    {
        width:20% !important;
    }

    .custview tr td:nth-child(4)
    {
        width:30% !important;
    }

    /* Long text */
    .custview td
    {
        word-break:break-word !important;
        overflow-wrap:anywhere !important;
    }

    /* Status mobile */
    .custview span
    {
        padding:3px 9px !important;
        font-size:11px !important;
    }
}

</style>


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
<h4 class="card-title">View Franchise</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<p>&nbsp;</p>
<?php
$sql="SELECT * FROM `ab_franchise` WHERE `id`='".mysqli_real_escape_string($conn,trim($_REQUEST['id']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table align="center" width="90%" class="custview">
<tr style="background:#FED3A9;">
<th style="font-size:21px; color:#FF6633;line-height:30px;">Institute Location</th>
<td style="padding-left:10px;">&nbsp;</td>
<td width="21%" style="padding-left:10px;">&nbsp;</td>
<td width="33%" style="padding-left:10px;">&nbsp;</td>
</tr>
<tr height="40%" class="class2">
<td width="21%" style="padding-left:10px;">State</td>
<td width="25%" style="padding-left:10px;"><?=getStateName($conn,output($fetch['state']),'state')?></td>
<td width="21%" style="padding-left:10px;">District</td>
<td width="33%" style="padding-left:10px;"><?=getDistrict($conn,output($fetch['district']),'district')?></td>
</tr>

<tr height="40%" class="class1">
<td width="21%" style="padding-left:10px;">City</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['city'])?></td>
<td width="21%" style="padding-left:10px;"></td>
<td width="33%" style="padding-left:10px;"></td>
</tr>

<tr height="40%" style="background:#FED3A9;">
<td style="font-size:16px; color:#FF6633;line-height:30px;">Institute Information</td>
<td style="padding-left:10px;">&nbsp;</td>
<td width="21%" style="padding-left:10px;">&nbsp;</td>
<td width="33%" style="padding-left:10px;">&nbsp;</td>
</tr>

<tr height="40%" class="class1">
<td width="21%" style="padding-left:10px;">Name of the Institute</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['franchise'])?></td>
<td width="21%" style="padding-left:10px;">Address of the Institute</td>
<td width="33%" style="padding-left:10px;"><?=output($fetch['insaddress'])?></td>
</tr>

<tr height="40%" class="class2">
<td width="21%" style="padding-left:10px;">Pincode</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['inspin'])?></td>
<td width="21%" style="padding-left:10px;">Institute Contact No</td>
<td width="33%" style="padding-left:10px;"><?=output($fetch['insphone1'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="21%" style="padding-left:10px;">Email Address</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['insemail'])?></td>
<td width="21%" style="padding-left:10px;">&nbsp;</td>
<td width="33%" style="padding-left:10px;">&nbsp;</td>
</tr>


<tr height="40%" style="background:#FED3A9;">
<td style="padding:10px; padding-bottom:0; padding-top:0; font-size:16px; color:#FF6633;" colspan="4">Information About Centre Head</td>
</tr>

<tr height="40%" class="class1">
<td width="21%" style="padding-left:10px;">Name of the Centre Head</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['pname'])?></td>
<td width="21%" style="padding-left:10px;">Designation</td>
<td width="33%" style="padding-left:10px;"><?=output($fetch['position'])?></td>
</tr>

<tr height="40%" class="class2">
<td width="21%" style="padding-left:10px;">Address of the Centre Head</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['paddress'])?></td>
<td width="21%" style="padding-left:10px;">Mobile</td>
<td width="33%" style="padding-left:10px;"><?=output($fetch['pphone'])?></td>
</tr>

<tr height="40%" class="class1">
<td width="21%" style="padding-left:10px;">Email Address</td>
<td width="25%" style="padding-left:10px;"><?=output($fetch['pemail'])?></td>
<td width="21%" style="padding-left:10px;">Status</td>
<td width="33%" style="padding-left:10px;"><?php if($fetch['status']=='A'){?><span style="font-weight:bold; color:#009900;">Approved</span><?php }else{?><span style="font-weight:bold; color:#CC0000;">Pending</span><?php } ?></td>
</tr>



</table>
<?php }?>
<p>&nbsp;</p>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>