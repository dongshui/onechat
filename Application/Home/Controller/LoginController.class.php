<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller
{
	public function Index()
	{
		//判断是否已经登录
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) {
			$this->redirect('Moments/index');
			return;
		}

		$id                = null;
		$temp_id          = null; //存放cookie获取的id
		$temp_password    = null; //存放cookie获取的id 
		$password         = null; 
		$text_placeholder = "name";
		$pw_placeholder   = "password";	
		$head_image       = "default_head.jpg"; //默认头像

		//获取cookie
		if(isset($_COOKIE['user'])) {
			$temp_id = $_COOKIE["user"];
		}
		if(isset($_COOKIE['password'])) {
			$temp_password = $_COOKIE["password"];
		}

		$id = trim($_POST['id']);
		if($password == null) {
			$password = $temp_password;
		}
		$password = trim($_POST['password']);
		if ($password == null) {
            $password = $temp_password;
        }

        if($id != null && $password != null) {
        	$obj    = new OneChatApi2016Controller();
        	$result = $obj->login($id, $password);
        	if($result = -1) { //用户名不存在
        		$id = null;
        		$password = null;
        		$text_placeholder = '该用户不存在';
        	}elseif ($result = -2) { //密码错误
        		$password = null;
        		$pw_placeholder = '密码错误';
        	}elseif (!$result) { //登录成功
        		$this->redirect('Moment\index');
        		return;
        	}
        }

        if($id != null) {
        	$condition2['user_name'] = $id;
        	$avatar = D('User')->getUserAvatar[$condition2];
        	if($avatar) {
        		$head_image = $avatar;
        	}
        }

		$array['head_image']       = $head_image;
        $this->assign($array); //模板赋值
		$this->display();
	}
}