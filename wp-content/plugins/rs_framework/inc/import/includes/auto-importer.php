<?php
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	
	require_once( $path_to_wp.'/wp-load.php' );
	require_once( $path_to_wp.'/wp-includes/functions.php');
	require_once( $path_to_wp.'/wp-admin/includes/file.php');
	
	echo ' Import Files loaded<br />'; 
	echo ' Import Sliders:<br />'; 

	$task = $_GET['task'] ? $_GET['task'] :'';
	
	if('business' == $task){
		$slider_array = array(
			'slider_zips/finoptis/home-2.zip',
			'slider_zips/finoptis/home3.zip',
			'slider_zips/finoptis/home-6.zip'			
		);
	}

	if('medical' == $task){
		$slider_array = array(
			'slider_zips/medical/Medical.zip'			
		);
	}

	if('consulting' == $task){
		$slider_array = array(
			'slider_zips/consulting/classic-banner.zip',	
			'slider_zips/consulting/home-6.zip'		
		);
	}


	if('creative' == $task){
		$slider_array = array(
			'slider_zips/creative/creative.zip',
			'slider_zips/creative/home-2.zip'			
		);
	}


	if('construction' == $task){
		$slider_array = array(
			'slider_zips/construction/construction.zip'			
		);
	}
    
    if('personal' == $task){
		$slider_array = array(
			'slider_zips/personal/personal.zip',
			'slider_zips/personal/personal1.zip'			
		);
	}

	if('finance' == $task){
		$slider_array = array(
			'slider_zips/finance/content.zip',
			'slider_zips/finance/finance.zip'			
		);
	}

	if('minimal' == $task){
		$slider_array = array(
			'slider_zips/minimal/minimal.zip'
					
		);
	}

	if('tattoo' == $task){
		$slider_array = array(
			'slider_zips/tattoo/tatto.zip'
					
		);
	}

	if('gardening' == $task){
		$slider_array = array(
			'slider_zips/gardening/gardening.zip'
					
		);
	}


	if('minimal' == $task){
		$slider_array = array(
			'slider_zips/minimal/minimal.zip'
					
		);

	if('architecture' == $task){
		$slider_array = array(
			'slider_zips/architecture/architecture.zip'
					
		);
	}	
}

	
	$slider = new RevSlider();
	echo '<br />';
	 
	foreach($slider_array as $filepath) {	
		
		
		$slider->importSliderFromPost(true, true, RS_ZIP_FOLDER_PATH.$filepath);  
		
	}
	 
	echo ucfirst($task).' '; echo "Sliders Processed<br /><br />";
	
	ob_start(); ?>
	<a href="<?php echo admin_url() . 'admin.php?page=revslider'; ?>">View Sliders</a>
    <?php echo ob_get_clean();?>