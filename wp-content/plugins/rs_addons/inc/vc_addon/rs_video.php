<?php
/*
Element Description: Rs Custom Video*/

    // Element Mapping
    function vc_video_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Video', 'rsaddon'),
                'base' => 'vc_video',
                'description' => __('Rs Video Addon', 'rsaddon'), 
                'category' => __('by RS Theme', 'rsaddon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(

            	array(
					"type" => "dropdown",
					"heading" => __("Select Video Style", "rsaddon"),
					"param_name" => "video_style",
					"value" => array(									
						'Style 1' => "Style 1",						
						'Style 2' => "Style2", 
					),						
				),

             	array(
                     "type" => "attach_image",
                     "heading" => __("Video Image", "rsaddon"),
                     "param_name" => "image",
                     "value" => "",
                     "description" => __("Select image from media library.", "rsaddon"),
                 ), 
				

			array(
				'type' => 'textarea_html',
				'holder' => 'h4',
				'class' => 'text-class',
				'heading' => __( 'Text', 'rsaddon' ),
				'param_name' => 'description',
				'value' => __( '', 'rsaddon' ),
				'description' => __( 'Description text here', 'rsaddon' ),
				'admin_label' => false,
				'weight' => 0,  
                "dependency" => Array('element' => 'video_style', 'value' => array('Style 1')),                    
			),	

			array(
				'type' => 'textfield',
				'heading' => __( 'Video link', 'rsaddon' ),
				'param_name' => 'video_link',
				'value' => __( '', 'rsaddon' ),
				'description' => __( 'Video link here', 'rsaddon' ),
				'admin_label' => false,
				'weight' => 0,
			   
			),

			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'rsaddon' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rsaddon' ),
			),		

			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Background color", 'rsaddon' ),
				"param_name" => "backgroundcolor",
				"value" => '#2280fc', //Default Red color
				"description" => __( "Choose Background color", 'rsaddon' ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
			),  

			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Border color", 'rsaddon' ),
				"param_name" => "bordercolor",
				"value" => '#2280fc', //Default Red color
				"description" => __( "Choose Border color", 'rsaddon' ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
			),  

			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Icon color", 'rsaddon' ),
				"param_name" => "iconcolor",
				"value" => '#2280fc', //Default Red color
				"description" => __( "Choose Icon color", 'rsaddon' ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
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
  
add_action( 'vc_before_init', 'vc_video_mapping' );
  
 // Element HTML
 function vc_video_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(					
					'image'                  => '',
					'title'                  => '',
					'backgroundcolor'        => '#2280fc',
					'bordercolor'        => '#2280fc',
					'iconcolor'              => '#fff',
					'video_style'            => 'style1',
					'subcolor'               => '',                   
					'description'            => '',                    
					'video_link'             => '',                    
					'font_heading_container' => '',
					'el_class'               =>'',
					'css'                    => ''
                ), 
                $atts, 'vc_video'
            )
        );
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
         //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
  		$a = shortcode_atts(array(
  		    'screenshots' => 'screenshots',
  		), $atts);

  		$image = wp_get_attachment_image_src( $image, 'full' );
  		$rand = rand(1, 30);

        // Fill $html var with data



  		if ($video_style == 'Style2') {
  			$html = '<div class="rs-video-2 '.$video_style.' video-item-'.$rand.'">';

   					if ($image) {
				    	$html .= '<img src="'.$image[0].'" alt="'.esc_attr($title).'">';
   					}

				    $html .= '<a style="background-color:'.$backgroundcolor.'!important" class="popup-videos" href="'.esc_attr($video_link).'" title="'.esc_attr($title).'">
						<i class="fa fa-play"></i>
					</a>
				    <div class="video-circle1" style="color:'.$backgroundcolor.' !important; border-color:'.$bordercolor.'"></div>
				    <div class="video-circle2" style="border-color:'.$bordercolor.'!important"></div>

			</div>';
  		}

  		else{
  			$html = '<div class="rs-video-2 video-item-'.$rand.'">';

   					if ($image) {
				    	$html .= '<img src="'.$image[0].'" alt="'.esc_attr($title).'">';
   					}

				    $html .= '<a style="background-color:'.$backgroundcolor.'!important" class="popup-videos" href="'.esc_attr($video_link).'" title="'.esc_attr($title).'">
						<i class="fa fa-play"></i>
					</a>
				    <div class="video-desc" style="color:'.$backgroundcolor.'!important">'.$description.'</div>
				    <div class="overly-border" style="border-color:'.$bordercolor.'!important"></div>
			</div>';

			$html .= '<style>				 
			 	.rs-video-2.video-item-'.$rand.' .popup-videos::before{
				 	background-color:'.$backgroundcolor.' !important;
				}
				.rs-video-2.video-item-'.$rand.' .popup-videos i:before{
				 	color:'.$iconcolor.' !important;
				}			
				
			 </style>';
  		}

   		

		return $html;



			     	
    }

add_shortcode( 'vc_video', 'vc_video_html' );