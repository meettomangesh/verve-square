<?php
/*
Element Description: Rs Custom Heading*/

// Element Mapping
function vc_banner_mapping() {
     
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
    }
     
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Rs Banner', 'rubrash'),
            'base' => 'rs_banner',
            'description' => __('Insert your banner', 'rubrash'), 
            'category' => __('by RS Theme', 'rubrash'),   
            'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
            'params' => array(
            	array(
                    "type" => "attach_image",
                    "heading" => __("Banner Image", "rubrash"),
                    "param_name" => "image",
                    "value" => "",
                    "description" => __("Select image from media library.", "rubrash"),
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Slider Title', 'rubrash' ),
					'param_name'  => 'title',
					'value'       => __( '', 'rubrash' ),
					'description' => __( 'Heading title area', 'rubrash' ),				   
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Pre Text', 'rubrash' ),
					'param_name'  => 'pre_text',
					'value'       => __( '', 'rubrash' ),
					'description' => __( 'Position pre text here', 'rubrash' ),                       
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'heading'     => __( 'Position Text', 'rubrash' ),
					'param_name'  => 'content',
					'value'       => __( '', 'rubrash' ),
					'description' => __( 'Type writer words here', 'rubrash' ),                   
				),
				array(
					"type" => "dropdown",
					"heading" => __("Select Particles", "rubrash"),
					"param_name" => "particles",
					"value" => array(
						'No' => '',
						'Yes' => 'yes',
					),						
					'description' => __( 'Select banner particles here', 'rubrash' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Read More Button Text', 'rubrash' ),
					'param_name'  => 'read_more',
					'description' => __( 'Set your read more button text here. Leave empty if you no need', 'rubrash' ),
					'group'       => 'Banner Buttons',
				),
				array(
					"type" => "dropdown",
					"heading" => __("Buttons Style", "rubrash"),
					"param_name" => "buttons_style",
					"value" => array(
						'Default' => '',
						'Light' => 'light',
					),						
					'description' => __( 'Select banner buttons style here', 'rubrash' ),
					'group'       => 'Banner Buttons',
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Read More URL (Link)', 'rubrash' ),
					'param_name' => 'read_more_link',
					'description' => __( 'Add link to button.', 'rubrash' ),
					'group'       => 'Banner Buttons',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Download Button Text', 'rubrash' ),
					'param_name'  => 'download',
					'description' => __( 'Set your download button text here. Leave empty if you no need', 'rubrash' ),
					'group'       => 'Banner Buttons',
				),
				array(
					"type" => "dropdown",
					"heading" => __("Select Down Arrow", "rubrash"),
					"param_name" => "down_arrow",
					"value" => array(
						'No' => '',
						'Yes' => 'yes',
					),						
					'description' => __( 'Select banner down arrow here', 'rubrash' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'Download URL (Link)', 'rubrash' ),
					'param_name' => 'download_link',
					'description' => __( 'Add link to button.', 'rubrash' ),
					'group'       => 'Banner Buttons',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Title color", "rubrash" ),
					"param_name" => "titlecolor",
					"value" => '',
					"description" => __( "Choose title color", "rubrash" ),
                    'group' => 'Styles',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Pre Text color", "rubrash" ),
					"param_name" => "pre_text_color",
					"value" => '',
					"description" => __( "Choose pre text color", "rubrash" ),
                    'group' => 'Styles',
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Content color", "rubrash" ),
					"param_name" => "content_color",
					"value" => '',
					"description" => __( "Choose content text color", "rubrash" ),
                    'group' => 'Styles',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'rubrash' ),
					'param_name'  => 'custom_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rubrash' ),
				),                        
     		),
  		)
	);
}
  
add_action( 'vc_before_init', 'vc_banner_mapping' );
  
