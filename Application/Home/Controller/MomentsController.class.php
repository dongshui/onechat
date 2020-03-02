<?php
namespace Home\Controller;
use Think\Controller;

class MomentsController extends CommonController
{
	public function Index() {
		session_start();
		$user_name = $_SESSION['name'];
		$map['user_name'] = $user_name;
		$avatar           = $this->userModel->getUserAvatar($map);
		$list = $this->momentModel->getMoments();

		foreach ($list as $key => &$value) {
			$value['user_name'] = htmlspecialchars($value['user_name']);
			$value['time']      = $this->obj->tranTime(strtotime($value['time']));
			$value['info']      = htmlspecialchars($value['info']);
		}

		$this->assign('list', $list);
        $this->assign('avatar', $avatar);
        $this->assign('my_name', $user_name);
		$this ->display();
	}

	public function searchUser() {
		$search_name      = htmlspecialchars($_REQUEST['search_name']);
		$user_name        = $_SESSION['name'];
		$list             = $this->userModel->searchUser($map);

		$list['is_friend'] = 0; //0代表不是好友关系
		foreach ($this->obj->getUserId($user_name, $search_name) as $k => $val) {
			$map1['user_id']   = $user_id;
            $map1['friend_id'] = $friend_id;
            $result            = $this->friendModel->where($map1)->find();
            if ($result) {
                $list['is_friend'] = 1; //是好友关系
            }
		}

		echo json_encode($list);
	}

	public function loadNews() {
		$user_name            = $_SESSION["name"];
		$map['user_name']     = $user_name;
		$user_id              = $this->userModel->getUserId($map);
		$list                 = $this->momentModel->getNews($user_id);
		$map1['requested_id'] = $user_id;
		$map1['state']        = 1;
		$result               = $this->friendRuquestModel->getFriendRequest($map1);
		$num                  = count($list) + count($result);
		echo json_encode(array("number" => $num));
	}
}