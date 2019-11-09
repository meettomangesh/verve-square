<?php
add_action('init', 'clt_testimonial_vc_addon_cpt');
function clt_testimonial_vc_addon_cpt() {
    register_post_type('clt_testimonials', array(
        'labels' => array(
            'name' => __('CL Testimonials', 'cl-testimonial-visual-composer-addon'),
            'singular_name' => __('CL Testimonial', 'cl-testimonial-visual-composer-addon'),
            'menu_name' => __('CL Testimonials', 'cl-testimonial-visual-composer-addon'),
            'parent_item_colon' => __('Parent Testimonial:', 'cl-testimonial-visual-composer-addon'),
            'all_items' => __('All Testimonials', 'cl-testimonial-visual-composer-addon'),
            'view_item' => __('View Testimonial', 'cl-testimonial-visual-composer-addon'),
            'add_new_item' => __('Add New Testimonial', 'cl-testimonial-visual-composer-addon'),
            'add_new' => __('Add New', 'cl-testimonial-visual-composer-addon'),
            'edit_item' => __('Edit Testimonial', 'cl-testimonial-visual-composer-addon'),
            'update_item' => __('Update Testimonial', 'cl-testimonial-visual-composer-addon'),
            'search_items' => __('Search Testimonial', 'cl-testimonial-visual-composer-addon'),
            'not_found' => __('Not found', 'cl-testimonial-visual-composer-addon'),
            'not_found_in_trash' => __('Not found in Trash', 'cl-testimonial-visual-composer-addon')
			),
			'public' => true,
			'menu_position' => 5,
			'publicly_queryable' => false,
			'menu_icon'          =>  plugins_url( '../../img/icon-admin.png', __FILE__ ),
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array(''),
			'register_meta_box_cb' => 'clt_testimonials_meta_box',
			'has_archive' => true
			)
   	 );
}

