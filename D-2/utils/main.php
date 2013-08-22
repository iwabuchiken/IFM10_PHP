<?php

	date_default_timezone_set('Asia/Tokyo');

	$time_label = date("H:i:s");

	echo '<div class="time_label">
			<input
				id="timecal_full"
				name="time_label"
				
				onmouseover="this.select()"
				size="20"
				type="text"
				value="'.$time_label.'" 
				readonly/>
			</div>';

?>