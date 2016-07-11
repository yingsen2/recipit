<?php
// 后台入口前置控制器

// 对登陆状态进行判断

namespace Home\Controller;
use Think\Controller;
class AdminCommonController extends Controller {
    
    // 初始化函数
    public function _initialize(){
	    $user_id = check_login_status();
	    if($user_id == 0){
	        $this->redirect('index/login');
	    }
	}


}


