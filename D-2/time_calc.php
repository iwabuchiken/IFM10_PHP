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
	$time_label = date("H:i:s");

	
?>

<form accept-charset="UTF-8" action="." method="get">

	<br />
	
	<!-- REF 'this.select()' http://stackoverflow.com/questions/4543236/onclick-select-all-text-in-text-field-rails answered Dec 28 '10 at 2:27 -->
	<input
			id="timecal_full"
			name="timecal[full]"
			onmouseover="this.select()"
			size="30"
			type="text"
			value="<?php echo $date_label; ?>" />

	<br />
	<br />
	
	<input
			id="timecal_full"
			name="timecal[full]"
			onmouseover="this.select()"
			size="20"
			type="text"
			value="<?php echo $time_label; ?>" />
			
</form>