<?php
/*
Element Description: Rs Blog Box*/
    
    // Element Mapping
     function vc_rsBlog_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }  

        $categories = get_categories();
		$category_dropdown = array( 'All Categories' => '0' );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->name] = $category->slug;
		}    
        // Map the block with vc_map()
        vc_map( 
            array(
				'name'        => __('Rs Blog Module', 'rsaddon'),
				'base'        => 'vc_rsBlog',
				'description' => __('Blog Module', 'rsaddon'), 
				'category'    => __('by RS Theme', 'rsaddon'),   
				'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
				'params'      => array(								
		            array(
						"type"       => "dropdown",
						"heading"    => __("Show title", 'rsaddon'),
						"param_name" => "title",
						"value"      => array(				    						
							'Yes' => "Yes", 
							'No'  => "No",											
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Blog Meta", 'rsaddon'),
						"param_name" => "blog_meta",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Author Info", 'rsaddon'),
						"param_name" => "blog_information",
						"value" 	 => array(
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_meta', 'value' => array('yes')),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Category", 'rsaddon'),
						"param_name" => "blog_cat",
						"value" 	 => array(
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_meta', 'value' => array('yes')),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Post Thumbnail", 'rsaddon'),
						"param_name" => "show_thumb",
						"value"      => array(						    						
							'Yes' => "yes", 
							'No' => "no", 																			
						),					
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Date", 'rsaddon'),
						"param_name" => "blog_date",
						"value" 	 => array(
							'No'  => "",								
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'show_thumb', 'value' => array('yes')),
					),			
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Excerpt", 'rsaddon'),
						"param_name" => "show_excerpt",
						"value"      => array(						    						
							'Yes' => "yes", 
							'No' => "no", 																			
						),						
					),                    
                    array(
						"type"       => "dropdown",
						"heading"    => __("Show ReadMore", 'rsaddon'),
						"param_name" => "readmore",
						"value"      => array(
							'Yes' => "Yes",
							'No' => "No",
						),						
					),
					array(
						"type" => "textfield",
						"heading" => __("Read More Text", 'rsaddon'),
						"param_name" => "more_text",
						'description' => __( 'Type your read more text here', 'rsaddon' ),
						"dependency" => Array('element' => 'readmore_type', 'value' => array('rm_text')),
					),
					array(
						"type"       => "dropdown_multi",
						"holder"     => "div",
						"class"      => "",
						"heading"    => __( "Categories", 'rsaddon' ),
						"param_name" => "cat",
						'value'      => $category_dropdown,
					),					
					array(
						"type"       => "dropdown",
						"heading"    => __("Blog Type", 'rsaddon'),
						"param_name" => "blog_style",
						"value"      => array(
							'Slider' => "Slider", 
							'Grid' => "Grid",									
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Select Blog Style", 'rsaddon'),
						"param_name" => "news_style",
						"value"      => array(				    						
							'Style 1' => "style1", 
							'Style 2'  => "style2",											
							'Style 3'  => "style3",											
						),					
					),			
					
					array(
							"type"       => "dropdown",
							"heading"    => __("Blog Column Per Row", 'rsaddon'),
							"param_name" => "pre_row",
							"value"      => array(							
								'One'   => "Col-1", 
								'Two'   => "Col-2",
								'Three' => "Col-3",	
								'Four'  => "Col-4",																						
							),
							"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),						
						),	
					
					array(
						"type" => "textfield",
						"heading" => __("Post Per page", 'rsaddon'),
						"param_name" => "post_per",
						'description' => __( 'Write -1 to show all', 'rsaddon' ),										
					),

					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Pagination", 'rsaddon'),
						"param_name" => "pagination",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),
					),
					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),	
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'rsaddon' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'rsaddon' ) => 'false',
						__( 'Enabled', 'rsaddon' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Arrow", 'rsaddon' ),
					"param_name" => "slider_nav",
					"value" => array(
						__( 'Disabled', 'rsaddon' ) => 'false',
						__( 'Enabled', 'rsaddon' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'rsaddon' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'rsaddon' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'rsaddon' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "rsaddon" )  => '5000',
						__( "4 Seconds", "rsaddon" )  => '4000',
						__( "3 Seconds", "rsaddon" )  => '3000',
						__( "2 Seconds", "rsaddon" )  => '4000',
						__( "1 Seconds", "rsaddon" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'rsaddon' ),
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'rsaddon' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'rsaddon' ),
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'rsaddon' ),
					"param_name" => "slider_loop",
					"value" 	 => array(
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
					),
					"description"=> __( "Loop to first item. Default: Enable", 'rsaddon' ),
					"group" 	 => __( "Slider Options", 'rsaddon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),

					 array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'rsaddon' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rsaddon' ),
					),		 
				
					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'rsaddon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'rsaddon' ),
					),            
                        
                ),			
					
            )
        );                                   
    }
     
  add_action( 'vc_before_init', 'vc_rsBlog_mapping' );    
 
     
   function vc_rsBlog_html( $atts, $content ='' ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					
					'title'                 => 'yes',
					'degination'            => '',	
					'post_per'              => '',	
					'show_excerpt'          => 'Yes',
					'blog_style'            =>'Slider',					
					'news_style'            =>'style1',					
					'blog_meta'             =>'',
					'blog_cat'              =>'',
					'blog_information'      =>'',
					'blog_date'             =>'',
					'show_thumb'            =>'',
					'pre_row'               => 'Col-1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'false',
					'slider_dots'           => 'true',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',
					'el_class'              =>'',				
					'icon_fontawesome'      => 'fa fa-users',					
					'css'                   => '',   
					'cat'                   => '' ,
					'readmore'              => 'Yes',
					'more_text'             => 'Read More',
					'pagination'            => ''
                ), 
                $atts,'vc_rsBlog'
           )
        );

      
	
		$a      = shortcode_atts(array( 'screenshots' => 'screenshots',), $atts);
		$cat    = empty( $cat ) ? '' : $cat;
		$img    = wp_get_attachment_image_src($a["screenshots"], "large");
		$imgSrc = $img[0];
		
		//extract content
		$atts['content'] = $content;
		//extact icon 
		$iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
       
     
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		//custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );


		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='icofont icofont-bubble-left'></i>", "<i class='icofont icofont-bubble-right'></i>" ),
			'dots'               => ( $slider_dots == 'false' ) ? false : true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'stagePadding'       => 12,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 20,
			'stagePadding'       => 0,
			'items'       => 3,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );



		
		if( $blog_style == 'Slider' ){
		
       
        // query post       	
		
		$html='<div class="rs-blog home-blog-area '.$css_class_custom.'">
		<div class="blog-carousel blog-slider owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';                      
		$post_title_show='';
		$degination='';
		$taxonomy='category';
        if( empty($cat) ){
        	$best_wp = new wp_Query(array(
				'posts_per_page' =>$post_per,
				'order' => 'DESC',								
				'tax_query' => array(
					array(                
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( 
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video'
						),
						'operator' => 'NOT IN'
					)
				)
			));	
        }
        else{
			$best_wp = new wp_Query(array(
					'posts_per_page' =>$post_per,
					'order' => 'DESC',
					'category_name'       => $cat,
					'tax_query' => array(
					array(                
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( 
						'post-format-aside',
						'post-format-audio',
						'post-format-chat',
						'post-format-gallery',
						'post-format-image',
						'post-format-link',
						'post-format-quote',
						'post-format-status',
						'post-format-video'
					),
						'operator' => 'NOT IN'
					)
				)
			));	
        }
		
		while($best_wp->have_posts()): $best_wp->the_post();
			    $post_title= get_the_title($best_wp->ID);
			    $post_img_url = '';
			    $post_url=get_post_permalink($best_wp->ID);
			    
			    $post_title= get_the_title($best_wp->ID);
				if( $title == 'yes'){
					$title_show = '<h3 class="blog-title">'.$post_title.'</h3>' ;
				}
				else{
					$title_show = '';
				}


				
				if($degination!='No'){
			    	$designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				$post_date      = get_the_date('d');	
				$post_date2     = get_the_date('M');	
				$full_date      = get_the_date();	
				
				//$post_comment      =get_wp_count_comments($best_wp->ID);
				$post_admin          = get_the_author();
				$post_author_image   = get_avatar(( $best_wp->ID ) , 70 ); 	
				$post_content        = get_the_excerpt(); 
				$user_id             = '';
				$author_desigination = get_the_author_meta( 'position', $user_id );
				$comments_count      = get_comments_number( '0', '1', '%' );	
				$categories          = get_the_category();
				$binfo               = '';
				$blog_cats           = '';
				$show_date           = '';

				if ( ! empty( $categories ) ) {
				    $cat_name = esc_html( $categories[0]->name );
				    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}
				$by = __( "By", 'rsaddon' );		
			
				$readmore_text = ($readmore == 'Yes') ? '<div class="blog-button"><a href="'.esc_url($post_url).'">'.$more_text.'</a></div>' : '';
				if('yes'==$blog_meta){
					if( $blog_information == 'yes'){
						$binfo = '<span class="author">'.$by.' '.$post_admin.'</span><span class="seperator">/</span>' ;
					}
					if('yes'== $blog_cat){
						$blog_cats = '<span class="category"><a href="'.$link.'">'.$cat_name.'</a></span>';
					}
				}
				if( $blog_date == 'yes'){
					$show_date = '<div class="blog-date">
									<span class="date">'.$post_date.' </span>
									<span class="month">'.$post_date2.' </span>		
								</div>';
				}
				
				if('no'!==$show_thumb){
					$post_img_url = get_the_post_thumbnail($best_wp->ID);
				}

				if( $blog_date == 'yes' && !$post_img_url ){
					$show_date = '<div class="full-date">
									'.$full_date.'
								</div>';
				}
				$no_thumb = '';
			    if(!$post_img_url){
			    	$no_thumb = 'no-thumb';
			    }
			    
				if($show_excerpt == 'Yes'){
					$description_text_content = '<div class="blog-desc">
						'.$post_content.'
					</div>';
				}
				else{
					$description_text_content = '';
				}
				if(!empty($description_text_content) || !empty($readmore_text)){
					$blog_description = '<div class="home_full_blog slider-blog-title">
						'.$description_text_content.'
						'.$readmore_text.'
					</div>';
				}else{
					$blog_description = '';
				}
				if('style3'==$news_style){
					$html .='
						<div class="blog-item style3 '.$no_thumb.'">
							<div class="blog-img content-overlay"> 
								a href="'.$post_url.'">'.$post_img_url.'</a>
								'.$show_date.'
								<div class="blog-meta">
									'.$title_show.'
								</div>
							</div>
							<div class="blog-slidermeta blog-date">
							    '.$binfo.'
								'.$blog_cats.'
							</div>
							'.$blog_description.'
					  	</div>';
				}else{
					$html .='
						<div class="blog-item '.$news_style.' '.$no_thumb.'">
							<div class="blog-img content-overlay"> 
								<a href="'.$post_url.'">'.$post_img_url.'</a>
								'.$show_date.'	
							</div>
							<div class="blog-meta">
								'.$title_show.'
							</div>
							<div class="blog-slidermeta blog-date">
							    '.$binfo.'
								'.$blog_cats.'
							</div>
							'.$blog_description.'
					  	</div>';
				}
			endwhile; 
			wp_reset_query();
		}
			else
			{
			$html='<div class="rs-blog-grid rs-blog '.$css_class_custom.'">
					<div class="row">';                      
					$post_title_show='';
					$degination='';
					$categories= '';

					global  $paged;
		            $paged = get_query_var("paged") ? get_query_var("paged"): 1; 

					$best_wp = new wp_Query(array(
						'posts_per_page' =>$post_per,							
						'order' => 'DESC',
						'category_name'       => $cat,
						'paged'			 => $paged,
						'tax_query' => array(
							array(                
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( 
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image',
								'post-format-link',
								'post-format-quote',
								'post-format-status',
								'post-format-video'
							),
							'operator' => 'NOT IN'
							)
						)
					));	
						
					while($best_wp->have_posts()): $best_wp->the_post();

					    $post_title= get_the_title($best_wp->ID);
					    $post_img_url = '';
						$post_url=get_post_permalink($best_wp->ID); 
						if( $title == 'yes'){
							$title_show = '<h3 class="blog-title">'.$post_title.' </h3>' ;
						}
						else{
							$title_show = '';
						}			
								

						
						if($degination!='No'){
						$designation = get_post_meta( get_the_ID(), 'designation', true );
						}

					    if('no'!==$show_thumb){
							$post_img_url = get_the_post_thumbnail($best_wp->ID);
						}
						
						$post_date=get_the_date('d');	
						$post_date2=get_the_date('M');	
						$full_date=get_the_date();	

						//$post_comment=get_wp_count_comments($best_wp->ID);
						$readmore_text = ($readmore == 'Yes') ? '<div class="blog-button"><a href="'.esc_url($post_url).'">'.$more_text.'</a></div>' : '';


						$post_admin=get_the_author();
						$author_link = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
						$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	


						$post_content= get_the_excerpt();
						$description_text_content  = '';
						$binfo               = '';
						$blog_cats           = '';
						$show_date           = '';
						$by = __( "By", 'rsaddon' );
						if('yes'==$blog_meta){
							if( $blog_information == 'yes'){
								$binfo = '<span class="author">'.$by.' '.$post_admin.'</span><span class="seperator">/</span>' ;
							}
						}
						if( $blog_date == 'yes'){
							$show_date = '<div class="blog-date">
											<span class="date">'.$post_date.' </span>
											<span class="month">'.$post_date2.' </span>
										</div>';
						}
						if( $blog_date == 'yes' && !$post_img_url ){
							$show_date = '<div class="full-date">
											'.$full_date.'
										</div>';
						}
						if('no'!==$show_thumb){
							$post_img_url = get_the_post_thumbnail($best_wp->ID);
						}

						$no_thumb = '';
					    if(!$post_img_url){
					    	$no_thumb = 'no-thumb';
					    }

						if($show_excerpt == 'Yes'){
							$description_text_content = '<div class="blog-desc">
								'.$post_content.'
							</div>';
						}

						$user_id='';
						$author_desigination=get_the_author_meta( 'position', $user_id );
						$comments_count=get_comments_number( '0', '1', '%' );
						$categories = get_the_category();						
						

						//checking column grid
						$per_item=$pre_row;
						$col='';
						if($per_item =='Col-1'){				
							$col='12';
							
						}
						if($per_item =='Col-4'){
							$col='3';				
						}
						if($per_item =='Col-2'){				
							$col='6';				
						}
						if($per_item =='Col-3'){				
							$col='4';				
						}

						if('style3'==$news_style){
							$html .='<div class="blog-item col-lg-'.$col.' col-md-12 '.$news_style.'">
									<div class="blog-img image-scale blog-'.$no_thumb.'">
										'.$post_img_url.'
										'.$show_date.'
										<div class="blog-meta">
											'.$title_show.'
										</div> 
								</div>
								<div class="bottom-shadow1 '.$no_thumb.'">
									<div class="blog-meta">					  	
									 	<div class="blog-date">
									 		'.$binfo.'
									 		<span class="categories">';
										 		if('yes'== $blog_cat){
													foreach ( $categories as $category ){
														$cat_link = get_category_link( $category->term_id );
														$html .= '<a href="'.$cat_link.'">'.$category->cat_name.' </a>';
													}
												}
												$html .='</span>
									 									 		
									 	</div>			 	
									</div>
										'.$description_text_content.'
									'.$readmore_text.'
								</div>
							</div>';
						}else{
							$html .='<div class="blog-item col-lg-'.$col.' col-md-12 '.$news_style.'">
									<div class="blog-img image-scale">
										'.$post_img_url.'
										'.$show_date.' 
								</div>
								<div class="bottom-shadow1 '.$no_thumb.'">
									<div class="blog-meta">
										'.$title_show.'						  	
									 	<div class="blog-date">
									 		'.$binfo.'
									 		<span class="categories">';
										 		if('yes'== $blog_cat){
													foreach ( $categories as $category ){
														$cat_link = get_category_link( $category->term_id );
														$html .= '<a href="'.$cat_link.'">'.$category->cat_name.' </a>';
													}
												}
												$html .='</span>
									 									 		
									 	</div>			 	
									</div>
										'.$description_text_content.'
									'.$readmore_text.'
								</div>
							</div>';
						}
			endwhile; 
			wp_reset_query();

			

		}
		$html .='</div>';
		$paginate = paginate_links( array(
						    	'total' => $best_wp->max_num_pages
						));
		if($paginate && $pagination == 'yes'){
			$pagination = '<div class="pagination-area"><div class="nav-links">'.$paginate.'</div></div>';
		}
		else
		{
			$pagination ='';
		}
		$html .=''.$pagination.'</div>';	
			  
	return $html; 
}
add_shortcode( 'vc_rsBlog', 'vc_rsBlog_html' );