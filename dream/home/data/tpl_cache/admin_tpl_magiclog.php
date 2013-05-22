<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/magiclog|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/green/header|template/green/footer', '1369188500', 'admin/tpl/magiclog');?><?php $_TPL['menunames'] = array(
		'index' => '管理首页',
		'config' => '站点设置',
		'privacy' => '隐私设置',
		'usergroup' => '用户组',
		'credit' => '积分规则',
		'profilefield' => '用户栏目',
		'profield' => '群组栏目',
		'eventclass' => '活动分类',
		'magic' => '道具设置',
		'task' => '有奖任务',
		'spam' => '防灌水设置',
		'censor' => '词语屏蔽',
		'ad' => '广告设置',
		'userapp' => 'MYOP应用',
		'joke' => '医疗笑话发布',
		'app' => 'UCenter应用',
		'network' => '随便看看',
		'cache' => '缓存更新',
		'log' => '系统log记录',
		'space' => '用户管理',
		'feed' => '动态(feed)',
		'share' => '分享',
		'blog' => '日志',
		'album' => '相册',
		'pic' => '图片',
		'comment' => '评论/留言',
		'thread' => '话题',
		'post' => '回帖',
		'doing' => '记录',
		'tag' => '标签',
		'mtag' => '群组',
		'poll' => '投票',
		'event' => '活动',
		'magiclog' => '道具记录',
		'report' => '举报',
		'block' => '数据调用',
		'template' => '模板编辑',
		'backup' => '数据备份',
		'stat' => '统计更新',
		'cron' => '系统计划任务',
		'click' => '表态动作',
		'ip' => '访问IP设置',
		'hotuser' => '推荐成员设置',
		'defaultuser' => '默认好友设置',
	); ?>
<?php $_TPL['nosidebar'] = 1; ?>
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


<style type="text/css">
@import url(admin/tpl/style.css);
</style>

<div id="cp_content">


<div class="mainarea">
<div class="maininner">

<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['holdlog']?>><a href="admincp.php?ac=magiclog&view=holdlog"><span>道具持有记录</span></a></li>
<li<?=$actives['inlog']?>><a href="admincp.php?ac=magiclog&view=inlog"><span>道具获取记录</span></a></li>
<li<?=$actives['uselog']?>><a href="admincp.php?ac=magiclog&view=uselog"><span>道具使用记录</span></a></li>
<?php if($allowmanage) { ?>
<li<?=$actives['storelog']?>><a href="admincp.php?ac=magiclog&view=storelog"><span>道具出售统计</span></a></li>
<?php } ?>
</ul>
</div>

<?php if($_GET['view'] == 'inlog') { ?>
<form method="get" action="admincp.php">
<div class="block style4">
<table cellspacing="3" cellpadding="3">
<tr>
<?php if($allowmanage) { ?>
<th>用户名</th><td><input type="text" name="username" value="<?=$_GET['username']?>"></td>
<?php } else { ?>
<th>用户名</th><td><input type="text" name="username" value="<?=$_SGLOBAL['supe_username']?>" disabled></td>
<?php } ?>
<th>道具</th>
<td>
<select name="mid">
<option value="">不限</option>
<?php if(is_array($_SGLOBAL['magic'])) { foreach($_SGLOBAL['magic'] as $key => $value) { ?>
<option value="<?=$key?>"<?php if($_GET['mid']==$key) { ?> selected<?php } ?>><?=$value?></option>
<?php } } ?>
</select>
</td>
</tr>
<tr>
<th>交易量</th>
<td>
<select name="count">
<option value="">不限</option>
<option value="1-4"<?php if($_GET['count']=='1-4') { ?> selected<?php } ?>>1 - 4</option>
<option value="5-9"<?php if($_GET['count']=='5-9') { ?> selected<?php } ?>>5 - 9</option>
<option value="10-49"<?php if($_GET['count']=='10-49') { ?> selected<?php } ?>>10 - 49</option>
<option value="50-99"<?php if($_GET['count']=='50-99') { ?> selected<?php } ?>>50 - 99</option>
<option value="100-99999"<?php if($_GET['count']=='100-99999') { ?> selected<?php } ?>>100以上</option>
</select>
</td>
<th>获得途径</th>
<td>
<select name="type">
<option value="">不限</option>
<option value="1"<?php if($_GET['type']==1) { ?> selected<?php } ?>>购买</option>
<option value="2"<?php if($_GET['type']==2) { ?> selected<?php } ?>>赠送</option>
<option value="3"<?php if($_GET['type']==3) { ?> selected<?php } ?>>升级</option>
</select>
</td>
</tr>
<tr>
<th>记录时间</th>
<td colspan="3">
<script type="text/javascript" src="source/script_calendar.js" charset="<?=$_SC['charset']?>"></script>
<input type="text" name="starttime" value="<?=$_GET['starttime']?>" onclick="showcalendar(event,this,1)"/> ~
<input type="text" name="endtime" value="<?=$_GET['endtime']?>"  onclick="showcalendar(event,this,1)" />
<input type="hidden" name="view" value="<?=$_GET['view']?>">
<input type="hidden" name="ac" value="magiclog">
<input type="submit" name="searchsubmit" value="搜索" class="submit">
</td>
</tr>
</table>
</div>
</form>

<?php if($list) { ?>
<div class="bdrcontent">
<table width="100%">
<tr>
<th>用户</th>
<th>方式</th>
<th>道具</th>
<th>数量</th>
<th>时间</th>
</tr>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td>
<a href="admincp.php?ac=magiclog&view=inlog&username=<?=$value['username']?>"><?=$value['username']?></a>
</td>
<td>
<?php if($value['type']==2) { ?>
获赠
<?php } elseif($value['type'] == 3) { ?>
升级用户组
<?php } else { ?>
购买
<?php } ?>
</td>
<td>
<a href="admincp.php?ac=magiclog&view=inlog&mid=<?=$value['mid']?>"><?=$_SGLOBAL['magic'][$value['mid']]?></a>
</td>
<td>
<?=$value['count']?>
</td>
<td>
<?php echo sgmdate('Y-m-d H:i', $value[dateline]) ?>
</td>
</tr>
<?php } } ?>	
</table>
</div>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } else { ?>
<div class="bdrcontent">
没有指定数据
</div>	
<?php } ?>

