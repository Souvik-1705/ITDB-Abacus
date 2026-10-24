<?php if(isset($_SESSION['fid'])){$fid12=$_SESSION['fid'];}else{$fid12=$_SESSION['sid'];}

 if(getUser($conn,$fid12,'type')=='F'){?>




<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" >
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<?php if(getModulePermission($conn,$_SESSION['fid'],'Dashboard')>0) {?><li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Change Password')>0) {?><li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Logout')>0) {?><li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php" data-i18n="nav.dash.main" class="menu-item" onclick="return confirm('Are you sure want to logout?');"><i class="icon-power3"></i>Logout</a></li><?php } ?>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Course</span></a>
<ul class="menu-content">

<?php if(getModulePermission($conn,$_SESSION['fid'],'New Session')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="session.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Session</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Session')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-session.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Session</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'New Category')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="category.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Category</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Category')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-category.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Category</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'New Duration')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="duration.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Duration</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Duration')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-duration.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Duration</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'New Course')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="course.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Course</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Course')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-course.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Course</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'New Course Fees')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="course-fees.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Course Fees</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Course Fees')>0) {?><li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-course-fees.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Course Fees</a></li><?php } ?>

</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-head"></i><span data-i18n="nav.dash.main" class="menu-title">Franchise</span></a>
<ul class="menu-content">

<?php if(getModulePermission($conn,$_SESSION['fid'],'Student Admission')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-add.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-person-add"></i>Student Admission</a>
</li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'Running Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Running Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Completed Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="completed-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Completed Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Dropout Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="drop-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Dropout Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Course Wise Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="course-wise-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Course Wise Student</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'Promote Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="promote-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Promote Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Inactive Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="inactive-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Inactive Student</a></li><?php } ?>


</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-head"></i><span data-i18n="nav.dash.main" class="menu-title">Student</span></a>
<ul class="menu-content">

