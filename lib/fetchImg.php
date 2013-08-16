<?php

class fetchImg 
{
	private $img_path = '/weibo_img';

	function downloadImg($url){
		$r = explode('/', $url);
		$file_name =  array_pop ($r);


		$ch = curl_init($url);
	
		$fp = fopen($file_name, "w");

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
	}
}


$fi = new fetchImg();
$fi->downloadImg('http://ww2.sinaimg.cn/large/77d7edc5jw1e5uzfdrsvij20a40b2weu.jpg');
?> 
