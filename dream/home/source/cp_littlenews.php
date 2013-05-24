<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_littlenews.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//检查信息
$littlenewsid = empty($_GET['littlenewsid'])?0:intval($_GET['littlenewsid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$littlenews = array();
if($littlenewsid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('littlenews')." b 
		LEFT JOIN ".tname('littlenewsfield')." bf ON bf.littlenewsid=b.littlenewsid 
		WHERE b.littlenewsid='$littlenewsid'");
	$littlenews = $_SGLOBAL['db']->fetch_array($query);
}

//权限检查
if(empty($littlenews)) {
	if(!checkperm('allowlittlenews')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//实名认证
	ckrealname('littlenews');
	
	//视频认证
	ckvideophoto('littlenews');
	
	//新用户见习
	cknewuser();
	
	//判断是否发布太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//接收外部标题
	$littlenews['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$littlenews['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $littlenews['uid'] && !checkperm('managelittlenews')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//添加编辑操作
if(submitcheck('littlenewssubmit')) {

	if(empty($littlenews['littlenewsid'])) {
		$littlenews = array();
		
	} else {
		if(!checkperm('allowlittlenews')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//验证码
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_littlenews.php');
	if($newlittlenews = littlenews_post($_POST, $littlenews)) {
		if(empty($littlenews) && $newlittlenews['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newlittlenews['topicid'].'&view=littlenews';
		} else {
			$url = 'space.php?uid='.$newlittlenews['uid'].'&do=littlenews&id='.$newlittlenews['littlenewsid'];
		}
		showmessage('do_success', $url, 0);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($_GET['op'] == 'delete') {
	//删除
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletelittlenewss(array($littlenewsid))) {
			showmessage('do_success', "space.php?uid=$littlenews[uid]&do=littlenews&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('littlenews', array('littlenewsid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=littlenews&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//权限
	if(!checkperm('managelittlenews')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('littlenews', array('hot'=>$_POST['hot']), array('littlenewsid'=>$littlenews['littlenewsid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($littlenews['littlenewsid'], 'littlenewsid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$littlenews['littlenewsid'], 'idtype'=>'littlenewsid'));
		}
		
		showmessage('do_success', "space.php?uid=$littlenews[uid]&do=littlenews&id=$littlenews[littlenewsid]", 0);
	}
	
} else {
	//添加编辑
	//获取个人分类
	$classarr = $littlenews['uid']?getclasslittlenewsarr($littlenews['uid']):getclasslittlenewsarr($_SGLOBAL['supe_uid']);
	//获取相册
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($littlenews['tag'])?array():unserialize($littlenews['tag']);
	$littlenews['tag'] = implode(' ', $tags);
	
	$littlenews['target_names'] = '';
	
	$friendarr = array($littlenews['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($littlenews['friend'] == 4) {
		$passwordstyle = '';
	} elseif($littlenews['friend'] == 2) {
		$selectgroupstyle = '';
		if($littlenews['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($littlenews[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$littlenews['target_names'] = implode(' ', $names);
		}
	}
	
	
	$littlenews['message'] = str_replace('&amp;', '&amp;amp;', $littlenews['message']);
	$littlenews['message'] = shtmlspecialchars($littlenews['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	//好友组
	$groups = getfriendgroup();
	
	//参与热点
	$topic = array();
	$topicid = $_GET['topicid'] = intval($_GET['topicid']);
	if($topicid) {
		$topic = topic_get($topicid);
	}
	if($topic) {
		$actives = array('littlenews' => ' class="active"');
	}
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_littlenews");

?>