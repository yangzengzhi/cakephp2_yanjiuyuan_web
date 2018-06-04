<style>
.btn-height{ height:30px; line-height:22px; }
</style>
<h5 style="color:red"><?php echo $this->Session->flash();?></h5>
<div style="margin:0;">
    <div style="width:100%;height:30px;margin-top:20px;min-width:1000px;">

    </div>
    <div style="height:44px;"></div>
    <div style="margin-top:10px; margin-bottom:3px; height:30px;">
        <span style="float:right;margin-bottom:5px;">
          <a href="user_add"><button type="button" class="btn spinner-up btn-xs btn-success btn-height">
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
                        用户名称
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                        密码
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:10%;">
                        创建时间
                    </th>
                     <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:10%;">
                                          更新时间
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
                    <?php echo $v['User']['id']; ?>
                </td>
                <td class="center">
                    <?php echo $v['User']['username']; ?>
                </td>
                <td class="center">
                    <?php echo $v['User']['password'];?>
                </td>
                <td class="center">
                    <?php echo date('Y-m-d',$v['User']['created']); ?>
                </td>
                <td class="center">
                    <?php echo date('Y-m-d',$v['User']['modified']); ?>
                </td>

                <td class="center">
                    <div class="hidden-sm hidden-xs btn-group">

                        <a href="/admin/user_edit?id=<?php echo $v['User']['id']?>" class="" title="编辑">
                            <i class="ace-icon fa fa-edit bigger-130 "></i>
                        </a>&nbsp;&nbsp;&nbsp;

                        <a class="red" role="button" title="删除" onClick="delconfirm('<?php echo $v['User']['id'];?>')" href="javascript:void(0);">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
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
                            echo getPageHtml(10, 10);
                    ?>
                </div>

    </div>
</div>
<script>

function delconfirm(id) {
  if(window.confirm('您确定要执行删除操作吗？')) {
    window.location.href="/admin/user_delete?id="+id;
  } else {

  }
}
</script>