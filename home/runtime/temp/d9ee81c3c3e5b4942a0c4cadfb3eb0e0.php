<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\myphp_www\PHPTutorial\WWW\tpauth\home\index\view\index\sw.html";i:1594292389;}*/ ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息展示页面</title>

<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/style.css" />
<link rel="stylesheet" href="/static/admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body>

<strong id="count"></strong>
 
<div id="target" style="background-color: green"></div>
<!-- <div id="show">
    <div id="show">
       <table>

            <?php foreach($data  as $vo): ?>

            <div  ><?php echo $vo['mes']; ?></div>
   </table>
            
            <?php endforeach; ?>
    
    </div>
</div> -->
    <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                    <tr class="text-c">
                        <th width="40"><input name="" type="checkbox" value=""></th>
                        <th width="40">ID</th>
                        <th width="100">信息</th>
                        <th width="60">发出时间</th>
                  
                    </tr>
                </thead>
                <tbody>

                 <?php foreach($data  as $vo): ?>
                    <tr class="text-c va-m">
                        <td><input name="" type="checkbox" value=""></td>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['mes']; ?></td>
                        <td class="text-l"><?php echo $vo['created_at']; ?></td>
                     
                    </tr>

                 <?php endforeach; ?>
                </tbody>
            </table>




</body>
</html>
<script src="http://cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script src='http://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>
    jQuery(function ($) {
 
        // 连接服务端
        var socket = io('http://www.tpauth.com:2120'); //这里当然填写真实的地址了
        // uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
        uid = 123;
        // socket连接后以uid登录
        socket.on('connect', function () {
            socket.emit('login', uid);
        });
        // 后端推送来消息时
        socket.on('new_msg', function (msg) {
            console.log("收到消息：" + msg);
            $('#target').append('<a href="http://www.baidu.com">'+msg+'</a>').append('<br>');
        });
        // 后端推送来在线数据时
        socket.on('update_online_count', function (online_stat) {
            console.log(online_stat);
            $('#count').html(online_stat);
        });
    })
 
</script>
