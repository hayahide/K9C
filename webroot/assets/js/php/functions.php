<?php

function jsView(){

	$path=getJsPath();
	js($path);
}

function getJsPath(){

	$base_dir=dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	$request_url=$_SERVER["SCRIPT_NAME"];
	$base_path=$base_dir."/base/".trim($request_url,"/");
	$pathinfo=pathinfo($base_path);
	$filename=$pathinfo["filename"];
	$dirname=dirname($pathinfo["dirname"]);
	$js_file=$dirname."/{$filename}.js";
	return $js_file;
}

function js($path){

	header('Content-Type: text/css; charset=utf-8');
	require_once($path);
}

?>
