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

        if(!IS_POST){
            $this->error('页面不存在');
        }
	}

    // 用户管理首页
    public function index(){
    	echo 1;
    }

    // 增加一个用户
    public function adduser(){
        $username = I('post.account');
        $password = I('post.password');
        $name = I('post.name');
    	

        $user = M('user')->where(array('account'=>$username))->find();
        if($user){
            // $this->ajaxReturn(array('status'=>2,'msg'=>'username already exist, user id is '.$user['id']),'json');
            echo 'username already exist, user id is '.$user['id'];
            return;
        }

        M('user')->data(array(
                'account' => $username,
                'password' => $password,
                'name' => $name
            ))->add();

        // $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
        echo 'success!';
    }

    // 删除一个用户
    public function deluser(){
    	$user_id = I('post.user_id');
        
        // 检查user_id 的合法性，虽然很简陋
        if(!$user_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'illegal user id'),'json');
        }
        // 查找当前user_id是否存在
        $user = M('user')->where(array('id' => $user_id))->find();
        if(!$user){
            // 没有与user_id 对应的user 则返回错误
            $this->ajaxReturn(array('status'=>3,'msg'=>'user not exist'),'json');   
        }
        // 删除对应的账户信息 
        $user = M('user')->where(array('id'=>$user_id))->delete();
        $this->ajaxReturn(array('status' => 1),'json');


    }

    // 更改密码
    public function chgpsw(){
        $password1 = I('post.password1');
        $password2 = I('post.password2');
        $password_old = I('post.password_old');
        $user_id = I('post.user_id');


        if(!$password2 || !$password1 || !$password_old || !$user_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'信息不完整'),'json');
        }

        if($password1 != $password2){
            $this->ajaxReturn(array('status'=>3,'msg'=>'密码不一致'));
        }

        $user = M('user')->where(array('id'=>$user_id, 'password' => $password_old))->find();
        if(!$user){
            $this->ajaxReturn(array('status'=>4,'msg'=>'密码不正确'),'json');
        }

        M('user')->where(array('id'=>$user_id))->save(array('password'=>$password2));

        $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
    }

    // 更改名字
    public function chgname(){
    	$name = I('post.name');
        $user_id = I('post.user_id');


        if(!$name || !$user_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'信息不完整'),'json');
        }

        $user = M('user')->where(array('id'=>$user_id))->find();
        if(!$user){
            $this->ajaxReturn(array('status'=>4,'msg'=>'不存在该用户'),'json');
        }

        M('user')->where(array('id'=>$user_id))->save(array('name'=>$name));

        $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
    }


    
}


