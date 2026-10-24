<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('../index.php');
}
checkFranchiseStatus($conn);

$pageid=19;
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
#dashright{
    font-family:Arial, Helvetica, sans-serif !important;
}

/* =========================================
   DASHBOARD DECORATIVE SHAPES
========================================= */

.dashboard-shape {
    position: absolute;
    pointer-events: none;
    z-index: 1;
    animation: dashboardFloatZoom 4s ease-in-out infinite;
}

/* Floating + Zoom In/Out */

@keyframes dashboardFloatZoom {

    0%, 100% {
        transform: translateY(0) rotate(0deg) scale(0.75);
        opacity: 0.60;
    }

    50% {
        transform: translateY(-18px) rotate(10deg) scale(1.25);
        opacity: 1;
    }

}

/* =========================================
   SHAPE POSITIONS
========================================= */

.dashboard-shape-one {
    top: 5%;
    left: 3%;
    font-size: 42px;
    color: #ffb703;
}

.dashboard-shape-two {
    top: 8%;
    right: 4%;
    font-size: 50px;
    color: #ff6b9a;
    animation-delay: .5s;
}

.dashboard-shape-three {
    top: 18%;
    left: 7%;
    font-size: 22px;
    color: #4cc9f0;
    animation-delay: 1s;
}

.dashboard-shape-four {
    top: 20%;
    right: 8%;
    font-size: 35px;
    color: #ff7b54;
    animation-delay: 1.5s;
}

.dashboard-shape-five {
    top: 30%;
    left: 2%;
    font-size: 30px;
    color: #ff6b6b;
    animation-delay: .8s;
}

.dashboard-shape-six {
    top: 32%;
    right: 3%;
    font-size: 45px;
    color: #ffb703;
    animation-delay: 1.2s;
}

.dashboard-shape-seven {
    top: 42%;
    left: 6%;
    font-size: 25px;
    color: #ff6b9a;
    animation-delay: 1.8s;
}

.dashboard-shape-eight {
    top: 45%;
    right: 7%;
    font-size: 20px;
    color: #4cc9f0;
    animation-delay: 2s;
}

.dashboard-shape-nine {
    top: 55%;
    left: 2%;
    font-size: 40px;
    color: #ffb703;
    animation-delay: .4s;
}

.dashboard-shape-ten {
    top: 58%;
    right: 4%;
    font-size: 28px;
    color: #ff7b54;
    animation-delay: 1.6s;
}

.dashboard-shape-eleven {
    top: 68%;
    left: 7%;
    font-size: 18px;
    color: #4cc9f0;
    animation-delay: 2.2s;
}

.dashboard-shape-twelve {
    top: 70%;
    right: 8%;
    font-size: 38px;
    color: #ff6b9a;
    animation-delay: 1.1s;
}

.dashboard-shape-thirteen {
    top: 80%;
    left: 3%;
    font-size: 32px;
    color: #ffb703;
    animation-delay: 1.3s;
}

.dashboard-shape-fourteen {
    top: 82%;
    right: 3%;
    font-size: 22px;
    color: #ff6b6b;
    animation-delay: 2s;
}

.dashboard-shape-fifteen {
    top: 92%;
    left: 10%;
    font-size: 25px;
    color: #ff7b54;
    animation-delay: 2.4s;
}

.dashboard-shape-sixteen {
    top: 90%;
    right: 12%;
    font-size: 35px;
    color: #ffb703;
    animation-delay: .9s;
}

.dashboard-shape-seventeen {
    top: 12%;
    left: 20%;
    font-size: 17px;
    color: #4cc9f0;
    animation-delay: 1.7s;
}

.dashboard-shape-eighteen {
    top: 15%;
    right: 20%;
    font-size: 25px;
    color: #ff6b9a;
    animation-delay: 2.5s;
}

.dashboard-shape-nineteen {
    top: 50%;
    left: 15%;
    font-size: 18px;
    color: #ffb703;
    animation-delay: .7s;
}

.dashboard-shape-twenty {
    top: 52%;
    right: 15%;
    font-size: 25px;
    color: #4cc9f0;
    animation-delay: 1.4s;
}

/* Mobile hide */

@media(max-width:767px){

    .dashboard-shape {
        display:none;
    }

}
/* =========================================================
   KIDS PORTAL ADMIN DASHBOARD
   ========================================================= */

