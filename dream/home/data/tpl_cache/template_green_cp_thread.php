<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/cp_thread|template/green/header|template/green/cp_topic_menu|template/green/footer|template/green/space_topic_inc', '1369389219', 'template/green/cp_thread');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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


<?php if($_GET['op'] == 'edit') { ?>



<h1>编辑</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner">

<form id="editpostform_<?=$pid?>" name="editpostform_<?=$pid?>" method="post" action="cp.php?ac=thread&op=edit&pid=<?=$pid?>&tagid=<?=$tagid?>&eventid=<?=$eventid?>">
<table>
<tr>
<th style="vertical-align: top;"><label for="message">内容：</label></th>
<td>
<a href="###" id="face_<?=$pid?>" onclick="showFace(this.id, 'message_<?=$pid?>');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<img src="image/zoomin.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomTextarea('message_<?=$pid?>', 1)">
<img src="image/zoomout.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomTextarea('message_<?=$pid?>', 0)"><br/>
<textarea id="message_<?=$pid?>" name="message" onkeydown="ctrlEnter(event, 'posteditsubmit_btn');" <?php if($post['isthread']) { ?>rows="18" style="width:98%;"<?php } else { ?>rows="8" cols="50"<?php } ?>><?=$post['message']?></textarea>
</td>
</tr>
<tbody id="editwebimg">
<tr>
<th>图片：</th>
<td>
<input class="t_input" type="text" onfocus="if(this.value == 'http://')this.value='';" onblur="if(this.value=='')this.value='http://'" name="pics[]" value="http://" size="40" />&nbsp;
<a href="javascript:;" onclick="insertWebImg(this.previousSibling.previousSibling)">插入</a> &nbsp;
<a href="javascript:;" onclick="delRow(this, 'editwebimg')">删除</a>
</td>
</tr>
</tbody>
<tr>
<th>&nbsp;</th>
<td>
<a href="javascript:;" onclick="copyRow('editwebimg')">+增加图片</a> <span class="gray">只支持 .jpg、.gif、.png为结尾的URL地址</span>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td>
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="hidden" name="posteditsubmit" value="true" />
<?php if($_SGLOBAL['inajax']) { ?>
<input type="button" name="posteditsubmit_btn" id="posteditsubmit_btn" value="提交" class="submit" onclick="ajaxpost('editpostform_<?=$pid?>', 'post_edit', 1)" />
<?php } else { ?>
<input type="submit" name="posteditsubmit_btn" id="posteditsubmit_btn" value="提交" class="submit" />
<?php } ?>

<div id="__editpostform_<?=$pid?>"></div>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($_GET['op'] == 'delete') { ?>

<h1>删除回帖</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__deletepostform_<?=$pid?>">
<form id="deletepostform_<?=$pid?>" name="deletepostform_<?=$pid?>" method="post" action="cp.php?ac=thread&op=delete&pid=<?=$pid?>&tagid=<?=$tagid?>&eventid=<?=$eventid?>">
<p>确定删除指定的帖子吗？</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<?php if($_SGLOBAL['inajax']) { ?>
<input type="hidden" name="postdeletesubmit" value="true" />
<input type="button" name="postdeletesubmit_btn" value="提交" class="submit" onclick="ajaxpost('deletepostform_<?=$pid?>', 'post_delete', 2000)" />&nbsp;
<?php } else { ?>
<input type="submit" name="postdeletesubmit" value="提交" class="submit" />&nbsp;
<?php } ?>
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($_GET['op'] == 'edithot') { ?>

<h1>调整热度</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner">
<form method="post" action="cp.php?ac=thread&op=edithot&tid=<?=$tid?>">
<p class="btn_line">
新的热度：<input type="text" name="hot" value="<?=$thread['hot']?>" size="5">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="hidden" name="hotsubmit" value="true" />
<input type="submit" name="btnsubmit" value="确定" class="submit" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($_GET['op'] == 'reply') { ?>

<h1>回复</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner">
<form id="reply_postform_<?=$post['pid']?>" name="reply_postform_<?=$post['pid']?>" method="post" action="cp.php?ac=thread&eventid=<?=$eventid?>">
<table>
<tr>
<th><label for="message">内容：</label></th>
<td>
<a href="###" id="face_<?=$post['pid']?>" onclick="showFace(this.id, 'message_<?=$post['pid']?>');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<img src="image/zoomin.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomTextarea('message_<?=$post['pid']?>', 1)">
<img src="image/zoomout.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomTextarea('message_<?=$post['pid']?>', 0)"><br/>
<textarea id="message_<?=$post['pid']?>" name="message" onkeydown="ctrlEnter(event, 'postsubmit');" rows="8" cols="70"></textarea>
</td>
</tr>
<tbody id="replybimg">
<tr>
<td>图片：</td>
<td>
<input class="t_input" type="text" name="pics[]" onfocus="if(this.value == 'http://')this.value='';" onblur="if(this.value=='')this.value='http://'" value="http://" size="30" />&nbsp;
<a href="javascript:;" onclick="insertWebImg(this.previousSibling.previousSibling)">插入</a> &nbsp;
<a href="javascript:;" onclick="delRow(this, 'replybimg')">删除</a>
</td>
</tr>
</tbody>
<tr>
<th>&nbsp;</th>
<td>
<a href="javascript:;" onclick="copyRow('replybimg')">+增加图片</a> <span class="gray">只支持 .jpg、.gif、.png为结尾的URL地址</span>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="hidden" name="tid" value="<?=$post['tid']?>" />
<input type="hidden" name="pid" value="<?=$post['pid']?>" />
<?php if($_SGLOBAL['inajax']) { ?>
<input type="hidden" name="postsubmit" value="true" />
<input type="submit" name="postsubmit_btn" id="postsubmit" value="回复" class="submit" onclick="ajaxpost('reply_postform_<?=$post['pid']?>', 'post_add', 1)" />
<?php } else { ?>
<input type="submit" name="postsubmit" id="postsubmit" value="回复" class="submit" />
<?php } ?>
<div id="__reply_postform_<?=$post['pid']?>"></div>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } else { ?>

<script language="javascript" src="image/editor/editor_function.js"></script>
<script language="javascript" src="source/script_blog.js"></script>

<?php if($topic) { ?>
<h2 class="title">
<img src="image/app/topic.gif" />热闹 - <a href="space.php?do=topic&topicid=<?=$topicid?>"><?=$topic['subject']?></a>
</h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="javascript:;"><span>凑个热闹</span></a></li>
<li><a href="space.php?do=topic&topicid=<?=$topicid?>"><span>查看热闹</span></a></li>
</ul>
<?php if(checkperm('managetopic') || $topic['uid']==$_SGLOBAL['supe_uid']) { ?>
<div class="r_option">
<a href="cp.php?ac=topic&op=edit&topicid=<?=$topic['topicid']?>">编辑</a> | 
<a href="cp.php?ac=topic&op=delete&topicid=<?=$topic['topicid']?>" id="a_delete_<?=$topic['topicid']?>" onclick="ajaxmenu(event,this.id);">删除</a>
</p>
</div>
<?php } ?>
</div>


<div class="affiche">
<table width="100%">
<tr>
<?php if($topic['pic']) { ?>
<td width="160" id="event_icon" valign="top">
<img src="<?=$topic['pic']?>" width="150">
</td>
<?php } ?>
<td valign="top">
<h2>
<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a>
</h2>

<div style="padding:5px 0;"><?=$topic['message']?></div>
<ul>
<li class="gray">发起作者: <a href="space.php?uid=<?=$topic['uid']?>"><?=$_SN[$topic['uid']]?></a></li>
<li class="gray">发起时间: <?=$topic['dateline']?></li>
<?php if($topic['endtime']) { ?><li class="gray">参与截止: <?=$topic['endtime']?></li><?php } ?>
<?php if($topic['joinnum']) { ?>
<li class="gray">参与人次: <?=$topic['joinnum']?></li>
<?php } ?>
<li class="gray">最后参与: <?=$topic['lastpost']?></li>
</ul>

<?php if($topic['allowjoin']) { ?>
<a href="<?=$topic['joinurl']?>" class="feed_po" id="hot_add" onmouseover="showMenu(this.id)">凑个热闹</a>
<ul id="hot_add_menu" class="dropmenu_drop" style="display:none;">
<?php if(in_array('blog', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=blog&topicid=<?=$topicid?>">发表日志</a></li>
<?php } ?>
<?php if(in_array('pic', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=upload&topicid=<?=$topicid?>">上传图片</a></li>
<?php } ?>
<?php if(in_array('thread', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=thread&topicid=<?=$topicid?>">发起话题</a></li>
<?php } ?>
<?php if(in_array('poll', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=poll&topicid=<?=$topicid?>">发起投票</a></li>
<?php } ?>
<?php if(in_array('event', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=event&topicid=<?=$topicid?>">发起活动</a></li>
<?php } ?>
<?php if(in_array('share', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=share&topicid=<?=$topicid?>">添加分享</a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="r_option">该热闹已经截止</p>
<?php } ?>
</td>
</tr></table>
</div>

<?php } else { ?>
<h2 class="title">
<?php if($eventid) { ?>
<img src="image/app/event.gif">活动 - <a href="space.php?do=event&id=<?=$eventid?>"><?=$event['title']?></a>
<?php } else { ?>
<img src="image/app/mtag.gif" />群组
<?php } ?>
</h2>
<div class="tabs_header">
<ul class="tabs">
<?php if($eventid) { ?>
<li class="active"><a href="cp.php?ac=thread&eventid=<?=$eventid?>"><span>发表活动话题</span></a></li>
<li><a href="space.php?do=event&id=<?=$eventid?>"><span>返回活动</span></a></li>
<?php } elseif($thread) { ?>
<li class="active"><a href="cp.php?ac=thread&op=edit&pid=<?=$post['pid']?>"><span>编辑话题</span></a></li>
<li><a href="space.php?do=mtag&tagid=<?=$thread['tagid']?>&view=list"><span>返回讨论区</span></a></li>
<?php } else { ?>
<li class="active"><a href="cp.php?ac=thread"><span>发表新话题</span></a></li>
<li><a href="space.php?do=thread&view=me"><span>返回我的话题</span></a></li>
<?php } ?>
</ul>
</div>
<?php } ?>

<div class="c_form">

<style>
.userData {behavior:url(#default#userdata);}
</style>

<form method="post" action="cp.php?ac=thread&eventid=<?=$eventid?>" enctype="multipart/form-data">
<table cellspacing="4" cellpadding="4" width="100%" class="infotable">
<?php if($eventid) { ?>
<tr>
<td>
<input type="hidden" name="tagid" maxlength="100" value="<?=$tagid?>" />
</td>
</tr>
<?php } elseif(!$tagid) { ?>
<tr>
<td>
<select name="tagid" id="tagid">
<?php if(is_array($mtaglist)) { foreach($mtaglist as $fieldid => $values) { ?>
<?php if(is_array($values)) { foreach($values as $value) { ?>
<option value="<?=$value['tagid']?>">[<?=$_SGLOBAL['profield'][$value['fieldid']]['title']?>] <?=$value['tagname']?></option>>
<?php } } ?>
<?php } } ?>
</select>
<a href="cp.php?ac=mtag">创建新群组</a>
</td>
</tr>
<?php } else { ?>
<tr>
<td><?=$mtag['tagname']?><?php if(!$thread) { ?> [<a href="cp.php?ac=thread">切换</a>]<?php } ?>
<input type="hidden" name="tagid" value="<?=$tagid?>" />
</td>
</tr>
<?php } ?>
<tr>
<td><input type="text" class="t_input" id="subject" name="subject" value="<?=$thread['subject']?>" size="60" /></td>
</tr>
<tr>
<td>
<a id="doodleBox" href="magic.php?mid=doodle&showid=blog_doodle&target=uchome-ttHtmlEditor&from=editor" style="display:none"></a>
<textarea class="userData" name="message" id="uchome-ttHtmlEditor" style="height:100%;width:100%;display:none;border:0px"><?=$post['message']?></textarea>
<iframe src="editor.php?charset=<?=$_SC['charset']?>&allowhtml=<?php echo checkperm('allowhtml') ?>&doodle=<?php if(isset($_SGLOBAL['magic']['doodle'])) { ?>1<?php } ?>" name="uchome-ifrHtmlEditor" id="uchome-ifrHtmlEditor" scrolling="no" border="0" frameborder="0" style="width:100%;border: 1px solid #C5C5C5;" height="400"></iframe>
</td>
</tr>

<?php if(checkperm('seccode')) { ?>
<?php if($_SCONFIG['questionmode']) { ?>
<tr>
<td>
<p>请回答验证问题</p>
<p><?php question(); ?></p>
<input type="text" id="seccode" name="seccode" value="" size="15" class="t_input" />
</td>
</tr>
<?php } else { ?>
<tr>
<td>
<p>请填写验证码</p>
<script>seccode();</script>
<p>请输入上面的4位字母或数字，看不清可<a href="javascript:updateseccode()">更换一张</a></p>
<input type="text" id="seccode" name="seccode" value="" size="15" class="t_input" />
</td>
</tr>
<?php } ?>
<?php } ?>

<tr>
<td>
<input type="checkbox" name="makefeed" id="makefeed" value="1"<?php if(empty($mtag['viewperm']) && ckprivacy('thread', 1)) { ?> checked<?php } ?>> 产生动态 (<a href="cp.php?ac=privacy#feed" target="_blank">更改默认设置</a>)
</td>
</tr>

</table>
<input type="hidden" name="tid" value="<?=$thread['tid']?>" />
<input type="hidden" name="threadsubmit" value="true" />
<input type="button" id="threadbutton" name="threadbutton" value="提交发布" onclick="validate(this);" style="display: none;" />
<input type="hidden" name="topicid" value="<?=$_GET['topicid']?>" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
<?php if(!$thread['uid'] || $thread['uid']==$_SGLOBAL['supe_uid']) { ?>
<table cellspacing="4" cellpadding="4" width="100%" class="infotable">
<tr><td>
<input type="button" name="clickbutton[]" value="上传图片" class="button" onclick="edit_album_show('pic')">
<input type="button" name="clickbutton[]" value="插入图片" class="button" onclick="edit_album_show('album')">
</td></tr>
</table>
<?php } ?>
<table cellspacing="4" cellpadding="4" width="100%" id="uchome-edit-pic" class="infotable" style="display:none;">
<tr>
<td>
<strong>选择图片</strong>:
<table summary="Upload" cellspacing="2" cellpadding="0">
<tbody id="attachbodyhidden" style="display:none">
<tr>
<td>
<form method="post" id="upload" action="cp.php?ac=upload" enctype="multipart/form-data" target="uploadframe" style="background: transparent;">
<input type="file" name="attach" style="border: 1px solid #CCC;" />
<span id="localfile"></span>
<input type="hidden" name="uploadsubmit" id="uploadsubmit" value="true" />
<input type="hidden" name="albumid" id="albumid" value="0" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</td>
</tr>
</tbody>
<tbody id="attachbody"></tbody>
</table>
<strong>存储相册</strong>:
<table cellspacing="2" cellpadding="0">
<tr>
<td>
<select name="albumid" id="uploadalbum" onchange="addSort(this)">
<option value="-1">请选择相册</option>
<option value="-1">默认相册</option>
<?php if(is_array($albums)) { foreach($albums as $value) { ?>
<option value="<?=$value['albumid']?>"><?=$value['albumname']?></option>
<?php } } ?>
<option value="addoption" style="color:red;">+新建相册</option>
</select>
<script src="source/script_upload.js" type="text/javascript"></script>
<iframe id="uploadframe" name="uploadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellspacing="4" cellpadding="4" width="100%" class="infotable" id="uchome-edit-album" style="display:none;">
<tr>
<td>
选择相册: <select name="view_albumid" onchange="picView(this.value)">
<option value="none">选择一个相册</option>
<option value="0">默认相册</option>
<?php if(is_array($albums)) { foreach($albums as $value) { ?>
<option value="<?=$value['albumid']?>"><?=$value['albumname']?></option>
<?php } } ?>
</select> (点击图片可以插入到内容中)
<div id="albumpic_body"></div>
</td>
</tr>
</table>
<table cellspacing="4" cellpadding="4" width="100%" class="infotable">
<tr>
<td><input type="button" id="issuance" onclick="document.getElementById('threadbutton').click();" value="保存发布" class="submit" /></td>
</tr>
</table>
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
<?php } ?><?php ob_out();?>