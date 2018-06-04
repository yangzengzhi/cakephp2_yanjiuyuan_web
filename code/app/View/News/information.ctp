<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 列表 -->
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <title>新闻详情</title>
</head>

<body>

<!--cont start-->
<div class="proList-box" style="padding-top:0px;">
    <div class="activity_detailTit"><label><?php echo date('Y-m-d',$news['News']['news_date']);?><a href="javascript:history.go(-1);"><?php if($type ==1){ echo '返回';}else{echo 'Back';} ?></a></label><span><?php echo $channel_info['Channel']['channel_title']?></span></div>
    <div class="news_detailCont">
        <h3 style="text-align:center;"><?php echo $news['News']['news_title']?></h3>
        <p><?php echo $news['News']['news_content']?></p>
    </div>
</div>
<!--cont end-->
</body>
</html>
