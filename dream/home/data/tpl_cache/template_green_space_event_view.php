<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_event_view|template/green/header|template/green/space_pic|template/green/space_comment_li|template/green/space_comment_li|template/green/footer|template/green/space_click|template/green/space_comment_li', '1369992476', 'template/green/space_event_view');?><?php $_TPL['titles'] = array($event['title'], '活动'); ?>
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
<?php if($_SGLOBAL['refer']) { ?>
<div class="r_option">
<a  href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
</div>
<?php } ?>
<img src="image/icon/event.gif"/> <a href="space.php?do=event">活动</a> - <a href="space.php?do=event&id=<?=$event['eventid']?>"><?=$event['title']?></a>
<?php if($event['grade']==-2) { ?><span style="color:#f00"> 已关闭</span>
<?php } elseif($event['grade']<=0) { ?><span style="color:#f00"> 待审核</span>
<?php } ?>
</h2>
<div class="tabs_header">
<a href="cp.php?ac=share&type=event&id=<?=$eventid?>" id="a_share" onclick="ajaxmenu(event, this.id, 1)" class="a_share">分享</a>
<div class="r_option">
<?php if($_SGLOBAL['supe_uid'] == $event['uid'] || checkperm('manageevent')) { ?>
<a href="cp.php?ac=topic&op=join&id=<?=$event['eventid']?>&idtype=eventid" id="a_topicjoin_<?=$event['eventid']?>" onclick="ajaxmenu(event, this.id)">凑热闹</a><span class="pipe">|</span>
<?php } ?>
<?php if(checkperm('manageevent')) { ?>
<a href="admincp.php?ac=event&eventid=<?=$event['eventid']?>" target="_blank">审核管理</a><span class="pipe">|</span>
<a href="cp.php?ac=event&id=<?=$event['eventid']?>&op=edithot" id="a_hot_<?=$event['eventid']?>" onclick="ajaxmenu(event, this.id)">热度</a><span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=eventid&id=<?=$event['eventid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a><span class="pipe">|</span>
</div>

<ul class="tabs">
<li <?=$menu['all']?>><a href="space.php?do=event&id=<?=$event['eventid']?>"><span>活动</span></a></li>
            <li <?=$menu['member']?>><a href="space.php?do=event&id=<?=$event['eventid']?>&view=member&status=2"><span>成员</span></a></li>
<li <?=$menu['pic']?>><a href="space.php?do=event&id=<?=$event['eventid']?>&view=pic"><span>照片</span></a></li>
<?php if($event['tagid']) { ?>
<li <?=$menu['thread']?>><a href="space.php?do=event&id=<?=$event['eventid']?>&view=thread"><span>话题</span></a></li>
<?php } ?>
<li <?=$menu['comment']?>><a href="space.php?do=event&id=<?=$event['eventid']?>&view=comment"><span>留言</span></a></li>
</ul>
</div>

<?php if($view=="member") { ?>

<div class="sub_menu">
<div style="width:790px;">
<form name="searchform" id="searchform" method="get" action="space.php" style=" float: right;">
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 4px 0 0 0;"><input type="text" style="border-right: medium none; width: 160px;" tabindex="1" class="t_input" onfocus="if(this.value=='搜索成员')this.value='';" value="搜索成员" name="key" id="key"/></td>
<td style="padding: 4px 0 0 0;"><a href="javascript:$('searchform').submit();" style="padding:0; margin:0;"><img alt="搜索" src="image/search_btn.gif"/></a></td>
</tr>
</tbody>
</table>
<input type="hidden" name="do" value="event">
<input type="hidden" name="id" value="<?=$eventid?>">
<input type="hidden" name="view" value="member">
<input type="hidden" name="status" value="<?=$status?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
<a <?=$submenus['member']?> href="space.php?do=event&id=<?=$event['eventid']?>&view=member&status=2"><?=$event['membernum']?> 人参加</a>
<a <?=$submenus['follow']?> href="space.php?do=event&id=<?=$event['eventid']?>&view=member&status=1"><?=$event['follownum']?> 人关注</a><?php if($_SGLOBAL['supe_userevent']['status'] >= 3) { ?>
<a <?=$submenus['verify']?> href="space.php?do=event&id=<?=$event['eventid']?>&view=member&status=0"><?=$verifynum?> 人待审核</a><?php } ?>
</div>
</div>

<div class="thumb_list">
<?php if($members) { ?>
<table cellspacing="6" cellpadding="0">
<?php if(is_array($members)) { foreach($members as $key => $value) { ?>
<tr>
<td class="thumb <?php if($ols[$value['uid']]) { ?>online<?php } ?>">
<table cellpadding="4" cellspacing="4">
<tr>
<td class="image">
<div class="ar_r_t"><div class="ar_l_t"><div class="ar_r_b"><div class="ar_l_b">
<a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],'big'); ?></a>
</div></div></div></div>
</td>
<td>
<h6>
<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a>
<?php if($ols[$value['uid']]) { ?>
<span class="gray online_icon_p" title="当前在线" style="font-size:12px; font-weight:normal;">(<?php echo sgmdate('H:i',$ols[$value[uid]],1); ?>)</span>
<?php } ?>
</h6>
<p class="l_status">
<?php if($value['status'] != 1 && $_SGLOBAL['supe_userevent']['status']>=3 && $event['uid'] != $value['uid']) { ?>
<a href="cp.php?ac=event&id=<?=$eventid?>&op=member&uid=<?=$value['uid']?>" id="a_mod_<?=$key?>" onclick="ajaxmenu(event, this.id)" class="r_option" style="padding-left:0.5em;">管理该成员</a>
<?php } ?>
<span class="r_option gray" id="mtag_member_<?=$value['uid']?>">
<?php if($value['status']==4) { ?>发起人
<?php } elseif($value['status']==3) { ?>组织者
<?php } elseif($value['status']==2) { ?>成员
<?php } elseif($value['status']==0) { ?>待审核
<?php } ?>
</span>
<a href="cp.php?ac=friend&op=add&uid=<?=$value['uid']?>" id="a_friend_<?=$key?>" onclick="ajaxmenu(event, this.id, 1)">加为好友</a>
<span class="pipe">|</span><a href="cp.php?ac=pm&uid=<?=$value['uid']?>" id="a_pm_<?=$key?>" onclick="ajaxmenu(event, this.id, 1)">发短消息</a>
<span class="pipe">|</span><a href="cp.php?ac=poke&op=send&uid=<?=$value['uid']?>" id="a_poke_<?=$key?>" onclick="ajaxmenu(event, this.id, 1)">打招呼</a>
</p>

<p><span class="gray">性别：</span><?php if($value['sex']==2) { ?>美女<?php } elseif($value['sex']==1) { ?>帅哥<?php } else { ?>保密<?php } ?></p>
<?php if($value['resideprovince'] || $value['residecity']) { ?>
<p><span class="gray">地区：</span><a href="cp.php?ac=friend&op=search&resideprovince=<?=$value['resideprovince']?>&residecity=&searchmode=1"><?=$value['resideprovince']?></a> <a href="cp.php?ac=friend&op=search&resideprovince=<?=$value['resideprovince']?>&residecity=<?=$value['residecity']?>&searchmode=1"><?=$value['residecity']?></a></p>
<?php } ?>
<?php if($value['note']) { ?>
<p><span class="gray">状态：</span><?=$value['note']?></p>
<?php } ?>
<?php if($value['fellow']) { ?>
<p><span class="gray">携带好友数：</span><?=$value['fellow']?></p>
<?php } ?>
<?php if($event['template'] && $_SGLOBAL['supe_userevent']['status']>=3) { ?>
<p><?php echo nl2br(getstr($value[template], 255, 1, 0)) ?> </p>
<?php } ?>
</td>
</tr>
</table>
</td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
<div class="c_form">没有找到可浏览的成员信息。</div>
<?php } ?>
</div>

<div class="page"><?=$multi?></div>


<?php } elseif($view=="pic") { ?>

<?php if($picid) { ?>


<div class="h_status">
<div class="r_option">
<a href="<?=$theurl?>&goto=up">上一张</a><span class="pipe">|</span>
<a href="<?=$theurl?>&goto=down" id="nextlink">下一张</a><span class="pipe">|</span>
<?php if($_GET['play']) { ?>
<a href="javascript:;" id="playid" onclick="playNextPic(false);">停止播放</a>
<?php } else { ?>
<a href="javascript:;" id="playid" onclick="playNextPic(true);">幻灯播放</a>
<?php } ?><span id="displayNum"></span>
</div>

<?php if($album['picnum']) { ?>当前第 <?=$sequence?> 张<span class="pipe">|</span>共 <?=$album['picnum']?> 张图片<?php } ?>&nbsp;
<?php if($album['friend']) { ?>
<span class="locked gray"><?=$friendsname[$value['friend']]?></span>
<?php } ?>
</div>


<div class="photobox">

<div id="photo_pic" class="<?php if($pic['magicframe']) { ?> magicframe magicframe<?=$pic['magicframe']?><?php } ?>">
<?php if($pic['magicframe']) { ?>
<div class="pic_lb1">
<table cellpadding="0" cellspacing="0" class="">
<tr>
<td class="frame_jiao frame_top_left"></td>
<td class="frame_x frame_top_middle"></td>
<td class="frame_jiao frame_top_right"></td>
</tr>
<tr>
<td class="frame_y frame_middle_left"></td>
<td class="frame_middle_middle"><?php } ?><a href="<?=$theurl?>&goto=down"><img src="<?=$pic['pic']?>" alt="" /></a><?php if($pic['magicframe']) { ?></td>
<td class="frame_y frame_middle_right"></td>
</tr>
<tr>
<td class="frame_jiao frame_bottom_left"></td>
<td class="frame_x frame_bottom_middle"></td>
<td class="frame_jiao frame_bottom_right"></td>
</tr>
</table>
</div><?php } ?></div>


<div class="yinfo">
<p><?=$pic['title']?></p>

<?php if($topic) { ?>
<p>
<img src="image/app/topic.gif" align="absmiddle">
凑个热闹：<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a></p>
<?php } ?>

<?php if($do!='event' && $event['title']) { ?>
<p>来自活动：<a href="space.php?do=event&id=<?=$event['eventid']?>&view=pic"><?=$event['title']?></a></p>
<?php } ?>

<p class="gray">
<?php if($pic['hot']) { ?><span class="hot"><em>热</em><?=$pic['hot']?></span><?php } ?>
<?php if($do=='event') { ?><a href="space.php?uid=<?=$pic['uid']?>" target="_blank"><?=$_SN[$pic['uid']]?></a><?php } ?>
上传于 <?php echo sgmdate('Y-m-d H:i',$pic[dateline]); ?> (<?=$pic['size']?>)
</p>

<?php if(isset($_GET['exif'])) { ?>
<?php if($exifs) { ?>
<?php if(is_array($exifs)) { foreach($exifs as $key => $value) { ?>
<?php if($value) { ?><p><?=$key?> : <?=$value?></p><?php } ?>
<?php } } ?>
<?php } else { ?>
<p>无EXIF信息</p>
<?php } ?>
<?php } ?>
</div>


<table width="100%">
<tr><td align="left">
<a href="<?=$pic['pic']?>" target="_blank">查看原图</a>
<?php if(!isset($_GET['exif'])) { ?>
<span class="pipe">|</span><a href="<?=$theurl?>&exif">查看EXIF信息</a>
<?php } ?>
</td>
<td align="right">
<a href="cp.php?ac=share&type=pic&id=<?=$pic['picid']?>" id="a_share_<?=$pic['picid']?>" class="a_share" onclick="ajaxmenu(event, this.id, 1)" class="a_share">分享</a>

<?php if($pic['uid'] == $_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['frame']) { ?>
<img src="image/magic/frame.small.gif" class="magicicon">
<?php if($pic['magicframe']) { ?>
<a id="a_magic_frame" href="cp.php?ac=magic&op=cancelframe&idtype=picid&id=<?=$pic['picid']?>" onclick="ajaxmenu(event,this.id)">取消相框</a>
<?php } else { ?>
<a id="a_magic_frame" href="magic.php?mid=frame&idtype=picid&id=<?=$pic['picid']?>" onclick="ajaxmenu(event,this.id, 1)">加相框</a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=album&op=editpic&albumid=<?=$pic['albumid']?>&picid=<?=$pic['picid']?>">管理图片</a><span class="pipe">|</span>
<?php } ?>

<?php if($_SGLOBAL['supe_uid'] == $pic['uid'] || checkperm('managealbum')) { ?>
<a href="cp.php?ac=album&op=edittitle&albumid=<?=$pic['albumid']?>&picid=<?=$pic['picid']?>" id="a_set_title" onclick="ajaxmenu(event, this.id)">编辑说明</a><span class="pipe">|</span>
<a href="cp.php?ac=topic&op=join&id=<?=$pic['picid']?>&idtype=picid" id="a_topicjoin_<?=$pic['picid']?>" onclick="ajaxmenu(event, this.id)">凑热闹</a><span class="pipe">|</span>
<a href="admincp.php?ac=pic&picid=<?=$pic['picid']?>" target="_blank">删除</a><span class="pipe">|</span>
<?php } ?>

<?php if(checkperm('managealbum')) { ?>
<a href="cp.php?ac=album&picid=<?=$pic['picid']?>&op=edithot" id="a_hot_<?=$pic['picid']?>" onclick="ajaxmenu(event, this.id)">热度</a><span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=picid&id=<?=$pic['picid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</td></tr>
</table>
</div>

<div id="click_div" style="margin:0 auto;padding:10px;width:100%;text-align:left;">

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


<div style="padding-top:20px; width:100%; overflow:hidden;" id="pic_comment">

<h2>评论</h2>
<div class="page"><?=$multi?></div>
<div class="comments_list" id="comment">
<?php if($cid) { ?>
<div class="notice">
当前只显示与你操作相关的单个评论，<a href="<?=$theurl?>#comment">点击此处查看全部评论</a>
</div>
<?php } ?>

<ul id="comment_ul">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if(empty($ajax_edit)) { ?><li id="comment_<?=$value['cid']?>_li"><?php } ?>
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" class="avatar" /></div>
<?php } ?>
<div class="title">
<div class="r_option">

<?php if($value['authorid'] != $_SGLOBAL['supe_uid'] && $value['author'] == "" && $_SGLOBAL['magic']['reveal']) { ?>
<a id="a_magic_reveal_<?=$value['cid']?>" href="magic.php?mid=reveal&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id,1)"><img src="image/magic/reveal.small.gif" class="magicicon"><?=$_SGLOBAL['magic']['reveal']?></a>
<span class="pipe">|</span>
<?php } ?>

<?php if($value['authorid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon">
<a id="a_magic_anonymous_<?=$value['cid']?>" href="magic.php?mid=anonymous&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['anonymous']?></a>
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['flicker']) { ?>
<img src="image/magic/flicker.small.gif" class="magicicon">
<?php if($value['magicflicker']) { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="cp.php?ac=magic&op=cancelflicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['flicker']?></a>
<?php } else { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="magic.php?mid=flicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['flicker']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>

<a href="cp.php?ac=comment&op=edit&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<?php } ?>
<?php if($value['authorid']==$_SGLOBAL['supe_uid'] || $value['uid']==$_SGLOBAL['supe_uid'] || checkperm('managecomment')) { ?>
<a href="cp.php?ac=comment&op=delete&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['authorid']!=$_SGLOBAL['supe_uid'] && ($value['idtype'] != 'uid' || $space['self'])) { ?>
<a href="cp.php?ac=comment&op=reply&cid=<?=$value['cid']?>&feedid=<?=$feedid?>" id="c_<?=$value['cid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=comment&id=<?=$value['cid']?>" id="a_report_<?=$value['cid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</div>

<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>

</div>

<div class="detail<?php if($value['magicflicker']) { ?> magicflicker<?php } ?>" id="comment_<?=$value['cid']?>"><?=$value['message']?></div>

<?php if(empty($ajax_edit)) { ?></li><?php } ?>
<?php } } ?>
</ul>
</div>
<div class="page"><?=$multi?></div>
<form id="quickcommentform_<?=$picid?>" name="quickcommentform_<?=$picid?>" action="cp.php?ac=comment" method="post" class="quickpost" style="padding-bottom: 1em;">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="###" id="comment_face" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="5" cols="60" style="width: 380px;"></textarea>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="refer" value="<?=$theurl?>" />
<input type="hidden" name="id" value="<?=$picid?>">
<input type="hidden" name="idtype" value="picid">
<input type="hidden" name="commentsubmit" value="true">
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="评论" onclick="ajaxpost('quickcommentform_<?=$picid?>', 'comment_add')" />
<span id="__quickcommentform_<?=$picid?>"></span>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>

</div>


<script type="text/javascript">
<!--
var interval = 5000;
var timerId = -1;
var derId = -1;
var replay = false;
var num = 0;
var endPlay = false;
function forward() {
window.location.href = '<?=$theurl?>&goto=down&play=1';
}
function derivativeNum() {
num++;
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
}
function playNextPic(stat) {
if(stat || replay) {
derId = window.setInterval('derivativeNum();', 1000);
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
$('playid').innerHTML = '停止播放';
timerId = window.setInterval('forward();', interval);
} else {
replay = true;
num = 0;
if(endPlay) {
$('playid').innerHTML = '重新播放';
} else {
$('playid').innerHTML = '幻灯播放';
}
$('displayNum').innerHTML = '';
window.clearInterval(timerId);
window.clearInterval(derId);
}
}
<?php if($_GET['play']) { ?>
<?php if($sequence && $album['picnum']) { ?>
if(<?=$sequence?> == <?=$album['picnum']?>) {
endPlay = true;
playNextPic(false);
} else {
playNextPic(true);
}
<?php } else { ?>
playNextPic(true);
<?php } ?>
<?php } ?>

function update_title() {
$('title_form').style.display='';
}

//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

//-->
</script>


<?php } else { ?>
<div class="h_status">
<div class="r_option">
<?php if($_SGLOBAL['supe_userevent']['status'] >= 3) { ?>
<a href="cp.php?ac=event&op=pic&id=<?=$eventid?>">照片管理</a>
<?php } ?>
<?php if($event['grade']>0 && (($event['allowpic'] && $_SGLOBAL['supe_userevent']['status']>1) || $_SGLOBAL['supe_userevent']['status']>=3)) { ?>
<a href="cp.php?ac=upload&eventid=<?=$eventid?>" class="submit">上传新照片</a>
<?php } ?>
</div>
<span>活动相册 - 共 <?=$piccount?> 张照片</span>
</div>

<?php if($photolist) { ?>
<table cellspacing="6" cellpadding="0" width="100%" class="photo_list">
<tr>
<?php if(is_array($photolist)) { foreach($photolist as $key => $value) { ?>
<td>
<a title="<?=$value['title']?>" href="space.php?do=event&id=<?=$eventid?>&view=pic&picid=<?=$value['picid']?>">
<img alt="<?=$value['title']?>" src="<?=$value['pic']?>"/>
</a>
<p>
<span class="gray">来自</span> <a href="space.php?uid=<?=$value['uid']?>" style="display:inline;width:auto;height:auto;"><?=$_SN[$value['uid']]?></a>
</p>
</td>
<?php if($key%4==3) { ?></tr><tr><?php } ?>
<?php } } ?>
</tr>
</table>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">
<p style="text-align: center">还没有活动照片<?php if($event['grade']>0 && (($event['allowpic'] && $_SGLOBAL['supe_userevent']['status']>1) || $_SGLOBAL['supe_userevent']['status']>=3)) { ?>，我来<a href="cp.php?ac=upload&eventid=<?=$eventid?>">上传</a> <?php } ?></p>
</div>
<?php } ?>
<?php } ?>

<?php } elseif($view == "thread") { ?>
<div class="m_box">
<h2 class="h_status">
<div class="r_option">
<?php if($_SGLOBAL['supe_userevent']['status'] >= 3) { ?>
<a href="cp.php?ac=event&op=thread&id=<?=$eventid?>">话题管理</a>
<?php } ?>
<?php if($event['grade']>0 && $_SGLOBAL['supe_userevent']['status']>=2) { ?>
<a href="cp.php?ac=thread&tagid=<?=$event['tagid']?>&eventid=<?=$eventid?>" class="submit">发表新话题</a>
<?php } ?>
</div>
话题
</h2>
<?php if($threadlist) { ?>
<div class="topic_list">
<table cellspacing="0" cellpadding="0">
<thead>
<tr>
<td class="subject">主题</td>
<td class="author">作者 (回应/阅读)</td>
<td class="lastpost">最后更新</td>
</tr>
</thead>
<tbody>
<?php if(is_array($threadlist)) { foreach($threadlist as $key => $value) { ?>
<?php $magicegg = "" ?>
<?php if($value[magicegg]) for($i=0; $i<$value[magicegg]; $i++) $magicegg .= '<img src="image/magic/egg/'.mt_rand(1,6).'.gif" />'; ?>
<tr <?php if($key%2==1) { ?>class="alt"<?php } ?>>
<td class="subject">
<?=$magicegg?>
<a href="space.php?uid=<?=$value['uid']?>&do=thread&id=<?=$value['tid']?>&eventid=<?=$eventid?>" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a>
</td>
<td class="author"><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a><br><em><?=$value['replynum']?>/<?=$value['viewnum']?></em></td>
<td class="lastpost"><a href="space.php?uid=<?=$value['lastauthorid']?>" title="<?=$_SN[$value['lastauthorid']]?>"><?=$_SN[$value['lastauthorid']]?></a><br><?php echo sgmdate('m-d H:i',$value[lastpost],1); ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form" style="text-align:center;">还没有相关话题。
<?php if($event['grade']>0 && $_SGLOBAL['supe_userevent']['status']>=2) { ?>
<a href="cp.php?ac=thread&tagid=<?=$event['tagid']?>&eventid=<?=$eventid?>">我来发表</a><?php } ?>
</div>
<?php } ?>
</div>

<?php } elseif($view=="comment") { ?>

<div class="m_box">
<div class="h_status">
<span>活动留言</span>
</div>
<?php if($event['grade']>0 && ($event['allowpost'] || $_SGLOBAL['supe_userevent']['status'] > 1)) { ?>
<div class="space_wall_post">
<form action="cp.php?ac=comment" id="commentform_<?=$space['uid']?>" name="commentform_<?=$space['uid']?>" method="post">
<a href="###" id="message_face" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea name="message" id="comment_message" rows="5" cols="60" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
<input type="hidden" name="refer" value="space.php?do=event&id=<?=$eventid?>" />
<input type="hidden" name="id" value="<?=$eventid?>" />
<input type="hidden" name="idtype" value="eventid" />
<input type="hidden" name="commentsubmit" value="true" />
<br>
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="留言" onclick="ajaxpost('commentform_<?=$space['uid']?>', 'wall_add')" />
<span id="__commentform_<?=$space['uid']?>"></span>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<br>
<?php } elseif($event['grade']>0) { ?>
<textarea name="message" id="comment_message" rows="5" cols="60" readonly="">只有活动成员才能发布留言</textarea>
<?php } ?>
<?php if($cid) { ?>
<div class="notice">
当前只显示与你操作相关的单个评论，<a href="space.php?do=event&id=<?=$eventid?>&view=comment">点击此处查看全部评论</a>
</div>
<?php } ?>
<div class="page"><?=$multi?></div>
<div class="comments_list" id="comment">
<input type="hidden" value="1" name="comment_prepend" id="comment_prepend" />
<ul id="comment_ul">
<?php if(is_array($comments)) { foreach($comments as $value) { ?>
<?php if(empty($ajax_edit)) { ?><li id="comment_<?=$value['cid']?>_li"><?php } ?>
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" class="avatar" /></div>
<?php } ?>
<div class="title">
<div class="r_option">

<?php if($value['authorid'] != $_SGLOBAL['supe_uid'] && $value['author'] == "" && $_SGLOBAL['magic']['reveal']) { ?>
<a id="a_magic_reveal_<?=$value['cid']?>" href="magic.php?mid=reveal&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id,1)"><img src="image/magic/reveal.small.gif" class="magicicon"><?=$_SGLOBAL['magic']['reveal']?></a>
<span class="pipe">|</span>
<?php } ?>

<?php if($value['authorid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon">
<a id="a_magic_anonymous_<?=$value['cid']?>" href="magic.php?mid=anonymous&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['anonymous']?></a>
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['flicker']) { ?>
<img src="image/magic/flicker.small.gif" class="magicicon">
<?php if($value['magicflicker']) { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="cp.php?ac=magic&op=cancelflicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['flicker']?></a>
<?php } else { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="magic.php?mid=flicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['flicker']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>

<a href="cp.php?ac=comment&op=edit&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<?php } ?>
<?php if($value['authorid']==$_SGLOBAL['supe_uid'] || $value['uid']==$_SGLOBAL['supe_uid'] || checkperm('managecomment')) { ?>
<a href="cp.php?ac=comment&op=delete&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['authorid']!=$_SGLOBAL['supe_uid'] && ($value['idtype'] != 'uid' || $space['self'])) { ?>
<a href="cp.php?ac=comment&op=reply&cid=<?=$value['cid']?>&feedid=<?=$feedid?>" id="c_<?=$value['cid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=comment&id=<?=$value['cid']?>" id="a_report_<?=$value['cid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</div>

<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>

</div>

<div class="detail<?php if($value['magicflicker']) { ?> magicflicker<?php } ?>" id="comment_<?=$value['cid']?>"><?=$value['message']?></div>

<?php if(empty($ajax_edit)) { ?></li><?php } ?>
<?php } } ?>
</ul>
</div>
<div class="page"><?=$multi?></div>
</div>

<script type="text/javascript">
//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}
</script>

<?php } else { ?>

<div id="content" style="width:700px;">
<div class="m_box">
<div class="event">

<div class="event_icon">
<a href="<?=$event['pic']?>" target="_blank"><img class="poster_pre" src="<?=$event['pic']?>" alt="<?=$event['title']?>" onerror="this.src='<?=$_SGLOBAL['eventclass'][$event['classid']]['poster']?>'"></a>
</div>
<div class="event_content">
<dl>
<dt class="gray">发起者:</dt>
<dd><a href="space.php?uid=<?=$event['uid']?>"><?=$_SN[$event['uid']]?></a></dd>
<dt class="gray">活动类型:</dt>
<dd><?=$_SGLOBAL['eventclass'][$event['classid']]['classname']?></dd>
<dt class="gray">活动地点:</dt>
<dd><?=$event['province']?> <?=$event['city']?> <?=$event['location']?></dd>
<dt class="gray">活动时间:</dt>
<dd><?php echo sgmdate("m月d日 H:i", $event[starttime]) ?> - <?php echo sgmdate("m月d日 H:i", $event[endtime]) ?></dd>
<dt class="gray">截止报名:</dt>
<dd>
<?php if($event['deadline']>=$_SGLOBAL['timestamp']) { ?>
<?php echo sgmdate("m月d日 H:i", $event[deadline]) ?>
<?php } else { ?>
报名结束
<?php } ?>
</dd>
<dt class="gray">活动人数:</dt>
<dd><?php if($event['limitnum']) { ?><?=$event['limitnum']?> （还剩 <?php echo $event[limitnum] - $event[membernum] ?> 个名额）<?php } else { ?>不限<?php } ?></dd>
<dt class="gray">需要审核:</dt>
<dd><?php if($event['verify'] == 0) { ?>不<?php } ?>需要</dd>
</dl>
<ul>
<li><?=$event['viewnum']?> 次查看</li>
<li><?=$event['membernum']?> 人参加</li>
<li><?=$event['follownum']?> 人关注</li>
<?php if($verifynum && $_SGLOBAL['supe_userevent']['status']>=3) { ?><li><b><a href="cp.php?ac=event&id=<?=$eventid?>&op=members&status=0"><?=$verifynum?></a></b> 人待审核</li><?php } ?>
</ul>
<p class="event_state">
<?php if($event['hot']) { ?><span class="hot"><em>热</em><?=$event['hot']?></span><?php } ?>
<?php if(!empty($_SGLOBAL['supe_userevent']) && $_SGLOBAL['supe_userevent']['status'] == 0 && $_SGLOBAL['timestamp']<$event['endtime']) { ?>
您的报名正在审核中
<?php } elseif($_SGLOBAL['supe_userevent']['status'] == 1) { ?>
您关注了此活动
<?php } elseif($_SGLOBAL['supe_userevent']['status'] >= 2) { ?>
您参加了此活动
<?php } ?>

<?php if($event['starttime'] > $_SGLOBAL['timestamp']) { ?>
<?php if($countdown) { ?>
距活动开始还有 <?=$countdown?> 天
<?php } else { ?>
活动今天开始
<?php } ?>
<?php } elseif($event['starttime'] <= $_SGLOBAL['timestamp'] && $event['endtime'] >= $_SGLOBAL['timestamp']) { ?>
此活动正在进行中
<?php } else { ?>
活动已经结束
<?php } ?>
</p>
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']<=$event['endtime']) { ?>
<ul class="buttons">
<?php if(empty($_SGLOBAL['supe_userevent']) && $event['deadline'] > $_SGLOBAL['timestamp']) { ?>
<?php if($event['limitnum']==0 || $event['membernum']<$event['limitnum']) { ?>
<li><a id="a_join" href="cp.php?ac=event&op=join&id=<?=$eventid?>" onclick="ajaxmenu(event, this.id)" class="do_event_button">我要参加</a></li>
<?php } ?>
<li><a id="a_follow" href="cp.php?ac=event&op=follow&id=<?=$eventid?>" onclick="ajaxmenu(event, this.id)" class="wish_event_button">我要关注</a></li>
<?php } elseif(!empty($_SGLOBAL['supe_userevent']) && $_SGLOBAL['supe_userevent']['status'] == 0) { ?>
<?php if($event['deadline'] > $_SGLOBAL['timestamp'] && ($event['template'] || $event['allowfellow'])) { ?>
<li><a id="a_join" href="cp.php?ac=event&id=<?=$eventid?>&op=join" onclick="ajaxmenu(event, this.id)" class="cancel_event_button">修改报名信息</a></li>
<?php } ?>
<li><a id="a_quit" href="cp.php?ac=event&id=<?=$eventid?>&op=quit" onclick="ajaxmenu(event, this.id)" class="cancel_event_button">不参加了</a></li>
<?php } elseif($_SGLOBAL['supe_userevent']['status'] == 1) { ?>
<?php if($event['deadline'] > $_SGLOBAL['timestamp'] && ($event['limitnum']==0 || $event['membernum']<$event['limitnum'])) { ?>
<li><a id="a_join" href="cp.php?ac=event&op=join&id=<?=$eventid?>" onclick="ajaxmenu(event, this.id)" class="do_event_button">我要参加</a></li>
<?php } ?>
<li><a id="a_cancelfollow" href="cp.php?ac=event&id=<?=$eventid?>&op=cancelfollow" onclick="ajaxmenu(event, this.id)" class="cancel_event_button">取消关注</a></li>
<?php } elseif($_SGLOBAL['supe_userevent']['status'] > 1) { ?>
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']<= $event['deadline'] && ($event['limitnum'] <= 0 || $event['membernum'] < $event['limitnum']) && ($_SGLOBAL['supe_userevent']['status'] >= 3 || $event['allowinvite'])) { ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=invite" class="recs_event_button">邀请好友</a></li>
<?php } ?>
<?php if($_SGLOBAL['supe_uid'] != $event['uid']) { ?>
<li><a id="a_quit" href="cp.php?ac=event&id=<?=$eventid?>&op=quit" onclick="ajaxmenu(event, this.id)" class="cancel_event_button">不参加了</a></li>
<?php } ?>
<?php } ?>
</ul>
<?php } ?>
</div>
</div>
</div>

<div class="m_box">
<h3 class="feed_header">活动介绍</h3>
<div class="event_article">
<?=$event['detail']?>
</div>
</div>

<div class="m_box">
<h3 class="feed_header">
<div class="r_option"><a href="space.php?do=event&id=<?=$eventid?>&view=member&status=2">全部</a></div>
活动成员
</h3>
<?php if($members) { ?>
<ul class="avatar_list">
<?php if(is_array($members)) { foreach($members as $key => $userevent) { ?>
<li>
<div class="avatar48"><a title="<?=$_SN[$userevent['uid']]?>" href="space.php?uid=<?=$userevent['uid']?>"><?php echo avatar($userevent[uid]); ?></a></div>
<p>
<a href="space.php?uid=<?=$userevent['uid']?>"><?=$_SN[$userevent['uid']]?></a>
</p>
<?php if($event['allowfellow']) { ?>
<p><?php if($userevent['fellow']) { ?>携带 <?=$userevent['fellow']?> 人<?php } ?></p>
<?php } ?>
</li>
<?php } } ?>
</ul>
<?php } else { ?>
<p style="text-align:center;">还没有活动成员。
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']<= $event['deadline'] && ($event['limitnum'] <= 0 || $event['membernum'] < $event['limitnum']) && ($_SGLOBAL['supe_userevent']['status'] >= 3 || ($event['allowinvite'] && $_SGLOBAL['supe_userevent']['status']==2))) { ?>
<a href="cp.php?ac=event&id=<?=$eventid?>&op=invite">邀请好友参加</a>
<?php } ?>
</p>
<?php } ?>
</div>

<div class="m_box">
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<h2 class="atitle">
<div class="r_option">
<?php if($event['grade']>0 && (($event['allowpic'] && $_SGLOBAL['supe_userevent']['status']>1) || $_SGLOBAL['supe_userevent']['status']>=3)) { ?>
<a href="cp.php?ac=upload&eventid=<?=$eventid?>">上传</a> | <?php } ?>
<a href="space.php?do=event&id=<?=$eventid?>&view=pic">全部</a>
</div>
相册<?php if($event['picnum']) { ?> <span style="font-weight:normal">(共 <?=$event['picnum']?> 张照片)</span><?php } ?>
</h2>
<?php if($photolist) { ?>
<ul class="albs2">
<?php if(is_array($photolist)) { foreach($photolist as $key => $value) { ?>
<li>
<a title="<?=$value['title']?>" href="space.php?do=event&id=<?=$eventid?>&view=pic&picid=<?=$value['picid']?>">
<img style="width: 75px; height: 75px;" alt="<?=$value['title']?>" src="<?=$value['pic']?>"/></a>
<p style="text-align:left;">
<span class="gray">来自</span> <a href="space.php?uid=<?=$value['uid']?>" style="display:inline;width:auto;height:auto;"><?=$_SN[$value['uid']]?></a>
</p>
</li>
<?php } } ?>
</ul>
<?php } else { ?>
<p class="event_albs_p">还没有活动照片。<?php if($event['grade']>0 && (($event['allowpic'] && $_SGLOBAL['supe_userevent']['status']>1) || $_SGLOBAL['supe_userevent']['status']>=3)) { ?><a href="cp.php?ac=upload&eventid=<?=$eventid?>">我来上传</a> <?php } ?></p>
<?php } ?>
</div></div></div></div>
</div>

<?php if($event['tagid']) { ?>
<div class="m_box">
<h2 class="feed_header">
<div class="r_option">
<?php if($event['grade']>0 && $_SGLOBAL['supe_userevent']['status']>=2) { ?>
<a href="cp.php?ac=thread&tagid=<?=$event['tagid']?>&eventid=<?=$eventid?>">发表</a> | <?php } ?>
<a href="space.php?do=event&id=<?=$eventid?>&view=thread">全部</a>
</div>
话题<?php if($event['threadnum']) { ?> <span style="font-weight:normal">(共 <?=$event['threadnum']?> 个话题)</span><?php } ?>
</h2>
<?php if($threadlist) { ?>
<div class="topic_list">
<table cellspacing="0" cellpadding="0">
<thead>
<tr>
<td class="subject">主题</td>
<td class="author">作者 (回应/阅读)</td>
<td class="lastpost">最后更新</td>
</tr>
</thead>
<tbody>
<?php if(is_array($threadlist)) { foreach($threadlist as $key => $value) { ?>
<tr <?php if($key%2==1) { ?>class="alt"<?php } ?>>
<td class="subject">
<a href="space.php?uid=<?=$value['uid']?>&do=thread&id=<?=$value['tid']?>&eventid=<?=$eventid?>"><?=$value['subject']?></a>
</td>
<td class="author"><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a><br><em><?=$value['replynum']?>/<?=$value['viewnum']?></em></td>
<td class="lastpost"><a href="space.php?uid=<?=$value['lastauthorid']?>" title="<?=$_SN[$value['lastauthorid']]?>"><?=$_SN[$value['lastauthorid']]?></a><br><?php echo sgmdate('m-d H:i',$value[lastpost],1); ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
<?php } else { ?>
<div class="c_form" style="text-align:center;">还没有相关话题。
<?php if($event['grade']>0 && $_SGLOBAL['supe_userevent']['status']>=2) { ?>
<a href="cp.php?ac=thread&tagid=<?=$event['tagid']?>&eventid=<?=$eventid?>">我来发表</a><?php } ?>
</div>
<?php } ?>
</div>
<?php } ?>

<div class="m_box">
<h2 class="feed_header">
<div class="r_option">
<a href="space.php?do=event&id=<?=$eventid?>&view=comment">全部</a>
</div>
留言
</h2>
<?php if($event['grade']>0 && ($event['allowpost'] || $_SGLOBAL['supe_userevent']['status'] > 1)) { ?>
<div class="space_wall_post">
<form action="cp.php?ac=comment" id="commentform_<?=$space['uid']?>" name="commentform_<?=$space['uid']?>" method="post">
<a href="###" id="message_face" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea name="message" id="comment_message" rows="5" cols="60" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
<input type="hidden" name="refer" value="space.php?do=event&id=<?=$eventid?>" />
<input type="hidden" name="id" value="<?=$eventid?>" />
<input type="hidden" name="idtype" value="eventid" />
<input type="hidden" name="commentsubmit" value="true" />
<br>
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="留言" onclick="ajaxpost('commentform_<?=$space['uid']?>', 'wall_add')" />
<span id="__commentform_<?=$space['uid']?>"></span>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<br>
<?php } elseif($event['grade']>0) { ?>
<textarea name="message" id="comment_message" rows="5" cols="60" readonly="">只有活动成员才能发布留言</textarea>
<?php } ?>

<div class="comments_list" id="comment">
<input type="hidden" value="1" name="comment_prepend" id="comment_prepend" />
<ul id="comment_ul">
<?php if(is_array($comments)) { foreach($comments as $value) { ?>
<?php if(empty($ajax_edit)) { ?><li id="comment_<?=$value['cid']?>_li"><?php } ?>
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" class="avatar" /></div>
<?php } ?>
<div class="title">
<div class="r_option">

<?php if($value['authorid'] != $_SGLOBAL['supe_uid'] && $value['author'] == "" && $_SGLOBAL['magic']['reveal']) { ?>
<a id="a_magic_reveal_<?=$value['cid']?>" href="magic.php?mid=reveal&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id,1)"><img src="image/magic/reveal.small.gif" class="magicicon"><?=$_SGLOBAL['magic']['reveal']?></a>
<span class="pipe">|</span>
<?php } ?>

<?php if($value['authorid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon">
<a id="a_magic_anonymous_<?=$value['cid']?>" href="magic.php?mid=anonymous&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['anonymous']?></a>
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['flicker']) { ?>
<img src="image/magic/flicker.small.gif" class="magicicon">
<?php if($value['magicflicker']) { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="cp.php?ac=magic&op=cancelflicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['flicker']?></a>
<?php } else { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="magic.php?mid=flicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['flicker']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>

<a href="cp.php?ac=comment&op=edit&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<?php } ?>
<?php if($value['authorid']==$_SGLOBAL['supe_uid'] || $value['uid']==$_SGLOBAL['supe_uid'] || checkperm('managecomment')) { ?>
<a href="cp.php?ac=comment&op=delete&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['authorid']!=$_SGLOBAL['supe_uid'] && ($value['idtype'] != 'uid' || $space['self'])) { ?>
<a href="cp.php?ac=comment&op=reply&cid=<?=$value['cid']?>&feedid=<?=$feedid?>" id="c_<?=$value['cid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=comment&id=<?=$value['cid']?>" id="a_report_<?=$value['cid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</div>

<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>

</div>

<div class="detail<?php if($value['magicflicker']) { ?> magicflicker<?php } ?>" id="comment_<?=$value['cid']?>"><?=$value['message']?></div>

<?php if(empty($ajax_edit)) { ?></li><?php } ?>
<?php } } ?>
</ul>
<?php if($comments && count($comments) >= 20) { ?>
<p><a href="space.php?do=event&id=<?=$eventid?>&view=comment&page=2" style="float:right;">浏览更多留言</a></p>
<?php } ?>
</div>
</div>

</div>

<div id="sidebar">

<?php if($topic) { ?>
<div class="affiche">
<img src="image/app/topic.gif" align="absmiddle">
<strong>凑个热闹</strong>：<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a>
</div>
<?php } ?>

<?php if($_SGLOBAL['supe_userevent']['status'] > 1) { ?>
<div class="sidebox">
<h2 class="title">活动菜单</h2>
<ul class="menu_list">
<?php if($_SGLOBAL['supe_userevent']['status'] >= 3) { ?>
<?php if($event['grade']>0 || $event['grade']==-2) { ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=members">成员管理</a></li>
<?php } ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=edit">活动管理</a></li>
<?php if($event['grade']>0 || $event['grade']==-2) { ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=pic">相册管理</a></li>
<?php if($event['tagid']) { ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=thread">话题管理</a></li>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']<= $event['deadline'] && ($event['limitnum'] <= 0 || $event['membernum'] < $event['limitnum']) && ($_SGLOBAL['supe_userevent']['status'] >= 3 || $event['allowinvite'])) { ?>
<li><a href="cp.php?ac=event&id=<?=$eventid?>&op=invite">邀请好友</a></li>
<?php } ?>
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']<= $event['deadline'] && ($event['template'] || $event['allowfellow'])) { ?>
<li><a id="a_join" href="cp.php?ac=event&id=<?=$eventid?>&op=join" onclick="ajaxmenu(event, this.id)">报名信息</a></li>
<?php } ?>
<?php if($_SGLOBAL['supe_userevent']['status'] >= 3 && $event['endtime'] >= $_SGLOBAL['timestamp']) { ?>
<li><a id="a_print" href="cp.php?ac=event&id=<?=$eventid?>&op=print" onclick="ajaxmenu(event, this.id)">打签到表</a></li>
<?php } ?>
<?php if($_SGLOBAL['supe_userevent']['uid'] == $event['uid']) { ?>
<?php if($event['grade']>0 && $_SGLOBAL['timestamp']>$event['endtime']) { ?>
<li><a id="a_close" onclick="ajaxmenu(event, this.id)" href="cp.php?ac=event&id=<?=$eventid?>&op=close">关闭活动</a></li>
<?php } ?>
<?php if($event['grade']==-2 && $_SGLOBAL['timestamp']>$event['endtime']) { ?>
<li><a id="a_open" onclick="ajaxmenu(event, this.id)" href="cp.php?ac=event&id=<?=$eventid?>&op=open">开启活动</a></li>
<?php } ?>
<li><a id="a_delete" onclick="ajaxmenu(event, this.id)" href="cp.php?ac=event&id=<?=$eventid?>&op=delete">取消活动</a></li>
<?php } elseif($_SGLOBAL['endtime']<= $_SGLOBAL['timestamp']) { ?>
<li><a id="a_quit2" onclick="ajaxmenu(event, this.id)" href="cp.php?ac=event&id=<?=$eventid?>&op=quit">退出活动</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>

<div class="sidebox">
<h2 class="title">
组织者
</h2>
<ul class="avatar_list">
<?php if(is_array($admins)) { foreach($admins as $key => $userevent) { ?>
<li>
<div class="avatar48"><a title="<?=$_SN[$userevent['uid']]?>" href="space.php?uid=<?=$userevent['uid']?>"><?php echo avatar($userevent[uid]); ?></a></div>
<p><a href="space.php?uid=<?=$userevent['uid']?>"><?=$_SN[$userevent['uid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>

<?php if($follows) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?do=event&id=<?=$eventid?>&view=member&status=1">全部</a>
</p>
关注的人
</h2>
<ul class="avatar_list">
<?php if(is_array($follows)) { foreach($follows as $key => $userevent) { ?>
<li>
<div class="avatar48"><a title="<?=$_SN[$userevent['uid']]?>" href="space.php?uid=<?=$userevent['uid']?>"><?php echo avatar($userevent[uid]); ?></a></div>
<p><a href="space.php?uid=<?=$userevent['uid']?>"><?=$_SN[$userevent['uid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if(!empty($relatedevents)) { ?>
<div class="sidebox">
<h2 class="title">
参加这个活动的人也参加了
</h2>
<ul class="attention">
<?php if(is_array($relatedevents)) { foreach($relatedevents as $value) { ?>
<li>
<p>
<a target="_blank" href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a>
</p>
<p class="gray" style="text-align: left">
<?php if($_SGLOBAL['timestamp'] > $value['endtime']) { ?>
已结束
<?php } else { ?>
<?php echo sgmdate("n月j日",$value[starttime]) ?>
<?php } ?>&nbsp;
<?=$value['membernum']?> 人参加 /
<?=$value['follownum']?> 人关注
</p>
<p>
<?php if($value['threadnum']) { ?>
<a href="space.php?do=event&id=<?=$value['eventid']?>&view=thread">
<?=$value['threadnum']?> 个话题
</a> &nbsp;
<?php } ?>
<?php if($value['picnum']) { ?>
<a href="space.php?do=event&id=<?=$value['eventid']?>&view=pic">
<?=$value['picnum']?> 张照片
</a>
<?php } ?>
</p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
</div>

<script type="text/javascript">
//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
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