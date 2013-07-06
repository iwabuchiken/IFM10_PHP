<?php

	function show_message($message, $filename, $linenumber, $funcname) {
		
		echo "<br/>";
		
// 		echo "[$filename : $funcname : $linenumber] $message";
		echo "[".basename($filename)." : $funcname : $linenumber] $message";
		
		echo "<br/>";
		
	}

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
			
			show_message(
				"Dir exists: $dirname",
				__FILE__, __LINE__, __FUNCTION__);


			return true;

		} else {//if (file_exists($dirname))

			show_message(
				"Dir doesn't exist: $dirname",
				__FILE__, __LINE__, __FUNCTION__);

			
			$res = mkdir($dirname);
			
			if ($res == true) {

				show_message(
					"Dir doesn't exist: $dirname",
					__FILE__, __LINE__, __FUNCTION__);

				
				return true;
				

			} else {//if ($res == true)

				show_message(
					"Dir doesn't exist: $dirname",
					__FILE__, __LINE__, __FUNCTION__);

				
				return false;
				
			}//if ($res == true)
				
		}//if (file_exists($dirname))
		
	}

	function resize_image($filename) {
		
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
		show_message("\$ext=$ext", __FILE__, __LINE__, __FUNCTION__);
		
// 		echo "<br/>";
		
// 		echo "\$ext=$ext";
// 		echo "<br/>";

		// Allocatet according to the extension name
		if (strtolower($ext) == "png") {
			
			_resize_image__PNG($filename);
			
		} else if (strtolower($ext) == "jpg"
					|| strtolower($ext) == "jpeg") {//if ($ext)
			
			_resize_image__JPG($filename);
		
		} else if (strtolower($ext) == "bmp") {//if ($ext)
			
			_resize_image__BMP($filename);
		
		}//if ($ext)
		
	}//function resize_image($filename)

	function _resize_image__JPG($filename) {
		
		$newdirname = "../image_thumbnails";
		$newdirname = "./image_thumbnails";
		
		$basename = basename($filename);
		
		$im = imagecreatefromjpeg($filename);
		
		show_message(
			"Basename=".basename($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
		$basename_array = explode(".", $basename);

		show_message(
			"Dirname=".dirname($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
		$newfilename = $basename;
		
		$newfilepath = join("/",
				array($newdirname,
						$newfilename
				));

		show_message(
			"Dirname=".dirname($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
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

		show_message(
			"New image => Skeleton created",
			__FILE__, __LINE__, __FUNCTION__);

		
		// Save new file
				//	=> If the new file already exists ===> Not create
				$res = file_exists($newfilepath);
		
				if ($res == true) {

					show_message(
						"New file already exists: $newfilepath",
						__FILE__, __LINE__, __FUNCTION__);

						
				} else {//if ($res != true)

					show_message(
						"New file doesn't exist: $newfilepath",
						__FILE__, __LINE__, __FUNCTION__);


					
					ImageJPEG($images_fin,$newfilepath);

					show_message(
						"New image file => Saved",
						__FILE__, __LINE__, __FUNCTION__);
							
		}//if ($res != true)
		
		// Destroy images
		ImageDestroy($im);
		ImageDestroy($images_fin);

		show_message(
			"Images => Destroyed",
			__FILE__, __LINE__, __FUNCTION__);

		
	}//function _resize_image__JPG($filename) {

	function _resize_image__PNG($filename) {
		// Setup: Dir & file names
		$newdirname = "./image_thumbnails";
		
		$basename = basename($filename);
		
		$newfilepath = join("/",
				array($newdirname, $basename
		));
		
		// Get the original image
		$image = imagecreatefrompng( $filename );
		
		// Get the size of the original image
		$width_old = imagesx($image);
		$height_old = imagesy($image);
		
		// Get a size for the new image
		$width_new = imagesx($image) / 2;
		$height_new = imagesy($image) / 2;
		
		// New image
		$image_new = imagecreatetruecolor($width_new, $height_new);
		
		// Setup: Alpha
		imagealphablending( $image_new, false );
		imagesavealpha( $image_new, true );
		
		// Copy to the new image
		imagecopyresampled(
					$image_new, $image,
					0, 0, 0, 0,
					$width_new, $height_new, $width_old, $height_old);
		
		// Save the new image
		imagepng($image_new, $newfilepath);
		
		
// 		show_message("images.x=".imagesx($image), __FILE__, __LINE__, __FUNCTION__);

		// Destroy image
		ImageDestroy($image);
		
	}//function _resize_image__PNG($filename) {
	
	function _resize_image__BMP($filename) {
		
		show_message("BMP!", __FILE__, __LINE__, __FUNCTION__);
		
	}
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
			
			show_message(
				"Can't get file list: $glob_string",
				__FILE__, __LINE__, __FUNCTION__);

			
			die("Thank you.");
			
		} else {

			show_message(
				"Length=".count($file_list)."($glob_string)",
				__FILE__, __LINE__, __FUNCTION__);
			
			
		}

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		// Resize
		foreach ($file_list as $file_name) {
			
			$res = resize_image($file_name);
			
			if ($res == true) {
				
				show_message(
					"Resize => Done: $file_name",
					__FILE__, __LINE__, __FUNCTION__);
				
				
			} else {//if ($res == true)
			
				show_message(
					"Resize => Failed: $file_name",
					__FILE__, __LINE__, __FUNCTION__);
				
			}//if ($res == true)
				
			echo "<br/>";
			
		}
		
		echo "<br/>";
		
		show_message(
			"Resize => Complete",
			__FILE__, __LINE__, __FUNCTION__);
		
	}//function do_job_2() {
	
	function do_job_3() {
		
		/*
		 * Prepare directory
		 * 
		 */
		// Set: Dir names
		$src_dir_name = "images";
		$dst_dir_name = "image_thumbnails";
		
		// Prepare directories
		prepare_directory($src_dir_name);
		prepare_directory($dst_dir_name);
		
		// Set: String for globbing
		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		$glob_string_src = "./$src_dir_name/*.*";
		$glob_string_dst = "./$dst_dir_name/*.*";
		
		// Get file lists
		$file_list_src = glob($glob_string_src);
		$file_list_dst = glob($glob_string_dst);
		
		// Validate: Any files in the source dir?
		if ($file_list_src == false) {
			
			show_message(
					"Can't get file list: $glob_string_src",
					__FILE__, __LINE__, __FUNCTION__);
			
// 			echo "Can't get file list: $glob_string_src";
// 			echo "<br/>";
			
			die("Thank you.");

			
		} else if ($file_list_dst == false) {
			
// 			echo "Can't get file list: $glob_string_dst";
// 			echo "<br/>";
				
// 			die("Thank you.");
			
		} else {
			
// // 			echo "Length=".count($file_list_src)."($glob_string_src)";
// 			echo "Length=".count($file_list_diff)."($glob_string_src)";
// 			echo "<br/>";
			
			
		}

		// Create: Basename list of the source dir
		$file_names_src = array();
		
		foreach ($file_list_src as $f_src) {

			array_push($file_names_src, basename($f_src));
						
		}
		
		// Create: Basename list of the destination dir
		$file_names_dst = array();
		
		foreach ($file_list_dst as $f_dst) {

			array_push($file_names_dst, basename($f_dst));
						
		}
		
		// Created: Diff name list
		$file_names_diff = array_diff($file_names_src, $file_names_dst);
// 		$file_list_diff = array_diff($file_list_src, $file_list_dst);

		show_message(
			"Diff",
			__FILE__, __LINE__, __FUNCTION__);

		show_message(
			"print_r(\$file_names_diff)=",
			__FILE__, __LINE__, __FUNCTION__);
		
		print_r($file_names_diff);
		
// 		print_r($file_list_dst);

		foreach ($file_names_diff as $file_name) {
			
			$res = resize_image(join("/", array($src_dir_name, $file_name)));
// 			$res = resize_image($file_name);
// 			aa
// 			if ($res == true) {

// 				show_message(
// 					"Dir doesn't exist: $dirname",
// 					__FILE__, __LINE__, __FUNCTION__);

				
// 			} else {//if ($res == true)

// 				show_message(
// 					"Dir doesn't exist: $dirname",
// 					__FILE__, __LINE__, __FUNCTION__);

				
// 			}//if ($res == true)
				
			echo "<br/>";
			
		}//foreach ($file_names_diff as $file_name) {
		
		echo "<br/>";

// 		show_message(
// 			"Dir doesn't exist: $dirname",
// 			__FILE__, __LINE__, __FUNCTION__);
		
	}//function do_job_3()

// 	$pid = pcntl_fork();
	
	//Fatal error: Class 'Thread' not found in C:\WORKS\WS\Cake\IFM10\D5\create_thumbnails.php on line 250
// 	class ThreadExample extends Thread {
		
// 	}
	
	
// 	do_job();
// 	do_job_2();
	do_job_3();
	
?>