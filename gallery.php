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
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
<h2>Gallery </h2>
<div class="breadcrumb-wrap">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Gallery </li>
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

<!-- Section Heading -->



<!-- Gallery Filter -->
<div class="gallery-filter">
<!-- Static 'All' button sob gulo image show korar jonno -->
<button class="filter-btn active" data-filter="all">
All
</button>

<?php
$sqlc = "SELECT * FROM `ab_image_category` ORDER BY `id` ASC";
$resc = query($conn,$sqlc); 
$numc = numrows($resc);

if ($numc > 0) {
while ($fetch = fetcharray($resc)) {
$categoryid =$fetch['id'];
$categoryname =$fetch['category']; 
?>

<!-- Dynamic Filter Button -->
<button class="filter-btn" data-filter="<?php echo $categoryid; ?>">
<?php echo $categoryname; ?>
</button>

<?php
} 
} 
?>
</div>


<!-- Gallery Grid -->
<div class="row kids-gallery">

<?php

$tname = 'ab_gallery_image';
$lim = 20;
$tpage = 'gallery.php';

$where = "WHERE `id` IN (SELECT MIN(`id`) FROM `ab_gallery_image` GROUP BY `category`) ORDER BY `id` ASC";


include('pagination-search.php');

$num = numrows($result);

if($num > 0)
{
while($fetch = fetcharray($result))
{
$category = $fetch['category'];
$categoryname = getCategoryimg($conn,$category);
$firstimage = getFirstImage($conn,$category,'image');
?>

<div class="col-lg-4 col-md-6 gallery-item <?php echo $category; ?>">

<div class="gallery-card">

<a href="gallery-category.php?category=<?php echo base64_encode($category); ?>"
style="color:#333333">

<img src="administrator/gallery/<?php echo $firstimage; ?>"
width="100%"
height="250px"
alt="<?php echo ucwords($categoryname); ?>">

<div class="gallery-overlay">
<div>
<h4><?php echo ucwords($categoryname); ?></h4>

<button class="zoom-btn"
onclick="event.preventDefault(); openLightbox('administrator/gallery/<?php echo $firstimage; ?>','<?php echo $categoryname; ?>')">
<i class="fas fa-search-plus"></i>
</button>

</div>
</div>

</a>

</div>

</div>

<?php
}
}
else
{
?>

<div class="col-md-12">
<div class="no-gallery-image">
<i class="fas fa-images"></i>
<h3>No Image Found</h3>
<p>This category has no gallery images yet.</p>
</div>
</div>

<?php
}
?>

<!-- Pagination -->
<div class="col-md-12">
<div align="center" style="margin-top:30px;">
<p align="center"><div><?=$pagination?></div></p>
</div>
</div>


</div>

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
padding: 90px 0;
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

.lightbox-prev,
.lightbox-next {
    display: flex !important;
    align-items: center;
    justify-content: center;
    width: 52px;
    height: 52px;
    min-width: 52px;
    flex-shrink: 0;
    border: 2px solid #fff;
    border-radius: 50%;
    background: #f7941d;
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    position: relative;
    z-index: 1000000;
    opacity: 1 !important;
    visibility: visible !important;
    transition: all .3s ease;
}

.lightbox-prev:hover,
.lightbox-next:hover {
    background: #fff;
    color: #f7941d;
    transform: scale(1.1);
}


/* Responsive */

@media(max-width: 991px) {

.kids-gallery-section {
padding: 70px 0;
}

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

.no-gallery-image
{
text-align:center;
padding:70px 20px;
margin:20px 0 40px;
background:#fff8f0;
border:2px dashed #f7941d;
border-radius:18px;
}

.no-gallery-image i
{
font-size:55px;
color:#f7941d;
margin-bottom:15px;
}

.no-gallery-image h3
{
font-size:25px;
color:#333;
margin-bottom:8px;
}

.no-gallery-image p
{
color:#777;
margin:0;
font-size:15px;
}

</style>


<!-- ================= JAVASCRIPT ================= -->
<script>

let currentImageIndex = 0;

let galleryImages = [];


/* Open Lightbox */

function openLightbox(image, title) {
    galleryImages = [];

    document.querySelectorAll('.gallery-card a[href]').forEach(function(link) {
        var img = link.querySelector('img');

        if (img) {
            galleryImages.push({
                image: img.getAttribute('src'),
                title: link.querySelector('.gallery-overlay h4')
                    ? link.querySelector('.gallery-overlay h4').innerText
                    : ''
            });
        }
    });

    currentImageIndex = galleryImages.findIndex(function(item) {
        return item.image === image;
    });

    if (currentImageIndex === -1) {
        galleryImages.push({
            image: image,
            title: title
        });
        currentImageIndex = galleryImages.length - 1;
    }

    showImage();

    document.getElementById('galleryLightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}



/* Close Lightbox */

function closeLightbox() {

document.getElementById("galleryLightbox")
.classList.remove("active");

document.body.style.overflow = "auto";
}


/* Next */

function nextImage() {
    if (galleryImages.length === 0) return;

    currentImageIndex++;

    if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    }

    showImage();
}

function previousImage() {
    if (galleryImages.length === 0) return;

    currentImageIndex--;

    if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    }

    showImage();
}


/* Show Image */

function showImage() {
    var item = galleryImages[currentImageIndex];

    if (!item) return;

    document.getElementById('lightboxImage').src = item.image;
    document.getElementById('lightboxCaption').innerText = item.title;
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
<script>

document.querySelectorAll('.filter-btn').forEach(function(button)
{
button.addEventListener('click', function()
{
var filter = this.getAttribute('data-filter');

document.querySelectorAll('.filter-btn').forEach(function(btn)
{
btn.classList.remove('active');
});

this.classList.add('active');

document.querySelectorAll('.gallery-item').forEach(function(item)
{
if(filter == 'all')
{
item.style.display = '';
}
else
{
if(item.classList.contains(filter))
{
item.style.display = '';
}
else
{
item.style.display = 'none';
}
}
});
});
});

</script>
</body>

</html>
