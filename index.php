<?php 
	include("connection.php");
	include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Is de papierwinkel open?</title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
	</head>
	<script src="jquery-1.10.2.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".date").each(function(){
				$(this).css("top",$(this).attr("start"));
				$(this).css("height",$(this).attr("length"));
			});
			$(".day").each(function(){
				$(this).css("width",$(this).attr('w'));
			});
		});
	</script>
	<body>
		<div class="main">
			<div class="left">
				<div class="day" w="40%">
					<div class="date" start="20%" length="10%">date 1</div>
					<div class="date" start="80%" length="20%">date 2</div>
				</div>
				<div class="day" w="20%">test2</div>
				<div class="day">test3</div>
				<div class="day">test4</div>
				<div class="day">test5</div>
				<div class="day">test6</div>
				<div class="day">test7</div>
				<div class="day">test8</div>
				<div class="day">test9</div>
			</div>
		</div>
		<div class="info">
			<div class="bool">
				Yes
			</div>
			<div class="about">
				Design: Willem Kempers<br>
				Code: Stef Tervelde
			</div>
		</div>
	</body>
</html>