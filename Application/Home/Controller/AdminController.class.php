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
        $user_list = M('user')->select();
        $this->assign('user_list',$user_list);
        $this->display();
    }

    // 图片管理
    public function img(){
        $img_list = M('img')->where(array('type' => 1))->select();
        $this->assign('img_list', $img_list);
        $this->display();
    }

    // 评论管理
    public function comment(){
        $comment = M('comment')->select();
        foreach($data as $key=>$value){
            $data[$key]['time'] = date('Y-m-d H:i:s', $value['time']); 
        }
        $this->assign('comment_list',$data);
    }
}


