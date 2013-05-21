<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_joke', '1369065104', 'template/green/space_joke');?>
<head>

<link rel='stylesheet' href='http://www.inwebson.com/demo/blocksit-js/demo2/style.css' media='screen' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://www.inwebson.com/demo/blocksit-js/blocksit.min.js"></script>
<script>
$(document).ready(function() {
//vendor script
$('#header')
.css({ 'top':-50 })
.delay(1000)
.animate({'top': 0}, 800);

$('#footer')
.css({ 'bottom':-15 })
.delay(1000)
.animate({'bottom': 0}, 800);

//blocksit define
$(window).load( function() {
$('#container').BlocksIt({
numOfCol: 1,
offsetX: 8,
offsetY: 8
});
});

//window resize
var currentWidth = 1100;
$(window).resize(function() {
var winWidth = $(window).width();
var conWidth;
if(winWidth < 660) {
conWidth = 440;
col = 2
} else if(winWidth < 880) {
conWidth = 660;
col = 3
} else if(winWidth < 1100) {
conWidth = 880;
col = 4;
} else {
conWidth = 1100;
col = 5;
}

if(conWidth != currentWidth) {
currentWidth = conWidth;
$('#container').width(conWidth);
$('#container').BlocksIt({
numOfCol: col,
offsetX: 8,
offsetY: 8
});
}
});

//close ad
$('.buttonclose a').on('click', function() {
$(this).parent().parent().fadeOut(1000);
$(this).off('click');
return false;
});
});
</script>


<link rel="shortcut icon" href="http://www.inwebson.com/wp-content/themes/inwebson2/favicon.ico" />
<link rel="canonical" href="http://www.inwebson.com/demo/blocksit-js/demo2/" />
</head>
<body>

<!-- Content -->
<section id="wrapper" >

<div id="container" style="width:1024px;">

<div class="grid">
<div class="imgholder">
<img src="images/img26.jpg" />
</div>
<strong>Bridge to Heaven</strong>
<p>Where is the bridge lead to?</p>
<div class="meta">by SigitEko</div>
</div>

</div>
</section>





</body>
<?php ob_out();?>