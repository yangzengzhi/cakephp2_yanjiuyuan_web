<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 列表 -->
      <link href="../css/public.css" type="text/css" rel="stylesheet" />
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <title></title>
</head>

<body>
<!--cont start-->
<div class="container">
<div class="proList-box">
    <div class="proListTit"><span><?php if($type == 2){ ?>Search Result<?php }else{ ?>搜索结果<?php }?></span></div>
    <ul class="news_listUl">
       <?php
        if(!empty($list)){
            foreach($list as $v){
        ?>
        <li>
            <a class="newLi_l" href="/news/information?type=<?php echo $type.'&pid='.$pid.'&id='.$v['News']['id']; ?>">
            </a>
            <div class="newLi_r">
                <h3><span><?php echo date('Y-m-d',$v['News']['news_date']); ?></span><a href="/news/information?type=<?php echo $type.'&pid='.$pid.'&id='.$v['News']['id']; ?>"><?php echo $v['News']['news_title']; ?></a></h3>
            </div>
        </li>
        <?php }}else{ ?>
         <li>
            <div class="newLi_r">
                <h4><?php echo $info['err']; ?></h4>
            </div>
            </li>
        <?php } ?>
    </ul>
</div>
<!--分页-->
  <div class="fr y-page" style="font-size:18px;margin-top:18px;">
        <?php  echo $this->Page->show($limit, $total, $curpage, 20, "/Home/search?type=$type&p=",3 ); ?>
    </div>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
