<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<?php echo $header_html; ?>
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<a href="<?=base_url()?>"><img id="logo" src="<?=base_url().'resources/admin/images/logo.png'?>" alt="Simpla Admin logo" /></a>
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="<?=base_url().'admin/admin_login/check'?>" method="post" id="checkLogin">
				
					<div class="notification information png_bg">
						<div class="alert_info">
							请输入用户名和密码.
						</div>
					</div>
					
					<p>
						<label>用户名:</label>
						<input class="text-input" type="text" name="username" id="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>密&nbsp;&nbsp;码:</label>
						<input class="text-input" type="password" name="password" id="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="登  录" onclick=""/>
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
