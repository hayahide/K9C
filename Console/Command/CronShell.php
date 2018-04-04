<?php
/**
 * AppShell file
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */

App::uses('AppController','Controller');
App::uses('K9DailyReportController','Controller');

class Exampe extends Shell {

  function _welcome() {

  }
}

class CronShell extends AppShell {

    #
    # @author Kiyosawa
    # @date
    public function startup(){

        //parent::startup();
    }

	public function movePostLogToS3()
	{

		echo __LINE__;
		return;
		
	}

    public function dailyReport(){

		$client=$_SERVER["argv"][5];
		$ymd =$_SERVER["argv"][6];
		$lang=$_SERVER["argv"][7];
	    $this->Controller=new K9DailyReportController();
	    $path=$this->Controller->__getReportByConsole($ymd,$lang,$client);
		echo $path;
		exit;
    }

    public function dailyReportYm(){

		$client=$_SERVER["argv"][5];
		$ym  =$_SERVER["argv"][6];
		$lang=$_SERVER["argv"][7];

		$start=$ym."01";
		$end=date("Ymt",strtotime($start));
		$range=makeDatePeriod($start,$end);
		$dates=array_keys($range);

		$paths=$this->dailyReports($dates,$lang,$client);
		echo implode(",",$paths);
		exit;
    }

	private function dailyReports($dates,$lang,$client,$res=array())
	{
		if(empty($dates)) return $res;

		$date=array_shift($dates);
		if($date>date("Ymd")) return $res;

		$php="dailyReport.php";
		$php_path=dirname(ROOT).DS."php".DS.$php;
		$command="php {$php_path} {$date} {$lang} {$client} &";

		ob_start();
		system($command);
		$buffer=ob_get_contents();
		ob_end_clean();

		$res[]=$buffer;
		return $this->dailyReports($dates,$lang,$client,$res);
	}

}

