<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/cp_mtag|template/green/header|template/green/footer', '1369389155', 'template/green/cp_mtag');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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
<li><a href="space.php?do=news&orderby=dateline">今日资讯</a></li>
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


<?php if($_GET['op']=='manage') { ?>

<?php if($_GET['subop'] != 'member') { ?>
<h2 class="title"><img src="image/app/mtag.gif" />群组 - <?=$mtag['tagname']?></h2>
<div class="tabs_header">
<ul class="tabs">
<?php if($mtag['grade'] >= 8) { ?>
<li<?=$actives['base']?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=base"><span>基本设置</span></a></li>
<?php } ?>
<?php if($mtag['allowinvite']) { ?>
<li<?=$actives['invite']?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=invite"><span>邀请好友</span></a></li>
<?php } ?>
<?php if($mtag['grade'] >= 8) { ?>
<li<?=$actives['members']?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members"><span>成员管理</span></a></li>
<li<?=$actives['thread']?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=thread"><span>话题批量管理</span></a></li>
<?php } ?>
<li><a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>"><span>返回群组首页</span></a></li>
</ul>
<?php if(($actives['members'] || $mtag['allowinvite']) && ($_GET['subop'] == 'invite' || $_GET['subop'] == 'members')) { ?>
<script>
function searchUser() {
$('searchform').submit();
}
</script>
<form name="searchform" id="searchform" method="get" action="cp.php">
<div style="float:right;margin:0 6px 5px 0;">
<table cellspacing="0" cellpadding="0">
<tr>
<td style="padding: 0;"><input type="text" id="key" name="key" value="搜索成员" onfocus="if(this.value=='搜索成员')this.value='';" class="t_input" tabindex="1" style="width: 160px; border-right: none;" /></td>
<td style="padding: 0;"><a href="javascript:searchUser();"><img src="image/search_btn.gif" alt="搜索" /></a></td>
</tr>
</table>
</div>
<input type="hidden" name="ac" value="mtag">
<input type="hidden" name="op" value="manage">
<input type="hidden" name="tagid" value="<?=$mtag['tagid']?>">
<input type="hidden" name="subop" value="<?=$_GET['subop']?>">
<input type="hidden" name="uid" value="<?=$_GET['uid']?>">
<input type="hidden" name="grade" value="<?=$_GET['grade']?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
<?php } ?>
</div>
<?php } ?>

<form id="manageform" name="manageform" method="post" action="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=<?=$_GET['subop']?>&uid=<?=$_GET['uid']?>&grade=<?=$_GET['grade']?>&group=<?=$_GET['group']?>&page=<?=$_GET['page']?>&start=<?=$_GET['start']?>">

<?php if($_GET['subop'] == 'base') { ?>

<table cellspacing="4" cellpadding="4" class="formtable">
<tr>
<th width="100">群组名</th>
<td><?=$mtag['tagname']?></td>
</tr>
<tr>
<th width="100"><label for="pic">封面图片</label></th>
<td><input id="pic" type="text" name="pic" value="<?=$mtag['pic']?>" size="80" class="t_input" /><br />请输入 http:// 开头的图片URL地址</td>
</tr>
<tr>
<th>
<label for="announcement">群组公告</label>
</th>
<td>
<textarea id="announcement" name="announcement" cols="80" rows="5"><?=$mtag['announcement']?></textarea>
<p class="gray">最多可以输入<strong>5000</strong> 个字符,多出的部分将被自动删除</p>	
</td>
</tr>

<?php if($mtag['grade']==9) { ?>
<?php if($field['manualmember']) { ?>
<tr>
<th width="100">加入权限</th>
<td>
<select name="joinperm">
<option value="0"<?=$joinperms['0']?>>公开(允许所有人可加入)</option>
<option value="1"<?=$joinperms['1']?>>审核(需要经批准后才可加入)</option>
<option value="2"<?=$joinperms['2']?>>私密(只允许群主邀请加入)</option>
</select>
</td>
</tr>
<?php } else { ?>
<tr>
<th width="100">加入权限</th>
<td>公开(允许所有人可加入)</td>
</tr>
<?php } ?>
<tr>
<th width="100">浏览权限</th>
<td>
<select name="viewperm">
<option value="0"<?=$viewperms['0']?>>公开(所有人可浏览)</option>
<option value="1"<?=$viewperms['1']?>>封闭(只对会员可见)</option>
</select>
<br>为了保护隐私，当群组的浏览权限设置为封闭时，成员的发帖或回帖操作将不产生个人动态。
</td>
</tr>
<tr>
<th width="100">发新话题权限</th>
<td>
<select name="threadperm">
<option value="0"<?=$threadperms['0']?>>需成为会员才可发话题</option>
<option value="1"<?=$threadperms['1']?>>所有人可发话题</option>
</select>
</td>
</tr>
<tr>
<th width="100">回帖权限</th>
<td>
<select name="postperm">
<option value="0"<?=$postperms['0']?>>需成为会员才可回帖</option>
<option value="1"<?=$postperms['1']?>>所有人可回帖</option>
</select>
</td>
</tr>

<tr>
<th>招纳群主</th>
<td>
<input type="radio" name="closeapply" value="0" <?=$closeapply['0']?>/> 开启
<input type="radio" name="closeapply" value="1" <?=$closeapply['1']?>/> 关闭
</td>
</tr>
<?php } ?>

<tr>
<th>&nbsp;</th>
<td>
<input type="submit" name="basesubmit" value="提交保存" class="submit" />&nbsp;
</td>
</tr>
</table>

<?php } elseif($_GET['subop'] == 'thread') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<td>
请登录管理平台，来对群组的话题、回帖进行批量删除、精华、置顶等操作。<br>
<br><a href="admincp.php?ac=thread&&perpage=20&tagid=<?=$mtag['tagid']?>&searchsubmit=1" class="submit">话题管理</a> &nbsp; 
<a href="admincp.php?ac=post&&perpage=20&tagid=<?=$mtag['tagid']?>&searchsubmit=1" class="submit">回帖管理</a>
</td>
</tr>
</table>

<?php } elseif($_GET['subop'] == 'invite') { ?>

<div id="content" style="width: 640px;">
<div class="h_status">
您可以给未加入本群组的好友们发送邀请。
</div>

<?php if($list) { ?>
<div class="h_status">
<ul class="avatar_list">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li><div class="avatar48"><a href="space.php?uid=<?=$value['fuid']?>" title="<?=$_SN[$value['fuid']]?>"><?php echo avatar($value[fuid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['fuid']?>" title="<?=$_SN[$value['fuid']]?>"><?=$_SN[$value['fuid']]?></a></p>
<p><?php if(empty($joins[$value['fuid']])) { ?><input type="checkbox" name="ids[]" value="<?=$value['fuid']?>">选定<?php } else { ?>已邀请<?php } ?></p>
</li>
<?php } } ?>
</ul>
<div class="page"><?=$multi?></div>
</div>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')">全选 &nbsp;
<input type="submit" name="invitesubmit" value="邀请" class="submit" />
</p>

<?php } else { ?>
<div class="c_form">还没有好友。</div>
<?php } ?>

</div>

<div id="sidebar" style="width: 150px;">
<div class="cat">
<h3>好友分类</h3>
<ul class="post_list line_list">
<li<?php if($_GET['group']==-1) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&tagid=<?=$mtag['tagid']?>&op=manage&subop=invite&group=-1">全部好友</a></li>
<?php if(is_array($groups)) { foreach($groups as $key => $value) { ?>
<li<?php if($_GET['group']==$key) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&tagid=<?=$mtag['tagid']?>&op=manage&subop=invite&group=<?=$key?>"><?=$value?></a></li>
<?php } } ?>
</ul>
</div>
</div>

<?php } elseif($_GET['subop'] == 'members') { ?>

<div id="content" style="width: 640px;">

<div class="h_status">
选择相应的用户进行用户等级变更。
</div>

<div class="h_status">
<?php if($list) { ?>
<ul class="avatar_list">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li><div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>" target="_blank"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p>
<p><input type="checkbox" name="ids[]" value="<?=$value['uid']?>">选定</p>
</li>
<?php } } ?>
</ul>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">还没有相关成员。</div>
<?php } ?>
</div>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')">全选 &nbsp;
设为：
<select name="newgrade">
<?php if($mtag['grade']==9) { ?>
<option value="9">主群主</option>
<option value="8">副群主</option>
<?php } ?>
<option value="1">明星成员</option>
<option value="0">普通成员</option>
<option value="-1">禁止发言</option>
<option value="-2">待审核成员</option>
<option value="-9">踢出群组</option>
</select>  &nbsp;
<input type="submit" name="memberssubmit" value="提交" class="submit" />
</p>
</div>

