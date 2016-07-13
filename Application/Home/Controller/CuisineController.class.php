<?php
// 后台管理控制器

// 实现对后台功能的分类和导航

namespace Home\Controller;
use Think\Controller;
class cuisineController extends AdminCommonController {
    
    // 初始化函数
    public function _initialize(){
        parent::_initialize();
        if(!IS_POST){
            $this->error('页面不存在');
        }
    }

    // 增加一个美食
    public function addcuisine(){
        $name = I('post.name');
        $price = I('post.price');
        $intro = I('post.intro');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
        // 上传单个文件 
        $info   =   $upload->uploadOne($_FILES['img']);

        $path = $info['savepath'].$info['savename'];

        if(!$name || !$price || !$intro || !$path){
            $this->ajaxReturn(array('status'=>2,'msg'=>'内容不完整'),'json');
        }

        

        M('cuisine')->data(array(
            'cuisine_name'=>$name, 
            'cuisine_price' => $price, 
            'cuisine_img' => $path,
            'cuisine_intro' => $intro
            ))->add();

        $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
    }

    // 删除一个美食
    public function delcuisine(){
        $cuisine_id = I('post.cuisine_id');
        
        // 检查cuisine_id 的合法性，虽然很简陋
        if(!$cuisine_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'illegal cuisine id'),'json');
        }
        // 查找当前cuisine_id是否存在
        $cuisine = M('cuisine')->where(array('id' => $cuisine_id))->find();
        if(!$cuisine){
            // 没有与cuisine_id 对应的cuisine 则返回错误
            $this->ajaxReturn(array('status'=>3,'msg'=>'cuisine not exist'),'json');   
        }
        // 删除对应的cuisine信息 
        $cuisine = M('cuisine')->where(array('id'=>$cuisine_id))->delete();
        $this->ajaxReturn(array('status' => 1,'msg'=>''),'json');


    }

    
   
}


