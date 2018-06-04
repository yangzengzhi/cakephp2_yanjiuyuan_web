    <?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2018/4/28
 * Time: 11:46
 */
    App::uses('AppController', 'Controller');
    class HomeController extends AppController
    {

        /**
         * Controller name
         *
         * @var string
         */
        public $name = 'Home';
        public $layout = "default";
        public $components = array('Paginator');


        /**
         * This controller does not use a model
         *
         * @var array
         */
        public $uses = array('News','Companys','Action','Video','Channel','Adv');
        public $helpers = array('Html');

        public function beforeFilter()
        {
			$this->index();
        }

        public function home()
        {
            $get=$_GET;
            //新闻
            $type = empty($get['type'])? '1':intval($get['type']);

            if($type == 2){
                $action_con = array(
                    'conditions' => array('Channel.is_delete' => 1,'Channel.channel_type'=>2,'Channel.parent_id'=>0),//条件
                    'order'=>array('Channel.sort' => 'desc'),//排序
                    'limit'=>5
                );
            }else{
                $action_con = array(
                    'conditions' => array('Channel.is_delete' => 1,'Channel.channel_type'=>1,'Channel.parent_id'=>0),//条件
                    'order'=>array('Channel.sort' => 'desc'),//排序
                    'limit'=>5
                );
            }

            $channel_list = $this->Channel->find('all',$action_con);
            foreach ($channel_list as $k =>$v){
                $news_con = array(
                    'conditions' => array('News.is_delete' => 1,'News.ch_parent_id'=>$v['Channel']['id']),//条件
                    'order'=>array('News.id' => 'desc'),//排序
                    'limit'=>6,
                );
                $news[$v['Channel']['id']]['title']=$v['Channel']['channel_title'];
                $news[$v['Channel']['id']]['news'] = $this->News->find('all',$news_con);
            }
            $this->set('news',$news);

            //图片显示
            $news_condition = array(
                'conditions' => array('News.is_delete' => 1,'News.show'=>1,'News.channel_type'=>$type),//条件
                'order'=>array('News.id' => 'desc'),//排序
                'limit'=>5,
            );
            $slide_news = $this->News->find('all',$news_condition);
            $this->set('slide_news',$slide_news);
            $this->set('type',$type);

        }
        public function company()
        {
            $info = $this->Companys->find('first',array('order' => array('Companys.id' => 'desc')));
            $this->set('info',empty($info['Companys'])? 0:$info['Companys']);
        }

        public function search(){
            $post=$_POST;
            $reg="/^[^:%,'\*\\\"\s\<\>\&]{2,10}$/";
            if(!preg_match($reg,trim($post['search']))){
                $info['err']='未查到相关内容';
                $this->set('info',$info);
            }else{
//                $condition= array(
//                    "condition" => array(
//                        'News.channel_type'=>intval($post['type']),
//                        'News.status'=>1,
//                        'News.news_title LIKE" => "%'.trim($post['search']).'"%',
//                    )
//                );
                $params = array(
                    'conditions'=>array('News.status'=>1,'News.channel_type'=>intval($post['type']),'news_title LIKE "%'.trim($post['search']).'%"'),
                );
                $total = $this->News->find('count',$params);
                $total_p = ceil($total/10);
                if(empty($_GET['p']) || $total_p< $_GET['p']){
                    $p=1;
                }else{
                    $p = intval($_GET['p']);
                }

                $paginate = array(
                    'conditions' => array('status'=>1,'channel_type'=>intval($post['type']),'news_title LIKE "%'.trim($post['search']).'%"'),
                    'order' => array(
                        'News.id' => 'desc'
                    ),
                    'limit' =>20,
                    'page'=>$p,
                );
                $this->Paginator->settings = $paginate;
                $list = $this->Paginator->paginate('News');
    //            $list =  $this->News->find('all',$condition);

                $info['err']='未查到相关内容';
                $this->set('total',$total);
                $this->set('limit',20);
                $this->set('curpage',$p);
                $this->set('info',$info);
                $this->set('list',$list);
                $this->set('type',intval($post['type']));
            }
        }
    }
