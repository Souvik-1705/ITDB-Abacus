
<nav id='cssmenu' style="padding:0px 10px;">
<div id="head-mobile" align="center">MENU</div>
<div class="button"></div>

<ul>
<li <?php if($pageid==1){?> class="active" style="color:#000000;"<?php }?>><a href='home.php'>HOME</a></li>

<?php if($_SESSION['sid']){ ?>
<li <?php if($pageid==2){?> class="active"<?php }?>><a href='#'>COURSE</a>
<ul>
<li><a href='course.php?case=add'>NEW COURSE </a></li>
<li><a href='course.php'>VIEW COURSE </a></li>
</ul>
</li>
<li <?php if($pageid==3){?> class="active"<?php }?>><a href='#'>FRANCHISE</a>
<ul>
<li><a href='franchise.php?case=add'>NEW FRANCHISE </a></li>
<li><a href='franchise.php'>VIEW FRANCHISE </a></li>
</ul>
</li>
<?php } ?>
<li <?php if($pageid==4){?> class="active"<?php }?>><a href='#'>STUDENT</a>
<ul>
<li><a href='student.php?case=add'>NEW ADMISSION </a></li>
<li><a href='student.php'>RUNNING STUDENT </a></li>
<li><a href='completed-student.php'>COMPLETED STUDENT </a></li>
</ul>
</li>

<li <?php if($pageid==7){?> class="active"<?php }?>><a href='#'>FEES COLLECTION</a>
<ul>
<li><a href='fees-collection.php?case=add'>NEW COLLECTION </a></li>
<li><a href='fees-collection.php'>VIEW STATEMENT </a></li>
</ul>
</li>

<?php if($_SESSION['sid']){ ?>
<li <?php if($pageid==5){?> class="active"<?php }?>><a href='#'>EXPENSE HEAD</a>
<ul>
<li><a href='expense-head.php?case=add'>NEW EXPENSE HEAD </a></li>
<li><a href='expense-head.php'>VIEW EXPENSE HEAD </a></li>
</ul>
</li>
<?php } ?>
<li <?php if($pageid==6){?> class="active"<?php }?>><a href='#'>EXPENSE</a>
<ul>
<li><a href='expense.php?case=add'>NEW EXPENSE </a></li>
<li><a href='expense.php'>VIEW EXPENSE </a></li>
</ul>
</li>

<?php if($_SESSION['sid']){ ?>
<li <?php if($pageid==8){?> class="active"<?php }?>><a href='#'>STAFF</a>
<ul>
<li><a href='staff.php?case=add'>NEW STAFF </a></li>
<li><a href='staff.php'>VIEW STAFF </a></li>
</ul>
</li>

<li <?php if($pageid==9){?> class="active"<?php }?>><a href='#'>STAFF SALARY</a>
<ul>
<li><a href='staff-salary.php?case=add'>NEW STAFF SALARY </a></li>
<li><a href='staff-salary.php'>VIEW STAFF SALARY </a></li>
</ul>
</li>
<?php } ?>
<li <?php if($pageid==10){?> class="active"<?php }?>><a href='balance-sheet.php'>BALANCE SHEET</a></li>

<!--<li <?php if($pageid==11){?> class="active"<?php }?>><a href='#'>REPORT</a>
<ul>
<li><a href='#'>DAILY COLLECTION </a></li>
<li><a href='#'>MONTHLY COLLECTION </a></li>
</ul>
</li>-->

</ul>

</nav>
<div class="menubottom"></div>
<div>&nbsp;</div>
