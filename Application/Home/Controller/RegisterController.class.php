<?php
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller
{
	public function index() {
		$id = trim($_POST['id']);
		$password         = trim($_POST['password']);
		$text_placeholder = "新的账号";
		$userid = null;

		if($id != null && $password != null) {
			$obj = new OneChatApi2016Controller();
			$result = $obj -> register($id, $password);

			if(!$result) {
				echo "<script>window.alert('注册成功,现在登录>>');window.location.href='../Login/';</script>";
			} else {
				$text_placeholder = "该账号已存在";
			}
		}

		$array['text_placeholder'] = $text_placeholder;
		$this->assign($array);
		$this->display();
	}
}