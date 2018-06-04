<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页</title>

<style type="text/css">
a {
  color:#000;
  text-decoration: none;
}
a:hover{
  color:#b1040e;
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
        margin-top:30px;
    }
    .item-list{
        margin-top:50px;
    }
    .active{
        background-color:#b1040e;
        border-color:#b1040e;
    }
    .panel-default>.panel-heading{
        background-color:#b1040e;
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

<body>
<div class="container">
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="../img/1.jpg" alt="First slide">
            </div>
            <div class="item">
                <img src="../img/2.jpg" alt="Second slide">
            </div>
            <div class="item">
                <img src="../img/3.jpg" alt="Third slide">
            </div>
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
        </div>
	</div>
</div>
</body>
<html>