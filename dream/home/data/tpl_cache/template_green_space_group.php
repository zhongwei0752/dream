<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/green/space_group', '1369389146', 'template/green/space_group');?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE= edge" >
<meta http-equiv="content-type" content="text/html; charset=utf8" />
<script type="text/javascript">
function getInternetExplorerVersion(){
var rv = -1; // Return value assumes failure.
if (navigator.appName == 'Microsoft Internet Explorer'){
var ua = navigator.userAgent;
var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
if (re.exec(ua) != null)
rv = parseFloat( RegExp.$1 );
}
return rv;
}
function checkVersion(){
var ver = getInternetExplorerVersion();
if ( ver > -1 ){
if ( ver < 9.0 )
location.href="ie.cfm";
}
}
checkVersion();
</script>
<title>群组</title>

<!-- CSS -->
<link href="template/default/group.css" rel="stylesheet" type="text/css" />
<link href="template/default/group1.css" rel="stylesheet" type="text/css" />

    <!-- link href="http://www.paseoitaigara.com.br/css/home.css" rel="stylesheet" type="text/css" / -->
    
     <!--[if IE 9]>
            <link rel="stylesheet" type="text/css" href="http://www.paseoitaigara.com.br/css/ie9.css" />
      <![endif]-->
      
      <!--[if lt IE 9]>
            <link rel="stylesheet" type="text/css" href="http://www.paseoitaigara.com.br/css/ie.css" />
      <![endif]-->


<!-- SCRIPTS -->
<script src="http://www.paseoitaigara.com.br/js/jquery-1.7.2.min.js"></script>
<script src="http://www.paseoitaigara.com.br/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/jquery.slider.js"></script>
<script src="http://www.paseoitaigara.com.br/js/jq.func.default.js"></script><!-- funções padrão -->
<script src="http://www.paseoitaigara.com.br/js/jq.func.home.js"></script><!-- funções da home -->	
<!-- scripts para rotate no IE -->
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/EventHelpers.js"></script>
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/cssQuery-p.js"></script>
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/jcoglan/sylvester.js"></script>
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/cssSandpaper.js"></script>
<script type="text/javascript" src="http://www.paseoitaigara.com.br/js/modernizr.js"></script>

</head>
<body>


<div id="Geral" class="home">


<div id="Conteudo">

<div id="BgMosaico"></div>

<div id="BlocosTopo">

<div id="AtalhosTopo" class="bloco"><!-- facebook e destaque rotativo menor -->

<div id="Conectese" class="box"><!-- conexão com o facebook -->
<div class="inner_rotate">
<h3>最新话题</h3>
<a href="space.php?do=thread&id=<?=$newthread4['0']?>"><p><?=$newthread1['0']?> - 发自 <?=$newthread2['0']?></p></a>
<p><?php echo sgmdate('m-d H:i',$newthread3[0],1); ?></p>
<BR><BR>


</div>
</div>

<div id="DestaqueRotativoMenor" class="cinema_color box"><!-- destaque de sessões de cinema, etc. -->
<div class="inner_rotate">
<div class="slider_box"><!-- box com animação -->
<a href="javascript:void(0)" class="passaresquerda" title="Filme Anterior">Filme Anterior</a>
<a href="javascript:void(0)" class="passardireita" title="Próximo Filme">Pr&oacute;ximo Filme</a>
<ul id="SlidesDestaqueTopo" class="slider_ul">

<li>
<div class="info_topo">
<p>
 
                                                <strong>logo</strong>
                                          
                                            

</p>
<div class="thumb_cinema">
<div class="border-thumb">
<span class="border-left"></span>
<span class="border-bottom"></span>
</div>
<a href="cinema_interna.cfm?filme=1031" title="Somos Tão Jovens"><img src="http://www.paseoitaigara.com.br/conteudo/filme/339762B2-3048-9A96-8289F0F19E0996A0.png" alt="Os Croods"  width="90" height="134" style="margin-top:15px;"/></a>
</div>
</div>
</li>

