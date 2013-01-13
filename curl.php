<?php
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'http://gs1.dlut.edu.cn:8081/dutmisweb3/login.aspx?flag=1');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$content=curl_exec($ch);
if(curl_errno($ch)) echo curl_error($ch);
else echo $content;
curl_close($ch);
?>
