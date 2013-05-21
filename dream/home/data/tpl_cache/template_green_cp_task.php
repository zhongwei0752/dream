<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/cp_task|template/green/header|template/green/space_list|template/green/footer', '1368858923', 'template/green/cp_task');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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


<h2 class="title"><img src="image/icon/task.gif">有奖任务</h2>
<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['task']?>><a href="cp.php?ac=task"><span>待参与任务</span></a></li>
<li<?=$actives['done']?>><a href="cp.php?ac=task&view=done"><span>已参与任务</span></a></li>
<?php if($task) { ?>
<li<?=$actives['do']?>><a href="cp.php?ac=task&taskid=<?=$task['taskid']?>"><span>查看任务</span></a></li>
<?php } ?>
</ul>
</div>

<?php if($task) { ?>

<?php if($_GET['view']=='member') { ?>

<div class="h_status">
完成该任务的用户列表
</div>
<div class="space_list">
<?php if($list) { ?>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td width="65"><div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div></td>
<td>
<h2>
<?php if($ols[$value['uid']]) { ?><img src="image/online_icon.gif" align="absmiddle"> <?php } ?>
<a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"<?php g_color($value[groupid]); ?>><?=$_SN[$value['uid']]?></a>
<?php if($value['username'] && $_SN[$value['uid']]!=$value['username']) { ?><span class="gray">(<?=$value['username']?>)</span><?php } ?>
<?php g_icon($value[groupid]); ?>
<?php if($value['videostatus']) { ?>
<img src="image/videophoto.gif" align="absmiddle">
<?php } ?>
</h2>
<?php if($value['sex']==2) { ?><p>美女</p><?php } elseif($value['sex']==1) { ?><p>帅哥</p><?php } ?></p>
<p>
<?php if($_GET['view']=='show') { ?>竞价<?php } ?>积分：<?=$value['credit']?> / <?php if($value['experience']) { ?>经验：<?=$value['experience']?> / <?php } ?>人气：<?=$value['viewnum']?> / 好友：<?=$value['friendnum']?></p>
<?php if($value['note']) { ?><?=$value['note']?><?php } ?>
</td>
<td width="100">
<ul class="line_list">
<li><a href="space.php?uid=<?=$value['uid']?>">去串个门</a></li>
<li><a href="cp.php?ac=poke&op=send&uid=<?=$value['uid']?>" id="a_poke_<?=$key?>" onclick="ajaxmenu(event, this.id, 1)" title="打招呼">打个招呼</a></li>
<?php if(isset($value['isfriend']) && !$value['isfriend']) { ?><li><a href="cp.php?ac=friend&op=add&uid=<?=$value['uid']?>" id="a_friend_<?=$key?>" onclick="ajaxmenu(event, this.id, 1)" title="加好友">加为好友</a></li><?php } ?>	
</ul>
</td>
</tr>
</table>
<?php } } ?>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">没有相关成员。</div>
<?php } ?>
</div>



<?php } else { ?>

<div id="content">
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<table cellspacing="0" cellpadding="0" width="100%" class="task_notice">
<tr>
<td width="70"><img src="<?=$task['image']?>" width="64" height="64" alt="Icon" /></td>
<td>
<h3>有奖任务：<?=$task['name']?></h3>
<?php if($task['starttime']) { ?><p>开始时间：<?php echo sgmdate('Y-m-d H:i',$task[starttime]); ?></p><?php } ?>
<?php if($task['endtime']) { ?><p>结束时间：<?php echo sgmdate('Y-m-d H:i',$task[endtime]); ?></p><?php } ?>
<p><?=$task['note']?></p>
<?php if($task['credit']) { ?><p>奖励积分：<strong class="num"><?=$task['credit']?></strong></p><?php } ?>
</td>
</tr>
</table>
</div></div></div></div>

<div style="padding-top:20px;">
<?php if($task['done']) { ?>



<?php if($task['ignore']) { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>任务被放弃</h2>
<p>您已经放弃参与该任务，没有获得任何奖励。</p>
</caption>
<tr>
<td><a href="cp.php?ac=task&taskid=<?=$task['taskid']?>&op=redo" class="submit">重新参与</a></td>
</tr>
</table>
<?php } elseif($_SGLOBAL['task_maxnum']) { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>参与名额已满</h2>
<p>该有奖任务目前已经达到名额上限了。</p>
</caption>
<tr>
<td><a href="cp.php?ac=task" class="submit">看看其他任务</a></td>
</tr>
</table>
<?php } elseif($_SGLOBAL['task_available']) { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>任务失效</h2>
<p>该有奖任务目前已经停止了。</p>
</caption>
<tr>
<td><a href="cp.php?ac=task" class="submit">看看其他任务</a></td>
</tr>
</table>
<?php } else { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>成功完成任务</h2>
<p>恭喜，您已经领取到任务奖励！</p>
</caption>
<tr>
<td>
<?php if($task['credit']) { ?><p style="color:red;font-size:14px;padding:0 0 5px 0;font-weight:bold;">奖励积分 <?=$task['credit']?> 个，您现在已经有 <?=$space['credit']?> 个积分啦！</p><?php } ?>
<p>完成时间：<?php echo sgmdate('m-d H:i',$task[dateline],1); ?></p>
<p>参与人次：<a href="cp.php?ac=task&taskid=<?=$task['taskid']?>&view=member"><?=$task['num']?> 人</a></p>
</td>
</tr>
</table>
<?php if($task['result']) { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>任务额外奖励</h2>
</caption>
<tr>
<td><?=$task['result']?></td>
</tr>
</table>
<?php } ?>
<?php } ?>
<?php } else { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>参与任务的步骤说明</h2>
<p>请您仔细阅读下面的参与本任务的步骤说明，按照指示来完成操作并领取任务奖励。</p>
</caption>
<tr>
<td class="article l_status"><?=$task['guide']?></td>
</tr>
</table><br>

<?php if($_GET['view']=='result') { ?>
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<div class="task_notice">提示：请先按照上面的步骤说明完成任务后再点击领取奖励链接。</div>
</div></div></div></div>
<?php } ?>

<div style="text-align:center;padding:10px;">
<a href="cp.php?ac=task&taskid=<?=$task['taskid']?>&view=result" class="submit">领取奖励</a>
<a href="cp.php?ac=task&taskid=<?=$task['taskid']?>&op=ignore" class="button">暂时放弃</a>
</div>

<?php } ?>
</div>

</div>

<div id="sidebar">
<div class="sidebox">
<h2 class="title">
<a href="cp.php?ac=task&taskid=<?=$taskid?>&view=member" class="r_option">查看全部</a>
刚刚完成该任务的朋友
</h2>
<ul class="avatar_list">
<?php if(is_array($taskspacelist)) { foreach($taskspacelist as $key => $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"><?=$_SN[$value['uid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
</li>
<?php } } ?>
</ul>
</div>
</div>

<?php } ?>

