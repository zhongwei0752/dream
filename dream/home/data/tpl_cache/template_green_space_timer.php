<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_timer|template/green/header|template/green/footer', '1369498873', 'template/green/space_timer');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title><?php if($_TPL['titles']) { ?><?php if(is_array($_TPL['titles'])) { foreach($_TPL['titles'] as $value) { ?><?php if($value) { ?><?=$value?> - <?php } ?><?php } } ?><?php } ?><?php if($_SN[$space['uid']]) { ?><?=$_SN[$space['uid']]?> - <?php } ?><?=$_SCONFIG['sitename']?> - Powered by UCenter Home</title>
<script language="javascript" type="text/javascript" src="source/script_cookie.js"></script>
<script language="javascript" type="text/javascript" src="source/script_common.js"></script>
<script language="javascript" type="text/javascript" src="source/script_menu.js"></script>
<script language="javascript" type="text/javascript" src="source/script_ajax.js"></script>
<script language="javascript" type="text/javascript" src="source/script_face.js"></script>
<script language="javascript" type="text/javascript" src="source/script_manage.js"></script>
<style type="text/css">
@import url(template/default/style.css);
@import url(template/green/style.css);
<?php if($_TPL['css']) { ?>
@import url(template/default/<?=$_TPL['css']?>.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_theme'])) { ?>
@import url(theme/<?=$_SGLOBAL['space_theme']?>/style.css);
<?php } elseif($_SCONFIG['template'] != 'default') { ?>
@import url(template/<?=$_SCONFIG['template']?>/style.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_css'])) { ?>
<?=$_SGLOBAL['space_css']?>
<?php } ?>
</style>
<link rel="shortcut icon" href="image/favicon.ico" />
<link rel="edituri" type="application/rsd+xml" title="rsd" href="xmlrpc.php?rsd=<?=$space['uid']?>" />
</head>
<body>

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="header">
<?php if($_SGLOBAL['ad']['header']) { ?><div id="ad_header"><?php adshow('header'); ?></div><?php } ?>
<div class="headerwarp">
<h1 class="logo"><a href="index.php"><img src="template/<?=$_SCONFIG['template']?>/image/logo.gif" alt="<?=$_SCONFIG['sitename']?>" /></a></h1>
<ul class="menu">
<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=medicine">用药助手</a></li>
<li><a href="space.php?do=activity">活动</a></li>
<li><a href="space.php?do=group">群组</a></li>
<li><a href="space.php?do=discussion">案例讨论</a></li>
<li><a href="space.php?do=joke">医疗笑话</a></li>
<li><a href="space.php?do=news&orderby=dateline">今日资讯</a></li>
<li><a href="space.php?do=subject">本周专题</a></li>

<?php } else { ?>
<li><a href="index.php">首页</a></li>
<?php } ?>



<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>">消息<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?><span style="background-color: #e74c3c;border-radius: 30px;color: white;font-size: 12px;font-weight: 500;line-height: 18px;min-width: 8px;padding: 0 5px;margin-left:30px;margin-top:-20px;text-align: center;text-shadow: none;z-index: 10;display: block;"><?=$_SGLOBAL['member']['newpm']?></span><?php } ?></a></li>
<?php if($_SGLOBAL['member']['allnotenum']) { ?><li class="notify" id="membernotemenu" onmouseover="showMenu(this.id)"><a href="space.php?do=notice"><?=$_SGLOBAL['member']['allnotenum']?>个提醒</a></li><?php } ?>
<?php } else { ?>
<li><a href="help.php">帮助</a></li>
<?php } ?>
</ul>

