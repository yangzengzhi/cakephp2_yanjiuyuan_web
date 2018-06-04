<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

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
class AppController extends Controller {
 public $uses = array('News','Companys','Action','Video','Channel','Adv');
	public function index(){
            $get=$_GET;
            $type = empty($get['type'])? '1':intval($get['type']);

                $action_con = array(
                    'conditions' => array('Channel.is_delete' => 1,'Channel.status'=>1,'Channel.channel_type'=>$type),//条件
                    'order'=>array('Channel.id' => 'asc'),//排序
                );


            $channel = $this->Channel->find('all',$action_con);
//            var_dump($channel);
            $channel_parent=array();
           foreach($channel as $k => $v){
                if($v['Channel']['parent_id'] == 0) {
                    $channel_parent[$v['Channel']['id']]['id'] = $v['Channel']['id'];
                    $channel_parent[$v['Channel']['id']]['channel_title'] = $v['Channel']['channel_title'];
                }
           }
//           var_dump($channel_parent);

        if(!empty($_GET['pid'])){
            $re=$this->Channel->findAllById(intval($_GET['pid']));
            if(empty($re)){
                    header('location:/');
            }
            $menu =$re[0]['Channel']['parent_id'];
            $this->set('channel_info',$re[0]);
        }
        //联系我们

                $company = $this->Companys->find('first',array('conditions'=>array('Companys.type'=>$type)));

            $this->set('company',$company);
        $this->set('menu',empty($menu)? array():$menu);
        $this->set('pid',empty($_GET['pid'])?0:intval($_GET['pid']));
		   $this->set('type',$type);
           $this->set('channel_parent',$channel_parent);
            $this->set('channel',$channel);

	}
}
