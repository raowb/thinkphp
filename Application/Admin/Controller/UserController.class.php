<?php

namespace Admin\Controller;

use Think\Controller;

class UserController extends CommonController{

	//创建添加用户方法
	public function add(){
		//判断是否提交数据
		if(IS_POST){
			//接受post数据
			$post = I('post.');
			//实例化模型类
			$model = M('User');

			$post['addtime'] =time();

			$res = $model->add($post);

			if($res){
				//成功
				$this->success('添加用户成功',U('User/showList'));
			}else{
				//失败
				$this->error('添加用户失败');
			}

		}else{
			
			//实例化模型类
			$model = M('Dept');
			//查询部门列表
			$data = $model->select();
			//传参向页面
			$this->assign('data',$data);
			$this->display();
		}
		
	}
	
	//创建展示用户方法
	public function showList(){
		//实例化模型类
		$model = M('User');

			//查询总记录数
		$count = $model->count();
		//实例化分页
		$page = new \Think\Page($count,2);

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
	//统计方法

	public function total(){
		//实例化模型类
		$model =M();
		//连贯操作
		//$data = $model->
		$data = $model->field('t2.name,count(*) total')->table('so_user t1,so_dept t2')->where('t1.dept_id = t2.id')->group('t2.name')->select();
		//dump($data);die;
		//echo $data;
		$str = '[';
		foreach ($data as $key => $value) {
			$str.= "['".$value['name']."',".$value['total']."],";
		}
		$str = rtrim($str,',').']';
		//dump($str);die;
		//echo $str;
		$this->assign('str',$str);
		$this->display();
	}
	//	修改方法
	public function edit(){
		//判断是否post提交数据
		if(IS_POST){
			//接受post数据
			$post = I('post.');
			//实例化模型类
			$model = M('User');


			$res = $model->save($post);

			if($res){
				//成功
				$this->success('修改用户成功',U('User/showList'));
			}else{
				//失败
				$this->error('修改用户失败');
			}
		}else{
				//接受GET数据
			$id = I('get.id');
			//实例化模型类
			$model = M('User');
			//$model = M();
			//根据id查询数据
			$data = $model->find($id);
			//$data =$model->field('t1.*,t2.name deptname')->table('so_user t1,so_dept t2')->where('t1.id=5 and t1.dept_id=t2.pid')->group('deptname')->select();
			//dump($data);
			//select * from so_user t1,so_dept t2 where t1.id=6 and t1.dept_id=t2.pid
			$model1 = M('Dept');
			$dept =$model1->select();
			//向页面展示数据
			//dump($data);
			//echo $data[0]['nickname'];
			$this->assign('data',$data);
			$this->assign('dept',$dept);

			$this->display();
		}
	
	}

	public function test(){
		    $model = M();
			//根据id查询数据
			//$data = $model->find($id);
			$data =$model->field('t1.*,t2.name deptname')->table('so_user t1,so_dept t2')->where('t1.dept_id=t2.pid AND t1.id=4')->group('deptname')->select();
			dump($data);
	}

}