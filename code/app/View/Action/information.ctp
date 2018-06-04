<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- 列表 -->
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="../js/jquery.validation.min.js"></script>
    <script type="text/javascript" src="../js/layer/layer.js"></script>

    <title>车迷频道-活动详情</title>
</head>

<body>
<!--cont start-->
<div class="proList-box">
    <div class="activity_detailTit"><label><?php echo date('Y-m-d',$action['Action']['action_time']);?><a href="javascript:history.go(-1);">返回</a></label><span><?php echo $action['Action']['action_title'];?></span></div>
    <div class="activity_detailCont">
        <img src="<?php echo $action['Action']['action_pic'];?>" width="400px;" />
        <p><?php echo $action['Action']['action_content'];?></p>
    </div>
    <div class="submit-box">
        <form id="myform">
            <input type="hidden" name="action_id"  value="<?php echo $action['Action']['id']; ?>" id="action_id" />
            <div class="submit-cont submit-cont1">姓名<input type="text" name="member_name" id="member_name" /></div>
            <div class="submit-cont submit-cont2">年龄<input type="text" name="age" id="age" /></div>
            <div class="submit-cont submit-cont3">电话<input type="text" name="phone" id="phone" /></div>
            <div class="submit-cont submit-cont4"><label>地址</label><textarea name="address" id="address" ></textarea></div>
            <div class="submit-btnBox"><button >提交</button></div>
        </form>
    </div>
</div>
<!--cont end-->
<script type="text/javascript">
$(document).ready(function(){
    jQuery.validator.addMethod("lettersonly", function(value, element) {
    			return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]{2,10}$/i.test(value);
    		}, "Letters only please");
    		jQuery.validator.addMethod("lettersphone", function(value, element) {
    			return this.optional(element) || /^1[3|4|5|8][0-9]\d{4,8}$/i.test(value);
    		}, "Letters min please");
    		jQuery.validator.addMethod("lettersaddress", function(value, element) {
    			return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]{2,40}$/i.test(value);
    		}, "Letters max please");

	$("#myform").validate({
	     submitHandler:function(form){
                var datas = "action_id="+$('#action_id').val()+"&member_name="+$('#member_name').val()+"&age="+$('#age').val()+"&phone="+$('#phone').val()+"&address="+$('#address').val();
                   $.ajax({
                    url: "",
                     type: "POST",
                     dataType:'json',
                    data:datas,
                    success: function(data){
                            if(data.code == 200){
                                 layer.msg(data.msg);
                            }else{
                                layer.msg(data.msg);
                            }
                         }
                     });
                },
		rules: {
			member_name: {
			required : true,
			lettersonly:true,
			},
			age: {
			 digits:true,
			 minlength : 2,
			 maxlength : 2,
			},
			phone:{
			required : true,
            lettersphone : true,
			},
            address:{
            required:true,
            lettersaddress:true,
            }
		},
		messages: {
			member_name: {
			required : "用户名不能为空",
			},
			age: {
			    digits : "年龄格式不正确",
			    minlength : "年龄格式不正确",
			    maxlength : "年龄格式不正确"
			},
			phone : {
			    required : '手机号不能为空',
                lettersphone : '手机号格式不正确',
			},
			address : {
			    required : "地址不能为空",
			    lettersaddress : "地址格式不正确",
			}
		}
	});
});
</script>
</body>
</html>