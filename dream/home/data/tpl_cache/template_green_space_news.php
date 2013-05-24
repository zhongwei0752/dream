<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_news', '1369389499', 'template/green/space_news');?><head>
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
<?php if(is_array($list2)) { foreach($list2 as $value2) { ?>
<div class="featured featured1">
<a href="single.html">
<span class='feature_excerpt'>
<strong class='sliderheading'><?=$value2['subject']?></strong>
<span class='slidercontent'>
<?=$value2['message']?>
</span>
</span>
<img src="<?=$value2['image1url']?>" alt="" />
</a>
</div><!-- end .featured -->
<?php } } ?>
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
<a href="single.html"><img height="180" width="180" src="<?=$value['image1url']?>" alt="" /></a>
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
















<div class="page"><?=$multi?></div>


</div> 




<div class="sidebar ">

<div class="box box_small community_news">

            <h3>简讯</h3>
            <?php if(is_array($list1)) { foreach($list1 as $value1) { ?>
<div class='entry box_entry'>
<h4><?=$value1['subject']?></h4>
<a class='alignleft preloading_background' href='single.html'><img src='<?=$value1['image1url']?>' alt='' class='rounded'/></a>
<p><?=$value1['message']?></p>
</div>	<?php } } ?>
            </div><!--end box -->
            
            
<div class="box box_small">
            <h3>新闻排行榜</h3>
<ul>
            	<li><a title="评论排行" href="space.php?do=news&view=all&orderby=replynum&day=7">评论排行</a></li>
<li><a title="查看排行" href="space.php?do=news&view=all&orderby=viewnum&day=7">查看排行</a></li>
<li><a title="顶排行" href="space.php?do=news&view=all&orderby=click_20&day=7">顶排行</a></li>
<li><a title="倒排行" href="space.php?do=news&view=all&orderby=click_21&day=7">倒排行</a></li>
            </ul>
            </div><!--end box -->
            
</div> 


<div class="sidebar ">
<div class="box box_small link_list">
            	<h3>专题</h3>
            	<?php if(is_array($list3)) { foreach($list3 as $value3) { ?>
            	<a href='<?=$value3['message']?>'><img src='<?=$value3['image1url']?>' class='rounded' height="125" width="125" alt='<?=$value3['subject']?>' /></a><span>专题名:<?=$value3['subject']?></span><?php } } ?>

            	

            	</div><!--end box -->

<div class="box box_small">
            	<h3>投稿</h3>
<ul>
            	<li><a href="#">邮箱:<br/>623610577@qq.com</a></li>
<li><a href="#">QQ:623610577</a></li>
            </ul>
            </div><!--end box -->
            
            <div class="box box_small">
            	<h3>导航</h3>
<ul>
            	<li><a href="space.php?do=home">首页</a></li>
<li><a href="space.php?do=medicine">用药助手</a></li>
<li><a href="space.php?do=activity">活动</a></li>
<li><a href="space.php?do=group">群组</a></li>
<li><a href="space.php?do=discussion">案例讨论</a></li>
<li><a href="space.php?do=joke">医疗笑话</a></li>
<li><a href="space.php?do=news&orderby=dateline">今日资讯</a></li>


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
<?php if($_SN[$_SGLOBAL['supe_uid']]=='admin') { ?>
        <h3>管理员发布</h3>
<ul>
        	<li><a title="发布新闻" href="cp.php?ac=news">发布新闻</a></li>
<li><a title="发布简讯" href="cp.php?ac=littlenews">发布简讯</a></li>
<li><a title="发布首页大图" href="cp.php?ac=navnews">发布首页大图&专题</a></li>

        </ul>
        <?php } else { ?>
        <h3>用户快捷入口</h3>
<ul>
        	<li><a title="查询药品" href="space.php?do=medicine">查询药品</a></li>
<li><a title="发起活动" href="cp.php?ac=event">发起活动</a></li>
<li><a title="创建群组" href="cp.php?ac=mtag">创建群组</a></li>
<li><a title="发起新话题" href="cp.php?ac=thread">发起新话题</a></li>
<li><a title="发起新案例讨论" href="cp.php?ac=discussion">发起新案例讨论</a></li>
<li><a title="查看医疗笑话" href="space.php?do=joke">查看医疗笑话</a></li>
<li><a title="查看本周专题" href="space.php?do=subject">查看本周专题</a></li>


        </ul>
        <?php } ?>
    </div><!--end box -->
    
   
    </div>
    
    <div class="column column2">
<div class="box box_small gallery">
        <h3>逝去的岁月，华丽的分割线</h3>
<ul class="flickr">
<li><a title="时间轴" href="space.php?do=timer">时间轴</a></li>
</ul>
    </div><!--end box -->
    </div>
    
        <div class="column column3">
<div class="box box_small">
<h3><a href="#">power by watermelon team</a></h3>
<p>西瓜冰团队-永不逝去的名字</p>

</div>
    </div>
    

<!-- ###################################################################### -->
</div><!-- end footer --> 
</div><!-- end footerwrap --> 
<!-- ###################################################################### -->	<?php ob_out();?>