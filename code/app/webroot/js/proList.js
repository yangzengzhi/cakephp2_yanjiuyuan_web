/**
 * Created by asus on 2018/4/15.
 */
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

    });
}
