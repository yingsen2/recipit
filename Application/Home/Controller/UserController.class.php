<?php

// 后台用户管理控制器

// 实现与用户账号相关的逻辑

// create table user(
// `id` int(11) not null auto_increment primary key,
// `account` varchar(48) not null,
// `password` varchar(48) not null,
// 
// `name` varchar(48) not null
// 
// )engine=myisam default charset=utf8;


namespace Home\Controller;
use Think\Controller;
class UserController extends AdminCommonController {
    // 用户模块初始化函数
    public function _initialize(){
	    parent::_initialize();
	}

    // 用户管理首页
    public function index(){
    	echo 1;
    }

    // 增加一个用户
    public function adduser(){
    	echo 1;
    }

    // 删除一个用户
    public function deluser(){
    	echo 1;
    }

    // 更改密码
    public function chgpsw(){
    	echo 1;
    }

    // 更改名字
    public function chgname(){
    	echo 1;
    }


    
}


