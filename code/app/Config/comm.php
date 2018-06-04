<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2018/5/2
 * Time: 13:49
 */

define('RESOURCE_PATH', '../js');
function showEditor($id, $value='', $width='700px', $height='300px', $style='visibility:hidden;',$upload_state="true", $media_open=false, $type='all'){

    $media = '';
    if ($media_open){
        $media = ", 'flash', 'media'";
    }
    switch($type) {
        case 'basic':
            $items = "['source', '|', 'fullscreen', 'undo', 'redo', 'cut', 'copy', 'paste', '|', 'about']";
            break;
        case 'simple':
            $items = "['source', '|', 'fullscreen', 'undo', 'redo', 'cut', 'copy', 'paste', '|',
            'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link', '|', 'about']";
            break;
        default:
            $items = "['source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
            'superscript', '|', 'selectall', 'clearhtml','quickformat','|',
            'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image'".$media.", 'table', 'hr', 'emoticons', 'link', 'unlink', '|', 'about']";
            break;
    }

    echo '<textarea id="'. $id .'" name="'. $id .'" style="width:'. $width .';height:'. $height .';'. $style .'">'.$value.'</textarea>';
    echo '
<script src="'. RESOURCE_PATH .'/kindeditor/kindeditor-min.js" charset="utf-8"></script>
<script src="'. RESOURCE_PATH .'/kindeditor/lang/zh_CN.js" charset="utf-8"></script>
<script>
	var KE;
  KindEditor.ready(function(K) {
        KE = K.create("textarea[name=\''.$id.'\']", {
						items : '.$items.',
						cssPath : "' . RESOURCE_PATH . '/kindeditor/themes/default/default.css",
						allowImageUpload : '.$upload_state.',
						allowFlashUpload : false,
						allowMediaUpload : false,
						allowFileManager : false,
						syncType:"form",
						afterCreate : function() {
							var self = this;
							self.sync();
						},
						afterChange : function() {
							var self = this;
							self.sync();
						},
						afterBlur : function() {
							var self = this;
							self.sync();
						}
        });
			KE.appendHtml = function(id,val) {
				this.html(this.html() + val);
				if (this.isCreated) {
					var cmd = this.cmd;
					cmd.range.selectNodeContents(cmd.doc.body).collapse(false);
					cmd.select();
				}
				return this;
			}
	});
</script>
	';
    return true;
}

//获取文件扩展名
function getEX($file) {
    $info = pathinfo($file);
    if(empty($info['extension'])) {
        return '';
    } else {
        return '.' . $info['extension'];
    }
}

//分页
//$allCnt  全部数量
//$limit   每页的数量
//$goto    是否添加转到
function getPageHtml($allCnt , $limit = LIMIT , $goto = 0){
    $url = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
    $url = str_replace("//", "/", $url);
    $url = $url;
    $index = 1;
    $size = 1;
    if($_SERVER['QUERY_STRING'] != ""){
        //$url = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
        foreach($_GET as $k=>$v){
            if($k != "p") $url .= $k.'='.urlencode($v).'&';
        }
    }else{
        $url = $url."?";
    }
    if(isset($_GET['p'])) $index = intval($_GET['p']);
    if($limit != 0)       $size  = ceil($allCnt / $limit);
    if($index < 1) $index = 1;
    if($index > $size) $index = $size;
    $pre = $index - 1;
    $nex = $index + 1;
    $str = '<div style="float:left;">
	        当前第【{=index=} / {=size=}】页 记录总数【<span id="result_total_count">{=cnt=}</span>】 ';
    if($goto == 1){
        $str .= '转到 <input size="1" id="p" name="p" class="smallInput" value="{=index=}"> 页';
    }
    $str .= '</div>';


    $str .='<ul class="pagination" style="margin:0">';
    if($index <= $size && $index != 1){
        $str .= '<li class="paginate_button"><a href="'.$url.'p=1">首页</a></li>';
    }else{
        $str .= '<li class="paginate_button disabled"><a>首页</a></li>';
    }
    if($pre <= $size && $pre > 0){
        $str .= ' <li class="paginate_button"><a href="'.$url.'p='.$pre.'">上一页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>上一页</a></li>';
    }
    if($nex <= $size){
        $str .= ' <li class="paginate_button"><a href="'.$url.'p='.$nex.'">下一页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>下一页</a></li>';
    }
    if($index < $size){
        $str .= ' <li class="paginate_button"><a href="'.$url.'p='.$size.'">尾页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>尾页</a></li>';
    }

    $str .='</url>';

    $str = str_replace("{=index=}", $index , $str);
    $str = str_replace("{=cnt=}"  , $allCnt, $str);
    $str = str_replace("{=size=}" , $size  , $str);
    return $str;
}


