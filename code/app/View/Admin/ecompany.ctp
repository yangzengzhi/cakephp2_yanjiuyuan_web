<div class="space-4"></div>
<div class="row">
	<div class="col-xs-12">
		<form  class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
			<input type="hidden" name="id" value="<?php echo $info['id'];?>">
			<input type="hidden" name="type" value="<?php echo $info['type'];?>">
			<div class="space-8"></div>
			<div class="space-8"></div>

			<div class="form-group" style="height:20px;">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1">公司名称： </label>
				<span class="">
					<input type="text"  name='company_name' style="width:286px;height:30px;" id="company_name"
						value="<?php echo $info['company_name'];?>"/>
				</span>
				<div class='has-error col-xs-12 col-sm-reset inline pink' id='company_name-error'>
					<?php //echo($err, 'name'); ?>
				</div>
			</div>

            <div class="space-8"></div>
                    <div class="space-8"></div>

                    <div class="form-group" style="height:20px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">公司地址： </label>
                        <span class="">
                            <input type="text"  name='company_address' style="width:286px;height:30px;" id="company_address"
                                value="<?php echo $info['company_address'];?>"/>
                        </span>
                        <div class='has-error col-xs-12 col-sm-reset inline pink' id='company_address-error'>
                            <?php //echo($err, 'name'); ?>
                        </div>
                    </div>
                     <div class="space-8"></div>
                    <div class="space-8"></div>

                    <div class="form-group" style="height:20px;">
                        <label class="col-sm-3 control-label no-padding-left" for="form-field-1">ICP证书号： </label>
                        <span class="">
                            <input type="text"  name='company_icp' style="width:286px;height:30px;" id="company_icp"
                                value="<?php echo $info['company_icp'];?>"/>
                        </span>
                        <div class='has-error col-xs-12 col-sm-reset inline pink' id='company_address-error'>
                            <?php //echo($err, 'name'); ?>
                        </div>
                    </div>
             <div class="space-8"></div>
            <div class="space-8"></div>

            <div class="form-group" style="height:20px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">电话： </label>
                <span class="">
                    <input type="text"  name='company_tel' style="width:286px;height:30px;" id="company_tel"
                        value="<?php echo $info['company_tel'];?>"/>
                </span>
                <div class='has-error col-xs-12 col-sm-reset inline pink' id='company_address-error'>
                    <?php //echo($err, 'name'); ?>
                </div>
            </div>
            <div class="space-8"></div>
            <div class="space-8"></div>
            <div class="form-group" style="height:20px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">传真： </label>
                <span class="">
                    <input type="text"  name='company_tax' style="width:286px;height:30px;" id="company_tax"
                        value="<?php echo $info['company_tax'];?>"/>
                </span>
                <div class='has-error col-xs-12 col-sm-reset inline pink' id='company_address-error'>
                    <?php //echo($err, 'name'); ?>
                </div>
            </div>
             <div class="space-8"></div>
                <div class="space-8"></div>

                <div class="form-group" style="height:20px;">
                    <label class="col-sm-3 control-label no-padding-left" for="form-field-1">邮件： </label>
                    <span class="">
                        <input type="text"  name='company_email' style="width:286px;height:30px;" id="company_email"
                            value="<?php echo $info['company_email'];?>"/>
                    </span>
                    <div class='has-error col-xs-12 col-sm-reset inline pink' id='company_address-error'>
                        <?php //echo($err, 'name'); ?>
                    </div>
                </div>
          <!--  <div class="space-8"></div>
            <div class="space-8"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1"> LOGO图片： </label>
                <div class="row">
                    <div class="col-sm-4 no-padding-left">
                        <div >
                            <span class="profile-picture">
                                <img  class="editable img-responsive" alt="" src="<?php echo $info['company_img']; ?>"
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
                        <input type="file" id="id-input-file-1" name="news_img[]" value="" accept=".jpg,.jpeg,.png" multiple="multiple" />
                    </div>
                 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                    <?php //_echo($err, 'img'); ?>
                </div>
            </div>
            <div class="space-8"></div>
            <div class="space-8"></div>
            <div class="form-group" style="height:300px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">公司介绍： </label>
                <span class="">
                     <?php showEditor('company_intro',$info['company_intro']);?>
                </span>
             </div>-->
            <div class="space-8"></div>
            <div class="space-8"></div>
			<div class="form-group">
				<div style="height:30px;"></div>
				<div class="col-md-offset-3 col-md-9 no-padding-left">
					<button class="btn btn-sm btn-info" type="button" onClick="sub()">
						<i class="ace-icon fa fa-check bigger-110"></i> 保存
					</button>
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
    function sub(){
        $("#myform").submit();
    }
</script>
