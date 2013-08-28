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
		// Get file list
		$file_list = get_name_list();
		
		// Smarty template file extension
		$smarty_ext = "tpl";
		
		// Change the extention name
		for($i = 0; $i < count($file_list); $i ++) {
			
// 			$ext = pathinfo($file_list[$i], PATHINFO_EXTENSION);

			$file_info = pathinfo($file_list[$i]);
			
			$file_name_new = "";
			
			if ($file_info['extension'] != $smarty_ext) {
			
				$file_name_new = join(".",
									array($file_info['filename'], $smarty_ext));
				
				copy($file_info['basename'], $file_name_new);
				
				echo "File copied: ".$file_info['basename']." => ".$file_name_new;

				echo "<br>";
				echo "<br>";
				
			} else {
				
				$file_name_new = $file_info['basename'];
				
				echo "This is a Smarty template file: ".$file_name_new;

				echo "<br>";
				echo "<br>";
				
			}//if $file_info['extension'] != $smarty_ext {
			
// // 			echo "\$ext => $ext"."<br/>";
// 			echo "\$ext => ".$file_info['extension']."<br/>";
// 			echo "File name => ".$file_info['filename']."<br/>";
			
// 			echo $file_info['basename']." => ".$file_name_new;
			
// 			echo "<br>";
// 			echo "<br>";

		}
		
	}//function do_job() {
	
	do_job();
?>

<form accept-charset="UTF-8" action="../sample.php" method="get" name="time_form">

	<input
			type="submit"
			value="Back to sample.php" 
			/>
			
</form>
