<?php
	require_once("includes/constants.php");
	include("includes/connection.php");
	include_once("includes/functions.php");
	include_once("includes/dbObject.php");
	include_once("includes/Date.php");

	$minSeconds = 0;
	$day1maxSeconds = intval(date("G"))*60*60 + intval(date("i"))*60 + intval(date("s"));
	$maxSeconds = 24*60*60;

	$max_days = 5;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Is de papierwinkel open?</title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
	</head>
	<script src="scripts/jquery-1.10.2.min.js"></script>
	<script src="scripts/paper.js"></script>
	<body>
		<div class="main">
			<div class="left">
				<?php 
					$day1 = Date::findByDaysAgo(0);
				 ?>
				<div class="day" w="40%"><?php
					foreach($day1 as $date){
						$date->showDate(0,$day1maxSeconds);
					}

				?>
				</div><?php
				for($i = 0; $i<$max_days; $i++){
					$day = Date::findByDaysAgo($i+1);
					?><div class="day" w="20%"><?php
					foreach ($day as $date) {
						$date->showDate();
					}
					?></div><?php
				}?>
			</div>
		</div>
		<div class="info">
			<div class="bool">
				Ja
			</div>
			<div class="about">
				Design: Willem Kempers<br>
				Code: Stef Tervelde
			</div>
		</div>
		<pre class="output"><?php
			echo $output;
		?></pre>
	</body>
</html>