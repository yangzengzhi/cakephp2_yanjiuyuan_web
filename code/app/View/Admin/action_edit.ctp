<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
			    <input type="hidden" name="id" value="<?php echo $info['id'];?>">
				<div class="space-8"></div>
				<div class="space-8"></div>

				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">活动标题： </label>
					<span class="">
						<input type="text"  name='action_title' style="width:286px;height:30px;" id="name"
							value="<?php echo $info['action_title'];?>"/>
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
								<img  class="editable img-responsive" alt="" src="<?php echo $info['action_banner']; ?>"
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
						<input type="file" class="id-input-file-1" name="action_banner" accept=".jpg,.jpeg,.png" multiple="multiple" />
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
                                <img  class="editable img-responsive" alt="" src="<?php echo $info['action_pic']; ?>"
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
                        <input type="file" class="id-input-file-1" name="action_pic" value="" accept=".jpg,.jpeg,.png" multiple="multiple" />
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
                                <option value="1" <?php if($info['is_over'] == 1) echo 'selected';?>>正常</option>
                                <option value="0" <?php if($info['is_over'] == 0) echo 'selected';?>>结束</option>
                            </select>
                        </span>
                     </div>
                    <div class="space-8"></div>
                    <div class="space-8"></div>
                    <div class="form-group" style="height:300px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">活动内容： </label>
                        <span class="">
                             <?php showEditor('action_content',$info['action_content']);?>
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

						&nbsp; &nbsp; &nbsp;
						<button onClick="return()" class="btn btn-sm btn-danger"><i class="ace-icon fa fa-reply icon-only"></i> 返回</button>
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
		$('#myform').submit();
	}

    $('input[name=pay').change(function() {
    	if(this.value==1) {
    		$('#money').val('0');
    		$('#integral').val('0');
    	}
    });

</script>
