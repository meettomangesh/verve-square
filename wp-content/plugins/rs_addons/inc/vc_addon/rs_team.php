<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
    function vc_grassyTeam_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'rs-addon' ) => '0' );	
        $args = array(
            'taxonomy' => array('team-category'),//ur taxonomy
            'hide_empty' => true,                  
        );

		$terms_= new WP_Term_Query( $args );
		foreach ( (array)$terms_->terms as $term ) {
			$category_dropdown[$term->name] = $term->slug;		
		} 
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Team Showcase', 'rs-addon'),
                'base' => 'vc_grassyTeam',
                'description' => __('Rs Team Showcase Information', 'rs-addon'), 
                'category' => __('by RS Theme', 'rs-addon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(


                	array(
						"type" => "dropdown",
						"heading" => __("Select Team Style", "rs-addon"),
						"param_name" => "slider_style",
						"value" => array(							
							'Style 1' => "team-slider-style1", 
							'Style 2' => "team-slider-style2",
							'Style 3' => "team-slider-style3"
						),
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
						"type" => "dropdown",
						"heading" => __("Select Team Style", "rs-addon"),
						"param_name" => "grid_style",
						"value" => array(							
							'Style 1' => "team-grid-style1", 
							'Style 2' => "team-grid-style2",
							'Style 3' => "team-grid-style3",
							'Style 4' => "team-style4",
							'Style 5' => "team-style5"
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
					),

					array(
						"type" => "dropdown",
						"heading" => __("Select Team Grid", "rs-addon"),
						"param_name" => "team_col",
						"value" => array(							
							'2 Column' => "2 Column", 
							'3 Column' => "3 Column",
							'4 Column' => "4 Column",
							'6 Column' => "6 Column",
							'Full Width' => "Full Width"																	
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
						
					),	
				
					  
                         
                    array(

						"type" => "dropdown",
						"heading" => __("Show title", "rs-addon"),
						"param_name" => "title",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",						
						),						
					),  
					array(
					"type" => "dropdown_multi",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'rs-addon' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),                    
             				
					array(
						"type" => "dropdown",
						"heading" => __("Show Degination", "rs-addon"),
						"param_name" => "degination",
						"value" => array(	
							'Select'=> '',
							'Yes' => "Yes", 
							'No' => "No",																								
						),
						
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Short Description", 'rs-addon'),
						"param_name" => "description",
						"value" => array(

							'Yes' => "Yes", 
							'No' => "No", 	

						),
						"dependency" => Array('element' => 'grid_style', 'value' => array('team-grid-style2', 'team-grid-style3')),	
						
					),

					array(
						"type" => "dropdown",
						"heading" => __("Content Alignment", 'rs-addon'),
						"param_name" => "content_align",
						"value" => array(

							'Left' => "text-left", 
							'Center' => "text-center", 	
							'Right' => "text-right", 	

						),
						"dependency" => Array('element' => 'grid_style', 'value' => array('team-grid-style2', 'team-grid-style3')),	
						
					),


					
					array(
						"type" => "textfield",
						"heading" => __("Team Per Pgae", "rs-addon"),
						"param_name" => "team_per",
						'value' => -1,
						'description' => __( 'You can write how many team member show. ex(2)', 'rs-addon' ),					
					),	


					array(
						"type" => "dropdown",
						"heading" => __("Team Type", "rs-addon"),
						"param_name" => "type",
						"value" => array(							
							'Slider' => "Slider", 
							'Grid' => "Grid"											
						),
						
					),

					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Pagination", 'rsaddon'),
						"param_name" => "pagination_team",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
					),

					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'rs-addon' ),
					"param_name" => "col_lg",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'rs-addon' ),
					"param_name" => "col_md",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'rs-addon' ),
					"param_name" => "col_sm",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'rs-addon' ),
					"param_name" => "col_xs",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "2",
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'rs-addon' ),
					"param_name" => "col_mobile",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "1",
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'rs-addon' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'rs-addon' ) => 'false',
						__( 'Enabled', 'rs-addon' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'rs-addon' ),
					"group" => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'rs-addon' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "rs-addon" )  => 'true',
						__( "Disable", "rs-addon" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'rs-addon' ),
					"group" => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'rs-addon' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "rs-addon" )  => 'true',
						__( "Disable", "rs-addon" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'rs-addon' ),
					"group" => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'rs-addon' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "rs-addon" )  => '5000',
						__( "4 Seconds", "rs-addon" )  => '4000',
						__( "3 Seconds", "rs-addon" )  => '3000',
						__( "2 Seconds", "rs-addon" )  => '4000',
						__( "1 Seconds", "rs-addon" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'rs-addon' ),
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'rs-addon' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'rs-addon' ),
					"group" 	  => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'rs-addon' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "rs-addon" )  => 'true',
						__( "Disable", "rs-addon" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'rs-addon' ),
					"group" 	 => __( "Slider Options", 'rs-addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'rs-addon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'rs-addon' ),
				),            
                        
                ),
				
					
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_grassyTeam_mapping' );
     
    // Element HTML
    function vc_grassyTeam_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'                 => '',
					'degination'            => '',		
					'description'           => '',	
					'content_align'         => 'text-left',	
					'team_per'              => '-1',			
					'type'                  => 'Slider',	
					'team_col'              => '',
					'slider_style'          => 'team-slider-style1',
					'grid_style'            => 'team-grid-style1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'true',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',				
					'css'                   => '' ,
					'cat'					=> '',  
					'pagination_team'  => ''           
					), 
                $atts,'vc_grassyTeam'
           )
        );

	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
		
		//extract content
		$atts['content'] = $content;

		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'true' ) ? true : false,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );          


        if($type == 'Slider'){

		$html='<div class="rs-team '.$slider_style.'">
		<div class="team-carousel owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';		
		$post_title_show='';
		$degination='';
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }  

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
					
		    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
		    $post_url=get_post_permalink($best_wp->ID); 
			
			if($degination!='No'){
		    	$designation = get_post_meta( get_the_ID(), 'designation', true );
			}
		    
			if($description!='No'){
		    $description_team = get_post_meta( get_the_ID(), 'description', true );
			}
		   
			//retrive social icon values
			
			 $facebook = get_post_meta( get_the_ID(), 'facebook', true );
			 $twitter = get_post_meta( get_the_ID(), 'twitter', true );
			 $google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
			 $linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			 $fb='';
			 $tw='';
			 $gp='';
			 $ldin='';				 
			if($facebook!=''){
				$fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter!=''){
				$tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus!=''){
				$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin!=''){
				$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}				 
			$team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
			<span class="team-title">'.$designation.'</span>';



			if ($slider_style == 'team-slider-style2') {
				$html .='<div class="team-item-wrap">
				    <div class="team-img">
					    <div class="team-img-sec">
					        <img src="'.$post_img_url.'" alt="'.$post_title.'" />   				                
			                  	<div class="team-social">			  
			                  	  '.$fb.'
			                	  '.$gp.'
			                	  '.$tw.'
			                	  '.$ldin.'	
			                  	</div>
			            </div>
			            <div class="wrap-text text-center">
					        <div class="normal-text">
					            '.$team_normal_text.'
					        </div>
				        </div>
				    </div>				    
				</div>';
			}


			else if($slider_style == 'team-slider-style3') {
				$html .='<div class="team-item-wrap '.$slider_style.'">
				    <div class="team-img">
					    <div class="team-img-sec">
					        <img src="'.$post_img_url.'" alt="'.$post_title.'" />
					        	<div class="team-content">
							        '.$team_normal_text.'
							        <p class="team-desc">'.$description_team.'</p>				                
				                  	<div class="team-social">			  
				                  	  '.$fb.'
				                	  '.$gp.'
				                	  '.$tw.'
				                	  '.$ldin.'	
				                  	</div>
			                  	</div>
			            </div>
				    </div>				    
				</div>';
			}

			else {
				$html .='<div class="team-item">
					<div class="team-inner-wrap">
						<img src="'.$post_img_url.'" alt="'.$post_title.'" />	

							<div class="team-content1">
							  <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
							  <span class="team-title">'.$designation.'</span>
							</div>						   
					        <div class="social-icons1">
								'.$fb.'
								'.$gp.'
								'.$tw.'
								'.$ldin.'
					        </div>					
			  		</div>
				</div>';
			}				 	
			
		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;
    return $html; 
    }


	if($type == 'Grid'){
		//Slect grid layout
		 $team_col_grid ='';		
		//echo $team_col;
        if($team_col == '2 Column'){
        	$team_col_grid = 6;
        }
        if($team_col == '3 Column'){
        	$team_col_grid = 4;
        }
        if($team_col == '4 Column'){
        	$team_col_grid = 3;
        }
        if($team_col == '6 Column'){
        	$team_col_grid = 2;
        }
        if($team_col == 'Full Width'){
        	$team_col_grid = 12;
        }

        $html='<div class="rs-team-grid rs-team '.$grid_style.'">
		<div class="row">';		
		$post_title_show='';		
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
				

		    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');


		    $post_url=get_post_permalink($best_wp->ID); 
			
			if($degination!='No'){
		    	$designation = get_post_meta( get_the_ID(), 'designation', true );
			}
		    
			if($description!='No'){
		    	$description_team = get_post_meta( get_the_ID(), 'description', true );
			}
		   
			//retrive social icon values
			
			$facebook    = get_post_meta( get_the_ID(), 'facebook', true );
			$twitter     = get_post_meta( get_the_ID(), 'twitter', true );
			$google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
			$linkedin    = get_post_meta( get_the_ID(), 'linkedin', true );
			$show_phone  = get_post_meta( get_the_ID(), 'phone', true );
			$show_email  = get_post_meta( get_the_ID(), 'email', true );

			 $fb='';
			 $tw='';
			 $gp='';
			 $ldin='';				 
			if($facebook!=''){
				$fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter!=''){
				$tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus!=''){
				$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin!=''){
				$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}

			$team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
			<span class="team-title">'.$designation.'</span>';

			$degination_show3 = ($degination == 'Yes') ? '<div class="designation">'.get_post_meta( get_the_ID(), 'designation', true ).'</div>' : '';


			if ($grid_style == 'team-grid-style2') {
				$html .='<div class="col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$grid_style.'">				
						<div class="team-item-wrap">
						    <div class="team-img">
							    <div class="team-img-sec">
							    	<a href="'.$post_url.'">
							        	<img src="'.$post_img_url.'" alt="'.$post_title.'" />   
							        </a>				                
				                  	<div class="team-social">			  
				                  	  '.$fb.'
				                	  '.$gp.'
				                	  '.$tw.'
				                	  '.$ldin.'	
				                  	</div>
					            </div>
					            <div class="wrap-text '.$content_align.'">
							        <div class="normal-text">
							            '.$team_normal_text.'
							        </div>
							        <p class="team-desc">'.$description_team.'</p>
							    </div>
						    </div>				    
						</div>				    
					</div>';
			}


			else if($grid_style == 'team-grid-style3') {
				$html .='<div class="col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$grid_style.'">
				<div class="team-item-wrap">
					    <div class="team-img">
						    <div class="team-img-sec">
						    	<a href="'.$post_url.'">
						        	<img src="'.$post_img_url.'" alt="'.$post_title.'" />
						        </a>
					        	<div class="team-content">
							        '.$team_normal_text.'
							        <p class="team-desc">'.$description_team.'</p>				                
				                  	<div class="team-social">			  
				                  	  '.$fb.'
				                	  '.$gp.'
				                	  '.$tw.'
				                	  '.$ldin.'	
				                  	</div>
			                  	</div>
				            </div>
					    </div>				    
				    </div>				    
				</div>';
			}



			elseif($grid_style == 'team-style4') {
			$html .='<div class="team-item col-md-'.$team_col_grid.' col-sm-6 col-xs-12">
					<div class="team-wrapper">
					    <div class="team_photo">
					        <a href="'.$post_url.'">
								<img src="'.$post_img_url.'" class="img_team" alt="'.$post_title.'" />
					        </a>
					    </div>
					    <div class="team_desc">
					        <div class="name">
					        	<a href="'.$post_url.'">'.$post_title_show.'</a>
					            '.$degination_show3.'
					        </div>

					        <div class="team-social">
								'.$fb.'
								'.$gp.'
								'.$tw.'
								'.$ldin.'
					        </div>
					    </div>
					</div>
			  	</div>';
			}



			elseif( $grid_style =='team-style5' ){	
				$html .='<div class="col-md-'.$team_col_grid.' HH col-sm-6 col-xs-12 '.$grid_style.'">
						<div class="team-item">
							<div class="team-item-inner">
								<a href="'.$post_url.'">
									<img src="'.$post_img_url.'" alt="'.$post_title.'" />
								</a>
								<div class="normal-text">
									<span class="person-name"><a href="'.$post_url.'">'.$post_title_show.'</a></span>
									'.$degination_show3.'
									<p class="team-text">'.$description_team.'</p>
									<div class="social-icons">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
								</div>
							</div>
					  	</div>
		  		</div>';
			}

			else {
				$html .='<div class="col-md-'.$team_col_grid.' col-sm-6 col-xs-12">
					<div class="team-item">
						<div class="team-inner-wrap">
							<a href="'.$post_url.'">
								<img src="'.$post_img_url.'" alt="'.$post_title.'" />
							</a>	
							<div class="team-content1">
							  <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
							  <span class="team-title">'.$designation.'</span>
							</div>						   
					        <div class="social-icons1">
								'.$fb.'
								'.$gp.'
								'.$tw.'
								'.$ldin.'
					        </div>					
				  		</div>
			  		</div>
				</div>';
			}				 	
			
		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;


	$paginaiton = paginate_links( array(
		'total' => $best_wp->max_num_pages
	));
	if( $paginaiton && $pagination_team == 'yes' ){
		    $pagination_page = paginate_links( array(
		    	'total' => $best_wp->max_num_pages
		    ));
		$html .=  '<div class="pagination-area pagination-gap"><div class="nav-links">'.$pagination_page.'</div></div>';  
	}

        return $html; 
	}
}

add_shortcode( 'vc_grassyTeam', 'vc_grassyTeam_html' );