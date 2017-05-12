<?php

namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller{
	//登录方法
	public function login(){

		$this->display();

	}
	//输出验证码方法
	public function captcha(){
		//向验证码类传递参数
		$cfg  =	array(
				'fontSize'  =>  14,              // 验证码字体大小(px)
				'useCurve'  =>  false,            // 是否画混淆曲线
        		'useNoise'  =>  false,            // 是否添加杂点		
		        'imageH'    =>  0,               // 验证码图片高度
		        'imageW'    =>  100,               // 验证码图片宽度
		        'length'    =>  4,               // 验证码位数
		        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
			);
		//实例化验证码类
		$captcha = new \Think\Verify($cfg);
		//输出验证码
		$captcha->entry();
	}
	//用户登录校验方法
	public function checkLogin(){
		//接受post参数
		$post = I ('post.');
		//实例化验证码类
		$captcha = new \Think\Verify();
		//使用check方法验证
		$res = $captcha->check($post['captcha']);
		//判断验证码是否正确
		if($res){
			$model = M('User');
			unset($post['captcha']);
			//查询数据
			$data = $model->where($post)->find();
			
			//校验用户名密码是否正确
			if($data){
				//session 持久化数据
				session('id',$data['id']);
				//dump($post);

				//echo session('id');exit;
				session('username',$post['username']);
				session('role_id',$data['role_id']);
				//跳转成功页面
				$this->success('登录成功',U('Index/index'),3);
				//$this->success('登录成功',U('Common'));

			}else{
				$this->error('用户名密码不正确');
			}

		}else{
			//验证码不正确
			$this->error('验证码不正确');
		}
		
	}
	//退出系统方法
	public function loginout(){
		//删除session
		session(null);
		$this->success('登录成功',U('login'));
	}

}