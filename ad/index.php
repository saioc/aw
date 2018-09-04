<?php 
/**
 *
 * @author KBRmedia (http://gempixel.com)
 * @link http://gempixel.com 
 * @license http://gempixel.com/license
 * @package Premium URL Shortener
 * @subpackage App Request Handler
 */
	if(!file_exists("includes/config.php")){
		header("Location: install.php");
		exit;
	}
	include("includes/config.php");
	// Run the app
	$app->run();
?>