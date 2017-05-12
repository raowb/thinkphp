<?php
namespace Admin\Controller;

use Think\Controller;


class KnowledgeController extends Controller{
	//添加知识方法
	public function add(){
		$this->display();
	}
	//列表展示方法
	public function showList(){
		$this->display();
	}
}