<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
				<div class="space-8"></div>
				<div class="space-8"></div>
				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">视频标题： </label>
					<span class="">
						<input type="text"  name='video_title' style="width:286px;height:30px;" id="name" value="<?php echo $info['Video']['video_title']; ?>" />
					</span>
					<div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
						<?php  ?>
					</div>
				</div>
				<div class="space-8"></div>
                    <div class="space-8"></div>

                    <div class="form-group" style="height:20px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">视频频道： </label>
                        <span class="">

                            <select name="channel_id">
                             <?php if(!empty($channel)){
                                foreach($channel as $v){
                             ?>
                                <option value="<?php echo $v['Channel']['id']; ?>" <?php if($v['Channel']['id'] == $info['Video']['channel_id']) echo 'selected'; ?>><?php echo $v['Channel']['channel_title']; ?></option>
                                <?php }} ?>
                            </select>
                        </span>
                        <div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
                            <?php  ?>
                        </div>
                    </div>

            <div class="space-8"></div>
            <div class="space-8"></div>
                <div class="form-group" style="height:20px;">
                    <label class="col-sm-3 control-label no-padding-left" for="form-field-1">视频URL： </label>
                    <span class="">
                        <input type="text"  name='video_url' style="width:286px;height:30px;" id="money" value="<?php echo $info['Video']['video_url']; ?>"
                            />
                    </span>
                    <div class="has-error col-xs-12 col-sm-reset inline pink" id="money-error">
                        <?php  ?>
                    </div>
                </div>
			<div class="space-8"></div>
            <div class="space-8"></div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> 视频图片： </label>
				<div class="row">
					<div class="col-sm-4 no-padding-left">
						<div >
							<span class="profile-picture">
								<img  class="editable img-responsive" alt="" src="<?php echo $info['Video']['video_pic']; ?>"
									style="height:100px;width:100px;">
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="space-8"></div>

			<div class="form-group" style="height:30px;margin-top:25px;">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 上传图片： </label>
					<div class="col-xs-3" style="padding-left:0px;width:297px;" >
						<input type="file" id="id-input-file-1" name="news_img" value="" accept=".jpg,.jpeg,.png" multiple="multiple" />
					</div>
				 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
				 	<?php //_echo($err, 'img'); ?>
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

                    &nbsp; &nbsp; &nbsp;
                    <button onClick="return()" class="btn btn-sm btn-danger"><i class="ace-icon fa fa-reply icon-only"></i> 返回</button>
                </div>
            </div>
		</form>
	</div>
</div>



<script type="text/javascript">
	jQuery(function($) {
		$('#id-input-file-1').ace_file_input({
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
</script>