function clt_create_taxonomy() {
	register_taxonomy(
		'testimonial-category',
		'clt_testimonials',
		array(
			'label' => __( 'Testimonial Categories','rsaddon' ),
			'rewrite' => array( 'slug' => 'ctltestimonial-category' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'clt_create_taxonomy' );


function cl_testimonial_function( $atts, $content ) {
	$attributes = array();
    extract(
		$atts = shortcode_atts(	
		array(
			'title' => '',
			'designation' => '',
			'slider_icon' => 'Bullet Style',
			'source' => 'Dynamic',
			'ratings-show' => 'Show',
			'set_ratings'  =>'1',	
			'titlecolor' => '#212121',
			'dsignation_color' => '#555',
			'content_color' => '#111',
			'dots_color' => '#28406d',
			'quote_color' => '#28406d',
			'text_align' => '',
			'dots_active_color' => '#28406d',
			'dots_hover_color' => '#28406d',
			'dsignation_bg_color' => '#fff',	
			'css' => '',
			'el_class' => '',
			'type'  =>'Grid',
			'col_lg'                => '3',
			'col_md'                => '3',
			'col_sm'                => '3',
			'col_xs'                => '2',
			'col_mobile'            => '1',
			'grid_style' => 'Style 1', 
			'grid_style_manual' => 'Style 1',
			'slider_style' => 'Style 1',
			'icon_fontawesome' => 'fa fa-quote-left', 
			'list_style' => 'Style 1', 
			'per_page' => '2', 
			'grid_col' => '2', 
			'screenshots' => '',
			'customer_name' =>'',
			'customer_degination'  =>'',
			
		), $atts, 'clt_testimonial'
	)	
);


//get image for customer	
$customer_image = shortcode_atts(array(
     'screenshots' => 'screenshots',
    ), $atts);
	
$img = wp_get_attachment_image_src($customer_image["screenshots"], "large");
$imgSrc = $img[0];	
$imageClass='<img src="'.$imgSrc.'" alt="customer-image" />';

//content extraxt
$atts['content'] = $content;
$titlecolor = (!empty($titlecolor))	? ''.$titlecolor.'' : "";
$dsignation_color = (!empty($dsignation_color))	? ''.$dsignation_color.'' : "";


//for css edit box value extract
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

//custom class added
$wrapper_classes = array($el_class) ;			
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

$post_title_show='';
$degination='';


$type_check='';
$type_check=$type;
$cl_source='';
$cl_source=$source;
$style_check='';
$style_check2='';
$style_check3='';
$style_check=$grid_style;
$style_check2=$slider_style;
$style_check3=$list_style;
$best_wp = new wp_Query(array(
	'post_type' => 'clt_testimonials',
	'posts_per_page' => $per_page,
));

$dir = plugin_dir_path( __FILE__ );
$ratings='';
if($cl_source=='Manual'){
	$url = plugin_dir_url( __FILE__ );	
	$ratings=$atts['set_ratings'];
	if($grid_style_manual=='Style 1'){	
			
	$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial1 '.$css_class.' '.$css_class_custom.'">';				
						
				
			//if this is first value in row, create new row
		  
			$html .='<div class="testimonial-item">';	 
				$html .= '
					<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
						<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$content.'</p>
					
					<div class="cl-author image-testimonial">
						'.$imageClass.'
						<ul class="cl-author-info">
							<li style="color:'.$titlecolor.'">'.esc_attr($atts['customer_name']).'</li>
							<li style="color:'.$dsignation_color.'">'.esc_attr($atts['customer_degination']).'</li>';
						$html .='</ul>
					</div>
					</div>
					';
	
		$html .='</div>';			
	$html .='</div>';
return $html;
		 
		}
		elseif($grid_style_manual=='Style 2'){
			$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">';
   					
				
			//if this is first value in row, create new row
		  
			$html .='<div class="testimonial-item">';	 
			$html .= '<div class="cl-author image-testimonial">
					<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
					'.$imageClass.'
						<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i>'.$content.'</p>
										
					<ul class="cl-author-info">
						<li style="color:'.$titlecolor.'">'.esc_attr($atts['customer_name']).'</li>
						<li style="color:'.$dsignation_color.'">'.esc_attr($atts['customer_degination']).'</li>';						
			$html .='</ul>
					</div>
					</div>				
					';
	
		$html .='</div>';
			
	$html .='</div>';


return $html;
		}
		elseif($grid_style_manual=='Style 3'){
			$html= '<div id="cl-testimonial" class="cl-testimonial-list cl-testimoniallist3 '.$css_class.' '.$css_class_custom.'">';			
				
			//if this is first value in row, create new row
			$html .='<div class="testimonial-item">';	 
				$html .= '
					<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
						<div class="image-testimonial">
							'.$imageClass.'
							<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$content.'</p>
							<ul class="cl-author-info">
								<li style="color:'.$titlecolor.'">'.esc_attr($atts['customer_name']).'</li>
								<li style="color:'.$dsignation_color.'">'.esc_attr($atts['customer_degination']).'</li>';
				$html .='</ul>
						</div>				
					</div>
					';
		$html .='</div>';
	
			
	$html .='
</div>';

return $html;
		}
		
		else{		
					
	$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial1 '.$css_class.' '.$css_class_custom.'">';				
						
				
			//if this is first value in row, create new row
		  
			$html .='<div class="testimonial-item">';	 
				$html .= '
					<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
						<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$content.'</p>
					
					<div class="cl-author image-testimonial">
						'.$imageClass.'
					<ul class="cl-author-info">
						<li style="color:'.$titlecolor.'">'.esc_attr($atts['customer_name']).'</li>
						<li style="color:'.$dsignation_color.'">'.esc_attr($atts['customer_degination']).'</li>';
				$html .='</ul>
					</div>
					</div>
					';
	
		$html .='</div>';			
	$html .='</div>';
return $html;
		}
	
}

if($cl_source=='Dynamic'){
 
	//grid checking
	if($type_check=='Grid'){
		
		if($style_check=='Style 1'){
			
			//************  Staet Grid Style 1   ****************//

			$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial1 '.$css_class.' '.$css_class_custom.'">
		   		<div class="container2">                
					<div class="cl-row">';

					 while($best_wp->have_posts()): $best_wp->the_post();
					   $post_title= get_the_title($best_wp->ID);
					   $post_content= get_the_content($best_wp->ID);
					   
						if($title!='No'){
							 $post_title_show= get_the_title($best_wp->ID);				}	
						
								
						$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
										
						if($degination!='No'){
						$designation = get_post_meta( get_the_ID(), 'designation', true );
						}	
						
						if($atts['ratings-show']=='Show')
						{
							$url = plugin_dir_url( __FILE__ );	
							$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
						}				
						
					//if this is first value in row, create new row
				  
					$html .='<div class="testimonial-item cl-col-6">';	 
						$html .= '
							<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
								<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
							
							<div class="cl-author image-testimonial">
								<img src="'.esc_attr($post_img_url).'" alt="Client Image">					
							<ul class="cl-author-info">
								<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
								<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
						$html .='</ul>
							</div>
							</div>
							';
			
				$html .='</div>';
			
				endwhile;		
			$html .='</div>';
		$html .='</div>
		</div>';

		return $html;

			//************  End Grid Style 1   ****************//

		}
		else if($style_check=='Style 2'){
			
			//************  Staet Grid Style 2   ****************//

			$grid_col_style='';
			if($grid_col=='2'){
				$grid_col_style='6';
			}
			if($grid_col=='3'){
				$grid_col_style='4';
			}
			if($grid_col=='4'){
				$grid_col_style='3';
			}

				$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2">                
						<div class="cl-row">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							
							if($atts['ratings-show'] == 'Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								echo $ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}				
							
						//if this is first value in row, create new row
					  
						$html .='<div class="testimonial-item cl-col-'.$grid_col_style.'">';	 
						$html .= '<div class="cl-author image-testimonial">
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
								<img src="'.esc_attr($post_img_url).'" alt="Client Image">
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
													
								<ul class="cl-author-info">
									<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
									<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									if($ratings==1 ||$ratings==1.5||$ratings==2||$ratings==2.5||$ratings==3||$ratings==3.5||$ratings==4 || $ratings==4.5 || $ratings==5){
									$html .='<li class="ratings"><img src="'.$url.'/img/'.$ratings.'.png" /></li>';
								}
									
						$html .='</ul>
								</div>
								</div>				
								';
				
					$html .='</div>';
				
					endwhile;
					wp_reset_query();		
				$html .='</div>';
			$html .='</div>
			</div>';

			return $html;

			//************  End Grid Style 2   ****************//

		}
		else if($style_check=='Style 3'){
			
			//************  Staet Grid Style 3   ****************//

			$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial3 '.$css_class.' '.$css_class_custom.'">
		   		<div class="container2">                
					<div class="cl-row">';

					 while($best_wp->have_posts()): $best_wp->the_post();
					   $post_title= get_the_title($best_wp->ID);
					   $post_content= get_the_content($best_wp->ID);
					   
						if($title!='No'){
							 $post_title_show= get_the_title($best_wp->ID);				}	
						
								
						$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
										
						if($degination!='No'){
						$designation = get_post_meta( get_the_ID(), 'designation', true );
						}	
						
						if($atts['ratings-show']=='Show')
						{
							$url = plugin_dir_url( __FILE__ );	
							$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
						}				
						
					//if this is first value in row, create new row
				  
					$html .='<div class="testimonial-item cl-col-6">';	 
						$html .= '
							<div class="single-testimonial">
							<div class="testimonial-content testimonial-left" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
								<img src="'.esc_attr($post_img_url).'" alt="Client Image">
								<ul class="cl-author-info">
									<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
									<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
						$html .='</ul>	
								
							</div>
							<div class="right-content image-testimonial">
								<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>			
							</div>
							</div>
							
							';
			
				$html .='</div>';
			
				endwhile;		
			$html .='</div>';
		$html .='</div>
		</div>';

		return $html;

			//************  End Grid Style 3   ****************//

		}


		else if($style_check=='Style 4'){
			
			//************  Staet Grid Style 4   ****************//

			$grid_col_style='';
			if($grid_col=='2'){
				$grid_col_style='6';
			}
			if($grid_col=='3'){
				$grid_col_style='4';
			}
			if($grid_col=='4'){
				$grid_col_style='3';
			}

				$html= '<div id="cl-testimonial" class="cl-testimonial2 cl-testimonial4 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2">                
						<div class="cl-row">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
							    $ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}				
							
						//if this is first value in row, create new row
					  
						$html .='<div class="testimonial-item cl-sm-6 cl-col-'.$grid_col_style.'">';	 
							$html .= '

								<div class="cl-author image-testimonial">
									<div class="image">
										<img src="'.esc_attr($post_img_url).'" alt="Client Image">
									</div>
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">					
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>						
								<ul class="cl-author-info">
									<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
									<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
								</div>
								</div>				
								';
				
					$html .='</div>';
				
					endwhile;
					wp_reset_query();		
				$html .='</div>';
			$html .='</div>
			</div>';

			return $html;

			//************  End Grid Style 4   ****************//
		}



		else if($style_check=='Style 5'){
			
			//************  Staet Grid Style 5   ****************//

			$grid_col_style='';
			if($grid_col=='2'){
				$grid_col_style='6';
			}
			if($grid_col=='3'){
				$grid_col_style='4';
			}
			if($grid_col=='4'){
				$grid_col_style='3';
			}

				$html= '<div id="cl-testimonial" class="cl-testimonial5 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2">                
						<div class="cl-row">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}					
							
						//if this is first value in row, create new row
					  
						$html .='<div class="testimonial-item cl-col-'.$grid_col_style.'">';	 
							$html .= '

								<div class="cl-author image-testimonial">
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">					
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
									<div class="image"><img src="'.esc_attr($post_img_url).'" alt="Client Image"></div>									
								<ul class="cl-author-info">
									<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
									<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
								</div>
								</div>				
								';
				
					$html .='</div>';
				
					endwhile;
					wp_reset_query();		
				$html .='</div>';
			$html .='</div>
			</div>';

			return $html;

			//************  End Grid Style 5   ****************//
		}




		else{		
			
			//************  Staet Grid Style 1   ****************//

			$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial1 '.$css_class.' '.$css_class_custom.'">
		   		<div class="container2">                
					<div class="cl-row">';

					 while($best_wp->have_posts()): $best_wp->the_post();
					   $post_title= get_the_title($best_wp->ID);
					   $post_content= get_the_content($best_wp->ID);
					   
						if($title!='No'){
							 $post_title_show= get_the_title($best_wp->ID);				}	
						
								
						$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
										
						if($degination!='No'){
						$designation = get_post_meta( get_the_ID(), 'designation', true );
						}	
						
						if($atts['ratings-show']=='Show')
						{
							$url = plugin_dir_url( __FILE__ );	
							$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
						}				
						
					//if this is first value in row, create new row
				  
					$html .='<div class="testimonial-item cl-col-6">';	 
						$html .= '
							<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
								<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
							
							<div class="cl-author image-testimonial">
								<img src="'.esc_attr($post_img_url).'" alt="Client Image">					
							<ul class="cl-author-info">
								<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
								<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
						$html .='</ul>
							</div>
							</div>
							';
			
				$html .='</div>';
			
				endwhile;		
			$html .='</div>';
		$html .='</div>
		</div>';

		return $html;

			//************  End Grid Style 1   ****************//
		}
	}


	
		//slider checkihg
		else if($type_check=='Slider'){
	
				//Slider Icon Check
			$icon_check='';
			$hide_bullet='';
			$icon_check=$atts['slider_icon'];
			if($icon_check=='Arrow Style'){
				$hide_bullet='hide_bullet';
			}		
			else{
				
				$hide_bullet='hide_arrow';
			}

			if($style_check2=='Style 1'){


				//************  Start Slider Style 1   ****************//

					$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial1 '.$css_class.' '.$css_class_custom.'">
				   		<div class="container2 '.$hide_bullet.'">                
							<div class="cl-row"><ul class="testimonial-slide slider1">';

							 while($best_wp->have_posts()): $best_wp->the_post();
							   $post_title= get_the_title($best_wp->ID);
							   $post_content= get_the_content($best_wp->ID);
							   
								if($title!='No'){
									 $post_title_show= get_the_title($best_wp->ID);				}	
								
										
								$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
												
								if($degination!='No'){
									$designation = get_post_meta( get_the_ID(), 'designation', true );
								}	
								
								if($atts['ratings-show']=='Show')
								{
									$url = plugin_dir_url( __FILE__ );	
									$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
								}			
								
							//if this is first value in row, create new row
						  
							$html .='<li class="testimonial-item">';	 
								$html .= '
									<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
										<div class="image-testimonial">
											<img src="'.esc_attr($post_img_url).'" alt="Client Image">	
										</div>
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>					
										<div class="cl-author">				
											<ul class="cl-author-info">
												<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
												<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
								$html .='</ul>
										</div>
									</div>
									';
					
						$html .='</li>';
					
						endwhile;		
					$html .='</ul></div>';
				$html .='</div>
				</div>';

				return $html;

				//************  End Slider Style 1   ****************//
			}



			else if($style_check2=='Style 2'){

				$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">
			   		<div class="'.$hide_bullet.'">                
						<div class="cl-row"><ul class="testimonial-slide2 slider2">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
							$ratings =''; 							   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
										
							
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '

								<div class="cl-author image-testimonial">
									<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<img src="'.esc_attr($post_img_url).'" alt="Client Image">
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
													
									<ul class="cl-author-info">
										<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
										<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
										if($ratings==1 ||$ratings==1.5||$ratings==2||$ratings==2.5||$ratings==3||$ratings==3.5||$ratings==4 || $ratings==4.5 || $ratings==5){
											$html .='<li class="ratings"><img src="'.$url.'/img/'.$ratings.'.png" alt="Ratings"></li>';
										}
									
							$html .='</ul>
									</div>
								</div>
								<style>
									#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
								</style>				
								';
				
					$html .='</li>';
				
					endwhile;
					wp_reset_query();		
				$html .='</ul></div>';
			$html .='</div>
			</div>';

			return $html;

			}



			else if($style_check2=='Style 3'){

			//************  Start Slider Style 3   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">
			   		<div class="'.$hide_bullet.'">                
						<div class="cl-row"><ul class="testimonial-slide3 slider3">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
											
							
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '

								<div class="cl-author image-testimonial">
									<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<img src="'.esc_attr($post_img_url).'" alt="Client Image">
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
													
									<ul class="cl-author-info">
										<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
										<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div>
								</div>
								<style>						
									#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial button.slick-arrow{background:'.$atts['dots_color'].' !important;}
									#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
								</style>				
								';
				
					$html .='</li>';
				
					endwhile;
					wp_reset_query();		
				$html .='</ul></div>';
			$html .='</div>
			</div>';

			return $html;

			//************  End Slider Style 3   ****************//
			}



			else if($style_check2=='Style 4'){

				//************  Start Slider Style 4   ****************//

				$html= '<div id="cl-testimonial4" class="cl-testimonial4 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container5 '.$hide_bullet.'">                
						<div class="cl-row"><ul class="testimonial-slide4 slider4">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
										
							
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '

								<div class="cl-author image-testimonial row">
									<div class="col-md-5">
										<div class="image-testi"><img src="'.esc_attr($post_img_url).'" alt="Client Image"></div>
									</div>
									<div class="col-md-7">
										<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
														
										<ul class="cl-author-info">
										<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
										<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div></div>
								</div>

								<style>
									#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
								</style>				
								';
				
					$html .='</li>';
				
					endwhile;
					wp_reset_query();		
				$html .='</ul></div>';
			$html .='</div>
			</div>';
			return $html;

			//************  End Slider Style 4   ****************//
			}




			else if($style_check2=='Style 5'){
				
				//************  Staet Slider Style 5   ****************//

					$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">
				   		<div class="container2 '.$hide_bullet.'">                
							<div class="cl-row"><ul class="testimonial-slide5 slider5">';

							 while($best_wp->have_posts()): $best_wp->the_post();
							   $post_title= get_the_title($best_wp->ID);
							   $post_content= get_the_content($best_wp->ID);
							   
								if($title!='No'){
									 $post_title_show= get_the_title($best_wp->ID);				
									}				
										
								$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
												
								if($degination!='No'){
								$designation = get_post_meta( get_the_ID(), 'designation', true );
								}
								
								if($atts['ratings-show']=='Show')
								{
									$url = plugin_dir_url( __FILE__ );	
									$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
								}			
								
								
							//if this is first value in row, create new row
						  
							$html .='<li class="testimonial-item">';	 
								$html .= '

									<div class="cl-author">
										<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
											<div class="cl-col-4"><div class="image"><img src="'.esc_attr($post_img_url).'" alt="Client Image"></div></div>
										<div class="text cl-col-8">
										<div class="clt-content">
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>				
											<ul class="cl-author-info">
												<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
												<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									$html .='</ul>
										</div>
										</div>
										</div>
									</div>			
									';
					
						$html .='</li>';
					
						endwhile;
						wp_reset_query();		
					$html .='</ul></div>';
				$html .='</div>
				</div>';

				return $html;

				//************  End Slider Style 5   ****************//

			}




			else if($style_check2=='Style 6'){
				
				//************  Staet Slider Style 6   ****************//

				$html= '<div id="rs-testimonial" class="rs-testimonial testimonials6">
				    <div class="container2">                
					<div class="testi-carousel row">';
						 $i=1;
						 $active="";
						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);
							}	
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
					
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
							

				//if this is first value in row, create new row
			  
				    $html .='<div class="testi-item col-md-4">';	 
					$html .= '
						
							<div class="testi-img">
								<div class="image"><img src="'.$post_img_url .'" alt="Client Image"></div>
							</div>
							<ul class="cl-author-info">
							';
							
							$html .='				
							<li style="color:'.$titlecolor.'">'.$post_title.'</li>
							<li style="color:'.$dsignation_color.'" class="testi-title">'.$designation.'</li>
							
							</ul>
						';
						
					 $html .='<div class="tab-pane tab-text animated flipInX in '.$active.'">
						<div class="testi-content">
						  <p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
						</div>
					</div>';

			$html .='</div>';
			$i++;
			endwhile;		
			$html .='</div>';
			$html .='</div></div>';
			return $html;

				//************  End Slider Style 6   ****************//
			}



			else if($style_check2=='Style 7'){
				
				//************  Staet Slider Style 7   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial3 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2 '.$hide_bullet.'">                
						<ul class="testimonial-slide7 slider7">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);

						   $testimonial_item_data = array(
								'col_lg'     => $col_lg,
								'col_md'     => $col_md,
								'col_sm'     => $col_sm,
								'col_xs'     => $col_xs,
								'col_mobile' => $col_mobile,
								'button_color' => $atts['dots_color'],
								'button_bg' => $atts['dots_active_color']
							);
							
							wp_localize_script( 'custom_script_clt', 'testimonial_data', $testimonial_item_data );
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				}	
							
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
											
						    if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}

						//value from admin 
						$title_color = !empty($titlecolor) ? 'style="color: '.$titlecolor.'"' : "";
						$designation_color = !empty($dsignation_color) ? 'style="color: '.$dsignation_color.'"' : "";
									
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '
								<div class="single-testimonial">
								<div class="testimonial-content testimonial-left" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<img src="'.esc_attr($post_img_url).'" alt="Client Image">									
								</div>
								<div class="right-content image-testimonial">
									<i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i>
									<p>'.$post_content.'</p>
									<ul class="cl-author-info">
										<li '.$title_color.'>'.esc_attr($post_title).'</li>
										<li '.$designation_color.'>'.esc_attr($designation).'</li>';
									
									$html .='</ul>			
								</div>
								
								</div>
								
								';
				
					$html .='</li>';
				
					endwhile;		
				$html .='</ul>';
				
			$html .='</div>
			</div>';

			return $html;

				//************  End Slider Style 7   ****************//
			}



			else if($style_check2=='Style 8'){

				$text_center="";
				$text_left="";
				$text_right="";

				//************  Staet Slider Style 8   ****************//
				$html= '<div id="cl-testimonial" class="rs-testimonial testimonials-area slider8 '.$text_align.'">
				    <div class="container2 inner-testimonials '.$hide_bullet.'">                
					<div class="inner">';
				//if this is first value in row, create new row
			  
				    $html .='       
			                <div class="slider testimonials">';
			                	while($best_wp->have_posts()): $best_wp->the_post();
								   $post_title= get_the_title($best_wp->ID);
								   $post_content= get_the_content($best_wp->ID);
								   
									if($title!='No'){
										 $post_title_show= get_the_title($best_wp->ID);
									}	
											
									$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
													
									if($degination!='No'){
									$designation = get_post_meta( get_the_ID(), 'designation', true );
									}
									
									if($atts['ratings-show']=='Show')
									{
										$url = plugin_dir_url( __FILE__ );	
										$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
									}			
							
			                    $html .='<div class="images-testimonial">
			                    <p style="color:'.$content_color.'"><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
			                    <ul class="author">
			                    <li style="color:'.$content_color.'">[ '.$post_title.' ] </li>
			                    <li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
								$html .='</ul></div>';

								endwhile;
			                $html .='</div>               

			                <div class="slider testimonials-nav">';

			                while($best_wp->have_posts()): $best_wp->the_post();
			                	$post_img_url2 = get_the_post_thumbnail_url($best_wp->ID,'full');
			                $html .='<div class="images-slide-testimonial">
			                        
			                    </div> '; 
			                endwhile;
			            $html.='</div>';       		
			$html .='</div>';
			$html .='</div>
			</div>';
			return $html;

				//************  End Slider Style 8   ****************//
			}

			else if($style_check2=='Style 9'){
				
				//************  Staet Slider Style 9   ****************//
				$content_color = ($content_color) ? ' style="color: '.$content_color.'"' : '';
				$titlecolor = ($titlecolor) ? ' style="color: '.$titlecolor.'"' : '';
				$dsignation_color = ($dsignation_color) ? ' style="color: '.$dsignation_color.'"' : '';

				$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial9 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2 '.$hide_bullet.'">                
						<ul class="testimonial-slide9 slider9">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				}	
							
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
											
						    if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
									
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '
								<div class="single-testimonial">								
								<div class="image-testimonial" '.$content_color.'>
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>

									<div class="testimonial-image">
										<img src="'.esc_attr($post_img_url).'" alt="Client Image">									
									</div>
									<ul class="cl-author-info">
										<li '.$titlecolor.'>'.esc_attr($post_title).'</li>
										<li '.$dsignation_color.'>'.esc_attr($designation).'</li>';
									
									$html .='</ul>		
								</div>
								</div>
								';
				
					$html .='</li>';
				
					endwhile;		
				$html .='</ul>';
			$html .='</div>
			</div>
				<style>
					#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
					#cl-testimonial ul.slick-dots li button:hover{background:'.$atts['dots_hover_color'].' !important;}
					#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
				</style>
			';

			return $html;

				//************  End Slider Style 9   ****************//
			}

			else if($style_check2=='Style 10'){
				
				//************  Staet Slider Style 9   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial cl-testimonial10 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container2 '.$hide_bullet.'">                
						<ul class="testimonial-slide10 slider9">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);

						   $testimonial_item_data = array(
								'col_lg'     => $col_lg,
								'col_md'     => $col_md,
								'col_sm'     => $col_sm,
								'col_xs'     => $col_xs,
								'col_mobile' => $col_mobile,
							);
							
							wp_localize_script( 'custom_script_clt', 'testimonial_data', $testimonial_item_data );
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				}	
							
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
											
						    if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}			
									
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '
								<div class="single-testimonial">								
								<div class="image-testimonial" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<div class="testimonial-image">
										<img src="'.esc_attr($post_img_url).'" alt="Client Image">									
									</div>
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>

									<ul class="cl-author-info">
										<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
										<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
									$html .='</ul>		
								</div>
								</div>
								<style>
									#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
								</style>
								';
				
					$html .='</li>';
				
					endwhile;		
				$html .='</ul>';
			$html .='</div>
			</div>';

			return $html;

				//************  End Slider Style 9   ****************//
			}
		}


	
		else if($type_check=='List'){
			if($style_check3=='Style 1'){
				
				//************  Staet List Style 1   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial-list cl-testimonial1 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container">                
						<div class="cl-row">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				}	
							
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}				
							
						//if this is first value in row, create new row
					  
						$html .='<div class="testimonial-item">';	 
							$html .= '
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<div class="image-testimonial">
										<img src="'.esc_attr($post_img_url).'" alt="Client Image">
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
										<ul class="cl-author-info">
											<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
											<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div>				
								</div>
								';
					$html .='</div>';
				
					endwhile;		
				$html .='</div>';
			$html .='</div>
			</div>';

			return $html;

				//************  End List Style 1   ****************//

			}



			else if($style_check3=='Style 2'){
				
				//************  Staet List Style 2   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial-list2 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container">                
						<ul class="cl-row list-border">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								$post_title_show= get_the_title($best_wp->ID);
							}	
							
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}				
							
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<div class="cl-row">
									<div class="cl-col-2">
										<div class="image-testimonial2"><img src="'.esc_attr($post_img_url).'" alt="Client Image"></div>
									</div>
									<div class="cl-col-10">
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
										<ul class="cl-author-info">
											<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
											<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div>
									</div>				
								</div>
								';
					$html .='</li>';
				
					endwhile;		
				$html .='</ul>';
			$html .='</div>
			</div>';

			return $html;

				//************  End List Style 2   ****************//

			}



			else if($style_check3=='Style 3'){
				
				//************  Staet List Style 3   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial-list cl-testimoniallist3 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container">                
						<div class="cl-row">';

						while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
							if($title!='No'){
								$post_title_show= get_the_title($best_wp->ID);
							}		
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');				
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}	
						
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}				
							
						//if this is first value in row, create new row
						$html .='<div class="testimonial-item">';	 
							$html .= '
								<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
									<div class="image-testimonial">
										<img src="'.esc_attr($post_img_url).'" alt="Client Image">
										<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
										<ul class="cl-author-info">
											<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
											<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div>				
								</div>
								';
					$html .='</div>';
				
					endwhile;		
				$html .='</div>';
			$html .='</div>
			</div>';

			return $html;

				//************  End List Style 3   ****************//

			}



			
			else if($style_check3=='Style 4'){
				
				//************  Staet List Style 4   ****************//

				$html= '<div id="cl-testimonial" class="cl-testimonial2 '.$css_class.' '.$css_class_custom.'">
			   		<div class="container">                
						<div class="cl-row"><ul class="slider5 list-4">';

						 while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   $post_content= get_the_content($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);				
								}				
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
											
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
							
							if($atts['ratings-show']=='Show')
							{
								$url = plugin_dir_url( __FILE__ );	
								$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
							}					
							
						//if this is first value in row, create new row
					  
						$html .='<li class="testimonial-item">';	 
							$html .= '

								<div class="cl-author">
									<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
										<div class="cl-col-4"><div class="image"><img src="'.esc_attr($post_img_url).'" alt="Client Image"></div></div>
									<div class="text cl-col-8">
									<div class="clt-content">
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>				
										<ul class="cl-author-info">
											<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
											<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
									
							$html .='</ul>
									</div>
									</div>
									</div>
								</div>
								<style>
									#cl-testimonial ul.slick-dots li button{border:1px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial .slider5 .image img{border:3px solid'.$atts['dots_color'].' !important;}
									#cl-testimonial .slick-active button{background:'.$atts['dots_active_color'].' !important;}
									#cl-testimonial .slider5 .image::before{background:'.$atts['dots_active_color'].' !important;}
									#cl-testimonial .slider5 .image::after{background:'.$atts['dots_active_color'].' !important;}
								</style>				
								';
				
					$html .='</li>';
				
					endwhile;
					wp_reset_query();		
				$html .='</ul></div>';
			$html .='</div>
			</div>';

			return $html;

				//************  End List Style 4   ****************//

			}
		}
		//list view data
		else{
			
			//************  Staet List Style 1   ****************//

			$html= '<div id="cl-testimonial" class="cl-testimonial-list cl-testimonial1 '.$css_class.' '.$css_class_custom.'">
		   		<div class="container">                
					<div class="cl-row">';

					 while($best_wp->have_posts()): $best_wp->the_post();
					   $post_title= get_the_title($best_wp->ID);
					   $post_content= get_the_content($best_wp->ID);
					   
						if($title!='No'){
							 $post_title_show= get_the_title($best_wp->ID);				}	
						
								
						$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
										
						if($degination!='No'){
						$designation = get_post_meta( get_the_ID(), 'designation', true );
						}	
						
						if($atts['ratings-show']=='Show')
						{
							$url = plugin_dir_url( __FILE__ );	
							$ratings = get_post_meta( get_the_ID(), 'ratings', true );				
						}				
						
					//if this is first value in row, create new row
				  
					$html .='<div class="testimonial-item">';	 
						$html .= '
							<div class="testimonial-content" style="color:'.$content_color.'; background:'.$dsignation_bg_color.'">
								<div class="image-testimonial">
									<img src="'.esc_attr($post_img_url).'" alt="Client Image">
									<p><i class="'.$icon_fontawesome.'" style="color:'.$quote_color.'"></i> '.$post_content.'</p>
									<ul class="cl-author-info">
										<li style="color:'.$titlecolor.'">'.esc_attr($post_title).'</li>
										<li style="color:'.$dsignation_color.'">'.esc_attr($designation).'</li>';
								
						$html .='</ul>
								</div>				
							</div>
							';
				$html .='</div>';
			
				endwhile;		
			$html .='</div>';
		$html .='</div>
		</div>';

		return $html;

			//************  End List Style 1   ****************//
		}
	}	
}




	
