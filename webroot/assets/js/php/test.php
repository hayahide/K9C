<?php 

header("Content-type: application/javascript");

$js=glob("../*");

foreach($js as $k=>$v){

	if(is_dir($v)) continue;

	$path=pathinfo($v);
	$basename=$path["filename"];
	$from=dirname(__FILE__)."/base.php";
	$to=dirname(__FILE__)."/{$basename}.php";
	copy($from,$to);
}
exit;



?>


