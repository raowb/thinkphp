<?php
namespace Admin\Controller;
use Think\Controller;

class EmailController extends Controller{
	//发送方法
	public function send(){
		$this->display();
	}
	//接受方法
	public function receive(){
		$this->display();
	}
}