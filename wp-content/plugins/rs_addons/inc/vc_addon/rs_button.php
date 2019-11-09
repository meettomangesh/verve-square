<?php
/*
Element Description: Rs Button*/
	
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	// Element Mapping
	if ( !class_exists( 'RSTheme_Button_Schedule' ) ) {   
	 
		class RSTheme_Button_Schedule extends RSTheme_VC_Modules {
			public function __construct(){
				$this->name = __( "RS Button", 'rsaddon' );
				$this->base = 'vc_button_title';				
				parent::__construct();
			}

			public function fields(){
				$fields = array(
					array(
						'type' => 'textfield',
						'class' => 'title-class',
						'heading' => __( 'Button Text', 'rs-addon' ),
						'param_name' => 'rs_button',
						'value' => __( '', 'rs-addon' ),
						'description' => __( 'Button', 'rs-addon' ),
						'admin_label' => false,
						'weight' => 0,				   
					),

					array(
						'type' => 'textfield',
						'class' => 'title-class',
						'heading' => __( 'Button link', 'rs-addon' ),
						'param_name' => 'rs_button_link',
						'value' => __( '', 'rs-addon' ),
						'description' => __( 'Button Link', 'rs-addon' ),
						'admin_label' => false,
						'weight' => 0,				   
					), 

					array(
	                    'type'       => 'dropdown',
	                    'heading'    => __( 'Select Button Align', 'rsaddon' ),
	                    'param_name' => 'align',
	                    'value' => array(
	                        __( 'Select' )   => '',
	                        __( 'Left', 'rsaddon' )   => 'left',
	                        __( 'Center', 'rsaddon' )   => 'center',
	                        __( 'Right', 'rsaddon' )  => 'right',
	                    ),
	                ),

					array(
						"type"       => "dropdown",
						"heading"    => __("Button Style", "rs-addon"),
						"param_name" => "button_style",
						"value"      => array(							
							'Flat'   => "flat",																	
							'Border' => "btn-border",																	
						),										
					), 
			
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Text color", "rs-addon" ),
						"param_name" => "buttoncolor",
						"value" => '#3e537c', //Default Red color
						"description" => __( "Choose title color", "rs-addon" ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button border color", "rs-addon" ),
						"param_name" => "bnt_border",
						"value" => '#e2c60c', //Default Red color
						"description" => __( "Choose Button border color", "rs-addon" ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Style',
					),
			
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button background color", "rs-addon" ),
						"param_name" => "bnt_background",
						"value" => '#e2c60c', //Default Red color
						"description" => __( "Choose Button background color", "rs-addon" ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button background Hover color", "rs-addon" ),
						"param_name" => "bnt_background_hover",
						"value" => '#28406d', //Default Red color
						"description" => __( "Choose Button background color", "rs-addon" ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Text color", "rs-addon" ),
						"param_name" => "bnt_hover_text",
						"value" => '#fff', //Default Red color
						"description" => __( "Choose Button background color", "rs-addon" ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Style',
					),

					
			
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS box', 'rs-addon' ),
						'param_name' => 'css',
						'group' => __( 'Design Options', 'rs-addon' ),
					),
				);
				return $fields;
			}

			// Element HTML
		    public function shortcode( $atts, $content = '' ) {
		    	$attributes = array();
		        // Params extraction
		        extract(
		            shortcode_atts(
		                array(
							'rs_button'            => 'Read More',
							'align'                => 'left', 
							'buttoncolor'          => '#3e537c',					
							'bnt_background'       => '#e2c60c',					
							'bnt_background_hover' => '#28406d',					
							'bnt_hover_text'       => '#fff',					
							'rs_button_link'       => '',				
							'button_style'         => '',
							'bnt_border'		   => '',				
							'el_fontsize'          => '18px',
							'css'                  => ''
		                ), 
		                $atts, 'vc_button_title'
		            )
		        );

		        //for css edit box value extract
				$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
				
				//fontsize
				$wrapper_classes_font = array($el_fontsize) ;			
				$class_to_font = implode( ' ', array_filter( $wrapper_classes_font ) );		
				$css_class_font = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_font, $atts );
				$normal_btn = $buttoncolor;
				$button_leave = $bnt_background;
				//custom color added
				/*$buttonstyle = ($buttoncolor) ? ' style="color: '.$buttoncolor.'"' : '';
				if(!empty($bnt_background)){
					$buttonstyle = ($bnt_background) ? ' style="background: '.$bnt_background.'"' : '';
					if(!empty($buttoncolor)){
						$buttonstyle = ($bnt_background) ? ' style="background: '.$bnt_background.'; color: '.$buttoncolor.'"' : '';
					}
				}

				$border_button_style = ($buttoncolor) ? ' style="color: '.$buttoncolor.'"' : '';
				if(!empty($bnt_background)){
					$border_button_style = ($bnt_background) ? ' style="border-color: '.$bnt_background.'"' : '';
					if(!empty($buttoncolor)){
						$border_button_style = ($bnt_background) ? ' style="border-color: '.$bnt_background.'; color: '.$buttoncolor.'"' : '';
					}
				}*/

				switch ( $button_style ) {

		    		case 'btn-border':
						$template = 'border-button';
						break;

					case 'flat':
						$template = 'flat-button';
						break;

					default:
						$template = 'flat-button';
						break;
				}
				return $this->template( $template, get_defined_vars() );
		    }
		}
	}
	new RSTheme_Button_Schedule;