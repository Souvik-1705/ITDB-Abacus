<?php include('administrator/includes/function.php'); ?>
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
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/dripicons.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<!-- ================= KIDS FONT ================= -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap"
rel="stylesheet">

<script type="text/javascript" src="js/ajax.js"></script>
<script>

function getDistrict(id)
{
xmlhttp.open('GET','get-district-registration.php?stateid='+id);
xmlhttp.onreadystatechange=getStateRequest;
xmlhttp.send();
}
function getStateRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('distEdit').innerHTML=response;
}
}
}
</script>

<script type="text/javascript">
function getFranchise()
{
var state=document.getElementById('state').value;
var dist=document.getElementById('district').value;

xmlhttp.open('GET','get-franchise.php?sid='+state+'&dist='+dist);
xmlhttp.onreadystatechange=getStateRequestFranchise;
xmlhttp.send();
}

function getStateRequestFranchise()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('divFran').innerHTML=response;
}
}
}
</script>
<script>
function getCourseList()
{
var category=document.getElementById('coursecat').value;
var duration=document.getElementById('duration').value;

xmlhttp.open('GET','get-course-list2.php?cat='+category+'&duration='+duration);
xmlhttp.onreadystatechange=getSendRequestCourse;
xmlhttp.send();
}

function getSendRequestCourse()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;

document.getElementById('divCourse').innerHTML=response;
}
}
}
</script>
<script>
function getDuration()
{
    var category=document.getElementById('coursecat').value;
	
	 document.getElementById('divCourse').innerHTML=
    '<select name="course" id="course" required>' +
    '<option value="">Select Course</option>' +
    '</select>';


    xmlhttp.open('GET','get-duration.php?category='+category);
    xmlhttp.onreadystatechange=getDurationRequest;
    xmlhttp.send();
}

function getDurationRequest()
{
    if(xmlhttp.readyState==4)
    {
        if(xmlhttp.status==200)
        {
            var response=xmlhttp.responseText;
            document.getElementById('durationDiv').innerHTML=response;
        }
    }
}
function hidePopup()
{
    var overlay=document.getElementById('overlay');

    if(overlay)
    {
        overlay.remove();
    }
}
</script>
</head>
<!-- ================= FONT AWESOME ================= -->

<!-- ================= CSS ================= -->
<style>

/* =========================================
MAIN REGISTRATION
========================================= */

