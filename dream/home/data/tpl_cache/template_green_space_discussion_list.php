<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_discussion_list|template/green/header|template/green/space_menu|template/green/footer', '1369130915', 'template/green/space_discussion_list');?><?php $_TPL['titles'] = array('案例讨论'); ?>
<?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见'); ?>

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
<li><a href="space.php?do=home">首页</a></li>
<li><a href="space.php?do=medicine">用药助手</a></li>
<li><a href="space.php?do=activity">活动</a></li>
<li><a href="space.php?do=group">群组</a></li>
<li><a href="space.php?do=discussion">案例讨论</a></li>
<li><a href="space.php?do=joke">医疗笑话</a></li>
<li><a href="space.php?do=friend">好友</a></li>
<li><a href="network.php">随便看看</a></li>

<?php } else { ?>
<li><a href="index.php">首页</a></li>
<?php } ?>

<?php if($_SGLOBAL['appmenu']) { ?>
<?php if($_SGLOBAL['appmenus']) { ?>
<li class="dropmenu" id="ucappmenu" onclick="showMenu(this.id)">
<a href="javascript:;">站内导航</a>
</li>
<?php } else { ?>
<li><a target="_blank" href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php } ?>
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


<?php if(!empty($_SGLOBAL['inajax'])) { ?>
<div id="space_discussion" class="feed">
<h3 class="feed_header">
<a href="cp.php?ac=discussion" class="r_option" target="_blank">发表案例讨论</a>
案例讨论(共 <?=$count?> 篇)
</h3>
<?php if($count) { ?>
<ul class="line_list">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li>
<span class="gray r_option"><?php echo sgmdate('m-d H:i',$value[dateline],1); ?></span>
<h4><a href="space.php?uid=<?=$space['uid']?>&do=discussion&id=<?=$value['discussionid']?>" target="_blank" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a></h4>
<div class="detail">
<?=$value['message']?>
</div>
</li>
<?php } } ?>
</ul>
<?php if($pricount) { ?>
<div class="c_form">本页有 <?=$pricount?> 篇案例讨论因作者的隐私设置而隐藏</div>
<?php } ?>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">还没有相关的案例讨论。</div>
<?php } ?>
</div>
<?php } else { ?>

<?php if($space['self']) { ?>
<div class="searchbar floatright">
<form method="get" action="space.php">
<input name="searchkey" value="" size="15" class="t_input" type="text">
<input name="searchsubmit" value="搜索案例讨论" class="submit" type="submit">
<input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="do" value="discussion" />
<input type="hidden" name="view" value="all" />
<input type="hidden" name="orderby" value="dateline" />
</form>
</div>
<h2 class="title"><img src="image/app/blog.gif" />案例讨论</h2>
<div class="tabs_header">
<ul class="tabs">
<?php if($space['friendnum']) { ?><li<?=$actives['we']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=we"><span>好友最新案例讨论</span></a></li><?php } ?>
<li<?=$actives['all']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=all"><span>大家的案例讨论</span></a></li>
<li<?=$actives['me']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=me"><span>我的案例讨论</span></a></li>
<li<?=$actives['click']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=click"><span>我表态过的案例讨论</span></a></li>
<li class="null"><a href="cp.php?ac=discussion">发表新案例讨论</a></li>
</ul>
</div>		
<?php } else { ?>
<?php $_TPL['spacetitle'] = "案例讨论";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=$do&view=me\">TA的所有案例讨论</a>"; ?>
<div class="c_header a_header">
<div class="avatar48"><a href="space.php?uid=<?=$space['uid']?>"><?php echo avatar($space[uid],small); ?></a></div>
<?php if($_SGLOBAL['refer']) { ?>
<a class="r_option" href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
<?php } ?>
<p style="font-size:14px"><?=$_SN[$space['uid']]?>的<?=$_TPL['spacetitle']?></p>
<a href="space.php?uid=<?=$space['uid']?>" class="spacelink"><?=$_SN[$space['uid']]?>的主页</a>
<?php if($_TPL['spacemenus']) { ?>
<?php if(is_array($_TPL['spacemenus'])) { foreach($_TPL['spacemenus'] as $value) { ?> <span class="pipe">&raquo;</span> <?=$value?><?php } } ?>
<?php } ?>
</div>

<div class="h_status">按照发布时间排序</div>
<?php } ?>

<div id="content" style="width:800px;">
<?php if($_GET['orderby'] && $_GET['orderby'] != 'dateline') { ?>
<div class="h_status">
排行时间范围：
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>"<?=$day_actives['0']?>>全部</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=1"<?=$day_actives['1']?>>最近一天</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=2"<?=$day_actives['2']?>>最近两天</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=7"<?=$day_actives['7']?>>最近七天</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=30"<?=$day_actives['30']?>>最近三十天</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=90"<?=$day_actives['90']?>>最近三个月</a><span class="pipe">|</span>
<a href="space.php?do=discussion&view=all&orderby=<?=$_GET['orderby']?>&day=120"<?=$day_actives['120']?>>最近六个月</a>
</div>
<?php } ?>

<?php if($searchkey) { ?>
<div class="h_status">以下是搜索案例讨论 <span style="color:red;font-weight:bold;"><?=$searchkey?></span> 结果列表</div>
<?php } ?>

<?php if($count) { ?>
<div class="entry_list">
<ul>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li>
<div class="avatardiv">
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<?php if($value['hot']) { ?><div class="digb"><?=$value['hot']?></div><?php } ?>
</div>

<div class="title">
<a href="cp.php?ac=share&type=discussion&id=<?=$value['discussionid']?>" id="a_share_<?=$value['discussionid']?>" onclick="ajaxmenu(event, this.id, 1)" class="a_share">分享</a>
<h4><a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['discussionid']?>" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a></h4>
<div>
<?php if($value['friend']) { ?>
<span class="r_option locked gray"><a href="<?=$theurl?>&friend=<?=$value['friend']?>" class="gray"><?=$friendsname[$value['friend']]?></a></span>
<?php } ?>
<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a> <span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span><?php if($value['viewnum']) { ?><span class="gray"><a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['discussionid']?>" class="r_option"><?=$value['viewnum']?> 次阅读</a></span><?php } ?>
</div>
</div>
<div class="detail image_right l_text s_clear" id="discussion_article_<?=$value['discussionid']?>">
<?php if($value['pic']) { ?><p class="image"><a href="space.php?uid=<?=$value['uid']?>&do=discussion&id=<?=$value['discussionid']?>"><img src="<?=$value['pic']?>" alt="<?=$value['subject']?>" /></a></p><?php } ?>

<?=$value['message']?>
</div>
<div class="gray">
<?php if($classarr[$value['classid']]) { ?>分类: <a href="space.php?uid=<?=$value['uid']?>&do=discussion&classid=<?=$value['classid']?>"><?=$classarr[$value['classid']]?></a><span class="pipe">|</span><?php } ?>
<br/><hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">
<?php if($value['click_16']) { ?>
<?php $list3 = $value[clickuser]; ?>
<?php if(is_array($list3)) { foreach($list3 as $value3) { ?><a href="space.php?uid=<?=$value3['uid']?>" class="login_thumb" ><?php echo avatar($value3[uid]); ?></a><?php } } ?><div style="margin-top:22px;">等用户同意了此案例治疗方法。</div><hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">

<?php } ?>
<?php if($value['click_17']) { ?>
<?php $list4 = $value[clickuser2]; ?>
<?php if(is_array($list4)) { foreach($list4 as $value4) { ?><a href="space.php?uid=<?=$value4['uid']?>" class="login_thumb" ><?php echo avatar($value4[uid]); ?></a><?php } } ?><div style="margin-top:22px;">等用户反对了此案例治疗方法。</div><hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">

<?php } ?>

<?php if($value['replynum']) { ?>
<?php $list2 = $value[comments]; ?>
<?php if(is_array($list2)) { foreach($list2 as $value2) { ?><a href="space.php?uid=<?=$value2['authorid']?>" class="login_thumb" ><?php echo avatar($value2[authorid]); ?></a><?php } } ?><div style="margin-top:22px;">等用户评论了此案例。</div><hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">
<?php } ?>


</div>
</li>
<?php } } ?>
<?php if($pricount) { ?>
<li>
<div class="title">本页有 <?=$pricount?> 篇案例讨论因作者的隐私设置而隐藏</div>
</li>
<?php } ?>
</ul>
</div>

<div class="page"><?=$multi?></div>

<?php } else { ?>
<div class="c_form">还没有相关的案例讨论。</div>
<?php } ?>

</div>

<div id="sidebar" style="width:150px;">

<?php if($userlist) { ?>
<div class="cat">
<h3>按好友查看</h3>
<ul class="post_list line_list">
<li>
选择好友:<br>
<select name="fuidsel" onchange="fuidgoto(this.value);">
<option value="">全部好友</option>
<?php if(is_array($userlist)) { foreach($userlist as $value) { ?>
<option value="<?=$value['fuid']?>"<?=$fuid_actives[$value['fuid']]?>><?=$_SN[$value['fuid']]?></option>
<?php } } ?>
</select>
</li>
</ul>
</div>
<?php } ?>

<?php if($classarr) { ?>
<div class="cat">
<h3>案例讨论分类</h3>
<ul class="post_list line_list">
<li<?php if(!$_GET['classid']) { ?> class="current"<?php } ?>><a href="space.php?uid=<?=$space['uid']?>&do=discussion&view=me">全部案例讨论</a></li>
<?php if(is_array($classarr)) { foreach($classarr as $classid => $classname) { ?>
<li<?php if($_GET['classid']==$classid) { ?> class="current"<?php } ?>>
<?php if($space['self']) { ?>
<a href="cp.php?ac=class&op=edit&classid=<?=$classid?>" id="c_edit_<?=$classid?>" onclick="ajaxmenu(event, this.id)" class="c_edit">编辑</a>
<a href="cp.php?ac=class&op=delete&classid=<?=$classid?>" id="c_delete_<?=$classid?>" onclick="ajaxmenu(event, this.id)" class="c_delete">删除</a>
<?php } ?>
<a href="space.php?uid=<?=$space['uid']?>&do=discussion&classid=<?=$classid?>&view=me"><?=$classname?></a>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($_GET['view'] == 'click') { ?>
<div class="cat">
<h3>表态动作</h3>
<ul class="post_list line_list">
<li<?=$click_actives['all']?>><a href="space.php?do=discussion&view=click">全部动作</a></li>
<?php if(is_array($clicks)) { foreach($clicks as $value) { ?>
<li<?=$click_actives[$value['clickid']]?>>
<a href="space.php?do=discussion&view=click&clickid=<?=$value['clickid']?>"><?=$value['name']?></a>
</li>
<?php } } ?>
</ul>
</div>
<?php } elseif($_GET['view'] == 'all') { ?>
<div class="cat">
<h3>排行榜</h3>
<ul class="post_list line_list">
<li<?=$all_actives['all']?>><a href="space.php?do=discussion&view=all">推荐阅读</a></li>
<li<?=$all_actives['dateline']?>><a href="space.php?do=discussion&view=all&orderby=dateline">最新发表</a></li>
<li<?=$all_actives['hot']?>><a href="space.php?do=discussion&view=all&orderby=hot&day=<?=$_GET['hotday']?>">人气排行</a></li>
<li<?=$all_actives['replynum']?>><a href="space.php?do=discussion&view=all&orderby=replynum&day=<?=$_GET['hotday']?>">评论排行</a></li>
<li<?=$all_actives['viewnum']?>><a href="space.php?do=discussion&view=all&orderby=viewnum&day=<?=$_GET['hotday']?>">查看排行</a></li>
<?php if(is_array($clicks)) { foreach($clicks as $value) { ?>
<li<?=$all_actives['click_'.$value['clickid']]?>><a href="space.php?do=discussion&view=all&orderby=click_<?=$value['clickid']?>&day=<?=$_GET['hotday']?>"><?=$value['name']?>排行</a></li>
<?php } } ?>
</ul>

</div>
<?php } ?>

</div>

<script>
function fuidgoto(fuid) {
window.location.href = "space.php?do=discussion&view=we&fuid="+fuid;
}
</script>
<?php } ?>

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