:root {

    --kids-blue: #4dabf7;
    --kids-blue-dark: #1976d2;

    --kids-green: #69db7c;
    --kids-green-dark: #2f9e44;

    --kids-purple: #9775fa;
    --kids-purple-dark: #7048e8;

    --kids-orange: #ff922b;
    --kids-orange-dark: #f76707;

    --kids-pink: #f783ac;
    --kids-pink-dark: #e64980;

    --kids-yellow: #ffd43b;
    --kids-yellow-dark: #f08c00;

    --kids-cyan: #3bc9db;

    --kids-bg: #f4f9ff;

    --kids-text: #263238;
}


/* =========================================================
   DASHBOARD BACKGROUND
   ========================================================= */

#dashADIV.kids-dashboard {

    position: relative;

    width: 100%;

    padding: 25px 20px 40px;

    min-height: auto;

    background:

        radial-gradient(
            circle at 5% 10%,
            rgba(255,212,59,.25) 0 45px,
            transparent 46px
        ),

        radial-gradient(
            circle at 95% 20%,
            rgba(151,117,250,.18) 0 60px,
            transparent 61px
        ),

        radial-gradient(
            circle at 80% 90%,
            rgba(105,219,124,.18) 0 70px,
            transparent 71px
        ),

        linear-gradient(
            135deg,
            #f8fbff,
            #eef8ff
        );

}


/* =========================================================
   DASHBOARD ROW
   ========================================================= */

.kids-dashboard-row {

    display: flex;

    flex-wrap: wrap;

    margin-left: -10px;
    margin-right: -10px;

}


/* =========================================================
   CARD COLUMN
   ========================================================= */

.kids-card-col {

    padding-left: 10px !important;
    padding-right: 10px !important;

    margin-bottom: 20px;

}


/* =========================================================
   DASHBOARD CARD
   ========================================================= */

.kids-dashboard-card {

    position: relative;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    width: 100%;

    min-height: auto;

    padding: 22px 15px;

    overflow: hidden;

    text-decoration: none !important;

    border-radius: 25px;

    background: #fff;

    box-shadow:
        0 8px 25px rgba(42,93,140,.10);

    border: 3px solid rgba(255,255,255,.8);

    transition:
        transform .3s ease,
        box-shadow .3s ease;

}


/* =========================================================
   HOVER
   ========================================================= */

.kids-dashboard-card:hover {

    text-decoration: none !important;

    transform:
        translateY(-8px)
        rotate(-1deg);

    box-shadow:
        0 18px 35px rgba(42,93,140,.20);

}


/* =========================================================
   CARD ICON
   ========================================================= */

.kids-card-icon {

    width: 68px;
    height: 68px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background: #fff;

    box-shadow:
        0 6px 15px rgba(0,0,0,.12);

    margin-bottom: 12px;

    transition:
        transform .3s ease;

    z-index: 2;

}


.kids-card-icon img {

    width: 43px;
    height: 43px;

    object-fit: contain;

    border-radius: 50%;

}


.kids-dashboard-card:hover .kids-card-icon {

    transform:
        scale(1.12)
        rotate(8deg);

}


/* =========================================================
   CARD TITLE
   ========================================================= */

.kids-card-title {

    position: relative;

    z-index: 2;

    color: var(--kids-text);

    font-size: 15px;


    font-weight: 600;

    text-align: center;

    line-height: 20px;

}


.kids-dashboard-card:hover .kids-card-title {

    color: #1976d2;

}


/* =========================================================
   DECORATION
   ========================================================= */

.kids-card-decoration {

    position: absolute;

    right: 12px;
    bottom: 8px;

    font-size: 22px;

    opacity: .30;

    transition: .3s ease;

}


.kids-dashboard-card:hover .kids-card-decoration {

    opacity: .8;

    transform:
        rotate(15deg)
        scale(1.2);

}


/* =========================================================
   CARD COLORS
   ========================================================= */


/* Blue */

.card-blue {

    background:
        linear-gradient(
            135deg,
            #e7f5ff 0%,
            #d0ebff 100%
        );

    border-color: #a5d8ff;

}


.card-blue .kids-card-icon {

    background: #fff;

    border: 5px solid #74c0fc;

}


/* Green */

.card-green {

    background:
        linear-gradient(
            135deg,
            #ebfbee 0%,
            #d3f9d8 100%
        );

    border-color: #8ce99a;

}


.card-green .kids-card-icon {

    background: #fff;

    border: 5px solid #69db7c;

}


/* Purple */