.kids-registration-section {
position: relative;
overflow: hidden;
padding: 90px 0;
background:
linear-gradient(135deg, #fffaf1 0%, #f5fbff 50%, #fff6fb 100%);
}


/* =========================================
DECORATIVE SHAPES
========================================= */

.kids-shape {
position: absolute;
font-family: "Baloo 2", cursive;
pointer-events: none;
animation: floatingKids 4s ease-in-out infinite;
}

.shape-one {
top: 8%;
left: 5%;
font-size: 42px;
color: #ffb703;
}

.shape-two {
top: 18%;
right: 7%;
font-size: 45px;
color: #ff6b9a;
animation-delay: 1s;
}

.shape-three {
bottom: 15%;
left: 8%;
font-size: 30px;
color: #4cc9f0;
animation-delay: 1.5s;
}

.shape-four {
bottom: 10%;
right: 8%;
font-size: 42px;
color: #ff7b54;
animation-delay: 2s;
}


@keyframes floatingKids {

0%, 100% {
transform: translateY(0) rotate(0deg);
}

50% {
transform: translateY(-15px) rotate(8deg);
}

}


/* =========================================
MAIN WRAPPER
========================================= */

.kids-registration-wrapper {
position: relative;
z-index: 2;

display: grid;
grid-template-columns: 0.85fr 1.15fr;

max-width: 1180px;
margin: auto;

background: #ffffff;

border-radius: 30px;

overflow: hidden;

box-shadow:
0 25px 70px rgba(38, 70, 83, 0.12);
}


/* =========================================
LEFT INFORMATION
========================================= */

.kids-registration-info {
padding: 60px 45px;

background:
linear-gradient(
145deg,
#fff0a8,
#ffe3ec 55%,
#dff7ff
);

position: relative;
overflow: hidden;
}


.kids-registration-info:after {
content: "";

position: absolute;

width: 230px;
height: 230px;

right: -100px;
bottom: -90px;

background: rgba(255,255,255,.35);

border-radius: 50%;
}


.kids-welcome-icon {
width: 72px;
height: 72px;

display: flex;
align-items: center;
justify-content: center;

border-radius: 22px;

background: #ffffff;

color: #ff6b6b;

font-size: 32px;

margin-bottom: 22px;

box-shadow: 0 12px 30px rgba(0,0,0,.08);

transform: rotate(-5deg);
}


.kids-small-title {
font-family: "Baloo 2", cursive;

font-size: 18px;
font-weight: 700;

color: #f05d7b;

letter-spacing: .5px;
}


.kids-registration-info h2 {
font-family: "Baloo 2", cursive;

font-size: 42px;
line-height: 1.12;

color: #263238;

margin: 10px 0 18px;

font-weight: 800;
}


.kids-registration-info h2 strong {
color: #ff6b6b;
display: block;
}


.kids-registration-info > p {
font-family: "Nunito", sans-serif;

font-size: 16px;
line-height: 1.8;

color: #5f6368;

margin-bottom: 35px;
}


/* =========================================
FEATURES
========================================= */

.kids-feature {
display: flex;
align-items: center;

gap: 15px;

margin-bottom: 20px;
}


.feature-icon {
flex: 0 0 50px;

width: 50px;
height: 50px;

display: flex;
align-items: center;
justify-content: center;

border-radius: 15px;

background: #ffffff;

color: #ff8c42;

font-size: 20px;

box-shadow: 0 8px 20px rgba(0,0,0,.07);
}


.kids-feature h4 {
font-family: "Baloo 2", cursive;

font-size: 18px;

color: #263238;

margin: 0 0 2px;

font-weight: 700;
}


.kids-feature p {
font-family: "Nunito", sans-serif;

margin: 0;

font-size: 14px;

color: #6b7175;
}


/* =========================================
FORM AREA
========================================= */

.kids-registration-form {
padding: 55px 50px;

background: #ffffff;
}


.form-heading {
margin-bottom: 30px;
}


.form-heading span {
font-family: "Baloo 2", cursive;

color: #ff8c42;

font-size: 16px;

font-weight: 700;
}


.form-heading h3 {
font-family: "Baloo 2", cursive;

font-size: 34px;

color: #263238;

margin: 3px 0;

font-weight: 800;
}


.form-heading p {
font-family: "Nunito", sans-serif;

color: #777;

margin: 0;

font-size: 15px;
}


/* =========================================
FORM ROW
========================================= */

.form-row {
display: grid;

grid-template-columns: 1fr 1fr;

gap: 18px;
}


/* =========================================
FORM GROUP
========================================= */

.form-group {
margin-bottom: 20px;
}


.form-group label {
display: block;

font-family: "Nunito", sans-serif;

font-size: 15px;

font-weight: 800;

color: #3d464b;

margin-bottom: 8px;
}


.form-group label i {
margin-right: 6px;

color: #ff8c42;
}


/* =========================================
INPUT
========================================= */

.form-group input,
.form-group select,
.form-group textarea {

width: 100%;

border: 2px solid #edf0f2;

background: #fbfcfd;

border-radius: 13px;

padding: 13px 15px;

font-family: "Nunito", sans-serif;

font-size: 15px;

color: #333;

outline: none;

transition: all .3s ease;

box-sizing: border-box;
}


.form-group input,
.form-group select {
height: 50px;
}


.form-group textarea {
resize: vertical;

min-height: 90px;
}


.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {

border-color: #ffb703;

background: #ffffff;

box-shadow:
0 0 0 4px rgba(255,183,3,.10);
}


.form-group input::placeholder,
.form-group textarea::placeholder {
color: #a4a9ad;
}


/* =========================================
PHOTO UPLOAD
========================================= */

.photo-upload input {
display: none;
}


.upload-box {

min-height: 100px;

border: 2px dashed #ffd166;

background: #fffdf4;

border-radius: 15px;

display: flex !important;

align-items: center;

justify-content: center;

flex-direction: column;

cursor: pointer;

transition: all .3s ease;

color: #777;
}


.upload-box:hover {
background: #fff9df;

border-color: #ff9f1c;

transform: translateY(-2px);
}


.upload-box i {
font-size: 27px;

color: #ff9f1c;

margin-bottom: 5px;
}


.upload-box span {
font-family: "Nunito", sans-serif;

font-size: 14px;

font-weight: 700;
}


.upload-box small {
font-family: "Nunito", sans-serif;

font-size: 12px;

color: #999;

margin-top: 3px;
}


/* =========================================
CHECKBOX
========================================= */

.kids-checkbox {

display: flex;

align-items: flex-start;

gap: 9px;

margin: 8px 0 22px;
}


.kids-checkbox input {

width: 17px;
height: 17px;


margin-top: 2px;

accent-color: #ff8c42;

cursor: pointer;
}


.kids-checkbox label {

font-family: "Nunito", sans-serif;

font-size: 14px;

color: #70777b;

cursor: pointer;

line-height: 1.5;
}


/* =========================================
SUBMIT BUTTON
========================================= */

.kids-submit-btn {

width: 100%;

height: 56px;

border: 0;

border-radius: 16px;

background:
linear-gradient(
90deg,
#ff8c42,
#ff6b6b,
#ff5d8f
);

color: #ffffff;

font-family: "Baloo 2", cursive;

font-size: 19px;

font-weight: 700;

cursor: pointer;

display: flex;

align-items: center;

justify-content: center;

gap: 12px;

box-shadow:
0 12px 25px rgba(255,107,107,.25);

transition: all .3s ease;
}


.kids-submit-btn:hover {

transform: translateY(-3px);

box-shadow:
0 18px 35px rgba(255,107,107,.30);
}


.kids-submit-btn i {
transition: transform .3s ease;
}


.kids-submit-btn:hover i {
transform: translateX(6px);
}


/* =========================================
TABLET
========================================= */

@media(max-width: 991px) {

.kids-registration-wrapper {
grid-template-columns: 1fr;
}

.kids-registration-info {
padding: 45px 40px;
}

.kids-registration-form {
padding: 45px 40px;
}

.kids-registration-info h2 {
font-size: 38px;
}

}


/* =========================================
MOBILE
========================================= */

@media(max-width: 767px) {

.kids-registration-section {
padding: 55px 15px;
}

.kids-registration-info {
padding: 40px 25px;
}

.kids-registration-form {
padding: 35px 22px;
}

.kids-registration-info h2 {
font-size: 34px;
}

.form-row {
grid-template-columns: 1fr;
gap: 0;
}

.form-heading h3 {
font-size: 30px;
}

.kids-shape {
display: none;
}

}


/* =========================================
SMALL MOBILE
========================================= */

@media(max-width: 480px) {

.kids-registration-section {
padding: 40px 10px;
}

.kids-registration-wrapper {
border-radius: 20px;
}

.kids-registration-info {
padding: 32px 20px;
}

.kids-registration-form {
padding: 30px 18px;
}

.kids-registration-info h2 {
font-size: 30px;
}

.kids-welcome-icon {
width: 60px;
height: 60px;
font-size: 27px;
}

.kids-submit-btn {
height: 52px;
font-size: 18px;
}

}
.abacus-popup-overlay
{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(2,50,120,0.55);

display:flex;
align-items:center;
justify-content:center;

z-index:99999;
padding:20px;
box-sizing:border-box;
}

.abacus-popup
{
width:400px;
max-width:100%;

padding:30px 25px 25px;

background:#fff;
border-radius:25px;

text-align:center;

box-shadow:0 15px 40px rgba(2,50,120,0.25);

border:4px solid #e4f1ff;

box-sizing:border-box;

animation:abacusPopupShow .25s ease;
}

.abacus-popup-icon
{
width:70px;
height:70px;

margin:0 auto 12px;

display:flex;
align-items:center;
justify-content:center;

border-radius:50%;

color:#fff;
font-size:32px;

box-shadow:0 5px 0 rgba(0,0,0,0.15);
}

.abacus-popup h2
{
margin:8px 0;
font-size:25px;
font-weight:900;
}

.abacus-popup p
{
margin:0 auto 22px;

color:#52708f;

font-size:15px;
font-weight:600;

line-height:1.6;
}

.abacus-popup button
{
min-width:120px;
height:42px;

padding:0 20px;

border:0;
border-radius:22px;

color:#fff;

font-size:14px;
font-weight:800;

cursor:pointer;

box-shadow:0 4px 0 rgba(0,0,0,0.20);

transition:all .2s ease;
}

.abacus-popup button:hover
{
transform:translateY(-2px);

box-shadow:0 6px 0 rgba(0,0,0,0.20);
}

@keyframes abacusPopupShow
{
from
{
opacity:0;
transform:scale(.85);
}

to
{
opacity:1;
transform:scale(1);
}
}

@media(max-width:575px)
{
.abacus-popup
{
width:100%;
padding:25px 18px 22px;
border-radius:20px;
}

.abacus-popup-icon
{
width:60px;
height:60px;
font-size:27px;
}

.abacus-popup h2
{
font-size:22px;
}

.abacus-popup p
{
font-size:14px;
}
}
</style>
<body>

<?php if(isset($_REQUEST['e']) && $_REQUEST['e']==1){ ?>

<?=getFailedSuccessHtml(
    'Registration Failed',
    'Email ID or Phone Number Already Used!!',
    'failed'
)?>

<?php } ?>
<!-- header -->
<!-- header -->
<?php include('header.php')?>
<!-- header-end -->
<!-- header-end -->
<!-- main-area -->
<main>

<!-- ================= BREADCRUMB ================= -->
<section class="breadcrumb-area d-flex align-items-center"
style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Kids Registration</h2>

<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>

<li class="breadcrumb-item active"
aria-current="page">
Kids Registration
</li>
</ol>
</nav>
</div>

</div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= BREADCRUMB END ================= -->


<!-- ================= REGISTRATION SECTION ================= -->
<section class="kids-registration-section">

<!-- Decorative Elements -->
<div class="kids-shape shape-one">★</div>
<div class="kids-shape shape-two">✦</div>
<div class="kids-shape shape-three">●</div>
<div class="kids-shape shape-four">♥</div>

<div class="container">

<div class="kids-registration-wrapper">

<!-- LEFT SIDE -->
<div class="kids-registration-info">

<div class="kids-welcome-icon">
<i class="fas fa-child"></i>
</div>

<span class="kids-small-title">
Welcome Little Star!
</span>

<h2>
Let's Start Your
<strong>Happy Journey!</strong>
</h2>

<p>
Register your child with us and give them an exciting
environment to learn, play, explore and grow.
</p>

<div class="kids-feature-list">

<div class="kids-feature">
<div class="feature-icon">
<i class="fas fa-palette"></i>
</div>
<div>
<h4>Creative Learning</h4>
<p>Learn through fun and creativity.</p>
</div>
</div>

<div class="kids-feature">
<div class="feature-icon">
<i class="fas fa-puzzle-piece"></i>
</div>
<div>
<h4>Fun Activities</h4>
<p>Play, explore and discover new things.</p>
</div>
</div>

<div class="kids-feature">
<div class="feature-icon">
<i class="fas fa-users"></i>
</div>
<div>
<h4>Friendly Environment</h4>
<p>A safe and caring place for every child.</p>
</div>
</div>

</div>

</div>



<!-- RIGHT SIDE FORM -->
<div class="kids-registration-form">

<div class="form-heading">
<span>Join Our Family</span>
<h3>Kids Registration</h3>
<p>
Please fill in the details below to register.
</p>
</div>


<form action="registration-process.php?case=add" method="post"
enctype="multipart/form-data">

<h4>Choose Location</h4>
<hr/>
<div class="form-row">
<!-- State -->
<div class="form-group">
<label>
<i class="fas fa-school"></i>
State
</label>

<select name="state" id="state" required onChange="getDistrict(this.value);">
<option value="">Select State</option>
<?php
$sql="SELECT * FROM `ab_state` ORDER BY `state`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['state']?></option>
<?php }}?>
</select>
</div>
<!-- District -->
<div class="form-group">
<label><i class="fas fa-map-marked-alt"></i>District</label>
<div id="distEdit">
<select name="district" id="district" required>
<option value="">Select District</option>
<?php
$sql="SELECT * FROM `ab_district` ORDER BY `district`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['district']?></option>
<?php }}?>
</select>
</div>
</div>
</div>


