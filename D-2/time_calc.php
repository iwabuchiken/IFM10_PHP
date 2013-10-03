<html>
<head>
	
	<title><?php echo basename(__FILE__); ?></title>
	
	<meta name="viewport"
           content="width=device-width,
			user-scalable=yes,
			initial-scale=0.8,
                    maximum-scale=3.0" />

	<link rel="stylesheet" href="./stylesheet/main.css" type="text/css">
                    
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

	<!-- http://www.pori2.net/js/kihon/16.html -->
	<script type="text/javascript" src="./javascript/main.js"></script>
	
</head>

<?php

	//REF http://www.4web8.com/2581.html
	date_default_timezone_set('Asia/Tokyo');
	
// 	setlocale(LC_ALL, 'nl_NL');

	$current = time();
	
	$date_label = date("d/m/Y H:i:s");
	$date_only_label = date("d/m/Y");
	$time_label = date("H:i:s");
	$time_label_serial = date("Ymd_His");

	
?>

<!-- REF focus() http://www.mediacollege.com/internet/javascript/form/focus.html -->
<body onLoad="document.time_form.time_label.focus();">
<!-- <body onLoad="document.time_form.time_label.focus(); show_msg();"> -->
<!-- <body onLoad="document.time_form.date_label.focus();"> -->

	<form accept-charset="UTF-8" action="." method="get" name="time_form">
		
		<table>
			<tr>
				<!-- REF 'this.select()' http://stackoverflow.com/questions/4543236/onclick-select-all-text-in-text-field-rails answered Dec 28 '10 at 2:27 -->
		<!-- 		REF readonly http://www.w3schools.com/tags/tag_input.asp -->
				<td class="labels">
				
					<img alt="Date" src="images/calendrier-date-icone-6871-48.png">

					&nbsp;
					<img alt="Time" src="images/chronometre-icone-4052-32.png">
					
				</td>
				
				<td>
					<input
							id="timecal_full"
							name="date_label"
							onmouseover="this.select()"
							size="18"
							type="text"
							value="<?php echo $date_label; ?>"
							readonly
							
							class="input_area"
							/>
							<!-- value="<?php //echo $date_label; ?>" /> => Shown only the date data  -->
				</td>
			</tr>
			
			<tr>
				<td class="labels">
					<img alt="Time" src="images/chronometre-icone-4052-32.png">
				</td>
				<td>
					<input
							id="timecal_full"
							name="time_label"
							onmouseover="this.select()"
							size="10"
							type="text"
							value="<?php echo $time_label; ?>" 
							readonly
							class="input_area"/>
				</td>
			</tr>
			
			<tr>
				<td class="labels">
					<img alt="Date" src="images/calendrier-date-icone-6871-48.png">
				</td>
				<td>
					<input
							id="timecal_full"
							name="date_only_label"
							onmouseover="this.select()"
							size="18"
							type="text"
							value="<?php echo $date_only_label; ?>"
							readonly
							
							class="input_area"
							/>
							<!-- value="<?php //echo $date_label; ?>" /> => Shown only the date data  -->
				</td>
			</tr>
			<tr>
				<td class="labels">
					<img alt="Serial" src="images/note-ecrivez-icone-9391-48.png">
				</td>
				<td>
					<input
							id="timecal_full_serial"
							name="time_label_serial"
							onmouseover="this.select()"
							size="18"
							type="text"
							value="<?php echo $time_label_serial; ?>" 
							readonly
							class="input_area"/>
				</td>
			</tr>
		</table>
	</form>
	
	<hr/>
	
<!-- 	<a href="./m.time_calc.php">Mobile view</a> -->

	<hr/>
	
	<div id="js_area">
		<!-- Javascript area -->
	
		<!-- http://homepage3.nifty.com/aya_js/js2/js214.htm -->
		<!--  <INPUT TYPE="button" VALUE="GO" ONCLICK="set_msg();"> -->
		<INPUT TYPE="image"
				src="images/chronometre-icone-4052-32.png"
				ONCLICK="set_msg();">
		
		&nbsp; &nbsp;
		
		<INPUT TYPE="image"
				src="images/halte-session-icone-4911-32.png"
				ONCLICK="clear_msg();">
		
		<div><b>Times</b></div>
		<div id="js"></div>
		
	</div>
</body>

</html>