<?php
require_once 'common.php';
$GLOBALS['smarty']->assign('do', 'index');
if($_SESSION['token']!==null){
	$token = $_SESSION['token'];

	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);
     
	$timelines  = $c->home_timeline();

	$GLOBALS['smarty']->assign('timelines', $timelines['statuses']);
	$GLOBALS['smarty']->display('tpl/index.tpl');
}else{
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $c->getAuthorizeURL( WB_CALLBACK_URL );
	header("Location: {$code_url}");
}