<div class="form-group">
<label><i class="fas fa-school"></i>Study Centre</label>
<div id="divFran">
<select name="franchise" id="franchise" required>
<option>Select category</option>

</select>
</div>
</div>

<h4>Choose Course</h4>
<hr/>

<div class="form-row">
<!-- State -->
<div class="form-group">
<label><i class="fas fa-layer-group"></i>Course Category</label>

<select name="coursecat" id="coursecat" required onChange="getDuration()">
<option>Select category</option>
<?php
$sqls="SELECT * FROM `ab_course_category` ORDER BY `id`";
$ress=query($conn,$sqls);
$nums=numrows($ress);
if($nums>0)
{
while($fetchs=fetcharray($ress))
{
?>
<option value="<?=$fetchs['id']?>"><?=$fetchs['category']?></option>
<?php }}?>
</select>
</div>
<!-- District -->
<div class="form-group">
<label><i class="fas fa-clock"></i>Duration</label>

<div id="durationDiv">

<select name="duration" id="duration" onChange="getCourseList()" required>
<option value="">Select Duration</option>
</select>

</div>

</div>
</div>

<div class="form-group">
<label><i class="fas fa-book"></i>Course Name</label>

<div id="divCourse">

<select name="course" id="course" required>
<option value="">Select Course</option>
</select>

