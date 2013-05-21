<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_discussion.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//检查信息
$discussionid = empty($_GET['discussionid'])?0:intval($_GET['discussionid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$discussion = array();
if($discussionid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('discussion')." b 
		LEFT JOIN ".tname('discussionfield')." bf ON bf.discussionid=b.discussionid 
		WHERE b.discussionid='$discussionid'");
	$discussion = $_SGLOBAL['db']->fetch_array($query);
}

//权限检查
if(empty($discussion)) {
	if(!checkperm('allowdiscussion')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//实名认证
	ckrealname('discussion');
	
	//视频认证
	ckvideophoto('discussion');
	
	//新用户见习
	cknewuser();
	
	//判断是否发布太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//接收外部标题
	$discussion['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$discussion['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $discussion['uid'] && !checkperm('managediscussion')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//添加编辑操作
if(submitcheck('discussionsubmit')) {
	if(empty($discussion['discussionid'])) {
		$discussion = array();
	} else {
		if(!checkperm('allowdiscussion')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//验证码
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_discussion.php');
	if($newdiscussion = discussion_post($_POST, $discussion)) {
		if(empty($discussion) && $newdiscussion['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newdiscussion['topicid'].'&view=discussion';
		} else {
			$url = 'space.php?uid='.$newdiscussion['uid'].'&do=discussion&id='.$newdiscussion['discussionid'];
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
		if(deletediscussions(array($discussionid))) {
			showmessage('do_success', "space.php?uid=$discussion[uid]&do=discussion&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('discussion', array('discussionid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=discussion&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//权限
	if(!checkperm('managediscussion')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('discussion', array('hot'=>$_POST['hot']), array('discussionid'=>$discussion['discussionid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($discussion['discussionid'], 'discussionid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$discussion['discussionid'], 'idtype'=>'discussionid'));
		}
		
		showmessage('do_success', "space.php?uid=$discussion[uid]&do=discussion&id=$discussion[discussionid]", 0);
	}
	
} else {
	//添加编辑
	//获取个人分类
	$classarr = $discussion['uid']?getclassarr($discussion['uid']):getclassarr($_SGLOBAL['supe_uid']);

	//获取相册
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($discussion['tag'])?array():unserialize($discussion['tag']);
	$discussion['tag'] = implode(' ', $tags);
	
	$discussion['target_names'] = '';
	
	$friendarr = array($discussion['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($discussion['friend'] == 4) {
		$passwordstyle = '';
	} elseif($discussion['friend'] == 2) {
		$selectgroupstyle = '';
		if($discussion['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($discussion[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$discussion['target_names'] = implode(' ', $names);
		}
	}
	
	
	$discussion['message'] = str_replace('&amp;', '&amp;amp;', $discussion['message']);
	$discussion['message'] = shtmlspecialchars($discussion['message']);
	
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
		$actives = array('discussion' => ' class="active"');
	}
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_discussion");

?>