<div id="sidebar" style="width: 150px;">
<div class="cat">
<h3>成员级别</h3>
<ul class="post_list line_list">
<li<?php if($_GET['grade']==-2) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=-2">待审核</a></li>
<li<?php if($_GET['grade']==0) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=0">普通成员</a></li>
<li<?php if($_GET['grade']==9) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=9">群主</a></li>
<li<?php if($_GET['grade']==8) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=8">副群主</a></li>
<li<?php if($_GET['grade']==1) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=1">明星成员</a></li>
<li<?php if($_GET['grade']==-1) { ?> class="current"<?php } ?>><a href="cp.php?ac=mtag&op=manage&tagid=<?=$mtag['tagid']?>&subop=members&grade=-1">禁言成员</a></li>
</ul>
</div>
</div>

<?php } elseif($_GET['subop'] == 'member') { ?>

<h1>管理成员</h1>
<a href="javascript:hideMenu();" title="关闭" class="float_del">关闭</a>
<div id="<?=$_GET['uid']?>" class="popupmenu_inner">
<p>选择一个新身份：</p>
<p>
<select name="grade">
<option value="9"<?=$grades['9']?>>主群主</option>
<option value="8"<?=$grades['8']?>>副群主</option>
<option value="1"<?=$grades['1']?>>明星成员</option>
<option value="0"<?=$grades['0']?>>普通成员</option>
<option value="-1"<?=$grades['-1']?>>禁止发言</option>
<option value="-2"<?=$grades['-2']?>>待审核成员</option>
<option value="-9">踢出群组</option>
</select>
</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<button name="membersubmit" type="submit" class="submit" value="true">确定</button>
</p>
</div>

<?php } ?>

