<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 
 */
class OneChatApi2016Controller extends Controller
{
	protected $momentModel;
	protected $userModel;
	protected $commentModel;
	protected $friendRuquestModel;
	protected $friendModel;

	public function __construct()
	{
		parent::__construct();
		$this->momentModel        = D('Moment');
		$this->userModel          = D('User');
		$this->commentModel       = D('Comment');
		$this->friendRuquestModel = D('Friend_request');
		$this->friendModel        = D('Friend');
	}

	public function login($id, $password) {
		$condition['user_name'] = $id;
		$user_name = $this->userModel->getUserName($condition);

		if(!$user_name) { //用户不存在
			return -1;
		} else { //用户存在
			setcookie("user", "id", time() + 60 * 60 * 24 * 7);
			$condition1['user_name'] = $id;
			$condition1['password']  = md5($password);
			$user_name_1 = $this->userModel->getUserName($condition1);
			
			if($user_name_1) {
				setcookie("password", "$password", "/Home/Login", "OneChat.classmateer.com");
				session_start();
				$_SESSION['name'] = $user_name_1;
				return 0;
			}else {
				return -2;
			}
		}
	}

	public function register($id, $password) {
		$condition['user_name'] = $id;
		$user_name = $this->userModel->getUserName($condition);
		if($user_name) { //账号已存在
			return -1;
		} else {
			$data['user_name'] = $id;
			$data['password'] = md5($password);
			$data['register_time'] = date("Y-m-d H:i:s");
			$this->userModel->addUser($data);

			$tmp_arr['id'] = $id;
			$user_id = $this->userModel->getUserId($tmp_arr);

			//注册时自动添加自己为好友
			$tmp_arr = [];
			$tmp_arr['user_id'] = $user_id;
			$tmp_arr['friend_id'] = $user_id;
			$tmp_arr['time']      = date("Y-m-d H:i:s");
			$this->friendModel->addFriend($tmp_arr);
			return 0;
		}
	}

	public function getUserId($reply_name, $replyed_name)
    {
        $condition['u1.user_name'] = $reply_name;
        $condition['u2.user_name'] = $replyed_name;
        $result = $this->userModel->getUserIdViaUserName($condition);
        return $result;
    }

	public function tranTime($time)
    {
        $rtime = date("M j, Y H:i", $time);
        $time  = time() - $time;
        if ($time < 60 * 2) {
            $str = '1 min ago ';
        } elseif ($time < 60 * 60) {
            $min = floor($time / 60);
            $str = $min . ' mins ago ';
        } elseif ($time < 60 * 60 * 24) {
            $h = floor($time / (60 * 60));
            if ($h == 1) {
                $str = '1 hour ago ';
            } else {
                $str = $h . ' hours ago ';
            }

        } elseif ($time < 60 * 60 * 24 * 7) {
            $d = floor($time / (60 * 60 * 24));
            if ($d == 1) {
                $str = 'yesterday ';
            } else {
                $str = $d . ' day(s) ago ';
            }

        } else {
            $str = $rtime;
        }
        return $str;
    }


}