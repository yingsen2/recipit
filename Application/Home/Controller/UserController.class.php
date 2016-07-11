<?php

// 后台用户管理控制器

// 实现与用户账号相关的逻辑

namespace Home\Controller;
use Think\Controller;
class UserController extends AdminCommonController {
    // 用户模块初始化函数
    public function _initialize();

    // 用户管理首页
    public function index();

    // 增加一个用户
    public function adduser();

    // 删除一个用户
    public function deluser();

    // 更改密码
    public function chgpsw();

    // 更改名字
    public function chgname();


    // 登陆逻辑
    public function login();

    // 登出逻辑
    public function logout();
}



public function UserController::_initialize(){
    parent::_initialize();
}