<?php
/*
Element Description: rs Call to Box
*/
 
// Element Class 

function rs_call_to_action() {   

  // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('RS Call to Action', 'rsaddon'),
                'base' => 'vc_rsCallBox',
                'description' => __('RS Call to Action Information', 'rsaddon'), 
                'category' => __('by RS Theme', 'rsaddon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array( 

                	array(
	                    "type" => "dropdown",
	                    "heading" => __("Select Style", "rsaddon"),
	                    "param_name" => "cta_style",
	                    "value" => array(
							__( 'Style 1', 'rsaddon') => 'Style 1',
							__( 'Style 2', 'rsaddon') => 'Style 2',
							__( 'Style 3', 'rsaddon') => 'Style 3',
	                    ),
	                ), 
	                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'rsaddon' ),
                        'param_name' => 'cta_title',
                        'value' => __( '', 'rsaddon' ),
                        'description' => __( 'Call to action title here', 'rsaddon' ),
                        'admin_label' => false,
                        'weight' => 0,                       
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'Sub Title', 'rsaddon' ),
                        'param_name' => 'cta_subtitle',
                        'value' => __( '', 'rsaddon' ),
                        'description' => __( 'Call to action sub title here', 'rsaddon' ),
                        'admin_label' => false,
                        'weight' => 0,                       
                    ),

                    array(
						"type"        => "attach_image",
						"heading"     => __( "Call to Action Logo", "rsaddon" ),
						"description" => __( "Add cta logo here", "rsaddon" ),
						"param_name"  => "cta_logo",
						"value"       => "",
					),								
										
					array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'tag-btn',
                        'heading' => __( 'Button Text', 'rsaddon' ),
                        'param_name' => 'tag_btn',
                        'value' => __( '', 'rsaddon' ),
                        'description' => __( 'Tag line button text here', 'rsaddon' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),	
					
					array(
						'type' => 'vc_link',
						'heading' => __( 'Button URL (Link)', 'rsaddon' ),
						'param_name' => 'tag_link',
						'description' => __( 'Add link to button.', 'rsaddon' ),
					),

					array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'btn-hints',
                        'heading' => __( 'Button Below Text', 'rsaddon' ),
                        'param_name' => 'btn_hints',
                        'value' => __( '', 'rsaddon' ),
                        'description' => __( 'Button below text here', 'rsaddon' ),
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
						"heading" => __( "Title color", "rsaddon" ),
						"param_name" => "title_color",
						"value" => '#4caf50', //Default Red color
						"description" => __( "Choose title color", "rsaddon" ),
                        'group' => 'Style',
					 ),

					array(
                        'type' => 'textfield',
                        'class' => 'title-fontsize',
                        'heading' => __( 'Title Font Size', 'rsaddon' ),
                        'param_name' => 'title_fontsize',
                        'value' => __( '40px', 'rsaddon' ),
                        'description' => __( 'Enter title font size here', 'rsaddon' ),
                        'group' => 'Style',                      
                    ),
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Sub Title Color", "rsaddon" ),
						"param_name" => "subtitle_color",
						"value" => '#212121', //Default Red color
						"description" => __( "Choose sub title color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					 array(
                        'type' => 'textfield',
                        'class' => 'title-fontsize',
                        'heading' => __( 'Sub Title Font Size', 'rsaddon' ),
                        'param_name' => 'subtitle_fontsize',
                        'value' => __( '20px', 'rsaddon' ),
                        'description' => __( 'Enter sub title font size here', 'rsaddon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',        
                    ),
                     
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Background color", "rsaddon" ),
						"param_name" => "btn_bg",
						"value" => '#e2c60c', //Default Red color
						"description" => __( "Choose Button color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Text Color", "rsaddon" ),
						"param_name" => "btn_text_color",
						"value" => '#212121', //Default color
						"description" => __( "Choose button text color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
                     
					  array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Background color", "rsaddon" ),
						"param_name" => "btn_hover_bg",
						"value" => '#3e537c', //Default color
						"description" => __( "Choose hover background color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					  array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Border Color", "rsaddon" ),
						"param_name" => "bnt_border",
						"value" => '#3e537c', //Default color
						"description" => __( "Choose color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Text Color", "rsaddon" ),
						"param_name" => "btn_hover_text_color",
						"value" => '#212121', //Default color
						"description" => __( "Choose button hover text color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					 array(
                        'type' => 'textfield',
                        'class' => 'hints-fontsize',
                        'heading' => __( 'Note Text Font Size', 'rsaddon' ),
                        'param_name' => 'hints_fontsize',
                        'value' => __( '12px', 'rsaddon' ),
                        'description' => __( 'Enter note font size here', 'rsaddon' ),
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
	
add_action( 'vc_before_init', 'rs_call_to_action' );

/*
*
* @param array $atts    - the attributes of shortcode
* @param string $content - the content between the shortcodes tags
*
* @return string $html - the HTML content for this shortcode.
*/
// Element HTML
 function vc_rsCallBox_html( $atts, $content ) {
         $attributes = array();
        // Params extraction
         extract(
			$atts = shortcode_atts(	
                array(
					'cta_style'            => 'Style 1',
					'cta_title'            => '',
					'cta_subtitle'         => '',
					'cta_logo'             => '',
					'tag_btn'              => '',
					'tag_link'             => '',
					'btn_hints'            =>'',
					'hints_fontsize'       =>'12px',
					'title_color'          => '',
					'title_fontsize'       => '40px',
					'subtitle_color'       => '',
					'subtitle_fontsize'    => '20px',
					'btn_bg'               => '#e2c60c',
					'btn_text_color'       => '#212121',
					'btn_hover_bg'         => '#3e537c',
					'btn_hover_text_color' => '#212121',
					'bnt_border'		   =>'',
					'el_class'             =>'',
					'css'                  => ''
                ), 
                $atts,'vc_rsCallBox'
            )
        );

         $a = shortcode_atts(array(
          'cta_logo' => 'cta_logo',
        ), $atts);
        $img = wp_get_attachment_image_src($a["cta_logo"], "large");
        $imgSrc = $img[0];

		//extract content
		$atts['content'] = $content;
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		//parse link for vc link		
		$tag_link = ( '||' === $tag_link ) ? '' : $tag_link;
		$tag_link = vc_build_link( $tag_link );
		$use_link = false;
		if ( strlen( $tag_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $tag_link['url'];
			$a_title = $tag_link['title'];
			$a_target = $tag_link['target'];
		}
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		$btn_style = '';

		if(!empty($title_fontsize) && empty($title_color)){
			$title_style = 'style="font-size: '.$title_fontsize.'; line-height: 1.2 "';				
		}
		if(!empty($title_color)){
			$title_style = ($title_color) ? ' style="color: '.$title_color.'"' : '';
			if(!empty($title_fontsize)){
				$title_style = 'style="color: '.$title_color.'; font-size: '.$title_fontsize.'; line-height: 1.2 "';				
			}
		}

		if(!empty($subtitle_fontsize) && empty($subtitle_color)){
			$sub_title_style = 'style="font-size: '.$subtitle_fontsize.'; "';				
		}
		if(!empty($subtitle_color)){
			$sub_title_style = ($subtitle_color) ? ' style="color: '.$subtitle_color.'"' : '';
			if(!empty($title_fontsize)){
				$sub_title_style = 'style="color: '.$subtitle_color.'; font-size: '.$subtitle_fontsize.'; "';			
			}
		}

		if( !empty($hints_fontsize) ){
			$hints_style = 'style="font-size: '.$hints_fontsize.'; line-height: '.$hints_fontsize.' "';				
		}



		if(!empty($btn_bg) && empty($btn_text_color)){
			$btn_style .= 'background: '.$btn_bg.';';				
		}
		if(!empty($btn_text_color)){
			$btn_style .= 'color: '.$btn_text_color.';';
			if(!empty($btn_bg)){
				$btn_style .= 'background: '.$btn_bg.'; color: '.$btn_text_color.';';			
			}
		}

		if(!empty($bnt_border)){
			$btn_style .= 'border-color:'.$bnt_border.';';
		}
		

		$cta_title    = ($cta_title) ? '<h2 '.$title_style.' class="exp-title">'.$atts['cta_title'].'</h2>' : "";
		$cta_style_class    = ($cta_style=="Style 1") ? 'style1' : "style2";
		$cta_subtitle = ($cta_subtitle) ? '<p '.$sub_title_style.' class="eta-subtitle">'.$atts['cta_subtitle'].'</p>' : "";
		$btn_hints    = ($btn_hints) ? '<p '.$hints_style.' class="cta-hints">'.$atts['btn_hints'].'</p>' : "";
		$imgSrc       = ($imgSrc) ? '<div class="title-img"><img src="'.$imgSrc.'" alt="" /></div>' : '';
      	
      	if("Style 1"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-2 col-md-2">
									'.$imgSrc.'
								</div>
								<div class="col-lg-7 col-md-7">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a '. $attributes .' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-8">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a ' . $attributes . ' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			}
			
        }
        if("Style 2"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							'.$imgSrc.'
							<div class="title-wrap">
								'.$cta_title.'
								'.$cta_subtitle.'
							</div>
							<div class="button-wrap">
								<a ' . $attributes . ' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
								'.$btn_hints.'
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="title-wrap">
								'.$cta_title.'
								'.$cta_subtitle.'
							</div>
							<div class="button-wrap">
								<a ' . $attributes . ' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
								'.$btn_hints.'
							</div>
						</div>
					</div>';
			}
			
        }
        if("Style 3"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									'.$imgSrc.'
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a ' . $attributes . ' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-8">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a ' . $attributes . ' class="readon" data-onhovercolor="'.$btn_hover_text_color.'" data-onhoverbg="'.$btn_hover_bg.'" data-onleavebg="'.$btn_bg.'" data-onleavecolor="'.$btn_text_color.'" data-bordercolor="'.$bnt_border.'" style="'.$btn_style.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			}			
        }     
	return $html;
  }
add_shortcode( 'vc_rsCallBox', 'vc_rsCallBox_html' );
?>