<style>
.franchise-info-table
{
    width:100%;
    max-width:100%;
    border-collapse:collapse;
}

.franchise-info-table td
{
    vertical-align:middle;
    box-sizing:border-box;
}

.franchise-info-table h4
{
    margin:0;
    padding-left:10px;
    color:#0033CC;
    font-size:15px;
    font-weight:bold;
    line-height:22px;
}

.time-info
{
    color:#FF0000 !important;
    font-weight:bold;
    font-size:20px;
    white-space:nowrap;
}

#timeTable
{
    color:#FF0000 !important;
    font-weight:bold;
    font-size:20px;
    white-space:nowrap;
}

.h2back
{
    width:100%;
    box-sizing:border-box;
    margin:0;
}


/* Mobile */
@media(max-width:767px)
{
    .franchise-info-table,
    .franchise-info-table tbody,
    .franchise-info-table tr,
    .franchise-info-table td
    {
        display:block;
        width:100% !important;
        max-width:100% !important;
        box-sizing:border-box;
    }

    .franchise-info-table tr
    {
        height:auto !important;
        margin-bottom:5px;
    }

    .franchise-info-table td
    {
        padding:5px 0 !important;
        text-align:left !important;
    }

    .franchise-info-table h4
    {
        font-size:14px !important;
        padding-left:5px !important;
        padding-right:5px !important;
        line-height:22px;
        white-space:normal !important;
        word-break:break-word;
        overflow-wrap:break-word;
    }

    #timeTable
    {
        font-size:18px !important;
        text-align:center !important;
        white-space:nowrap;
        padding:5px 0;
    }

    .time-cell
    {
        text-align:center !important;
    }

    .h2back
    {
        font-size:20px !important;
        padding:10px 8px !important;
        line-height:28px;
        word-break:break-word;
    }
}


/* Small Mobile */
@media(max-width:480px)
{
    .franchise-info-table h4
    {
        font-size:13px !important;
        line-height:21px;
    }

    #timeTable
    {
        font-size:17px !important;
    }

    .h2back
    {
        font-size:18px !important;
        padding:9px 6px !important;
        line-height:25px;
    }
}
</style>

<h3 align="center" style="border:1px #17365d dotted; background-color:#17365d; color:#ffffff;" class="h2back">
Welcome To <?=ucwords(stripslashes(getFranchiseName($conn,$_SESSION['fid'],'franchise')))?>
</h3>


<table class="franchise-info-table" width="100%" align="center" border="0" cellpadding="0" cellspacing="0">

<tr height="50">

<td width="15%" align="left">
<h4>
Centre ID : <?=getFranchiseName($conn,$_SESSION['fid'],'code')?>
</h4>
</td>

<td width="20%" align="left">
<h4 style="white-space:nowrap;">
Main Balance : 
<?php if(getAvailableBalance($conn,$_SESSION['fid'])){ ?>
<?=number_format(getAvailableBalance($conn,$_SESSION['fid']),2)?>
<?php }else{ ?>
0.00
<?php } ?>
</h4>
</td>

</tr>


<tr height="50">

<td width="22%" align="left">
<h4>
Centre Director: <?=ucwords(getFranchiseName($conn,$_SESSION['fid'],'pname'))?>
</h4>
</td>

<td width="16%" align="right" valign="top" class="time-cell">
<div id="timeTable"></div>
</td>

</tr>

</table>