<?php
/*
Element Description: Rs Custom Heading*/

    // Element Mapping
    function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Heading', 'bstart'),
                'base' => 'vc_infobox',
                'description' => __('Rs heading box', 'bstart'), 
                'category' => __('by RS Theme', 'bstart'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(  

	                array(
	                    "type" => "dropdown",
	                    "heading" => __("Select Style", "bstart"),
	                    "param_name" => "style",
	                    "value" => array(
							__( 'Default', 'bstart')              => '',
							__( 'Border Right Dark', 'bstart')    => 'style1',
							__( 'Border Right Light', 'bstart')   => 'style1 light',
							__( 'Border Bottom Dark', 'bstart')   => 'style2',
							__( 'Border Bottom Light', 'bstart')  => 'style2 light',
							__('Border Left Dark', 'bstart')      => 'style3',
							__('Border Left Light', 'bstart')     => 'style3 light',
							__('Border Top Left Dark', 'bstart')  => 'style6',
							__('Border Top Left Light', 'bstart')  => 'style6 light',
							__('Border Top Right Dark', 'bstart')  => 'style7',
							__('Border Top Right Light', 'bstart')  => 'style7 light',
							__('Heading Image Style', 'bstart')   => 'style4',
							__('Heading Bracket Style', 'bstart') => 'style5',
	                    ),
	                ),

	                array(
	                	"type" => "dropdown",
	                	"heading" => __("Select Title Tag", "bstart"),
	                	"param_name" => "title_tag",
	                	"value" => array(
	                		__("H1", "bstart") => 'h1',                
	                		__("H2", "bstart") => 'h2',                
	                		__("H3", "bstart") => 'h3',                
	                		__("H4", "bstart") => 'h4',                
	                		__("H5", "bstart") => 'h5',                
	                		__("H6", "bstart") => 'h6',                
	                	),
	                	'std' => 'h2',						
	                	'description' => __( 'Set your main title tag here', 'mifo' ),
	                ), 
                         
					array(
						'type'        => 'textfield',
						'holder'      => 'h3',
						'class'       => 'title-class',
						'heading'     => __( 'Title', 'bstart'),
						'param_name'  => 'title',
						'value'       => __( '', 'bstart'),
						'description' => __( 'Heading title area', 'bstart'),
						'admin_label' => false,
						'weight'      => 0,					   
					),  
					 
					array(
						'type'        => 'textfield',
						'holder'      => 'h4',
						'class'       => 'text-class',
						'heading'     => __( 'Subtitle', 'bstart'),
						'param_name'  => 'sub_text',
						'value'       => __( '', 'bstart'),
						'description' => __( 'Sub title text here', 'bstart'),
						'admin_label' => false,
						'weight'      => 0,                        
					),

					array(
						'type'        => 'textfield',
						'heading'     => __( 'Watermark Text', 'bstart'),
						'param_name'  => 'watermark',
						'value'       => __( '', 'bstart'),
						'description' => __( 'Watermark text here', 'bstart'),                   
					),	

					array(
						'type'        => 'textarea_html',
						'heading'     => __( 'Text', 'bstart'),
						'param_name'  => 'content',
						'value'       => __( '', 'bstart'),
						'description' => __( 'Description text here', 'bstart'),                    
					),

					array(
					    "type" => "dropdown",
					    "heading" => __("Select Align", "bstart"),
					    "param_name" => "align",
					    "value" => array(
					        __( 'Left', 'bstart')   => '',
					        __( 'Center', 'bstart') => 'text-center',
					        __( 'Right', 'bstart')  => 'text-right',
					    ),
					),


					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "bstart" ),
						"param_name" => "title_color",
						"value" => '',
						"description" => __( "Choose title color", "bstart" ),
		                'group' => 'Styles',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Sub Text Color", "bstart" ),
						"param_name" => "sub_text_color",
						"value" => '',
						"description" => __( "Choose sub text color here", "bstart" ),
		                'group' => 'Styles',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Text Color", "bstart" ),
						"param_name" => "text_color",
						"value" => '',
						"description" => __( "Choose sub text color here", "bstart" ),
		                'group' => 'Styles',
					),


					array(
						"type"        => "attach_image",
						"heading"     => __( "Heading Image", "rsaddon" ),
						"description" => __( "Add Heading image", "rsaddon" ),
						"param_name"  => "headingbg",
						"value"       => "",
						'group' => 'Styles',
						"dependency" => Array('element' => 'style', 'value' => array('style4')),
					),

					array(
						'type'        => 'textfield',
						'heading'     => __( 'Extra class name', 'bstart'),
						'param_name'  => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'bstart'),
					),		                     
								
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS box', 'bstart'),
						'param_name' => 'css',
						'group' => __( 'Design Options', 'bstart'),
					),                  
                        
         ),
      )
   );                                
        
}
  
add_action( 'vc_before_init', 'vc_infobox_mapping' );
  
// Element HTML
function vc_infobox_html($atts, $content) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'style'          => '',
					'title'          => '',
					'title_tag'      => 'h2',
					'title_color'    => '',
					'sub_text'       => '',
					'sub_text_color' => '',
					'text_color'     => '',
					'watermark'      => '',
					'description'    => '',
					'align'          => '',
					'headingbg'      => '',
					'el_class'       =>'',
					'css'            => ''
                ), 
                $atts, 'vc_infobox'
            )
        );


        $a = shortcode_atts(array(
          'headingbg' => 'headingbg',
        ), $atts);
        $img = wp_get_attachment_image_src($a["headingbg"], "large");
        $imgSrc = $img[0];


		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
        //custom class added
		$wrapper_classes  = array($el_class) ;			
		$class_to_filter  = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

		$title_color    = ($title_color) ? ' style="color: '.$title_color.'"' : '';
		$sub_text_color = ($sub_text_color) ? ' style="color: '.$sub_text_color.'"' : '';
		$text_color     = ($text_color) ? ' style="color: '.$text_color.'"' : '';

		$watermark_text = ($watermark) ? '<span class="watermark">'.wp_kses_post($watermark).'</span>' : '';
		$main_title     = ($title) ? '<'.$title_tag.' class="title"'.$title_color.'>'.$watermark_text.''.wp_kses_post($title).'</'.$title_tag.'>' : '';
		
		if( "style6"==$style || "style6 light"==$style || "style7"==$style || "style7 light"==$style ){
			$sub_text = ($sub_text) ? '<span'.$sub_text_color.' class="sub-text">'.wp_kses_post($sub_text).'</span>' : '';
		}else{
			$sub_text       = ($sub_text) ? '<span'.$sub_text_color.' class="sub-text">['.wp_kses_post($sub_text).']</span>' : '';
		}

		$titleimg  = $imgSrc ? '<div class="title-img"><img src="'.$imgSrc.'" alt=""/></div>' : '';

		if("style5"==$style){
			$main_title     = ($title) ? '<'.$title_tag.' class="title"'.$title_color.'>'.$watermark_text.'['.wp_kses_post($title).']</'.$title_tag.'>' : '';
		}


         
        // Fill $html var with data
        $html = '
        <div class="rs-heading '.$style.' '.$css_class.' '.$css_class_custom.' '.$align.'">
        	<div class="title-inner">
	            '.$sub_text.'
	            '.$main_title.'
	            '.$titleimg.'
	        </div>';
	        if ($content) {
            	$html .= '<div class="description"><p '.$text_color.'>'.$content.'</p></div>';
        	}
        $html .= '</div>';  	
         
        return $html;         
    }
add_shortcode( 'vc_infobox', 'vc_infobox_html' );