// JavaScript Document
var bgindex = 0 ;
(function($){
	$('.whybox').mousemove(function(){$(this).addClass('whyboxhover')});
	$('.whybox').mouseout(function(){$(this).removeClass('whyboxhover')});
	$('.listbox ul').mouseout(function(){$(this).removeClass("over")});
	$('.listbox ul').mousemove(function(){$(this).addClass("over")});
	$('.l_pic_more').mouseout(function(){$(this).removeClass("l_pic_more_over")});
	$('.l_pic_more').mousemove(function(){$(this).addClass("l_pic_more_over")});
	
	 $('#bg').css('width',screen.width);
    orient();
	
	$(window).bind( 'orientationchange', function(e){
	orient();
	});
	
	//鎵归噺鏇挎崲瓒呴摼鎺ョ殑#鍙凤紝闃叉椤甸潰璺冲姩
	$("a").each(function(index, element) {
        if ($(this).attr("href")=="#"){
			$(this).attr('href','javascript:void(0);');
		}
    });
})(jQuery);

$(document).ready(function(e) {
	//window_size_change();
	//$("#bg").css("width",$(window).width());
	$(window).bind("scroll",function(){
	  if( $(document).scrollTop() < $(window).height() *1.5 ) {
	    $(".r_top").hide();
	  }else if($(document).scrollTop() > $(window).height() *1.5){
		 $(".r_top").show();
	  }
   });
	
	//鍗囦笂鍘�
    $('.whybox .home_down').click(function(){
		$("#pageInfo").show();
		$(".r_top").show();
		$("#topBox").animate({
		   marginTop: '-560px'
		 }, 500, function(){
			 $("#topBox").hide();
			 //window_size_change();
		});	
	
	});	
	
	//鎺変笅鏉�
	$('.pglogin').click(function(){
		$("#topBox").animate({
		   marginTop: '0px', 
		   opacity: 'show'
		 }, 500,function(){
			 $("#pageInfo").hide();
			 $(".r_top").hide();
			 
			 //window_size_change();
		 });

	});
	
	//鏇存崲鑳屾櫙锛堜笂涓€寮狅級
	 $('.previous').click(function(e) {
        //bglist bgindex
		bgindex = bgindex - 1;
		if (bgindex <=0) bgindex = bglist.length -1;
		var Img = new Image();
		Img.id = "bg";
        Img.src = bglist[bgindex];
        Img.onload = function ()
        {
			$("#m_bg").empty();
			$("#m_bg").append(Img);
			orient();
        }
    }); 
//鏇存崲鑳屾櫙锛堜笅涓€寮狅級
	$('.next').click(function(e) {
        bgindex = bgindex + 1;
		if (bgindex >= bglist.length) bgindex = 0;
		Img = new Image();
		Img.id = "bg";
        Img.src = bglist[bgindex];
        Img.onload = function ()
        {
			$("#m_bg").empty();
			$("#m_bg").append(Img);
			orient();
        }
    });
	//瀹樻柟娲诲姩瀛楄疆鎾�
	//setInterval('AutoScroll("#scrolltextDiv")',3000);
	
});

function window_size_change()
{
	var kongdivH = $(window).innerHeight() - $('.whybox').height() - $('.homefooter').height() - $('.w830').height();
	if (kongdivH<0) kongdivH = 0;
	$('#kongdiv').css("height",kongdivH + 'px');
}

function orient(){
if (window.orientation == 90 || window.orientation == -90) {
	  $('#bg').css('width',screen.width);
	  $('#bg').css('height','auto');
	}else if (window.orientation == 0 || window.orientation == 180) {
	  $('#bg').css('height',screen.height*5/4);
	  $('#bg').css('width','auto');
	}else{
	  $('#bg').css('width',screen.width);
	  $('#bg').css('height','auto');
	}
}

function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("鍔犲叆鏀惰棌澶辫触锛岃浣跨敤Ctrl+D杩涜娣诲姞");
        }
    }
}

	function AutoScroll(obj){
        $(obj).find("ul:first").animate({
                marginTop:"-25px"
        },500,function(){
                $(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
        });
		}
//		$(document).ready(function(){
//		});

function IsPC() { 
var userAgentInfo = navigator.userAgent; 
var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"); 
var flag = true; 
for (var v = 0; v < Agents.length; v++) { 
if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; } 
} 
return flag; 
}
function isiPad(){ 
    var ua = navigator.userAgent.toLowerCase(); 
    if(ua.match(/iPad/i)=="ipad") { 
       return true; 
    } else { 
       return false; 
    } 
}
window.onresize = window_size_change;