<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>

<?php } elseif($_GET['op']=='mtaginvite') { ?>

<h2 class="title"><img src="image/app/mtag.gif" />群组邀请</h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="cp.php?ac=mtag&op=mtaginvite"><span>群组邀请</span></a></li>
<li><a href="space.php?do=mtag&view=me"><span>返回我的群组</span></a></li>
</ul>
</div>

<div class="h_status">
您的好友邀请您加入以下群组
<?php if($invites) { ?>
<span class="pipe">|</span>
<a href="cp.php?ac=mtag&op=inviteconfirm&tagid=0&r=0"><span>忽略所有邀请</span></a>
<?php } ?>
</div>

<div class="c_form">
<?php if($invites) { ?>
<table cellspacing="4" cellpadding="4" class="formtable">
<?php if(is_array($invites)) { foreach($invites as $value) { ?>
<tr>
<td width="80">
<div class="threadimg60"><a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" target="_blank"><img src="<?=$value['pic']?>" width="60"></a></div></td>
<td class="h_status">
<p><a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" target="_blank" style="font-size:14px;font-weight:bold;"><?=$value['tagname']?></a></p>
<div id="tag_<?=$value['tagid']?>" style="padding:0.5em 0 0.5em 0;">
<p>已有 <?=$value['membernum']?> 人<?php if($value['viewperm']) { ?>, 只对会员开放浏览<?php } ?>, 所属分类: <?=$value['title']?></p>
邀请好友：<a href="space.php?uid=<?=$value['fromuid']?>" target="_blank"><?=$_SN[$value['fromuid']]?></a>
<br>邀请时间：<?php echo sgmdate('Y-m-d H:i', $value[dateline], 1); ?>
<p style="padding:1em 0 0 0;">
<a href="cp.php?ac=mtag&op=inviteconfirm&tagid=<?=$value['tagid']?>&r=1" class="submit" onclick="ajaxget(this.href, 'tag_<?=$value['tagid']?>');return false;">确认邀请</a> 
<a href="cp.php?ac=mtag&op=inviteconfirm&tagid=<?=$value['tagid']?>&r=0" class="button" onclick="ajaxget(this.href, 'tag_<?=$value['tagid']?>');return false;">忽略</a>
</p>
</div>
</td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
暂时没有新的群组邀请。
<?php } ?>

</div>	

<?php } elseif($_GET['op']=='join') { ?>

<h1>加入群组</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__joinform_<?=$tagid?>">
<form id="joinform_<?=$tagid?>" name="joinform_<?=$tagid?>" method="post" action="cp.php?ac=mtag&op=join&tagid=<?=$tagid?>">
<p>确定加入该群组吗？</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="submit" name="joinsubmit" value="加入" class="submit" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($_GET['op']=='out') { ?>

<h1>退出群组</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__outform">
<form id="outform" name="outform" method="post" action="cp.php?ac=mtag&op=out&tagid=<?=$mtag['tagid']?>">
<p>确定要退出该群组吗？</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="submit" name="outsubmit" value="退出" class="submit" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($_GET['op']=='apply') { ?>

<h1>申请群主</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__pmapplyform_<?=$tagid?>">
<form id="pmapplyform_<?=$tagid?>" name="pmapplyform_<?=$tagid?>" method="post" action="cp.php?ac=mtag&op=apply&tagid=<?=$tagid?>">
<table cellspacing="0" cellpadding="3">
<tr><td>请输入您申请群主的理由，您的申请会以短消息的方式发送给群主管理员。</td></tr>
<tr>
<td><textarea id="message" name="message" cols="40" rows="4" tabindex="3" style="width: 400px; height: 150px;" onkeydown="ctrlEnter(event, 'pmsubmit_btn');"></textarea></td>
</tr>
<tr>
<td>
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="hidden" name="pmsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<?php if($_SGLOBAL['inajax']) { ?>
<input type="button" name="pmsubmit_btn" id="pmsubmit_btn" value="申请" class="submit" onclick="ajaxpost('pmapplyform_<?=$tagid?>','',2000)" />
<?php } else { ?>
<input type="submit" name="pmsubmit_btn" id="pmsubmit_btn" value="申请" class="submit" />
<?php } ?>
</td>
</tr>
</table>
</form>
</div>


<?php } else { ?>

<h2 class="title"><img src="image/app/mtag.gif" />群组</h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="cp.php?ac=mtag"><span>创建新群组</span></a></li>
<li><a href="space.php?do=mtag&view=me"><span>返回我的群组</span></a></li>
</ul>
</div>

<?php if($_GET['op']=='multiresult') { ?>

<div class="c_form">
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>您已经成功加入以下群组</h2>
<p>现在，您就可以立即访问以下群组，与志同道合的朋友一起交流话题了。</p>
</caption>
<?php if(is_array($mtags)) { foreach($mtags as $value) { ?>
<tr>
<td><a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" target="_blank"><?=$value['tagname']?></a></td>
<td><?=$value['title']?></td>
<td><?=$value['membernum']?> 位成员</td>
<td><a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" class="submit">立即访问本群组</a></td>
</tr>
<?php } } ?>
</table>
</div>

<?php } elseif($_GET['op']=='confirm') { ?>

<?php if($findmtag) { ?>

<div class="c_form">
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><td width="90"><div class="threadimg60"><img src="<?=$findmtag['pic']?>" width="60" height="60"></div></td><td>
群组 <a href="space.php?do=mtag&tagid=<?=$findmtag['tagid']?>" target="_blank"><?=$findmtag['tagname']?></a> 已经存在
<br>已有 <?=$findmtag['membernum']?> 人参与
<br><br><a href="space.php?do=mtag&tagid=<?=$findmtag['tagid']?>" class="submit">访问群组</a>
</td></tr>
</table>
</div>

<?php } else { ?>

<form method="post" action="cp.php?ac=mtag" class="c_form">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<?php if($likemtags) { ?>
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>相似热门群组推荐</h2>
<p>以下热门的群组与您要创建的群组很接近，您可以不用创建新群组，而选择直接加入热门群组来与更多人一起讨论话题。</p>
</caption>
<?php if(is_array($likemtags)) { foreach($likemtags as $value) { ?>
<tr>
<td><a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" target="_blank"><?=$value['tagname']?></a></td>
<td><?=$value['membernum']?> 位成员</td>
<td>
<a href="space.php?do=mtag&tagid=<?=$value['tagid']?>" target="_blank">立即访问本群组</a>
<span class="pipe">|</span>
<?php if($value['joinperm'] < 2) { ?>
<a href="cp.php?ac=mtag&op=join&tagid=<?=$value['tagid']?>" id="mtag_like_<?=$value['tagid']?>" onclick="ajaxmenu(event, this.id)">选择加入该群组</a>
<?php } else { ?>
<strong>本群组需要群主邀请才可加入</strong>
<?php } ?>
</td>
</tr>
<?php } } ?>
</table>
<?php } ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>确认创建新群组吗？</h2>
</caption>
<tr>
<th width="120">要创建的群组名称</th>
<td><?=$newtagname?></td>
</tr>
<tr>
<th width="120">群组分类</th>
<td><?=$profield['title']?></td>
</tr>
<tr>
<td></td><td>
<input type="hidden" name="tagname" value="<?=$newtagname?>">
<input type="hidden" name="fieldid" value="<?=$fieldid?>">
<input type="hidden" name="joinmode" value="1">
<input type="submit" id="textsubmit" name="textsubmit" value="创建群组" class="submit"></td>
</tr>
</table>
</form>
<?php } ?>

<?php } else { ?>

<?php if($textarr) { ?>
<form method="post" action="cp.php?ac=mtag" class="c_form">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<table cellspacing="6" cellpadding="6" class="formtable">
<caption>
<h2>创建自己的新群组</h2>
<p>您可以自由创建一个属于自己的群组，并邀请好友，前来进行交流讨论。</p>
</caption>
<tr>
<th width="120">要创建的群组名</th>
<td><input type="text" name="tagname" value="" class="t_input"></td>
</tr>
<tr>
<th>选择一个合适的分类</th>
<td>
<select name="fieldid">
<?php if(is_array($textarr)) { foreach($textarr as $value) { ?>
<option value="<?=$value['fieldid']?>"><?=$value['title']?></option>
<?php } } ?>
</select>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" name="textsubmit" value="创建群组" class="submit"></td>
</tr>
</table>
</form>
<?php } ?>

<?php if($choicearr) { ?>
<form method="post" action="cp.php?ac=mtag" class="c_form">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<table cellspacing="6" cellpadding="6" class="formtable">
<caption>
<h2>加入站点固定群组</h2>
<p>您可以选择加入感兴趣的站点群组，与更多志同道合的朋友一起讨论相关话题。<br>对于已经加入的群组，如果您想取消选择，请访问相应群组首页后选择“退出群组”操作。</p>
</caption>
<?php if(is_array($choicearr)) { foreach($choicearr as $fid => $value) { ?>
<tr>
<th width="120"><?=$value['title']?></th>
<td>
<?php if($value['formtype']=='multi') { ?>
<table><tr>
<?php if(is_array($value['choice'])) { foreach($value['choice'] as $sk => $sv) { ?>
<td><input type="checkbox" name="tagname[<?=$fid?>][]" value="<?=$sv?>" <?php if($existmtag[$fid] && in_array($sv, $existmtag[$fid])) { ?>checked disabled<?php } ?>> <a href="space.php?do=mtag&fieldid=<?=$fid?>&tagname=<?php echo urlencode($sv); ?>" target="_blank"><?=$sv?></a></td>
<?php if($sk%3==2) { ?></tr><tr><?php } ?>
<?php } } ?>
</tr></table>
<?php } else { ?>
<table><tr>
<?php if(is_array($value['choice'])) { foreach($value['choice'] as $sk => $sv) { ?>
<td><input type="radio" name="tagname[<?=$fid?>]" value="<?=$sv?>" <?php if($existmtag[$fid] && in_array($sv, $existmtag[$fid])) { ?> checked <?php } ?> <?php if($existmtag[$fid]) { ?>disabled<?php } ?>> <a href="space.php?do=mtag&fieldid=<?=$fid?>&tagname=<?php echo urlencode($sv); ?>" target="_blank"><?=$sv?></a></td>
<?php if($sk%3==2) { ?></tr><tr><?php } ?>
<?php } } ?>
</tr></table>
<?php } ?>
</td>
</tr>
<?php } } ?>
<tr>
<th>&nbsp;</th>
<td><input type="submit" name="choicesubmit" value="加入群组" class="submit"></td>
</tr>
</table>
</form>
<?php } ?>

<form method="get" action="space.php" class="c_form">
<table cellspacing="6" cellpadding="6" class="formtable">
<caption>
<h2>搜索现有群组</h2>
<p>可以搜索一下，看看有没有自己感兴趣的群组，并申请成为成员。</p>
</caption>
<tr>
<th width="120">搜索群组名</th>
<td>
<input name="searchkey" value="" class="t_input" type="text">
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input name="searchsubmit" value="搜索群组" class="submit" type="submit"></td>
</tr>
</table>
<input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="do" value="mtag" />
<input type="hidden" name="view" value="hot" />
</form>

<?php } ?>

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