<?php } elseif($_GET['view'] == 'uselog') { ?>
<form method="get" action="admincp.php">
<div class="block style4">
<table cellspacing="3" cellpadding="3">
<tr>
<?php if($allowmanage) { ?>
<th>用户名</th><td><input type="text" name="username" value="<?=$_GET['username']?>"></td>
<?php } else { ?>
<th>用户名</th><td><input type="text" name="username" value="<?=$_SGLOBAL['supe_username']?>" disabled></td>
<?php } ?>
<th>道具</th>
<td>
<select name="mid">
<option value="">不限</option>
<?php if(is_array($_SGLOBAL['magic'])) { foreach($_SGLOBAL['magic'] as $key => $value) { ?>
<option value="<?=$key?>"<?php if($_GET['mid']==$key) { ?> selected<?php } ?>><?=$value?></option>
<?php } } ?>
</select>
</select>			
</td>
</tr>
<tr>
<th>作用对象类型</th>
<td>
<select name="idtype">
<option value="">不限</option>
<option value="blogid"<?php if($_GET['idtype']=='blogid') { ?> selected<?php } ?>>日志</option>
<option value="tid"<?php if($_GET['idtype']=='tid') { ?> selected<?php } ?>>话题</option>
<option value="cid"<?php if($_GET['idtype']=='cid') { ?> selected<?php } ?>>评论/留言</option>
<option value="uid"<?php if($_GET['idtype']=='uid') { ?> selected<?php } ?>>空间</option>
<option value="picid"<?php if($_GET['idtype']=='picid') { ?> selected<?php } ?>>图片</option>
<option value="pollid"<?php if($_GET['idtype']=='pollid') { ?> selected<?php } ?>>投票</option>
<option value="eventid"<?php if($_GET['idtype']=='eventid') { ?> selected<?php } ?>>活动</option>
</select>
</td>
<th>作用对象ID</th>
<td>
<input type="text" name="id" value="<?=$_GET['id']?>" />
</td>
</tr>
<tr>
<th>记录时间</th>
<td colspan="3">
<script type="text/javascript" src="source/script_calendar.js"></script>
<input type="text" name="starttime" value="<?=$_GET['starttime']?>" onclick="showcalendar(event,this,1)"/> ~
<input type="text" name="endtime" value="<?=$_GET['endtime']?>"  onclick="showcalendar(event,this,1)" />
<input type="hidden" name="view" value="<?=$_GET['view']?>">
<input type="hidden" name="ac" value="magiclog">
<input type="submit" name="searchsubmit" value="搜索" class="submit">
</td>
</tr>
</table>
</div>
</form>

<?php if($list) { ?>	
<div class="bdrcontent">	
<table width="100%">
<tr>
<th>用户</th>
<th>道具</th>
<th>时间</th>
</tr>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td>
<a href="admincp.php?ac=magiclog&view=uselog&username=<?=$value['username']?>"><?=$value['username']?></a>
</td>
<td>
<a href="admincp.php?ac=magiclog&view=uselog&mid=<?=$value['mid']?>"><?=$_SGLOBAL['magic'][$value['mid']]?></a>
</td>
<td>
<?php echo sgmdate('Y-m-d H:i', $value[dateline]) ?>
</td>
</tr>
<?php } } ?>	
</table>
</div>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } else { ?>
<div class="bdrcontent">
没有指定数据
</div>	
<?php } ?>
<?php } elseif($_GET['view'] == 'storelog') { ?>
<?php if($list) { ?>	
<div class="bdrcontent">
<h3>
共售出道具 <?=$totalcount?> 件，回收 <?=$totalcredit?> 积分
</h3>
<br />
<table width="100%">
<tr>
<th>道具</th>
<th>售出数</th>
<th>回收积分</th>
</tr>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td><a href="admincp.php?ac=magiclog&view=holdlog&mid=<?=$value['mid']?>"><?=$_SGLOBAL['magic'][$value['mid']]?></a></td>
<td><?=$value['sellcount']?></td>
<td><?=$value['sellcredit']?></td>
</td>
</tr>
<?php } } ?>	
</table>
</div>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } else { ?>
<div class="bdrcontent">
没有指定数据
</div>	
<?php } ?>
<?php } else { ?>
<form method="get" action="admincp.php">
<div class="block style4">
<table cellspacing="3" cellpadding="3">
<tr>
<?php if($allowmanage) { ?>
<th>用户UID</th><td><input type="text" name="uid" value="<?=$_GET['uid']?>"></td>
<th>用户名</th><td><input type="text" name="username" value="<?=$_GET['username']?>"></td>
<?php } else { ?>
<th>用户UID</th><td><input type="text" name="uid" value="<?=$_SGLOBAL['supe_uid']?>" disabled></td>
<th>用户名</th><td><input type="text" name="username" value="<?=$_GET['username']?>" disabled></td>
<?php } ?>
</tr>
<tr>
<th>道具</th>
<td colspan="3">
<select name="mid">
<option value="">不限</option>
<?php if(is_array($_SGLOBAL['magic'])) { foreach($_SGLOBAL['magic'] as $key => $value) { ?>
<option value="<?=$key?>"<?php if($_GET['mid']==$key) { ?> selected<?php } ?>><?=$value?></option>
<?php } } ?>
</select>
</select>	
<input type="hidden" name="view" value="<?=$_GET['view']?>">
<input type="hidden" name="ac" value="magiclog">
<input type="submit" name="searchsubmit" value="搜索" class="submit">		
</td>
</tr>
</table>
</div>
</form>

<?php if($list) { ?>	
<div class="bdrcontent">	
<table width="100%">
<tr>
<th>用户</th>
<th>道具</th>
<th>数量</th>
</tr>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td>
<a href="admincp.php?ac=magiclog&view=holdlog&uid=<?=$value['uid']?>">
<?=$value['username']?>
</a>
</td>
<td>
<a href="admincp.php?ac=magiclog&view=holdlog&mid=<?=$value['mid']?>"><?=$_SGLOBAL['magic'][$value['mid']]?></a>
</td>
<td>
<?=$value['count']?>
</td>
</tr>
<?php } } ?>	
</table>
</div>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } else { ?>
<div class="bdrcontent">
没有指定数据
</div>	
<?php } ?>

<?php } ?>

</div>
</div>

<div class="side">
<?php if($menus['0']) { ?>
<div class="block style1">
<h2>基本设置</h2>
<ul class="folder">
<?php if(is_array($acs['0'])) { foreach($acs['0'] as $value) { ?>
<?php if($menus['0'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } ?>

<div class="block style1">
<h2>批量管理</h2>
<ul class="folder">
<?php if(is_array($acs['3'])) { foreach($acs['3'] as $value) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } } ?>
<?php if(is_array($acs['1'])) { foreach($acs['1'] as $value) { ?>
<?php if($menus['1'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>

<?php if($menus['2']) { ?>
<div class="block style1">
<h2>高级设置</h2>
<ul class="folder">
<?php if(is_array($acs['2'])) { foreach($acs['2'] as $value) { ?>
<?php if($menus['2'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
<?php if($menus['0']['config']) { ?><li><a href="<?=UC_API?>" target="_blank">UCenter</a></li><?php } ?>
</ul>
</div>
<?php } ?>
</div>

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