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
        
        $name = trim(I('post.name'));
        $price = I('post.price')?I('post.price'):0;
        $intro = I('post.intro');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/'; // 设置附件上传根目录
        $upload->autoSub   = false;
        $upload->savePath  =     ''; // 设置附件上传（子）目录

        // 上传单个文件 
        

        if(!$name || !$intro){
            // $this->ajaxReturn(array('status'=>2,'msg'=>'内容不完整'),'json');
            echo "内容不完整";return;
        }

        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }

        $path = $info['img_file']['savepath'].$info['img_file']['savename'];

        


        $sql = "select * from cuisine where cuisine_name='".$name."'";
        $cuisine = M()->query($sql);
        if($cuisine){
            // $this->ajaxReturn(array('status'=>3,'msg'=>'存在相同名字的菜'),'json');
            echo "存在相同名字的菜";
            return;
        }

        M('cuisine')->data(array(
            'cuisine_name'=>$name, 
            'cuisine_price' => $price, 
            'cuisine_img' => $path,
            'cuisine_intro' => $intro
            ))->add();


        // $this->ajaxReturn(array('status'=>1,'msg'=>'success'),'json');
        echo "上传成功";
        return;
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
    public function showcuisine(){
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
        // 更改对应的cuisine信息 
        $cuisine = M('cuisine')->where(array('id'=>$cuisine_id))->save(array('is_show' => 1));
        $this->ajaxReturn(array('status' => 1,'msg'=>''),'json');
    }


    public function notshowcuisine(){
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
        // 更改对应的cuisine信息 
        $cuisine = M('cuisine')->where(array('id'=>$cuisine_id))->save(array('is_show' => 0));
        $this->ajaxReturn(array('status' => 1,'msg'=>''),'json');
    }

    
   
}


