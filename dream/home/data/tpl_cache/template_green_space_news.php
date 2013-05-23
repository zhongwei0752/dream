<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_news', '1369277241', 'template/green/space_news');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Newscast - a premium magazine template</title>

<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/css/style1.css" type="text/css" media="screen" />
<!--
<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/css/style2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/css/style3.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/css/style4.css" type="text/css" media="screen" />
-->

<link rel="stylesheet" href="http://www.kriesi.at/demos/newscast/light/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />	

<script type='text/javascript' src='http://www.kriesi.at/demos/newscast/light/js/jquery.js'></script>
<script src="http://www.kriesi.at/demos/newscast/light/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>	

<script type='text/javascript' src='http://www.kriesi.at/demos/newscast/light/js/custom.js'></script>

<!--[if IE 6]>
<script type='text/javascript' src='http://www.kriesi.at/demos/newscast/light/js/dd_belated_png.js'></script>
<script>DD_belatedPNG.fix('.ie6fix');</script>
<style>.box ul a {zoom:1;}</style>
<![endif]-->


</head>

<body id='top'>
<div id="contentwrap">
<!-- ###################################################################### -->

<!-- ###################################################################### -->
<div id="feature_wrap">
<!-- ###################################################################### -->
<div id="featured">

<div class="featured featured1">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'>Tutorial: Picture of the week</strong>
<span class='slidercontent'>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</span>
</span>
<img src="http://www.kriesi.at/demos/newscast/light/files/content_pic1.jpg" alt="" />
</a>
</div><!-- end .featured -->

<div class="featured featured2">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'>How to create a picture with vivid colors</strong>
<span class='slidercontent'>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna  										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</span>
</span>
<img src="http://www.kriesi.at/demos/newscast/light/files/content_pic2.jpg" alt="" />
</a>
</div><!-- end .featured -->

<div class="featured featured3">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'>Tutorial: Funky artwork in Illustrator</strong>
<span class='slidercontent'>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</span>
</span>
<img src="http://www.kriesi.at/demos/newscast/light/files/content_pic3.jpg" alt="" />
</a>
</div><!-- end .featured -->

<div class="featured featured4">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'>How to create a beautiful sunset with Photoshop</strong>
<span class='slidercontent'>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna  										Ut enim ad minim veniam, Ut enim ad minim veniam, Ut enim ad minim veniam.
</span>
</span>
<img src="http://www.kriesi.at/demos/newscast/light/files/content_pic4.jpg" alt="" />
</a>
</div><!-- end .featured -->

<div class="featured featured5">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'>How to draw realistic ballons in Photoshop</strong>
<span class='slidercontent'>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna  										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</span>
</span>
<img src="http://www.kriesi.at/demos/newscast/light/files/content_pic5.jpg" alt="" />
</a>
</div><!-- end .featured -->

</div><!-- end #featured --> 

<span class='bottom_right_rounded_corner ie6fix'></span>
<span class='bottom_left_rounded_corner ie6fix'></span>	

<!-- ###################################################################### -->
</div><!-- end featuredwrap -->
<!-- ###################################################################### -->

<!-- ###################################################################### -->
<div id="main">
<!-- ###################################################################### -->

<div id="content">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<div class="entry">
<div class="entry-previewimage rounded preloading_background">
<a href="single.html"><img height="180" width="180" src="http://www.kriesi.at/demos/newscast/light/files/medium_pic1.jpg" alt="" /></a>
</div>

<div class="entry-content">
<h1 class="entry-heading"><a href='space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['newsid']?>'><?=$value['subject']?></a></h1>
<div class="entry-head">
<span class="date ie6fix"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>
<span class="comments ie6fix"><a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['newsid']?>#comment"><?=$value['replynum']?> 个评论</a></span>
<span class="author ie6fix"><a href="space.php?uid=<?=$value['uid']?>">by <?=$_SN[$value['uid']]?></a></span>
</div>

<div class="entry-text">
<p>
<?=$value['message']?>
</p>
</div>

<div class="entry-bottom">
<a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['newsid']?>" class="more-link">Read more</a>
</div>
</div>
</div>
<?php } } ?>
















