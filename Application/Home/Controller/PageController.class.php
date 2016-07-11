<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends Controller {
    public function index(){
        // $this->show('hello world!');
    	// $a = 1;
    	// $b = 2;
    	// $c = $a + $b;
    	// echo $c."&nbsp<br>";

    	// M('user')->select();
		
		$this->display("index");
    }

    public function funk(){



    	echo "fuck!";
    }
}