<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
				<div class="space-8"></div>
				<div class="space-8"></div>

				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">活动标题： </label>
					<span class="">
						<input type="text"  name='action_title' style="width:286px;height:30px;" id="name"
							/>
					</span>
					<div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
						<?php  ?>
					</div>
				</div>

			<div class="space-8"></div>
			<div class="space-8"></div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Banner图片： </label>
				<div class="row">
					<div class="col-sm-4 no-padding-left">
						<div >
							<span class="profile-picture">
								<img  class="editable img-responsive" alt="" src="<?php //echo $info['News']['news_img']; ?>"
									style="height:100px;width:100px;">
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="space-8"></div>

			<div class="form-group" style="height:30px;margin-top:25px;">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 上传Banner图片： </label>
					<div class="col-xs-3" style="padding-left:0px;width:297px;" >
						<input type="file" class="id-input-file-1" name="action_banner" id="action_banner"   accept=".jpg,.jpeg,.png" multiple="multiple" />
					</div>
				 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
				 	<?php //_echo($err, 'img'); ?>
				</div>
			</div>
			<div class="form-group">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1"> 活动图片： </label>
                <div class="row">
                    <div class="col-sm-4 no-padding-left">
                        <div >
                            <span class="profile-picture">
                                <img  class="editable img-responsive" alt="" src="<?php //echo $info['News']['news_img']; ?>"
                                    style="height:100px;width:100px;">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-8"></div>

            <div class="form-group" style="height:30px;margin-top:25px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 上传活动图片： </label>
                    <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                        <input type="file" class="id-input-file-1" name="action_pic" id="action_pic"  accept=".jpg,.jpeg,.png" multiple="multiple" />
                    </div>
                 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                    <?php //_echo($err, 'img'); ?>
                </div>
            </div>
                     <div class="space-8"></div>
                    <div class="space-8"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">活动状态： </label>
                        <span class="" >
                            <select name="is_over">
                                <option value="1">正常</option>
                                <option value="0">结束</option>
                            </select>
                        </span>
                     </div>
                    <div class="space-8"></div>
                    <div class="space-8"></div>
                    <div class="form-group" style="height:300px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">活动内容： </label>
                        <span class="">
                             <?php showEditor('action_content');?>
                        </span>
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
	jQuery(function($) {
		$('.id-input-file-1').ace_file_input({
			no_file:'选择文件',
			btn_choose:'浏  览',
			btn_change:'浏  览',
			droppable:false,
			onchange:null,
			thumbnail:false
		});
	});

function sub() {
	    var name=$('#name').val();
	    var action_banner = $('#action_banner').val();
	    var action_pic = $('#action_pic').val();
	    if((name.length > 2 && name.length < 50 ) && action_pic.length >0  && action_banner.length > 0){
	        if(/^[^:%,'\*\"\s\<\>\&]+$/i.test(name)){
	                  $('#myform').submit();

	        }else{
	             layer.msg('活动格式不正确');
                                 	        return false;
	        }

	    }else{
	        layer.msg('活动标题或图片不能为空');
	        return false;
	    }

	}

</script>