.card-purple {

    background:
        linear-gradient(
            135deg,
            #f3f0ff 0%,
            #e5dbff 100%
        );

    border-color: #b197fc;

}


.card-purple .kids-card-icon {

    background: #fff;

    border: 5px solid #9775fa;

}


/* Orange */

.card-orange {

    background:
        linear-gradient(
            135deg,
            #fff4e6 0%,
            #ffe8cc 100%
        );

    border-color: #ffc078;

}


.card-orange .kids-card-icon {

    background: #fff;

    border: 5px solid #ff922b;

}


/* Pink */

.card-pink {

    background:
        linear-gradient(
            135deg,
            #fff0f6 0%,
            #ffdeeb 100%
        );

    border-color: #faa2c1;

}


.card-pink .kids-card-icon {

    background: #fff;

    border: 5px solid #f783ac;

}


/* Yellow */

.card-yellow {

    background:
        linear-gradient(
            135deg,
            #fff9db 0%,
            #fff3bf 100%
        );

    border-color: #ffe066;

}


.card-yellow .kids-card-icon {

    background: #fff;

    border: 5px solid #ffd43b;

}


/* Cyan */

.card-cyan {

    background:
        linear-gradient(
            135deg,
            #e3fafc 0%,
            #c5f6fa 100%
        );

    border-color: #66d9e8;

}


.card-cyan .kids-card-icon {

    background: #fff;

    border: 5px solid #3bc9db;

}


/* =========================================================
   COLORFUL TOP LINE
   ========================================================= */

.kids-dashboard-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 6px;

}


/* Different top colors */

.card-blue::before {
    background: #339af0;
}

.card-green::before {
    background: #40c057;
}

.card-purple::before {
    background: #845ef7;
}

.card-orange::before {
    background: #fd7e14;
}

.card-pink::before {
    background: #f06595;
}

.card-yellow::before {
    background: #fcc419;
}

.card-cyan::before {
    background: #15aabf;
}


/* =========================================================
   PLAYFUL BACKGROUND CIRCLE
   ========================================================= */

.kids-dashboard-card::after {

    content: "";

    position: absolute;

    width: 90px;
    height: 90px;

    right: -35px;
    top: -35px;

    border-radius: 50%;

    background: rgba(255,255,255,.45);

    transition: .4s ease;

}


.kids-dashboard-card:hover::after {

    width: 140px;
    height: 140px;

}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 1200px) {

    .kids-card-col {

        margin-bottom: 18px;

    }

}


@media (max-width: 768px) {

    #dashADIV.kids-dashboard {

        padding: 15px 10px 30px;

    }


    .kids-dashboard-row {

        margin-left: -7px;
        margin-right: -7px;

    }


    .kids-card-col {

        padding-left: 7px !important;
        padding-right: 7px !important;

        margin-bottom: 14px;

    }


    .kids-dashboard-card {

        min-height: 140px;

        padding: 18px 10px;

        border-radius: 20px;

    }


    .kids-card-icon {

        width: 58px;
        height: 58px;

        border-radius: 18px;

    }


    .kids-card-icon img {

        width: 37px;
        height: 37px;

    }


    .kids-card-title {

        font-size: 13px;

        line-height: 18px;

    }

}


