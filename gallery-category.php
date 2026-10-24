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
<h2>Gallery Category</h2>
<div class="breadcrumb-wrap">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item"><a href="gallery.php">Gallery</a></li>
<li class="breadcrumb-item active" aria-current="page">Gallery Category</li>
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

<main>

<!-- breadcrumb-area -->

<!-- breadcrumb-area-end -->


<!-- Kids Gallery -->
<section class="kids-gallery-section">
<div class="container">

<div align="center" style="padding:50px; padding-bottom:0px;">
<h1 style="letter-spacing:3px; font-size:25px;">
Title- <strong><?=ucwords(getCategoryimg($conn,base64_decode($_REQUEST['category'])))?></strong>
</h1>

<p align="center" style="width:12%; border-top:2px solid #000000; margin-bottom:0;">&nbsp;

</p>
</div>


<!-- Gallery Style -->
<style>

.kids-gallery-grid
{
    padding-top:30px;
    padding-bottom:30px;
}

.kids-gallery-card
{
    position:relative;
    width:100%;
    height:250px;
    margin-bottom:30px;
    border-radius:18px;
    overflow:hidden;
    background:#ffffff;
    border:5px solid #ffffff;
    box-shadow:0 8px 25px rgba(0,0,0,0.12);
    transition:all 0.4s ease;
}

.kids-gallery-card:hover
{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,0.20);
}

.kids-gallery-card img
{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:transform 0.5s ease;
}

.kids-gallery-card:hover img
{
    transform:scale(1.08);
}

.kids-gallery-overlay
{
    position:absolute;
    left:0;
    right:0;
    bottom:0;
    top:0;

    display:flex;
    align-items:flex-end;
    justify-content:center;

    padding:20px;

    background:linear-gradient(
        to top,
        rgba(0,0,0,0.75),
        rgba(0,0,0,0.20),
        transparent
    );

    opacity:0;
    transition:all 0.4s ease;
}

.kids-gallery-card:hover .kids-gallery-overlay
{
    opacity:1;
}

.kids-gallery-overlay-content
{
    text-align:center;
    transform:translateY(20px);
    transition:all 0.4s ease;
}

.kids-gallery-card:hover .kids-gallery-overlay-content
{
    transform:translateY(0);
}

.kids-gallery-overlay h4
{
    color:#ffffff;
    font-size:20px;
    font-weight:bold;
    margin:0 0 10px 0;
    letter-spacing:1px;
}

.kids-gallery-zoom
{
    width:42px;
    height:42px;
    border:none;
    border-radius:50%;
    background:#ffffff;
    color:#ff6b6b;
    font-size:16px;
    cursor:pointer;
    transition:all 0.3s ease;
}

.kids-gallery-zoom:hover
{
    background:#ff6b6b;
    color:#ffffff;
    transform:scale(1.1);
}

@media(max-width:767px)
{
    .kids-gallery-card
    {
        height:230px;
        margin-bottom:20px;
    }
}


/* Lightbox visibility */
.gallery-lightbox.active {
    display: flex !important;
    z-index: 999999;
}

/* Close button */
.gallery-lightbox .lightbox-close {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 25px;
    right: 30px;
    width: 48px;
    height: 48px;
    padding: 0;
    border: none;
    border-radius: 50%;
    background: #ffffff;
    color: #222222;
    font-size: 22px;
    cursor: pointer;
    z-index: 1000001;
}

/* Previous and Next buttons */
.gallery-lightbox .lightbox-prev,
.gallery-lightbox .lightbox-next {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 52px;
    height: 52px;
    min-width: 52px;
    padding: 0;
    flex-shrink: 0;
    border: 2px solid rgba(255,255,255,0.6);
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
    z-index: 1000000;
}

.gallery-lightbox .lightbox-close:hover {
    background: #f7941d;
    color: #ffffff;
}

.gallery-lightbox .lightbox-prev:hover,
.gallery-lightbox .lightbox-next:hover {
    background: #f7941d;
    border-color: #f7941d;
}

@media(max-width:767px) {
    .gallery-lightbox {
        padding: 10px;
    }

    .gallery-lightbox .lightbox-prev,
    .gallery-lightbox .lightbox-next {
        width: 38px;
        height: 38px;
        min-width: 38px;
        font-size: 14px;
    }

    .gallery-lightbox .lightbox-close {
        top: 12px;
        right: 12px;
        width: 40px;
        height: 40px;
    }
}


</style>

<?php
$galleryImages = array();
?>
<!-- Gallery Grid -->
<?php
$galleryImages[] = array(
    'image' => 'administrator/gallery/'.$fetch['image'],
    'title' => 'Gallery Image'
);
?>
<section class="ftco-section ftco-gallery">
<div class="container">

<div class="row kids-gallery-grid">


<?php
$tname='ab_gallery_image';
$lim=9;
$tpage='gallery-category.php';

$where="WHERE `category`='".mysqli_real_escape_string($conn,trim(base64_decode($_REQUEST['category'])))."' ORDER BY `id`";

