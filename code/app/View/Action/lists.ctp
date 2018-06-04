<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 列表 -->
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <title>车迷频道-活动列表</title>
</head>

<body>

<!--cont start-->
<div class="proList-box">
    <div class="proListTit"><span>活动分类</span></div>
    <ul class="activity_listUl">
        <?php

        if(!empty($list)){
            foreach($list as $v){
        ?>
        <li>
            <a href="/action/information?id=<?php echo $v['Action']['id']?>"><img src="<?php echo $v['Action']['action_banner']?>" /></a>
            <span><?php echo $v['Action']['action_title']?></span>
            <p><em><?php echo date('Y-m-d',$v['Action']['action_time']); ?></em></p>
        </li>
       <?php
            }}
        ?>
    </ul>
    <div class="pages-box"><div class="M-box2"></div></div>
</div>
<!--cont end-->
<!--分页-->
<script type="text/javascript" src="../js/page/jquery.pagination.js"></script>
<!--列表-->

<script type="text/javascript">
    var pageTotal = <?php echo $total ?>;
    var showData = 10;
    var pageCurrent = <?php echo $p; ?>;
    $(function () {
        //分页调用
        if($(".pages-box").length>0){
            pagesFn(pageCurrent);
        };
    });

    //分页加载调用

    function getPages(pageTotal,showData,pageCurrent) {
        $('.M-box2').pagination({
            coping:true,
            totalData:pageTotal,
            showData:showData,
            homePage:'首页',
            endPage:'末页',
            prevContent:'上一页',
            nextContent:'下一页',
            isHide: false,
            current:pageCurrent
        });
    };

    //分页封装函数
    function pagesFn(pageCurrent) {
        getPages(pageTotal,showData,pageCurrent);
        $(".pages-box").find("a").click(function () {
            if($(this).html() == '末页'){
                pagesFn(pageCurrent);

            }else if($(this).html() == '首页'){
                pageCurrent = 1
                pagesFn(pageCurrent);

            }else if($(this).html() == '上一页'){
                pageCurrent = parseInt(pageCurrent)-1;
                pagesFn(pageCurrent);

            }else if($(this).html() == '下一页'){
                pageCurrent = parseInt(pageCurrent)+1;
                pagesFn(pageCurrent);

            }else{
                pageCurrent = $(this).html();
                pagesFn(pageCurrent);

            }
            window.location.href="/action/lists?p="+pageCurrent;
        });
    }
</script>
</body>
</html>