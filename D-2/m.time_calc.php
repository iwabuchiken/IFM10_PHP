<html>
<head>
	
	<title><?php echo basename(__FILE__); ?></title>
	
<!-- REF viewport https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
	
</head>

<?php

	//REF http://www.4web8.com/2581.html
	date_default_timezone_set('Asia/Tokyo');
	
// 	setlocale(LC_ALL, 'nl_NL');

	$current = time();
	
// 	$date_label = date("Y-m-d");
// 	$date_label = date("Y-m-d, H:i:s", $current);
// 	$date_label = date("Y-m-d, H:i:s");
// 	$date_label = date("Y-m-d H:i:s");
	$date_label = date("d/m/Y H:i:s");
	$date_only_label = date("d/m/Y");
	$time_label = date("H:i:s");

	
?>

<!-- REF focus() http://www.mediacollege.com/internet/javascript/form/focus.html -->
<body onLoad="document.time_form.time_label.focus();">
	<form accept-charset="UTF-8" action="." method="get" name="time_form">
	
		<br />
		
		<!-- REF 'this.select()' http://stackoverflow.com/questions/4543236/onclick-select-all-text-in-text-field-rails answered Dec 28 '10 at 2:27 -->
<!-- 		REF readonly http://www.w3schools.com/tags/tag_input.asp -->
		<input
				id="timecal_full"
				name="date_label"
				onmouseover="this.select()"
				size="20"
				type="text"
				value="<?php echo $date_label; ?>"
				readonly
				/>
				<!-- value="<?php //echo $date_label; ?>" /> => Shown only the date data  -->
	
		<br />
		<br />
	
		<input
				id="timecal_full"
				name="date_only_label"
				onmouseover="this.select()"
				size="20"
				type="text"
				value="<?php echo $date_only_label; ?>"
				readonly
				
				/>
				<!-- value="<?php //echo $date_label; ?>" /> => Shown only the date data  -->
	
		<br />
		<br />
		
		<input
				id="timecal_full"
				name="time_label"
				onmouseover="this.select()"
				size="20"
				type="text"
				value="<?php echo $time_label; ?>" 
				readonly/>
				
	</form>
	
	<hr/>
	
	<a href="./time_calc.php">Desktop view</a>

</body>

</html>