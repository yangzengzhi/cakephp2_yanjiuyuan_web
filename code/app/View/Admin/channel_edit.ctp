<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
				<div class="space-8"></div>
				<div class="space-8"></div>
                  <input type="hidden" value="id" value="<?php echo $channel['Channel']['id'];?>">
                   <input type="hidden" value="parent_id" value="<?php echo $channel['Channel']['parent_id'];?>">
				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">二级标题： </label>
					<span class="">
						<input type="text"  name="channel_title" style="width:286px;height:30px;" id="channel_title" value="<?php echo $channel['Channel']['channel_title'];?>"/>
					</span>
				</div>
            <div class="space-8"></div>
			<div class="space-8"></div>
			<div class="space-8"></div>
                <div class="space-8"></div>
               <div class="form-group" style="height:20px;">
                    <label class="col-sm-3 control-label no-padding-left" for="form-field-1">语言种类： </label>
                    <span class="input-icon">
                        <div class="radio">
                           <label>
                                   <input name="channel_type" value="1" type="radio" class="ace" <?php if($channel['Channel']['channel_type'] == 1){echo 'checked';}?>>
                                   <span class="lbl">中文</span>
                           </label>

                          <label>
                                  <input name="channel_type" value="2" type="radio" class="ace" <?php if($channel['Channel']['channel_type'] == 2){echo 'checked';} ?>>
                                          <span class="lbl">英文</span>
                                  </label>
                           </div>
                    </span>
                    <div class="has-error col-xs-12 col-sm-reset inline pink" id="tp-error">
                        <?php _echo($err, 'status'); ?>
                    </div>
                </div>
                <?php if(!empty($channel['Channel']['parent_id'])){ ?>
          <div class="space-8"></div>
          <div class="space-8"></div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-left" for="form-field-1">所属分类： </label>
				<div class="row">
					<div class="col-sm-4 no-padding-left">
						<div >

                                <select name="parent_id" id="parent_id">
                                    <?php foreach($info as $k => $v){ ?>
                                    <option value="<?php  echo $v['Channel']['id'];?>"  <?php if($channel['Channel']['parent_id'] == $v['Channel']['id']){echo 'selected';}?>><?php echo $v['Channel']['channel_title'];?> </option>
                                    <?php } ?>
                                </select>
							</span>

					</div>
				</div>
			</div>
			<?php } ?>
            <div class="space-8"></div>
            <div class="space-8"></div>
           <div class="form-group" style="height:20px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">显示状态： </label>
                <span class="input-icon">
                    <div class="radio">
                               <label>
                                <input type="radio" name="status" value="1"  class="ace"  <?php if($channel['Channel']['status'] == 1){echo 'checked';}?>>
                                       <span class="lbl">显示</span>
                               </label>

                               <label>
                                       <input name="status" value="0" type="radio" class="ace" <?php if($channel['Channel']['status'] == 0){echo 'checked';} ?>>
                                       <span class="lbl">不显示</span>
                               </label>
                       </div>
                </span>
                <div class="has-error col-xs-12 col-sm-reset inline pink" id="tp-error">
                    <?php _echo($err, 'status'); ?>
                </div>
            </div>
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
function sub() {
	    var name=$('#channel_title').val();
	    var parent_id=$('#parent_id').val();
	    if( name.length >= 2 && name.length < 50){
	        if(/^[^:%,'\*\"\s\<\>\&]+$/i.test(name)){
	                  $('#myform').submit();

	        }else{
	             layer.msg('文章标题不正确');
                return false;
	        }

	    }else{
	        layer.msg('不能为空');
	        return false;
	    }

	}
</script>