include('pagination-search.php');

$num=numrows($result);
$i=1;

$galleryImages = array();

if($num>0)
{
    while($fetch=fetcharray($result))
    {
        $imageIndex = count($galleryImages);

        $galleryImages[] = array(
            'image' => 'administrator/gallery/'.$fetch['image'],
            'title' => 'Gallery Image'
        );
?>

<div class="col-lg-4 col-md-6 col-12">
    <div class="kids-gallery-card">

        <a href="administrator/gallery/<?=htmlspecialchars($fetch['image'], ENT_QUOTES)?>"
           class="gallery-link"
           onclick="openLightbox(<?=$imageIndex?>); return false;"
           style="display:block; width:100%; height:100%;">

            <img src="administrator/gallery/<?=htmlspecialchars($fetch['image'], ENT_QUOTES)?>"
                 alt="Gallery Image"
                 style="width:100%; height:100%; object-fit:cover;">

        </a>

    </div>
</div>

<?php
    }
}
?>


</div>


<!-- Pagination -->
<div class="row">

<div class="col-md-12" align="center">

<div style="padding:20px 0;">
<?=$pagination?>
</div>

</div>

</div>


</div>
</section>

</div>
</section>
<!-- Kids Gallery End -->


<!-- Lightbox -->
<div id="galleryLightbox" class="gallery-lightbox">

<button class="lightbox-close" onClick="closeLightbox()">
<i class="fas fa-times"></i>
</button>

<div class="lightbox-content">

<button class="lightbox-prev" onClick="previousImage()">
<i class="fas fa-chevron-left"></i>
</button>

<div class="lightbox-image-wrapper">
<img id="lightboxImage" src="" alt="">
<div id="lightboxCaption"></div>
</div>

<button class="lightbox-next" onClick="nextImage()">
<i class="fas fa-chevron-right"></i>
</button>

</div>
</div>





<!-- ================= CSS ================= -->
<style>

.kids-gallery-section {
background: #ffffff;
}

/* Heading */

.gallery-heading {
max-width: 750px;
margin: 0 auto 45px;
}

.gallery-heading span {
display: inline-block;
font-size: 15px;
font-weight: 600;
color: #f7941d;
text-transform: uppercase;
letter-spacing: 1.5px;
margin-bottom: 10px;
}

.gallery-heading h2 {
font-size: 42px;
line-height: 1.2;
margin-bottom: 15px;
font-weight: 700;
color: #17233c;
}

.gallery-heading h2 strong {
color: #f7941d;
}

.gallery-heading p {
font-size: 16px;
line-height: 1.8;
color: #777;
margin: 0;
}


/* Filter */

.gallery-filter {
text-align: center;
margin-bottom: 40px;
}

.filter-btn {
border: 0;
background: #f5f6f8;
color: #333;
padding: 11px 24px;
margin: 5px;
border-radius: 30px;
font-size: 15px;
font-weight: 600;
cursor: pointer;
transition: all .3s ease;
}

.filter-btn:hover,
.filter-btn.active {
background: #f7941d;
color: #fff;
box-shadow: 0 8px 20px rgba(247,148,29,.25);
}


/* Gallery */

.kids-gallery {
margin-left: -12px;
margin-right: -12px;
}

.gallery-item {
padding: 12px;
transition: all .4s ease;
}

.gallery-card {
position: relative;
overflow: hidden;
border-radius: 16px;
background: #fff;
box-shadow: 0 8px 30px rgba(0,0,0,.10);
height: 310px;
}

.gallery-card img {
width: 100%;
height: 100%;
object-fit: cover;
display: block;
transition: transform .6s ease;
}

.gallery-card:hover img {
transform: scale(1.10);
}


/* Overlay */

.gallery-overlay {
position: absolute;
inset: 0;
display: flex;
justify-content: center;
align-items: flex-end;
text-align: center;
padding: 25px;

background: linear-gradient(
to top,
rgba(0,0,0,.75),
rgba(0,0,0,.05)
);

opacity: 0;
transition: all .4s ease;
}

.gallery-card:hover .gallery-overlay {
opacity: 1;
}

.gallery-overlay h4 {
color: #fff;
font-size: 20px;
font-weight: 600;
margin-bottom: 12px;
}


/* Zoom Button */

.zoom-btn {
width: 48px;
height: 48px;
border-radius: 50%;
border: 0;
background: #f7941d;
color: #fff;
font-size: 17px;
cursor: pointer;
transition: all .3s ease;
}

.zoom-btn:hover {
background: #fff;
color: #f7941d;
transform: scale(1.12);
}


/* Lightbox */

.gallery-lightbox {
position: fixed;
inset: 0;
background: rgba(0,0,0,.93);
z-index: 999999;
display: none;
align-items: center;
justify-content: center;
padding: 30px;
}

.gallery-lightbox.active {
display: flex;
}

.lightbox-content {
width: 100%;
max-width: 1200px;
height: 100%;
display: flex;
align-items: center;
justify-content: center;
gap: 25px;
}

