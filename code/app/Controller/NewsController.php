<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2018/4/28
 * Time: 14:33
 */
App::uses('AppController', 'Controller');
class NewsController extends AppController
{

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'News';
    public $layout = "default";

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array("News");
    public $helpers = array('Html');
    public $components = array('Paginator');

     public function beforeFilter()
        {
			$this->index();
        }

    public function lists()
    {

        $total = $this->News->find('count',array('conditions'=>array('News.is_delete'=>1,'News.ch_id'=>intval($_GET['pid']),'News.channel_type'=>intval($_GET['type']))));
        $total_p = ceil($total/20);
        if(empty($_GET['p']) || $total_p< $_GET['p']){
            $p=1;
        }else{
            $p = intval($_GET['p']);
        }
        $paginate = array(
            'conditions' => array('is_delete'=>1,'ch_id'=>intval($_GET['pid']),'channel_type'=>intval($_GET['type'])),
        'order' => array(
            'News.id' => 'desc'
        ),
         'limit' =>20,
        'page'=>$p,
    );

        $this->Paginator->settings = $paginate;
        $list = $this->Paginator->paginate('News');

        $this->set('total',$total);
        $this->set('limit',20);
        $this->set('curpage',$p);
        $this->set('pid',intval($_GET['pid']));
        $this->set('list', $list);
        $this->set('type',$_GET['type']);
//        $params=array(
//            'conditions' => array('News.is_delete' => 1),//条件
//            'order'=>array('News.id' => 'desc'),//排序
//            'limit' => 10, //整型
//        );
//        $list = $this->News->find('all',$params);
//        $this->set('list',$list);
    }
    public function information()
    {
        $get=$_GET;
        $news = $this->News->findAllById(intval($get['id']));
        $this->set('type',$_GET['type']);
        $this->set('news',$news[0]);
    }
}
