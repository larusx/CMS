<?php
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
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
			$msgType = "text";
			$url='https://miumiu-larus.rhcloud.com/miumiu.php?key='.$keyword.'&submit=miumiu';
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch,CURLOPT_URL,$url);
			$contentStr = curl_exec($ch);
			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
			echo $resultStr;
		}else{
			echo "Input something...";
		}

}else {
	echo "";
	exit;
}
