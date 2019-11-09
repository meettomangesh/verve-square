<?php

	function slider_revolution_auto_importer_admin() {

		ob_start(); ?>

		<div class="slider-notice"><h3> Import Slider Related to Your Demo</h3></div>
        
		<div class="wrap-import">        
			<form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=business">            
            	<button type="submit" name="submit">Import Business Slider</button>                
            </form>
        </div>

        <div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=medical">            	
            	<button type="submit" name="submit">Import Medical Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=creative">            	
            	<button type="submit" name="submit">Import Creative Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=consulting">            	
            	<button type="submit" name="submit">Import Consulting Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=construction">            	
            	<button type="submit" name="submit">Import Construction Slider</button>                
            </form>            
		</div>
		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=personal">            	
            	<button type="submit" name="submit">Import Personal Slider</button>                
            </form>            
		</div>
		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=finance">            	
            	<button type="submit" name="submit">Import Finance Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=minimal">            	
            	<button type="submit" name="submit">Import Minimal Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=architecture">            	
            	<button type="submit" name="submit">Import Architecture Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=tattoo">            	
            	<button type="submit" name="submit">Import Tattoo Slider</button>                
            </form>            
		</div>

		<div class="wrap-import">
            <form method ="POST" action="<?php echo plugins_url('rs_framework/inc/import/'); ?>includes/auto-importer.php?task=gardening">            	
            	<button type="submit" name="submit">Import Gardening Slider</button>                
            </form>            
		</div>
		<?php echo ob_get_clean();

	}
	
	function slider_revolution_auto_importer_add_admin() {
		
		add_submenu_page(		
			'themes.php', 
			'import_sliders',
			'Import Sliders', 
			'manage_options', 
			'import_sliders',
			'slider_revolution_auto_importer_admin'
			
		); 

	}
	
	add_action('admin_menu', 'slider_revolution_auto_importer_add_admin');	

?>