<div class="pagination">
<span class="current">1</span>
<a href="#" class="inactive">2</a>
<a href="#" class="inactive">3</a>
<a href="#" class="inactive">4</a>
<a href="#" class="inactive">5</a>
</div>


</div> 




<div class="sidebar ">

<div class="box box_small community_news">
            <h3>Community News</h3>
<div class='entry box_entry'>
<h4><a href='single.html'>How to use the upcoming CSS 3 properties in IE 6</a></h4>
<a class='alignleft preloading_background' href='single.html'><img src='http://www.kriesi.at/demos/newscast/light/files/mini_pic1.jpg' alt='' class='rounded'/></a>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min.</p>
</div>

<div class='entry box_entry'>
<h4><a href='single.html'>Holidays in Florida</a></h4>
<a class='alignleft preloading_background' href='single.html'><img src='http://www.kriesi.at/demos/newscast/light/files/mini_pic2.jpg' alt='' class='rounded'/></a>
<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
</div>

<div class='entry box_entry'>
<h4><a href='single.html'>Road to Perdition</a></h4>
<a class='alignleft preloading_background' href='single.html'><img src='http://www.kriesi.at/demos/newscast/light/files/mini_pic3.jpg' alt='' class='rounded'/></a>
<p>Ut enim ad min lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>

<div class='entry box_entry'>
<h4><a href='single.html'>Vienna by night is a really beautiful city</a></h4>
<a class='alignleft preloading_background' href='single.html'><img src='http://www.kriesi.at/demos/newscast/light/files/mini_pic4.jpg' alt='' class='rounded'/></a>
<p>Consectetur adipisicing elit. Sed do eiusmod tempor sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min lorem ipsum dolor sit amet.</p>
</div>

            </div><!--end box -->
            
            
<div class="box box_small">
            <h3>Archives</h3>
<ul>
            	<li><a title="December 2009" href="archive.html">December 2009</a></li>
<li><a title="September 2009" href="archive.html">September 2009</a></li>
<li><a title="November 2008" href="archive.html">November 2008</a></li>
<li><a title="January 2007" href="archive.html">January 2007</a></li>
<li><a title="December 2009" href="archive.html">December 2006</a></li>
<li><a title="September 2009" href="archive.html">September 2005</a></li>
<li><a title="November 2008" href="archive.html">November 2005</a></li>
<li><a title="January 2007" href="archive.html">January 2004</a></li>
            </ul>
            </div><!--end box -->
            
</div> 


<div class="sidebar ">
<div class="box box_small link_list">
            	<h3>Advertise with us</h3>
            	<a href='http://www.themeforest.net?ref=Kriesi'><img src='http://www.kriesi.at/demos/newscast/light/files/tf.gif' class='rounded' height="125" width="125" alt='' /></a>
            	<a href='http://www.activeden.net?ref=Kriesi'><img src='http://www.kriesi.at/demos/newscast/light/files/actived.gif' class='rounded' height="125" width="125" alt='' /></a>
            	<a href='http://www.codecanyon.net?ref=Kriesi'><img src='http://www.kriesi.at/demos/newscast/light/files/cc.gif' class='rounded' height="125" width="125" alt='' /></a>
            	<a href='http://www.graphicriver.net?ref=Kriesi'><img src='http://www.kriesi.at/demos/newscast/light/files/gr.gif' class='rounded' height="125" width="125" alt='' /></a>

            	</div><!--end box -->

<div class="box box_small">
            	<h3>Categories</h3>
<ul>
            	<li><a href="archive.html">Photoshop</a></li>
<li><a href="archive.html">Photography</a></li>
<li><a href="archive.html">Web Design</a></li>
<li><a href="archive.html">Coding</a></li>
<li><a href="archive.html">Painting</a></li>
            </ul>
            </div><!--end box -->
            
            <div class="box box_small">
            	<h3>Pages</h3>
<ul>
            	<li><a href="page.html">About this Project</a></li>
<li><a href="page.html">Team</a></li>
<li><a href="page.html">Jobs</a></li>
<li><a href="contact.php">Contact</a></li>
            </ul>
            </div><!--end box -->
            
</div><!-- end sidebar --> 


<!-- ###################################################################### -->	
</div><!-- end main -->
<!-- ###################################################################### -->

