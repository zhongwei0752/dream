<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_medicine_list|template/green/firstheader', '1369992228', 'template/green/space_medicine_list');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height:100%;">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta property="qc:admins" content="275324151566151414116375636" />



<script language="javascript" type="text/javascript" src="http://www.familyday.com.cn/source/script_ajax.js"></script>

<script language="javascript" type="text/javascript" src="http://www.familyday.com.cn/template/aifaxian/js/jquery-1.9.1.min.js"></script>
<script src="http://www.familyday.com.cn/template/aifaxian/js/common.js" type="text/javascript"></script>
<style type="text/css">
@import url(template/default/medicine.css);
@import url(template/default/style.css);
</style>
<!--[if IE 6]>
<script src="http://www.familyday.com.cn/template/aifaxian/js/DD_belatedPNG_0.0.8a.js" mce_src="template/aifaxian/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.next,background');
DD_belatedPNG.fix('.previous,background');
DD_belatedPNG.fix('.next,background');
DD_belatedPNG.fix('.icon1,background');
DD_belatedPNG.fix('.icon2,background');
DD_belatedPNG.fix('.icon3,background');
DD_belatedPNG.fix('.login,background');
DD_belatedPNG.fix('.reg,background');
DD_belatedPNG.fix('.logo,background');
DD_belatedPNG.fix('.gmcclogo,background');
DD_belatedPNG.fix('.whybox,background');
DD_belatedPNG.fix('.tgo,background');
DD_belatedPNG.fix('.up,background');
DD_belatedPNG.fix('.whybox font,background');
</script>
<![endif]-->

</head>
<body style="height:100%; position:relative;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>





<head>
  <title>医药助手</title>
<link rel="shortcut icon" href="image/favicon.ico" />
  </head>
<div id="topBox">
  <div class="m-logbg" id="m_bg"> <img id="bg"  src="./template/default/image/image/medicine/medicine1.jpg" style= "display:none " onload="this.style.display='';$('.imgload').hide();"/> </div>

  <div class="w830">

    <div class="homebox" >
      <div class="logo_login" style="margin-top:100px;"></div>
  <div class="toplogin_index"style="margin-top:70px;">
       <form id="loginform" name="loginform" action="cp.php?ac=medicine" method="get" >
        <div class="textbox"style="margin-top:-60px;" >
 <div class="reg_username" >
 <label for = "lusername" id="lusername_p"  style=" ">药品关键字</label>
 <div>
 <input type="text" id="lusername" name="lusername"  value="" tabindex="1" autocomplete="off"/>
 
 </div>

 </div>


   <input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="ac" value="medicine" />			
 <div class="reg_submit">
<a href="#"><input name="searchsubmit" value="" class="reg_go_bt" type="submit" tabindex="5" ></a>
</div>
 </div>
</form>
  </div>
    </div>
  </div>
    <div class="imgload"></div>
  <div class="homefooter">
    <div class="homefooterin">更换主题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  class="previous"></a>&nbsp;&nbsp;<a  href="#" class="next"></a></div></div><br/><br/><br/>
  </div>
    



<script src="http://www.familyday.com.cn/template/aifaxian/js/important.js" type="text/javascript"></script>
<script type="text/javascript">

var bglist = new Array('http://ww2.sinaimg.cn/large/ae1d320cjw1e3i8oujesuj.jpg','http://ww2.sinaimg.cn/large/ae1d320cjw1e3i8ono4tfj.jpg','http://ww2.sinaimg.cn/large/ae1d320cjw1e3i8om3w12j.jpg','http://ww4.sinaimg.cn/large/ae1d320cgw1e3i9373555j.jpg','http://ww3.sinaimg.cn/large/ae1d320cgw1e3i933i9ksj.jpg');
</script>


<ul id="navigation">
            <li class="home"><a href="space.php?do=home" title="首页"></a></li>
            <li class="about"><a href="space.php?do=medicine" title="用药助手"></a></li>
            <li class="search"><a href="space.php?do=activity" title="活动"></a></li>
            <li class="photos"><a href="space.php?do=group" title="群组"></a></li>
            <li class="rssfeed"><a href="space.php?do=discussion" title="案例讨论"></a></li>
            <li class="podcasts"><a href="space.php?do=joke" title="医疗笑话"></a></li>
            <li class="contact"><a href="space.php?do=news&orderby=dateline" title="今日资讯"></a></li>
            <li class="zhuanti"><a href="space.php?do=subject" title="本周专题"></a></li>
        </ul>
        <script language="javascript" type="text/javascript" src="http://www.familyday.com.cn/template/aifaxian/js/jquery-1.9.1.min.js"></script>
     <style>
     ul#navigation {
    position: fixed;
    margin: 0 auto;
    padding: 0px;
    bottom:-30px;
    left:21%;
    list-style: none;
    z-index:9999;
}
     ul#navigation li a {
    display: block;
    margin-top: -2px;
    width: 100px;
    height: 70px;    
    background-color:#CFCFCF;
    background-repeat:no-repeat;
    background-position:center center;
    border:1px solid #AFAFAF;
    -moz-border-radius:0px 10px 10px 0px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -khtml-border-bottom-right-radius: 10px;
    -khtml-border-top-right-radius: 10px;
    /*-moz-box-shadow: 0px 4px 3px #000;
    -webkit-box-shadow: 0px 4px 3px #000;
    */
    opacity: 0.6;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
     </style>
         <script type="text/javascript">
        
            $(function() {
                  $('#navigation a').stop().animate({'margin-top':'20px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'margin-top':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'margin-top':'20px'},200);
                    }
                );

});
    $('#lusername').click(function(){      
 $('#lusername_p').hide();
})
        </script><?php ob_out();?>