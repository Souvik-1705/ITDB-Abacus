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
.games-heading-wrapper
{
width:100%;
max-width:1150px;

display:grid;
grid-template-columns:repeat(4,1fr);
gap:18px;

margin-bottom:8px;
}

.game-heading-item
{
text-align:center;
margin-bottom:8px;
}

.game-heading-item h3
{
margin:0 0 3px;
color:#023278;
font-size:18px;
font-weight:800;
}

.game-heading-item p
{
margin:0;
color:#52708f;
font-size:12px;
font-weight:600;
}
.games-area
{
position:relative;
min-height:400px;
padding:40px 20px;

background:linear-gradient(135deg,#e4f1ff 0%,#fff8e8 50%,#fff0f5 100%);

display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
overflow:hidden;
}

.games-area::before
{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;

    background-image:url('images/playground.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    opacity:0.20;
    z-index:0;
}

.games-area > *
{
    position:relative;
    z-index:1;
}

.games-box-wrapper
{
width:100%;
max-width:1150px;
display:grid;
grid-template-columns:repeat(4,1fr);
gap:25px 18px;
}
.game-item
{
width:100%;
}

/* MAIN BOX */

.game-option-box
{
position:relative;

width:100%;
height:138px;
min-height:139px;

padding:18px 12px;

border-radius:18px;
border:3px solid transparent;
box-sizing:border-box;
text-align:center;

box-shadow:0 8px 20px rgba(2,50,120,0.12);

cursor:default;

background-size:300% 300%;
animation:gameBoxGradient 8s ease infinite;

transition:all .3s ease;
}


/* DROPDOWN */

.game-select
{
width:190px;
max-width:100%;
height:44px;

margin:12px auto 0;
padding:0 38px 0 15px;

border:2px solid rgba(255,255,255,0.9);
border-radius:12px;

background-color:#fff;
color:#023278;

font-family:inherit;
font-size:14px;
font-weight:700;

text-align:center;

outline:none;
cursor:pointer;

appearance:none;
-webkit-appearance:none;
-moz-appearance:none;

box-shadow:0 5px 12px rgba(0,0,0,0.12);

/* Custom arrow */
background-image:
linear-gradient(45deg, transparent 50%, #0576de 50%),
linear-gradient(135deg, #0576de 50%, transparent 50%);

background-position:
calc(100% - 19px) 18px,
calc(100% - 13px) 18px;

background-size:
6px 6px,
6px 6px;

background-repeat:no-repeat;

transition:all .2s ease;
}


/* Hover */

.game-select:hover
{
border-color:#0576de;

box-shadow:
0 6px 15px rgba(2,50,120,0.18);

transform:none;
}


.game-select:focus
{
border-color:#0576de;

box-shadow:
0 0 0 3px rgba(5,118,222,0.15),
0 6px 15px rgba(2,50,120,0.18);
}

.game-select option
{
background:#fff;
color:#023278;

font-family:inherit;
font-size:14px;
font-weight:600;

padding:10px;
}

.game-select option:first-child
{
color:#7890a8;
}

/* Mobile */

@media(max-width:575px)
{
.game-select
{
width:200px;
max-width:300px;
height:44px;
font-size:14px;
box-sizing:border-box;
background-position:
calc(100% - 21px) 18px,
calc(100% - 15px) 18px;

}
}

/* BLUE */

.game-item:nth-child(1) .game-option-box
{
background:linear-gradient(135deg,#0472d9,#2b91ea,#035bb0,#0472d9);
background-size:300% 300%;
}


.game-item:nth-child(2) .game-option-box
{
background:linear-gradient(135deg,#fa7304,#ff9a3d,#dc5c00,#fa7304);
background-size:300% 300%;
animation-delay:-2s;
}


.game-item:nth-child(3) .game-option-box
{
background:linear-gradient(135deg,#3da415,#63c83b,#2c850d,#3da415);
background-size:300% 300%;
animation-delay:-4s;
}


.game-item:nth-child(4) .game-option-box
{
background:linear-gradient(135deg,#79209c,#a344c2,#5d147c,#79209c);
background-size:300% 300%;
animation-delay:-6s;
}

/* GRADIENT ANIMATION */

@keyframes gameBoxGradient
{
0%
{
background-position:0% 50%;
}

50%
{
background-position:100% 50%;
}

100%
{
background-position:0% 50%;
}
}


/* HOVER */

.game-option-box:hover
{
border:3px solid #ff4fa3;
box-shadow:0 12px 25px rgba(2,50,120,0.20);
}


/* ICON */

.game-option-icon
{
width:48px;
height:48px;

margin:0 auto 7px;

display:flex;
align-items:center;
justify-content:center;

border-radius:50%;

color:#fff;
font-size:21px;

box-shadow:0 4px 0 rgba(0,0,0,0.15);
}


.digit-icon
{
background:#0576de;
}


.row-icon
{
background:#3ea714;
}


.time-icon
{
background:#fa7104;
}


.type-icon
{
background:#e83e8c;
}


/* TITLE */

.game-option-box h3
{
margin:0 0 4px;

color:#fff;

font-size:18px;
font-weight:800;
}


/* DESCRIPTION */

.game-option-box p
{
margin:0 0 9px;

color:rgba(255,255,255,0.9);

font-size:12px;
font-weight:600;
}


/* GAME TYPE */

.game-type-box
{
cursor:default;
}


.game-type-box:hover
{
transform:translateY(-4px);
}


/* CHECKBOX */

.game-check-option
{
width:100%;
margin:6px 0;
text-align:left;
box-sizing:border-box;
}

.game-check-option label
{
width:100%;
display:flex;
align-items:center;
gap:7px;

margin:0;
padding:6px 7px;

border-radius:8px;
border:1px solid #c9def2 !important;
background:#f8fbff !important;

color:#023278;
font-size:12px;
font-weight:700;
cursor:pointer;

box-sizing:border-box;
overflow:hidden;
}
.game-check-option input
{
width:14px;
min-width:14px;
height:14px;
margin:0;
padding:0;
cursor:pointer;
flex-shrink:0;
}

.game-check-option label span
{
display:block;
min-width:0;
white-space:nowrap;
overflow:hidden;
text-overflow:ellipsis;
}


/* PLAY BUTTON */

.play-game-btn
{
display:flex;
align-items:center;
justify-content:center;
gap:6px;
width:150px;
height:38px;
margin:20px auto 0;
border-radius:20px;
background:linear-gradient(135deg,#ff3b30,#fa7104);
color:#fff !important;
font-size:13px;
font-weight:900;
text-decoration:none !important;
box-shadow:0 4px 0 #c62828;
transition:all .2s ease;
}

.play-game-btn:hover
{
transform:translateY(-2px);
box-shadow:0 6px 0 #c62828;
}


/* TABLET */

@media(max-width:991px)
{
.games-box-wrapper
{
grid-template-columns:repeat(2,1fr);
}
}


/* MOBILE */

@media(max-width:575px)
{
.games-box-wrapper
{
grid-template-columns:1fr;
}

.game-option-box
{
min-height:175px;
}
}


/* GAME BOARD */

#gameBoard
{
width:100%;
max-width:650px;

margin:30px auto 0;
padding:30px 25px;

background:#ffffff;

border-radius:25px;

box-shadow:0 10px 30px rgba(2,50,120,0.18);

border:4px solid #3ea714;

text-align:center;

box-sizing:border-box;
}

.game-board-title
{
margin:0 0 15px;

color:#023278;

font-size:24px;
font-weight:900;
}

.game-timer
{
display:inline-flex;
align-items:center;
justify-content:center;
gap:7px;

min-width:100px;

margin-bottom:25px;
padding:8px 18px;

border-radius:20px;

background:#fa7104;
color:#fff;

font-size:18px;
font-weight:900;
}

.game-calculation
{
display:flex;
align-items:center;
justify-content:center;
gap:10px;
flex-wrap:wrap;
white-space:nowrap;
box-sizing:border-box;
}

.game-number
{
display:inline-block;
color:#023278;
font-size:30px;
font-weight:900;
flex-shrink:0;
}

.game-operator
{
display:inline-block;
color:#fa7104;
font-size:28px;
font-weight:900;
flex-shrink:0;
}
.game-result
{
margin-top:20px;
padding:20px;

border-radius:15px;

background:#3ea714;

color:#fff;
font-size:30px;
font-weight:900;
}

.game-result-label
{
display:block;

margin-bottom:5px;

font-size:14px;
font-weight:700;

opacity:.9;
}

@media(max-width:575px)
{
#gameBoard
{
padding:25px 15px;
border-radius:20px;
}

.game-board-title
{
font-size:21px;
}

.game-number
{
min-width:70px;
height:55px;
font-size:23px;
}
.game-operator
{
width:36px;
height:36px;
font-size:21px;
}

.game-result
{
font-size:26px;
}
}

@media(max-width:575px)
{
.game-calculation
{
display:block!important;
gap:7px;
overflow-x:auto;
justify-content:flex-start;
padding:5px;
}


.game-number
{
font-size:24px;
}

.game-operator
{
font-size:23px;
}
}

.game-message
{
width:100%;
max-width:600px;
margin:25px auto;
padding:18px 20px;
background:#fff3cd;
border:2px solid #fa7104;
border-radius:12px;
color:#7a4b00;
font-size:17px;
font-weight:700;
text-align:center;
display:flex;
align-items:center;
justify-content:center;
gap:10px;
}

.game-message i
{
color:#fa7104;
font-size:22px;
}
.play-game-btn.disabled
{
pointer-events:none;
opacity:0.5;
cursor:not-allowed;
}
.game-result-calculation
{
    width:100%;
    max-width:100%;
    box-sizing:border-box;

    color:#023278;
    font-size:20px;
    font-weight:800;
    line-height:1.8;

    text-align:center;
    overflow-wrap:anywhere;
    word-break:break-word;
}
@media(max-width:575px)
{
.game-message
{
width:100%;
max-width:600px;
margin:25px auto;
padding:18px 20px;
background:#fff3cd;
border:2px solid #fa7104;
border-radius:12px;
color:#7a4b00;
font-size:13px;
font-weight:700;
text-align:center;
display:flex;
align-items:center;
justify-content:center;
gap:10px;
}
}

.question-bracket
{
    color:#023278;
    font-size:30px;
    font-weight:900;
}
@media(max-width:575px)
{
    .question-bracket
    {
        font-size:24px;
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
<!-- game setup area -->
<section class="games-area">

<div class="games-heading-wrapper">









</div>


<div class="games-box-wrapper">

<div class="game-item">
<div class="game-heading-item">
<div class="game-option-icon digit-icon">
<i class="fas fa-dice"></i>
</div>
<h3>Number of Digit</h3>
<p>Choose number of digits</p>
</div>
<div class="game-option-box">

<select class="game-select" name="digit">
<option value="">Select Digit</option>

<?php for($i=1;$i<=10;$i++){ ?>
<option value="<?=$i?>"><?=$i?></option>
<?php } ?>

</select>

</div>
</div>

<div class="game-item">
<div class="game-heading-item">
<div class="game-option-icon row-icon">
<i class="fas fa-gamepad"></i>
</div>
<h3>Number of Row</h3>
<p>Choose number of rows</p>
</div>
<div class="game-option-box">

<select class="game-select" name="row">
<option value="">Select Row</option>

<?php for($i=2;$i<=20;$i++){ ?>
<option value="<?=$i?>"><?=$i?></option>
<?php } ?>

</select>

</div>
</div>


<div class="game-item">
<div class="game-heading-item">
<div class="game-option-icon time-icon">
<i class="fas fa-stopwatch"></i>
</div>
<h3>Showing Time</h3>
<p>Choose showing time</p>
</div>
<div class="game-option-box">

<select class="game-select" name="time">
<option value="">Select Time</option>

<?php for($i=1;$i<=10;$i++){ ?>
<option value="<?=$i?>"><?=$i?> Second<?php if($i>1){ ?>s<?php } ?></option>
<?php } ?>
<option value="60">60 Seconds</option>
<option value="120">120 Seconds</option>
</select>

</div>
</div>


<div class="game-item">
<div class="game-heading-item">
<div class="game-option-icon type-icon">
<i class="fas fa-puzzle-piece"></i>
</div>
<h3>Game Type</h3>
<p>Choose your game</p>
</div>
<div class="game-option-box game-type-box">

<div class="game-check-option">
<label>
<input type="radio" name="game_type" value="addition" onClick="selectGameType(this)">
<span>Addition</span>
</label>
</div>

<div class="game-check-option">
<label>
<input type="radio" name="game_type" value="addition_subtraction" onClick="selectGameType(this)">
<span>Addition &amp; Subtraction</span>
</label>
</div>

</div>
</div>
<!-- Number of Digit -->



<!-- Number of Row -->



<!-- Showing Time -->



<!-- Game Type -->


</div>


<a href="javascript:void(0);" id="playGameBtn" class="play-game-btn" onClick="playGame()">
<i class="fas fa-play"></i> Play Game
</a>
<div id="gameBoard" style="display:none;">
</div>
</section>

<!-- game setup area end -->
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
<script>

function startGame(type)
{
if(type=='digit')
{
window.location.href='digit.php';
}

if(type=='row')
{
window.location.href='row.php';
}

if(type=='time')
{
window.location.href='time.php';
}
}




var gameTimer = null;

function playGame()
{
var playButton = document.getElementById('playGameBtn');

var digit = document.querySelector('select[name="digit"]').value;
var row = document.querySelector('select[name="row"]').value;
var time = document.querySelector('select[name="time"]').value;
var selected = document.querySelector('input[name="game_type"]:checked');

if(digit == '' || row == '' || time == '' || !selected)
{
document.getElementById('gameBoard').style.display = 'block';

document.getElementById('gameBoard').innerHTML =
'<div class="game-message">' +
'<i class="fas fa-exclamation-circle"></i>' +
'<span>Please select all the game options before starting.</span>' +
'</div>';

return;
}

playButton.classList.add('disabled');
clearInterval(gameTimer);

var gameType = selected.value;

var min = Math.pow(10, parseInt(digit) - 1);
var max = Math.pow(10, parseInt(digit)) - 1;

var numbers = [];
var result = 0;
var calculation = '';

for(var i = 0; i < parseInt(row); i++)
{
var number = Math.floor(Math.random() * (max - min + 1)) + min;

numbers.push(number);
}

var operators = [];
var numberHTML = '';

if(gameType == 'addition')
{
result = 0;

for(var i = 0; i < numbers.length; i++)
{
result += numbers[i];
}

calculation = numbers.join(' + ');

for(var i = 0; i < numbers.length; i++)
{
numberHTML += '<div class="game-number">' + numbers[i] + '</div>';

if(i < numbers.length - 1)
{
numberHTML += '<div class="game-operator">+</div>';
}
}
}
else
{
result = numbers[0];
calculation = numbers[0];

for(var i = 1; i < numbers.length; i++)
{
var operator;

if(result >= numbers[i])
{
operator = Math.random() < 0.5 ? '+' : '-';
}
else
{
operator = '+';
}

operators.push(operator);

if(operator == '+')
{
result += numbers[i];
}
else
{
result -= numbers[i];
}

calculation += ' ' + operator + ' ' + numbers[i];
}

numberHTML += '<div class="game-number">' + numbers[0] + '</div>';

for(var i = 1; i < numbers.length; i++)
{
numberHTML += '<div class="game-operator">' + operators[i - 1] + '</div>';
numberHTML += '<div class="game-number">' + numbers[i] + '</div>';
}
}

var board = document.getElementById('gameBoard');

var title = 'ADDITION';

if(gameType == 'addition_subtraction')
{
title = 'ADDITION & SUBTRACTION';
}


board.style.display = 'block';

board.innerHTML =
'<div class="game-board-title">' + title + '</div>' +

'<div class="game-timer">' +
'<i class="fas fa-stopwatch"></i>' +
'<span id="gameTime">' + time + '</span> sec' +
'</div>' +

'<div class="game-calculation">' + 
'<span class="question-bracket">(</span>' +
numberHTML +
'<span class="question-bracket">)</span>' +
'</div>';

board.scrollIntoView({
behavior:'smooth',
block:'center'
});

var remainingTime = parseInt(time);

gameTimer = setInterval(function()
{
remainingTime--;

var timerElement = document.getElementById('gameTime');

if(timerElement)
{
timerElement.innerHTML = remainingTime;
}

if(remainingTime <= 0)
{
clearInterval(gameTimer);
playButton.classList.remove('disabled');

showGameResult(calculation, result);
}

},1000);
}


function showGameResult(calculation, result)
{
var board = document.getElementById('gameBoard');

board.innerHTML =
'<div class="game-board-title">' +
'RESULT' +
'</div>' +

'<div class="game-result-calculation">' +
'<span class="question-bracket">(</span>' +
calculation +
'<span class="question-bracket">)</span>' +
'</div>' + 


'<div class="game-result">' +
'<span class="game-result-label">ANSWER</span>' +
result +
'</div>';
}
</script>
</body>

</html>
