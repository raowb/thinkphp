<?php

namespace Admin\Controller;

use Think\Controller;

class DeptController extends CommonController{

	//创建添加部门方法
	public function add(){
		//判断是否提交数据
		if(IS_POST){
			//接受post数据
			$post = I('post.');
			$model = M('Dept');
			$res=$model->add($post);
			if($res){
				$this->success('添加成功',U('showList'));
			}else{
				$this->error('添加失败');
			}

		}else{
			//dump($post);exit;
			$model = M('Dept');
			//查询数据
			$data = $model->where('pid=0')->select();
			//展示数据
			$this->assign('data',$data);

			$this->display();


		}	
	}
	
	//创建展示部门方法
	public function showList(){
		$model = M('Dept');
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
		$data = $model->order('sort asc')->select();
		
		//实例化模型
		//$model = M();
		//$sql="select t1.*,t2.name deptname from so_dept t1,so_dept t2 where t1.id=t2.pid";
		//$data=$model->query($sql);
		//dump($data);die;
		//使用show方法生成url
		$show = $page ->show();
		//dump($show);die;
		////展示数据
		$data = $model->limit($page->firstRow,$page->listRows)->select();
		//二次遍历查询一级部门
		foreach ($data as $key => $value) {
			if($value['pid']>0){
				//查询pid对应的部门信息
				$info = $model->find($value['pid']);
				//只需保存其中的name
				$data[$key]['deptname'] = $info['name'];
			}
		}
		//展示数据
		$this->assign('show',$show);
		$this->assign('data',$data);
		
		$this->display();
	}

	//统计方法

	public function total(){
		$this->display();
	}



}