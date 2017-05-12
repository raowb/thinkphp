<?php
namespace Home\Controller;

use Think\Controller;

class DeptController extends Controller {
   //展示实例化的结果
	public function test(){
		//普通实例化方法
		//$model = new \Home\Model\DeptModel();
		//$model = D('Dept');
		//$model = D();
		//$model = M('Dept');
		$model = M();
		dump($model);
	}

	//添加方法
	public function add(){
		//实例化方法
		$model = M('Dept');
		//添加数据
		//$data = array('name'=>'人事部','pid'=>'0','sort'=>'1','remark'=>'人事部门');
		$data = ['name'=>'财务部','pid'=>'0','sort'=>'3','remark'=>'财务部门1'];

		//添加方法
		$res = $model->add($data);	

		dump($res);
	}
	//查询方法
	public function select(){
		//实例化方法
		$model = M('Dept');

		//查询方法
		//$res = $model->select();
		$res = $model->select(1);

		//echo $model->getLastSql();
		echo $model->_sql();

		dump($res);
	}
	//更新方法
	public function update(){
		$model = M('Dept');
		//$data['id'] = 3;
		$data['name'] = 'ThinkPHP1';
		$res=$model->where('id=3')->save($data);
		dump($data);
	}
	//删除方法
	public function delete(){
		$model = M('Dept');
		$res=$model->where('id=3')->delete();
	}

	//ar添加方法
	public function aradd(){
		$model = M('Dept');
		//赋值
		$model->name ='技术部';
		$model->pid=0;
		$model->sort=3;
		$model->remark='avcdd';
		$model->add();

	}
	//ar更新方法
	public function arupdate(){
		$model = M('Dept');
		$model->find(4);
		$model->name='jsdf';
		$model->save();


	}
	//ar删除方法
	public function ardelete(){
		$model = M('Dept');
		$model->find(4);
		$model->delete();

	}
}