</div>
</div>
<h4>Enter your information</h4>
<hr/>



<div class="form-row">

<!-- Child Name -->
<div class="form-group">
<label>
<i class="fas fa-user"></i>
Name
</label>

<input type="text" placeholder="Enter Name" required id="name" name="name" value=""/>
</div>

<div class="form-group">
<label>
<i class="fas fa-hourglass-half"></i>
Age
</label>

<select name="age" id="age" required>
<option>Select Age</option>
<option value="1">1 Year</option>
<option value="2">2 Year</option>
<option value="3">3 Year</option>
<option value="4">4 Year</option>
<option value="5">5 Year</option>
<option value="6">6 Year</option>
<option value="7">7 year</option>
<option value="8">8 Year</option>
<option value="9">9 Year</option>
<option value="10">10 Year</option>
</select>
</div>

</div>


<div class="form-row">

<!-- Child Name -->
<div class="form-group">
<label>
<i class="fas fa-user-tie"></i>
Father's Name
</label>

<input type="text" placeholder="Enter Father's Name" required id="fname" name="fname" value=""/>
</div>

<div class="form-group">
<label>
<i class="fas fa-person-dress"></i>
Mother's Name
</label>

<input class="form-control" type="text" placeholder="Enter Mother's Name" required id="mname" name="mname" value=""/>
</div>

