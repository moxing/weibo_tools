<?php
require_once 'common.php';

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	try {
		$token = $c->getAccessToken( 'code', $keys );
	} catch (OAuthException $e) {
		
	}
	if($token){
		$_SESSION['token'] = $token;
		// header("Location: index.php");
		// $uid = $token['uid'];
		// $weibo_token = WeiboToken::find('first',array('conditions' => array('uid=?' => $uid)));
		// if($weibo_token){
		// 	$weibo_token['expires_in'] = $token['expires_in'];
		// 	$weibo_token.save();
		// }else{
		// 	WeiboToken::create($token);
		// }
	}
}


