<?php $userData = $this->Session->read('userData')?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>行乐网络平台管理系统</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.1.0/css/font-awesome.min.css" />
		<LINK href="favicon.ico" type="../image/x-icon" rel=icon>
		<!-- text fonts -->


		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<style type="text/css">
	.Absolute-Center {
	  margin: auto;
	  position: absolute;
	  top: 0; left: 0; bottom: 0; right: 0;
	  height:300px;
	}

</style>
	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
					<div class="col-sm-12">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="red"></span>
									<span class="white" id="id-text2">&nbsp;</span>
								</h1>
								<h4 class="blue" id="id-company-text">&nbsp;</h4>
							</div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<!-- <i class="ace-icon fa fa-music green"></i> -->
									<!--			<img src="../images/logo30.png" style="margin-bottom:5px" width="30px" height="30px" />-->
												<font face="MecroSoft YaHei" size="5">启天国际管理系统</font>
											</h4>
											
											<form name="form1" method="post">
												<div class="space"></div> 
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="用户名" name="username" value="<?php echo isset($userData['username'])?$userData['username']:''?>"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="密码" name="password" value="<?php echo isset($userData['password'])?$userData['password']:''?>"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

<!-- 													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="col-xs-4" placeholder="验证码" name="yzm" id="yzm"/>
														</span>&nbsp;

														<a href="javascript:void(0)" onClick="refresh()" title="刷新验证码"><img src="index/randCode?v=<?php echo uniqid()?>" id="yzm_img"></a>&nbsp;&nbsp;

														<a href="#" data-target="#forgot-box" class="user-signup-primary btt"  style="vertical-align:bottom">忘记密码</a>
													</label>
													-->
													<div class="space"></div> <div class="space"></div> 

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> 记住我</span>

														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登录</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<div>
												<font color="red">
													<?php 
														/*if(!$this->Session->Read("regCodeError")){*/
															echo $this->Session->flash();
														/*}*/
													?>
												</font>
											</div>
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												重置密码
											</h4>

											<div class="space-6"></div>
											<p>
												请输入您的邮箱
											</p>

											<form name="form2" action="index/resetCheck" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name='email' class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="col-xs-4" placeholder="验证码" name="yzm2" id="yzm2"/>
														</span>&nbsp;

														<a href="javascript:void(0)" onClick="refresh2()" title="刷新验证码"><img src="index/randCode2?v=<?php echo uniqid()?>" id="yzm_img2"></a>
													</label>
													<div class="space"></div>
				
													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">发送</span>
														</button>
													</div>
												</fieldset>
											</form>
											<div>
												<font color="red">
													<?php 
														if($this->Session->Read("regCodeError")){
															echo $this->Session->flash();
														}
													?>
												</font>
											</div>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link btt">
												<i class="ace-icon fa fa-arrow-left"></i>
												返回登录
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-100" style="color:#000;font-family:微软雅黑">
							&copy;2018
						</span>
					</div>
					<!-- /section:basics/footer -->
				</div>
			</div>
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery/jquery-2.1.1.min.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script src="../assets/js/jquery/jquery-1.11.1.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<?php
//			if($this->Session->Read("regCodeError")){
//				echo   "<script>
//							$('#forgot-box').addClass('visible');
//							$('#login-box').removeClass('visible');
//						</script>";
//			}
//			$this->Session->delete("regCodeError");
		?>
		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.btt', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			function refresh(){
				$("#yzm_img").attr("src","index/randCode?v="+Math.random());
			}

			function refresh2(){
				$("#yzm_img2").attr("src","index/randCode2?v="+Math.random());
			}
		</script>
	</body>
</html>
