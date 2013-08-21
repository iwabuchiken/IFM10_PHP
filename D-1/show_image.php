<img src="../super_dyadya-1128019180_i_4490_full.orig.jpg" width="200" height="200" >
<br>

<a name="top"></a>
<a href="#bottom">Bottom</a>

<hr/>

<?php

	function get_name_list() {
		
// 		$dir_name = "../images";
		$dir_name = "images";
		
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
			
			echo "<a href=\"../images/"
					.urlencode($file_names[$i])
					."\">".($i+1).". ".$file_names[$i]."</a><br>";
			
			// Insert a blank line
			if (($i+1) % 10 == 0) {
				
				echo "<br>";
			}
			
		}//for($i = 0; $i < $file_names.length; $i ++) {
		
	}//function do_job() {
	
	do_job();
	
// 	//phpinfo();
// 	$dir_name = "../images";
// // 	$dir_name = "../images";	//=> Failed to open
	
// 	// REF opendir http://phpspot.net/php/pg%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%AE%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%83%AA%E3%82%B9%E3%83%88%E3%82%92%E5%8F%96%E5%BE%97.html
// 	if ($dir = opendir($dir_name)) {
// 		while (($file = readdir($dir)) !== false) {
// 			if ($file != "." && $file != "..") {
// // 				echo "$file\n";
// 				echo "<a href=\"../images/".urlencode($file)."\">$file</a><br>";
// // 				echo "<a href=\"../images/$file\">$file</a><br>";
// 			}
// 		}
		
// 				closedir($dir);
				
// 	}//if ($dir = opendir("data/")) {
	
?>

<hr/>
<a href="http://cosmos-ifm-1.herokuapp.com/images" target="_blank">IFM_R_1</a><br/>
<a href="http://cosmos-cr6.herokuapp.com/" target="_blank">CR6</a><br/>
<a href="https://dashboard.heroku.com/apps" target="_blank">Heroku apps</a><br/>

<!-- <a href="../images/toranomon_explanation-1.bmp">toranomon_explanation-1.bmp</a><br> -->

<!-- <a href="../images/toranomon_explanation-2.bmp">toranomon_explanation-2.bmp</a><br> -->

<hr/>
<a name="bottom"></a>
<a href="#top">Top</a>
