<?php
require 'common.php';

class WeiboFetch
{
	private $client;

	private $contiune_fetch = false;

	private $task;

	private $token;

    public function __construct() {
        $this->token = WeiboToken::first();
        $this->client = new SaeTClientV2( WB_AKEY , WB_SKEY , $this->token->access_token);
    }

    public function getPosition(){
    	$result = $this->client->home_timeline( 1, 1, 0, 0, 0, 0, 1 );
    	if(isset($result['error_code'])){
    		echo "error_code:".$result['error_code']."	error:".$reuslt['error'];
    	}else{
    		echo number_format($result['next_cursor'],0,'.','');

    	}
    }

	public function addStatus($s){
		$status_id = $s['idstr'];

		$st = Status::find('first',array('conditions' => array('id = ?', $status_id)));
		
		if($st!=null){
			return;
		}

		if( isset($s['deleted']) ){
			return;
		}

		$status = new Status();

		echo "add new status \n";

		$status->uid = $s['uid'];
		if($s['text']!==null){
			$status->text = $s['text']; 
		}
		$status->id = $status_id;
		if(isset($s['thumbnail_pic'])){
			$status->thumbnail_pic = $s['thumbnail_pic']; 
		}
		if(isset($s['bmiddle_pic'])){
			$status->bmiddle_pic = $s['bmiddle_pic']; 
		}
		if(isset($s['original_pic'])){
			$status->original_pic = $s['original_pic']; 
		}
		if(isset($s['pic_urls'])){
			$status->pic_urls = json_encode($s['pic_urls']); 
		}
	    $status->status_datetime = new DateTime($s['created_at']);
	    if(isset($s['retweeted_status'])){
	    	$ori_status = $this->addStatus($s['retweeted_status']);
	    	$status->ori_id = $s['retweeted_status']['idstr'];
	    }
		$status->save();
		return $status;
	}

	private function addUser($user){
		$uid = $user['idstr'];
		$wb_user = User::find('first',array('conditions' => array('uid = ?', $uid)));
		if($wb_user != null){
			return;
		}
		$wb_user = new User();
		$wb_user->uid = $uid;
		$wb_user->name = $user['name'];
		$wb_user->profile_image_url = $user['profile_image_url'];
		$wb_user->save();
		return $wb_user;
	}

	public function fetchUser($start_id = 0){
		$result = $this->client->friends_by_id( $this->token->uid);
    	if(isset($result['error_code'])){
    		echo "error_code:".$result['error_code']."	error:".$reuslt['error'];
    		return;
    	}else{

    		$next_cursor = $result['next_cursor'];
    		$id = number_format($next_cursor, 0, '', '');
    		$users = $result['users'];
    		foreach ($users as $key => $user) {
    			$this->addUser($user);
    		}
    		if($id != 0){
    			$this->fetchUser($id);
    		}
    	}		
	}

	public function fetchStatus($start_id = 0){
		$result = $this->client->home_timeline( 1, 50, 0, $start_id, 0, 0, 1 );
    	if(isset($result['error_code'])){
    		echo "error_code:".$result['error_code']."	error:".$reuslt['error'];
    		return;
    	}else{

    		$total = $result['total_number'];
    		$next_cursor = $result['next_cursor'];
    		$id = number_format($next_cursor, 0, '', '');
    		$status_list = $result['statuses'];
    		foreach ($status_list as $key => $value) {
    			$this->addStatus($value);
    		}
    		if($id != 0){
    			$this->fetchStatus($id);
    		}
    	}
	}

}

$o = new WeiboFetch();
$o->fetchStatus();
echo "Fetching weibo status finished.";
// $o->fetchUser();
// echo "Fetching weibo user finished.";
