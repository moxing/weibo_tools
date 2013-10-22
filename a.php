<?php
require 'lib/fetchData.php';

header('conten-type:text/html;charset=utf-8');
$does = array(
			'addPdf',
			'delPdf',
			'backup',
			'pic',
			'status',
			'api',
			'update',
	);

$do = in_array($_GET['do'], $does)?$_GET['do']:false;

if( $do === 'addPdf' ){
	$id = strval($_GET['id']);
	$status = Status::find($id);
	if($status->status != 1){
		$status->status = 1;
		$status->save();
	}
	echo json_encode($status->id);
	exit;
}elseif( $do === 'delPdf' ){
	$id = $_GET['id'];
	if( xcache_isset('pdf_list') ){
		$list = xcache_get('pdf_list');
		if(array_key_exists($id, $list)){
			unset($list[$id]);
		}
	}
	echo json_encode(array('msg' => 'delelt success'));
	exit;
}elseif( $do === 'backup' ){
	$o = new WeiboFetch('3681544727');
	$o->startTask();
	echo json_encode(array('msg' => 'start task'));
	// fastcgi_finish_request();
	exit;
}elseif( $do === 'pic' ){	
	$id = $_GET['id'];	
	
	$status = Status::find($id);

	require 'lib/fetchImg.php';
	$img = new fetchImg();
	if($img->downloadImg($status->original_pic)){
		$status->status = 1;
		$status->save();
		echo json_encode(array('pic' => 'success'));
	}
}elseif( $do === 'status' ){	
	$id = $_GET['id'];
	$status = Status::find($id);
	if($status){
		echo json_encode(array('text' => $status->text,'id' => $id));
	}
}elseif( $do === 'api' ){	
	$id = $_GET['id'];
	$o = new WeiboFetch('3681544727');
	$status = $o->getStatus($id);
	if($status){
		echo json_encode($status);
	}
}elseif( $do === 'update' ){	
	$id = $_GET['id'];	
	
	$o = new WeiboFetch('3681544727');
	$status = $o->update($id);
	if($status){
		echo json_encode($status);
	}
}