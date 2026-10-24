<?php
session_start(); 
include('includes/function.php');
if($_SESSION['fid']=='' && $_SESSION['sid']=='')
{
redirect('index.php');
}
$pageid=1;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator </title>
<link href="css/style.css" rel="stylesheet" />
<link href="css/menu-style.css" rel="stylesheet">
<script src="js/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>
</head>
<body>
<?php include('header.php');?>
<div class="specer"></div>
<?php include('menu.php');?>
<div id="midcontent">
<p style="padding-left:10px;">Home : Home</p>
<div class="boxDiv" style="overflow:auto;" align="center">
<div>&nbsp;</div>
<?php if($_SESSION['sid']){ ?>
<table width="95%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center"><a href="change-password.php"><div id="iconDiv"><br /><br /><img src="images/icon-exam-password.png" border="0" height="50" width="40" /><br /><h3>Change Password</h3></div></a></td>
<td align="center"><a href="course.php"><div id="iconDiv"><br /><br /><img src="images/course.png" border="0" height="50" width="40" /><br /><h3>View Course</h3></div></a></td>
<td align="center"><a href="franchise.php"><div id="iconDiv"><br /><br /><img src="images/franchise.png" border="0" height="50" width="40" /><br /><h3>View Franchise</h3></div></a></td>
<td align="center"><a href="student.php?case=add"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Student Admission</h3></div></a></td>
<td align="center"><a href="student.php"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Running Student</h3></div></a></td>
<td align="center"><a href="completed-student.php"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Completed Student</h3></div></a></td>
</tr>
<tr height="20"><td colspan="6">&nbsp;</td></tr>
<tr>
<td align="center"><a href="fees-collection.php?case=add"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>New Fees Collection</h3></div></a></td>
<td align="center"><a href="fees-collection.php"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>View Statement</h3></div></a></td>
<td align="center"><a href="expense-head.php"><div id="iconDiv"><br /><br /><img src="images/icon-franchise-request.png" border="0" height="50" width="40" /><br /><h3>Expense Head</h3></div></a></td>
<td align="center"><a href="expense.php"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>Income/Expense</h3></div></a></td>
<td align="center"><a href="staff.php"><div id="iconDiv"><br /><br /><img src="images/icon-online-exam.png" border="0" height="50" width="40" /><br /><h3>View Staff</h3></div></a></td>
<td align="center"><a href="staff-salary.php"><div id="iconDiv"><br /><br /><img src="images/icon-online-exam.png" border="0" height="50" width="40" /><br /><h3>View Staff Salary</h3></div></a></td>
</tr>
<tr height="20"><td colspan="6">&nbsp;</td></tr>
<tr>
<td align="center"><a href="balance-sheet.php"><div id="iconDiv"><br /><br /><img src="images/icon-head-content.png" border="0" height="50" width="40" /><br /><h3>Balance Sheet</h3></div></a></td>
</tr>
</table>
<?php }else{ ?>
<table width="95%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center"><a href="change-password.php"><div id="iconDiv"><br /><br /><img src="images/icon-exam-password.png" border="0" height="50" width="40" /><br /><h3>Change Password</h3></div></a></td>
<td align="center"><a href="student.php?case=add"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Student Admission</h3></div></a></td>
<td align="center"><a href="student.php"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Running Student</h3></div></a></td>
<td align="center"><a href="completed-student.php"><div id="iconDiv"><br /><br /><img src="images/student.png" border="0" height="50" width="40" /><br /><h3>Completed Student</h3></div></a></td>
<td align="center"><a href="fees-collection.php?case=add"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>New Fees Collection</h3></div></a></td>
<td align="center"><a href="fees-collection.php"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>View Statement</h3></div></a></td>
</tr>
<tr height="20"><td colspan="6">&nbsp;</td></tr>
<tr>
<td align="center"><a href="expense.php"><div id="iconDiv"><br /><br /><img src="images/fees.png" border="0" height="50" width="40" /><br /><h3>Income/Expense</h3></div></a></td>
<td align="center"><a href="balance-sheet.php"><div id="iconDiv"><br /><br /><img src="images/icon-head-content.png" border="0" height="50" width="40" /><br /><h3>Balance Sheet</h3></div></a></td>
</tr>
</table>
<?php } ?>
<p>&nbsp;</p>
</div>
</div>

<?php include('footer.php');?>
</body>
</html> 