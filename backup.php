<?php
require 'common.php';
$GLOBALS['smarty']->assign('do', 'backup');

$p = isset($_GET['page'])?intval($_GET['page']) : 1;

$offset = ($p-1)*50;

$status_list = Status::find('all',array('limit' => 50, 'offset' => $offset, 'order' => 'status_datetime desc'));

if( $p > 1 ){
	$GLOBALS['smarty']->assign('prev', $p-1);	
}

if( count($status_list)==50 ){
	$GLOBALS['smarty']->assign('next', $p+1);
}

$GLOBALS['smarty']->assign('status_list', $status_list);
$GLOBALS['smarty']->display('tpl/backup.tpl');
