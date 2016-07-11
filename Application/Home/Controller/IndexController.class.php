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





        this->display('login');
    }

    public function logout(){




        
        this->display('logout');
    }
}