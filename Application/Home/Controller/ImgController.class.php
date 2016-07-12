<?php

// 后台图片管理控制器

// 实现图片的增删改


namespace Home\Controller;
use Think\Controller;
class ImgController extends AdminCommonController {
    // 用户模块初始化函数
    public function _initialize(){
	    parent::_initialize();

        if(!IS_POST){
            $this->error('页面不存在');
        }
	}

    // 上传一张图片
    public function addimg(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
        // 上传单个文件 
        $info   =   $upload->uploadOne($_FILES['img']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
             echo $info['savepath'].$info['savename'];
        }
    }

    // 删除一个图片
    public function delimg(){
    	$img_id = I('post.img_id');
        
        // 检查img_id 的合法性，虽然很简陋
        if(!$img_id){
            $this->ajaxReturn(array('status'=>2,'msg'=>'illegal img id'),'json');
        }
        // 查找当前img_id是否存在
        $img = M('img')->where(array('id' => $img_id))->find();
        if(!$img){
            // 没有与img_id 对应的img 则返回错误
            $this->ajaxReturn(array('status'=>3,'msg'=>'img not exist'),'json');   
        }
        // 删除对应的图片信息 
        $img = M('img')->where(array('id'=>$img_id))->delete();

        // 删除该图片的所有索引
        M('img_display')->where(array('img_id'=>$img_id))->delete();


        $this->ajaxReturn(array('status' => 1),'json');


    }

    


    
}


