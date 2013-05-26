<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_navnews.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$submit=$_POST['navnewssubmit'];
if($submit){
	$setarr= array(
		'subject'=>$_POST['subject'],
		'message'=>$_POST['message'],
		'dateline' => $_SGLOBAL['timestamp']
	);
	if(!empty($subject)){
		$navnewsid = inserttable('navnews', $setarr, 1);
	}
	include("./source/upload.class.php");
  	$image= new upload;
  	$image->upload_file($navnewsid,"navnews");

  }
  $zhuantisubmit=$_POST['zhuantisubmit'];
if($zhuantisubmit){
	$setarr= array(
		'subject'=>$_POST['subject'],
		'message'=>$_POST['message'],
		'dateline' => $_SGLOBAL['timestamp']
	);
	if(!empty($subject)){
		$zhuantinewsid = inserttable('zhuantinews', $setarr, 1);
	}
	include("./source/upload.class.php");
  	$image= new upload;
  	$image->upload_file($zhuantinewsid,"zhuantinews");

  }
include_once template("cp_navnews");

?>