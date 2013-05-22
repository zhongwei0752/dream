<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_joke.php 13208 06:31:35Z liguode $
*/
	if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
@include_once(S_ROOT.'./data/data_click.php');
$clicks = empty($_SGLOBAL['click']['jokeid'])?array():$_SGLOBAL['click']['jokeid'];


	$hash = md5($joke['uid']."\t".$joke['dateline']);
	$idtype = 'jokeid';
	$newlist = array();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('joke')." b"),0);
	$perpage = 10;
	$theurl="space.php?do=joke";
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('joke')."  ORDER BY dateline DESC LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['jokeid'] != $joke['jokeid'] && empty($value['friend'])) {
			realname_set($value['uid'], $value['username']);
			$id=$value['jokeid'];
	
			$list[] = $value;

	
		}
	}
$multi = multi($count, $perpage, $page, $theurl);
include_once template("space_joke");

?>