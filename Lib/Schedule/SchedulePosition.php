<?php

$path=getExtendsLibPackagePath(__FILE__);
$basename=pathinfo(__FILE__)["basename"];
$path.="Schedule".DS.PACKAGE_PREFIX.$basename;
require_once($path);
class SchedulePosition extends AdSchedulePosition{}

?>
