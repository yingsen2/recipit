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
        // var_dump(I('post.'));
        $account = I('post.username');
        $password = I('post.password');

        $data = M('user')->where(array('account'=>$account))->find();

        if($data){
            // var_dump($data);
            session('user_id',$data['id']);
            $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
        }else{
            $this->ajaxReturn(array('status'=>2,'msg'=>'User not found!'),'json');
        }
    }

    

    public function logout(){




        
        $this->display('logout');
    }

    // 登出逻辑
    public function do_logout(){
        session(null);
    }





    // 发布评论
    public function mkcomment(){
        $name = I('post.name');
        $content = I('post.content');
        $time = time();
        $user_id = 0;
        $blog_id = 0;

        if(!$name || !$content){
            $this->ajaxReturn(array('status'=>2,'msg'=>'内容不完整'),'json');
        }

        

        M('comment')->data(array(
            'name'=>$name, 
            'content' => $content, 
            'time' => $time,
            'user_id' => $user_id,
            'blog_id' => $blog_id
            ))->add();

        $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');


        /* 
        //备用

        $data = M('comment')->where(array('blog_id'=>0))->select();
        foreach($data as $key=>$value){
            $data[$key]['time'] = date('Y-m-d H:i:s', $value['time']); 
        }
        $this->assign('comment_list',$data);
        $this->display();


        <foreach name="list" item="vo">
            {$vo.name}
            {$vo.time}
            {$vo.content}
        </foreach>

        */


    }
}