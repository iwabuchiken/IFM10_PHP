<!DOCTYPE html>
<html>
<head>
	<title><?php echo basename(__FILE__); ?></title>
  
	<meta name="viewport"
           content="width=device-width,
			user-scalable=yes,
			initial-scale=0.8,
                    maximum-scale=3.0" />
  
</head>
<body>
	<a name="top"></a>
	<a href="#bottom">Bottom</a>

	<hr/>
	
	<?php
	
		function get_name_list() {
				
			// 		$dir_name = "../images";
			$dir_name = ".";
				
			$dir = opendir($dir_name);
				
			$file_names = array();
				
			while (($file_name = readdir($dir)) !== false) {
		
				if ($file_name != "." && $file_name != "..") {
						
					array_push($file_names, $file_name);
						
				}
		
			}//while (($file = readdir($dir)) !== false) {
		
			closedir($dir);
				
			return $file_names;
				
		}//function get_name_list() {
		
		function do_job() {
			// Get file names
			$file_names = get_name_list();
				
			// Sort the list
			sort($file_names);
				
			// Show items
			for($i = 0; $i < count($file_names); $i ++) {
		
				echo "<a href=\"../"
						.urlencode($file_names[$i])
						."\">".($i+1).". ".$file_names[$i]."</a><br>";
		
				// Insert a blank line
				if (($i+1) % 10 == 0) {
						
					echo "<br>";
				}
		
			}//for($i = 0; $i < $file_names.length; $i ++) {
				
		}//function do_job() {
		
		do_job();
	
	?>

	<hr/>
	
	<a name="bottom"></a>
	<a href="#top">Top</a>

</body>
</html>