<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />

</head>
<?php
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB,$link);
//echo $_POST['$uid'];
$uid=$_GET['uid'];
$id=$_POST['id'];
if(isset($_POST['add']))
{
	if(empty($id))
	{
		echo "<script>alert('请选课!');history.go(-1);</script>";
		exit;
	}

	foreach($id as $key=>$value)
	{
		$result=mysql_query("INSERT INTO 选课 SELECT '$uid', '$value' FROM dual WHERE NOT EXISTS ( SELECT * FROM 选课 WHERE 学号 = '$uid' AND 课程号 = '$value');");
	}
	echo "<script>alert('选课成功!');history.go(-1);</script>";
	exit;
}
if(isset($_POST['remove']))
{
	if(empty($_POST['courseid']))
	{
		echo "<script>alert('请输入要删除的课程!');history.go(-1);</script>";
		exit;
	}
	$courseid=$_POST['courseid'];
	$result=mysql_query("select 课程号 from 选课 where '$courseid'=课程号 AND '$uid'=学号;");
	$row=mysql_fetch_array($result);
	if(empty($row))
	{
		echo "<script>alert('没选过这个课程!');history.go(-1);</script>";
		exit;
	}
	mysql_query("delete from 选课 where '$courseid'=课程号 AND '$uid'=学号;");
	echo "<script>alert('删除选课成功!');history.go(-1);</script>";
	exit;
}
?>

</html>
