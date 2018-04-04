<?php

$path=getExtendsLibPackagePath(__FILE__);
$basename=pathinfo(__FILE__)["basename"];
$path.=$basename;
require_once($path);

class UserAgent extends AdUserAgent{}

?>
