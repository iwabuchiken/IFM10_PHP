<?php

require( dirname( __FILE__ ).'/libs/Smarty.class.php' );

/*****************************
 * Variables
 *****************************/
$local_server = "localhost";
$remote_server = "benfranklin.chips.jp";

$template_folder = "templates";

// $template_file = "sample.tpl";
$template_file = str_replace(".php", ".tpl", basename(__FILE__));

// $tpl_file = "./templates/sample.tpl";
$tpl_file = join(
				DIRECTORY_SEPARATOR,
				array($template_folder, $template_file));

/******************************
 * If the template file doesn't exist
 * 	=> Have the browser not to cache this page 
 ******************************/
if (!file_exists($tpl_file)) {

	//REF http://stackoverflow.com/questions/1037249/how-to-clear-browser-cache-with-php answered Jun 24 '09 at 9:08
	header("Cache-Control: no-cache, must-revalidate");
	
}//if (condition)

$charset = "utf-8";

// header("Content-Type: charset=".$charset);

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ ).'/templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/templates_c';



$smarty->assign('name', 'ワールド');
// $smarty->assign('name', mb_convert_encoding("ワールド", "utf-8"));
// $smarty->assign('name', mb_convert_encoding("ワールド", "utf-8"));
// $smarty->assign('name', mb_convert_encoding("ワールド", "utf-8", "auto"));

/*
 * Validate if the file exists
 */

	if (file_exists($tpl_file)) {
	
// 	$smarty->display('sample.tpl');
	$smarty->display($template_file);
	
	echo "<br/>";
// 	echo "Host name => ".gethostname();
	
} else {//if (condition)

// 	REF redirect http://oku.edu.mie-u.ac.jp/~okumura/php/redirect.php
	header("HTTP/1.1 301 Moved Permanently");
	
	if ($_SERVER['SERVER_NAME'] == $local_server) {
		
		header("Location: http://localhost/IFM10_PHP/D-7/templates/convert.php");

		
	} else if ($_SERVER['SERVER_NAME'] == $remote_server) {//if (condition)

		header("Location: http://benfranklin.chips.jp/PHP_server/D-7/templates/convert.php");
		
	} else {//if (condition)
		
		header("Location: http://benfranklin.chips.jp/PHP_server/D-7/");		
		
	}//if (condition)
	
// 	echo "File doesn't exist: ".$tpl_file;
	
// 	echo "<br>";
	
// 	require "templates/convert.php";
// 	require basename("templates/convert.php");
// 	require basename($tpl_file);
// 	echo basename($tpl_file);
	
}//if (condition)


?>