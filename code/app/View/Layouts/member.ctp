<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pramga: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>启天国际管理系统</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/css/daterangepicker.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="../assets/css/chosen.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="../assets/js/jquery-1.8.2.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/ace-extra.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery-1.8.2.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<!-- CDN 第三方js库 -->
		<script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
		<script src="https://unpkg.com/vue"></script>

		<!-- 本地第三方js库 -->
		<script src="../js/laydate/laydate.js"></script>

		<!-- 自定义js -->
		<script src="../js/func.js"></script>
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<!-- <img src="../img/logo.png"> -->
					<!-- <img  src="../images/logo30.png" width="40px"> -->
					<!-- /section:basics/navbar.layout.brand -->
					<!-- #section:basics/navbar.toggle -->
					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<li class="red"><a href="../admin/logout"><i class="ace-icon fa fa-power-off"></i> 安全退出</a></li>
						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				<ul class="nav nav-list">

					<li class="active open">
						<a href="javascript:void(0)" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">公司信息</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow fa fa-angle-down"></b>
						<ul class="submenu">

							<li class="<?php if(isset($menu) && $menu=='M0101') echo 'active';?>">
								<a href="/admin/company?type=1">
									<i class="menu-icon fa fa-caret-right"></i>
									中文设置
								</a>
								<b class="arrow"></b>
							</li>
							<li class="<?php if(isset($menu) && $menu=='M0102') echo 'active';?>">
                                <a href="/admin/ecompany?type=2">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    英文设置
                                </a>
                                <b class="arrow"></b>
                            </li>
							</ul>
					  <!--   <ul class="submenu">
							<li class="<?php if(isset($menu) && $menu=='M0102') echo 'active';?>">
                                <a href="/admin/adv">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    首页图片
                                </a>
                                <b class="arrow"></b>
                            </li>
						</ul> -->
					</li>

				</ul>

				<ul class="nav nav-list">

					<li class="active open">
						<a href="javascript:void(0)" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">文章管理</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow fa fa-angle-down"></b>
						<ul class="submenu">
							<li class="<?php if(isset($menu) && $menu=='M0201') echo 'active';?>">
								<a href="../Admin/news_list?p=1">
									<i class="menu-icon fa fa-caret-right"></i>
									文章列表
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

				</ul>
    <!--            <ul class="nav nav-list">
					<li class="active open">
						<a href="javascript:void(0)" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">栏目管理</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow fa fa-angle-down"></b>
						<ul class="submenu">

							<li class="<?php if(isset($menu) && $menu=='M0301') echo 'active';?>">
								<a href="../admin/video_list?p=1">
									<i class="menu-icon fa fa-caret-right"></i>
									视频列表
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

				</ul>
                <ul class="nav nav-list">
					<li class="active open">
						<a href="javascript:void(0)" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">活动管理</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow fa fa-angle-down"></b>
						<ul class="submenu">

							<li class="<?php if(isset($menu) && $menu=='M0401') echo 'active';?>">
								<a href="/admin/action_list?p=1">
									<i class="menu-icon fa fa-caret-right"></i>
									活动列表
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul> -->
				 <ul class="nav nav-list">
                    <li class="active open">
                        <a href="javascript:void(0)" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">菜单管理</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow fa fa-angle-down"></b>
                        <ul class="submenu">

                            <li class="<?php if(isset($menu) && $menu=='M0501') echo 'active';?>">
                                <a href="/admin/channel_list?p=1">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    菜单列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                </ul>
				<ul class="nav nav-list">
                    <li class="active open">
                        <a href="javascript:void(0)" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">管理员设置</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow fa fa-angle-down"></b>
                        <ul class="submenu">

                            <li class="<?php if(isset($menu) && $menu=='M501') echo 'active';?>">
                                <a href="../admin/user?p=1">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                     管理员列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                </ul>

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<!-- <li>
							<span class="menu-text">兑换现金审核</span>
						</li> -->

					</ul>
					<div id="nav-search" class="nav-search">
						<?php

						$userInfo = $this->Session->Read("userInfo");
						?>
						你好，<?php echo $userInfo;?>！ <i class="ace-icon fa fa-clock-o green"></i><span id="lblTime"></span>
					</div>
					<!-- /section:basics/content.searchbox -->
				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<div class="page-content-area">
						<?php echo $this->fetch('content'); ?>
						<!-- ajax content goes here -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-100">
							<span class="blue bolder"></span>
							版权所有 &copy; 2018
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
		<script type="text/javascript">
				getDateTime();
				window.setInterval(getDateTime,1000);
		</script>
	</body>
</html>
