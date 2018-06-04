/**
 * Created by asus on 2018/1/28.
 */
$(function () {
    goTopEx();
    var audioEle = document.getElementById("audioPlay");
    $(".pos_rightMis i").click(function () {
        if( $(".pos_rightMis").hasClass("closeMis") ){
            $(".pos_rightMis").removeClass("closeMis");
            $(".pos_rightMis").find("span").html("打开<br>背景音");
            audioEle.pause();

        }else{
            $(".pos_rightMis").addClass("closeMis");
            $(".pos_rightMis").find("span").html("关闭<br>背景音");
            audioEle.play();
        };
    });

    //选择支付方式
    $(".select_pay select").change(function () {
        var num = $(this).children('option:selected').attr("dataId");
        $(".pay_reslistBox .pay_reslist").hide();
        $(".pay_reslistBox .pay_reslist").eq(Number(num)).show();
    });

    //会员协议
    $(".register1_btnBox span").click(function () {
       $(".posBg").show();
       $(".layer1").show();
    });

    //VISE协议
    $(".register2_btnBox span").click(function () {
        $(".posBg").show();
        $(".layer2").show();
    });
    //M协议
    $(".register3_btnBox span").click(function () {
        $(".posBg").show();
        $(".layer3").show();
    });
    //银联协议
    $(".register4_btnBox span").click(function () {
        $(".posBg").show();
        $(".layer4").show();
    });
    //支付宝协议
    $(".register5_btnBox span").click(function () {
        $(".posBg").show();
        $(".layer5").show();
    });
    //微信协议
    $(".register6_btnBox span").click(function () {
        $(".posBg").show();
        $(".layer6").show();
    });

    //关闭协议
    $(".close_xy").click(function () {
        $(".posBg").hide();
        $(".userPosBox").hide();
    });

    //支付点击按钮
    if($(".register_info1").length > 0){
        $(".register1_btnBox button").click(function () {
            if($(".register1_btnBox .checkIpt").prop('checked')){
                $(".register_info1").hide();
                $(".register2_payBox").show();
            };
        });
    }else{
        $(".register2_payBox").show();
    };
});
//返回顶部
function goTopEx(){
    $(document).ready(function(e) {
        //b();
        $('.getTop').click(function(){
            //$(document).scrollTop(0);
            $('html,body').animate({'scrollTop':0},500);
        });
    });
};
