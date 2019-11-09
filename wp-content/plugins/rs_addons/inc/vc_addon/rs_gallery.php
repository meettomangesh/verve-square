<?php
/*
Element Description: Rs Gallery elements
*/
// Element Mapping

function vc_grassyClient_mapping() {
	 
	// Stop all if VC is not enabled
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}
	 
	// Map the block with vc_map()
	vc_map( 
		array(
			'name' => __('Rs Gallery Module', 'appone'),
			'base' => 'vc_grassyClient',
			'description' => __('Rs Gallery Module', 'appone'), 
			'category' => __('by RS Theme', 'appone'),   
			'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',    
			'params' => array( 

			array(
				"type" => "dropdown",
				"heading" => __("How many Column ", "eshkool"),
				"param_name" => "column",
				"value" => array(
					'Two' => "Two",
					'Three' => "Three",
					'Four' => "Four", 
				),
				'std' => "Three", 
			), 

			array(
				"type" => "dropdown",
				"heading" => __("Show Zoom Icon", "eshkool"),
				"param_name" => "show_zoom",
				"value" => array(							    						
					'No'  => "",
					'Yes' => "yes", 
				),						
			), 

			array(
						'type' => 'textfield',
						'holder' => 'h3',						
						'heading' => __( 'Project Per Page', 'finoptis' ),
						'param_name' => 'per_page',
						'value' => __( '', 'finoptis' ),
						'description' => __( 'How many Gallery Image want to show per page', 'finoptis' ),
						'admin_label' => false,
						'weight' => 0,
						'value' => '6'
					   
					),  

			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'appone' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'appone' ),
			),
			array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'appone' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'appone' ),
			),           
		 )
		)
	);                                
	
}
     
 add_action( 'vc_before_init', 'vc_grassyClient_mapping' );
     
    // Element HTML
   function vc_grassyClient_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'column'        =>'Three',
					'per_page'        =>'6',
					'show_zoom'     =>  '',
					'el_class'   => '',					
					'css'        => ''            
                ), 
                $atts,'vc_grassyClient'
           )
        );
	
   
	  
	   //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
	
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
        //******************//
        // query post
        //******************//

        $col_grid='';
		$col_group='';
		$col_full='';
		$col_filter='';
		$col_grid=$column;
		
		if($col_grid =='Two'){
			$col_group = 6;
		}
		if($col_grid =='Three'){
			$col_group = 4;
		}
		
		if($col_grid == 'Four'){
			$col_group = 3;
		}
		
		if($col_grid == 'Full'){
			$col_group=3;
			$col_full='full-grid';		
		}
		
		$html='<div class="rs-galleys '.$css_class.' '.$css_class_custom.'">           
				<div id="rs-galleys" class="row gallery-grid">';       
				$best_wp = new wp_Query(array(
					'posts_per_page' =>$per_page,
					'post_type'=>'gallery',
					'order' => 'DESC',
				));	 
				
				$show_zoom_yes = ($show_zoom != '') ? ' show-zoom-yes' : '';  

				while($best_wp->have_posts()): $best_wp->the_post();
				$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
				$post_title= get_the_title($best_wp->ID);

		$html .='<div class="col-md-'.$col_group.'"> <div class="galley-img">';

				if ($show_zoom != '') {
									
					$html .='<a class="image-popup zoom-icon" href="'.$post_img_url.'" title="'.$post_title.'">
    						<i class="fa fa-search"></i>
    					</a>';
				}

				$html .='					
					<a class="image-popup img-wrap" href="'.$post_img_url.'">
						<img src="'.$post_img_url.'" alt="'.$post_title.'">
					</a>
				</div>
			</div>';
			endwhile; 
			wp_reset_query();
		$html .='</div>
	</div>';
 return $html; 
}
add_shortcode( 'vc_grassyClient', 'vc_grassyClient_html' );