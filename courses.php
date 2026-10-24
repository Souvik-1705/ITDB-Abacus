<?php
include('administrator/includes/function.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?=$title?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="font-flaticon/flaticon.css">
<link rel="stylesheet" href="css/dripicons.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="pagination.css">
</head>
<style>
.course-group {
width: 100%;
margin-bottom: 45px;
}

.course-heading {
font-size: 28px;
font-weight: 700;
color: #023278;
margin-bottom: 25px;
padding-bottom: 12px;
border-bottom: 3px solid #3ea714;
}

.course-level-row {
display: flex;
flex-wrap: wrap;
margin-left: -15px;
margin-right: -15px;
}

.course-level-col {
width: 33.333333%;
padding: 0 15px;
}

.class-item {
width: 100%;
}

.class-content {
padding: 120px 30px 30px;
box-shadow: 0px 2px 60px 0px rgba(0, 0, 0, 0.1);
margin-top: -90px;
border-radius: 10px;
float: left;
width: 100%;
word-break: break-word !important;
}

.class-content .schedule .class-price {
font-size: 16px !important;
white-space: nowrap !important;
display: block !important;
}

@media(max-width: 991px) {
.course-level-col {
width: 50%;
}
}

@media(max-width: 767px) {
.course-heading {
font-size: 24px;
text-align: center;
}

.course-level-col {
width: 100%;
}

.class-content {
padding: 120px 25px 30px;
margin-top: -90px;
}

.class-content .schedule {
display: flex !important;
flex-wrap: nowrap !important;
gap: 5px !important;
}

.class-content .schedule li {
flex: 1 !important;
white-space: nowrap !important;
font-size: 12px !important;
}

.class-content .schedule .class-price {
font-size: 12px !important;
}
}

.course-description {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 24px;
}

.course-description.expanded {
    display: block;
    -webkit-line-clamp: unset;
    overflow: visible;
}

.read-more-btn {
    display: none;
    margin-top: 5px;
    color: #0576de;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
}

.read-more-btn:hover {
    color: #fa7104;
    text-decoration: underline;
}
</style>
<body>
<!-- header -->
<!-- header -->
<?php include('header.php')?>
<!-- header-end -->
<!-- header-end -->
<!-- main-area -->
<main>

<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Courses</h2>
<div class="breadcrumb-wrap">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Courses </li>
</ol>
</nav>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
<!-- breadcrumb-area-end -->
<!-- class area start -->
<section class="class-area pt-80 pb-80 p-relative">
<div class="animations-06"><img src="img/bg/an-img-06.png" alt="an-img-01"></div>
<div class="animations-07"><img src="img/bg/an-img-07.png" alt="contact-bg-an-01"></div>
<div class="animations-08"><img src="img/bg/an-img-08.png" alt="contact-bg-an-01"></div>
<div class="animations-09"><img src="img/bg/an-img-09.png" alt="contact-bg-an-01"></div>
<div class="container">

<div class="row">
<?php

$sql_course = "SELECT `course_name` FROM `ab_course` GROUP BY `course_name` ORDER BY MIN(`id`) ASC";
$res_course = query($conn, $sql_course);

$num_course = numrows($res_course);

if($num_course > 0)
{
while($course = fetcharray($res_course))
{
$coursename = $course['course_name'];

$sql_base = "SELECT MIN(`id`) AS course_id FROM `ab_course` WHERE `course_name` = '".mysqli_real_escape_string($conn, $coursename)."'";

$res_base = query($conn, $sql_base);
$baseCourse = fetcharray($res_base);
$baseCourseId = (int)$baseCourse['course_id'];
$sql_level = "SELECT * FROM `ab_course` WHERE `course_name` = '".mysqli_real_escape_string($conn, $coursename)."' 
ORDER BY `level` ASC";

$res_level = query($conn, $sql_level);

$res_level = query($conn, $sql_level);

if(numrows($res_level) > 0)
{
?>
<div class="col-md-12 course-group">

<h3 class="course-heading">
<?=ucwords(str_replace('-', ' ', $coursename))?>
(<?=getDuration($conn, getCourseNameByID($conn, $baseCourseId, 'duration'))?>)
</h3>

<div class="course-level-row">

<?php
while($fetch = fetcharray($res_level))
{
?>
<div class="course-level-col">
<div class="class-item mb-30">

<div class="class-img">
<div style="width:100%; height:250px; overflow:hidden;">
<?php
if($fetch['image'] != "")
{
?>
<img src="administrator/course/<?=$fetch['image']?>"
alt="<?=htmlspecialchars($fetch['course_name'])?>"
style="width:100%; height:250px; object-fit:cover; display:block;">
<?php
}
else
{
?>
<img src="img/class/class-1.jpg"
alt="<?=htmlspecialchars($fetch['course_name'])?>"
style="width:100%; height:250px; object-fit:cover; display:block;">
<?php
}
?>
</div>
</div>

<div class="class-content">

<h4 class="title">
Level <?=htmlspecialchars($fetch['level'])?>
</h4>




<div style="margin-top:15px; margin-bottom:20px;">
<div class="course-description">
<?=getCourseLevelDescription($conn,$baseCourseId,$fetch['level'],'description')?>
</div>

<a href="javascript:void(0);" class="read-more-btn"
onclick="toggleDescription(this)">Read More</a>
</div>

<ul class="schedule">
<li>
<span>Age:</span>
<span class="class-size">
<?=getCourseLevelDescription($conn,$baseCourseId,$fetch['level'],'age')?>
</span>
</li>

<li>
<span>Duration:</span>
<span class="class-size class-size-2">
<?=getCourseLevelDescription($conn,$baseCourseId,$fetch['level'],'level_duration')?>
</span>
</li>

<li>
<span class="class-price">
RS.<?=number_format(getCourseFees($conn, $baseCourseId, $fetch['duration']), 0)?>
</span>
</li>
</ul>

</div>
</div>
</div>
<?php
}
?>
</div>
</div>
<?php
}
}
}
else
{
?>
<div class="col-md-12 text-center">
<h4>No Course Found</h4>
</div>
<?php
}
?>

<div class="col-md-12">
<div align="center" style="margin-top:30px;">
<div><?=$pagination?></div>
</div>
</div>

</div>



</div>
</section>
<!-- class area start -->
<!-- brand-area -->

<!-- brand-area-end -->
</main>
<!-- main-area-end -->
<!-- footer -->
<!-- footer -->
<?php include('footer.php')?>
<!-- footer-end -->
<!-- footer-end -->

<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/paroller.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/js_isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.meanmenu.min.js"></script>
<script src="js/parallax-scroll.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/element-in-view.js"></script>
<script src="js/main.js"></script>
<script>
function checkDescriptionHeight() {
document.querySelectorAll('.course-description').forEach(function(description) {
var btn = description.nextElementSibling;

description.classList.remove('expanded');

if (description.scrollHeight > description.clientHeight + 1) {
btn.style.display = 'inline-block';
} else {
btn.style.display = 'none';
}
});
}
function toggleDescription(btn) {
var description = btn.previousElementSibling;

if (description.classList.contains('expanded')) {
description.classList.remove('expanded');
btn.innerHTML = 'Read More';
} else {
description.classList.add('expanded');
btn.innerHTML = 'Read Less';
}
}
window.addEventListener('load', checkDescriptionHeight);
window.addEventListener('resize', checkDescriptionHeight);
</script>
</body>

</html>
