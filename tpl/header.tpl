<!DOCTYPE html>
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
          <li {if $do=='index'}class="active"{/if}><a href="index.php">最新时间线</a></li>    
          <li {if $do=='backup'}class="active"{/if}><a href="backup.php">我的备份列表</a></li>
        </ul>
        <ul class="nav pull-right">
            <li><a href="option.php"><i class="icon-cog"></i>设置</a></li>
            <li><a href="logout.php"><i class="icon-off"></i>取消授权</a></li>
        </ul>
    </div>
    </div>
  </div>
  <div class="container">