</ul>
<ul id="Paginacao">
<li class="btRpt">1</li>
</ul>
</div>
</div>
</div>	
<div class="clear"></div>
</div><!-- / AtalhosTopo -->



</div><!-- / BlocosTopo -->
<div id="BlocosConteudo"><!-- blocos do conteúdo -->

<div id="Lojas" class="bloco lojas_bloco"><!-- bloco de lojas -->
<div class="icon_bloco">
<div class="inner_rotate">
<a href="lojas.cfm" title="">群组话题数排行</a>
</div>
</div>

                	<div class="box l1 c1">
                     <div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot';">
                            <div class="marca_box">
                                <h3 style="margin-top:50px;">群组分类(全部)</h3>

                            </div>
                        </div>
                    </div>
                    
                	<div class="box l2 c2">
                     <div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot&fieldid=1&orderby=threadnum';">
                            <div class="marca_box">
                              <h3 style="margin-top:50px;">自由联盟</h3>
                            </div>
                        </div>
                    </div>
                    
                	<div class="box l3 c3">
                     <div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot&fieldid=2&orderby=threadnum';">
                            <div class="marca_box">
                              <h3 style="margin-top:50px;">地区联盟</h3>
                            </div>
                        </div>
                    </div>
                    
                	<div class="box l4 c4">
                     <div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot&fieldid=3&orderby=threadnum';">
                            <div class="marca_box">
                              <h3 style="margin-top:50px;">兴趣联盟</h3>
                            </div>
                        </div>
                    </div>
                    
<div class="box veja_mais l5 c5">
<div class="inner_rotate">
<a href="lojas.cfm" title="Clique para ver mais lojas" class="marca_box link_mais box_lojas">更多</a>
</div>
</div>
<div class="clear"></div>
</div><!-- / Lojas -->


<div id="Servicos" class="bloco servicos_bloco"><!-- bloco de serviços -->
<div class="icon_bloco">
<div class="inner_rotate">
<a href="servicos.cfm" title="">图片</a>
</div>
</div>

<div class="box l3 c1">
<div class="inner_rotate">
<div class="marca_box">
<h3 style="margin-top:50px;">群组话题数排行</h3>
</div>
<div class="marcas_bottom">

<div>
<div class="slides_container" ><!-- marcas numa lista prevendo ter mais de uma -->
                            	
                                	<div onclick="window.location='space.php?do=mtag&view=hot&fieldid=0&orderby=threadnum';" style="background: url(http://www.paseoitaigara.com.br/conteudo/loja/imagem_logo_extra/C315BB26-3048-9A96-82BB2902315ECFB3.png) center center no-repeat;cursor:pointer;"></div>

</div><!-- /slides_container -->
</div><!-- /slides -->

</div>
</div>
</div>

<div class="box l4 c2">
<div class="inner_rotate">
<div class="marca_box">
  <p style="margin-bottom:8px;">NO.1群组:<?=$thread1['0']?></p>
<h3 style="margin-bottom:8px;"><a href="space.php?do=mtag&tagid=<?=$thread4['0']?>" title="话题数:<?=$thread2['0']?>">话题数:<?=$thread2['0']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$thread4['0']?>" title="群组公告:<?=$thread3['0']?>"><?php if($thread3['0']) { ?>群组公告:<?=$thread3['0']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
<div class="marcas_bottom">

<div>
<div class="slides_container" ><!-- marcas numa lista prevendo ter mais de uma -->
                            	
                                	<div onclick="window.location='space.php?do=mtag&tagid=<?=$thread4['0']?>';" style="background: url(http://www.paseoitaigara.com.br/conteudo/loja/imagem_logo_extra/C3484D79-3048-9A96-82276493B46C3C7E.png) center center no-repeat;cursor:pointer;"></div>

</div><!-- /slides_container -->
</div><!-- /slides -->

</div>
</div>
</div>

<div class="box l5 c3">
<div class="inner_rotate">
<div class="marca_box">
 <p style="margin-bottom:8px;">NO.2群组:<?=$thread1['1']?></p>
