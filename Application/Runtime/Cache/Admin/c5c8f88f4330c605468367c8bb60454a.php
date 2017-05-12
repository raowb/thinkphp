<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/thinkphp/Public/css/base.css" />
<link rel="stylesheet" href="/thinkphp/Public/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('User/edit');?>" method="post">
<div class="main">
	<input type="hidden" name="id" value="<?php echo ($data['id']); ?>"/>
    <p class="short-input ue-clear">
        <label>用户名：</label>
        <input type="text" name="username" value="<?php echo ($data['username']); ?>"/>
    </p>
     <p class="short-input ue-clear">
        <label>密码：</label>
        <input type="text" name="password" value="<?php echo ($data['password']); ?>"/>
    </p>
    <p class="short-input ue-clear">
        <label>姓名：</label>
        <input type="text" name="nickname" value="<?php echo ($data['nickname']); ?>"/>
    </p>
     <p class="short-input ue-clear">
        <label>昵称：</label>
        <input type="text" name="turename" value="<?php echo ($data['turename']); ?>"/>
    </p>
    <p >
        <label>所属部门：</label>
            <select name=dept_id  >
                  <option selected = "selected">请选择</option>
                  <?php if(is_array($dept)): $i = 0; $__LIST__ = $dept;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value= "<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select> 
    </p>
    <p class="short-input ue-clear">
        <label>生日：</label>
            <input type="text"  name="birthday"  value="<?php echo ($data['birthday']); ?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" placeholder="开始时间" />
    </p>
    <p class="short-input ue-clear">
    	<label>联系电话：</label>
        <input type="text" name="tel" value="<?php echo ($data['tel']); ?>"/>
    </p>
     <p class="short-input ue-clear">
        <label>邮箱：</label>
        <input type="text" name="email" value="<?php echo ($data['email']); ?>"/>
    </p>
    <p class="short-input ue-clear">
    	<label>备注：</label>
        <textarea placeholder="请输入内容" name="remark"><?php echo ($data['remark']); ?></textarea>
    </p>
</div>
</form>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm">确定</a>
    <a href="javascript:;" class="clear">清空内容</a>
</div>
</body>
<script type="text/javascript" src="/thinkphp/Public/js/jquery.js"></script>
<script type="text/javascript" src="/thinkphp/Public/js/common.js"></script>
<script type="text/javascript" src="/thinkphp/Public/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});
//设置提交事件
$(function(){
    $('.confirm').on('click',function(){
        $('form').submit();
    });
});
$(function(){
    $('.clear').on('click',function(){
        $('form')[0].reset();
    });
});


showRemind('input[type=text], textarea','placeholder');
</script>
</html>