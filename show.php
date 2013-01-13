<?php
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB,$link);
$op=$_GET['q'];
if($op==1)
{
	$result=mysql_query("select * from 教师");
	echo "<table border='1'>
		<tr>
		<th>教师工号</th>
		<th>教师姓名</th>
		</tr>";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>
			<td>$row[0]</td><td>$row[1]</td></tr>";
	}
	echo "</table>";
	mysql_close($link);
}
if($op==0)
{
	$result=mysql_query("select * from 学生");
	echo "<table border='1'>
		<tr>
		<th>学号</th>
		<th>学生姓名</th>
		<th>学生年级</th>
		</tr>";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>
			<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
	}
	echo "</table>";
	mysql_close($link);
}
if($op==2)
{
	$result=mysql_query("select * from text");
	echo "<table border='1'>
		<tr>
		<th>条目</th>
		<th>内容</th>
		</tr>";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>
			<td>$row[0]</td><td>$row[1]</td></tr>";
	}
	echo "</table>";
	mysql_close($link);
}
?>