@media (max-width: 480px) {

    .kids-card-col {

        width: 50%;

    }


    .kids-dashboard-card {

        min-height: 135px;

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

<main style="overflow:hidden;">

<!-- sub-banner / breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Dashboard</h2>

<div class="breadcrumb-wrap">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="../index.php">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
Dashboard
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

<!-- Relative Wrapper to anchor shapes directly below sub-banner -->
<div style="position: relative;">

<!-- Dashboard Decorative Shapes -->

<div class="dashboard-shape dashboard-shape-one">★</div>
<div class="dashboard-shape dashboard-shape-two">✦</div>
<div class="dashboard-shape dashboard-shape-three">●</div>
<div class="dashboard-shape dashboard-shape-four">♥</div>

<div class="dashboard-shape dashboard-shape-five">★</div>
<div class="dashboard-shape dashboard-shape-six">✦</div>
<div class="dashboard-shape dashboard-shape-seven">♥</div>
<div class="dashboard-shape dashboard-shape-eight">●</div>

<div class="dashboard-shape dashboard-shape-nine">★</div>
<div class="dashboard-shape dashboard-shape-ten">✦</div>
<div class="dashboard-shape dashboard-shape-eleven">●</div>
<div class="dashboard-shape dashboard-shape-twelve">♥</div>

<div class="dashboard-shape dashboard-shape-thirteen">★</div>
<div class="dashboard-shape dashboard-shape-fourteen">✦</div>
<div class="dashboard-shape dashboard-shape-fifteen">♥</div>
<div class="dashboard-shape dashboard-shape-sixteen">●</div>

<div class="dashboard-shape dashboard-shape-seventeen">★</div>
<div class="dashboard-shape dashboard-shape-eighteen">✦</div>
<div class="dashboard-shape dashboard-shape-nineteen">●</div>
<div class="dashboard-shape dashboard-shape-twenty">♥</div>

<!-- breadcrumb-area-end -->


<!-- blank middle area -->
<!-- Dashboard Area Start -->

<section style="padding:30px 0; background:#fff;">
<div class="container">
<div class="row">

<?php include('aside.php'); ?>

<div class="col-md-9" id="dashright" style="padding:20px; background-image:radial-gradient(circle, #ffffff, #f5f9ff, #eaf4ff, #e4f1ff); border-radius:16px;">

<?php include('inner-header.php'); ?>

<div id="dashADIV" class="kids-dashboard">

    <div class="row kids-dashboard-row">


        <!-- My Profile -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="profile.php" class="kids-dashboard-card card-blue">

                <div class="kids-card-icon">
                    <img src="images/profile.jpg">
                </div>

                <div class="kids-card-title">
                    My Profile
                </div>

                <div class="kids-card-decoration">★</div>

            </a>

        </div>


        <!-- Change Password -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="password.php" class="kids-dashboard-card card-green">

                <div class="kids-card-icon">
                    <img src="images/password-password-icon-png-green.png">
                </div>

                <div class="kids-card-title">
                    Change Password
                </div>

                <div class="kids-card-decoration">🔐</div>

            </a>

        </div>


        <!-- Student Admission -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="student-admission.php" class="kids-dashboard-card card-purple">

                <div class="kids-card-icon">
                    <img src="images/team-01.png">
                </div>

                <div class="kids-card-title">
                    Student Admission
                </div>

                <div class="kids-card-decoration">✏️</div>

            </a>

        </div>


        <!-- Applied Student -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="pending-student.php" class="kids-dashboard-card card-orange">

                <div class="kids-card-icon">
                    <img src="images/user_man_male.png">
                </div>

                <div class="kids-card-title">
                    Applied Student
                </div>

                <div class="kids-card-decoration">📚</div>

            </a>

        </div>


        <!-- Accepted Student -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="approve-student.php" class="kids-dashboard-card card-green">

                <div class="kids-card-icon">
                    <img src="images/approved-student.png">
                </div>

                <div class="kids-card-title">
                    Accepted Student
                </div>

                <div class="kids-card-decoration">✓</div>

            </a>

        </div>


        <!-- Registered Student -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="registered-student.php" class="kids-dashboard-card card-blue">

                <div class="kids-card-icon">
                    <img src="images/registered-student.png">
                </div>

                <div class="kids-card-title">
                    Registered Student
                </div>

                <div class="kids-card-decoration">🎓</div>

            </a>

        </div>


        <!-- Certified Student -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="certified-student.php" class="kids-dashboard-card card-pink">

                <div class="kids-card-icon">
                    <img src="images/certified-student.png">
                </div>

                <div class="kids-card-title">
                    Certified Student
                </div>

                <div class="kids-card-decoration">🏆</div>

            </a>

        </div>


        <!-- Payment Request -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="payment-request.php" class="kids-dashboard-card card-yellow">

                <div class="kids-card-icon">
                    <img src="images/icon-head-content.png">
                </div>

                <div class="kids-card-title">
                    Payment Request
                </div>

                <div class="kids-card-decoration">💰</div>

            </a>

        </div>


        <!-- Account Information -->
        <div class="col-md-3 col-sm-6 kids-card-col">

            <a href="account-information.php" class="kids-dashboard-card card-cyan">

                <div class="kids-card-icon">
                    <img src="images/account.png">
                </div>

                <div class="kids-card-title">
                    Account Information
                </div>

                <div class="kids-card-decoration">💳</div>

            </a>

        </div>


    </div>

</div>

</div>
</div>
</section>

<!-- Dashboard Area End -->
<!-- blank middle area-end -->

</div> <!-- End Relative Wrapper -->

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