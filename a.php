<?php
$does = array(
			'addPdf',
			'delPdf',
			'backup',
			'pic',
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
}

if( $do === 'delPdf' ){
	$id = $_GET['id'];
	if( xcache_isset('pdf_list') ){
		$list = xcache_get('pdf_list');
		if(array_key_exists($id, $list)){
			unset($list[$id]);
		}
	}
	echo json_encode(array('msg' => 'delelt success'));
	exit;
}

if( $do === 'backup' ){
	require '/lib/fetchData.php';
	$o = new WeiboFetch('3681544727');
	$o->startTask();	
	echo json_encode(array('msg' => 'start task'));
	// fastcgi_finish_request();
	exit;
}

if( $do === 'pic' ){	
	$id = $_GET['id'];	
	require '/lib/common.php';
	$status = Status::find($id);

	require '/lib/fetchImg.php';
	$img = new fetchImg();
	if($img->downloadImg($status->original_pic)){
		$status->status = 1;
		$status->save();
		echo json_encode(array('pic' => 'success'));
	}
	
	// fastcgi_finish_request();
	// exit;
}