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
	
// 	do_job();
	do_job_2();
	
?>