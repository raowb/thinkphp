<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller {
    public function login(){
    	//跳转登录页面
    	$this->display();
    }
}