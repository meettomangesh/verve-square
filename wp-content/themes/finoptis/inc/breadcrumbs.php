<?php
	if(is_page()){
		 get_template_part( 'inc/page-header/breadcrumbs' );
	}
	if(is_singular('teams')){
		get_template_part( 'inc/page-header/breadcrumbs-team' );
	}
	if(is_singular('portfolios')){
		get_template_part( 'inc/page-header/breadcrumbs-portfolio');
	}
	if(is_singular('services')){
		get_template_part( 'inc/page-header/breadcrumbs-service');
	}
	if(is_singular('post')){
		get_template_part( 'inc/page-header/breadcrumbs-single' );
	}
	if(is_home() && !is_front_page() || is_home() && is_front_page()){
		get_template_part( 'inc/page-header/breadcrumbs-blog' );
	}	
?>