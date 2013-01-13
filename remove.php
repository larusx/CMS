<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if(isset($_POST['remove']))
{


	$cnu=$_POST['cnu'];
	if(empty($cnu))
	{
		echo "<script>alert('请输入要删除的课程号!');history.go(-1);</script>";
		exit;
	}
	$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($link)
	{
		mysql_select_db(SAE_MYSQL_DB,$link);
	}
	$result=mysql_query("select 课程号 from 课程 where 课程号='$cnu';");
	$row=mysql_fetch_array($result);
	if(empty($row))
	{
		echo "<script>alert('不存在此课程!');history.go(-1);</script>";
		exit;
	}
	mysql_query("delete from 课程 where 课程号='$cnu';");
	mysql_query("delete from 选课 where 课程号='$cnu';");
	echo "<script>alert('删除成功!');history.go(-1);</script>";
	exit;
}
?>
</html>

