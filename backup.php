<?php
require './lib/common.php';
$GLOBALS['smarty']->assign('do', 'backup');

$p = isset($_GET['page'])?intval($_GET['page']) : 1;

$offset = ($p-1)*50;

$status_list = Status::find('all',array('limit' => 50, 'offset' => $offset, 'order' => 'status_datetime desc'));

$list = array();
foreach ($status_list as $key => $s) {	
	$status = array();
	$status['text'] = $s->text;
	$status['id'] = $s->id;
	$status['datetime'] = $s->status_datetime->format('Y-m-d H:i:s');
	$status['status'] = $s->status;
	if(isset($s->thumbnail_pic)){
		$status['thumbnail_pic'] = $s->thumbnail_pic;
		$status['bmiddle_pic']	= $s->bmiddle_pic;
	}
	if($s->ori_status!=null){
		$ori_status = array();
		$ori_status['text'] = $s->ori_status->text;
		$ori_status['id'] = $s->ori_status->id;
		$ori_status['datetime'] = $s->ori_status->status_datetime->format('Y-m-d H:i:s');
		$ori_status['status'] = $s->ori_status->status;
		if(isset($s->ori_status->thumbnail_pic)){
			$ori_status['thumbnail_pic'] = $s->ori_status->thumbnail_pic;
			$ori_status['bmiddle_pic']	= $s->ori_status->bmiddle_pic;
		}
		$status['ori_status'] = $ori_status;
	}
	$list[] = $status;
}

if( $p > 1 ){
	$GLOBALS['smarty']->assign('prev', $p-1);	
}

if( count($status_list)==50 ){
	$GLOBALS['smarty']->assign('next', $p+1);
}


$GLOBALS['smarty']->assign('status_list', $list);

$GLOBALS['smarty']->display('tpl/backup.tpl');
