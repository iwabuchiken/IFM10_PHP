<?php

	function get_time_label_NOW() {
		
		date_default_timezone_set('Asia/Tokyo');
		
		return date('Ymd_His', time());
	}

	/*
	 * @return
	 * 		true	=> Dir exists
	 * 				=> Dir doesn't exist, and a new dir created
	 * 		false	=> Dir doesn't exist, and a new dir not created
	 * 
	 */
	function prepare_directory($dirname) {
		
		if (file_exists($dirname)) {
			
			echo "Dir exists: $dirname";
			echo "<br/>";
			
			return true;

		} else {//if (file_exists($dirname))

			echo "Dir doesn't exist: $dirname";
			echo "<br/>";
			
			$res = mkdir($dirname);
			
			if ($res == true) {
				
				echo "Dir created: $dirname";
				echo "<br/>";
				
				return true;
				

			} else {//if ($res == true)

				echo "Dir not created: $dirname";
				echo "<br/>";
				
				return false;
				
			}//if ($res == true)
				
		}//if (file_exists($dirname))
		
	}

	function resize_image($filename) {
		
// 		$newdirname = "../image_thumbnails";
		$newdirname = "./image_thumbnails";
		
		$basename = basename($filename);
		
		$im = imagecreatefromjpeg($filename);
		
		echo "Basename=".basename($filename);
		echo "<br/>";
		
		$basename_array = explode(".", $basename);
		
		echo "Dirname=".dirname($filename);
		echo "<br/>";
		
// 		echo "New file path=".join(PATH_SEPARATOR, array($newdirname, $basename));
// 		echo "New file path=".join(DIRECTORY_SEPARATOR, array($newdirname, $basename));	//=> '\'
// 		$newfilepath = join("/", array($newdirname, $basename));

// 		$newfilename = join("",
// 					array(
// 						$basename_array[0],
// 							"_",
// 							get_time_label_NOW(),
// 							".",
// 							$basename_array[1]
// 					));

		$newfilename = $basename;
		
		$newfilepath = join("/",
					array($newdirname,
							$newfilename
							));
		
		echo "New file path=$newfilepath";
		echo "<br/>";
		
		prepare_directory(dirname($newfilepath));
		
		// Thumbnail
		$orig_X = imagesx($im);
		$orig_Y = imagesy($im);
		
		$new_X = $orig_X / 2;
		$new_Y = $orig_Y / 2;
		
		$images_fin = ImageCreateTrueColor($new_X, $new_Y);
		
		ImageCopyResampled(
					$images_fin, $im,
					0, 0, 0, 0,
// 					$orig_X+1, $orig_Y+1, $new_X, $new_Y);
					$new_X, $new_Y, $orig_X+1, $orig_Y+1);
		
		echo "New image => Skeleton created";
		echo "<br/>";
		
		// Save new file
		//	=> If the new file already exists ===> Not create
		$res = file_exists($newfilepath);
		
		if ($res == true) {
			
			echo "New file already exists: $newfilepath";
			echo "<br/>";
			
		} else {//if ($res != true)
		
			ImageJPEG($images_fin,$newfilepath);
		
			echo "New image file => Saved";
			echo "<br/>";
			
		}//if ($res != true)
		
		// Destroy images
		ImageDestroy($im);
		ImageDestroy($images_fin);
		
		echo "Images => Destroyed";
		echo "<br/>";
		
		
	}//function resize_image($filename)

	/*
	 * Get file name from GET
	 */
	function do_job() {
		echo "hi.";
		
		// Get GET parameter
		$filename = $_GET['file_name'];
		
		if ($filename == "") {
		
			echo "No file name";
			echo "<br/>";
		
			die("Thank you.");
		}
		
		// Build: File path
		$imagedir_name = "../image";
		
		$file_path = join("/", array($imagedir_name, $filename));
		
		if (!file_exists($file_path)) {
		
			echo "File doesn't exist";
			echo "<br/>";
		
			die("Thank you.");
		}
		
		$size = getimagesize($file_path);
		
		echo "\$size=".count($size);
		
		// Get image
		echo "<br/>";
		echo "<br/>";
		
		resize_image($file_path);
		
		echo "Resize => Done";
		
	}
	
	function do_job_2() {
		/*
		 * Prepare directory
		 * 
		 */
		$orig_dir_name = "images";
		
		prepare_directory($orig_dir_name);
		
		// Get file list
// 		$glob_string = "image/*.*";
// 		$glob_string = "../image/*.*";
// 		$glob_string = "../$orig_dir_name/*.*";

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		$glob_string = "./$orig_dir_name/*.*";
		
		$file_list = glob($glob_string);
		
		if ($file_list == false) {
			
			echo "Can't get file list: $glob_string";
			echo "<br/>";
			
			die("Thank you.");
			
		} else {
			
			echo "Length=".count($file_list)."($glob_string)";
			echo "<br/>";
			
			
		}

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		// Resize
		foreach ($file_list as $file_name) {
			
			$res = resize_image($file_name);
			
			if ($res == true) {
				
				echo "Resize => Done: $file_name";
				echo "<br/>";
				
				
			} else {//if ($res == true)
			
				echo "Resize => Failed: $file_name";
				echo "<br/>";
				
			}//if ($res == true)
				
			echo "<br/>";
			
		}
		
		echo "<br/>";
		
		echo "Resize => Complete";
		echo "<br/>";
		
	}
	
	function do_job_3() {
		/*
		 * Prepare directory
		 * 
		 */
		$src_dir_name = "images";
		$dst_dir_name = "image_thumbnails";
		
		prepare_directory($src_dir_name);
		prepare_directory($dst_dir_name);
		
		// Get file list
// 		$glob_string = "image/*.*";
// 		$glob_string = "../image/*.*";
// 		$glob_string = "../$orig_dir_name/*.*";

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		$glob_string_src = "./$src_dir_name/*.*";
		$glob_string_dst = "./$dst_dir_name/*.*";
		
		$file_list_src = glob($glob_string_src);
		$file_list_dst = glob($glob_string_dst);
		
		if ($file_list_src == false) {
			
			echo "Can't get file list: $glob_string_src";
			echo "<br/>";
			
			die("Thank you.");

			
		} else if ($file_list_dst == false) {
			
			echo "Can't get file list: $glob_string_dst";
			echo "<br/>";
				
			die("Thank you.");
			
		} else {
			
// // 			echo "Length=".count($file_list_src)."($glob_string_src)";
// 			echo "Length=".count($file_list_diff)."($glob_string_src)";
// 			echo "<br/>";
			
			
		}

		// Create: Basename lists
		$file_names_src = array();
		
		foreach ($file_list_src as $f_src) {

			array_push($file_names_src, basename($f_src));
						
		}
		
		echo "<br/>";
		
		print_r($file_names_src);
		
		echo "<br/>";

		// Dst file names
		$file_names_dst = array();
		
		foreach ($file_list_dst as $f_dst) {

			array_push($file_names_dst, basename($f_dst));
						
		}
		
		echo "<br/>";
		
		print_r($file_names_dst);
		
		echo "<br/>";
		
		// Diff name list
		$file_names_diff = array_diff($file_names_src, $file_names_dst);
// 		$file_list_diff = array_diff($file_list_src, $file_list_dst);
		echo "<br/>";
		echo "<br/>";
		echo "Diff";
		echo "<br/>";
		
		print_r($file_names_diff);

		// Source file list
		echo "<br/>";
		echo "<br/>";
		echo "Source";
		echo "<br/>";
		
		print_r($file_list_src);
		
		echo "<br/>";
		
		// Destination files
		echo "<br/>";
		echo "<br/>";
		
		echo "Dst files";
		echo "<br/>";
		
		print_r($file_list_dst);

// 		// Diff files
// 		echo "<br/>";
// 		echo "<br/>";
		
// 		echo "Diff files";
// 		echo "<br/>";
		
// 		foreach ($file_list_diff as $f_src) {
		
// 			echo "file=$f_src";
// 			echo "<br/>";
		
// 		}
		
		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		// Resize
// 		foreach ($file_list_src as $file_name) {

		foreach ($file_names_diff as $file_name) {
			
			$res = resize_image(join("/", array($src_dir_name, $file_name)));
// 			$res = resize_image($file_name);
			
			if ($res == true) {
				
				echo "Resize => Done: $file_name";
				echo "<br/>";
				
				
			} else {//if ($res == true)
			
				echo "Resize => Failed: $file_name";
				echo "<br/>";
				
			}//if ($res == true)
				
			echo "<br/>";
			
		}
		
		echo "<br/>";
		
		echo "Resize => Complete";
		echo "<br/>";
		
	}//function do_job_3()

// 	$pid = pcntl_fork();
	
	//Fatal error: Class 'Thread' not found in C:\WORKS\WS\Cake\IFM10\D5\create_thumbnails.php on line 250
// 	class ThreadExample extends Thread {
		
// 	}
	
	
// 	do_job();
// 	do_job_2();
	do_job_3();
	
?>