<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_joke.php 12376 2009-06-16 07:10:38Z zhouguoqiang $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$submit=$_POST['uploadsubmit'];

if(!empty($submit)){
	if(empty($_POST['subject'])&&empty($_POST['message'])){
	showmessage("管理员，给点力，填一点东西好不！");
}
	$jokearr = array(
		'subject' => $_POST['subject'],
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $_POST['message'],
	);
	inserttable('joke', $jokearr);
	showmessage("提交成功");
}
?>
