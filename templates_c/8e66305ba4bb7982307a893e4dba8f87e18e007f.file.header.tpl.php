<?php /* Smarty version Smarty-3.1.13, created on 2013-08-01 12:27:23
         compiled from "tpl\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2642651f762ac989680-32732138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e66305ba4bb7982307a893e4dba8f87e18e007f' => 
    array (
      0 => 'tpl\\header.tpl',
      1 => 1375331232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2642651f762ac989680-32732138',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f762ac9c6718_30964399',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f762ac9c6718_30964399')) {function content_51f762ac9c6718_30964399($_smarty_tpl) {?><!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="assets/javascript/all.js"></script>    
    <link href="assets/stylesheets/default.css" rel="stylesheet">
	<title>微博备份</title>
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner navbar-static-top">
    <div class="container">
        <ul class="nav">
          <li><a href="index.php">最新时间线</a></li>    
          <li><a href="backup.php">我的备份列表</a></li>
        </ul>
        <ul class="nav pull-right">
            <li><a href="option.php"><i class="icon-cog"></i>设置</a></li>
            <li><a href="logout.php"><i class="icon-off"></i>取消授权</a></li>
        </ul>
    </div>
    </div>
  </div>
  <div class="container"><?php }} ?>