<?php } else { ?>

<div id="content">

<div class="h_status">
按任务优先级排序，参与任务有大奖，开始吧。
</div>


<?php if($_GET['view'] != 'done') { ?>
<div class="task_percent">
<div class="percent" style="width: <?=$done_per?>%;">&nbsp;</div>
<div class="label">我当前的任务完成度 <?=$done_per?>%</div>
</div>
<?php } ?>

<?php if(empty($tasklist)) { ?>
<div class="c_form">已经没有新的任务啦。</div>
<?php } else { ?>
<?php if(is_array($tasklist)) { foreach($tasklist as $value) { ?>
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<table cellspacing="0" cellpadding="0" width="100%" class="task_notice">
<tr>
<td width="70"><img src="<?=$value['image']?>" width="64" height="64" alt="Icon" class="icon" /></td>
<td>
<h3><a href="cp.php?ac=task&taskid=<?=$value['taskid']?>"><?=$value['name']?></a></h3>
<?php if($value['num']) { ?>
<p>
<a href="cp.php?ac=task&taskid=<?=$value['taskid']?>&view=member">已参与人次： <?=$value['num']?></a>
<?php if($value['maxnum']) { ?>
/ 本任务还可参与 <?php echo $value[maxnum]-$value[num]; ?> 人次
<?php } ?>
</p>
<?php } ?>
<?php if($value['starttime']) { ?><p>开始时间：<?php echo sgmdate('Y-m-d H:i',$value[starttime]); ?></p><?php } ?>
<?php if($value['endtime']) { ?><p>结束时间：<?php echo sgmdate('Y-m-d H:i',$value[endtime]); ?></p><?php } ?>
<?=$value['note']?>
</td>
<td width="150" style="text-align:right;">
<?php if($value['done']) { ?>
<?php if($value['ignore']) { ?>
已经放弃该任务<br>
您可以选择<a href="cp.php?ac=task&taskid=<?=$value['taskid']?>&op=redo">重新完成该任务</a>
<?php } else { ?>
<?php if($value['credit']) { ?><p>获得积分：<strong class="num"><?=$value['credit']?></strong></p><?php } ?>
<a href="cp.php?ac=task&taskid=<?=$value['taskid']?>">查看任务</a>
<?php } ?>
<?php } else { ?>
<?php if($value['credit']) { ?><p>可获得积分：<strong class="num"><?=$value['credit']?></strong></p><?php } ?>
<a href="cp.php?ac=task&op=do&taskid=<?=$value['taskid']?>"><img src="image/start_task.gif" alt="立即参与任务" /></a>
<?php } ?>
</td>
</tr>
</table>
</div></div></div></div><br>
<?php } } ?>
<?php } ?>

</div>

<div id="sidebar">

<div class="sidebox">
<h2 class="title">
刚刚完成任务的朋友
</h2>
<ul class="avatar_list">
<?php if(is_array($taskspacelist)) { foreach($taskspacelist as $key => $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"><?=$_SN[$value['uid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
</li>
<?php } } ?>
</ul>
</div>

</div>

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
<?php } ?>
<?php ob_out();?>