</div>

<div class="form-row">

<div class="form-group">
<label>
<i class="fas fa-phone"></i>
Parent's Mobile Number
</label>

<input type="text" placeholder="Enter Mobile Number" required id="phone" name="phone" value="" maxlength="10"/>
</div>
<div class="form-group">
<label>
<i class="fas fa-envelope"></i>
Parent's Email
</label>

<input type="email" placeholder="Enter Parent's Email" required id="email" name="email" value="">

</div>
</div>

<div class="form-row">
<!-- Date of Birth -->
<div class="form-group">
<label>
<i class="fas fa-cake-candles"></i>
Date of Birth
</label>

<input type="date" placeholder="Enter Date Of Birth" required id="dob" name="dob" value="" maxlength="10"/>
</div>


<!-- Gender -->
<div class="form-group">
<label>
<i class="fas fa-hands-praying"></i>
Religion
</label>

<select name="religion" id="religion" required>
<option value="">Select Religion</option>
<option value="Hinduism">Hinduism</option>
<option value="Islam">Islam</option>
<option value="Christianism">Christianism</option>
<option value="Others">Others</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group">
<label>
<i class="fas fa-venus-mars"></i>
Gender
</label>

<select name="gender" id="gender" onChange="getHusband()" required><option>Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="form-group">
<label>
<i class="fas fa-layer-group"></i>
Category
</label>

