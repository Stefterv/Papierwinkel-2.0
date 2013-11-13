<?php
	class Date extends databaseObject{
		protected static $dbName = "Dates";
		
		public $date;
		public $start;
		public $stop;
		
		static function findByDaysAgo($days){
			$date = date('Y-m-d', time()-$days*24*60*60);
			return static::find("SELECT * FROM ".static::$dbName." WHERE date='{$date}'");
		}
		function start(){
			//Return start in seconds
			return static::toSeconds($this->start);
		}
		function length(){
			$end = static::toSeconds($this->stop);
			$length = $end - $this->start();
			return $length;
		}
		static function toSeconds($var){
			$var = explode(":", $var);
			$time = $var[2]; // seconds
			$time += $var[1]*60; // minutes
			$time += $var[0]*60*60; // hours
			return $time;
		}
		function showDate($min = DAY_START,$max = DAY_END){
			$start= map($this->start(),$min,$max,0,100);
			$length = map($this->length(),$min,$max,0,100);
			?><div class="date" <?php attr("start",$start."%");attr("length",$length."%") ?>>&nbsp;</div><?php
		}
	}
?>