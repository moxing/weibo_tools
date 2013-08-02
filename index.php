<?php
require_once 'common.php';

if($_SESSION['token']!==null){
	$token = $_SESSION['token'];
	$uid = $token['uid'];

	$weibo_token = WeiboToken::find(array('conditions' => array('uid = ?', $uid)));
	$weibo_token->access_token = $token['access_token'];
	$weibo_token->expires_in = $token['expires_in'];
	$weibo_token->save();
	$t = WeiboToken::first();
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $t->access_token);
     
	$timelines  = $c->home_timeline();
	$GLOBALS['smarty']->assign('timelines', $timelines['statuses']);
	$GLOBALS['smarty']->display('tpl/index.tpl');
}else{
	$c = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $c->getAuthorizeURL( WB_CALLBACK_URL );
	header("Location: {$code_url}");
}



