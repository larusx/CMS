<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />

</head>
<body>
<?php
$usertype=$_POST['user'];
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link)
{
	mysql_select_db(SAE_MYSQL_DB,$link);
}
$name=$_POST['name'];
$pwd=$_POST['pwd'];
if(empty($name))
{
	mysql_close($link);
	echo "<script>alert('请输入帐号!');history.go(-1);</script>";
	exit;
}
if(empty($pwd))
{
	mysql_close($link);
	echo "<script>alert('请输入密码！');history.go(-1);</script>";
	exit;
}
if($usertype)
{
	$result=mysql_query("select user,passwd from teauser where user='$name';");
	$row=mysql_fetch_row($result);
	if(empty($row))
	{
		echo "<script>alert('无此帐号!');history.go(-1);</script>";
		exit;
	}
	if(strcmp($row[1],$pwd)==0)
	{
		$result=mysql_query("SELECT 教师.姓名 AS 教师姓名,课程名称,学时,学生.学号,学生.姓名,年级 FROM teauser,教师,课程,选课,学生 WHERE 教师.工号=课程.教师工号 AND 课程.课程号=选课.课程号 AND 选课.学号=学生.学号 AND user='$name' AND id=教师.工号 ORDER BY 课程名称;");
		echo "<center>选课情况如下</center><br/>";
		echo "<table border='1' align='center'><tr><th>教师姓名</th><th>课程名称</th><th>课时</th><th>学生学号</th><th>学生姓名</th><th>学生年级</th></tr>";
		while($row=mysql_fetch_array($result))
		{
			echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
		}       
		echo "</table>";
		$result=mysql_query("SELECT 教师.姓名 AS 教师姓名,课程名称,课程号,学时 FROM 课程,教师,teauser WHERE user='$name' AND 教师工号=工号 AND id=工号;");
		echo "<center>您的所有课程如下</center><br/>";
		echo "<table border='1' align='center'><tr><th>教师姓名</th><th>课程名称</th><th>课程号</th><th>课时</th>";
		while($row=mysql_fetch_array($result))
		{
			echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
		}
		echo "</table>";


		echo "<center>";
		echo "添加课程：";
		echo "<form action='add.php?name=$name' method='post'>";
		echo "课名:<input type='text' name='course'><br/>";
		echo "课时:<input type='text' name='time'><br/>";
		echo "<input type='submit' name='add' value='提交课程'><br/>";
		echo "删除课程：<br/>";
		echo "课程号:<input type='text' name='cnu'><br/>";
		echo "<input type='submit' name='remove' value='删除课程'>";
		echo "</center>";


		mysql_close($link);
		exit;
	}
	else
	{
		mysql_close($link);
		echo "<script>alert('密码错误！');history.go(-1);</script>";
		exit;
	}
}
else
{
	$result=mysql_query("select user,passwd from stuuser where user='$name';");
	$row=mysql_fetch_row($result);
	if(empty($row))
	{
		echo "<script>alert('无此帐号!');history.go(-1);</script>";
		exit;
	}

	if(strcmp($row[1],$pwd)==0)
	{
		$result=mysql_query("SELECT 学生.学号,学生.姓名 AS 学生姓名 ,年级,课程名称,学时,教师.姓名,课程.课程号 AS 老师姓名 FROM stuuser,学生,选课,课程,教师 WHERE user='$name' AND id=学生.学号 AND 学生.学号=选课.学号 AND 选课.课程号=课程.课程号 AND 课程.教师工号=教师.工号 ORDER BY 学号;");
		echo "<center>您的选课情况如下</center><br/>";
		echo "<table border='1' align='center'><tr><th>学号</th><th>学生姓名</th><th>年级</th><th>课程号</th><th>课程名称</th><th>学时</th><th>老师姓名</th></tr>";
		while($row=mysql_fetch_array($result))
		{
			echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[6]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
		}
		echo "</table>";
		echo "<center>您可以选择的课程如下</center><br/>";
		$result=mysql_query("SELECT 课程.课程号,课程.学时,课程.课程名称,教师.姓名 from 课程,教师 WHERE 课程.教师工号=教师.工号 ORDER BY 课程.课程号;");
		$usr=mysql_query("SELECT id from stuuser where user='$name';");
		$row=mysql_fetch_array($usr);
		echo "<center><form action='select.php?uid=$row[0]' method='post'>";
		while($row=mysql_fetch_array($result))
		{
			echo "<input type='checkbox' name='id[]' value='$row[0]'>$row[2] 学时 $row[1] 任课教师 $row[3]<br/>";

		}
		echo "<input type='submit' name='add' value='确认选课'></br>";
		echo "请输入要删除的课程号:<input type='text' name='courseid'>";
		echo "<input type='submit' name='remove' value='删除选课'></form>";
		mysql_close($link);
		exit;
	}
	else
	{
		mysql_close($link);
		echo "<script>alert('密码错误！');history.go(-1);</script>";
		exit;
	}
}

?>
</body>
</html>
