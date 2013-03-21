<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
//$post_data = array();
$keyword="你好";
//$post_data['key'] = $keyword;
//$post_data['submit'] = "submit";
$url='http://miumiu-larus.rhcloud.com/miumiu.php?key='.$keyword;
//curl_setopt($ch, CURLOPT_POST, 1);
$ch=curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$result = curl_exec($ch);
echo $result;
?>
</html>
