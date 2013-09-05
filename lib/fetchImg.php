<?php

class fetchImg 
{

	function downloadImg($url){
		$img_path = SYSROOT.'\..\weibo-img';

		$r = explode('/', $url);
		$file_name =  array_pop ($r);

		$ch = curl_init($url);
		$p = $img_path.DIRECTORY_SEPARATOR.$file_name;
		$fp = fopen($p, "w");

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		return true;
	}

	function getPicTask(){
		$list = Status::find_by_sql('SELECT * FROM wb_status WHERE original_pic IS NOT NULL and status = 0');

		foreach ($list as $p) {
			$this->downloadImg($p->original_pic);
			$p->status = 1;
			$p->save();
		}
	}

}

// require "common.php";
// $fi = new fetchImg();

// $fi->getPicTask();
// $fi->downloadImg('http://ww2.sinaimg.cn/large/77d7edc5jw1e5uzfdrsvij20a40b2weu.jpg');

