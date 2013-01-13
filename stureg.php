<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />

</head>
<body>

<?php
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
$username=$_POST['name'];
$passwd=$_POST['passwd'];
$stuid=$_POST['stuid'];
$stuname=$_POST['stuname'];
$grade=$_POST['grade'];
if(empty($username)||empty($passwd)||empty($stuid)||empty($stuname)||empty($grade))
{
	mysql_close($link);
	echo "<script>alert('请补全信息');history.go(-1);</script>";
	exit;
}
mysql_select_db(SAE_MYSQL_DB,$link);
$result=mysql_query("select * from stuuser where user='$username';");
$row=mysql_fetch_array($result);
if(!empty($row))
{
	mysql_close($link);
	echo "<script>alert('帐号重复');history.go(-1);</script>";
	exit;
}
$result=mysql_query("select * from 学生 where '$stuid'=学号");
$row=mysql_fetch_array($result);
if(!empty($row))
{
	echo "<script>alert('学号重复');history.go(-1);</script>";
	exit;
}
mysql_query("insert into 学生 values('$stuid','$stuname','$grade');");
mysql_query("insert into stuuser values('$username','$passwd','$stuid');");
echo "<script>alert('注册成功');history.go(-2);</script>";
mysql_close($link);
exit;
?>
</body>
</html>
