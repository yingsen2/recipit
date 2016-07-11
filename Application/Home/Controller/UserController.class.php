<?php

// 后台用户管理控制器

// 实现与用户账号相关的逻辑

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


    // 登陆逻辑
    public function login(){
    	echo 1;
    }

    // 登出逻辑
    public function logout(){
    	echo 1;
    }
}


