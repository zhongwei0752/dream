<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_group.php 13206 2009-08-20 02:31:30Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." order by threadnum DESC LIMIT 0,3");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		$thread1[]=$value['tagname'];
		$thread2[]=$value['threadnum'];
		$thread3[]=$value['announcement'];
		$thread4[]=$value['tagid'];
	}
$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." order by postnum DESC LIMIT 0,3");
	while($value = $_SGLOBAL['db']->fetch_array($query1)){
		$post1[]=$value['tagname'];
		$post2[]=$value['postnum'];
		$post3[]=$value['announcement'];
		$post4[]=$value['tagid'];
	}
$query2 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('mtag')." order by membernum DESC LIMIT 0,3");
	while($value = $_SGLOBAL['db']->fetch_array($query2)){
		$member1[]=$value['tagname'];
		$member2[]=$value['membernum'];
		$member3[]=$value['announcement'];
		$member4[]=$value['tagid'];
	}
$query3 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('thread')." order by tid DESC LIMIT 0,1");
	while($value = $_SGLOBAL['db']->fetch_array($query3)){
		$newthread1[]=$value['subject'];
		$newthread2[]=$value['username'];
		$newthread3[]=$value['dateline'];
		$newthread4[]=$value['tid'];
	}
	
include_once template("space_group");
?>