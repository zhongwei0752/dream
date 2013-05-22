<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_news.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//�����Ϣ
$newsid = empty($_GET['newsid'])?0:intval($_GET['newsid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$news = array();
if($newsid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('news')." b 
		LEFT JOIN ".tname('newsfield')." bf ON bf.newsid=b.newsid 
		WHERE b.newsid='$newsid'");
	$news = $_SGLOBAL['db']->fetch_array($query);
}

//Ȩ�޼��
if(empty($news)) {
	if(!checkperm('allownews')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//ʵ����֤
	ckrealname('news');
	
	//��Ƶ��֤
	ckvideophoto('news');
	
	//���û���ϰ
	cknewuser();
	
	//�ж��Ƿ񷢲�̫��
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//�����ⲿ����
	$news['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$news['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $news['uid'] && !checkperm('managenews')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//��ӱ༭����
if(submitcheck('newssubmit')) {

	if(empty($news['newsid'])) {
		$news = array();
		
	} else {
		if(!checkperm('allownews')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//��֤��
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_news.php');
	if($newnews = news_post($_POST, $news)) {
		if(empty($news) && $newnews['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newnews['topicid'].'&view=news';
		} else {
			$url = 'space.php?uid='.$newnews['uid'].'&do=news&id='.$newnews['newsid'];
		}
		showmessage('do_success', $url, 0);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($_GET['op'] == 'delete') {
	//ɾ��
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletenewss(array($newsid))) {
			showmessage('do_success', "space.php?uid=$news[uid]&do=news&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('news', array('newsid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=news&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//Ȩ��
	if(!checkperm('managenews')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('news', array('hot'=>$_POST['hot']), array('newsid'=>$news['newsid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($news['newsid'], 'newsid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$news['newsid'], 'idtype'=>'newsid'));
		}
		
		showmessage('do_success', "space.php?uid=$news[uid]&do=news&id=$news[newsid]", 0);
	}
	
} else {
	//��ӱ༭
	//��ȡ���˷���
	$classarr = $news['uid']?getclassnewsarr($news['uid']):getclassnewsarr($_SGLOBAL['supe_uid']);
	//��ȡ���
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($news['tag'])?array():unserialize($news['tag']);
	$news['tag'] = implode(' ', $tags);
	
	$news['target_names'] = '';
	
	$friendarr = array($news['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($news['friend'] == 4) {
		$passwordstyle = '';
	} elseif($news['friend'] == 2) {
		$selectgroupstyle = '';
		if($news['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($news[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$news['target_names'] = implode(' ', $names);
		}
	}
	
	
	$news['message'] = str_replace('&amp;', '&amp;amp;', $news['message']);
	$news['message'] = shtmlspecialchars($news['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	//������
	$groups = getfriendgroup();
	
	//�����ȵ�
	$topic = array();
	$topicid = $_GET['topicid'] = intval($_GET['topicid']);
	if($topicid) {
		$topic = topic_get($topicid);
	}
	if($topic) {
		$actives = array('news' => ' class="active"');
	}
	
	//�˵�����
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_news");

?>