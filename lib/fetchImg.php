<?php

require "common.php";

class fetchImg 
{

	function downloadImg($url){

		$img_path = SYSROOT.DIRECTORY_SEPARATOR.'weibo-img';
		$r = explode('/', $url);
		$file_name =  array_pop ($r);

		$ch = curl_init($url);
	
		$fp = fopen($img_path.DIRECTORY_SEPARATOR.$file_name, "w");

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
	}

	function getPicTask(){
		$list = Status::find_by_sql('SELECT original_pic,status FROM wb_status WHERE original_pic IS NOT NULL and status = 0 GROUP BY original_pic');
		foreach ($list as $p) {
			$this->downloadImg($p->original_pic);
			$p->status = 1;
			$p->save();
		}
	}

}


$fi = new fetchImg();
// echo SYSROOT;
$fi->getPicTask();
// $fi->downloadImg('http://ww2.sinaimg.cn/large/77d7edc5jw1e5uzfdrsvij20a40b2weu.jpg');

