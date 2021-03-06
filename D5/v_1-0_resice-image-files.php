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
		
		$newdirname = "../image_thumbnails";
		
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

	
	$filename = "../image/2012-05-13_15-51-17_10.jpg";
	
	$size = getimagesize($filename);
	
	echo "\$size=".count($size);

	// Get image
	echo "<br/>";
	echo "<br/>";
	
	resize_image($filename);
	
	echo "Resize => Done";
	
// 	$file = fopen($filename, "rb");
	
// 	echo "\$file=$file";
	
// 	$im = imagecreatefromjpeg($filename);	//=> Works
// 	$im = imagecreatefromjpeg($file);		//=> Warning: imagecreatefromjpeg() expects parameter 1 to be string, resource given
// 	$im = imagecreatefromjpeg($filename);	//=> Warning: imagecreatefromjpeg(): '../image/2012-05-06_13-57-14_243.jpeg' is not a valid JPEG file in C:\WORKS\WS\Cake\IFM10\D5\v_1-0_resice-image-files.php on line 12
	
// 	$image = new Imagick( $filename );

	
	
	?>