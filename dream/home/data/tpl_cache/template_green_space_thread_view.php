<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_thread_view|template/green/header|template/green/space_click|template/green/space_post_li|template/green/footer', '1370023946', 'template/green/space_thread_view');?><?php $_TPL['titles'] = array($thread['subject'], $mtag['tagname'], $mtag['title'], '话题'); ?>
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
<?php if($eventid) { ?>
<img src="image/app/event.gif">活动 - <a href="space.php?do=event&id=<?=$eventid?>"><?=$event['title']?></a>
<?php } else { ?>
<img src="image/app/mtag.gif"><a href="space.php?do=mtag&id=<?=$mtag['fieldid']?>"><?=$mtag['title']?></a> -
<a href="space.php?do=mtag&tagid=<?=$mtag['tagid']?>"><?=$mtag['tagname']?></a>
<?php } ?>
</h2>

<div class="tabs_header">

<ul class="tabs">
<?php if($eventid) { ?>
<li><a href="space.php?do=event&id=<?=$eventid?>&view=thread"><span>返回讨论区</span></a></li>
<?php } else { ?>
<li><a href="space.php?do=mtag&tagid=<?=$thread['tagid']?>&view=list"><span>返回讨论区</span></a></li>
<?php } ?>
<?php if($eventid) { ?>
<?php if($event['grade'] > 0 && $userevent['status']>=2) { ?>
<li class="null"><a href="cp.php?ac=thread&tagid=<?=$mtag['tagid']?>&eventid=<?=$eventid?>">发起新话题</a></li>
<?php } ?>
<?php } elseif(empty($mtag['ismember']) && $mtag['joinperm'] < 2) { ?>
<li class="null"><a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="mtag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">加入该群组</a></li>
<?php } elseif($mtag['allowpost']) { ?>
<li class="null"><a href="cp.php?ac=thread&tagid=<?=$mtag['tagid']?>">发起新话题</a></li>
<?php } ?>
</ul>
<?php if($_SGLOBAL['refer']) { ?>
<div class="r_option">
<a  href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
</div>
<?php } ?>
</div>

<div id="div_post">

<div class="board">
<?php if($thread['content']) { ?>
<div id="post_<?=$thread['content']['pid']?>_li">

<ul class="line_list">
<li>
<table width="100%">
<tr>
<td width="70" valign="top">
<div class="avatar48">
<a href="space.php?uid=<?=$thread['uid']?>"><?php echo avatar($thread[uid],small); ?></a>
</div>
</td>
<td>
<div class="title">
<a href="cp.php?ac=share&type=thread&id=<?=$thread['tid']?>" id="a_share" onclick="ajaxmenu(event, this.id, 1)" class="a_share">分享</a>
<div class="r_option">
<a href="cp.php?ac=common&op=report&idtype=tid&id=<?=$thread['tid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a><span class="pipe">|</span>
</div>

<?php $magicegg = "" ?>
<?php if($thread[magicegg]) for($i=0; $i<$thread[magicegg]; $i++) $magicegg .= '<img src="image/magic/egg/'.mt_rand(1,6).'.gif" />'; ?>
<h1 <?php if($thread['magiccolor']) { ?> class="magiccolor<?=$thread['magiccolor']?>"<?php } ?> ><?=$magicegg?> <?=$thread['subject']?></h1>
<?php if($thread['hot']) { ?><span class="hot"><em>热</em><?=$thread['hot']?></span><?php } ?>
<a href="space.php?uid=<?=$thread['uid']?>"><?=$_SN[$thread['uid']]?></a>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$thread[dateline],1); ?></span>


<?php if($topic) { ?>
<p style="padding:5px 0;">
<img src="image/app/topic.gif" align="absmiddle">
<strong>凑个热闹</strong>：<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a></p>
<?php } ?>

