<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
			<input type="hidden" name="id" value="<?php echo $info['Adv']['id']; ?>" />
            <div class="space-8"></div>
            <div class="form-group">
            <label class="col-sm-3 control-label no-padding-left" for="form-field-1"> 首页滑动图片： </label>
            <div class="row">
                <div class="col-sm-6 no-padding-left">
                    <div >
                      <?php $img = unserialize($info['Adv']['slide_pic']);
                                foreach($img as $k => $v){
                                            ?>
                        <span class="profile-picture">
                            <img  class="editable img-responsive" alt="" src="<?php echo $v; ?>"
                                style="height:100px;width:100px;">
                        </span>
                        <?php }?>
                    </div>
                </div>
            </div>
            </div>
            <div class="space-8"></div>

            <div class="form-group" style="height:30px;margin-top:25px;">
            <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 首页展示图片(最多五张)： </label>
                <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                    <input type="file" class="id-input-file-1" name="slide_pic[]" accept=".jpg,.jpeg,.png" multiple="multiple"/>
                </div>
             <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                <?php //_echo($err, 'img'); ?>
            </div>
            </div>
            <div class="space-8"></div>
            <div class="space-8"></div>
           <div class="form-group">
            <label class="col-sm-3 control-label no-padding-left" for="form-field-1"> 左侧广告图片： </label>
            <div class="row">
                <div class="col-sm-4 no-padding-left">
                    <div >
                        <span class="profile-picture">
                            <img  class="editable img-responsive" alt="" src="<?php  echo $info['Adv']['left_pic']; ?>"
                                style="height:100px;width:100px;">
                        </span>
                    </div>
                </div>
            </div>
            </div>
		
	<div class="form-group" style="height:30px;margin-top:25px;">
                             <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 左侧广告链接： </label>
                                 <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                                     <input type="url"  name="left_url"  style="padding-left:0px;width:297px;"  value="<?php  echo $info['Adv']['left_url']; ?>" placeholder="http://www.baidu.com" />
                                 </div>
                              <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                                 <?php // _echo($err, 'left_url'); ?>
                             </div>
                         </div>
            <div class="form-group" style="height:30px;margin-top:25px;">
            <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 左侧广告图片： </label>
                <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                    <input type="file" class="id-input-file-1" name="left_pic"  accept=".jpg,.jpeg,.png" />
                </div>
             <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                <?php //_echo($err, 'img'); ?>
            </div>
            </div>
            <div class="space-8"></div>
            <div class="space-8"></div>
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">右侧广告图片： </label>
                <div class="row">
                    <div class="col-sm-4 no-padding-left">
                        <div >
                            <span class="profile-picture">
                                <img  class="editable img-responsive" alt="" src="<?php  echo $info['Adv']['right_pic']; ?>"
                                    style="height:100px;width:100px;">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
	     <div class="form-group" style="height:30px;margin-top:25px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 右侧广告链接： </label>
                    <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                        <input type="url"  name="right_url"  style="padding-left:0px;width:297px;"  value="<?php  echo $info['Adv']['right_url']; ?>" placeholder="http://www.baidu.com" />
                    </div>
                 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                    <?php //_echo($err, 'right_url'); ?>
                </div>
            </div>	

            <div class="form-group" style="height:30px;margin-top:25px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 右侧广告图片： </label>
                    <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                        <input type="file" class="id-input-file-1" name="right_pic"  accept=".jpg,.jpeg,.png" />
                    </div>
                 <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                    <?php //_echo($err, 'img'); ?>
                </div>
            </div>
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
	var lu =$("input[name='left_url']").val();
	var ru =$("input[name='right_url']").val();
	if(lu != '' && ru!= '' ){
        $('#myform').submit();
	}
    }
</script>
