<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2018/4/28
 * Time: 10:20
 */
class Post extends AppModel
{
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );
}