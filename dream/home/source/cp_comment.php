<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_comment.php 13000 2009-08-05 05:58:30Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./source/function_bbcode.php');

//¹²ÓÃ±äÁ¿
$tospace = $pic = $blog = $album = $share = $event = $poll =$discussion =$news = array();

if(submitcheck('commentsubmit')) {

	$idtype = $_POST['idtype'];
	
	if(!checkperm('allowcomment')) {
		ckspacelog();
		showmessage('no_privilege');
	}

	//ÊµÃûÈÏÖ¤
	ckrealname('comment');

	//ÐÂÓÃ»§¼ûÏ°
	cknewuser();

	//ÅÐ¶ÏÊÇ·ñ·¢²¼Ì«¿ì
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}

	$message = getstr($_POST['message'], 0, 1, 1, 1, 2);
	if(strlen($message) < 2) {
		showmessage('content_is_too_short');
	}

	//ÕªÒª
	$summay = getstr($message, 150, 1, 1, 0, 0, -1);

	$id = intval($_POST['id']);

	//ÒýÓÃÆÀÂÛ
	$cid = empty($_POST['cid'])?0:intval($_POST['cid']);
	$comment = array();
	if($cid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND id='$id' AND idtype='$_POST[idtype]'");
		$comment = $_SGLOBAL['db']->fetch_array($query);
		if($comment && $comment['authorid'] != $_SGLOBAL['supe_uid']) {
			//ÊµÃû
			if($comment['author'] == '') {
				$_SN[$comment['authorid']] = lang('hidden_username');
			} else {
				realname_set($comment['authorid'], $comment['author']);
				realname_get();
			}
			$comment['message'] = preg_replace("/\<div class=\"quote\"\>\<span class=\"q\"\>.*?\<\/span\>\<\/div\>/is", '', $comment['message']);
			//bbcode×ª»»
			$comment['message'] = html2bbcode($comment['message']);
			$message = addslashes("<div class=\"quote\"><span class=\"q\"><b>".$_SN[$comment['authorid']]."</b>: ".getstr($comment['message'], 150, 0, 0, 0, 2, 1).'</span></div>').$message;
			if($comment['idtype']=='uid') {
				$id = $comment['authorid'];
			}
		} else {
			$comment = array();
		}
	}

	$hotarr = array();
	$stattype = '';

	//¼ì²éÈ¨ÏÞ
	switch ($idtype) {
		case 'uid':
			//¼ìË÷¿Õ¼ä
			$tospace = getspace($id);
			$stattype = 'wall';//Í³¼Æ
			break;
		case 'picid':
			//¼ìË÷Í¼Æ¬
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('pic')." p
				LEFT JOIN ".tname('picfield')." pf
				ON pf.picid=p.picid
				WHERE p.picid='$id'");
			$pic = $_SGLOBAL['db']->fetch_array($query);
			//Í¼Æ¬²»´æÔÚ
			if(empty($pic)) {
				showmessage('view_images_do_not_exist');
			}

			//¼ìË÷¿Õ¼ä
			$tospace = getspace($pic['uid']);

			//»ñÈ¡Ïà²á
			$album = array();
			if($pic['albumid']) {
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$pic[albumid]'");
				if(!$album = $_SGLOBAL['db']->fetch_array($query)) {
					updatetable('pic', array('albumid'=>0), array('albumid'=>$pic['albumid']));//Ïà²á¶ªÊ§
				}
			}
			//ÑéÖ¤ÒþË½
			if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $album['friend'] == 4) {
				//ÃÜÂëÊäÈëÎÊÌâ
				$cookiename = "view_pwd_album_$album[albumid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($album['password']))) {
					showmessage('no_privilege');
				}
			}
			
			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);
			$stattype = 'piccomment';//Í³¼Æ
			break;
		case 'blogid':
			//¶ÁÈ¡ÈÕÖ¾
			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.target_ids, bf.hotuser
				FROM ".tname('blog')." b
				LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
				WHERE b.blogid='$id'");
			$blog = $_SGLOBAL['db']->fetch_array($query);
			//ÈÕÖ¾²»´æÔÚ
			if(empty($blog)) {
				showmessage('view_to_info_did_not_exist');
			}
			
			//¼ìË÷¿Õ¼ä
			$tospace = getspace($blog['uid']);
			
			//ÑéÖ¤ÒþË½
			if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
				//Ã»ÓÐÈ¨ÏÞ
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $blog['friend'] == 4) {
				//ÃÜÂëÊäÈëÎÊÌâ
				$cookiename = "view_pwd_blog_$blog[blogid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($blog['password']))) {
					showmessage('no_privilege');
				}
			}

			//ÊÇ·ñÔÊÐíÆÀÂÛ
			if(!empty($blog['noreply'])) {
				showmessage('do_not_accept_comments');
			}
			if($blog['target_ids']) {
				$blog['target_ids'] .= ",$blog[uid]";
			}
			
			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);
			$stattype = 'blogcomment';//Í³¼Æ
			break;
			case 'discussionid':
			//¶ÁÈ¡ÈÕÖ¾

			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.target_ids, bf.hotuser
				FROM ".tname('discussion')." b
				LEFT JOIN ".tname('discussionfield')." bf ON bf.discussionid=b.discussionid
				WHERE b.discussionid='$id'");
			$discussion = $_SGLOBAL['db']->fetch_array($query);
			//ÈÕÖ¾²»´æÔÚ
			if(empty($discussion)) {
				showmessage('view_to_info_did_not_exist');
			}
			
			//¼ìË÷¿Õ¼ä
			$tospace = getspace($discussion['uid']);
			
			//ÑéÖ¤ÒþË½
			if(!ckfriend($discussion['uid'], $discussion['friend'], $discussion['target_ids'])) {
				//Ã»ÓÐÈ¨ÏÞ
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $discussion['friend'] == 4) {
				//ÃÜÂëÊäÈëÎÊÌâ
				$cookiename = "view_pwd_discussion_$discussion[discussionid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($discussion['password']))) {
					showmessage('no_privilege');
				}
			}
			//新闻页
			case 'newsid':
			//¶ÁÈ¡ÈÕÖ¾

			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.target_ids, bf.hotuser
				FROM ".tname('news')." b
				LEFT JOIN ".tname('newsfield')." bf ON bf.newsid=b.newsid
				WHERE b.newsid='$id'");
			$news = $_SGLOBAL['db']->fetch_array($query);
			//ÈÕÖ¾²»´æÔÚ
			if(empty($news)) {
				showmessage('view_to_info_did_not_exist');
			}
			
			//¼ìË÷¿Õ¼ä
			$tospace = getspace($news['uid']);
			
			//ÑéÖ¤ÒþË½
			if(!ckfriend($news['uid'], $news['friend'], $news['target_ids'])) {
				//Ã»ÓÐÈ¨ÏÞ
				showmessage('no_privilege');
			} elseif(!$tospace['self'] && $news['friend'] == 4) {
				//ÃÜÂëÊäÈëÎÊÌâ
				$cookiename = "view_pwd_news_$news[newsid]";
				$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
				if($cookievalue != md5(md5($news['password']))) {
					showmessage('no_privilege');
				}
			}

			//ÊÇ·ñÔÊÐíÆÀÂÛ
			if(!empty($news['noreply'])) {
				showmessage('do_not_accept_comments');
			}
			if($news['target_ids']) {
				$news['target_ids'] .= ",$news[uid]";
			}
			
			$hotarr = array('newsid', $news['newsid'], $news['hotuser']);
			$stattype = 'newscomment';//Í³¼Æ

			break;
		case 'sid':
			//¶ÁÈ¡ÈÕÖ¾
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('share')." WHERE sid='$id'");
			$share = $_SGLOBAL['db']->fetch_array($query);
			//ÈÕÖ¾²»´æÔÚ
			if(empty($share)) {
				showmessage('sharing_does_not_exist');
			}

			//¼ìË÷¿Õ¼ä
			$tospace = getspace($share['uid']);
			
			$hotarr = array('sid', $share['sid'], $share['hotuser']);
			$stattype = 'sharecomment';//Í³¼Æ
			break;
		case 'pid':
			$query = $_SGLOBAL['db']->query("SELECT p.*, pf.hotuser
				FROM ".tname('poll')." p
				LEFT JOIN ".tname('pollfield')." pf ON pf.pid=p.pid
				WHERE p.pid='$id'");
			$poll = $_SGLOBAL['db']->fetch_array($query);
			if(empty($poll)) {
				showmessage('voting_does_not_exist');
			}
			//ÊÇ·ñÔÊÐíÆÀÂÛ
			$tospace = getspace($poll['uid']);
			if($poll['noreply']) {
				//ÊÇ·ñºÃÓÑ
				if(!$tospace['self'] && !in_array($_SGLOBAL['supe_uid'], $tospace['friends'])) {
					showmessage('the_vote_only_allows_friends_to_comment');
				}
			}
			
			$hotarr = array('pid', $poll['pid'], $poll['hotuser']);
			$stattype = 'pollcomment';//Í³¼Æ
			break;
		case 'eventid':
		    // ¶ÁÈ¡»î¶¯
		    $query = $_SGLOBAL['db']->query("SELECT e.*, ef.* FROM ".tname('event')." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$id'");
			$event = $_SGLOBAL['db']->fetch_array($query);

			if(empty($event)) {
				showmessage('event_does_not_exist');
			}
			
			if($event['grade'] < -1){
				showmessage('event_is_closed');//»î¶¯ÒÑ¾­¹Ø±Õ
			} elseif($event['grade'] <= 0){
				showmessage('event_under_verify');//»î¶¯Î´Í¨¹ýÉóºË
			}
			
			if(!$event['allowpost']){
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid='$id' AND uid='$_SGLOBAL[supe_uid]' LIMIT 1");
				$value = $_SGLOBAL['db']->fetch_array($query);
				if(empty($value) || $value['status'] < 2){
					showmessage('event_only_allows_members_to_comment');//Ö»ÓÐ»î¶¯³ÉÔ±ÔÊÐí·¢±íÁôÑÔ
				}
			}

			//¼ìË÷¿Õ¼ä
			$tospace = getspace($event['uid']);
			
			$hotarr = array('eventid', $event['eventid'], $event['hotuser']);
			$stattype = 'eventcomment';//Í³¼Æ
			break;
		default:
			showmessage('non_normal_operation');
			break;
	}
	
	if(empty($tospace)) {
		showmessage('space_does_not_exist');
	}
	
	//ÊÓÆµÈÏÖ¤
	if($tospace['videostatus']) {
		if($idtype == 'uid') {
			ckvideophoto('wall', $tospace);
		} else {
			ckvideophoto('comment', $tospace);
		}
	}
	
	//ºÚÃûµ¥
	if(isblacklist($tospace['uid'])) {
		showmessage('is_blacklist');
	}
	
	//ÈÈµã
	if($hotarr && $tospace['uid'] != $_SGLOBAL['supe_uid']) {
		hot_update($hotarr[0], $hotarr[1], $hotarr[2]);
	}

	//ÊÂ¼þ
	$fs = array();
	$fs['icon'] = 'comment';
	$fs['target_ids'] = $fs['friend'] = '';

	switch ($_POST['idtype']) {
		case 'uid':
			//ÊÂ¼þ
			$fs['icon'] = 'wall';
			$fs['title_template'] = cplang('feed_comment_space');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['images'] = array();
			$fs['image_links'] = array();
			break;
		case 'picid':
			//ÊÂ¼þ
			$fs['title_template'] = cplang('feed_comment_image');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>");
			$fs['body_template'] = '{pic_title}';
			$fs['body_data'] = array('pic_title'=>$pic['title']);
			$fs['body_general'] = $summay;
			$fs['images'] = array(pic_get($pic['filepath'], $pic['thumb'], $pic['remote']));
			$fs['image_links'] = array("space.php?uid=$tospace[uid]&do=album&picid=$pic[picid]");
			$fs['target_ids'] = $album['target_ids'];
			$fs['friend'] = $album['friend'];
			break;
		case 'blogid':
			//¸üÐÂÆÀÂÛÍ³¼Æ
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')." SET replynum=replynum+1 WHERE blogid='$id'");
			//ÊÂ¼þ
			$fs['title_template'] = cplang('feed_comment_blog');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'blog'=>"<a href=\"space.php?uid=$tospace[uid]&do=blog&id=$id\">$blog[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = $blog['target_ids'];
			$fs['friend'] = $blog['friend'];
			break;
			case 'discussionid':
			//¸üÐÂÆÀÂÛÍ³¼Æ
			$_SGLOBAL['db']->query("UPDATE ".tname('discussion')." SET replynum=replynum+1 WHERE discussionid='$id'");
			//ÊÂ¼þ
			$fs['title_template'] = cplang('feed_comment_discussion');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'discussion'=>"<a href=\"space.php?uid=$tospace[uid]&do=discussion&id=$id\">$discussion[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = $discussion['target_ids'];
			$fs['friend'] = $discussion['friend'];
			break;
			//新闻页
			case 'newsid':
			//¸üÐÂÆÀÂÛÍ³¼Æ
			$_SGLOBAL['db']->query("UPDATE ".tname('news')." SET replynum=replynum+1 WHERE newsid='$id'");
			//ÊÂ¼þ
			$fs['title_template'] = cplang('feed_comment_news');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'news'=>"<a href=\"space.php?uid=$tospace[uid]&do=news&id=$id\">$news[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['target_ids'] = $news['target_ids'];
			$fs['friend'] = $news['friend'];
			break;
		case 'sid':
			//ÊÂ¼þ
			$fs['title_template'] = cplang('feed_comment_share');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'share'=>"<a href=\"space.php?uid=$tospace[uid]&do=share&id=$id\">".str_replace(cplang('share_action'), '', $share['title_template'])."</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			break;
		case 'eventid':
		    // »î¶¯
		    $fs['title_template'] = cplang('feed_comment_event');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'event'=>'<a href="space.php?do=event&id='.$event['eventid'].'">'.$event['title'].'</a>');
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			break;
		case 'pid':
			// Í¶Æ±
			//¸üÐÂÆÀÂÛÍ³¼Æ
			$_SGLOBAL['db']->query("UPDATE ".tname('poll')." SET replynum=replynum+1 WHERE pid='$id'");
			$fs['title_template'] = cplang('feed_comment_poll');
			$fs['title_data'] = array('touser'=>"<a href=\"space.php?uid=$tospace[uid]\">".$_SN[$tospace['uid']]."</a>", 'poll'=>"<a href=\"space.php?uid=$tospace[uid]&do=poll&pid=$id\">$poll[subject]</a>");
			$fs['body_template'] = '';
			$fs['body_data'] = array();
			$fs['body_general'] = '';
			$fs['friend'] = '';
			break;
	}

	$setarr = array(
		'uid' => $tospace['uid'],
		'id' => $id,
		'idtype' => $_POST['idtype'],
		'authorid' => $_SGLOBAL['supe_uid'],
		'author' => $_SGLOBAL['supe_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $message,
		'ip' => getonlineip()
	);
	//Èë¿â
	$cid = inserttable('comment', $setarr, 1);
	$action = 'comment';
	$becomment = 'getcomment';
	switch ($_POST['idtype']) {
		case 'uid':
			$n_url = "space.php?uid=$tospace[uid]&do=wall&cid=$cid";
			$note_type = 'wall';
			$note = cplang('note_wall', array($n_url));
			$q_note = cplang('note_wall_reply', array($n_url));
			if($comment) {
				$msg = 'note_wall_reply_success';
				$magvalues = array($_SN[$tospace['uid']]);
				$becomment = '';
			} else {
				$msg = 'do_success';
				$magvalues = array();
				$becomment = 'getguestbook';
			}
			$msgtype = 'comment_friend';
			$q_msgtype = 'comment_friend_reply';
			$action = 'guestbook';
			break;
		case 'picid':
			$n_url = "space.php?uid=$tospace[uid]&do=album&picid=$id&cid=$cid";
			$note_type = 'piccomment';
			$note = cplang('note_pic_comment', array($n_url));
			$q_note = cplang('note_pic_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'photo_comment';
			$q_msgtype = 'photo_comment_reply';
			break;
		case 'blogid':
			//Í¨Öª
			$n_url = "space.php?uid=$tospace[uid]&do=blog&id=$id&cid=$cid";
			$note_type = 'blogcomment';
			$note = cplang('note_blog_comment', array($n_url, $blog['subject']));
			$q_note = cplang('note_blog_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'blog_comment';
			$q_msgtype = 'blog_comment_reply';
			break;
		case 'discussionid':
			//Í¨Öª
			$n_url = "space.php?uid=$tospace[uid]&do=discussion&id=$id&cid=$cid";
			$note_type = 'discussioncomment';
			$note = cplang('note_discussion_comment', array($n_url, $discussion['subject']));
			$q_note = cplang('note_discussion_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'discussion_comment';
			$q_msgtype = 'discussion_comment_reply';
			break;
		case 'newsid':
			//Í¨Öª
			$n_url = "space.php?uid=$tospace[uid]&do=news&id=$id&cid=$cid";
			$note_type = 'newscomment';
			$note = cplang('note_news_comment', array($n_url, $news['subject']));
			$q_note = cplang('note_news_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'news_comment';
			$q_msgtype = 'news_comment_reply';
			break;
		case 'sid':
			//·ÖÏí
			$n_url = "space.php?uid=$tospace[uid]&do=share&id=$id&cid=$cid";
			$note_type = 'sharecomment';
			$note = cplang('note_share_comment', array($n_url));
			$q_note = cplang('note_share_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'share_comment';
			$q_msgtype = 'share_comment_reply';
			break;
		case 'pid':
			$n_url = "space.php?uid=$tospace[uid]&do=poll&pid=$id&cid=$cid";
			$note_type = 'pollcomment';
			$note = cplang('note_poll_comment', array($n_url, $poll['subject']));
			$q_note = cplang('note_poll_comment_reply', array($n_url));
			$msg = 'do_success';
			$magvalues = array();
			$msgtype = 'poll_comment';
			$q_msgtype = 'poll_comment_reply';
			break;
		case 'eventid':
		    // »î¶¯
		    $n_url = "space.php?do=event&id=$id&view=comment&cid=$cid";
		    $note_type = 'eventcomment';
		    $note = cplang('note_event_comment', array($n_url));
		    $q_note = cplang('note_event_comment_reply', array($n_url));
		    $msg = 'do_success';
		    $magvalues = array();
		    $msgtype = 'event_comment';
		    $q_msgtype = 'event_comment_reply';
		    break;
	}

	if(empty($comment)) {
		
		//·ÇÒýÓÃÆÀÂÛ
		if($tospace['uid'] != $_SGLOBAL['supe_uid']) {
			//ÊÂ¼þ·¢²¼
			if(ckprivacy('comment', 1)) {
				feed_add($fs['icon'], $fs['title_template'], $fs['title_data'], $fs['body_template'], $fs['body_data'], $fs['body_general'],$fs['images'], $fs['image_links'], $fs['target_ids'], $fs['friend']);
			}
			
			//·¢ËÍÍ¨Öª
			notification_add($tospace['uid'], $note_type, $note);
			
			//ÁôÑÔ·¢ËÍ¶ÌÏûÏ¢
			if($_POST['idtype'] == 'uid' && $tospace['updatetime'] == $tospace['dateline']) {
				include_once S_ROOT.'./uc_client/client.php';
				uc_pm_send($_SGLOBAL['supe_uid'], $tospace['uid'], cplang('wall_pm_subject'), cplang('wall_pm_message', array(addslashes(getsiteurl().$n_url))), 1, 0, 0);
			}
			
			//·¢ËÍÓÊ¼þÍ¨Öª
			smail($tospace['uid'], '', cplang($msgtype, array($_SN[$space['uid']], shtmlspecialchars(getsiteurl().$n_url))), '', $msgtype);
		}
		
	} elseif($comment['authorid'] != $_SGLOBAL['supe_uid']) {
		
		//·¢ËÍÓÊ¼þÍ¨Öª
		smail($comment['authorid'], '', cplang($q_msgtype, array($_SN[$space['uid']], shtmlspecialchars(getsiteurl().$n_url))), '', $q_msgtype);
		notification_add($comment['authorid'], $note_type, $q_note);
		
	}
	
	//Í³¼Æ
	if($stattype) {
		updatestat($stattype);
	}

	//»ý·Ö
	if($tospace['uid'] != $_SGLOBAL['supe_uid']) {
		$needle = $id;
		if($_POST['idtype'] != 'uid') {
			$needle = $_POST['idtype'].$id;
		} else {
			$needle = $tospace['uid'];
		}
		//½±ÀøÆÀÂÛ·¢ÆðÕß
		getreward($action, 1, 0, $needle);
		//½±Àø±»ÆÀÂÛÕß
		if($becomment) {
			if($_POST['idtype'] == 'uid') {
				$needle = $_SGLOBAL['supe_uid'];
			}
			getreward($becomment, 1, $tospace['uid'], $needle, 0);
		}
	}

	showmessage($msg, $_POST['refer'], 0, $magvalues);
}

$cid = empty($_GET['cid'])?0:intval($_GET['cid']);

//±à¼­
if($_GET['op'] == 'edit') {

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid' AND authorid='$_SGLOBAL[supe_uid]'");
	if(!$comment = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('no_privilege');
	}

	//Ìá½»±à¼­
	if(submitcheck('editsubmit')) {

		$message = getstr($_POST['message'], 0, 1, 1, 1, 2);
		if(strlen($message) < 2) showmessage('content_is_too_short');

		updatetable('comment', array('message'=>$message), array('cid'=>$comment['cid']));

		showmessage('do_success', $_POST['refer'], 0);
	}

	//bbcode×ª»»
	$comment['message'] = html2bbcode($comment['message']);//ÏÔÊ¾ÓÃ

} elseif($_GET['op'] == 'delete') {

	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletecomments(array($cid))) {
			showmessage('do_success', $_POST['refer'], 0);
		} else {
			showmessage('no_privilege');
		}
	}

} elseif($_GET['op'] == 'reply') {

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$cid'");
	if(!$comment = $_SGLOBAL['db']->fetch_array($query)) {
		showmessage('comments_do_not_exist');
	}

} else {

	showmessage('no_privilege');
}

include template('cp_comment');

?>