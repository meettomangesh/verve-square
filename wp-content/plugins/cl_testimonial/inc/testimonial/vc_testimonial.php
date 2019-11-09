<?php
function clt_testimonial_slider() {

    // Title
    vc_map(
        array(
            'name' => __( 'CL Testimonial','js_composer' ),
            'base' => 'clt_testimonial',		
            'category' => __( 'CL Testimonial', 'js_composer' ),
			"icon" => plugins_url( '../../img/icon.png', __FILE__ ),
			'is_container' => true,
			'params' => array(			
						array(
						"type" => "dropdown",
						"heading" => __("Testimonial Source", "cl_testimonial"),
						"param_name" => "source",
						"value" => array(							
							'Dynamic' => "Dynamic",
							'Manual' => "Manual", 																	
						),
						'std'         => 'Dynamic', // Your default value 	
								
					),
                		array(
						"type" => "dropdown",
						"heading" => __("Show Title", "cl_testimonial"),
						"param_name" => "title",
						"value" => array(							
							'Show' => "show",
							'Hide' => "hide", 			
						),	
						"dependency" => Array('element' => 'source', 'value' => array('Dynamic')),	
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Designation", "cl_testimonial"),
						"param_name" => "designation",
						"value" => array(							
							'Show' => "show", 
							'Hide' => "hide", 																		
						),	
						"dependency" => Array('element' => 'source', 'value' => array('Dynamic')),					
					),
					
					 array(
						'type' => 'textfield',
						'holder' => 'h3',
						'class' => 'title-class',
						'heading' => __( 'Per Page', "cl_testimonial" ),
						'param_name' => 'per_page',						
						'description' => __( 'Testimonial Per Page', "cl_testimonial" ),
						'admin_label' => false,
						'weight' => 0,
						"dependency" => Array('element' => 'source', 'value' => array('Dynamic')),					   
              		  ),
					  
					  
					   array(
							"type"        => "attach_image",
							"heading"     => __( "Customer Image", "grassywp" ),
							"description" => __( "Add Customer image", "grassywp" ),
							"param_name"  => "screenshots",
							"value"       => "",
							"dependency" => Array('element' => 'source', 'value' => array('Manual')),
						),	   
					  
					  
					  array(
						'type' => 'textfield',
						'holder' => 'h3',
						'class' => 'customer_name',
						'heading' => __( 'Customer Name', "cl_testimonial" ),
						'param_name' => 'customer_name',						
						"dependency" => Array('element' => 'source', 'value' => array('Manual')),					   
              		  ), 
				   
					  
					  array(
						'type' => 'textfield',
						'holder' => 'h3',
						'class' => 'customer_degination',
						'heading' => __( 'Customer Degination', "cl_testimonial" ),
						'param_name' => 'customer_degination',						
						"dependency" => Array('element' => 'source', 'value' => array('Manual')),					   
              		  ),     
					  
					  
					  array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __("Content", "cl_testimonial"),
						"param_name" => "content",						
						"dependency" => Array('element' => 'source', 'value' => array('Manual')),		
					),	
					  
					  array(
						"type" => "dropdown",
						"heading" => __("Testimonial Type", "cl_testimonial"),
						"param_name" => "type",
						"value" => array(							
							'Slider' => "Slider",
							'Grid' => "Grid", 
							'List' => "List", 																																															
						),	
						'std'         => 'Grid', // Your default value 		
						"dependency" => Array('element' => 'source', 'value' => array('Dynamic')),
					),
					
					
					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial Grid Style", "cl_testimonial"),
						"param_name" => "grid_style",
						"value" => array(							
							'Style 1' => "Style 1",
							'Style 2' => "Style 2", 
							'Style 3' => "Style 3", 																						
							'Style 4' => "Style 4",
							'Style 5' => "Style 5",																									
						),	
						'std'         => 'Style 1', // Your default value 	
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),	
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial Manual Style", "cl_testimonial"),
						"param_name" => "grid_style_manual",
						"value" => array(							
							'Style 1' => "Style 1",
							'Style 2' => "Style 2", 
							'Style 3' => "Style 3", 																					
																															
						),	
						'std'         => 'Style 1', // Your default value 	
						"dependency" => Array('element' => 'source', 'value' => array('Manual')),	
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial Grid Column", "cl_testimonial"),
						"param_name" => "grid_col",
						"value" => array(							
							'2' => "2",
							'3' => "3", 
							'4' => "4", 																																															
						),	
						'std'         => '2', // Your default value 	
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),	
					),

					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial Slider Style", "cl_testimonial"),
						"param_name" => "slider_style",
						"value" => array(							
							'Style 1' => "Style 1",
							'Style 2' => "Style 2",
							'Style 3' => "Style 3",					
							'Style 4' => "Style 4",
							'Style 5' => "Style 5",		
							'Style 6' => "Style 6",
							'Style 7' => "Style 7",
							'Style 8' => "Style 8",
							'Style 9' => "Style 9",																	
							'Style 10' => "Style 10",																																															
						),	
						'std'         => '1', // Your default value 	
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),

					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial Slider Icon", "cl_testimonial"),
						"param_name" => "slider_icon",
						"value" => array(							
							'Arrow Style' => "Arrow Style",
							'Bullet Style' => "Bullet Style",																																														
						),	
						'std'         => '1', // Your default value 	
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),

					array(
						"type" => "dropdown",
						"heading" => __("Text Alignment", "finoptis"),
						"param_name" => "text_align",
						"value" => array(
							'Select' => "",	
                            'Center' => "text-center",		
							'Left' 	 => "text-left", 
							'Right'	 => "text-right", 
																					
						),
						
													
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Testimonial Quote Icon', 'grassywp' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-quote-left', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
					
						'description' => __( 'Select icon from library.', 'grassywp' ),
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),

					
					array(
						"type" => "dropdown",
						"heading" => __("Select Testimonial List Style", "cl_testimonial"),
						"param_name" => "list_style",
						"value" => array(							
							'Style 1' => "Style 1",																							
							'Style 2' => "Style 2",	
							'Style 3' => "Style 3",		
							'Style 4' => "Style 4", 																																															
						),	
						'std'         => '1', // Your default value 	
						"dependency" => Array('element' => 'type', 'value' => array('List')),	
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Ratings", "cl_testimonial"),
						"param_name" => "ratings-show",
						"value" => array(							
							'Show' => "Show", 
							'Hide' => "Hide", 																																															
						),											
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Set Your Ratings", "cl_testimonial"),
						"param_name" => "set_ratings",
						"value" => array(	
							'1' => "1",						
							'1.5' => "1.5", 
							'2'   => "2",
							'2.5' => "2.5",
							'3'	  => "3",
							'3.5' => "3.5", 
							'4'	  => "4", 
							'4.5' => "4.5",	
							'5'	  => "5",																																														
						),	
						"dependency" => Array('element' => 'source', 'value' => array('Manual')),											
					),
					
					//item show depending on screen size
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Number of items ( Desktops > 1199px )", 'cl_testimonial' ),
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
						'group' => 'Style',
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Number of items ( Desktops > 991px )", 'cl_testimonial' ),
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
						'group' => 'Style',
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Number of items ( Tablets > 767px )", 'cl_testimonial' ),
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
						'group' => 'Style',
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Number of items ( Phones < 768px )", 'cl_testimonial' ),
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
						'group' => 'Style',
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Number of items ( Small Phones < 480px )", 'cl_testimonial' ),
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
						'group' => 'Style',
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
									
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "cl_testimonial" ),
						"param_name" => "titlecolor",
						"value" => '#212121', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),				 
					
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Designation color", "cl_testimonial" ),
						"param_name" => "dsignation_color",
						"value" => '#555', //Default Black color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Content Text color", "cl_testimonial" ),
						"param_name" => "content_color",
						"value" => '#111', //Default Black color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Content Border Color", "cl_testimonial" ),
						"param_name" => "content_border_color",
						"value" => '#111', //Default Black color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
                        "dependency" => Array('element' => 'slider_style', 'value' => array('Style 7')),
					),	
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Content Background", "cl_testimonial" ),
						"param_name" => "dsignation_bg_color",
						"value" => '#fff', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),

					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Slider Icon Colors", "cl_testimonial" ),
						"param_name" => "dots_color",
						"value" => '#f10909', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
                        "dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					 ),
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Slider Icon Active Colors", "cl_testimonial" ),
						"param_name" => "dots_active_color",
						"value" => '#f10909', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
                        "dependency" => Array('element' => 'type', 'value' => array('Slider')),
					 ), 

					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Slider Icon Hover Colors", "cl_testimonial" ),
						"param_name" => "dots_hover_color",
						"value" => '#28406d', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
                        "dependency" => Array('element' => 'type', 'value' => array('Slider')),
					 ),
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Testimonial Quote Icon Colors", "cl_testimonial" ),
						"param_name" => "quote_color",
						"value" => '#f10909', //Default Red color
						"description" => __( "Choose color", "cl_testimonial" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
                        "dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					 ),
					  array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'js_composer' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', "cl_testimonial" 										                            ),
						),	
						
					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', "cl_testimonial" ),
					'param_name' => 'css',
					'group' => __( 'Design Options', "cl_testimonial" ),
				),               											
								
            )
        )
    );
}
add_action( 'vc_before_init', 'clt_testimonial_slider' );

add_shortcode( 'clt_testimonial', 'cl_testimonial_function' );
?>