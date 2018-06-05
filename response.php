<?php
//$output = array();
//$a1 = @$_GET['method']?$_GET['method']:'';
//if(empty($a1)){
//$output = array("info"=>"怎么是空的，你在逗我？？",'data'=>NULL);
//}else{
//$output = array('info'=>null,'data'=>$a1);
//}
////$json = json_encode($output);
////echo mb_detect_encoding("怎么是空的，你在逗我？？", array("ASCII","UTF-8","GB2312","GBK","BIG5"));
//exit($output);
dir_bianli(getcwd());
function dir_bianli($file_dir){
	try{
		if($file_dir == '.' || $file_dir == '..'){
			return false;
		}   
		if(!is_dir($file_dir)){
			find_word($file_dir);
			return false;
		}   
		$file_arr = scandir($file_dir);
		if(empty($file_arr)){
			return false;
		}
		foreach($file_arr as $val){
			dir_bianli($val);
		}

	}catch(Exception $e){
		echo 'error: '.$e->getMessage();
	}
}
function find_word($file){
	$content = file_get_contents($file);
	if(strpos($content,'str') !== false){
		echo $file.'<br/>';
	}
}

?>
