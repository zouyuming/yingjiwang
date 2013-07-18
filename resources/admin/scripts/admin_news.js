/* 
    Document   : admin_news.js
    Created on : 2013-7-11, 11:52:10
    Author     : zouyuming
    Description:
        新闻管理js
			
 */

Yingjiwang.extend('Admin_news', {
	ready: function() {
		this.bindEvent();
	},

	bindEvent: function() {

		$(".pagination a").live('click', function() {
			var url = $(this).attr('ajaxhref');
			//alert(url);
			if (url != 'undefined') {
				$.get(url, {}, function(data) {
				  console.log(typeof(data))
					var data = $.parseJSON(data);
					var newsListHtml = "";
					var n = 0;
					$.each(data.results.newsList,function(rindex,rdata){
						n++;
						var iscommend = "是";
						var preRowTag = "<tr>";
						if (n%2 != 0) {preRowTag = "<tr class='alt-row'>"};
						newsListHtml += preRowTag
									 + "<td><input type='checkbox' /></td>"
									 + "<td>"+rdata.id+"</td>"
									 + "<td><a href='#' title='title'>"+rdata.title+"</a></td>"
									 + "<td>"+rdata.type_name+"</td>"
									 + "<td>"+((rdata.iscommend==0)?"否":"是")+"</td>"	
									 + "<td>"+rdata.sortrank+"</td>"	
									 + "<td>"+rdata.created_time+"</td>"	
									 + "<td>"+rdata.author+"</td>"	
									 + "<td><!-- Icons -->"
									 + "<a href='javascript:void(0)' onclick='editNews("+rdata.id+")' title='Edit'><img src='"+Config.BaseURL+"resources/admin/images/icons/pencil.png"+"' alt='Edit' /></a>"
									 + "<a href='javascript:void(0)' onclick='deleteNews("+rdata.id+")'  title='Delete'><img src='"+Config.BaseURL+"resources/admin/images/icons/cross.png"+"' alt='Delete' /></a>"		
									 + "</td>"
									 + "</tr>";

					});
					var newStr = data.results.pagestr.replace(/href/g, "ajaxhref"); 
					newsListHtml += "<tr>"
								 + "<td colspan='9'>"
								 + "<div class='pagination pagination-centered'>"
					             + newStr
						         + "</div>"
								 + "</td>"
								 + "</tr>";
				  // console.log(newsListHtml)
					$("#newsList").html(newsListHtml);
				});
				
			}
		});

		$('#addNewsAction').click( // When a tab is clicked...
			function() {
				var tabs = $('.content-box ul.content-box-tabs li a');
				tabs.removeClass('current'); // Remove "current" class from all tabs
				console.log(tabs.parent().siblings().find("a"))
				console.log($('.content-box ul.content-box-tabs li a'));
				$('#minitab2').addClass('current'); // Add class "current" to clicked tab
				var currentTab = tabs.attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				// console.log($(currentTab).siblings())
				$(currentTab).siblings().show(); // Hide all content divs
				$(currentTab).hide(); // Show the content div with the id equal to the id of clicked tab
				return false;
			}
		); 
	},

	checkLogin: function() {
		var username = $('#username').val();
		var password = $('#password').val();
		$.ajax({
			url: Config.CurrentURL + 'check',
			type: 'POST',
			dataType: 'JSON',
			data: {
				username: username,
				password: password
			},
			success: function(data) {
				if (data.error) {

					$(".alert_info").html("用户名或密码错误！");
				} else {
					window.location.href = Config.BaseURL + "admin/admin_index";
					//						window.location.href = Config.BaseURL + 'home';
				}

			}
		});
	},
	addNewsAction: function(){

	}

});