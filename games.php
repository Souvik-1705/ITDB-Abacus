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

<style>
.games-start-section
{
min-height:500px;
background:#fff;
display:flex;
align-items:center;
justify-content:center;
padding:30px 15px;
overflow:hidden;
position:relative;
}


/* START BOX */

.games-start-box
{
position:relative;
z-index:5;
width:390px;
max-width:100%;
padding:35px 25px 40px;
text-align:center;
background:linear-gradient(135deg,#e4f1ff,#fff7e8,#fff0f5);
border-radius:30px;
box-shadow:0 12px 30px rgba(2,50,120,0.15);
}

.games-game-icon
{
width:70px;
height:70px;
margin:0 auto 12px;
display:flex;
align-items:center;
justify-content:center;
background:#fa7104;
color:#fff;
border-radius:50%;
font-size:32px;
box-shadow:0 6px 0 #d95700;
}

.games-start-box h3
{
margin:8px 0 5px;
color:#023278;
font-size:30px;
font-weight:900;
}

.games-start-box p
{
margin:0 0 22px;
color:#555;
font-size:15px;
font-weight:600;
}

.games-start-btn
{
display:inline-flex;
align-items:center;
justify-content:center;
gap:10px;
width:180px;
height:58px;
background:linear-gradient(135deg,#ff3b30,#fa7104);
color:#fff !important;
text-decoration:none !important;
font-size:21px;
font-weight:900;
border-radius:30px;
border:4px solid #fff;
box-shadow:
0 6px 0 #c62828,
0 10px 20px rgba(255,59,48,0.28);
transition:all .2s ease;
}

.games-start-btn:hover
{
transform:translateY(-4px) scale(1.04);
}


/* =========================================
GIF / IMAGE DECORATION
NO CSS ANIMATION
========================================= */

/* =========================================
BIGGER + MORE SPACED SIDE IMAGES
========================================= */

.games-decoration
{
position:relative;
width:300px;
height:360px;
flex-shrink:0;
}

.game-funky-img
{
position:absolute;
display:flex;
align-items:center;
justify-content:center;
}

.game-funky-img img
{
width:100%;
height:100%;
object-fit:contain;
display:block;
}


/* =========================================
LEFT SIDE
========================================= */

.games-left
{
margin-right:25px;
}

.games-left .img-one
{
width:100px;
height:100px;
top:5px;
left:5px;
}

.games-left .img-two
{
width:125px;
height:125px;
top:115px;
left:120px;
}

.games-left .img-three
{
width:90px;
height:90px;
bottom:0;
left:20px;
}


/* =========================================
RIGHT SIDE
========================================= */

.games-right
{
margin-left:25px;
}

.games-right .img-four
{
width:100px;
height:100px;
top:5px;
right:5px;
}

.games-right .img-five
{
width:125px;
height:125px;
top:115px;
right:120px;
}

.games-right .img-six
{
width:90px;
height:90px;
bottom:0;
right:20px;
}

/* =========================================
TABLET
========================================= */

@media(max-width:1100px)
{
.games-decoration
{
width:170px;
height:270px;
}

.games-left .img-one,
.games-right .img-four
{
width:58px;
height:58px;
}

.games-left .img-two,
.games-right .img-five
{
width:72px;
height:72px;
}

.games-left .img-three,
.games-right .img-six
{
width:50px;
height:50px;
}
}


/* =========================================
MOBILE
========================================= */

@media(max-width:767px)
{
.games-start-section
{
min-height:450px;
padding:30px 10px;
}

.games-start-box
{
width:320px;
padding:28px 18px 32px;
}

.games-decoration
{
display:none;
}

.games-left .img-one
{
left:5px;
top:45px;
}

.games-left .img-two
{
left:10px;
top:180px;
}

.games-left .img-three
{
left:20px;
bottom:50px;
}

.games-right .img-four
{
right:5px;
top:45px;
}

.games-right .img-five
{
right:10px;
top:180px;
}

.games-right .img-six
{
right:20px;
bottom:50px;
}

.games-start-box h3
{
font-size:25px;
}

.games-start-btn
{
width:155px;
height:52px;
font-size:18px;
}
}
/* =========================================
KIDS BACKGROUND FLOATING ELEMENTS
========================================= */

/* =========================================
MANY FLOATING KIDS ELEMENTS
========================================= */

.games-bg-float
{
position:absolute;
z-index:1;
pointer-events:none;
user-select:none;
opacity:0;
}


/* COMMON */

.float-item
{
bottom:-100px;
font-size:35px;
line-height:1;
animation-name:floatUp;
animation-timing-function:linear;
animation-iteration-count:infinite;
}


/* =========================================
DIFFERENT POSITIONS
========================================= */

.item-1
{
left:4%;
font-size:48px;
animation-duration:9s;
animation-delay:0s;
}

.item-2
{
left:11%;
font-size:30px;
animation-duration:7s;
animation-delay:2s;
}

.item-3
{
left:18%;
font-size:35px;
animation-duration:11s;
animation-delay:5s;
}

.item-4
{
left:25%;
font-size:42px;
animation-duration:10s;
animation-delay:1s;
}

.item-5
{
left:32%;
font-size:45px;
animation-duration:8s;
animation-delay:4s;
}

.item-6
{
left:40%;
font-size:28px;
animation-duration:7s;
animation-delay:7s;
}

.item-7
{
left:48%;
font-size:38px;
animation-duration:12s;
animation-delay:3s;
}

.item-8
{
left:56%;
font-size:34px;
animation-duration:9s;
animation-delay:6s;
}

.item-9
{
left:64%;
font-size:48px;
animation-duration:10s;
animation-delay:1.5s;
}

.item-10
{
left:72%;
font-size:30px;
animation-duration:8s;
animation-delay:5.5s;
}

.item-11
{
left:79%;
font-size:35px;
animation-duration:11s;
animation-delay:2.5s;
}

.item-12
{
left:85%;
font-size:32px;
animation-duration:9s;
animation-delay:7s;
}

.item-13
{
left:91%;
font-size:38px;
animation-duration:12s;
animation-delay:4s;
}

.item-14
{
left:96%;
font-size:45px;
animation-duration:10s;
animation-delay:8s;
}


/* =========================================
FLOAT FROM BOTTOM TO TOP
========================================= */

@keyframes floatUp
{
0%
{
transform:translateY(0) rotate(0deg);
opacity:0;
}

8%
{
opacity:.75;
}

25%
{
transform:translateY(-130px) rotate(8deg);
opacity:.8;
}

50%
{
transform:translateY(-280px) rotate(-8deg);
opacity:.75;
}

75%
{
transform:translateY(-430px) rotate(8deg);
opacity:.6;
}

92%
{
opacity:.3;
}

100%
{
transform:translateY(-620px) rotate(-5deg);
opacity:0;
}
}


</style>
</head>

<body>
<!-- header -->
<!-- header -->
<?php include('header.php')?>
<!-- header-end -->
<!-- header-end -->
<!-- main-area -->

<main>

<!-- sub-banner / breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Games</h2>

<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
Games
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
<!-- breadcrumb-area-end -->


<!-- blank middle area -->
<section class="games-start-section">

<!-- BACKGROUND FLOATING ELEMENTS -->
<div class="games-bg-float float-item item-1">🎈</div>
<div class="games-bg-float float-item item-2">⭐</div>
<div class="games-bg-float float-item item-3">🔢</div>
<div class="games-bg-float float-item item-4">🧮</div>
<div class="games-bg-float float-item item-5">🎈</div>
<div class="games-bg-float float-item item-6">✨</div>
<div class="games-bg-float float-item item-7">🔤</div>
<div class="games-bg-float float-item item-8">🧩</div>
<div class="games-bg-float float-item item-9">🎈</div>
<div class="games-bg-float float-item item-10">⭐</div>
<div class="games-bg-float float-item item-11">➕</div>
<div class="games-bg-float float-item item-12">🎨</div>
<div class="games-bg-float float-item item-13">🔢</div>
<div class="games-bg-float float-item item-14">🎈</div>

<div class="games-decoration games-left">

<div class="game-funky-img img-one">
<img src="images/pencil.gif" alt="">
</div>

<div class="game-funky-img img-two">
<img src="images/counting-numbers.gif" alt="">
</div>

<div class="game-funky-img img-three">
<img src="images/puzzle.jpg" alt="">
</div>

</div>


<div class="games-start-box">

<div class="games-game-icon">
<i class="fas fa-gamepad"></i>
</div>

<h3>Let's Play!</h3>

<p>Ready to have some fun?</p>

<a href="start-game.php" class="games-start-btn">
START <i class="fas fa-play"></i>
</a>

</div>


<div class="games-decoration games-right">

<div class="game-funky-img img-four">
<img src="images/abacus.gif" alt="">
</div>

<div class="game-funky-img img-five">
<img src="images/rocket.gif" alt="">
</div>

<div class="game-funky-img img-six">
<img src="images/numbers.jpg" alt="">
</div>

</div>

</section>

<!-- blank middle area-end -->

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
