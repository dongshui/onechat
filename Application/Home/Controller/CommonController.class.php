<?php 
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
	protected $obj;
    protected $momentModel;
    protected $userModel;
    protected $commentModel;
    protected $friendRuquestModel;
    protected $friendModel;

    public function __construct()
    {
        parent::__construct();
        $this->obj                = new OneChatApi2016Controller();
        $this->momentModel        = D('Moment');
        $this->userModel          = D('User');
        $this->commentModel       = D('comment');
        $this->friendRuquestModel = D("Friend_request");
        $this->friendModel        = D("Friend");
    }
}