<h3 style="margin-bottom:8px;"><a href="space.php?do=mtag&tagid=<?=$thread4['1']?>" title="话题数:<?=$thread1['1']?>">话题数:<?=$thread2['1']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$thread4['1']?>" title="群组公告:<?=$thread3['1']?>"><?php if($thread3['1']) { ?>群组公告:<?=$thread3['1']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
<div class="marcas_bottom">

<div>
<div class="slides_container" ><!-- marcas numa lista prevendo ter mais de uma -->
                            	
</div><!-- /slides_container -->
</div><!-- /slides -->

</div>
</div>
</div>

<div class="box l6 c4">
<div class="inner_rotate">
<div class="marca_box">
<p style="margin-bottom:8px;">NO.3群组:<?=$thread1['2']?></p>
<h3 style="margin-bottom:8px;"><a href="space.php?do=mtag&tagid=<?=$thread4['2']?>" title="话题数:<?=$thread2['2']?>">话题数:<?=$thread2['2']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$thread4['2']?>" title="群组公告:<?=$thread3['2']?>"><?php if($thread3['2']) { ?>群组公告:<?=$thread3['2']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
<div class="marcas_bottom">

<div class="slides">
<div class="slides_container" ><!-- marcas numa lista prevendo ter mais de uma -->
                            	
                                	<div onclick="window.location='space.php?do=mtag&tagid=<?=$thread4['2']?>';" style="background: url(http://www.paseoitaigara.com.br/conteudo/loja/imagem_logo_extra/C33B2738-3048-9A96-8226A5376A8C63DB.png) center center no-repeat;cursor:pointer;"></div>

</div><!-- /slides_container -->
</div><!-- /slides -->

</div>
</div>
</div>

<div class="box veja_mais l7 c5">
<div class="inner_rotate">
<a href="servicos.cfm" title="Clique para ver mais serviços" class="marca_box box_servicos">更多</a>
</div>
</div>
<div class="clear"></div>
</div><!-- / Servicos -->


<div id="Novidades" class="bloco novidades_bloco"><!-- bloco de novidades -->
<div class="icon_bloco">
<div class="inner_rotate">
<a href="novidades.cfm" title="">图片</a>
</div>
</div>

<div class="box l5 c1">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot&fieldid=0&orderby=postnum';">

<div class="marca_box">
<h3 style="margin-top:50px;">群组回帖数排行</h3>
</div>
</div>
</div>

<div class="box l6 c2">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$post4['0']?>';">

<div class="marca_box">
<span class="data">NO.1群组:<?=$post1['0']?></span>
<h3><a href="space.php?do=mtag&tagid=<?=$post4['0']?>" title="话题数:<?=$post2['0']?>">回帖数:<?=$post2['0']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$post4['0']?>" title="群组公告:<?=$post3['0']?>"><?php if($post3['2']) { ?>群组公告:<?=$post3['0']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box l7 c3">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$post4['1']?>';">

<div class="marca_box">
<span class="data">NO.2群组:<?=$post1['1']?></span>
<h3><a href="space.php?do=mtag&tagid=<?=$post4['1']?>" title="回帖数:<?=$post2['1']?>">回帖数:<?=$post2['1']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$post4['1']?>" title="群组公告:<?=$post3['1']?>"><?php if($post3['2']) { ?>群组公告:<?=$post3['1']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box l8 c4">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$post4['2']?>';">

<div class="marca_box">
<span class="data">NO.3群组:<?=$post1['2']?></span>
<h3><a href="space.php?do=mtag&tagid=<?=$post4['2']?>" title="回帖数:<?=$post2['2']?>">回帖数:<?=$post2['2']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$post4['2']?>" title="群组公告:<?=$post3['2']?>"><?php if($post3['2']) { ?>群组公告:<?=$post3['2']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box veja_mais l9 c5">
<div class="inner_rotate">
<a href="novidades.cfm" title="Clique para ver mais eventos" class="marca_box box_noticias">更多</a>
</div>
</div>
<div class="clear"></div>
</div><!-- / Novidades -->


