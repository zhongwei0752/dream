<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_medicine.php 13000 2009-08-05 05:58:30Z liguode $
*/
	if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$searchkey = stripsearchkey($_GET['lusername']);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('medicine')." WHERE mingcheng LIKE '%$searchkey%'
				ORDER BY id DESC LIMIT 0,10");
while ($value = $_SGLOBAL['db']->fetch_array($query)) 
{
			$list[] = $value;
			}

			$wei=file_get_contents("http://www.baidu.com/s?wd=$searchkey");
			eregi("<div id=\"content_left\">(.*)<div style=\"clear:both;height:19px;\"><\/div>", $wei, $regs);
include_once template("cp_medicine");

?>
