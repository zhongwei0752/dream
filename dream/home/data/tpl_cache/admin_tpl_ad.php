<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/ad|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/green/header|template/green/footer', '1369188505', 'admin/tpl/ad');?><?php $_TPL['pagetypes'] = array('header'=>'页头', 'rightside'=>'内容页面', 'footer'=>'页脚', 'couplet'=>'对联', 'contenttop'=>'页面主区域上方', 'contentbottom'=>'页面主区域下方', 'feedbox'=>'动态置顶位');
	$_TPL['availables'] = array('0'=>'-', '1'=>'有效'); ?>
<?php $_TPL['menunames'] = array(
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
<li<?=$actives['view']?>><a href="admincp.php?ac=ad"><span>浏览广告</span></a></li>
<li class="null"><a href="admincp.php?ac=ad&op=add">添加新广告</a></li>
</ul>
</div>


<?php if(empty($_GET['op'])) { ?>

<form method="post" action="admincp.php?ac=ad">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>系统内置广告</h3>
<p>广告位置已经内置，根据需要自己填写要显示的广告内容就可以了</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th>标题</th>
<th width="24%">页面位置</th>
<th width="8%">有效</th>
<th width="8%">编辑</th>
</tr>
<?php if(is_array($listvalue['1'])) { foreach($listvalue['1'] as $key => $value) { ?>
<tr>
<td><input type="checkbox" name="adids[]" value="<?=$value['adid']?>"> <?=$value['title']?></td>
<td><a href="admincp.php?ac=ad&pagetype=<?=$value['pagetype']?>"><?=$_TPL['pagetypes'][$value['pagetype']]?></a></td>
<td><?=$_TPL['availables'][$value['available']]?></td>
<td><a href="admincp.php?ac=ad&op=edit&adid=<?=$value['adid']?>">编辑</a></td>
</tr>
<?php } } ?>
</table>

<br />
<div class="title">
<h3>自定义广告列表</h3>
<p>可以自由决定广告的显示位置，只需要获取广告代码(模板内嵌代码，或者Javascript代码均可)，然后将广告代码插入到模板任意位置即可显示</p>
</div>


<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th>标题</th>
<th width="32%">调用广告</th>
<th width="8%">操作</th>
</tr>
<?php if(is_array($listvalue['0'])) { foreach($listvalue['0'] as $key => $value) { ?>
<tr>
<td><input type="checkbox" name="adids[]" value="<?=$value['adid']?>"> <?=$value['title']?></td>
<td><a href="admincp.php?ac=ad&op=tpl&adid=<?=$value['adid']?>">模板内嵌代码</a> | 
<a href="admincp.php?ac=ad&op=js&adid=<?=$value['adid']?>">Javascript代码</a></td>
<td><a href="admincp.php?ac=ad&op=edit&adid=<?=$value['adid']?>">编辑</a></td>
</tr>
<?php } } ?>
</table>
</div>

<div class="footactions">
<input type="checkbox" name="chkall" onclick="checkAll(this.form, 'adid')">全选
<input type="submit" name="delsubmit" value="批量删除" class="submit">
</div>

</form>

<?php } elseif($_GET['op'] == 'add' || $_GET['op'] == 'edit') { ?>
<script type="text/JavaScript">
function style_show(theobj) {
var styles,key;
styles = new Array('html','flash','image','text');
for(key in styles){
var obj=$('style_'+styles[key]);
obj.style.display = styles[key]==theobj.options[theobj.selectedIndex].value?'':'none';
}
}
</script>

<form method="post" action="admincp.php?ac=ad">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />

<div class="bdrcontent">

<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">广告类型</th>
<td><input type="radio" name="system" value="1" <?=$systems['1']?> onclick="$('style_system').style.display='';">系统内置广告 
<input type="radio" name="system" value="0" <?=$systems['0']?> onclick="$('style_system').style.display='none';">用户自定义广告
</td></tr>
<tr><th>广告标题</th>
<td><input name="title" value="<?=$advalue['title']?>" class="t_input"></td>
</tr>

<tbody id="style_system" style="display:<?php if($advalue['system']==0) { ?>none<?php } ?>">
<tr>
<th>页面位置</th>
<td>
<select name="pagetype">
<option value="header"<?=$pagetypes['header']?>>页面顶部 (宽970px)</option>
<option value="footer"<?=$pagetypes['footer']?>>页脚 (宽970px)</option>
<option value="contenttop"<?=$pagetypes['contenttop']?>>页面主区域上方 (宽800px)</option>
<option value="contentbottom"<?=$pagetypes['contentbottom']?>>页面主区域下方 (宽800px)</option>
<option value="rightside"<?=$pagetypes['rightside']?>>日志(话题)内容区域 (宽300px)</option>
<option value="couplet"<?=$pagetypes['couplet']?>>对联广告 (宽90px)</option>
<option value="feedbox"<?=$pagetypes['feedbox']?>>动态顶部 (宽500px)</option>
</select>
</td>
</tr>
<tr>
<th>有效性</th>
<td>
<input type="radio" name="available" value="1" <?=$availables['1']?>>有效
<input type="radio" name="available" value="0" <?=$availables['0']?>>无效
</td></tr>
</tbody>

<tr><th>广告方式</th><td>
<select name="adcode[type]" onchange="style_show(this)">
<option value="html" <?=$adcodes['html']?>>代码</option>
<option value="flash" <?=$adcodes['flash']?>>Flash</option>
<option value="image" <?=$adcodes['image']?>>Image</option>
<option value="text" <?=$adcodes['text']?>>文本</option>
</select>
</td></tr>
<tbody id="style_html" style="display:<?php if($advalue['adcode']['type']!='html') { ?>none<?php } ?>">
<tr>
<th>广告代码(必填)</th>
<td><textarea rows="10" style="width:98%;" name="adcode[html]"><?=$advalue['adcode']['html']?></textarea></td>
</tr>
</tbody>

<tbody id="style_flash" style="display:<?php if($advalue['adcode']['type']!='flash') { ?>none<?php } ?>">
<tr>
<th>Flash宽度(必填)</th>
<td><input name="adcode[flashwidth]" value="<?=$advalue['adcode']['flashwidth']?>" size="5"></td>
</tr>
<tr>
<th>Flash高度(必填)</th>
<td><input name="adcode[flashheight]" value="<?=$advalue['adcode']['flashheight']?>" size="5"></td>
</tr>
<tr>
<th>Flash URL(必填)</th>
<td><input name="adcode[flashurl]" value="<?=$advalue['adcode']['flashurl']?>" size="50"></td>
</tr>
</tbody>

<tbody id="style_image" style="display:<?php if($advalue['adcode']['type']!='image') { ?>none<?php } ?>">
<tr>
<th>图片地址(必填)</th>
<td><input name="adcode[imagesrc]" value="<?=$advalue['adcode']['imagesrc']?>" size="50"></td>
</tr>
<tr>
<th>图片链接(必填)</th>
<td><input name="adcode[imageurl]" value="<?=$advalue['adcode']['imageurl']?>" size="50"></td>
</tr>
<tr>
<th>图片宽度(选填)</th>
<td><input name="adcode[imagewidth]" value="<?=$advalue['adcode']['imagewidth']?>" size="5"></td>
</tr>
<tr>
<th>图片高度(选填)</th>
<td><input name="adcode[imageheight]" value="<?=$advalue['adcode']['imageheight']?>" size="5"></td>
</tr>
<tr>
<th>图片替换文字(选填)</th>
<td><input name="adcode[imagealt]" value="<?=$advalue['adcode']['imagealt']?>"></td>
</tr>
</tbody>

<tbody id="style_text" style="display:<?php if($advalue['adcode']['type']!='text') { ?>none<?php } ?>">
<tr>
<th>文字内容(必填)</th>
<td><input name="adcode[textcontent]" value="<?=$advalue['adcode']['textcontent']?>" size="50"></td>
</tr>
<tr>
<th>文字链接(必填)</th>
<td><input name="adcode[texturl]" value="<?=$advalue['adcode']['texturl']?>" size="50"></td>
</tr>
<tr>
<th>文字大小(选填)</th>
<td><input name="adcode[textsize]" value="<?=$advalue['adcode']['textsize']?>" size="5"> px</td>
</tr>
</tbody>
</table>
</div>

<div class="footactions">
<input type="hidden" name="adid" value="<?=$advalue['adid']?>">
<input type="submit" name="adsubmit" value="提交" class="submit">
</div>

</form>

<?php } elseif($_GET['op'] == 'tpl') { ?>
<div class="bdrcontent">
<div class="title"><h3>模版调用代码</h3></div>

<table class="formtable">
<tr><td>请将以下代码复制，放到站点模板的任意页面的指定位置即可。</td></tr>
<tr><td><input type="text" name="blockadcode" value="<?=$adcode?>" size="80"></td></tr>
</table>
</div>

<?php } elseif($_GET['op'] == 'js') { ?>

<div class="bdrcontent">
<div class="title"><h3>Javascript调用代码</h3></div>

<table class="formtable">
<tr><td><textarea name="blockadcode" style="width:98%;" rows="5"><?=$adcode?></textarea></td></tr>
</table>
</div>
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