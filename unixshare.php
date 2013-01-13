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
		<FuncFlag>0<FuncFlag>
		</xml>";
	if(!empty( $keyword )){
		$msgType = "text";
		$post_data = array();
		$post_data['city'] = $keyword;
		$post_data['submit'] = "submit";
		$url='http://search.weather.com.cn/wap/search.php';
		$o="";
		foreach ($post_data as $k=>$v){
			$o.= "$k=".urlencode($v)."&";
		}
		$post_data=substr($o,0,-1);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		curl_close($ch);
		$result=explode('/',$result);
		$result=explode('.',$result['5']);
		$citynum = $result['0'];
		$weatherurl = "http://m.weather.com.cn/data/".$citynum.".html";
		$weatherjson = file_get_contents($weatherurl);
		$weatherarray = json_decode($weatherjson,true);
		$weatherinfo = $weatherarray['weatherinfo'];
		$contentTpl = "#这里是%s#(%s)
			%s%s
			%s时发布的天气预报：
			今天天气：%s
			%s，%s
			穿衣指数：%s
			紫外线指数：%s
			洗车指数：%s
			明天天气：%s
			%s，%s
			后天天气：%s
			%s，%s";
		$contentStr = sprintf($contentTpl,$weatherinfo['city'],$weatherinfo['city_en'],$weatherinfo['date_y'],$weatherinfo['week'],$weatherinfo['fchh'],$weatherinfo['temp1'],$weatherinfo['weather1'],$weatherinfo['wind1'],$weatherinfo['index_d'],$weatherinfo['index_uv'],$weatherinfo['index_xc'],$weatherinfo['temp2'],$weatherinfo['weather2'],$weatherinfo['wind2'],$weatherinfo['temp3'],$weatherinfo['weather3'],$weatherinfo['wind3']);
		$resultStr = sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,$contentStr);
		echo $resultStr;
	}else{
		echo "Input something...";
	}
}	else {
	echo "";
	exit;
}
?>
