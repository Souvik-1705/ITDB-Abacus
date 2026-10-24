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
<script>
function hidePopup() {
document.getElementById('overlay').style.display = 'none';
}
</script>
<style>
.overlay {

position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
z-index: 999;
}

.popup_recharge {
position: absolute;
width:280px;;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: #fff;
padding: 20px;
border-radius: 8px;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
text-align: center;
}

.popup_recharge h2 {
margin-bottom: 10px;
color: #333;
}

.popup_recharge p {
color: #666;
margin-bottom: 20px;
}

.popup_recharge button {
padding: 8px 16px;
background-color: #4CAF50;
color: white;
border: none;
border-radius: 4px;
cursor: pointer;
}

.popup_recharge button:hover {
background-color: #45a049;
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

<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12 col-lg-12">
<div class="breadcrumb-wrap text-left">
<div class="breadcrumb-title">
<h2>Contact Us</h2>
<div class="breadcrumb-wrap">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
<!-- contact-area -->
<section id="contact" class="contact-area after-none contact-bg pt-90 pb-30" style="background: #12275e;">

<div class="container">

<div class="row">
<div class="col-lg-12">
<div class="contact-info">
<div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
<div class="f-cta-icon">
</div>
<h5>Office Address</h5>
<p><p><span class= "contact" ><?= getContact($conn,'addline1')?><br><?=getContact($conn,'addline2')?>
</span></p></p>
</div>
<div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
<div class="f-cta-icon">
</div>
<h5>Phone Number</h5>
<p><p><span class= "contact" ><?= getContact($conn,'phone1')?><br><?=getContact($conn,'phone2')?>
</span></p></p></p>
</div>
<div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
<div class="f-cta-icon">
</div>
<h5>Message Us</h5>
<p><p><span class= "contact" ><?= getContact($conn,'email1')?><br><?=getContact($conn,'email2')?>
</span></p></p>
</div>
</div>
</div>
</div>

</div>
<div class="row">
 <?php if (isset($_REQUEST['m']) && $_REQUEST['m'] == 1) { ?>
<div class="mb-3">
<?= getFailedSuccessHtml('Success', 'Message Sent Successfully!', 'success') ?>
</div>
<?php } ?>
</section>
<!-- contact-area-end -->
<!-- map-area-end -->

<!-- map-area-end -->
<!-- contact-area -->
<section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix" style="background: #f8f9fe;">
<div class="animations-12"><img src="img/bg/slider_shape03.png" alt="an-img-01"></div>
<div class="animations-13"><img src="img/bg/an-img-12.png" alt="contact-bg-an-01"></div>
<div class="animations-14"><img src="img/bg/slider_shape02.png" alt="contact-bg-an-01"></div>
<div class="animations-15"><img src="img/bg/an-img-13.png" alt="contact-bg-an-01"></div>
<div class="container">

<div class="row">

<div class="col-lg-6 order-1">
<img src="img/bg/contact-img.png" alt="img">
</div>
<div class="col-lg-6 order-2">
<div class="contact-bg02 wow fadeInLeft  animated">
<div class="section-title center-align">
<h5>Contact Us</h5>
<h2>
Join Our Best Fun Classes
</h2>

</div>

<form action="contact-process.php" method="post" class="contact-form mt-35">
<input type="hidden" name="csrf_token" value="8dcf5a794e6e0a62ce752e21ff7c547d65f63cf614d1a34797ed388c003a9eed">

<div class="row">
<div class="col-lg-12">
<div class="contact-field p-relative c-name mb-30">
<input type="text" id="name" name="name" placeholder="Full Name" required>
</div>
</div>
<div class="col-lg-12">
<div class="contact-field p-relative c-subject mb-30">
<input type="email" id="email" name="email" placeholder="Email Address" required>
</div>
</div>
<div class="col-lg-12">
<div class="contact-field p-relative c-subject mb-30">
<input type="text" id="phone" name="phone" placeholder="Phone No." required>
</div>
</div>
<div class="col-lg-12">
<div class="contact-field p-relative c-message mb-30">
<textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments" required></textarea>
</div>
<div class="slider-btn">
<button type="submit" class="btn ss-btn active" data-animation="fadeInRight" data-delay=".8s">Submit Now</button>
</div>
</div>
</div>
</form>

</div>

</div>
</div>

</div>

</section>
<!-- contact-area-end -->


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
