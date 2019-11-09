<?php
/**
* Plugin Name: CL Pricing Table
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: CL Pricing Table Addon for Visual Composer Plugin
* Version: 1.0
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

/**
* Function when plugin is activated
*
* @param void
*
*/

function cl_style_add(){ 
    //adding css to plugin
    wp_register_style( 'cl-style', 	plugin_dir_url( __FILE__ ) . 'css/cl_price_table.css');
	wp_register_style( 'cl-style1', 	plugin_dir_url( __FILE__ ) . 'css/hover-min.css');
	wp_register_style( 'cl-style2', 	plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css');
	wp_enqueue_style( 'cl-style' );
	wp_enqueue_style( 'cl-style1' );
	wp_enqueue_style( 'cl-style2');
}
add_action( 'wp_enqueue_scripts', 'cl_style_add' );

function cl_script_add(){
    // Register the script 
   // wp_register_style( 'cl-main', 	plugin_dir_url( __FILE__ ) . 'js/jquery.min.js');  	
    //wp_register_style( 'cl-custom', 	plugin_dir_url( __FILE__ ) . 'js/main.js');
	wp_enqueue_style( 'cl-main' );	
	wp_enqueue_style( 'cl-custom' );
}
add_action( 'wp_enqueue_scripts', 'cl_script_add' );

//Register js

function cl_adding_scripts() {
	wp_register_script('custom_script', plugin_dir_url( __FILE__ ) . 'js/main.js', array('jquery'), '1.1', true);
	wp_enqueue_script('custom_script');
}
add_action ('wp_enqueue_scripts', 'cl_adding_scripts');

//Including file that manages all template

function cl_price_table() {

    // Title
    vc_map(
        array(
            'name' => __( 'CL Price Table','js_composer' ),
            'base' => 'cl_price',		
            'category' => __( 'Content', 'js_composer' ),
			"icon" => plugins_url( 'img/icon.png', __FILE__ ),
			'is_container' => true,
			'params' => array(
                array(
						"type" => "textfield",
						"heading" => __("Title", "js_composer"),
						"param_name" => "title",
						"holder" => "h3",
						"value" => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", "js_composer")
					),
					array(
						"type" => "textfield",
						"heading" => __("Sub Title", "js_composer"),
						"param_name" => "subtitle",
						"holder" => "h4",
						"value" => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", "js_composer")
					),				
					
																																
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Featured Plan", "js_composer"),
						"param_name" => "featured",
						"value" =>  array(
							__('Enable', "js_composer") => "true", 
						)
					),
					array(
						"type" => "textfield",
						"heading" => __("Featured Text", "js_composer"),
						"param_name" => "feature_text",
						"value" => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", "js_composer")
					),					
																
					array(
						"type" => "textfield",
						"heading" => __("Price", "js_composer"),
						"param_name" => "price",
						"value" => "20",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", "js_composer")
					),
					array(
						"type" => "textfield",
						"heading" => __("Currency", "js_composer"),
						"param_name" => "currency",
						"value" => "$",
						"description" => __("E.g. $", "js_composer")
					),					
					array(
						"type" => "textfield",
						"heading" => __("Per", "js_composer"),
						"param_name" => "per",
						"value" => "",
						"description" => __("E.g. / mo", "js_composer")
					),					
					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __("Content", "js_composer"),
						"param_name" => "content",
						"value" => __("<ul><li>Feature</li><li>Feature</li><li>Feature</li></ul>", "js_composer"),
						"description" => __("See Font Awesome <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">Icons</a> : Enter Icon Name e.g.<strong> fa-compass</strong>", 	"js_composer")
					),	
				
					
					array(
						"type" => "dropdown",
						"heading" => __("Select Style", "js_composer"),
						"param_name" => "style",
						"value" => array(							
							'Style1' => "style1", 
							'Style2' => "style2", 
							'Style3' => "style3",
							'Style4' => "style4", 
							'Style5' => "style5", 
							'Style6' => "style6",
							'Style7' => "style7", 		
							'Style8' => "style8", 		
							'Style9' => "style9",
							'Style10' => "style10",
							'Style11' => "style11",	
							'Style12' => "style12",	
							'Style13' => "style13",	
							'Style14' => "style14",
							'Style15' => "style15",																																									
						),
						"group" => __('Design Options', 'js_composer')
					),
					array(
						"type" => "colorpicker",
						"heading" => __("Price Boxes Background", "js_composer"),
						"param_name" => "boxes_color",
						'value' => '#f9f9f9',
						"group" => __('Design Options', 'js_composer')
					),
					
					array(
						"type" => "colorpicker",
						"heading" => __("Inner Boxes Hover Background", "js_composer"),
						"param_name" => "inner_color",
						"value" => "",
						"dependency" => Array('element' => 'style', 'value' => array('style11')),
						"group" => __('Design Options', 'js_composer')
					),

					array(
						"type" => "colorpicker",
						"heading" => __("Price Color", "js_composer"),
						"param_name" => "price_color",
						"value" => "",
						"group" => __('Design Options', 'js_composer')
					),
					
					array(
						"type" => "colorpicker",
						"heading" => __("Inner Boxes Border Color", "js_composer"),
						"param_name" => "inner_border",
						"value" => "",
						"dependency" => Array('element' => 'style', 'value' => array('style11')),
						"group" => __('Design Options', 'js_composer')
					),
									
					array(
						"type" => "colorpicker",
						"heading" => __("Title Color", "js_composer"),
						"param_name" => "title_color",
						"value" => "",
						"group" => __('Design Options', 'js_composer')
					),
				
					array(
						"type" => "colorpicker",
						"heading" => __("Title Area Background Color", "js_composer"),
						"param_name" => "title_background",
						"value" => "",
						"group" => __('Design Options', 'js_composer')
					),	
					
					array(
						"type" => "colorpicker",
						"heading" => __("Subtitle Color", "js_composer"),
						"param_name" => "subtitle_color",
						"value" => "",
						"group" => __('Design Options', 'js_composer')
					),	
					
					array(
						"type" => "colorpicker",
						"heading" => __("Feature Highlight Color", "js_composer"),
						"param_name" => "highlight_color",
						"value" => "#f5f5f5",
						"group" => __('Design Options', 'js_composer')
					),					
					
					array(
						"type" => "colorpicker",
						"heading" => __("Feature Highlight Border Color", "js_composer"),
						"param_name" => "highlight_border_color",
						"value" => "#e1e1e1",
						"group" => __('Design Options', 'js_composer')
					),					
												
														
					array(
						"type" => "colorpicker",
						"heading" => __("Text Color", "js_composer"),
						"param_name" => "text_color",
						"value" => "",
						"group" => __('Design Options', 'js_composer')
					),	
					
					array(
						"type" => "dropdown",
						"heading" => __("Button Settings", "js_composer"),
						"param_name" => "btn",
						"value" => array(							
							'Button Link' => "btn_link", 
							'Button Code' => "btn_code", 						
						),
						
					),
					
					array(
						"type" => "textfield",
						"heading" => __("Button Text", "js_composer"),
						"param_name" => "button_text",
						"value" => "Select",
						"dependency" => Array('element' => 'btn', 'value' => array('btn_link')),
					),
					
					
					array(
						'type' => 'vc_link',
						'heading' => __( 'URL (Link)', 'js_composer' ),
						'param_name' => 'button_link',
						'description' => __( 'Add link to button.', 'js_composer' ),
						"dependency" => Array('element' => 'btn', 'value' => array('btn_link')),
					),
							

					array(
						"type" => "textarea_raw_html",
						"heading" => __("Button Code", "js_composer"),
						"param_name" => "button_code",	
						"value" => "",	
						"dependency" => Array('element' => 'btn', 'value' => array('btn_code')),					
					),


					
					array(
						"type" => "colorpicker",
						"heading" => __("Boxes Border Color", "js_composer"),
						"param_name" => "boxes_border_color",
						"value" => "#e1e1e1",
						"group" => __('Design Options', 'js_composer')
					),
					
					array(
						"type" => "colorpicker",
						"heading" => __("Featured Boxes Border Color", "js_composer"),
						"param_name" => "featured_border_color",
						"value" => "#4caf50",
						"group" => __('Design Options', 'js_composer')
					),
					

					array(
						"type" => "colorpicker",
						"heading" => __("Button Background", "js_composer"),
						"param_name" => "button_color",	
						"value" => "",	
						"group" => __('Design Options', 'js_composer')						
					),

					array(
						"type" => "colorpicker",
						"heading" => __("Button Text Color", "js_composer"),
						"param_name" => "button_text_color",	
						"value" => "",	
						"group" => __('Design Options', 'js_composer')						
					),

					array(
						"type" => "colorpicker",
						"heading" => __("Button Hover Color", "js_composer"),
						"param_name" => "button_hover_color",	
						"value" => "",	
						"group" => __('Design Options', 'js_composer')						
					),	

					array(
						"type" => "colorpicker",
						"heading" => __("Button Hover Background", "js_composer"),
						"param_name" => "button_hover_background",	
						"value" => "",	
						"group" => __('Design Options', 'js_composer')						
					),		
																				
								
            )
        )
    );
}
add_action( 'vc_before_init', 'cl_price_table' );

/**
* Function for displaying Cl price functionality
*
* @param array $atts    - the attributes of shortcode
* @param string $content - the content between the shortcodes tags
*
* @return string $html - the HTML content for this shortcode.
*/
$dir = plugin_dir_path( __FILE__ );
require_once $dir . '/inc/cl_price_table_shortcode.php';


add_shortcode( 'cl_price', 'cl_price_function' );
?>