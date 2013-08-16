<?php
require_once 'common.php';

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	try {
		$token = $c->getAccessToken( 'code', $keys );
		$_SESSION['token'] = $token;
	} catch (OAuthException $e) {
		
	}
}

var_dump($token);
$uid = $token['uid'];
$weibo_token = WeiboToken::first($uid);
if($weibo_token){
	$weibo_token->access_token = $token['access_token'];
	$weibo_token->expires_in = $token['expires_in'];
}else{
	$weibo_token = new WeiboToken();
	$weibo_token->uid = $token['uid'];
	$weibo_token->access_token = $token['access_token'];
	$weibo_token->expires_in = $token['expires_in'];
}
$weibo_token->save();

header("Location: index.php");
