<?php
// 后台管理控制器

// 实现对后台功能的分类和导航

namespace Home\Controller;
use Think\Controller;
class CommentController extends AdminCommonController {
    
    // 初始化函数
    public function _initialize(){
        parent::_initialize();
        if(!IS_POST){
            $this->error('页面不存在');
        }
    }

    // 增加一个评论
    public function addcomment(){
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
    }

    // 删除一个评论
    public function delcomment(){
        $comment_id = I('post.comment_id');
        
        // 检查comment_id 的合法性，虽然很简陋
        if(!$comment_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'illegal comment id'),'json');
        }
        // 查找当前comment_id是否存在
        $comment = M('comment')->where(array('id' => $comment_id))->find();
        if(!$comment){
            // 没有与comment_id 对应的comment 则返回错误
            $this->ajaxReturn(array('status'=>3,'msg'=>'comment not exist'),'json');   
        }
        // 删除对应的留言信息 
        $comment = M('comment')->where(array('id'=>$comment_id))->delete();
        $this->ajaxReturn(array('status' => 1,'msg'=>''),'json');


    }

    
   
}