<?php if(!$eventid && $thread['eventid'] && $event) { ?>
<p style="padding:5px 0;"><strong>来自活动</strong>：<a href="space.php?do=event&id=<?=$event['eventid']?>&view=thread"><?=$event['title']?></a></p>
<?php } ?>
</div>

<div class="detail" id="detail_0">
<?php if($_SGLOBAL['ad']['rightside']) { ?>
<div style="float: right; padding:5px;"><?php adshow('rightside'); ?></div>
<?php } ?>
<?=$thread['content']['message']?>
<?php if($thread['content']['pic']) { ?><div><a href="<?=$thread['content']['pic']?>" target="_blank"><img src="<?=$thread['content']['pic']?>" alt="" class="resizeimg" /></a></div><?php } ?>

</div>

</td>
</tr>
</table>

<div id="click_div">

<div class="digc">
<table>
<tr>
<?php $clicknum = 0; ?>
<?php if(is_array($clicks)) { foreach($clicks as $value) { ?>
<?php $clicknum = $clicknum + $value['clicknum']; ?>
<?php $value['height'] = $maxclicknum?intval($value['clicknum']*50/$maxclicknum):0; ?>
<td valign="bottom"><a href="cp.php?ac=click&op=add&clickid=<?=$value['clickid']?>&idtype=<?=$idtype?>&id=<?=$id?>&hash=<?=$hash?>" id="click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>" onclick="ajaxmenu(event, this.id, 0, 2000, 'show_click')"><?php if($value['clicknum']) { ?><div class="digcolumn"><div class="digchart dc<?=$value['classid']?>" style="height:<?=$value['height']?>px;"><em><?=$value['clicknum']?></em></div></div><?php } ?><div class="digface"><img src="image/click/<?=$value['icon']?>" alt="" /><br /><?=$value['name']?></div></a></td>
<?php } } ?>
</tr>
</table>
</div>