/*ajax */
function getPageHtmlAjax($allCnt , $limit = LIMIT , $goto = 0){
    $url = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
    $url = str_replace("//", "/", $url);
    $url = $url;
    $index = 1;
    $size = 1;
    if($_SERVER['QUERY_STRING'] != ""){
        //$url = str_replace($_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
        foreach($_GET as $k=>$v){
            if($k != "p") $url .= $k.'='.urlencode($v).'&';
        }
    }else{
        $url = $url."?";
    }
    if(isset($_GET['p'])) $index = intval($_GET['p']);
    if($limit != 0)       $size  = ceil($allCnt / $limit);
    if($index < 1) $index = 1;
    if($index > $size) $index = $size;
    $pre = $index - 1;
    $nex = $index + 1;
    $str = '<div style="float:left;">
	        当前第【{=index=} / {=size=}】页 记录总数【<span id="result_total_count">{=cnt=}</span>】 ';
    if($goto == 1){
        $str .= '转到 <input size="1" id="p" name="p" class="smallInput" value="{=index=}"> 页';
    }
    $str .= '</div>';


    $str .='<ul class="pagination" style="margin:0">';
    if($index <= $size && $index != 1){
        $str .= '<li class="paginate_button"><a href="javascript:void(0);" onclick="goPage(1)">首页</a></li>';
    }else{
        $str .= '<li class="paginate_button disabled"><a>首页</a></li>';
    }
    if($pre <= $size && $pre > 0){
        $str .= ' <li class="paginate_button"><a href="javascript:void(0);" onclick="goPage(' . $pre . ')" >上一页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>上一页</a></li>';
    }
    if($nex <= $size){
        $str .= ' <li class="paginate_button"><a href="javascript:void(0);" onclick="goPage(' . $nex . ')" >下一页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>下一页</a></li>';
    }
    if($index < $size){
        $str .= ' <li class="paginate_button"><a href="javascript:void(0);" onclick="goPage(' . $size . ')">尾页</a></li> ';
    }else{
        $str .= '<li class="paginate_button disabled"><a>尾页</a></li>';
    }

    $str .='</url>';

    $str = str_replace("{=index=}", $index , $str);
    $str = str_replace("{=cnt=}"  , $allCnt, $str);
    $str = str_replace("{=size=}" , $size  , $str);
    return $str;

}


//截取指定长度字符串,超过的用 ... 代替
function sub($str,$len){
    if(mb_strlen($str , "UTF-8") > $len){
        $str = mb_substr($str , 0 ,$len*2+1 , "UTF-8");
        preg_match_all("/[^\x80-\xff]{2}|[^\x80-\xff]|[\x80-\xff]{3}/",$str,$arr);
        if(count($arr[0])>$len){
            return join('',array_splice($arr[0],0,$len)).'...';
        }else{
            return join('',$arr[0]);
        }
    }else{
        return $str;
    }
}

function _echo($arr, $k, $default = '') {
    echo empty($arr[$k]) ? $default : $arr[$k];
}
