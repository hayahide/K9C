<?php

$path=getExtendsLibPackagePath(__FILE__);
$basename=pathinfo(__FILE__)["basename"];
$path.="TimeoutInvestigation".DS.$basename;
require_once($path);

class TimeoutInvestigation extends AdTimeoutInvestigation{}

?>
