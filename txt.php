<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />

</head>
<body>
<?php
$txt=$_POST['txt'];
if(empty($txt))
{
	echo "<script>alert('没有内容啊～～');history.go(-1);</script>";
	exit;
}
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link)
{
mysql_select_db(SAE_MYSQL_DB,$link);
}
mysql_query("insert into text values('NULL','$txt');");
echo "<script>alert('谢谢你的好建议～～');history.go(-1);</script>";

?>
</body>
</html>



