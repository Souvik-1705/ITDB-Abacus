<?php 
session_start();
include('administrator/includes/function.php'); 
$captha=substr(md5(rand(111111,999999)),1,6);
$_SESSION['captcha'] = $captha;
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
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/dripicons.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- ================= KIDS FONT ================= -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap"rel="stylesheet">
<script type="text/javascript" src="js/ajax.js"></script>
<script>

function getDistrict(id)
{
xmlhttp.open('GET','get-district.php?stateid='+id);
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
document.getElementById('distDiv').innerHTML=response;
}
}
}
</script>
<script>

function togglePassword() {

    const password = document.getElementById("password");
    const icon = document.getElementById("passwordIcon");

    if (password.type === "password") {

        password.type = "text";

        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");

    } else {

        password.type = "password";

        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");

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

/* =========================================
DECORATIVE KIDS SHAPES
========================================= */

.kids-shape {
    position: absolute;
    font-family: "Baloo 2", cursive;
    pointer-events: none;
    z-index: 1;

    animation:
        floatingKids 4s ease-in-out infinite,
        zoomKids 2.5s ease-in-out infinite;
}


/* =========================================
FLOATING ANIMATION
========================================= */

@keyframes floatingKids {

    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }

    50% {
        transform: translateY(-18px) rotate(8deg);
    }

}


/* =========================================
ZOOM IN / OUT
========================================= */

@keyframes zoomKids {

    0%, 100% {
        scale: 0.75;
        opacity: 0.65;
    }

    50% {
        scale: 1.25;
        opacity: 1;
    }

}


/* =========================================
SHAPE POSITIONS
========================================= */

.shape-one {
    top: 5%;
    left: 4%;
    font-size: 42px;
    color: #ffb703;
}

.shape-two {
    top: 12%;
    right: 5%;
    font-size: 48px;
    color: #ff6b9a;
    animation-delay: .5s;
}

.shape-three {
    top: 35%;
    left: 2%;
    font-size: 25px;
    color: #4cc9f0;
    animation-delay: 1s;
}

.shape-four {
    top: 42%;
    right: 3%;
    font-size: 43px;
    color: #ff7b54;
    animation-delay: 1.5s;
}


/* =========================================
MORE SHAPES
========================================= */

.shape-five {
    top: 22%;
    left: 12%;
    font-size: 22px;
    color: #ff6b6b;
    animation-delay: .8s;
}

.shape-six {
    top: 27%;
    right: 13%;
    font-size: 30px;
    color: #ffb703;
    animation-delay: 1.2s;
}

.shape-seven {
    top: 55%;
    left: 7%;
    font-size: 32px;
    color: #ff6b9a;
    animation-delay: 1.8s;
}

.shape-eight {
    top: 62%;
    right: 9%;
    font-size: 20px;
    color: #4cc9f0;
    animation-delay: 2s;
}

.shape-nine {
    top: 75%;
    left: 3%;
    font-size: 38px;
    color: #ffb703;
    animation-delay: .4s;
}

.shape-ten {
    top: 78%;
    right: 4%;
    font-size: 27px;
    color: #ff7b54;
    animation-delay: 1.6s;
}

.shape-eleven {
    top: 88%;
    left: 15%;
    font-size: 18px;
    color: #4cc9f0;
    animation-delay: 2.2s;
}

.shape-twelve {
    top: 86%;
    right: 16%;
    font-size: 36px;
    color: #ff6b9a;
    animation-delay: 1.1s;
}


/* =========================================
TOP SMALL SHAPES
========================================= */

.shape-thirteen {
    top: 3%;
    left: 25%;
    font-size: 18px;
    color: #4cc9f0;
    animation-delay: 1.3s;
}

.shape-fourteen {
    top: 7%;
    right: 25%;
    font-size: 25px;
    color: #ffb703;
    animation-delay: 2s;
}

.shape-fifteen {
    top: 48%;
    left: 13%;
    font-size: 20px;
    color: #ff7b54;
    animation-delay: 2.4s;
}

.shape-sixteen {
    top: 50%;
    right: 14%;
    font-size: 28px;
    color: #ffb703;
    animation-delay: .9s;
}

.shape-seventeen {
    top: 68%;
    left: 20%;
    font-size: 25px;
    color: #ff6b9a;
    animation-delay: 1.7s;
}

.shape-eighteen {
    top: 70%;
    right: 21%;
    font-size: 18px;
    color: #4cc9f0;
    animation-delay: 2.5s;
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
.captcha-box {
    width: 150px;
    height: 65px;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    border-radius: 12px;
    color: #ffffff;
    font-family: "Baloo 2", cursive;
    font-size: 28px;
    font-weight: 800;
    letter-spacing: 6px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 20px;
    box-shadow: 0 8px 18px rgba(37,117,252,.25);
}

@media (min-width: 1200px) {
    .fran-container, .fran-container-lg, .fran-container-md, .fran-container-sm, .fran-container-xl {
        max-width: 640px!important;
		transform:translatex(70%);
    }
}

/* Password Wrapper */

.password-wrapper {
    position: relative;
    width: 100%;
}


/* Password Input */

.password-wrapper input {
    width: 100%;
    padding-right: 50px !important;
}


/* Password Toggle */

.password-toggle {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);

    width: 35px;
    height: 35px;

    border: none;
    background: transparent;

    color: #8d8d8d;

    font-size: 17px;

    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0;

    z-index: 5;
}

.password-toggle:hover {
    color: #ff8c42;
}

.password-toggle:focus {
    outline: none;
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

<!-- ================= BREADCRUMB ================= -->
<section class="breadcrumb-area d-flex align-items-center"
style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Franchise Login</h2>

<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>

<li class="breadcrumb-item active"
aria-current="page">
Franchise Login
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

<div class="kids-shape shape-five">★</div>
<div class="kids-shape shape-six">✦</div>
<div class="kids-shape shape-seven">♥</div>
<div class="kids-shape shape-eight">●</div>

<div class="kids-shape shape-nine">★</div>
<div class="kids-shape shape-ten">✦</div>
<div class="kids-shape shape-eleven">●</div>
<div class="kids-shape shape-twelve">♥</div>

<div class="kids-shape shape-thirteen">★</div>
<div class="kids-shape shape-fourteen">✦</div>
<div class="kids-shape shape-fifteen">♥</div>
<div class="kids-shape shape-sixteen">●</div>

<div class="kids-shape shape-seventeen">★</div>
<div class="kids-shape shape-eighteen">✦</div>

<div class="fran-container">

<div class="kids-registration-wrapper">





<!-- RIGHT SIDE FORM -->
<div class="kids-registration-form">

<div class="form-heading">
<span>Join Our Family</span>
<h3>Franchise Login</h3>
<p>
Please fill in the details below to login.
</p>
</div>

<?php if($_REQUEST['m']==1){?>
<p align="center" style="color:#FF0033; font-size:16px;"><strong>Invalid Centre ID or Password!</strong></p>
<?php }?>
<form action="franchise-login-process.php" name="contactform" method="post"
enctype="multipart/form-data">


<div class="form-group">
<label><i class="fas fa-building"></i>Centre Code</label>

<input type="text" name="code" id="code" placeholder="Enter Centre ID" required>
</div>

<div class="form-group password-group">

<label>
<i class="fas fa-key"></i>Password
</label>

<div class="password-wrapper">

<input type="password"
name="password"
id="password"
placeholder="Your Password"
required>

<button type="button"
class="password-toggle"
onclick="togglePassword()">

<i class="fas fa-eye" id="passwordIcon"></i>

</button>

</div>

</div>

<div class="form-group"></div>
<div class="captcha-box" ><?=$captha?>
</div>
<div class="col-md-5"></div>

<div class="form-group">
<label><i class="fas fa-shield"></i>Security Code</label>

<input type="text" name="captcha" id="captcha"  value="" required placeholder="Enter Security Code."/>
</div>
<!-- Submit -->
<button type="submit"
name="login"
class="kids-submit-btn">

<span>Login</span>

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
