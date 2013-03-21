<?php
include('simple_html_dom.php');
$url='http://gs1.dlut.edu.cn:8081/dutmisweb3/login.aspx?flag=1';
$htmlstr=file_get_html('http://gs1.dlut.edu.cn:8081/dutmisweb3/login.aspx?flag=1');
$html=str_get_html($htmlstr);
foreach($html->find('input[id=__VIEWSTATE]') as $e)
{
	$nowview=$e->value;
}
//echo $nowview;
foreach($html->find('input[id=__EVENTVALIDATION]') as $e)
{
	$nowevent=$e->value;
}
$post=array(
		txtid=>21209034,
		txtpwd=>160612,
		RBl_login=>student,
		__VIEWSTATE=>$nowview,
		__EVENTVALIDATION=>$nowevent,
		cmdok=>确定
		);
//$user_agent = "Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)";
$ch = curl_init();
$uurl='http://gs1.dlut.edu.cn:8081/dutmisweb3/login.aspx?flag=1';
curl_setopt($ch, CURLOPT_URL, $uurl);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
$content = curl_exec($ch);
curl_close($ch);
list($header, $body) = explode('\r\n\r\n', $content);
preg_match('/set\-cookie:([^\r\n]*)/i', $header, $matches);
$cookie = $matches[1];

$ch=curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
//curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch,CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

//$htmlstr=fetch('http://gs1.dlut.edu.cn:8081/dutmisweb3/student/selcourse/Rsel_top.aspx');


/*$html=str_get_html($htmlstr);
foreach($html->find('input[id=__VIEWSTATE]') as $e)
{
	$nowview=$e->value;
}
//echo $nowview;
foreach($html->find('input[id=__EVENTVALIDATION]') as $e)
{
	$nowevent=$e->value;
}
$post= array(
		__EVENTVALIDATION=>$nowevent,
		__VIEWSTATE=>$nowview,
		);
echo $post;*/
$ch=curl_init();
$url='http://gs1.dlut.edu.cn:8081/dutmisweb3/student/selcourse/Rsel_top.aspx';
//$url='http://gs1.dlut.edu.cn:8081/dutmisweb3/student/examinfo/examinfo.aspx';
//$url='http://gs1.dlut.edu.cn:8081/dutmisweb3/student/survey/survey.aspx';
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
//curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch,CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
var_dump($result);


?>