<div class="nav_account">
<?php if($_SGLOBAL['supe_uid']) { ?>
<a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>" class="login_thumb"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
<a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>" class="loginName"><?=$_SN[$_SGLOBAL['supe_uid']]?></a>
<?php if($_SGLOBAL['member']['credit']) { ?>
<a href="cp.php?ac=credit" style="font-size:11px;padding:0 0 0 5px;"><img src="image/credit.gif"><?=$_SGLOBAL['member']['credit']?></a>
<?php } ?>
<br />
<?php if(empty($_SCONFIG['closeinvite'])) { ?>
<a href="cp.php?ac=invite">邀请</a> 
<?php } ?>
<a href="cp.php?ac=task">任务</a> 
<a href="cp.php?ac=magic">道具</a>
<a href="cp.php">设置</a> 
<a href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>">退出</a>
<?php } else { ?>
<a href="do.php?ac=<?=$_SCONFIG['register_action']?>" class="login_thumb"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
欢迎您<br>
<a href="do.php?ac=<?=$_SCONFIG['login_action']?>">登录</a> | 
<a href="do.php?ac=<?=$_SCONFIG['register_action']?>">注册</a>
<?php } ?>
</div>
</div>
</div>

<div id="wrap">

<?php if(empty($_TPL['nosidebar'])) { ?>
<div id="main">


<div id="mainarea">

<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dream team</title>
<link href="./timer/css/history.css" rel="stylesheet" />
</head>
<body>
<!-- 代码 开始 -->
<div class="head-warp">
  <div class="head">
        <div class="nav-box">
          <ul>
              <li class="cur" style="text-align:center; font-size:42px; font-family:'微软雅黑', '宋体';"></li>
          </ul>
        </div>
  </div>
</div>
<div class="main">
  <div class="history">
    <div class="history-date">
      <ul>
      	<h2 class="first"><a href="#nogo">2013年4月</a></h2>

 
         <li class="green">
          <h3>04.15<span>2013</span></h3>
          <dl>
            <dt>毕业设计初步规划主题明确
<span>建立一个类似丁香园的医生资讯网站，明确一点是用户是医生或者医疗工作者。</span>
</dt>
          </dl>
        </li>

       <li>
         <h3>04.19<span>2013</span></h3>
          <dl>
            <dt>组件设计明确
<span>确定了所开发的组件的名称和作用，投票通过和否决了一些组件 </span>
</dt>
          </dl>
        </li>

         <li class="green">
          <h3>04.20<span>2013</span></h3>
          <dl>
            <dt>项目开工
<span>开工大吉，一切顺利。</span>
</dt>
          </dl>
        </li>

     <li class="green">
          <h3>待续<span>2013</span></h3>
          <dl>
            <dt>待续
<span>待续</span>
</dt>
          </dl>
        </li>
         <!-- <li>
          <h3>06.15<span>2012</span></h3>
          <dl>
            <dt>ÐÂÔöÁËÏÂÔØÎÄ¼þÇ°É¨ÃèÏÂÔØÁ´½Ó°²È«ÐÔµÄ¹¦ÄÜ</dt>
          </dl>
        </li>
        <li>
          <h3>06.05<span>2012</span></h3>
          <dl>
            <dt>W3CÁªÃËÊ×Ï¯Ö´ÐÐ¹Ù·Ã»ª£¬Ê×Õ¾·ÃÎÊ360¹«Ë¾
</dt>
          </dl>
        </li>
        <li>
          <h3>05.12<span>2012</span></h3>
          <dl>
            <dt>360ÊÜÑû³öÏ¯W3CÁªÃË³ÉÔ±¼ûÃæ»áÒé</dt>
          </dl>
        </li>
        <li>
          <h3>05.11<span>2012</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½18.0
<span>ÐÂÔö¶àÓÃ»§Ê¹ÓÃä¯ÀÀÆ÷µÄ¹¦ÄÜ</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>05.03<span>2012</span></h3>
          <dl>
            <dt>360¼«ËÙä¯ÀÀÆ÷ÓÃ»§ÊýÍ»ÆÆ5000Íò£¬»îÔ¾ÓÃ»§³¬2000Íò
</dt>
          </dl>
        </li>
        <li>
          <h3>03.08<span>2012</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½17.0£¬ÌáÉýä¯ÀÀÆ÷ËÙ¶È¡¢ÔöÇ¿°²È«ÐÔ
<span>ÐÂÔöHTTP¹ÜÏß»¯¼¼Êõ£¬´ó·ùÌáÉýÍøÒ³¼ÓÔØËÙ¶È</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>01.29<span>2012</span></h3>
          <dl>
            <dt>¹úÄÚÂÊÏÈ¼ÓÈëW3CÁªÃËHTML¹¤×÷×é£¬²ÎÓëHTML5±ê×¼ÖÆ¶¨</span>
</dt>
          </dl>
        </li>
      </ul>
    </div>
    <div class="history-date">
      <ul>
      	<h2 class="date02"><a href="#nogo">2011Äê</a></h2>
        <li>
          <h3>12.12<span>2011</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½16.0£¬ÌáÉýä¯ÀÀÆ÷ËÙ¶È¡¢ÔöÇ¿°²È«ÐÔ
<span>ÐÂÔö¶Ô360Íø¹º±£ïÚÖ§³Ö£¬±£»¤ÍøÉÏ½»Ò×°²È«</span>
</dt>
          </dl>
        </li>
        <li class="green">
          <h3>11.24<span>2011</span></h3>
          <dl>
            <dt>·¢²¼¹úÄÚÊ×¸öË«ºËä¯ÀÀÆ÷ÊµÑéÊÒ
<span>ÇáËÉ²âÊÔä¯ÀÀÆ÷ÐÔÄÜ</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>11.01<span>2011</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½15.0
<span>ÌáÉýä¯ÀÀÆ÷ËÙ¶È¡¢ÔöÇ¿°²È«ÐÔ</span>
</dt>
          </dl>
        </li>
         <li>
          <h3>10.27<span>2011</span></h3>
          <dl>
            <dt>×÷Îª¹úÄÚÎ¨Ò»ÊÜÑû²ÎÕ¹µÄä¯ÀÀÆ÷³§ÉÌ£¬²ÎÕ¹2011¹È¸è¿ª·¢ÕßÈÕ´ó»á
</dt>
          </dl>
        </li>
        <li>
          <h3>09.22<span>2011</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½14.0
<span>¼ÓÈëCanvas 2DµÄGPU¼ÓËÙµÈÌØÐÔ</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>09.21<span>2011</span></h3>
          <dl>
            <dt>360¼«ËÙä¯ÀÀÆ÷ÓÃ»§Á¿³¬Ç§Íò£¬Ðû²¼ÓëChromiumÉçÇø°æ±¾Í¬²½
</dt>
          </dl>
        </li>
        <li>
          <h3>08.30<span>2011</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½13.0
<span>ÐÂÔö¸ü·á¸»µÄÆ¤·ô×Ô¶¨ÒåÖ§³Ö</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>06.22<span>2011</span></h3>
          <dl>
            <dt>ÐÂÔö¶Ôcrx¸ñÊ½µÄ¹ØÁª
<span>Ë«»÷crxÎÄ¼þ¼´¿É°²×°À©Õ¹¡¢Æ¤·ô</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>05.19<span>2011</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½10.0
<span>¼«ËÙä¯ÀÀÆ÷Óë°²È«ä¯ÀÀÆ÷ÍøÂçÊÕ²Ø¼Ð»¥Í¨</span>
</dt>
          </dl>
        </li>
        <li>
          <h3>04.07<span>2011</span></h3>
          <dl>
            <dt>ÍÆ³öÓ¦ÓÃ¿ª·ÅÆ½Ì¨£¬Óë¿ª·¢Õß¹²ÏíÓÃ»§×ÊÔ´
</dt>
          </dl>
        </li>
       <li>
          <h3>03.27<span>2011</span></h3>
          <dl>
            <dt>ÐÂÔö360ÔÆ°²È«ÍøÖ·À¹½Ø
<span>ÐÂÔöIE9¸ßËÙÄ£Ê½£¬Ö§³ÖGPUÓ²¼þ¼ÓËÙ</span>
</dt>
          </dl>
        </li>
      </ul>
    </div>
    <div class="history-date">
      <ul>
      	<h2 class="date02"><a href="#nogo">2010Äê</a></h2>
        <li>
          <h3>12.13<span>2010</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½7.0<span>ÌáÉýä¯ÀÀÆ÷ËÙ¶È¡¢ÔöÇ¿°²È«ÐÔ</span></dt>
          </dl>
        </li>
        <li>
          <h3>10.20<span>2010</span></h3>
          <dl>
            <dt>Éý¼¶¼«ËÙÄÚºËµ½6.0<span>ÐÂÔö360ÕÊ»§£¬Í¬²½ÍøÂçÊÕ²Ø¼Ð</span></dt>
          </dl>
        </li>
        <li>
          <h3>09.15<span>2010</span></h3>
          <dl>
            <dt>Ê×¿îË«ºË°²È«ä¯ÀÀÆ÷ - 360¼«ËÙä¯ÀÀÆ÷·¢²¼
<span>Ê×¸ö°üº¬É³Ïä¡¢ÏµÍ³¼¶·À×¢Èë¡¢ÍêÕû¶à½ø³Ì¸ôÀë¼Ü¹¹µÈ°²È«»úÖÆµÄË«ºËä¯ÀÀÆ÷<br><br></span>
</dt>
<br><br><br><br>
          </dl>
        </li>-->
      </ul>
    </div>
  </div>
</div>

<script src="./timer/js/jquery.js"></script> 
<script src="./timer/js/main.js"></script>
<!-- ´úÂë ½áÊø -->


</div>
</body>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
<?php if(empty($_TPL['nosidebar'])) { ?>
<?php if($_SGLOBAL['ad']['contentbottom']) { ?><br style="line-height:0;clear:both;"/><div id="ad_contentbottom"><?php adshow('contentbottom'); ?></div><?php } ?>
</div>

<!--/mainarea-->

</div>
<!--/main-->
<?php } ?>

<div id="footer">
<?php if($_TPL['templates']) { ?>
<div class="chostlp" title="切换风格"><img id="chostlp" src="<?=$_TPL['default_template']['icon']?>" onmouseover="showMenu(this.id)" alt="<?=$_TPL['default_template']['name']?>" /></div>
<ul id="chostlp_menu" class="chostlp_drop" style="display: none">
<?php if(is_array($_TPL['templates'])) { foreach($_TPL['templates'] as $value) { ?>
<li><a href="cp.php?ac=common&op=changetpl&name=<?=$value['name']?>" title="<?=$value['name']?>"><img src="<?=$value['icon']?>" alt="<?=$value['name']?>" /></a></li>
<?php } } ?>
</ul>
<?php } ?>

<p class="r_option">
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>
</p>

<?php if($_SGLOBAL['ad']['footer']) { ?>
<p style="padding:5px 0 10px 0;"><?php adshow('footer'); ?></p>
<?php } ?>

<?php if($_SCONFIG['close']) { ?>
<p style="color:blue;font-weight:bold;">
提醒：当前站点处于关闭状态
</p>
<?php } ?>
<p>
<?=$_SCONFIG['sitename']?> - 
<a href="mailto:<?=$_SCONFIG['adminemail']?>">联系我们</a> - <a href="space.php?do=timer">时间轴</a>
<?php if($_SCONFIG['miibeian']) { ?> - <a  href="http://www.miibeian.gov.cn" target="_blank"><?=$_SCONFIG['miibeian']?></a><?php } ?>
</p>
<p>
Powered by <a  href="http://u.discuz.net" target="_blank"><strong>UCenter Home</strong></a> <span title="<?php echo X_RELEASE; ?>"><?php echo X_VER; ?></span>
<?php if(!empty($_SCONFIG['licensed'])) { ?><a  href="http://license.comsenz.com/?pid=7&host=<?=$_SERVER['HTTP_HOST']?>" target="_blank">Licensed</a><?php } ?>
&copy; 2001-2009 <a  href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>
</p>
<?php if($_SCONFIG['debuginfo']) { ?>
<p><?php echo debuginfo(); ?></p>
<?php } ?>
</div>
</div>
<!--/wrap-->

<?php if($_SGLOBAL['appmenu']) { ?>
<ul id="ucappmenu_menu" class="dropmenu_drop" style="display:none;">
<li><a href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>" target="_blank"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php if(is_array($_SGLOBAL['appmenus'])) { foreach($_SGLOBAL['appmenus'] as $value) { ?>
<li><a href="<?=$value['url']?>" title="<?=$value['name']?>" target="_blank"><?=$value['name']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<ul id="membernotemenu_menu" class="dropmenu_drop" style="display:none;">
<?php $member = $_SGLOBAL['member']; ?>
<?php if($member['notenum']) { ?><li><img src="image/icon/notice.gif" width="16" alt="" /> <a href="space.php?do=notice"><strong><?=$member['notenum']?></strong> 个新通知</a></li><?php } ?>
<?php if($member['pokenum']) { ?><li><img src="image/icon/poke.gif" alt="" /> <a href="cp.php?ac=poke"><strong><?=$member['pokenum']?></strong> 个新招呼</a></li><?php } ?>
<?php if($member['addfriendnum']) { ?><li><img src="image/icon/friend.gif" alt="" /> <a href="cp.php?ac=friend&op=request"><strong><?=$member['addfriendnum']?></strong> 个好友请求</a></li><?php } ?>
<?php if($member['mtaginvitenum']) { ?><li><img src="image/icon/mtag.gif" alt="" /> <a href="cp.php?ac=mtag&op=mtaginvite"><strong><?=$member['mtaginvitenum']?></strong> 个群组邀请</a></li><?php } ?>
<?php if($member['eventinvitenum']) { ?><li><img src="image/icon/event.gif" alt="" /> <a href="cp.php?ac=event&op=eventinvite"><strong><?=$member['eventinvitenum']?></strong> 个活动邀请</a></li><?php } ?>
<?php if($member['myinvitenum']) { ?><li><img src="image/icon/userapp.gif" alt="" /> <a href="space.php?do=notice&view=userapp"><strong><?=$member['myinvitenum']?></strong> 个应用消息</a></li><?php } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<?php if(!isset($_SCOOKIE['checkpm'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=pm&op=checknewpm&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php if(!isset($_SCOOKIE['synfriend'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=friend&op=syn&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php } ?>
<?php if(!isset($_SCOOKIE['sendmail'])) { ?>
<script language="javascript"  type="text/javascript" src="do.php?ac=sendmail&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>

<?php if($_SGLOBAL['ad']['couplet']) { ?>
<script language="javascript" type="text/javascript" src="source/script_couplet.js"></script>
<div id="uch_couplet" style="z-index: 10; position: absolute; display:none">
<div id="couplet_left" style="position: absolute; left: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<div id="couplet_rigth" style="position: absolute; right: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<script type="text/javascript">
lsfloatdiv('uch_couplet', 0, 0, '', 0).floatIt();
</script>
</div>
<?php } ?>
<?php if($_SCOOKIE['reward_log']) { ?>
<script type="text/javascript">
showreward();
</script>
<?php } ?>
<?php if($_SGLOBAL['supe_uid']) { ?>
<ul id="navigation">
            <li class="home"><a href="space.php?do=home" title="首页"></a></li>
             <li class="about"><a href="space.php?do=medicine" title="用药助手"></a></li>
            <li class="search"><a href="space.php?do=activity" title="活动"></a></li>
            <li class="photos"><a href="" title="Photos"></a></li>
            <li class="rssfeed"><a href="" title="Rss Feed"></a></li>
            <li class="podcasts"><a href="" title="Podcasts"></a></li>
            <li class="contact"><a href="" title="Contact"></a></li>
        </ul>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
         <script type="text/javascript">
         jQuery.noConflict();
            jQuery(function() {
                  jQuery('#navigation a').stop().animate({'margin-top':'-2px'},1000);

                jQuery('#navigation > li').hover(
                    function () {
                        jQuery('a',jQuery(this)).stop().animate({'margin-top':'-50px'},200);
                    },
                    function () {
                        jQuery('a',jQuery(this)).stop().animate({'margin-top':'-2px'},200);
                    }
                );
            });
        </script>
        <?php } ?>
</body>
</html>
<?php } ?><?php ob_out();?>