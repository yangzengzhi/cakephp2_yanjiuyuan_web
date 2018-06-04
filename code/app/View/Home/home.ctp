<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 列表 -->
      <link href="../css/public.css" type="text/css" rel="stylesheet" />
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <title>首页</title>
    <style type="text/css">
    a {
      color:#000;
      text-decoration: none;
    }
    a:hover{
      color:#fc0901;
      text-decoration: none;
    }
    .carousel{
         height: 350px;
         /*height: auto;*/
         background-color: #000000;
        width:950px;
        }
        .carousel .item{
         /*height: auto;*/
         height: 350px;
         width:1000px;
         background-color: #000000;
        }
        .carousel img{
         /*height: 350px;*/
         width: 100%;
        }
        .item{
          //  margin-top:30px;
        }
        .item-list{
            margin-top:20px;
        }
        .active{
            background-color:#fc0901;
            border-color:#fc0901;
        }
        .panel-default>.panel-heading{
            background-color:#fc0901;
            color:#fff;
            font-size:18px;
        }
        .panel-default>.panel-heading a{
                color:#fff;
            }
        .more{
            margin-right:10px;
            float:right;
        }
    </style>
</head>

<body style="margin-top:100px;">
<div class="container">
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <?php  if(!empty($slide_news)){
                            foreach($slide_news as $k =>  $v){
                      ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $k;?>"  class="<?php if($k==0){echo 'active';};?>"></li>
            <?php }}?>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
          <?php  if(!empty($slide_news)){
                foreach($slide_news as $k =>  $v){
          ?>
            <div class="item <?php if($k == 0){echo 'active';} ?>">
                <a href="News/information?type=<?php echo $v['News']['channel_type'].'&pid='.$v['News']['ch_parent_id'].'&id='.$v['News']['id'];?>"><img src="<?php echo $v['News']['news_img'];?>" alt="First slide" style="width:950px;height:360px;"></a>
            </div>

                        <?php }} ?>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container item-list">
          <?php  foreach($news as $k =>$v){ ?>
                <div class="col-md-4" style="height:310px;">
                    <div class="panel panel-default active">
                        <div class="panel-heading"><?php echo $v['title'];?><span class="more"><a href="/News/lists?type=<?php echo $type.'&pid='.$k;?>"><?php if($type ==1){ echo '更多';}else{echo 'More';} ?></a></span></div>
                        <ul class="list-group">
                            <?php foreach($v['news'] as $value){
                            ?>
                            <li class="list-group-item"><a href="/News/information?type=<?php echo $type.'&pid='.$value['News']['ch_id'].'&id='.$value['News']['id'];?>"><?php echo sub($value['News']['news_title'],10); ?></a><span class="badge"><?php echo date('Y-m-d',$value['News']['news_date']); ?></span></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
           <?php }?>
           <div class="col-md-4" style="height:310px;">
                               <div class="panel panel-default active">
                               <?php if($type==2){?>
                                   <div class="panel-heading"><?php echo 'Contact Us';?></div>
                                   <ul class="list-group">

                                          <li class="list-group-item">TEL:<?php echo $company['Companys']['company_tel']; ?></li>
                                        <li class="list-group-item">TAX:<?php echo $company['Companys']['company_tax']; ?></li>
                                         <li class="list-group-item">EMAIL:<?php echo $company['Companys']['company_email']; ?></li>
                                          <li class="list-group-item">ADDRESS:<?php echo $company['Companys']['company_address']; ?></li>
                                   </ul>
                                 </div>
                                 <?php }else{ ?>
                                 <div class="panel-heading"><?php echo '联系我们'; ?></div>
                                    <ul class="list-group">

                                        <li class="list-group-item">电话:<?php echo $company['Companys']['company_tel']; ?></li>
                                         <li class="list-group-item">传真:<?php echo $company['Companys']['company_tax']; ?></li>
                                          <li class="list-group-item">邮箱:<?php echo $company['Companys']['company_email']; ?></li>
                                           <li class="list-group-item">地址:<?php echo $company['Companys']['company_address']; ?></li>
                                    </ul>
                                  </div>
                                  <?php } ?>
                           </div>
	</div>
</div>
</body>
</html>
