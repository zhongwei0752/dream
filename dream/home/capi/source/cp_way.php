<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_medicine.php 13000 2009-08-05 05:58:30Z liguode $
*/
	if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$way=$_REQUEST['way'];
if($way=='medicine'){
$searchkey = stripsearchkey($_REQUEST['searchkey']);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('medicine')." WHERE mingcheng LIKE '%$searchkey%'
				ORDER BY id DESC LIMIT 0,10");
while ($value = $_SGLOBAL['db']->fetch_array($query)) 
{
			$list[] = $value;
			}
}elseif($way=='activity'){
	$query = $_SGLOBAL['db']->query("SELECT ue.*, e.* FROM ".tname("event")." ue LEFT JOIN ".tname("eventfield")." e ON ue.eventid=e.eventid  ORDER BY ue.dateline LIMIT 0,6");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$list[] = $value;
			
		}
}elseif($way=='group'){
	$query = $_SGLOBAL['db']->query("SELECT t.*, m.* FROM ".tname("thread")." t LEFT JOIN ".tname("mtag")." m ON t.tagid=m.tagid  ORDER BY t.dateline LIMIT 0,6");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$list[] = $value;
			
		}
}elseif($way=='discussion'){
	$query = $_SGLOBAL['db']->query("SELECT df.*, d.* FROM ".tname("discussion")." d LEFT JOIN ".tname("discussionfield")." df ON d.discussionid=df.discussionid  ORDER BY d.dateline LIMIT 0,6");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$list[] = $value;
			
		}
}elseif($way=='joke'){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("joke")." ORDER BY dateline LIMIT 0,6");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$list[] = $value;
			
		}
}elseif($way=='littlenews'){
	$query = $_SGLOBAL['db']->query("SELECT lf.*, l.* FROM ".tname("littlenews")." l LEFT JOIN ".tname("littlenewsfield")." lf ON l.littlenewsid=lf.littlenewsid  ORDER BY l.dateline LIMIT 0,6");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$list[] = $value;
			
		}
}
capi_showmessage_by_data('rest_success',0,array("$way"=>$list)); 

?>
