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
	
	
		//http://phpspot.net/php/pg%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%AE%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%83%AA%E3%82%B9%E3%83%88%E3%82%92%E5%8F%96%E5%BE%97.html
		
	// 	if ($dir = opendir("data/")) {
		if ($dir = opendir(".")) {
			
			$count = 0;
			
			while (($file = readdir($dir)) !== false) {
				
	// 			$count += 1;
				
				if ($file != "." && $file != "..") {
					
					$count += 1;
					
	// 				echo "count=".$count;
	// 				$items = array($_SERVER['SERVER_NAME'], $_SERVER['PHP_SELF']);
					$items = array($_SERVER['PHP_SELF']);
					
					$link = join($items);
					
	// 				echo $count."."."<a href='".$link."'>"."$file"."</a>"."\n";
					echo $count."."."<a href='".$file."'>"."$file"."</a>"."\n";
					
					echo "<br/>";
				}
			}
					closedir($dir);
					
		}//if ($dir = opendir("."))
			
	?>

	<hr/>
	
	<a name="bottom"></a>
	<a href="#top">Top</a>

</body>
</html>