<?php if($clickuserlist) { ?>
<div class="trace" style="padding-bottom: 10px;">

<div>
<h2>
刚表态过的朋友 (<a href="javascript:;" onclick="show_click('click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>')"><?=$clicknum?> 人</a>)
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon" />
<a id="a_magic_anonymous" href="magic.php?mid=anonymous&idtype=<?=$idtype?>&id=<?=$id?>" onclick="ajaxmenu(event,this.id, 1)" class="gray"><?=$_SGLOBAL['magic']['anonymous']?></a>
<?php } ?>					
</h2>
</div>
<div id="trace_div">
<ul class="avatar_list" id="trace_ul">
<?php if(is_array($clickuserlist)) { foreach($clickuserlist as $value) { ?>
<li>
<?php if($value['username']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>" target="_blank" title="<?=$value['clickname']?>"><?php echo avatar($value[uid], 'small'); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"  title="<?=$_SN[$value['uid']]?>" target="_blank"><?=$_SN[$value['uid']]?></a></p>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="<?=$value['clickname']?>" class="avatar" /></div>
<p>匿名</p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>

<?php if($click_multi) { ?><div class="page"><?=$click_multi?></div><?php } ?>

</div>

<table width="100%">			
<tr>
<td align="right">
<?php if($thread['uid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['icon']) { ?>
<img src="image/magic/icon.small.gif" class="magicicon">
<a href="magic.php?mid=icon&idtype=tid&id=<?=$thread['tid']?>" id="a_magic_icon" onclick="ajaxmenu(event,this.id,1)"><?=$_SGLOBAL['magic']['icon']?></a>							
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['icon']) { ?>
<img src="image/magic/color.small.gif" class="magicicon">
<?php if($thread['magiccolor']) { ?>
<a href="cp.php?ac=magic&op=cancelcolor&idtype=tid&id=<?=$thread['tid']?>" id="a_magic_color" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['color']?></a>
<?php } else { ?>
<a href="magic.php?mid=color&idtype=tid&id=<?=$thread['tid']?>" id="a_magic_color" onclick="ajaxmenu(event,this.id,1)"><?=$_SGLOBAL['magic']['color']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>
<?php } ?>
<?php if($mtag['grade']>=8 || $thread['uid']==$_SGLOBAL['supe_uid'] || ($eventid && $userevent['status']>=3)) { ?>
<a href="cp.php?ac=thread&op=edit&pid=<?=$thread['content']['pid']?>&tagid=<?=$thread['tagid']?><?php if($eventid) { ?>&eventid=<?=$eventid?><?php } ?>">编辑</a>
<a href="cp.php?ac=thread&op=delete&pid=<?=$thread['content']['pid']?>&tagid=<?=$thread['tagid']?><?php if($eventid) { ?>&eventid=<?=$eventid?><?php } ?>" id="p_<?=$thread['content']['pid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($thread['uid']==$_SGLOBAL['supe_uid'] || checkperm('managethread')) { ?>
<a href="cp.php?ac=topic&op=join&id=<?=$thread['tid']?>&idtype=tid" id="a_topicjoin_<?=$thread['tid']?>" onclick="ajaxmenu(event, this.id)">凑热闹</a><span class="pipe">|</span>
<?php } ?>
<?php if(checkperm('managethread')) { ?>
<a href="cp.php?ac=thread&tid=<?=$thread['tid']?>&op=edithot" id="a_hot_<?=$thread['tid']?>" onclick="ajaxmenu(event, this.id)">热度</a><span class="pipe">|</span>
<?php } ?>
<?php if((!$eventid && $mtag['allowpost']) || ($eventid && $userevent['status']>=2)) { ?><a href="#postform">回复</a>&nbsp;<?php } ?>
<?php if($mtag['grade']>=8 && !$eventid) { ?>
<?php if($thread['displayorder']) { ?>
<a href="cp.php?ac=thread&op=top&tagid=<?=$thread['tagid']?>&tid=<?=$thread['tid']?>&cancel" id="t_<?=$thread['tid']?>_top" onclick="ajaxmenu(event, this.id, 0, 2000)">取消置顶</a>&nbsp;
<?php } else { ?>
<a href="cp.php?ac=thread&op=top&tagid=<?=$thread['tagid']?>&tid=<?=$thread['tid']?>" id="t_<?=$thread['tid']?>_top" onclick="ajaxmenu(event, this.id, 0, 2000)">置顶</a>&nbsp;
<?php } ?>
<?php if($thread['digest']) { ?>
<a href="cp.php?ac=thread&op=digest&tagid=<?=$thread['tagid']?>&tid=<?=$thread['tid']?>&cancel" id="t_<?=$thread['tid']?>_digest" onclick="ajaxmenu(event, this.id, 0, 2000)">取消精华</a>
<?php } else { ?>
<a href="cp.php?ac=thread&op=digest&tagid=<?=$thread['tagid']?>&tid=<?=$thread['tid']?>" id="t_<?=$thread['tid']?>_digest" onclick="ajaxmenu(event, this.id, 0, 2000)">精华</a>
<?php } ?>
<?php } ?>
</td>
</tr>
</table>
</li>
</ul>

</div>

<?php } ?>
<div class="page"><?=$multi?></div>
<div id="post_ul">

<?php if($pid) { ?>
<div class="notice">
当前只显示与你操作相关的单个帖子，<a href="space.php?uid=<?=$thread['uid']?>&do=thread&id=<?=$thread['tid']?><?php if($eventid) { ?>&eventid=<?=$eventid?><?php } ?>">点击此处查看全部回帖</a>
</div>
<?php } ?>

<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if(empty($ajax_edit)) { ?><div id="post_<?=$value['pid']?>_li"><?php } ?>
<ul class="line_list">
<li>
<table width="100%">
<tr>
<td width="70" valign="top">
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
</td>
<td>
<div class="title">
<div class="r_option">
<?php if($mtag['grade']>=8 || $value['uid']==$_SGLOBAL['supe_uid'] || ($eventid && $userevent['status']>=3)) { ?>
<a href="cp.php?ac=thread&op=edit&pid=<?=$value['pid']?>" id="p_<?=$value['pid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<a href="cp.php?ac=thread&op=delete&pid=<?=$value['pid']?>&tagid=<?=$thread['tagid']?>" id="p_<?=$value['pid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['uid']!=$_SGLOBAL['supe_uid'] && (($mtag['allowpost'] && !$eventid) || ($eventid && $userevent['status']>1))) { ?><a href="cp.php?ac=thread&op=reply&pid=<?=$value['pid']?>" id="p_<?=$value['pid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a> <?php } ?>
<a href="cp.php?ac=common&op=report&idtype=post&id=<?=$value['pid']?>" id="a_report_<?=$value['pid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
<span class="gray">#<?=$value['num']?></span>
</div>
<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a> 
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>
</div>
<div class="detail" id="detail_<?=$value['pid']?>">
<?=$value['message']?>
<?php if($value['pic']) { ?><div><a href="<?=$value['pic']?>" target="_blank"><img src="<?=$value['pic']?>" class="resizeimg" /></a></div><?php } ?>
</div>
</td>
</tr>
</table>
</li>
</ul>
<?php if(empty($ajax_edit)) { ?></div><?php } ?>
<?php } } ?>
</div>

<div class="page"><?=$multi?></div>

<?php if((!$eventid && $mtag['allowpost']) || ($eventid && $userevent['status']>1)) { ?>

<div class="quickpost" id="postform">
<form method="post" action="cp.php?ac=thread<?php if($eventid) { ?>&eventid=<?=$eventid?><?php } ?>" class="quickpost" id="quickpostform_<?=$thread['tid']?>" name="quickpostform_<?=$thread['tid']?>">
<table>
<tr>
<td>
<a href="###" id="quickpost" onclick="showFace(this.id, 'message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea id="message" name="message" onkeydown="ctrlEnter(event, 'postsubmit_btn');" col="50" rows="6" style="width: 430px; height: 6em;"></textarea>
</td>
</tr>
<tr>
<td>插入图片</td>
</tr>
<tbody id="quickpostimg">
<tr>
<td>
<input type="text" name="pics[]" onfocus="if(this.value == 'http://')this.value='';" onblur="if(this.value=='')this.value='http://'" value="http://" class="t_input" size="55" style="width: 350px" />&nbsp;
<a href="javascript:;" onclick="insertWebImg(this.previousSibling.previousSibling)">插入</a> &nbsp;
<a href="javascript:;" onclick="delRow(this, 'quickpostimg')">删除</a>
</td>
</tr>
</tbody>
<tr>
<td><a href="javascript:;" onclick="copyRow('quickpostimg')">+增加图片</a> <span class="gray">只支持 .jpg、.gif、.png为结尾的URL地址</span></td>
</tr>
<tr>
<td>
<input type="hidden" name="tid" value="<?=$thread['tid']?>" />
<input type="hidden" name="postsubmit" value="true" />
<input type="button" id="postsubmit_btn" name="postsubmit_btn" value="回复" class="submit" onclick="ajaxpost('quickpostform_<?=$thread['tid']?>', 'post_add')" />
<div id="__quickpostform_<?=$thread['tid']?>"></div>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } else { ?>
<div class="c_form">
<?php if($eventid) { ?>
只有活动成员可以回复活动话题
<?php } elseif($mtag['grade']==-1) { ?>
您现在被群主禁言，不能参与讨论。
<?php } else { ?>
你还不是该群组正式成员，不能参与讨论。
<?php if($mtag['grade']==-9) { ?>
<a href="cp.php?ac=mtag&op=join&tagid=<?=$mtag['tagid']?>" id="_tag_join_<?=$mtag['tagid']?>" onclick="ajaxmenu(event, this.id)">现在就加入</a>。
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</div>
</div>

<script type="text/javascript">
resizeImg('div_post','600');
</script>

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
<?php } ?><?php ob_out();?>