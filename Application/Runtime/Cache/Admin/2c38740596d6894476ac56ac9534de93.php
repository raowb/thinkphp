<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/thinkphp/Public/css/base.css" />
<link rel="stylesheet" href="/thinkphp/Public/css/info-mgt.css" />
<link rel="stylesheet" href="/thinkphp/Public/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="query">
	
</div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('Doc/add');?>" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">标题</th>
                <th class="process">附件</th>
                <th class="node">作者</th>
                <th class="time"><span>时间</span></th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($vol["id"]); ?></td>
                <td class="name"><?php echo (msubstr($vol["title"],0,5)); ?></td>
                <td class="node"></td>
                <td class="node"><?php echo ($vol["author"]); ?></td>
                <td class="time"><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
                <td class="operate"><a href="javascript:;">查看</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
    <div class="pagin-list"><?php echo ($show); ?></div>
</div>
</body>
<script type="text/javascript" src="/thinkphp/Public/js/jquery.js"></script>
<script type="text/javascript" src="/thinkphp/Public/js/common.js"></script>
<script type="text/javascript" src="/thinkphp/Public/js/WdatePicker.js"></script>
<script type="text/javascript" src="/thinkphp/Public/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

/*$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});*/

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>