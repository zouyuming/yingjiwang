<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $header_html; ?></head>
<body>
	<div id="login_backgroud"></div>
	<div id="login">
		<form action="login/check" method="post" id="checkLogin">
			<span>用户登陆</span>
			<div class="grey_input">
				<label>用户名:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div class="grey_input">
				<label>密&nbsp;&nbsp;&nbsp;码:</label>
				<input type="password" name="password" id="password" />
			</div>
			<input class="submit" type="submit" value=""/>
		</form>
		<div id="user_tips">
			<p align="center">
				演示数据不含全部抓取结果
				<br />
				演示账户修改操作不作生效
			</p>
			<p>&nbsp;</p>
			<p align="center">
				<a href='http://download.firefox.com.cn/releases/webins/4.0/zh-CN/Firefox-latest.exe' target="_blank">
					<img src='http://firefox.com.cn/static/images/about/spread/110x32_get_purple.png' alt='Spread Firefox Affiliate Button' width="110" height="32" hspace="5" vspace="10" border='0' align="absmiddle" />
				</a>

				<a href="http://dl.pconline.com.cn/download/51614.html" target="_blank">
					<img src="http://203.156.205.237/SentiInfo/style/default/images/googleChrome.png" width="110" height="32" vspace="10" border="0" align="absmiddle" />
				</a>
			</p>
		</div>

</body>
	</html>