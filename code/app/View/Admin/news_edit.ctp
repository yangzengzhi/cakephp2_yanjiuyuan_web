<div class="space-4"></div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data" id="myform" >
			<input type="hidden"  name='id' value="<?php echo $news['News']['id'];?>"/>
				<div class="space-8"></div>
				<div class="space-8"></div>
				<div class="form-group" style="height:20px;">
					<label class="col-sm-3 control-label no-padding-left" for="form-field-1">文章标题： </label>
					<span class="">
						<input type="text"  name='news_title' style="width:286px;height:30px;" id="name" value="<?php echo $news['News']['news_title'];?>"
							/>
					</span>
					<div class='has-error col-xs-12 col-sm-reset inline pink' id='name-error'>
						<?php  _echo($err,'news_title');?>
					</div>
				</div>
                <div class="space-8"></div>
                <div class="space-8"></div>

                <div class="form-group" style="height:20px;">
                    <label class="col-sm-3 control-label no-padding-left" for="form-field-1">作者： </label>
                    <span class="">
                            <input type="text"  name='author' style="width:286px;height:30px;"
                              value="<?php echo $news['News']['news_author'];?>"      id="author" />
                    </span>
                    <div class="has-error col-xs-12 col-sm-reset inline pink" id="integral-error">
                            <?php  _echo($err,'news_author');?>
                    </div>
                </div>
                            <div class="space-8"></div>
                                          <div class="space-8"></div>
                                			<div class="form-group">
                                				<label class="col-sm-3 control-label no-padding-left" for="form-field-1">所属分类： </label>
                                				<div class="row">
                                					<div class="col-sm-4 no-padding-left">
                                                                <select name="parent_id" id="parent_id">
                                                                    <?php foreach($info as $k => $v){ ?>
                                                                    <option value="<?php  echo $v['Channel']['id'];?>" <?php if($news['News']['ch_parent_id'] == $v['Channel']['id']){echo 'selected';}?>><?php echo $v['Channel']['channel_title'];?> </option>
                                                                    <?php } ?>
                                                                </select>

                                							<?php if(!empty($news['News']['ch_id'])){ ?>
                                							<span id="sub_parent_id">
                                							    <select id='parent_sub_id' style='width:150px;' name='parent_sub_id'>
                                							    <?php foreach($cat as $k => $v){ ?>
                                                                <option value="<?php  echo $v['Channel']['id'];?>" <?php if($news['News']['ch_id'] == $v['Channel']['id']){echo 'selected';}?>><?php echo $v['Channel']['channel_title'];?> </option>
                                                                <?php }?>
                                                                </select>
                                							</span>
                                							<?php } ?>
                                				</div>
                                			</div>
                <div class="space-8"></div>
                                          <div class="space-8"></div>
                               <div class="form-group" style="height:20px;">
                                              <label class="col-sm-3 control-label no-padding-left" for="form-field-1">显示状态： </label>
                                              <span class="input-icon">
                                                  <div class="radio">
                                                             <label>
                                                              <input type="radio" name="status" value="1"  class="ace" <?php if($news['News']['status'] == 1){ echo 'checked';}?>>
                                                                     <span class="lbl">显示</span>
                                                             </label>

                                                             <label>
                                                                     <input name="status" value="0" type="radio" class="ace" <?php if(empty($news['News']['status'])){ echo 'checked';}?>>
                                                                     <span class="lbl">不显示</span>
                                                             </label>
                                                     </div>
                                              </span>
                                              <div class="has-error col-xs-12 col-sm-reset inline pink" id="tp-error">
                                                  <?php _echo($err, 'status'); ?>
                                              </div>
                                          </div>
                <div class="space-8"></div>
                <div class="space-8"></div>
               <div class="form-group" style="height:20px;">
                    <label class="col-sm-3 control-label no-padding-left" for="form-field-1">语言种类： </label>
                    <span class="input-icon">
                        <div class="radio">
                           <label>
                                   <input name="channel_type" value="1" type="radio" class="ace" <?php if($news['News']['channel_type'] == 1){ echo 'checked';}?>>
                                   <span class="lbl">中文</span>
                           </label>

                          <label>
                                  <input name="channel_type" value="2" type="radio" class="ace" <?php if($news['News']['channel_type'] == 2){ echo 'checked';}?>>
                                          <span class="lbl">英文</span>
                                  </label>
                           </div>
                    </span>
                    <div class="has-error col-xs-12 col-sm-reset inline pink" id="tp-error">
                        <?php _echo($err, 'channel_type'); ?>
                    </div>
                </div>
                    	<div class="space-8"></div>
                           <div class="space-8"></div>
                           <div class="form-group" style="height:20px;">
                                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">首页显示： </label>
                                <span class="input-icon">
                                    <div class="radio">
                                               <label>
                                                <input type="radio" name="show" value="1"  class="ace" <?php if(!empty($news['News']['show'])){ echo 'checked';} ?> >
                                                       <span class="lbl">显示</span>
                                               </label>

                                               <label>
                                                       <input type="radio" name="show" value="0" class="ace" <?php if(empty($news['News']['show'])){ echo 'checked';} ?>>
                                                       <span class="lbl">不显示</span>
                                               </label>
                                       </div>
                                </span>
                                <div class="has-error col-xs-12 col-sm-reset inline pink" id="tp-error">
                                    <?php // _echo($err, 'show'); ?>
                                </div>
                            </div>

                  <div class="space-8"></div>
                  <div class="space-8"></div>
                          <div class="form-group">
                                          <label class="col-sm-3 control-label no-padding-left" for="form-field-1">首页展示图片： </label>
                                          <div class="row">
                                              <div class="col-sm-4 no-padding-left">
                                                  <div >
                                                      <span class="profile-picture">
                                                          <img  class="editable img-responsive" alt="" src="<?php  echo $news['News']['news_img']; ?>"
                                                              style="height:100px;width:100px;">
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                           <div class="space-8"></div>
                               <div class="space-8"></div>
                                  <div class="form-group" style="height:30px;margin-top:25px;">
                                  <label class="col-sm-3 control-label no-padding-left" for="form-field-1" > 首页展示图片:</label>
                                      <div class="col-xs-3" style="padding-left:0px;width:297px;" >
                                          <input type="file" class="id-input-file-1" name="slide_pic" accept=".jpg,.jpeg,.png"/>
                                      </div>
                                   <div class='has-error col-xs-12 col-sm-reset inline pink' id='img-err'>
                                      <?php //_echo($err, 'img'); ?>
                                  </div>
                                  </div>
            <div class="space-8"></div>
            <div class="space-8"></div>
            <div class="form-group" style="height:300px;">
                <label class="col-sm-3 control-label no-padding-left" for="form-field-1">文章内容： </label>
                <span class="">
                     <?php showEditor('news_content', $news['News']['news_content']);?>
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
$('#parent_id').change(function(){
     var parent_id = $('#parent_id').val();
       $("#sub_parent_id").empty();
    $.post('ajaxItem',{'id':parent_id},function(data){
        var str ='';
        var select_str = "<select id='parent_sub_id' style='width:150px;' name='parent_sub_id'>";
        for(var i=0;i<data.length;i++){
                      str +="<option value='"+data[i]['Channel']['id']+"'>"+data[i]['Channel']['channel_title']+"</option>";
         }
        if(str != ''){
            str +="</select>";
            select_str +=str;
            $("#sub_parent_id").append(select_str);
        }
    },"json");
});
function sub() {
	    var name=$('#name').val();
	    var author= $('#author').val();
	     var channel_type = $('input[name="channel_type"]:checked').val();
	    var parent_id = $('#parent_id').val();
	    if(name.length >= 2 && name.length < 50  && parent_id > 0 && channel_type > 0){
	        if(/^[^%,'\*\"\s\<\>\&]+$/i.test(name)){
	            if(/^[^%,'\*\"\s\<\>\&]{2,5}$/i.test(author)){
	                  $('#myform').submit();
                 }else{
                  layer.msg('作者名称格式不正确');
                  return false;
                 }
	        }else{
	             layer.msg('标题格式不正确');
                 return false;
	        }
	    }else{
	        layer.msg('不能为空');
	        return false;
	    }

	}
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

</script>
