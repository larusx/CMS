<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
<center>
<div class="text shadow" >Course Manage</div>
<!--<a href="http://myblog-larus.rhcloud.com"<>
<img src="a.jpg" width="800" height="200"/>
</a>--!>

<!--<iframe src="http://mybbs-larus.rhcloud.com" width="640" height="480" frameborder="0"></iframe>-->
<br/>
<form action="proc.php" method="post">
帐号：
<input type="text" name="name" autofocus="autofocus" required="required"/>
<br/>
密码：
<input type="password" name="pwd" required="required"/>
<br/>
<select name="user">
<option value='0'>学生</option>
<option value='1'>教师</option>
</select>
<input type="submit" value="Login" class="magenta awesome"/>
</form>
<table>
<tr>
<td>
<form action="stureg.html" >
<input type="submit" value="学生注册" class="awesome" />
</form>
</td>
<td>
<form action="teareg.html">
<input type="submit" value="教师注册" class="awesome" />
</form>
</td>
</tr>
</table>
<table>
<tr>
<td rowspan="2">
<form action="txt.php" method='post'> 
<textarea name ="txt" placeholder="在这里留下您的宝贵意见，thankyou！" rows="10" cols="50" class="leave shadow" required="required"></textarea>
</td>
<td>
<input type="submit" value="advice！！" class="button"/>
</form>
</td>
</tr>
<tr>
<td>
<a href="http://myblog-larus.rhcloud.com" style="text-shadow: 4px 4px 22px rgba(66, 34, 80, 1);font: bold 20px Helvetica, Arial, FreeSans, san-serif;">BLOG HERE</a>
</td>
</tr>
</table>
<div id="footer" class="shadow">larusx@163.com</div>
</center>
</body>
</html>
