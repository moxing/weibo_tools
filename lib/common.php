<?php
	define('SYSROOT',__DIR__);

	require SYSROOT .'/weibo-sdk/config.php';
	require SYSROOT .'/weibo-sdk/saetv2.ex.class.php';

	date_default_timezone_set("PRC");
	require SYSROOT . '/smarty/Smarty.class.php';
    $GLOBALS['smarty'] = new Smarty();
 	require SYSROOT . '/activerecord/ActiveRecord.php';
	$cfg = ActiveRecord\Config::instance();
	$cfg->set_model_directory(SYSROOT.'./../models');
	$cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/wbt;charset=utf8'));

	session_start();

	function filter_url($text){
		return preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
	}



