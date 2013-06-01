
<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_joke.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$submit=$_POST['jokesubmit'];
if($submit){
	$setarr= array(
		'subject'=>$_POST['subject'],
		'message'=>$_POST['message'],
		'dateline' => $_SGLOBAL['timestamp']
	);
	if(!empty($subject)){
		$jokeid = inserttable('joke', $setarr, 1);
	}

  }

  
include_once template("cp_joke");

?>