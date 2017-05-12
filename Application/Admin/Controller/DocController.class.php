<?php

namespace Admin\Controller;

use Think\Controller;

class DocController extends CommonController{

	//创建添加用户方法
	public function add(){
		//判断是否提交post数据
		if(IS_POST){
			//接受数据
			$post = I('post.');
			//实例化模型类
			$model = M('doc');

			$post['addtime'] = time();
			//
			$res = $model->add($post);

			if($res){
				//成功
				$this->success('添加用户成功',U('Doc/showList'));
			}else{
				//失败
				$this->error('添加用户失败');
			}


		}else{
			$this->display();
		}
		
	}
	
	//创建展示用户方法
	public function showList(){
		
		//实例化模型类
		$model = M('Doc');

			//查询总记录数
		$count = $model->count();
		//实例化分页
		$page = new \Think\Page($count,1);

		$page ->rollPage=3;
		$page->lastSuffix =false;
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','末页');
		$page->setConfig('first','首页');

		//查询数据
		$data = $model->select();
		
		$show = $page ->show();
		//dump($show);die;
		////展示数据
		$data = $model->limit($page->firstRow,$page->listRows)->select();

		$this->assign('data',$data); 

		$this->assign('show',$show); 
		
		$this->display();
	}



}