<?php
require_once 'common.php';

if($GLOBALS['auth']==true){
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

	$timelines  = $c->home_timeline();
	var_dump($timelines);
	$GLOBALS['smarty']->assign('timelines', $timelines['statuses']);
	$GLOBALS['smarty']->display('tpl/index.tpl');	
}else{
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $c->getAuthorizeURL( WB_CALLBACK_URL );
	header("Location: {$code_url}");
}



// if (isset($_REQUEST['code'])) {
// 	$keys = array();
// 	$keys['code'] = $_REQUEST['code'];
// 	$keys['redirect_uri'] = WB_CALLBACK_URL;
// 	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
// 	try {
// 		$token = $c->getAccessToken( 'code', $keys ) ;
// 		$new_token = new User($token);
// 		$new_token.save();
// 	} catch (OAuthException $e) {
// 	}
// }