.lightbox-image-wrapper {
max-width: 900px;
max-height: 90vh;
text-align: center;
}

.lightbox-image-wrapper img {
max-width: 100%;
max-height: 82vh;
width: auto;
height: auto;
object-fit: contain;
border-radius: 8px;
box-shadow: 0 10px 50px rgba(0,0,0,.5);
}

#lightboxCaption {
color: #fff;
font-size: 17px;
font-weight: 600;
margin-top: 15px;
}


/* Lightbox Buttons */

.lightbox-close {
position: absolute;
top: 25px;
right: 30px;
width: 48px;
height: 48px;
border: 0;
border-radius: 50%;
background: #fff;
color: #222;
font-size: 20px;
cursor: pointer;
z-index: 10;
}

```css
.lightbox-prev,
.lightbox-next
{
    width:52px;
    height:52px;
    min-width:52px;
    flex-shrink:0;
    border-radius:50%;
    border:2px solid rgba(255,255,255,0.5);
    background:rgba(255,255,255,0.15);
    color:#ffffff;
    font-size:20px;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:all 0.3s ease;
}

.lightbox-prev:hover,
.lightbox-next:hover
{
    background:#f7941d;
    border-color:#f7941d;
    transform:scale(1.1);
}

@media(max-width:767px)
{
    .lightbox-content
    {
        gap:8px;
    }

    .lightbox-prev,
    .lightbox-next
    {
        width:38px;
        height:38px;
        min-width:38px;
        font-size:14px;
    }
}
```


.gallery-heading h2 {
font-size: 36px;
}

.gallery-card {
height: 280px;
}

}

@media(max-width: 767px) {

.kids-gallery-section {
padding: 55px 0;
}

.gallery-heading h2 {
font-size: 30px;
}

.gallery-heading p {
font-size: 15px;
}

.gallery-filter {
margin-bottom: 25px;
}

.filter-btn {
padding: 9px 17px;
font-size: 14px;
}

.gallery-card {
height: 280px;
}

.lightbox-content {
gap: 8px;
}

.lightbox-prev,
.lightbox-next {
width: 42px;
height: 42px;
min-width: 42px;
font-size: 16px;
}

.lightbox-close {
top: 15px;
right: 15px;
}

}

@media(max-width: 480px) {

.gallery-card {
height: 250px;
}

.lightbox-image-wrapper {
max-width: calc(100% - 80px);
}

.lightbox-image-wrapper img {
max-height: 75vh;
}

}

</style>


<!-- ================= JAVASCRIPT ================= -->
<script>

let currentImageIndex = 0;

let galleryImages = <?=json_encode($galleryImages)?>;


/* Open Lightbox */

function openLightbox(index) 
{ 
currentImageIndex = index; 
showImage(); 
document.getElementById("galleryLightbox") .classList.add("active"); 
document.body.style.overflow = "hidden"; 
}

function showImage() 
{ 
if (galleryImages.length === 0) 
{ 
return; 
} 
document.getElementById("lightboxImage").src = galleryImages[currentImageIndex].image; 
document.getElementById("lightboxCaption").textContent = galleryImages[currentImageIndex].title; 
}



/* Next */

function nextImage() {

currentImageIndex++;

if (currentImageIndex >= galleryImages.length) {
currentImageIndex = 0;
}

showImage();
}


/* Previous */

function previousImage() {

currentImageIndex--;

if (currentImageIndex < 0) {
currentImageIndex = galleryImages.length - 1;
}

showImage();
}

/* Close Lightbox */ 
function closeLightbox() 
{ 
document.getElementById("galleryLightbox") .classList.remove("active"); 
document.body.style.overflow = ""; 
}


/* Keyboard Controls */

document.addEventListener("keydown", function(e) {

const lightbox = document.getElementById("galleryLightbox");

if (!lightbox.classList.contains("active")) {
return;
}

if (e.key === "Escape") {
closeLightbox();
}

if (e.key === "ArrowRight") {
nextImage();
}

if (e.key === "ArrowLeft") {
previousImage();
}

});


/* Click Outside Image */

document.getElementById("galleryLightbox")
.addEventListener("click", function(e) {

if (e.target === this) {
closeLightbox();
}

});


/* Gallery Filter */

document.querySelectorAll(".filter-btn")
.forEach(function(button) {

button.addEventListener("click", function() {

document.querySelectorAll(".filter-btn")
.forEach(function(btn) {
btn.classList.remove("active");
});

this.classList.add("active");

const filter = this.getAttribute("data-filter");

document.querySelectorAll(".gallery-item")
.forEach(function(item) {

if (
filter === "all" ||
item.classList.contains(filter)
) {

item.style.display = "";

setTimeout(function() {
item.style.opacity = "1";
item.style.transform = "scale(1)";
}, 20);

} else {

item.style.opacity = "0";
item.style.transform = "scale(.8)";

setTimeout(function() {
item.style.display = "none";
}, 300);

}

});

});

});

</script>


<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- brand-area-end -->
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
