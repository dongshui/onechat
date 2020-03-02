<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// $this->display();
    	$this->success('hi', U('Login/index'), 2);
    }
}