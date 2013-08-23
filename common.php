<?php
	define('SYSROOT',__DIR__);

	require SYSROOT .'/lib/weibo-sdk/config.php';
	require SYSROOT .'/lib/weibo-sdk/saetv2.ex.class.php';

	date_default_timezone_set("PRC");
	require SYSROOT . '/lib/smarty/Smarty.class.php';
    $GLOBALS['smarty'] = new Smarty();
 	require SYSROOT . '/lib/activerecord/ActiveRecord.php';
	$cfg = ActiveRecord\Config::instance();
	$cfg->set_model_directory('models');
	$cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/wbt;charset=utf8'));

	session_start();

	// function get_post_var($var)
	// {
	// 	$val = $_POST[$var];
	// 	if (get_magic_quotes_gpc())
	// 		$val = stripslashes($val);
	// 	return $val;
	// }

	// function msg($msg,$type=0){
	// 	$GLOBALS;
	// 	$GLOBALS['smarty']->assign('message',$msg);
	// 	$GLOBALS['smarty']->display('tpl/msg.tpl');
	// 	exit;
	// }

