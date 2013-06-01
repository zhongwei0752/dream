<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_mtag_index|template/green/header|template/green/footer', '1370027557', 'template/green/space_mtag_index');?><?php $_TPL['titles'] = array($mtag['tagname'], $mtag['title'], '首页'); ?>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
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


<h2 class="title">
<img src="image/icon/mtag.gif"><a href="space.php?do=mtag&id=<?=$mtag['fieldid']?>"><?=$mtag['title']?></a> -
<a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>"><?=$mtag['tagname']?></a>
</h2>
<div class="tabs_header">
<a href="cp.php?ac=share&type=mtag&id=<?=$mtag['tagid']?>" id="a_share" class="a_share" onclick="ajaxmenu(event, this.id, 1)">分享</a>
<div class="r_option">
<?php if(checkperm('managemtag')) { ?>
<a href="admincp.php?ac=mtag&tagid=<?=$mtag['tagid']?>" target="_blank">群组管理</a><span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=tagid&id=<?=$mtag['tagid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a><span class="pipe">|</span>
</div>
<ul class="tabs">
<li class="active"><a href="javascript:;"><span>首页</span></a></li>
<li><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=list"><span>讨论区</span></a></li>
<li><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=digest"><span>精华区</span></a></li>
<?php if($eventnum) { ?>
<li><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=event"><span>群组活动</span></a></li>
<?php } ?>
<li><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=member"><span>成员列表</span></a></li>
<?php if($mtag['allowthread']) { ?>
<li class="null"><a href="cp.php?ac=thread&tagid=<?=$mtag['tagid']?>">发起新话题</a></li>
<?php } ?>
<?php if(empty($mtag['ismember']) && $mtag['joinperm'] < 2) { ?>
<li class="null"><a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="mtag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">加入该群组</a></li>	
<?php } ?>
</ul>
</div>

<div id="content">

<div class="affiche">
<div id="space_avatar" class="floatleft"><img src="<?=$mtag['pic']?>" alt="<?=$mtag['tagname']?>" width="48" /></div>
<h3>公告</h3>
<div class="article">
<?php if($mtag['announcement']) { ?><?=$mtag['announcement']?><?php } else { ?>还没有公告<?php } ?>
</div>
</div>

<div class="topic_list">
<?php if($list) { ?>
<table cellspacing="0" cellpadding="0">
<thead>
<tr>
<td class="subject">主题</td>
<td class="author"><?php if($_GET['view']!='me') { ?>作者 <?php } ?>(回应/阅读)</td>
<td class="lastpost">最后更新</td>
</tr>
</thead>
<tbody>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<?php $magicegg = "" ?>							
<?php if($value[magicegg]) for($i=0; $i<$value[magicegg]; $i++) $magicegg .= '<img src="image/magic/egg/'.mt_rand(1,6).'.gif" />'; ?>
<tr <?php if($key%2==1) { ?> class="alt"<?php } ?>>
<td class="subject">
<!--<div style="width:290px;word-break:break-all;">-->
<?php if($value['displayorder']) { ?> [顶] <?php } ?>
<?php if($value['digest']) { ?> [精] <?php } ?>
<?php if($value['eventid']) { ?> [活] <?php } ?>
<?=$magicegg?>
<a href="space.php?uid=<?=$value['uid']?>&do=thread&id=<?=$value['tid']?>" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a>
<?php if($value['hot']) { ?>
<br><span class="gray"><?=$value['hot']?> 人推荐</span>
<?php } ?>
<!--</div>-->
</td>
<td class="author"><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a><br><?=$value['replynum']?>/<?=$value['viewnum']?></td>
<td class="lastpost"><a href="space.php?uid=<?=$value['lastauthorid']?>" title="<?=$_SN[$value['lastauthorid']]?>"><?=$_SN[$value['lastauthorid']]?></a><br><?php echo sgmdate('m-d H:i',$value[lastpost],1); ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<div class="r_option">
<a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=list">查看全部话题列表</a>
</div>
<?php } else { ?>
<div class="c_form">
<?php if(empty($mtag['allowview'])) { ?>
本群组目前不是公开状态，只对内部成员开放。<br>
<?php if($mtag['grade'] == -2) { ?>
您的加入申请审核中。请等候。
<?php } elseif($mtag['joinperm']==1) { ?>
您可以<a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="a_mtag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">选择加入该群组</a>，但你的申请需要经群主审核后才有效。
<?php } elseif($mtag['joinperm']==2) { ?>
您需要在收到群主的邀请后才能加入该群组。
<?php } else { ?>
您可以立即<a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="a_mtag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">选择加入该群组</a>。
<?php } ?>
<?php } else { ?>
还没有话题。
<?php } ?>
</div>
<?php } ?>
</div>

</div>

<div id="sidebar">



<div class="sidebox">
<h2 class="title">群组菜单</h2>
<ul class="menu_list">
<?php if($mtag['allowthread']) { ?>
<li><a href="cp.php?ac=thread&tagid=<?=$mtag['tagid']?>">发起话题</a></li>
<?php } ?>
<?php if(empty($mtag['ismember']) && $mtag['joinperm'] < 2) { ?>
<li><a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="a_mtag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">加入群组</a></li>	
<?php } ?>

<?php if($mtag['grade'] == 9) { ?>
<li><a href="cp.php?ac=event&tagid=<?=$mtag['tagid']?>">发起活动</a></li>
<?php } ?>
<?php if($mtag['grade'] >= 8) { ?>
<li><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=base">群组设置</a></li>
<?php } ?>
<?php if($mtag['grade'] >= 8) { ?>
<li><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members">成员管理</a></li>
<li><a href="admincp.php?ac=thread&&perpage=20&tagid=<?=$mtag['tagid']?>&searchsubmit=1" target="_blank">话题管理</a></li>
<li><a href="admincp.php?ac=post&&perpage=20&tagid=<?=$mtag['tagid']?>&searchsubmit=1">回帖管理</a></li>
<?php } elseif($mtag['ismember'] && !$mtag['closeapply']) { ?>
<li><a href="cp.php?ac=mtag&op=apply&tagid=<?=$mtag['tagid']?>" id="a_apply" onclick="ajaxmenu(event, this.id)">群主申请</a></li>
<?php } ?>
<?php if($mtag['allowinvite']) { ?>
<li><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=invite">邀请好友</a></li>
<?php } ?>
<?php if($mtag['ismember']) { ?>
<li><a href="cp.php?ac=mtag&op=out&tagid=<?=$mtag['tagid']?>" id="a_ignore_top" onclick="ajaxmenu(event, this.id)">退出群组</a></li>
<?php } ?>
</ul>
</div>


<div class="sidebox">
<h2 class="title">群组概况</h2>
<div style="padding:0 0 0 40px;">
<p>成员数：<?=$mtag['membernum']?></p>
<p>话题数：<?=$mtag['threadnum']?></p>
<p>回帖数：<?=$mtag['postnum']?></p>
</div>
</div>

<?php if($modlist) { ?>
<div class="sidebox">
<h2 class="title">
<span class="r_option"><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=member">全部</a></span>
群主
</h2>
<ul class="avatar_list">
<?php if(is_array($modlist)) { foreach($modlist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php if($checklist) { ?>
<div class="sidebox">
<h2 class="title">
<span class="r_option"><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=-2">立即处理</a></span>
有新的待审核成员
</h2>
<ul class="avatar_list">
<?php if(is_array($checklist)) { foreach($checklist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php if($starlist) { ?>
<div class="sidebox">
<h2 class="title">明星成员</h2>
<ul class="avatar_list s_clear">
<?php if(is_array($starlist)) { foreach($starlist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php if($memberlist) { ?>
<div class="sidebox">
<h2 class="title">
<span class="r_option"><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>&view=member">全部(<?=$mtag['membernum']?>)</a></span>
普通成员
</h2>
<ul class="avatar_list">
<?php if(is_array($memberlist)) { foreach($memberlist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p></li>
<?php } } ?>
</ul>
</div>
<?php } ?>

</div>

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
            <li class="photos"><a href="space.php?do=group" title="群组"></a></li>
            <li class="rssfeed"><a href="space.php?do=discussion" title="案例讨论"></a></li>
            <li class="podcasts"><a href="space.php?do=joke" title="医疗笑话"></a></li>
            <li class="contact"><a href="space.php?do=news&orderby=dateline" title="今日资讯"></a></li>
            <li class="zhuanti"><a href="space.php?do=subject" title="本周专题"></a></li>
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
<?php } ?>
<?php ob_out();?>