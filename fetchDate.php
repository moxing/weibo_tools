<?php
require 'common.php';

class WeiboFetch
{
	private $client;

	private $repeat_count = 0;

	private $token;

    public function __construct($uid) {
        $this->token = WeiboToken::find($uid);
        $this->client = new SaeTClientV2( WB_AKEY , WB_SKEY , $this->token->access_token);
    }

	public function addStatus($s){
		$status_id = $s['idstr'];

		$st = Status::find('first',array('conditions' => array('id = ?', $status_id)));
		if($st!=null){
			$this->repeat_count = $this->repeat_count + 1;
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
		$wb_user = User::find($uid);
		if($wb_user != null){
			return;
		}
		$wb_user = new User();
		$wb_user->id = $uid;
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

	public function fetchStatus($task,$start_id){

		$result = $this->client->home_timeline( 1, 1, 0, $start_id, 0, 0, 1 );
    	if(isset($result['error_code'])){
    		echo "error_code:".$result['error_code']."\n";
    		return;
    	}else{

    		$total = $result['total_number'];
    		$next_cursor = $result['next_cursor'];
    		$id = number_format($next_cursor, 0, '', '');
    		$status_list = $result['statuses'];
    		foreach ($status_list as $key => $value) {
    			$this->addStatus($value);
    			$task->current_id = $value['idstr'];
    			$task->save();
    		}
    		if($this->repeat_count>5){
    			return;
    		}
    		if($id != 0){
    			$this->fetchStatus($task,$id);
    		}
    	}
	}

	public function backupStatusById( $id ){
		if($status = Status::find($id) == null){
			$result = $this->client->show_status($id);
			if( $result['error_code'] == null){
				$status = $this->addStatus($reuslt);
			}
		}
		return $status;
	} 

	function startTask(){
		$status = Status::last();
		$task = new Task();
		$task->since_id = $status->id;
		$task->save();
		$this->fetchStatus($task,0);

		$task->status = 1 ;

		$task->save();
	}

}

$o = new WeiboFetch('3681544727');
$o->startTask();
echo "Fetching weibo status finished.";
// $o->fetchUser();
// echo "Fetching weibo user finished.";
