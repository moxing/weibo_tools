<?php
require 'common.php';
$GLOBALS['smarty']->assign('do', 'backup');

$status_list = Status::find('all',array('limit' => 50,'order' => 'status_datetime desc'));

$GLOBALS['smarty']->assign('status_list', $status_list);
$GLOBALS['smarty']->display('tpl/backup.tpl');
