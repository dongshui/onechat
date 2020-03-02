<?php 
namespace Home\Model;
use Think\Model;

class FriendRequestModel extends Model
{
	public function getFriendRequest($map)
    {
        return $this->where($map)->select();
    }
}
