<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_joke|template/green/space_jokeclick', '1369193735', 'template/green/space_joke');?>
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
<?php if(is_array($list)) { foreach($list as $value) { ?>
<div class="grid">

<strong style="letter-spacing:3px;"><?=$value['subject']?></strong>
<p style="letter-spacing:2px;line-height:180%;font-family:Georgia, serif;;text-indent : 25px;"><?=$value['message']?></p>
<div class="meta">
<?php $clicknum = 0; ?>
<?php if(is_array($clicks)) { foreach($clicks as $value2) { ?>
<?php $clicknum = $clicknum + $value2['clicknum']; ?>

<?php } } ?>
<a href="cp.php?ac=click&op=add&clickid=18&idtype=<?=$idtype?>&id=<?=$value['jokeid']?>&hash=<?=$hash?>" id="click_<?=$idtype?>_<?=$id?>_<?=$value2['clickid']?>" onclick="ajaxmenu(event, this.id, 0, 2000, 'show_click')"><?=$value['click_18']?>顶</a> | <a href="cp.php?ac=click&op=add&clickid=19&idtype=<?=$idtype?>&id=<?=$value['jokeid']?>&hash=<?=$hash?>" id="click_<?=$idtype?>_<?=$id?>_<?=$value2['clickid']?>" onclick="ajaxmenu(event, this.id, 0, 2000, 'show_click')"><?=$value['click_19']?>倒</a>




<?php if($click_multi) { ?><div class="page"><?=$click_multi?></div><?php } ?>
</div>

</div>
<?php } } ?>


<div class="page" style="margin:0 auto;text-align:center;"><?=$multi?></div>

</div>
</section>


<ul id="navigation">
            <li class="home"><a href="space.php?do=home" title="首页"></a></li>
             <li class="about"><a href="space.php?do=medicine" title="用药助手"></a></li>
            <li class="search"><a href="space.php?do=activity" title="活动"></a></li>
            <li class="photos"><a href="" title="Photos"></a></li>
            <li class="rssfeed"><a href="" title="Rss Feed"></a></li>
            <li class="podcasts"><a href="" title="Podcasts"></a></li>
            <li class="contact"><a href="" title="Contact"></a></li>
        </ul>
     
     <style>

ul#navigation li {
    width: 100px;
    float:left;
}

ul#navigation .home a{
    background-image: url(template/default/image/home.png);
}
ul#navigation .about a      {
    background-image: url(template/default/image/id_card.png);
}
ul#navigation .search a      {
    background-image: url(template/default/image/search.png);
}
ul#navigation .podcasts a      {
    background-image: url(template/default/image/ipod.png);
}
ul#navigation .rssfeed a   {
    background-image: url(template/default/image/rss.png);
}
ul#navigation .photos a     {
    background-image: url(template/default/image/camera.png);
}
ul#navigation .contact a    {
    background-image: url(template/default/image/mail.png);
}
     ul#navigation {
    position: fixed;
    margin: 0 auto;
    padding: 0px;
    bottom:-30px;
    left:24%;
    list-style: none;
    z-index:9999;
}
     ul#navigation li a {
    display: block;
    margin-top: -2px;
    width: 100px;
    height: 70px;    
    background-color:#CFCFCF;
    background-repeat:no-repeat;
    background-position:center center;
    border:1px solid #AFAFAF;
    -moz-border-radius:0px 10px 10px 0px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -khtml-border-bottom-right-radius: 10px;
    -khtml-border-top-right-radius: 10px;
    /*-moz-box-shadow: 0px 4px 3px #000;
    -webkit-box-shadow: 0px 4px 3px #000;
    */
    opacity: 0.6;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
     </style>
         <script type="text/javascript">
        
            $(function() {
                  $('#navigation a').stop().animate({'margin-top':'20px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'margin-top':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'margin-top':'20px'},200);
                    }
                );

});

        </script>	


</body>
<?php ob_out();?>