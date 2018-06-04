<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
	<title><?php echo $company['Companys']['company_name'];?></title>
	<link rel="stylesheet" href="../css/bootstrap3/css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery-1.11.3.min.js"></script>
     <script src="../js/layer/layer.js"></script>
	<script src="../css/bootstrap3/js/bootstrap.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
		body{
			padding-top:70px;
		}

		.navbar-inverse{
		    background-color:#fff;
		    border-color:#fff;
		}
		.navbar-inverse input[type="text"]{
			color:#313131;
			border:none;

		}
		.navbar-inverse .navbar-form{
			position:relative;
		}
		.navbar-inverse button[type="submit"]{
			position:absolute;
			top:25%;
			right:20px;
			background:none;
			border:none;
		}
		@media(min-width:768px){
			.navbar-inverse button[type="submit"]{
				top:15%;
			}
		}
		@media (min-width: 950px) {
            .container{
                max-width: 950px;
            }
        }
		.form-group{
             top:25%;
		}
		.navbar-inverse .glyphicon{
			color:#999;
		}
		.navbar .top{
			background:#fc0901;
		}
        .navbar .bottom{
                background:#ffffff;
            }
		.navbar-brand strong{
		    color:#fff;
		}
		.form-group{
		    width:120px;
		}
	    .footer{
	    background:#fc0901;
	    height:50px;
	    color:#fff;
	    text-align:center;
	    padding:20px;
	    }
	    .navbar-nav{
	        width:1024px;
	    }
	    .new-bottom li .active a{
	        background-color:#fff;
	    }
	    	//	.active a{color: #000000;background-color:#FFFFFF;}
        	//	 a:link {color: #000000} /* 未访问时的状态 */
           //     a:visited {color: #fc0901} /* 已访问过的状态 */
           //     a:hover {color: #fc0901} /* 鼠标移动到链接上时的状态 */
             //   a:active {color: #fc0901} /* 鼠标按下去时的状态 */
        #nav_bottom{
            background-color:#ffffff;
        }
        #nav_bottom li{
            width:125px;
            text-align:center;
            font-size:16px;
        }
        #nav_bottom a{
            background-color:#ffffff;
            color:#000000;

        }
         #nav_bottom a:hover,a:active{

                    color: #fc0901;
                }
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><strong><?php echo $company['Companys']['company_name'];?></strong></a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                     <div class="form-group navbar-form">
                         <select class="form-control" name="type" id="lang">
                           <option value="1" <?php if($type ==1){ echo 'selected';} ?>>中文</option>
                           <option value="2" <?php if($type ==2) {echo 'selected';} ?>>ENGLISH</option>
                         </select>
                       </div>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <form action="/home/search?type=<?php echo $type;?>" method="post" class="navbar-form navbar-left">
                        <input type="hidden" name="type" value="<?php echo $type;?>">
                        <input type="text" name="search" id="search" placeholder="<?php if($type==2){echo 'Search';}else{ ?>搜索 <?php }?>" class="form-control">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search" id="sub"></span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <div class="bottom">
        <div class="container">
            <ul class="nav navbar-nav navbar-default" id="nav_bottom">
                <li class="active"><a href="/"><?php if($type ==1){ echo '首页';}else{echo 'Home';} ?></a></li>
                <?php
                foreach($channel_parent as $v){

                ?>
                     <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" style="<?php if($v['id'] == $menu){ echo 'color: #fc0901';}?>" data-toggle="dropdown">
                                           <?php echo $v['channel_title'];?>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                         <?php foreach($channel as $value){
                                         if($value['Channel']['parent_id'] == $v['id']) { ?>
                                            <li><a href="/News/lists?type=<?php echo $type.'&pid='.$value['Channel']['id']; ?>"><?php echo $value['Channel']['channel_title']; ?> </a></li>
                                            <?php }} ?>
                                        </ul>
                                    </li>
                <?php }?>
            </ul>
            </div>
        </div>
	</nav>
        <?php echo $this->fetch('content'); ?>
<!--foot start-->
<footer class="footer">
    <div class="container">
        本网站为合作实验室，保留所有权利。© HIGH GOAL 1995-2018 &nbsp; ICP备<?php echo $company['Companys']['company_icp'];?>号
    </div>
</footer>
<!--foot end-->
</body>
<script>
    $('#lang').change(function(){

        window.location.href='/?type='+$('#lang').val();
    });
    $("#sub").click(function(){
         var name = $("#search").val().trim();

        if(name == ''){
            layer.msg('请填写搜索文章标题');
            return false;
        }else{
            if(!/^[^:%,'\*\"\s\<\>\&]{2,10}$/i.test(name)){
             layer.msg('填写搜索文章标题格式不对');
                        return false;
                        }
         }
    });
</script>
</html>
