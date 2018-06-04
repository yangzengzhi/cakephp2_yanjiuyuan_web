<style>
.btn-height{ height:30px; line-height:22px; }
</style>
<script>
    var pageTotal = 120;  //总共多少条数据
    var showData = 10;  // 每页放多少条
    var pageCurrent = 1; //当前第几页
</script>
<h5 style="color:red"><?php echo $this->Session->flash();?></h5>
<div style="margin:0;">
    <div style="width:100%;height:30px;margin-top:20px;min-width:1000px;">
        <form action="" method="get" name="form1" style="margin-left:0px;">
            <div style="width:100%;height:30px;min-width:950px;">
                <label class="no-padding-right bolder" style="width:100px;text-align:right;float:left;line-height:30px;">
                    文章名称：
                </label>
                <input type="text" class="col-xs-10 col-sm-5" placeholder="请输入" id="form-field-1" name="title"
                        style="width:250px;height:30px;float:left;"
                        value="<?php echo !empty($_GET['title']) ? $_GET['title'] : '';?>"/>

                <button type="submit" class="btn btn-primary btn-sm" style="width:65px;margin-left:10px;height:30px;padding-top:3px;">
                    <i class="ace-icon fa fa-search"></i><b>搜索</b>
                </button>

            </div>

        </form>
    </div>
    <div style="height:44px;"></div>
    <div style="margin-top:10px; margin-bottom:3px; height:30px;">
        <span style="float:right;margin-bottom:5px;">
          <a href="news_add"><button type="button" class="btn spinner-up btn-xs btn-success btn-height">
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
                        文章标题
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                        所属分类
                    </th>
                     <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                                            文章状态
                                        </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:15%;">
                        首页显示
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:10%;">
                        文章作者
                    </th>
                    <th  colspan="1" rowspan="1" aria-controls="sample-table-2" tabindex="2" class="center" style="width:10%;">
                        创建时间
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
                    <?php echo $v['News']['id']; ?>
                </td>
                <td class="center">
                    <?php echo $v['News']['news_title']; ?>
                </td>
                <td class="center">
                    <?php echo $v['channels']['channel_title'];?>
                </td>
                <td class="center">
                   <?php if($v['News']['status']==1){echo '显示';}else{?><span class="red">不显示</span><?php } ?>
                </td>
                 <td class="center">
                   <?php if($v['News']['show']==1){echo '首页展示';}else{?><span class="red">不显示</span><?php } ?>
                </td>
                <td class="center">
                    <?php echo $v['News']['news_author']; ?>
                </td>
                <td class="center">
                    <?php echo date('Y-m-d',$v['News']['news_date']); ?>
                </td>

                <td class="center">
                    <div class="hidden-sm hidden-xs btn-group">

                        <a href="/admin/news_add?id=<?php echo $v['News']['id']?>&bk=<?php echo urlencode($_SERVER['REQUEST_URI']);?>" class="" title="编辑">
                            <i class="ace-icon fa fa-edit bigger-130 "></i>
                        </a>&nbsp;&nbsp;&nbsp;

                        <a class="red" role="button" title="删除" onClick="delconfirm('<?php echo $v['News']['id'];?>')" href="javascript:void(0);">
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
                            echo getPageHtml($total, 10);
                    ?>
                </div>

    </div>
</div>
<script>

function delconfirm(id) {
  if(window.confirm('您确定要执行删除操作吗？')) {
    window.location.href="/admin/news_delete?id="+id;
  } else {

  }
}

</script>