<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_text', '1369984494', 'template/green/space_text');?>﻿<html>
<head>

</head>
<body>
<form method="post" action="cp.php?ac=text">
<p>更新数据库</p>
<p class="btn_line">
<input type="text" name="data" />

<input type="hidden" name="updatesubmit" value="1" />
<input type="submit" name="submit" value="上传" class="submit" />
</p>

</form>
<hr/>	
<form method="post" action="cp.php?ac=text">
<p>php替换文件字段</p>
<p class="btn_line">
原文件url<input type="text" name="string1" /><br />
新文件<input type="text" name="string2" /><br />
原文件替换字段<input type="text" name="string3" /><br />
新文件被替换字段<input type="text" name="string4" /><br />
<input type="hidden" name="stringsubmit" value="1" />
<input type="submit" name="submit" value="上传" class="submit" />
</p>

</form>
<hr/>
<form method="post" action="cp.php?ac=text">
<p>htm,css替换文件字段</p>
<p class="btn_line">
原文件url<input type="text" name="string1" /><br />
新文件<input type="text" name="string2" /><br />
原文件替换字段<input type="text" name="string3" /><br />
新文件被替换字段<input type="text" name="string4" /><br />
<input type="hidden" name="string1submit" value="1" />
<input type="submit" name="submit" value="上传" class="submit" />
</p>

</form>
<hr/>

</body>	
</html><?php ob_out();?>