<?php if(getModulePermission($conn,$_SESSION['fid'],'Student Admission')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-add.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-person-add"></i>Student Admission</a>
</li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'Running Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Running Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Completed Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="completed-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Completed Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Dropout Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="drop-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Dropout Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Course Wise Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="course-wise-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Course Wise Student</a></li><?php } ?>


<?php if(getModulePermission($conn,$_SESSION['fid'],'Promote Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="promote-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Promote Student</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Inactive Student')>0) {?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="inactive-student.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Inactive Student</a></li><?php } ?>


</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Student Discount</span></a>
<ul class="menu-content">

<?php if(getModulePermission($conn,$_SESSION['fid'],'New Discount')>0) {?><li class="<?php if($left=='14'){?> active<?php }?>"><a href="discount.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Discount</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'View Discount')>0) {?><li class="<?php if($left=='14'){?> active<?php }?>"><a href="view-discount.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Discount</a></li><?php } ?>

</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Report</span></a>
<ul class="menu-content">

<?php if(getModulePermission($conn,$_SESSION['fid'],'Sales Report')>0) {?><li class="<?php if($left=='11'){?> active<?php }?>"><a href="report-fees.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Sales Report</a></li><?php } ?>

<?php if(getModulePermission($conn,$_SESSION['fid'],'Expenses')>0) {?><li class="<?php if($left=='11'){?> active<?php }?>"><a href="report-expenses.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Expenses</a></li><?php } ?>

</ul>
</li>



<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout?');"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a>


</ul>
</div>
 
</div>

<?php }else{?>
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" >
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a>
</li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php" data-i18n="nav.dash.main" class="menu-item" onclick="return confirm('Are you sure want to logout?');"><i class="icon-power3"></i>Logout</a>
</li>

</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="state.php?case=add" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>New State</a>
</li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="state.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View State</a>
</li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="district.php?case=add" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>New District</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="district.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View District</a>
</li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="bank-details.php?case=add" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>New Bank Details </a>
</li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View Bank Details</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="signatures.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View Signatures </a></li>
</ul></li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Course</span></a>
<ul class="menu-content">

<li class="<?php if($left=='5'){?> active<?php }?>"><a href="session.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Session</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-session.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Session</a>
</li>


<li class="<?php if($left=='5'){?> active<?php }?>"><a href="category.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Category</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-category.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Category</a>
</li>


<li class="<?php if($left=='5'){?> active<?php }?>"><a href="duration.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Duration</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-duration.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Duration</a>
</li>


<li class="<?php if($left=='5'){?> active<?php }?>"><a href="course.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Course</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-course.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Course</a>
</li>

<li class="<?php if($left=='5'){?> active<?php }?>"><a href="course-description.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Course Description</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-course-description.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Course Description</a>
</li>


<li class="<?php if($left=='5'){?> active<?php }?>"><a href="course-fees.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Course Fees</a>
</li>
<li class="<?php if($left=='5'){?> active<?php }?>"><a href="view-course-fees.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Course Fees</a>
</li>


</ul>
</li>





<li class=" nav-item"><a href="#"><i class="icon-news"></i><span data-i18n="nav.dash.main" class="menu-title">Franchise</span></a>
<ul class="menu-content">

<li class="<?php if($left=='14'){?> active<?php }?>"><a href="franchise-application.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Application</a>
</li>
<li class="<?php if($left=='14'){?> active<?php }?>"><a href="fran.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Franchise</a>
</li>
<li class="<?php if($left=='14'){?> active<?php }?>"><a href="fran.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Franchise</a>
</li>

</ul></li>



<li class=" nav-item"><a href="#"><i class="icon-head"></i><span data-i18n="nav.dash.main" class="menu-title">Student</span></a>
<ul class="menu-content">

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-application.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-person-add"></i>Student Application</a>
</li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-accepted.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Accepted Student</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-registered.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Registered Student</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="student-certified.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-android-people"></i>Certified Student</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="nav.dash.main" class="menu-title">Payment</span></a>
<ul class="menu-content">
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment-request.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Payment Request</a>
</li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment-deposite.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a>
</li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment-deposite.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a>
</li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment-deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a>
</li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment-deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a>
</li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="nav.dash.main" class="menu-title">Account Information</span></a>
<ul class="menu-content">
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="acc-info.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a>
</li>
</ul>
</li>



<li class=" nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="nav.dash.main" class="menu-title">Gallery</span></a>
<ul class="menu-content">
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="imagecat.php?case=add" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>New Image Category</a></li>

<li class="<?php if($left=='12'){?> active<?php }?>"><a href="imagecat.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View Image Category</a></li>

<li class="<?php if($left=='12'){?> active<?php }?>"><a href="galleryimg.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Gallery Img</a>
</li>
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="galleryimg.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Gallery Img</a>
</li>
</ul>
</li>


<!-------------Other------------->
<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Other </span></a>
<ul class="menu-content">

<li class="<?php if($left=='16'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Contact</a></li>

<li class="<?php if($left=='16'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Feedback</a></li>

<?php /*?><li class="<?php if($left=='16'){?> active<?php }?>"><a href="popup.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Popup</a></li>

<ul class="menu-content">
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="banner.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>View Banner</a></li>
</ul><?php */?>
</ul>
</li>

<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout?');"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a>


</ul>
</div>
 
</div>

<?php }?>
<style>
/* =========================================================
   KIDS PORTAL ADMIN THEME
   ========================================================= */

:root {
    --kids-blue: #4dabf7;
    --kids-blue-dark: #1976d2;
    --kids-yellow: #ffd43b;
    --kids-orange: #ff922b;
    --kids-green: #69db7c;
    --kids-green-dark: #2f9e44;
    --kids-pink: #f783ac;
    --kids-purple: #9775fa;
    --kids-coral: #ff8787;
    --kids-bg: #f4f9ff;
    --kids-white: #ffffff;
    --kids-text: #344054;
}

/* ---------------------------------------------------------
   BODY / MAIN BACKGROUND
   --------------------------------------------------------- */

body {
    background:
        radial-gradient(circle at 10% 10%, rgba(77,171,247,.10) 0, transparent 25%),
        radial-gradient(circle at 90% 20%, rgba(255,212,59,.12) 0, transparent 25%),
        radial-gradient(circle at 80% 90%, rgba(151,117,250,.10) 0, transparent 25%),
        #f4f9ff !important;

    color: var(--kids-text);
}

/* Main content */

.app-content,
.content-wrapper,
.content-body {
    background: transparent !important;
}

/* ---------------------------------------------------------
   TOP GREEN BAR
   --------------------------------------------------------- */

.content-header + div[style*="background:#006633"] {
    background: linear-gradient(
        90deg,
        #4dabf7,
        #69db7c,
        #ffd43b,
        #ff922b,
        #f783ac,
        #9775fa
    ) !important;

    height: 8px !important;
    border-radius: 0 0 10px 10px;
}

/* ---------------------------------------------------------
   SIDEBAR
   --------------------------------------------------------- */

.main-menu.menu-dark {
    background: linear-gradient(
        180deg,
        #2563a8 0%,
        #1976d2 45%,
        #4dabf7 100%
    ) !important;

    border-right: 0 !important;
}

/* Sidebar shadow */

.main-menu {
    box-shadow: 4px 0 25px rgba(25,118,210,.18) !important;
}

/* Sidebar main menu */

.main-menu .navigation {
    background: transparent !important;
}

/* ---------------------------------------------------------
   SIDEBAR TOP LEVEL ITEMS
   --------------------------------------------------------- */

.main-menu .navigation > li > a {
    color: #ffffff !important;
    font-weight: 600;
    font-size: 14px;

    margin: 5px 10px;
    border-radius: 14px;

    transition: all .25s ease;
}

/* Main icons */

.main-menu .navigation > li > a > i {
    color: #ffffff !important;
    font-size: 18px;
}

/* Hover */

.main-menu .navigation > li > a:hover {
    background: rgba(255,255,255,.18) !important;
    transform: translateX(3px);
}

/* ---------------------------------------------------------
   SIDEBAR SUB MENU
   --------------------------------------------------------- */

.main-menu .navigation .menu-content {
    background: rgba(0,0,0,.08) !important;
    border-radius: 12px;
    margin: 0 8px 5px 8px;
    padding: 5px 0;
}

/* Sub menu links */

.main-menu .navigation .menu-content li a {
    color: rgba(255,255,255,.90) !important;

    border-radius: 10px;
    margin: 2px 7px;

    font-size: 13px;

    transition: all .2s ease;
}

/* Sub menu icon */

.main-menu .navigation .menu-content li a i {
    color: #ffe066 !important;
}

/* Sub menu hover */

.main-menu .navigation .menu-content li a:hover {
    background: rgba(255,255,255,.18) !important;
    color: #ffffff !important;

    padding-left: 22px;
}

/* ---------------------------------------------------------
   ACTIVE MENU
   --------------------------------------------------------- */

.main-menu .navigation li.active > a {
    background: linear-gradient(
        135deg,
        #ffd43b,
        #ff922b
    ) !important;

    color: #263238 !important;

    box-shadow: 0 5px 15px rgba(255,146,43,.30);
}

.main-menu .navigation li.active > a i {
    color: #263238 !important;
}

/* ---------------------------------------------------------
   MENU SECTION COLORS
   --------------------------------------------------------- */

/* Different playful colors for top-level menu icons */

.main-menu .navigation > li:nth-child(1) > a > i {
    color: #ffe066 !important;
}

.main-menu .navigation > li:nth-child(2) > a > i {
    color: #69db7c !important;
}

.main-menu .navigation > li:nth-child(3) > a > i {
    color: #ff8787 !important;
}

.main-menu .navigation > li:nth-child(4) > a > i {
    color: #f783ac !important;
}

.main-menu .navigation > li:nth-child(5) > a > i {
    color: #9775fa !important;
}

.main-menu .navigation > li:nth-child(6) > a > i {
    color: #ffd43b !important;
}

/* ---------------------------------------------------------
   DASHBOARD CARDS
   --------------------------------------------------------- */

.content-body .card {
    border: 0 !important;
    border-radius: 22px !important;

    overflow: hidden;

    box-shadow:
        0 8px 20px rgba(50,80,120,.12) !important;

    transition:
        transform .25s ease,
        box-shadow .25s ease;

    min-height: 125px;
}

/* Card hover */

.content-body .card:hover {
    

    box-shadow:
        0 15px 30px rgba(50,80,120,.20) !important;
}

/* Card body */

.content-body .card-body {
    border-radius: 22px !important;
}

/* Card heading */

.content-body .card h3 {
    font-size: 28px !important;
    font-weight: 800 !important;
}

/* Card title */

.content-body .card span {
    font-size: 14px;
    font-weight: 600;
}

/* ---------------------------------------------------------
   DASHBOARD CARD COLORS
   --------------------------------------------------------- */

/* Card 1 */

.content-body .col-xl-3:nth-child(1) .card {
    background:
        linear-gradient(
            135deg,
            #ff922b,
            #ff6b6b
        ) !important;
}

/* Card 2 */

.content-body .col-xl-3:nth-child(2) .card {
    background:
        linear-gradient(
            135deg,
            #4dabf7,
            #339af0
        ) !important;
}

/* Card 3 */

.content-body .col-xl-3:nth-child(3) .card {
    background:
        linear-gradient(
            135deg,
            #f783ac,
            #e64980
        ) !important;
}

/* Card 4 */

.content-body .col-xl-3:nth-child(4) .card {
    background:
        linear-gradient(
            135deg,
            #69db7c,
            #38b000
        ) !important;
}

/* Card 5 */

.content-body .col-xl-3:nth-child(5) .card {
    background:
        linear-gradient(
            135deg,
            #9775fa,
            #7048e8
        ) !important;
}

/* Card 6 */

.content-body .col-xl-3:nth-child(6) .card {
    background:
        linear-gradient(
            135deg,
            #ffd43b,
            #ff922b
        ) !important;
}

/* ---------------------------------------------------------
   DASHBOARD ICON
   --------------------------------------------------------- */

.content-body .card .media-right i {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 58px;
    height: 58px;

    border-radius: 50%;

    background: rgba(255,255,255,.25);

    font-size: 28px !important;

    transition: transform .3s ease;
}

.content-body .card:hover .media-right i {
    transform: rotate(10deg) scale(1.12);
}

/* ---------------------------------------------------------
   CARD SPACING
   --------------------------------------------------------- */

.content-body .row > [class*="col-"] {
    margin-bottom: 20px;
}

/* ---------------------------------------------------------
   GENERAL BUTTONS
   --------------------------------------------------------- */

.btn-primary {
    background: linear-gradient(
        135deg,
        #4dabf7,
        #1976d2
    ) !important;

    border: 0 !important;
    border-radius: 12px !important;

    box-shadow: 0 5px 12px rgba(25,118,210,.20);
}

.btn-success {
    background: linear-gradient(
        135deg,
        #69db7c,
        #2f9e44
    ) !important;

    border: 0 !important;
    border-radius: 12px !important;
}

.btn-warning {
    background: linear-gradient(
        135deg,
        #ffd43b,
        #ff922b
    ) !important;

    border: 0 !important;
    border-radius: 12px !important;
}

/* ---------------------------------------------------------
   TABLES
   --------------------------------------------------------- */

.table {
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;

    box-shadow: 0 5px 18px rgba(50,80,120,.08);
}

.table thead {
    background: linear-gradient(
        90deg,
        #4dabf7,
        #9775fa
    ) !important;

    color: #ffffff;
}

/* ---------------------------------------------------------
   FORM CONTROLS
   --------------------------------------------------------- */

.form-control,
select,
input,
textarea {
    border-radius: 10px !important;
    border: 1px solid #d8e6f3 !important;

    box-shadow: none !important;
}

.form-control:focus,
select:focus,
input:focus,
textarea:focus {
    border-color: #4dabf7 !important;

    box-shadow:
        0 0 0 3px rgba(77,171,247,.15) !important;
}

/* ---------------------------------------------------------
   MOBILE
   --------------------------------------------------------- */

@media (max-width: 767px) {

    .content-body .card {
        min-height: 110px;
        border-radius: 18px !important;
    }

    .content-body .card h3 {
        font-size: 23px !important;
    }

    .content-body .card span {
        font-size: 12px;
    }

    .content-body .card .media-right i {
        width: 45px;
        height: 45px;
        font-size: 22px !important;
    }

}
</style>