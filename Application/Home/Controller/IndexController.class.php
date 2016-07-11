<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // $this->show('hello world!');
    	// $a = 1;
    	// $b = 2;
    	// $c = $a + $b;
    	// echo $c."&nbsp<br>";

    	// M('user')->select();
		$name = 'ThinkPHP';
		$this->assign('name1',$name);

		$this->display("index");
    }

    public function funk(){



    	echo "fuck!";
    }


    public function login(){





        $this->display('login');
    }

    // 登陆逻辑
    public function do_login(){
        var_dump(I('post.'));
        $account = I('post.username');
        $password = I('post.password');

        $data = M('user')->where(array('account'=>$account))->find();

        if($data){
            var_dump($data);
        }else{
            echo "User not found!";
        }
    }

    

    public function logout(){




        
        $this->display('logout');
    }

    // 登出逻辑
    public function do_logout(){
        echo 1;
    }
}