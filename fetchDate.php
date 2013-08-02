<?php
require 'common.php';

class WeiboFetch
{
	private $client;

	private $contiune_fetch = false;

	private $task;

    public function __construct() {
        $token = WeiboToken::first();
        $this->client = new SaeTClientV2( WB_AKEY , WB_SKEY , $token->access_token);
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
		$status = new Status();
		$status->uid = $s['uid'];
		if($s['text']!==null){
			$status->text = $s['text']; 
		}
		$status->wb_id = $s['idstr'];
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
	    	$status->wb_ori_id = $ori_status->wb_id;
	    }

		$status->save();
		return $status;
	}

	public function importStatus(){
		foreach ($this->status_list as $status) {
			$s = $this->addStatus($status);
			$this->task->current_id=$s->wb_id;
			$this->task->save();
		}
	}

	public function startTask(){
        $task = Task::last();
        if($task===NULL){
        	$status = Status::last();
        	if($status===NULL){
        		$since_id = 0;
        	}else{
        		$since_id = $status->wb_id;
        	}
        	$current_id = 0;
        	$task = Status::create(array('since_id' => $since_id,'current_id' => $current_id));
        }
        $this->task = $task;
        	
		while ($this->task->since_id==0 || $this->taks->since_id < $this->task->current_id ) {
			$page = 1;
			$count = 50;
			try{
				$result = $this->client->home_timeline($page,$count,$this->task->since_id,$this->task->current_id);
		    	if(isset($result['error_code'])){
		    		echo "error_code:".$result['error_code']."	error:".$reuslt['error'];
		    	}else{
		    		$this->status_list = $result['statuses'];
		    		$this->importStatus();		    		
		    		$previous_id = echo number_format($result['next_cursor'],0,'.','');
		    		if($previous_id>$task->since_id){
		    			$this->task->current_id = $previous_id;
		    			$this->task->save();
		    		}
		    	}				
			} catch (Exception $e) {
				echo  $e->getMessage();
			}
			
		}
	}
}

$o = new WeiboFetch();
$o->getPosition();