<!-- ###################################################################### -->	
</div><!-- end contentwrap --> 
<!-- ###################################################################### -->


<!-- Footer     ########################################################### -->
<div id="footerwrap">
<div id="footer">
<!-- ###################################################################### -->
<div class="column column1">
<div class="box box_small">
        <h3>Archive</h3>
<ul>
        	<li><a title="December 2009" href="archive.html">December 2009</a></li>
<li><a title="September 2009" href="archive.html">September 2009</a></li>
<li><a title="November 2008" href="archive.html">November 2008</a></li>
<li><a title="January 2007" href="archive.html">January 2007</a></li>
        </ul>
    </div><!--end box -->
    
    <div class="box box_small">
        <h3>Categories</h3>
<ul>
    			<li><a href="archive.html">Photoshop</a></li>
<li><a href="archive.html">Photography</a></li>
<li><a href="archive.html">Web Design</a></li>
        </ul>
    </div><!--end box -->
    </div>
    
    <div class="column column2">
<div class="box box_small gallery">
        <h3>Gallery</h3>
<ul class="flickr">
<li><a title="Jetty" href="http://www.flickr.com/photos/ukphotoart/4337815441/in/pool-613394@N22">
<img alt="Jetty" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_1.jpg" /></a></li>
<li><a title="genesis" href="http://www.flickr.com/photos/tbhpyrhe/4340647027/in/pool-613394@N22">
<img alt="genesis" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_2.jpg" /></a></li>
<li><a title="Buddha of earth" href="http://www.flickr.com/photos/rensrecluse/4331523575/in/pool-613394@N22">
<img alt="Buddha of earth" src="files/gallery/pic_3.jpg" /></a></li>
<li><a title="Web Design" href="http://www.flickr.com/photos/8144623@N08/4341234800/in/pool-613394@N22">
<img alt="Web Design" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_4.jpg" /></a></li>
<li><a title="Web Design" href="http://www.flickr.com/photos/8144623@N08/4341234796/in/pool-613394@N22">
<img alt="Web Design" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_5.jpg" /></a></li>
<li><a title="OP" href="http://www.flickr.com/photos/satoboy/4340576325/in/pool-613394@N22">
<img alt="OP" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_6.jpg" /></a></li>
<li><a title="Unbound Dance Company" href="http://www.flickr.com/photos/11916764@N05/4340570423/in/pool-613394@N22">
<img alt="Unbound Dance Company" src="files/gallery/pic_7.jpg" /></a></li>
<li><a title="Untitled" href="http://www.flickr.com/photos/vearts/4340519289/in/pool-613394@N22">
<img alt="Untitled" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_8.jpg" /></a></li>
<li><a title="lyann" href="http://www.flickr.com/photos/30154406@N08/4326774184/in/pool-613394@N22">
<img alt="lyann" src="http://www.kriesi.at/demos/newscast/light/files/gallery/pic_9.jpg" /></a></li>
</ul>
    </div><!--end box -->
    </div>
    
        <div class="column column3">
<div class="box box_small">
<h3><a href="page.html">Contribute to our Site!</a></h3>
<p>Consectetur adipisicing elit tempor incididunt ut labore. Sed do eiusmod tempor incididunt ut labore. Consectetur adipisicing elit.</p>
<p class='small_block'><img alt="" src="images/skin1/newspaper_add_32.png" class='ie6fix noborder alignleft'/>If you want to contribute tutorials, news or other stuff please contact us. We pay 150 for each approved article.</p>
<p class='small_block'><img alt="" src="images/skin1/lightbulb_32.png" class='ie6fix noborder alignleft'/>Consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore.</p>
<p class='small_block'><img alt="" src="images/skin1/info_button_32.png" class='ie6fix noborder alignleft'/>This site uses valid HTML and CSS. All content Copyright &copy; 2010 Newscast, Inc</p>
<p class='small_block'><img alt="" src="images/skin1/rss_32.png" class='ie6fix noborder alignleft'/>If you like what we do, please don't hestitate and subscribe to our <a href=''>RSS Feed.</a></p>
</div>
    </div>
    

<!-- ###################################################################### -->
</div><!-- end footer --> 
</div><!-- end footerwrap --> 
<!-- ###################################################################### -->	

</body>
</html><?php ob_out();?>