<div id="Cinema" class="bloco cinema_bloco"><!-- bloco de cinema -->
<div class="icon_bloco">
<div class="inner_rotate">
<a href="cinema.cfm" title="">图片</a>
</div>
</div>

<div class="box l7 c1">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&view=hot&fieldid=0&orderby=membernum';">

<div class="marca_box">
<h3 style="margin-top:50px;">群组成员数排行</h3>
</div>
</div>
</div>

<div class="box l8 c2">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$member4['0']?>';">

<div class="marca_box">
<p style="margin-bottom:38px;">NO.1群组:<?=$member1['0']?></p>
<h3><a href="space.php?do=mtag&tagid=<?=$member4['0']?>" title="成员数:<?=$member2['0']?>">成员数:<?=$member2['0']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$member4['0']?>" title="群组公告:<?=$member3['0']?>"><?php if($member3['0']) { ?>群组公告:<?=$member3['0']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box l9 c3">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$member4['1']?>';">

<div class="marca_box">
<p style="margin-bottom:38px;">NO.2群组:<?=$member1['1']?></p>
<h3><a href="space.php?do=mtag&tagid=<?=$member4['1']?>" title="成员数:<?=$member2['1']?>">成员数:<?=$member2['1']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$member4['1']?>" title="群组公告:<?=$member3['1']?>"><?php if($member3['2']) { ?>群组公告:<?=$member3['1']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box l10 c4">
<div class="inner_rotate" style="cursor:pointer" onclick="window.location='space.php?do=mtag&tagid=<?=$member4['2']?>';">

<div class="marca_box">
<p style="margin-bottom:38px;">NO.3群组:<?=$member1['2']?></p>
<h3><a href="space.php?do=mtag&tagid=<?=$member4['2']?>" title="成员数:<?=$member2['2']?>">成员数:<?=$member2['2']?></a></h3>
<p><a href="space.php?do=mtag&tagid=<?=$member4['2']?>" title="群组公告:<?=$member3['2']?>"><?php if($member3['2']) { ?>群组公告:<?=$member3['2']?><?php } else { ?>群组公告:无<?php } ?></a></p>
</div>
</div>
</div>

<div class="box veja_mais l11 c5">
<div class="inner_rotate">
<a href="space.php?do=mtag&view=hot&fieldid=0&orderby=membernum" title="Clique para ver mais filmes" class="marca_box box_cinema">更多</a>
</div>
</div>

</div><!-- / Cinema -->
</div><!-- / BlocosConteudo -->





</div><!-- / Conteudo -->


 <ul id="navigation">
            <li class="home"><a href="space.php?do=home" title="首页"></a></li>
             <li class="about"><a href="space.php?do=medicine" title="用药助手"></a></li>
            <li class="search"><a href="space.php?do=activity" title="活动"></a></li>
            <li class="photos"><a href="" title="Photos"></a></li>
            <li class="rssfeed"><a href="" title="Rss Feed"></a></li>
            <li class="podcasts"><a href="" title="Podcasts"></a></li>
            <li class="contact"><a href="" title="Contact"></a></li>
        </ul>
     
     <style>

ul#navigation li {
    width: 100px;
    float:left;
}

ul#navigation .home a{
    background-image: url(template/default/image/home.png);
}
ul#navigation .about a      {
    background-image: url(template/default/image/id_card.png);
}
ul#navigation .search a      {
    background-image: url(template/default/image/search.png);
}
ul#navigation .podcasts a      {
    background-image: url(template/default/image/ipod.png);
}
ul#navigation .rssfeed a   {
    background-image: url(template/default/image/rss.png);
}
ul#navigation .photos a     {
    background-image: url(template/default/image/camera.png);
}
ul#navigation .contact a    {
    background-image: url(template/default/image/mail.png);
}
     ul#navigation {
    position: fixed;
    margin: 0 auto;
    padding: 0px;
    bottom:-30px;
    left:24%;
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

        </script>	


</body>
</html><?php ob_out();?>