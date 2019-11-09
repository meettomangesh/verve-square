<?php
	/*
	Plugin Name: Import Sliders
	Plugin URI: https://codecanyon.net/user/rs-theme
	Description: Auto-import Revolution Sliders
	Version: 1.0
	Author:  RS Theme
	Author URI: http://www.rstheme.com
	*/

	if(is_admin()) {
		
		include('includes/slider-revolution-auto-importer-admin.php');
	}
	define('RS_ZIP_FOLDER_PATH', plugin_dir_path(__FILE__));
	
?>