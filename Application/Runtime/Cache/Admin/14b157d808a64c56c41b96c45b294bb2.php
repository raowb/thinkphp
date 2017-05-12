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
<form action="<?php echo U('Doc/add');?>" method="post" enctype="multipart/form-data">
<div class="main">
	
    <p class="short-input ue-clear">
        <label>标题：</label>
        <input type="text" name="title"/>
    </p>
    <p  class="short-input ue-clear">
        <label>附件：</label>
         <input type="file" name="file"/>  
    </p>
    <p class="short-input ue-clear">
    	<label>作者：</label>
        <input type="text" name="author"/>
    </p>
    <p class="short-input ue-clear">
    	<label>内容：</label>
        <textarea placeholder="请输入内容" name="content"></textarea>
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