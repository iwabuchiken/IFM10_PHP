<?php

require( dirname( __FILE__ ).'/libs/Smarty.class.php' );

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

$tpl_file = "./templates/sample.tpl";

if (file_exists($tpl_file)) {
	
	$smarty->display('sample.tpl');
	
} else {//if (condition)

	echo "File doesn't exist: ".$tpl_file;
	
	echo "<br>";
	
	require "templates/convert.php";
// 	require basename("templates/convert.php");
// 	require basename($tpl_file);
// 	echo basename($tpl_file);
	
}//if (condition)


?>