<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/backup|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/green/header|template/green/footer', '1369188618', 'admin/tpl/backup');?><?php $_TPL['menunames'] = array(
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
<?php if($showform == 0) { ?>

<form method="post" action="admincp.php?ac=backup&op=export" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>数据备份</h3>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th colspan="2"><input type="radio" name="type" value="uchomes" checked onclick="$('showtables').style.display='none'">UCenter Home 全部数据</th>
</tr>
<tr>
<th><input type="radio" name="type" value="custom" onclick="$('showtables').style.display=''">自定义备份</th>
<td>根据需要自行选择需要备份的数据表</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="checkbox"  onclick="$('advanceoption').style.display=$('advanceoption').style.display == 'none' ? '' : 'none'; this.value = this.value == 1 ? 0 : 1; this.checked = this.value == 1 ? false : true" value="1">更多选项</td>
</tr>
</table>

<div id="showtables" style="display:none">
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><td><input type="checkbox" name="chkall" onclick="checkAll(this.form, 'customtables')" checked>全选 <strong>UCenter Home表</strong></td>
</table>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<?php if(is_array($uchome_tablelist)) { foreach($uchome_tablelist as $key => $value) { ?>
<?php if($key%4 == 0) { ?></tr><tr><?php } ?>
<td><input type="checkbox" name="customtables[]" value="<?=$value['Name']?>" checked><?=$value['Name']?></td>
<?php } } ?>
</tr>
</table>
</div>

<div id="advanceoption" style="display:none">

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th>备份方式</th>
</tr>
<tr>
<td><input type="radio" name="method" value="shell" <?=$shelldisabled?> onclick="if(<?=$dbversion?> < '4.1'){if(this.form.sqlcompat[2].checked==true) this.form.sqlcompat[0].checked=true; this.form.sqlcompat[2].disabled=true; this.form.sizelimit.disabled=true;} else {this.form.sqlcharset[0].checked=true; for(var i=1; i<=5; i++) {if(this.form.sqlcharset[i]) this.form.sqlcharset[i].disabled=true;}}">系统 MySQL Dump (Shell) 备份</td>
</tr>
<tr>
<td><input type="radio" name="method" value="multivol" checked onclick="this.form.sqlcompat[2].disabled=false; this.form.sizelimit.disabled=false; for(var i=1; i<=5; i++) {if(this.form.sqlcharset[i]) this.form.sqlcharset[i].disabled=false;}">UCenter Home 分卷备份: 文件长度限制 <input type="text" size="5" value="2048" name="sizelimit"> kb</td>
</tr>
</table>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th colspan="2">备份选项</th>
</tr>
<tr>
<th>使用扩展插入</th>
<td><input type="radio" value="1" name="extendins" checked>是 <input type="radio" value="0" name="extendins" checked>否</td>
</tr>
<tr>
<th>建表语句格式</th>
<td><input type="radio" value="" name="sqlcompat" checked>默认(MySQL<?=$dbversion?>) <input type="radio" value="MYSQL40" name="sqlcompat">MySQL 3.23/4.0.x  <input type="radio" value="MYSQL41" name="sqlcompat">MySQL 4.1.x/5.x </td>
</tr>
<tr>
<th>强制字符集</th>
<td>
<input class="radio" type="radio" name="sqlcharset" value="" checked>默认(<?=$_SC['dbcharset']?>)&nbsp;
<?php if($_SC['dbcharset']) { ?>
<input class="radio" type="radio" name="sqlcharset" value="<?=$_SC['dbcharset']?>"><?=$_SC['dbcharset']?>&nbsp;
<?php } ?>
<?php if($dbversion > '4.1' && $_SC['dbcharset'] != 'utf8') { ?>
<input class="radio" type="radio" name="sqlcharset" value="utf8">utf-8</option>
<?php } ?>
</td>
</tr>
<tr>
<th>十六进制方式</th>
<td><input type="radio" value="1" name="usehex" checked>是 <input type="radio" value="0" name="usehex" checked>否</td>
</tr>
<tr <?=$zipdisplay?>>
<th>压缩备份文件</th>
<td><input type="radio" value="1" name="usezip">多分卷压缩成一个文件 <input type="radio" value="2" name="usezip">每个分卷压缩成单独文件 <input type="radio" value="0" name="usezip" checked>不压缩</td>
</tr>
<tr>
<th>备份文件名</th>
<td><input type="text" size="40" value="<?=$filename?>" name="filename">.sql</td>
</tr>
</table>
</div>
</div>

<div class="footactions">
<input type="hidden" name="setup" value="1">
<input type="submit" value="提 交" class="submit">
</div>

</form>

<br />

<form method="post" action="admincp.php?ac=backup" name="thevalueform">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>数据恢复</h3>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr><td>服务器备份文件名: ./data/<input type="text" name="datafile" value="<?=$backupdir?>/" size="50"></td></tr>
</table>
</div>
<div class="footactions">
<input type="submit" name="importsubmit" value="提交" class="submit">
</div>

</form>

<br />

<form method="post" action="admincp.php?ac=backup" name="thevalueform">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>数据备份记录</h3>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th width="4%">&nbsp;</th>
<th>文件名</th>
<th width="15%">版本</th>
<th width="15%">类型</th>
<th width="10%">操作</th>
</tr>
<?php if(is_array($exportlog)) { foreach($exportlog as $key => $value) { ?>
<tr>
<td>
<input type="checkbox" name="delexport[]" value="<?=$value['filename']?>">
</td>
<td>
<a href="./data/<?=$value['filename']?>"><?php echo basename($value['filename']) ?></a> (<?=$value['size']?>)<br /><?=$value['dateline']?> 
<?php if($value['method'] == 'multivol' && $value['type'] != 'zip') { ?>
多卷
<?php } elseif($value['method'] == 'multivol') { ?>
SHELL
<?php } else { ?>
压缩
<?php } ?>
<?php if(!empty($value['volume'])) { ?>
(<?=$value['volume']?>)
<?php } ?>
</td>
<td><?=$value['version']?></td>
<td><?php if($value['type'] == 'custom') { ?>自定义备份<?php } else { ?>全部备份<?php } ?></td>
<td>
<?php if($value['type'] == 'zip') { ?>
<a href="admincp.php?ac=backup&op=import&do=zip&datafile=<?=$value['filename']?>">[解压]
<?php } else { ?>
<?php if($value['version'] != $x_ver) { ?>
<a href="admincp.php?ac=backup&op=import&do=import&datafile=<?=$value['filename']?>"  onclick="return confirm('确定导入?');">[导入]</a>
<?php } else { ?>
<a href="admincp.php?ac=backup&op=import&do=import&datafile=<?=$value['filename']?>">[导入]</a>
<?php } ?>
<?php } ?>
</td>
</tr>
<?php } } ?>
</table>
</div>

<div class="footactions">
<input type="checkbox" name="chkall" onclick="checkAll(this.form, 'delexport')">全选
<input type="submit" name="delexportsubmit" value="批量删除" class="submit">
</div>

</form>

<?php } elseif($showform == 1) { ?>

<form method="get" action="admincp.php" name="thevalueform">
<div class="bdrcontent">
<div class="title">
<h3>导入确认</h3>
</div>

<p>
<?php echo basename($datafile) ?><br />
导入版本:<?=$identify['1']?><br />
导入类型:<?php if($identify['2'] == 'custom') { ?>自定义备份<?php } else { ?>全部备份<?php } ?><br />
方式:<?php if($identify['3'] == 'multivol') { ?>多卷<?php } else { ?>Shell<?php } ?><br />
<br />确定导入吗?
</p>
</div>

<div class="footactions">
<input type="hidden" name="ac"  value="backup">
<input type="hidden" name="op" value="import">
<input type="hidden" name="do" value="zip">
<input type="hidden" name="datafile" value="<?=$datafile?>">
<input type="hidden" name="confirm" value="yes">
<input type="submit" name="confirmed" value="继续" class="submit">
<input type="button" value="返回" onClick="location.href='admincp.php?ac=backup'">
</div>
</form>

<?php } elseif($showform == 2) { ?>

<form method="get" action="admincp.php" name="thevalueform">
<div class="bdrcontent">
<div class="title">
<h3>自动导入确认</h3>
</div>

<p>所有分卷文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除。</p>

</div>

<div class="footactions">
<input type="hidden" name="ac"  value="backup">
<input type="hidden" name="op" value="import">
<input type="hidden" name="do" value="import">
<input type="hidden" name="datafile" value="<?=$datafile_vol1?>">
<input type="hidden" name="delunzip" value="yes">
<input type="submit" name="confirmed" value="继续" class="submit">
<input type="button" value="返回" onClick="location.href='admincp.php?ac=backup'">
</div>
</form>

<?php } elseif($showform == 3) { ?>

<form method="get" action="admincp.php" name="thevalueform">
<div class="bdrcontent">
<div class="title">
<h3>继续解压确认</h3>
</div>

<p><?=$info?><br />备份文件解压缩完毕，您需要自动解压缩其他的分卷文件吗？</p>
</div>

<div class="footactions">
<input type="hidden" name="ac"  value="backup">
<input type="hidden" name="op" value="import">
<input type="hidden" name="do" value="zip">
<input type="hidden" name="multivol" value="1">
<input type="hidden" name="datafile_vol1" value="<?=$datafile?>">
<input type="hidden" name="confirm" value="yes">
<input type="submit" name="confirmed" value="继续" class="submit">
<input type="button" value="返回" onClick="location.href='admincp.php?ac=backup'" class="submit">
</div>
</form>

<?php } elseif($showform == 4) { ?>

<form method="get" action="admincp.php" name="thevalueform">
<div class="bdrcontent">
<div class="title">
<h3>自动导入备份确认</h3>
</div>

<p>
<?php echo basename($datafile) ?><br />
导入版本:<?=$identify['1']?><br />
导入类型:<?php if($identify['2'] == 'custom') { ?>自定义备份<?php } else { ?>全部备份<?php } ?><br />
方式:<?php if($identify['3'] == 'multivol') { ?>多卷<?php } else { ?>Shell<?php } ?><br />
<br />备份文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除
</p>
</div>

<div class="footactions">
<input type="hidden" name="ac"  value="backup">
<input type="hidden" name="op" value="import">
<input type="hidden" name="do" value="import">
<input type="hidden" name="datafile" value="<?=$backupdir?>/<?=$importfile?>">
<input type="hidden" name="delunzip" value="yes">
<input type="submit" name="confirmed" value="继续" class="submit">
<input type="button" value="返回" onClick="location.href='admincp.php?ac=backup'" class="submit">
</div>
</form>
<?php } elseif($showform == 5) { ?>

<form method="get" action="admincp.php" name="thevalueform">
<div class="bdrcontent">
<div class="title">
<h3>自动导入备份确认</h3>
</div>

<p>分卷数据成功导入数据库，您需要自动导入本次其他的备份吗？</p>
</div>

<div class="footactions">
<input type="hidden" name="ac"  value="backup">
<input type="hidden" name="op" value="import">
<input type="hidden" name="do" value="import">
<input type="hidden" name="datafile" value="<?=$datafile_next?>">
<input type="hidden" name="autoimport" value="yes">
<?php if(isset($_GET['unzip'])) { ?>
<input type="hidden" name="delunzip" value="yes">
<?php } ?>
<input type="submit" name="confirmed" value="继续" class="submit">
<input type="button" value="返回" onClick="location.href='admincp.php?ac=backup'" class="submit">
</div>
</form>

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