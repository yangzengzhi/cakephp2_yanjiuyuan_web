<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
				<div class="space-8"></div>
				<div class="space-8"></div>
                    <div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
                    						<?php echo $err;  ?>
                    </div>
				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">用户名称： </label>
					<span class="">
						<input type="text"  name="name" style="width:286px;height:30px;" id="name" />
					</span>

				</div>
				<div class="space-8"></div>
                    <div class="space-8"></div>

                    <div class="form-group" style="height:20px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">用户密码： </label>
                        <span class="">
                            <input type="password"  name="password" style="width:286px;height:30px;" id="password" />
                        </span>
                        <div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
                        </div>
                    </div>


			<div class="space-8"></div>
			<div class="space-8"></div>
            <div class="form-group">
                <div style="height:30px;"></div>
                <div class="col-md-offset-3 col-md-9 no-padding-left">
                    <button class="btn btn-sm btn-info" type="button" onClick="sub();">
                        <i class="ace-icon fa fa-check bigger-110"></i> 保存
                    </button>
                </div>
            </div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function sub() {
	    var name=$('#name').val();
	    var password=$('#password').val();
	    if((name.length > 2 && name.length < 10 ) && (password.length >5 && password.length<15)){
	        if(/^[^:%,'\*\"\s\<\>\&]+$/i.test(name)){
	                  $('#myform').submit();

	        }else{
	             layer.msg('用户名格式不正确');
                                 	        return false;
	        }

	    }else{
	        layer.msg('格式不正确');
	        return false;
	    }

	}
</script>
