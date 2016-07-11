<?php 

// 检查登陆状态
function check_login_status(){
	if(session('user_id')){
		return session('user_id');
	}else{
		return 0;
	}
}



?>