<?php
// 后台管理控制器

// 实现对后台功能的分类和导航

namespace Home\Controller;
use Think\Controller;
class AdminController extends AdminCommonController {
    
    // 初始化函数
    public function _initialize(){
        parent::_initialize();
    }

    // 后台首页
    public function index(){
        $this->display("index");
    }

    // 用户管理首页
    public function user(){
        echo 1;
    }
}


