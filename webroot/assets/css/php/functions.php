<?php

function cssView(){

	$path=getCssPath();
	css($path);
}

function getCssPath(){

	$base_dir=dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	$request_url=$_SERVER["SCRIPT_NAME"];
	$base_path=$base_dir."/base/".trim($request_url,"/");
	$pathinfo=pathinfo($base_path);
	$filename=$pathinfo["filename"];
	$dirname=dirname($pathinfo["dirname"]);
	$css_file=$dirname."/{$filename}.css";
	return $css_file;
}

function css($path){

	header('Content-Type: text/css; charset=utf-8');
	require_once($path);
}

?>
