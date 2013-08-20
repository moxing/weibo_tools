<?php
require_once 'common.php';
$GLOBALS['smarty']->assign('do', 'index');
if(isset($_SESSION['token'])){
	$token = $_SESSION['token'];
	if(!xcache_isset('timelines')){
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);
		$result  = $c->home_timeline();
		$timelines = $result['statuses'];
		xcache_set("timelines", $timelines,300);
	}else{
		$timelines = xcache_get('timelines');
	}

	$GLOBALS['smarty']->assign('timelines',$timelines);
	$GLOBALS['smarty']->display('tpl/index.tpl');
}else{
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $c->getAuthorizeURL( WB_CALLBACK_URL );
	header("Location: {$code_url}");
}



