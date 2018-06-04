<?php
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AdminController extends AppController {
    public $helpers = array('Html', 'Form');
    public $layout = 'member';
    public $uses = array('News','Companys','Action','Video','Channel','Adv','User');
    public $components = array('Paginator',"Session");
    public function beforeFilter()
    {

    }
    public function index(){
        $post = $_POST;
        if(!empty($post))
        {
            $params=array(
                'conditions'=>array('AND'=>array('User.username'=>trim($post['username']),'User.password'=>md5(trim($post['password'])))
                )
            );
            $userInfo = $this->User->find('first',$params);

            if(!empty($userInfo)){
                $this->Session->Write("userInfo",$userInfo['User']['username']);
                $this->Session->delete('uInfo');
                $this->redirect("news_list?p=1");
            }else{
                $this->Session->delete('userData');
                $this->Session->setFlash('* 用户名或密码错误。');
                $this->redirect($this->referer());
            }
        }
        $this->layout = "ajax";
    }
    //注销
    public function logout() {
        $this->checkLogin();
        $this->Session->delete("userInfo");
        $this->redirect('index');
    }
    //添加广告
//    public function adv(){
//        $this->checkLogin();
//        $post = $_POST;
//        if(!empty($_FILES)) {
//            if(!empty($post['id'])){
//
//                $path = 'upload/adv_img/' . date('Y-m') . '/';
//                if (!is_dir($path)) {
//                    @mkdir($path, 0777, true);
//                    @chmod($path, 0777);
//                }
//                $file = $_FILES['slide_pic'];
//
//                if (!empty($file['name']['0'])) {
//                    foreach ($file['name'] as $k => $v) {
//                        if ($file['error'][$k] == 0) {
//                            $new_name = $path . uniqid() . getEX($v);
//                            move_uploaded_file($file['tmp_name'][$k], $new_name);
//                            $img[] = '/' . $new_name;
//                        }
//                    }
//                    $update_data['slide_pic'] = "'".serialize($img)."'";
//                }
//                $lfile=$_FILES['left_pic'];
//
//                if(!empty($lfile['name'])) {
//                    if ($lfile['error'] == 0) {
//                        $lnew_name = $path . uniqid() . getEX($lfile['name']);
//                        move_uploaded_file($lfile['tmp_name'], $lnew_name);
//                        $limg = '/' . $lnew_name;
//                    }
//                    $update_data['left_pic'] = "'".$limg."'";
//                }
//                $rfile=$_FILES['right_pic'];
//                if(!empty($rfile['name']))
//                {
//                    if ($rfile['error'] == 0) {
//                        $rnew_name = $path . uniqid() . getEX($rfile['name']);
//                        $res = move_uploaded_file($rfile['tmp_name'], $rnew_name);
//                        $rimg = '/' . $rnew_name;
//                    }
//                    $update_data['right_pic'] = "'".$rimg."'";
//
//                }
//		$update_data['left_url']= '"'.trim($post['left_url']).'"';
//		$update_data['right_url']= '"'.trim($post['right_url']).'"';
//           $result = $this->Adv->updateAll($update_data, array('Adv.id'=>intval($_POST['id'])));
//                    if($result)
//                    {
//                        // 设置会话(*session*)闪现提示信息并跳转
//                        $this->Session->setFlash('保存成功!');
//                        return $this->redirect('adv');
//                    }
//            }else{
//                $file = $_FILES['slide_pic'];
//                if (!empty($file)) {
//                    $img = '';
//                    $path = 'upload/adv_img/' . date('Y-m') . '/';
//                    if (!is_dir($path)) {
//                        @mkdir($path, 0777, true);
//                        @chmod($path, 0777);
//                    }
//                    foreach ($file['name'] as $k => $v) {
//                        if ($file['error'][$k] == 0) {
//                            $new_name = $path . uniqid() . getEX($v);
//                            move_uploaded_file($file['tmp_name'][$k], $new_name);
//                            $img[] = '/' . $new_name;
//                        }
//                    }
//                    $data['slide_pic'] = serialize($img);
//                }
//                $lfile=$_FILES['left_pic'];
//                if(!empty($lfile)) {
//                    if ($lfile['error'] == 0) {
//                        $lnew_name = $path . uniqid() . getEX($lfile['name']);
//                        move_uploaded_file($lfile['tmp_name'], $lnew_name);
//                        $limg = '/' . $lnew_name;
//                    }
//                    $data['left_pic'] = $limg;
//                }
//                $rfile=$_FILES['right_pic'];
//                if(!empty($rfile))
//                {
//                    if ($rfile['error'] == 0) {
//                        $rnew_name = $path . uniqid() . getEX($rfile['name']);
//                        move_uploaded_file($lfile['tmp_name'], $rnew_name);
//                        $rimg = '/' . $rnew_name;
//                    }
//                    $data['right_pic'] = $rimg;
//                }
//		$data['left_url']=trim($post['left_url']);
//		$data['right_url']=trim($post['right_url']);
//                    if($this->Adv->save($data))
//                    {
//                        // 设置会话(*session*)闪现提示信息并跳转
//                        $this->Session->setFlash('保存成功!');
//                        return $this->redirect('adv');
//                    }
//            }
//        }
//
//        $info = $this->Adv->find('first',array('order' => array('Adv.id' => 'desc')));
//        $this->set('info',$info);
//        $this->set('menu', 'M0102');
//        $this->layout = "member";
//    }
    public function company()
    {
        $this->checkLogin();
        $post=$_POST;
        $get=$_GET;
        if(!empty($post)){
//            $file = $_FILES['news_img'];
            if(!empty($post['id'])){
//                if(!empty($file)){
//                    $img = '';
//                    $path =  'upload/company_img/' . date('Y-m') . '/';
//                    if(!is_dir($path)) {
//                        @mkdir($path, 0777, true);
//                        @chmod($path, 0777);
//                    }
//                    foreach ($file['name'] as $k => $v) {
//                        if($file['error'][$k] == 0) {
//                            $new_name = $path . uniqid() . getEX($v);
//                            move_uploaded_file($file['tmp_name'][$k], $new_name);
//                            $img= '/'.$new_name;
//                        }
//                    }
//                }
                $update_data=array(
                    'company_icp'=>"'".trim(sf($_POST['company_icp']))."'",
                    'company_name'=>"'".trim(sf($_POST['company_name']))."'",
                    'company_address'=>"'".trim(sf($_POST['company_address']))."'",
//                    'company_intro'=>"'".sf(trim($_POST['company_intro']))."'",
                    'company_email'=>"'".sf(trim($_POST['company_email']))."'",
                    'company_tel'=>"'".sf(trim($_POST['company_tel']))."'",
                      'company_tax'=>"'".sf(trim($_POST['company_tax']))."'",
                    'type'=>"'".sf(trim($_POST['type']))."'"
                );
//                if(!empty($img)) $update_data['company_img'] = '"'.$img.'"';
                // 如果表单数据能够通过验证并保存成功……
                $result = $this->Companys->updateAll($update_data, array('Companys.id'=>intval($post['id'])));
                if ($result) {
                    // 设置会话(*session*)闪现提示信息并跳转
                //    $this->Session->setFlash('更新成功!');
                    return $this->redirect('company');
                }

            }else{
                if(!empty($file)){
                    $img = '';
                    $path =  'upload/company_img/' . date('Y-m') . '/';
                    if(!is_dir($path)) {
                        @mkdir($path, 0777, true);
                        @chmod($path, 0777);
                    }
                    foreach ($file['name'] as $k => $v) {
                        if($file['error'][$k] == 0) {
                            $new_name = $path . uniqid() . getEX($v);
                            move_uploaded_file($file['tmp_name'][$k], $new_name);
                            $img= '/'.$new_name;
                        }
                    }
                }
                $data=array(
                    'company_icp'=>"'".trim(sf($_POST['company_icp']))."'",
                    'company_name'=>"'".trim(sf($_POST['company_name']))."'",
                    'company_address'=>"'".trim(sf($_POST['company_address']))."'",
                    'company_fax'=>"'".sf(trim($_POST['company_fax']))."'",
                    'company_email'=>"'".sf(trim($_POST['company_email']))."'",
                    'company_tel'=>"'".sf(trim($_POST['company_tel']))."'"
                );
//                if(!empty($img)) $data['company_img'] = $img;
                // 如果表单数据能够通过验证并保存成功……
                if ($this->Companys->save($data)) {
                    // 设置会话(*session*)闪现提示信息并跳转
                  //  $this->Session->setFlash('保存成功!');
                    return $this->redirect('company');
                }
            }

        }

        $info = $this->Companys->find('first',array('conditions'=>array('Companys.type'=>1)));

        $this->set('info',empty($info['Companys'])? 0:$info['Companys']);

        $this->set('menu', 'M0101');
        $this->layout = "member";
    }
    public function ecompany()
    {
        $this->checkLogin();
        $post=$_POST;
        $get=$_GET;
        if(!empty($post)){
//            $file = $_FILES['news_img'];
            if(!empty($post['id'])){
//                if(!empty($file)){
//                    $img = '';
//                    $path =  'upload/company_img/' . date('Y-m') . '/';
//                    if(!is_dir($path)) {
//                        @mkdir($path, 0777, true);
//                        @chmod($path, 0777);
//                    }
//                    foreach ($file['name'] as $k => $v) {
//                        if($file['error'][$k] == 0) {
//                            $new_name = $path . uniqid() . getEX($v);
//                            move_uploaded_file($file['tmp_name'][$k], $new_name);
//                            $img= '/'.$new_name;
//                        }
//                    }
//                }
                $update_data=array(
                    'company_icp'=>"'".trim(sf($_POST['company_icp']))."'",
                    'company_name'=>"'".trim(sf($_POST['company_name']))."'",
                    'company_address'=>"'".trim(sf($_POST['company_address']))."'",
//                    'company_intro'=>"'".sf(trim($_POST['company_intro']))."'",
                    'company_email'=>"'".sf(trim($_POST['company_email']))."'",
                    'company_tel'=>"'".sf(trim($_POST['company_tel']))."'",
                    'company_tax'=>"'".sf(trim($_POST['company_tax']))."'",
                    'type'=>"'".sf(trim($_POST['type']))."'"
                );
//                if(!empty($img)) $update_data['company_img'] = '"'.$img.'"';
                // 如果表单数据能够通过验证并保存成功……
                $result = $this->Companys->updateAll($update_data, array('Companys.id'=>intval($post['id'])));
                if ($result) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    //    $this->Session->setFlash('更新成功!');
                    return $this->redirect('company');
                }

            }else{
                if(!empty($file)){
                    $img = '';
                    $path =  'upload/company_img/' . date('Y-m') . '/';
                    if(!is_dir($path)) {
                        @mkdir($path, 0777, true);
                        @chmod($path, 0777);
                    }
                    foreach ($file['name'] as $k => $v) {
                        if($file['error'][$k] == 0) {
                            $new_name = $path . uniqid() . getEX($v);
                            move_uploaded_file($file['tmp_name'][$k], $new_name);
                            $img= '/'.$new_name;
                        }
                    }
                }
                $data=array(
                    'company_icp'=>"'".trim(sf($_POST['company_icp']))."'",
                    'company_name'=>"'".trim(sf($_POST['company_name']))."'",
                    'company_address'=>"'".trim(sf($_POST['company_address']))."'",
                    'company_fax'=>"'".sf(trim($_POST['company_fax']))."'",
                    'company_email'=>"'".sf(trim($_POST['company_email']))."'",
                    'company_tel'=>"'".sf(trim($_POST['company_tel']))."'"
                );
//                if(!empty($img)) $data['company_img'] = $img;
                // 如果表单数据能够通过验证并保存成功……
                if ($this->Companys->save($data)) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    //  $this->Session->setFlash('保存成功!');
                    return $this->redirect('company');
                }
            }

        }

        $info = $this->Companys->find('first',array('conditions'=>array('Companys.type'=>2)));
        $this->set('info',empty($info['Companys'])? 0:$info['Companys']);
        $this->set('menu', 'M0102');
        $this->layout = "member";
    }
    //文章列表
    public function news_list()
    {

        $this->checkLogin();
        $get=$_GET;
        $total = $this->News->find('count',array('is_delete'=>1));
        if(empty($get['p'])){
                $p=1;
        }else{
            $p=intval($get['p']);
        }
        //条件
        if(isset($get['title'])){
            $paginate=array(

                'conditions' => array('AND'=>array('News.news_title LIKE'=>'%'.$get['title'].'%','News.is_delete' => 1)),//条件
                'order'=>array('News.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }else{
            $paginate=array(
                'fields'=>array(
                    'News.id','News.news_title','News.show','News.ch_id','News.news_author','News.news_date','News.status','channels.channel_title'
                ),
                'conditions' => array('News.is_delete' => 1),//条件
                'order'=>array('News.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
                'joins' => array(
                    array(
                        'table'=>'channels',
                        'type'=>'LEFT',
                        'conditions'=>'News.ch_id=channels.id'
                    )
                )
            );
        }
        $this->Paginator->settings = $paginate;
        $list = $this->Paginator->paginate('News');
     
        $this->set('list', $list);
        $bk = !empty($post['bk']) ? $post['bk'] : (empty($get['bk']) ? '' : $get['bk']);
        $this->set('bk', $bk);
        $this->set('menu', 'M0201');
        $this->set('total', $total);      //total      总条数
        $this->layout = "member";
    }
    public function news_add(){
        $this->checkLogin();
        $get =$_GET;
        $post = $_POST;
        $param =  array(
            'conditions' => array('Channel.parent_id' => 0,'Channel.is_delete'=>1), //查询条件数组
            //定义排序的字符串或者数组
            'order' => array('Channel.id DESC'),
        );
        $info = $this->Channel->find('all',$param);
        $this->set('info',$info);
        $this->set('err',empty($err)? array():$err);
        $now = time();
        if(!empty($post)) {

            if (!empty($post['id'])) {

                //编辑文章
                $update_data = array(
                    'news_title' => "'".sf(trim($post['news_title']))."'",
                    'news_author' => "'".sf(trim($post['author']))."'",
                    'status'=>intval($post['status']),
                    'ch_id'=>empty($post['parent_sub_id'])? '':intval($post['parent_sub_id']),
                    'ch_parent_id'=>intval($post['parent_id']),
                    'channel_type'=>intval($post['channel_type']),
                    'show' =>intval($post['show']),
                    'news_content' => "'".sf(trim($post['news_content']))."'",
                );
                $path = 'upload/adv_img/' . date('Y-m') . '/';
                if (!is_dir($path)) {
                    @mkdir($path, 0777, true);
                    @chmod($path, 0777);
                }
                $file = $_FILES['slide_pic'];
                if (!empty($file['name'])) {
                    if ($file['error'] == 0) {
                        $new_name = $path . uniqid() . getEX($file['name']);
                        move_uploaded_file($file['tmp_name'], $new_name);
                        $update_data['news_img'] = "'/".$new_name."'";
                    }
                }

                $result = $this->News->updateAll($update_data, array('News.id'=>intval($post['id'])));
                if ($result) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('更新成功!');
                    return $this->redirect('news_list');
                }
            } else {
                //添加文章

                $data = array(
                    'news_title' => sf(trim($post['news_title'])),
                    'news_author' => sf(trim($post['news_author'])),
                    'news_date' => $now,
                    'status'=>intval($post['status']),
                    'ch_id'=>empty($post['parent_sub_id'])?'':intval($post['parent_sub_id']),
                    'ch_parent_id'=>intval($post['parent_id']),
                    'channel_type'=>intval($post['channel_type']),
                    'show' =>intval($post['show']),
                    'news_content' => trim($post['news_content']),
                );
                $path = 'upload/news_img/' . date('Y-m') . '/';
                if (!is_dir($path)) {
                    @mkdir($path, 0777, true);
                    @chmod($path, 0777);
                }
                $file = $_FILES['slide_pic'];
                if (!empty($file['name'])) {
                    if ($file['error'] == 0) {
                        $new_name = $path . uniqid() . getEX($file['name']);
                        move_uploaded_file($file['tmp_name'], $new_name);
                        $data['news_img'] = "/".$new_name;
                    }
                }
                // 如果表单数据能够通过验证并保存成功
                if ($this->News->save($data)) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('保存成功!');
                    return $this->redirect('news_list?p=1');
                }
            }
        }elseif(!empty($get['id'])){
            $news = $this->News->findAllById(intval($get['id']));
            if(!empty($news[0]['News']['ch_parent_id'])){
                $cparam =  array(
                    'fields' => array('Channel.id,Channel.channel_title'),
                    'conditions' => array('Channel.parent_id' =>$news[0]['News']['ch_parent_id']), //查询条件数组
                    //定义排序的字符串或者数组
                    'order' => array('Channel.id DESC'),
                );
                $cat = $this->Channel->find('all',$cparam);
            }
            $this->set('cat',empty($cat)? array():$cat);
            $this->set('news',$news[0]);
            $this->render('news_edit','member');
        }

        $this->set('menu', 'M0201');
        $this->layout = "member";
    }
    //ajax 获取二级标题
    public  function ajaxItem(){
        $id=intval($_POST['id']);
        $param =  array(
            'fields' => array('Channel.id,Channel.channel_title'),
            'conditions' => array('Channel.parent_id' =>$id), //查询条件数组
            //定义排序的字符串或者数组
            'order' => array('Channel.id DESC'),
        );
        $info = $this->Channel->find('all',$param);
        echo json_encode($info);
        exit;
    }
    //文章删除
    public function news_delete(){
        $this->checkLogin();
        $param =$_GET;
        $result = $this->News->updateAll(array('is_delete'=>0), array('News.id'=>intval($param['id'])));
        if ($result) {
            // 设置会话(*session*)闪现提示信息并跳转
            $this->Session->setFlash('删除成功!');
            return $this->redirect('news_list?p=1');
        }
    }
    //视频列表
    public function video_list()
    {
        $this->checkLogin();
        $get=$_GET;
        $total = $this->Video->find('count',array('is_delete'=>1));
        if(empty($get['p'])){
            $p=1;
        }else{
            $p=intval($get['p']);
        }
        //条件
        if(isset($get['title'])){
            $paginate=array(
                'conditions' => array('AND'=>array('Video.video_title LIKE'=>'%'.$get['title'].'%','Video.is_delete' => 1)),//条件
                'order'=>array('Video.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }else{
            $paginate=array(
                'conditions' => array('Video.is_delete' => 1),//条件
                'order'=>array('Video.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }
        $this->Paginator->settings = $paginate;
        $list = $this->Paginator->paginate('Video');
        $this->set('total', $total);      //total      总条数
        $this->set('list',$list);
        $this->set('menu', 'M0301');
        $this->layout = "member";
    }
    public function video_add(){
        $this->checkLogin();
        $param =$_GET;
        $post = $_POST;
        $channel = $this->Channel->find('all',array('Channel.is_delete'));
        $this->set('channel',$channel);
        if(!empty($post)) {
            $file = $_FILES['news_img'];
            if(!empty($file)){
                $img = '';
                $path =  'upload/video_img/' . date('Y-m') . '/';
                if(!is_dir($path)) {
                    @mkdir($path, 0777, true);
                    @chmod($path, 0777);
                }
//                foreach ($file['name'] as $k => $v) {
                if($file['error'] == 0) {
                    $new_name = $path . uniqid() . getEX($file['name']);
                    move_uploaded_file($file['tmp_name'], $new_name);
                    $img= '/'.$new_name;
                }
//                }
            }
            if (!empty($param['id'])) {

                //编辑文章
                $update_data = array(
                    'channel_id' => "'".trim($post['channel_id'])."'",
                    'video_title' => "'".trim($post['video_title'])."'",
                    'video_url' => "'".trim($post['video_url'])."'",
                );
                if(!empty($img)){
                    $update_data['video_pic'] = "'". $img."'";
                }
                $result = $this->Video->updateAll($update_data, array('Video.id'=>intval($param['id'])));
                if ($result) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('更新成功!');
                    return $this->redirect('video_list?p=1');
                }
            } else {
                //添加文章
                $now = time();
                $data = array(
                    'channel_id' => trim($post['channel_id']),
                    'video_title' => trim($post['video_title']),
                    'video_url' => trim($post['video_url']),
                    'video_time' => $now,
                    'is_delete'=>1
                );
                if(!empty($img)) $data['video_pic'] = $img;
                // 如果表单数据能够通过验证并保存成功……

                if ($this->Video->save($data)) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('保存成功!');
                    return $this->redirect('video_list?p=1');
                }
            }
        }elseif(!empty($param['id'])){
            $news = $this->Video->findAllById(intval($param['id']));

            $this->set('info',$news[0]);
            $this->render('video_edit','member');
        }

        $this->set('menu', 'M0301');
        $this->layout = "member";
    }
    //删除

    //活动列表
    public function action_list()
    {
        $this->checkLogin();
        $get=$_GET;
        $total = $this->Action->find('count',array('is_delete'=>1));
        if(empty($get['p'])){
            $p=1;
        }else{
            $p=intval($get['p']);
        }
        //条件
        if(isset($get['title'])){
            $paginate=array(
                'conditions' => array('AND'=>array('Action.action_title LIKE'=>'%'.$get['title'].'%','Action.is_delete' => 1)),//条件
                'order'=>array('Action.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }else{
            $paginate=array(
                'conditions' => array('Action.is_delete' => 1),//条件
                'order'=>array('Action.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }
        $this->Paginator->settings = $paginate;
        $list = $this->Paginator->paginate('Action');
//       $list = $this->News->find('all',$params);
        $this->set('list', $list);
        $this->set('menu', 'M0401');
        $this->set('total', $total);      //total      总条数
        $this->layout = "member";
    }
    public function action_add(){
        $this->checkLogin();
        $param =$_GET;
        $post = $_POST;

        if(!empty($post)) {

            $file = $_FILES;
            if(!empty($file)){
                $img = '';
                $path =  'upload/news_img/' . date('Y-m') . '/';
                if(!is_dir($path)) {
                    @mkdir($path, 0777, true);
                    @chmod($path, 0777);
                }

                if($file['action_banner']['error'] == 0) {
                    $new_name = $path . uniqid() . getEX($file['action_banner']['name']);
                    move_uploaded_file($file['action_banner']['tmp_name'], $new_name);
                    $action_banner= '/'.$new_name;
                }


                if($file['action_pic']['error']== 0) {
                    $new_names = $path . uniqid() . getEX($file['action_banner']['name']);
                    move_uploaded_file($file['action_pic']['tmp_name'], $new_names);
                    $action_pic= '/'.$new_names;
                }

            }
            $now = time();
            if (!empty($param['id'])) {

                //编辑文章
                $update_data = array(
                    'action_title' =>"'" .trim($post['action_title'])."'",
                    'action_time' => $now,
                    'action_content' => "'" . addslashes(trim($post['action_content']))."'",
                    'is_over'=>intval($post['is_over']),
                );
                if(!empty($action_pic)) $update_data['action_pic'] = "'" .$action_pic."'";
                if(!empty($action_banner)) $update_data['action_banner'] = "'" .$action_banner."'";
                $result = $this->Action->updateAll($update_data, array('Action.id'=>intval($param['id'])));
                if ($result) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('更新成功!');
                    return $this->redirect('action_list?p=1');
                }
            } else {
                //添加文章

                $data = array(
                    'action_title' => trim($post['action_title']),
                    'action_time' => $now,
                    'action_content' => stripslashes(trim($post['action_content'])),
                    'is_over'=>intval($post['is_over']),
                );
                if(!empty($action_pic)) $data['action_pic'] = $action_pic;
                if(!empty($action_banner)) $data['action_banner'] = $action_banner;
                // 如果表单数据能够通过验证并保存成功……
                if ($this->Action->save($data)) {
                    // 设置会话(*session*)闪现提示信息并跳转
                    $this->Session->setFlash('保存成功!');
                    return $this->redirect('action_list?p=1');
                }
            }
        }elseif(!empty($param['id'])){
            $news = $this->Action->findAllById(intval($param['id']));
            $this->set('info',$news[0]['Action']);
            $this->render('action_edit','member');
        }

        $this->set('menu', 'M0401');
        $this->layout = "member";
    }
    public function action_delete(){
        $this->checkLogin();
        $param =$_GET;
        $result = $this->Action->updateAll(array('is_delete'=>0), array('Action.id'=>intval($param['id'])));
        if ($result) {
            // 设置会话(*session*)闪现提示信息并跳转
            $this->Session->setFlash('删除成功!');
            return $this->redirect('action_list?p=1');
        }
    }
    //频道列表
    public function channel_list(){
        $this->checkLogin();
        $get=$_GET;
        $total = $this->Channel->find('count',array('is_delete'=>1));
        if(empty($get['p'])){
            $p=1;
        }else{
            $p=intval($get['p']);
        }
        //条件
        if(isset($get['title'])){
            $paginate=array(
                'conditions' => array('AND'=>array('Channel.channel_title LIKE'=>'%'.$get['title'].'%','Channel.is_delete' => 1)),//条件
                'order'=>array('Channel.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }else{
            $paginate=array(
                'conditions' => array('Channel.is_delete' => 1),//条件
                'order'=>array('Channel.id' => 'desc'),//排序
                'limit' => 10, //整型
                'page'=>$p,
            );
        }
        $this->Paginator->settings = $paginate;
        $list = $this->Paginator->paginate('Channel');
        $this->set('total', $total);      //total      总条数
        $this->set('list',$list);
        $this->set('menu', 'M0501');
        $this->layout = "member";
    }
    //频道添加
    public function channel_add(){
        $this->checkLogin();
        $get =$_GET;
        $post = $_POST;
        $param =  array(
            'conditions' => array('Channel.parent_id' => 0,'Channel.status'=>1,'Channel.is_delete'=>1), //查询条件数组
            //定义排序的字符串或者数组
            'order' => array('Channel.id DESC'),
        );
        $info = $this->Channel->find('all',$param);
        $this->set('info',$info);

        if(!empty($post)) {
            if(!preg_match("/^[^:%,'\*\"\s\<\>\&]+$/",$post['channel_title'])){
                $err['channel_title']='二级标题格式错误';
            }
            if(empty($err)){
                if (!empty($get['id'])) {
                    //编辑文章
                    $update_data = array(
                        'channel_title' => "'".sf(trim($post['channel_title']))."'",
                        'channel_type'=>intval($post['channel_type']),

                        'status'=>intval($post['status']),
                    );
                    if(!empty($post['parent_id'])){
                        $update_data['parent_id']=intval($post['parent_id']);
                    }
                    $result = $this->Channel->updateAll($update_data, array('Channel.id'=>intval($get['id'])));
                    if ($result) {
                        // 设置会话(*session*)闪现提示信息并跳转
                        $this->Session->setFlash('更新成功!');
                        return $this->redirect('channel_list?p=1');
                    }
                } else {

                    //添加网页标题
                    $data = array(
                        'channel_title' => sf(trim($post['channel_title'])),
                        'channel_type'=>intval($post['channel_type']),
                        'parent_id'=>intval($post['parent_id']),
                        'status'=>intval($post['status']),
                    );
                    // 如果表单数据能够通过验证并保存成功……
                    if ($this->Channel->save($data)) {
                        // 设置会话(*session*)闪现提示信息并跳转
                        $this->Session->setFlash('保存成功!');
                        return $this->redirect('channel_list?p=1');
                    }
                }
            }
        }elseif(!empty($get['id'])){
            $params =  $param =  array(
                'conditions' => array('Channel.id' => intval($get['id'])), //查询条件数组
                'fields'=>array('Channel.id','Channel.id','Channel.channel_title','Channel.parent_id','Channel.status','Channel.channel_type'),
            );
            $channel = $this->Channel->find('first',$params);
            $this->set('channel',$channel);
            $this->set('err',empty($err)? array():$err);
            $this->render('channel_edit','member');
        }

        $this->set('menu', 'M0501');
        $this->set('err',empty($err)? array():$err);
        $this->layout = "member";
    }
    //频道删除
    public function channel_delete(){
        $this->checkLogin();
        $param =$_GET;
        $result = $this->Channel->updateAll(array('is_delete'=>0), array('Channel.id'=>intval($param['id'])));
        if ($result) {
            // 设置会话(*session*)闪现提示信息并跳转
            $this->Session->setFlash('删除成功!');
            return $this->redirect('channel_list?p=1');
        }
    }

    public function user()
    {
        $this->checkLogin();
        $user = $this->User->find('all');
        $this->set('list',$user);
        $this->set('menu', 'M0601');
        $this->layout = "member";
    }
    public function user_add()
    {
        $this->checkLogin();
        $post = $_POST;
        if(!empty($post)){

            if(!preg_match("/^[^:%,'\*\"\s\<\>\&]+$/",$post['name'])){
                $err='用户名格式错误';
            }
            if(strlen($post['name'])<5 || strlen($post['name'])>15){
                $err='用户名长度在5到15字符长度';
            }
            if(!empty($post['password'])){
                if(strlen($post['password'])<5 || strlen($post['password'])>15){
                    $err='用户名密码长度不正确';
                }
            }

            if(empty($err)){
                $data = array(
                    'username'=>trim($post['name']),
                    'password'=>md5(trim($post['password'])),
                    'role'=>'admin',
                    'created'=>time(),
                    'modified'=>time(),
                );
                if($this->User->save($data))
                {
                    $this->Session->setFlash('保存成功!');
                    return $this->redirect('user?p=1');
                }
            }

        }
        $this->set('menu', 'M0601');
        $this->set('err', empty($err) ? '' : $err);
        $this->layout = "member";
    }
    public function user_edit(){
        $post = $_POST;
           if(!empty($post['id'])) {
               if(!preg_match("/^[^:%,'\*\"\s\<\>\&]+$/",$post['name'])){
                   $err='用户名格式错误';
               }
               if(strlen($post['name'])<5 || strlen($post['name'])>15){
                   $err='用户名长度在5到15字符长度';
               }
               if(!empty($post['password'])){
                   if(strlen($post['password'])<5 || strlen($post['password'])>15){
                       $err='用户名密码长度不正确';
                   }
                   $update_data['password']= "'".md5(trim($post['password']))."'";
               }

               if(empty($err)){
                   $update_data = array(
                       'username'=>"'".trim($post['name'])."'",
                       'modified'=>time(),
                   );

                   if($this->User->updateAll($update_data,array('User.id'=>intval($_GET['id']))))
                   {
                       $this->Session->setFlash('保存成功!');
                       return $this->redirect('user?p=1');
                   }
               }

           }
        $user = $this->User->find('first',array('conditions'=>array('User.id'=>intval($_GET['id']))));
        $this->set('user',$user);
        $this->set('err', empty($err) ? '' : $err);
        $this->render('user_edit');
    }

    public function user_delete(){
        $this->checkLogin();
        $param =$_GET;

        if ($this->User->delete(intval($param['id']))) {
            // 设置会话(*session*)闪现提示信息并跳转
            $this->Session->setFlash('删除成功!');
            return $this->redirect('user?p=1');
        }
    }
    private function checkLogin(){
        if(!$this->Session->check("userInfo")){
            $this->Session->setFlash(__('会话无效，请重新登录！'));
            $this->redirect('index');
            exit;
        }
    }

}
