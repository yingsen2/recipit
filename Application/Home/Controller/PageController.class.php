<?php
// this is home page!
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
        $cuisine = M('cuisine')->where(array('is_show'=>1))->limit(4)->select();
        $this->assign('cuisine_list',$cuisine);
		
		$this->display("index");
    }

    public function contact(){


        $data = M('comment')->select();
        foreach($data as $key=>$value){
            $data[$key]['time'] = date('Y-m-d H:i:s', $value['time']); 
        }
        $this->assign('comment_list',$data);
        $this->display();

    }

    public function recent(){
       
        $cuisine = M('cuisine')->select();
        $this->assign('cuisine_list',$cuisine);
        
        $this->display("recent");
    }

}