<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />

</head>
<body>
<center>

<?php
	$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	$username=$_POST['name'];
	$passwd=$_POST['passwd'];
	$teaname=$_POST['teaname'];
	$teaid=$_POST['teaid'];
	if(empty($username)||empty($passwd)||empty($teaid)||empty($teaname))
	{
		mysql_close($link);
		echo "<script>alert('请补全信息');history.go(-1);</script>";
		exit;
	}
	mysql_select_db(SAE_MYSQL_DB,$link);
	$result=mysql_query("select * from teauser where user='$username';");
	$row=mysql_fetch_array($result);
	if(!empty($row))
	{
		mysql_close($link);
		echo "<script>alert('帐号重复');history.go(-1);</script>";
		exit;
	}
	$result=mysql_query("select * from 教师 where '$teaid'=工号;");
	$row=mysql_fetch_array($result);
	if(!empty($row))
	{
		echo "<script>alert('工号重复');history.go(-1);</script>";
		exit;
	}
	mysql_query("insert into 教师 values('$teaid','$teaname');");
	mysql_query("insert into teauser values('$username','$passwd','$teaid');");
	echo "<script>alert('注册成功');history.go(-2);</script>";
	mysql_close($link);
	exit;

?>
