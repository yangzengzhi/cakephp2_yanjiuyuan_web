<style>
.btn-height{ height:30px; line-height:22px; }
</style>
<h5 style="color:red"><?php echo $this->Session->flash();?></h5>
<div style="margin:0;">
    <div style="width:100%;height:30px;margin-top:10px;min-width:1000px;">

            <div style="width:100%;height:10px;min-width:950px;">
                <label class="no-padding-right bolder" style="width:100px;text-align:right;float:left;line-height:30px;">
                  网页菜单设置
                </label>
            </div>

    </div>
    <div style="height:44px;"></div>
    <div style="margin-top:10px; margin-bottom:3px; height:30px;">
        <span style="float:right;margin-bottom:5px;">
          <a href="channel_add"><button type="button" class="btn spinner-up btn-xs btn-success btn-height">
              <i class=" ace-icon ace-icon fa fa-plus smaller-75"></i>
              <font style="font-weight:bold;">添&nbsp;&nbsp;&nbsp;&nbsp;加</font>
          </button></a>
        </span>
    </div>
    <div class="dataTables_wrapper form-inline" id="sample-table-1_wrapper">
        <table class="table table-striped table-bordered table-hover" style="text-layout:fixed;">
            <thead>
                <tr role="row">
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="1" class="center" style="width:10%">
                        编号
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="1" class="center" style="width:10%;">
                        频道标题
                    </th>
                     <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                        所属分类
                     </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                        显示
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="6" class="center" style="width:10%">
                         操作
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $k =>$v) {
            ?>
            <tr class="odd" role="row">

                <td class="center">
                    <?php echo $v['Channel']['id']; ?>
                </td>
                <td class="center">
                    <?php echo $v['Channel']['channel_title']; ?>
                </td>
                 <td class="center">
                    <?php if(!empty($v['Channel']['parent_id'])){
                        echo '二级目录';
                    }else{ echo '网页标题'; } ?>
                </td>
                <td class="center">
                  <?php if($v['Channel']['status'] ==1){
                    echo '显示';
                  }else{echo '<span class="red">不显示</span>';} ?>
                </td>
                <td class="center">
                    <div class="hidden-sm hidden-xs btn-group">
                        <a href="/admin/channel_add?id=<?php echo $v['Channel']['id']?>&bk=<?php echo urlencode($_SERVER['REQUEST_URI']);?>" class="" title="编辑">
                            <i class="ace-icon fa fa-edit bigger-130 "></i>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>
                </td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <div class="col-xs-12 dataTables_paginate no-padding">
                    <?php
                            echo getPageHtml($total, 10);
                    ?>
                </div>

    </div>
</div>