// Element HTML
function vc_banner_html( $atts,$content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'image'          => '',
					'title'          => '',
					'titlecolor'     => '',
					'pre_text'       => '',
					'pre_text_color' => '',
					'content_color' => '',
					'position'       => '',
					'read_more'      => '',
					'read_more_link' => '',
					'download'       => '',
					'download_link'  => '',
					'buttons_style'  => '',
					'down_arrow'     => '',
					'align'          => '',
					'particles'      => '',
					'banner_id'      => '',
					'custom_class'   => '',
                ), 
                $atts, 'rs_banner'
            )
        );

        $image = wp_get_attachment_image_src( $image, 'full' );


        $read_more_link = ( '||' === $read_more_link ) ? '' : $read_more_link;
        $read_more_link = vc_build_link( $read_more_link );
        $read_use_link = false;
        if ( strlen( $read_more_link['url'] ) > 0 ) {
        	$read_use_link = true;
        	$a_href = $read_more_link['url'];
        	$a_title = $read_more_link['title'];
        	$a_target = $read_more_link['target'];
        }
        
        if ( $read_use_link ) {
        	$read_attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
        	$read_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
        	if ( ! empty( $a_target ) ) {
        		$read_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
        	}
        }
        // $read_attributes="";
        $read_attributes = ($read_attributes) ? implode( ' ', $read_attributes ) : '';


        $download_link = ( '||' === $download_link ) ? '' : $download_link;
        $download_link = vc_build_link( $download_link );
        $downlaod_use_link = false;
        if ( strlen( $download_link['url'] ) > 0 ) {
        	$downlaod_use_link = true;
        	$a_href = $download_link['url'];
        	$a_title = $download_link['title'];
        	$a_target = $download_link['target'];
        }
        
        if ( $downlaod_use_link ) {
        	$downlaod_attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
        	$downlaod_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
        	if ( ! empty( $a_target ) ) {
        		$downlaod_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
        	}
        }
        // $downlaod_attributes="";
        $downlaod_attributes = ($downlaod_attributes) ? implode( ' ', $downlaod_attributes ) : '';

        //extract content
        $atts['content'] = $content;
			
        //custom class added
        $titlecolor = ($titlecolor) ? 'style="color: '.$titlecolor.'"' : '';
        $pre_text_color = ($pre_text_color) ? 'style="color: '.$pre_text_color.'"' : '';
        $content_color = ($content_color) ? 'style="color: '.$content_color.'"' : '';
		$image = ($image) ? ' style="background-image: url('.$image[0].')"' : '';
		$pre_text = ($pre_text) ? '<span '.$pre_text_color.'>'.$pre_text.'</span>' : '';
		$main_title = ($title) ? '<h2 class="banner_title" '.$titlecolor.'>'.$title.'</h2>' : '';
		$read_more = ($read_more) ? '<li><a '.$read_attributes.' class="readon-border smoothAbout">'.$read_more.'</a></li>' : '';
		$download = ($download) ? '<li><a '.$downlaod_attributes.' class="readon-border reverse">'.$download.'</a></li>' : '';
		$banner_id = ($banner_id) ? 'id="'.$banner_id.'"' : '';
		$particles = ($particles) ? '<div id="particles-js"></div>' : '';
		$buttons_style = ($buttons_style) ? ' btn-light' : '';


        $output = '<div '.$banner_id.' class="rs-banner '.$custom_class.'" '.$image.'>
        			'.$particles.'
				    <div class="container">
				        <div class="banner-content">
			                '.$main_title.'

			                <div class="work-position">
			                    <h3>
			                        '.$pre_text.' '.'
			                    </h3>
			                    
			                    <div class="cd-headline clip" '.$content_color.'>
									<div class="cd-words-wrapper">
										<p>'.$atts['content'].'</p>
									</div>
								</div>
			                </div>';

			                if ($read_more !== '' || $download !== '') {
				                $output .= '<div class="banner-button'.$buttons_style.'">
				                    <ul>
				                        '.$read_more.'
				                        '.$download.'				                        
				                    </ul>
				                </div>';
				            }

				        $output .= '</div>
				    </div>';
		            if ($down_arrow !== '') {
		                $output .= '<div class="arrow-btn">
		                    <a href="#rs-about" class="down smoothAbout"><i class="fa fa-angle-double-down"></i></a>
		                </div>';
		            }
				$output .= '</div>';
         
        return $output;
    }
add_shortcode( 'rs_banner', 'vc_banner_html' );