<select name="category" id="category" required>
<option>Select Status</option>
<option value="General">General</option>
<option value="SC">SC</option>
<option value="ST">ST</option>
<option value="OBC">OBC</option>
</select>
</div>
</div>





<div class="form-row">
<div class="form-group">
<label>
<i class="fas fa-map-pin"></i>
Pincode
</label>

<input type="text" placeholder="Enter Pincode" required id="pincode" name="pincode" value=""/>
</div>

<div class="form-group">
<label>
<i class="fas fa-city"></i>
City
</label>

<input type="text" placeholder="Enter City" required id="city" name="city" value=""/>
</div>
</div>

<div class="form-group">
<label>
<i class="fas fa-calendar-check"></i>
Admission Date
</label>

<input type="date" placeholder="Enter Admission Date" required id="admission" name="admission" value="" maxlength="10"/>
</div>

<div class="form-group">
<label>
<i class="fas fa-house"></i>
Address
</label>

<input type="text" placeholder="Enter Address" required id="address" name="address" value=""/>
</div>

<!-- Child Photo -->
<div class="form-group">
<label>
<i class="fas fa-camera"></i>
Child's Photo
</label>

<div class="photo-upload">
<input type="file" style="width:200px;height:26px" name="photo" id="photo" required accept=".png,.jpeg,.jpg,.pjp"/>

<label for="photo"
class="upload-box">

<i class="fas fa-cloud-arrow-up"></i>

<span>
Click to upload child's photo
</span>

<small>
JPG, PNG or JPEG
</small>

</label>
</div>
</div>
<div class="form-group">
<label>
<i class="fas fa-camera"></i>
ID Proof
</label>

<div class="photo-upload">
<input type="file" style="width:200px;height:26px" name="identity" id="identity" required accept=".png,.jpeg,.jpg,.pjp" />

<label for="identity"
class="upload-box">

<i class="fas fa-cloud-arrow-up"></i>

<span>
Click to upload ID proof
</span>

<small>
JPG, PNG or JPEG
</small>

</label>
</div>
</div>

<!-- Terms -->
<div class="kids-checkbox">

<input type="checkbox"
id="terms"
name="terms"
required>

<label for="terms">
I confirm that the information provided
above is correct.
</label>

</div>


<!-- Submit -->
<button type="submit"
name="register"
class="kids-submit-btn">

<span>Register Now</span>

<i class="fas fa-arrow-right"></i>

</button>

</form>

</div>

</div>

</div>

</section>
<!-- ================= REGISTRATION END ================= -->

</main>



<!-- main-area-end -->
<!-- footer -->
<!-- footer -->
<?php include('footer.php')?>
<!-- footer-end -->
<!-- footer-end -->

<!-- JS here -->
<script src="js/modernizr-3.5.0.min.js"></script>
<script src="js/jquery.min.js"></script>
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
</body>

</html>
