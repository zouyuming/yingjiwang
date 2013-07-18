<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $header_html; ?></head>

<body>
	<div id="body-wrapper">
		<!-- Wrapper for the radial gradient background -->

		<div id="sidebar">
			<div id="sidebar-wrapper">
				<!-- Sidebar with logo and menu -->

				<h1 id="sidebar-title">
					<a href="#">Simpla Admin</a>
				</h1>

				<!-- Logo (221px wide) -->
				<a href="#">
					<img id="logo" src="<?=base_url().'resources/admin/images/logo.png'?>" alt="Simpla Admin logo" /></a>

				<!-- Sidebar Profile links -->
				<div id="profile-links">
					您好！,
					<a href="#" title="Edit your profile">
						<?php echo $userinfo['name']?></a>
					, you have
					<a href="#messages" rel="modal" title="3 Messages">3 Messages</a>
					<br />
					<br />
					<a href="<?=base_url()?>" title="浏览应急网首页">浏览应急网首页</a>
					|
					<a href="<?=base_url().'admin/admin_login/checkout'?>" title="Sign Out">退出</a>
				</div>

				<ul id="main-nav">
					<!-- Accordion Menu -->

					<li>
						<a href="<?=base_url().'admin/admin_index'?>" class="nav-top-item no-submenu">
							<!-- Add the class "no-submenu" to menu items with no sub menu -->Dashboard</a>
					</li>

					<li>
						<a href="#" class="nav-top-item current">
							<!-- Add the class "current" to current menu item -->新闻管理</a>
						<ul>
							<li>
								<a href="#">文章类别</a>
							</li>
							<li>
								<a class="current" href="<?=base_url().'admin/admin_news'?>">文章管理</a>
							</li>
							<!-- Add class "current" to sub menu items also -->
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">财务管理</a>
						<ul>
							<li>
								<a href="#">人头统计</a>
							</li>
							<li>
								<a href="#">充值统计</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">会员管理</a>
						<ul>
							<li>
								<a href="#">雇员管理</a>
							</li>
							<li>
								<a href="#">雇主管理</a>
							</li>
							<li>
								<a href="#">雇佣记录管理</a>
							</li>
							<li>
								<a href="#">投诉管理</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">广告管理</a>
						<ul>
							<li>
								<a href="#">广告类别</a>
							</li>
							<li>
								<a href="#">广告</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">参数管理</a>
						<ul>
							<li>
								<a href="#">区域管理</a>
							</li>
							<li>
								<a href="#">工种管理</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">系统管理</a>
						<ul>
							<li>
								<a href="#">后台用户管理</a>
							</li>
							<li>
								<a href="#">角色管理</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="nav-top-item">账号管理</a>
						<ul>
							<li>
								<a href="#">修改信息</a>
							</li>
						</ul>
					</li>

				</ul>
				<!-- End #main-nav -->

				<div id="messages" style="display: none">
					<!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

					<h3>3 Messages</h3>

					<p> <strong>17th May 2009</strong>
						by Admin
						<br />
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
						<small>
							<a href="#" class="remove-link" title="Remove message">Remove</a>
						</small>
					</p>

					<p> <strong>2nd May 2009</strong>
						by Jane Doe
						<br />
						Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
						<small>
							<a href="#" class="remove-link" title="Remove message">Remove</a>
						</small>
					</p>

					<p>
						<strong>25th April 2009</strong>
						by Admin
						<br />
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
						<small>
							<a href="#" class="remove-link" title="Remove message">Remove</a>
						</small>
					</p>

					<form action="#" method="post">

						<h4>New Message</h4>

						<fieldset>
							<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
						</fieldset>

						<fieldset>

							<select name="dropdown" class="small-input">
								<option value="option1">Send to...</option>
								<option value="option2">Everyone</option>
								<option value="option3">Admin</option>
								<option value="option4">Jane Doe</option>
							</select>

							<input class="button" type="submit" value="Send" />

						</fieldset>

					</form>

				</div>
				<!-- End #messages -->

			</div>
		</div>
		<!-- End #sidebar -->

		<div id="main-content">
			<!-- Main Content Section with everything -->

			<noscript>
				<!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please
						<a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a>
						your browser or
						<a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a>
						Javascript to navigate the interface properly.
					Download From
						<a href="http://www.exet.tk">exet.tk</a>
					</div>
				</div>
			</noscript>

			<!-- Page Head -->
			<h2>新闻管理页面</h2>
			<p id="page-intro">What would you like to do?</p>

			<ul class="shortcut-buttons-set">

				<li>
					<a class="shortcut-button" href="#">
						<span>
							<img src="<?=base_url().'resources/admin/images/icons/pencil_48.png'?>
							" alt="icon" />
							<br />
							文章列表
						</span>
					</a>
				</li>

				<li>
					<a class="shortcut-button" href="#" id="addNewsAction">
						<span>
							<img src="<?=base_url().'resources/admin/images/icons/paper_content_pencil_48.png'?>
							" alt="icon" />
							<br />
							添加文章
						</span>
					</a>
				</li>

				<li>
					<a class="shortcut-button" href="#messages" rel="modal">
						<span>
							<img src="<?=base_url().'resources/admin/images/icons/comment_48.png'?>
							" alt="icon" />
							<br />
							Open Msg
						</span>
					</a>
				</li>

			</ul>
			<!-- End .shortcut-buttons-set -->

			<div class="clear"></div>
			<!-- End .clear -->

			<div class="content-box">
				<!-- Start Content Box -->

				<div class="content-box-header">

					<h3>文章中心</h3>

					<ul class="content-box-tabs">
						<li>
							<a href="#tab1" id="minitab1" class="default-tab">新闻列表</a>
						</li>
						<!-- href must be unique and match the id of target div -->
						<li>
							<a href="#tab2" id="minitab2">添加新闻</a>
						</li>
					</ul>

					<div class="clear"></div>

				</div>
				<!-- End .content-box-header -->

				<div class="content-box-content">

					<div class="tab-content default-tab" id="tab1">
						<!-- This is the target div. id must match the href of this div's tab -->

						<div class="notification attention png_bg" style="display: none;">
							<a href="#" class="close">
								<img src="<?=base_url().'resources/admin/images/icons/cross_grey_small.png'?>" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>

						<table>

							<thead>
								<tr>
									<th>
										<input class="check-all" type="checkbox" />
									</th>
									<th width="35">编号</th>
									<th>文章标题</th>
									<th>分类</th>
									<th>置顶</th>
									<th>排序</th>
									<th>更新时间</th>
									<th>发布人</th>
									<th>操作组</th>
								</tr>

							</thead>

							<tfoot>
								<tr>
									<td colspan="9">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>

						               
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a>
											<a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a>
											<a href="#" title="Last Page">Last &raquo;</a>
										</div>
										<!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>

							<tbody id="newsList">
								<?php foreach ($newsList as $item): ?>
								<tr>
									<td>
										<input type="checkbox" />
									</td>
									<td>
										<?php echo $item['id']; ?></td>
									<td>
										<a href="#" title="title">
											<?php echo $item['title']; ?></a>
									</td>
									<td>
										<?php echo $item['type_name']; ?></td>
									<td>
										<?php if($item['iscommend']==0) echo "否";else echo "是"; ?></td>
									<td>
										<?php echo $item['sortrank']; ?></td>
									<td>
										<?php echo $item['created_time']; ?></td>
									<td>
										<?php echo $item['author']; ?></td>
									<td>
										<!-- Icons -->
										<a href="javascript:void(0)" onclick="editNews(<?php echo $item['id']; ?>)" title="Edit">
											<img src="<?=base_url().'resources/admin/images/icons/pencil.png'?>" alt="Edit" /></a>
										<a href="javascript:void(0)" onclick="deleteNews(<?php echo $item['id']; ?>)" title="Delete">
											<img src="<?=base_url().'resources/admin/images/icons/cross.png'?>" alt="Delete" /></a>
									</td>
								</tr>
								<?php endforeach; ?>
								<tr>
									<td>
										<input type="checkbox" />
									</td>
									<td>6</td>
									<td>
										<a href="#" title="title">Sit amet</a>
									</td>
									<td>Consectetur adipiscing</td>
									<td>默认</td>
									<td>否</td>
									<td>10</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										<a href="#" title="Edit">
											<img src="<?=base_url().'resources/admin/images/icons/pencil.png'?>" alt="Edit" /></a>
										<a href="#" title="Delete">
											<img src="<?=base_url().'resources/admin/images/icons/cross.png'?>" alt="Delete" /></a>
										<a href="#" title="Edit Meta">
											<img src="<?=base_url().'resources/admin/images/icons/hammer_screwdriver.png'?>" alt="Edit Meta" /></a>
									</td>
								</tr>
								<tr>
									<td colspan="9">
										<div class="pagination pagination-centered">
					                       <?php echo @str_replace('href','ajaxhref',$pagestr); ?>
						                </div>
									</td>
								</tr>
							</tbody>

						</table>

					</div>
					<!-- End #tab1 -->

					<div class="tab-content" id="tab2">

						<form action="#" method="post">

							<fieldset>
								<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<p>
									<label>Small form input</label>
									<input class="text-input small-input" type="text" id="small-input" name="small-input" />
									<span class="input-notification success png_bg">Successful message</span>
									<!-- Classes for input-notification: success, error, information, attention -->
									<br />
									<small>A small description of the field</small>
								</p>

								<p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />
									<span class="input-notification error png_bg">Error message</span>
								</p>

								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>

								<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" />
									This is a checkbox
									<input type="checkbox" name="checkbox2" />
									And this is another checkbox
								</p>

								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" />
									This is a radio button
									<br />
									<input type="radio" name="radio2" />
									This is another radio button
								</p>

								<p>
									<label>This is a drop down list</label>
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select>
								</p>

								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>

								<p>
									<input class="button" type="submit" value="Submit" />
								</p>

							</fieldset>

							<div class="clear"></div>
							<!-- End .clear -->

						</form>

					</div>
					<!-- End #tab2 -->

				</div>
				<!-- End .content-box-content -->

			</div>
			<!-- End .content-box -->

			<?php echo $footer_html ?>
			<!-- End #footer -->

		</div>
		<!-- End #main-content -->

	</div>
</body>
	`
	<!-- Download From www.exet.tk-->
</html>