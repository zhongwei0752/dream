<?php
/**
  * wechat php test
  */

include_once('./../common.php');

include_once( 'botutil.php' );
//define your token
define("TOKEN", "xiaodongshu");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
		public function welcome($toUsername) {
        if($toUsername=="gh_71e78c3b0890"){
            return      "你好！欢迎关注小冬树，小冬树将为你提供部分网站数据，想要更多的数据，请关注我们的官网，目前小冬树只有以下功能:
				回复数字【1】--用药助手;
				回复数字【2】--查看最新活动;
				回复数字【3】--查看最新群组话题;
				回复数字【4】--查看最新案例讨论;
				回复数字【5】--查看医疗笑话;
				回复数字【6】--查看今日医疗资讯;
				回复数字【7】--本周专题;
";
        }
    }
  
    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {	
                  	if ($keyword=='Hello2BizUser'){
						$msgType = "text";
						$contentStr = "你好！欢迎关注小冬树，小冬树将为你提供部分网站数据，想要更多的数据，请关注我们的官网，目前小冬树有以下功能:
				回复数字【1】--用药助手;
				回复数字【2】--查看最新活动;
				回复数字【3】--查看最新群组话题;
				回复数字【4】--查看最新案例讨论;
				回复数字【5】--查看医疗笑话;
				回复数字【6】--查看今日医疗资讯;
";
						$resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr); 
					}elseif($keyword=='1'){
                      $msgType = "text";
                      $contentStr ="欢迎使用用药助手，请直接输入药品名称！";
                      $resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr); 
                    }elseif($keyword=='2'){
                      $msgType = "text";
                      $jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=activity";
					  $json = file_get_contents($jsonurl,0,null,null);
					  $json_output = json_decode($json);
						if ($json_output->code==0){
						$articles = array();
                        $contentStr ="最新活动\r\n标语:每日活动，志在参与\r\n活动名称:".$json_output->data->activity[0]->title."\r\n活动地点:".$json_output->data->activity[0]->province ."-".$json_output->data->activity[0]->city."-".$json_output->data->activity[0]->location."\r\n活动时间:".$json_output->data->activity[0]->starttime."-".$json_output->data->activity[0]->endtime."\r\n活动详情:".$json_output->data->activity[0]->detail."\r\n已有".$json_output->data->activity[0]->membernum."人参加";
                        $resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr);		
                        }
                    }elseif($keyword=='3'){
                      $jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=group";
                      $json = file_get_contents($jsonurl,0,null,null);
                      $json_output = json_decode($json);
                      if ($json_output->code==0){
                      $msgType = "news";
                      $pic = "http://www.betit.cn/image/org_img/logo.jpg";
					  $url = "#";
					  $articles[] = makeArticleItem("最新群组话题", "最新群组话题", $pic, $url);
					  $resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "最新群组话题",$articles);
                        $msg = "参与是一种乐趣,为你搜索最新2条群组话题:";
						$pic = "";
						$url = "";
						$articles[] = makeArticleItem($msg, $msg, $pic, $url);
                        $url = "";
						$pic = "";
						$option="一,群组话题:". $json_output->data->group[0]->subject;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="来自群组:". $json_output->data->group[0]->tagname;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="作者:". $json_output->data->group[0]->username;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="群组公告:". $json_output->data->group[0]->announcement;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option="二,群组话题:". $json_output->data->group[1]->subject;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="来自群组:". $json_output->data->group[1]->tagname;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="作者:". $json_output->data->group[1]->username;
						$articles[] = makeArticleItem($option,$option);					
						$url = "";
						$pic = "";
						$option="群组公告:". $json_output->data->group[1]->announcement;
						$articles[] = makeArticleItem($option,$option);
                        $resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "最新群组话题",$articles);
                      } 
                    }elseif($keyword=='4'){
                      $jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=discussion";
                      $json = file_get_contents($jsonurl,0,null,null);
                      $json_output = json_decode($json);
                       if ($json_output->code==0){
                        $msgType = "news";
                      	$pic = "http://www.betit.cn/image/org_img/logo.jpg";
						$url = "#";
						$articles[] = makeArticleItem("案例讨论", "案例讨论", $pic, $url);
						$resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "案例讨论",$articles);	
						$msg = "分享人生，珍爱生命，为你分享最新的2条数据:";
						$pic = "";
						$url = "";
						$articles[] = makeArticleItem($msg, $msg, $pic, $url);
                        $url = "";
						$pic = "";
						$option="一,案例标题:". $json_output->data->discussion[0]->subject;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="作者:". $json_output->data->discussion[0]->username;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option="案例详情:". $json_output->data->discussion[0]->message;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option="处理方法:". $json_output->data->discussion[0]->think;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option=$json_output->data->discussion[0]->replynum ."条评论,". $json_output->data->discussion[0]->click_16 ."人同意," .$json_output->data->discussion[0]->click_17 ."人反对.";
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="二,案例标题:". $json_output->data->discussion[1]->subject;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="作者:". $json_output->data->discussion[1]->username;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option="案例详情:". $json_output->data->discussion[1]->message;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option="处理方法:". $json_output->data->discussion[1]->think;
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
                        $option=$json_output->data->discussion[1]->replynum ."条评论,". $json_output->data->discussion[1]->click_16 ."人同意," .$json_output->data->discussion[1]->click_17 ."人反对.";
						$articles[] = makeArticleItem($option,$option);
                        $resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "案例讨论",$articles); 
                       }
                    
                    }elseif($keyword=='5'){
                    $jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=joke";
                    $json = file_get_contents($jsonurl,0,null,null);
                    $json_output = json_decode($json);
                    $msgType = "text";
					if ($json_output->code==0){
					$articles = array();
                    $contentStr ="医疗笑话\r\n标语:美丽的人生，需要微笑示人\r\n一,笑话题目:".$json_output->data->joke[0]->subject."\r\n笑话内容:".$json_output->data->joke[0]->message ."\r\n二,笑话题目:".$json_output->data->joke[1]->subject ."\r\n笑话内容:".$json_output->data->joke[1]->message ."\r\n三,笑话题目:".$json_output->data->joke[2]->subject ."\r\n笑话内容:".$json_output->data->joke[2]->message ;
                    $resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr);
                    }
                    }elseif($keyword=='6'){
					$jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=littlenews";
                    $json = file_get_contents($jsonurl,0,null,null);
                    $json_output = json_decode($json);
                    $msgType = "text";
					if ($json_output->code==0){
					$articles = array();
                    $contentStr ="今日快讯\r\n标语:花点时间，看看这个世界\r\n".$json_output->data->littlenews[0]->subject."\r\n".$json_output->data->littlenews[0]->message ."\r\n".$json_output->data->littlenews[1]->subject ."\r\n".$json_output->data->littlenews[1]->message ."\r\n".$json_output->data->littlenews[2]->subject ."\r\n".$json_output->data->littlenews[2]->message ."\r\n".$json_output->data->littlenews[3]->subject ."\r\n".$json_output->data->littlenews[3]->message;
                    $resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr);
                    }
                    
                    }else{
      			$jsonurl = "http://xiaodongshu.duapp.com/dream/dream/home/capi/cp.php?ac=way&way=medicine&searchkey=$keyword";
     			$json = file_get_contents($jsonurl,0,null,null);
	  			$json_output = json_decode($json);
      			if ($json_output->code==0){
        
        		$array['mingcheng']=$json_output->data->medicine[0]->mingcheng;
       			$array['guige']= $json_output->data->medicine[0]->guige;
        		$array['danjia']= $json_output->data->medicine[0]->danjia;
        		$array['bianma']= $json_output->data->medicine[0]->bianma;
        		$array['mingcheng1']=$json_output->data->medicine[1]->mingcheng;
       			$array['guige1']= $json_output->data->medicine[1]->guige;
        		$array['danjia1']= $json_output->data->medicine[1]->danjia;
        		$array['bianma1']= $json_output->data->medicine[1]->bianma;
                        $msgType = "news";
                      	$pic = "http://www.betit.cn/image/org_img/logo.jpg";
						$url = "#";
						$articles[] = makeArticleItem("医药助手", "医药助手", $pic, $url);
						$resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "医药助手",$articles);	
						$msg = "根据你的关键字，为你搜索最接近的2条数据:";
						$pic = "";
						$url = "";
						$articles[] = makeArticleItem($msg, $msg, $pic, $url);
						$url = "";
						$pic = "";
						$option="一,名称:". $array['mingcheng'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="规格:". $array['guige'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="单价:". $array['danjia'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="编码:". $array['bianma'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="二,名称:". $array['mingcheng1'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="规格:". $array['guige1'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="单价:". $array['danjia1'];
						$articles[] = makeArticleItem($option,$option);
                        $url = "";
						$pic = "";
						$option="编码:". $array['bianma1'];
						$articles[] = makeArticleItem($option,$option);					
						$resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, "医药助手",$articles); 
                      }else{
                     $msgType = "text";
                     $contentStr = "你好！目前小冬树有以下功能:
回复数字【1】--用药助手;
回复数字【2】--查看最新活动;
回复数字【3】--查看最新群组话题;
回复数字【4】--查看最新案例讨论;
回复数字【5】--查看医疗笑话;
回复数字【6】--查看今日医疗资讯;
";
                      $resultStr = makeText($fromUsername, $toUsername, $time, $msgType, $contentStr); 
                      }
                    }
              		 echo $resultStr;
                	
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	
}
?>