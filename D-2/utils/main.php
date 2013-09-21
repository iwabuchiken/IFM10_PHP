<?php

	date_default_timezone_set('Asia/Tokyo');

	$time_label = date("H:i:s");
	$date_label = date("d/m/Y H:i:s");

	echo '<div class="time_label">
				<input
					id="time_label"
					name="time_label"
					
					onmouseover="this.select()"
					size="10"
					type="text"
					value="'.$time_label.'" 
					readonly/>
				<input
					id="date_label"
					name="date_label"
					
					onmouseover="this.select()"
					size="20"
					type="text"
					value="'.$date_label.'" 
					readonly/>
			</div>';

?>