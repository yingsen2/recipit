<?php
namespace Home\Controller;
use Think\Controller;
class AdminiController extends Controller {
    
    // 初始化函数
    public function _initialize();

    // 登陆逻辑
    public function login();

    // 登出逻辑
    public function logout();

}



public function AdminiController::_initialize(){
    $user_id = check_login_status();
    if($user_id == 0){
        $this->redirect('index/login');
    }
}
