<?php
namespace Admin\Controller;

use Think\Controller;
//防止翻墙类
class  CommonController extends Controller{
	//Thinkphp提供
	public function _initialize(){
		$id = session('id');
		if(empty($id)){
			$url = U('Public/login');
			echo "<script>top.location.href='$url'</script>";exit;
		}
	}

}