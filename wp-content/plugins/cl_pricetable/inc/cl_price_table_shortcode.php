<?php function cl_price_function( $atts, $content ) {
	$attributes = array();
    extract(
		$atts = shortcode_atts(	
		array(
			'title' => '',
			'subtitle' => '',
			'price' => '20',
			'currency' => '$',
			'featured' => '',
			'feature_text' => '',
			'per' => '',		
			'button_text' => 'Select',
			'button_link' => '',
			'style' => '',
			'boxes_color' => '#f9f9f9',
			'inner_color' => '',
			'highlight_color' => '#f5f5f5',
			'highlight_border_color' => '#e1e1e1',
			'boxes_border_color' => '#e1e1e1',
			'featured_border_color' => '#4caf50',
			'inner_border' => '',
			'title_color' => '',
			'price_color' => '',
			'title_background' => '',
			'subtitle_color' => '',
			'background_color' => '',
			'button_hover_color' => '',
			'button_hover_background' => '',
			'text_color' => '',
			'btn' => '',
			'button_code' => '',
			'button_color' => '#0c1f28',
			'button_text_color' => '#fff',			
			
		), $atts, 'cl_price'
	)	
);

		//parse link for vc linke
		$html="";		
		$button_link = ( '||' === $button_link ) ? '' : $button_link;
		$button_link = vc_build_link( $button_link );
		$use_link = false;
		if ( strlen( $button_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $button_link['url'];
			$a_title = $button_link['title'];
			$a_target = $button_link['target'];
		}

		$boxes_color = ($boxes_color) ? ' style="background: '.$boxes_color.'"' : '';
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );

		//content extraxt
		$atts['content'] = $content;			
		$btncode= rawurldecode( base64_decode( strip_tags( $atts['button_code'] ) ) );
		
		$dir = plugin_dir_path( __FILE__ );
		
		//Buttonn setup
		
		if( $atts['btn'] == 'btn_code' ){
			$btn_code='<div class="btn-code">'.$btncode.'</div>';
		}
		
		else if($atts['style']=='style2'){
			$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['title_background'].'">'. $atts['button_text'].'</a> ';
		}
		
		else if($atts['style']=='style3'){
			$btn_code=' <a style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['button_text_color'].'" href="#" class="btn-table btn-1 hvr-sweep-to-right">'.$atts['button_text'].'</a> ';
		}
		
		else if($atts['style']=='style6'){
			$btn_code='<a '. $attributes.' class="btn-table btn-1" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'">'. $atts['button_text'].'</a>';
		 }
		  
		else if($atts['style']=='style7'){
			$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['title_background'].'">'. $atts['button_text'].'</a>';
		   }
		   
		 else if($atts['style']=='style9'){
			$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['button_text_color'].'">'. $atts['button_text'].'</a>';
		   }  
		else if($atts['style']=='style10'){
		$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['title_color'].'">'. $atts['button_text'].'</a>';
		}
		
		else if($atts['style']=='style11'){
		$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['title_color'].'">'. $atts['button_text'].'</a> ';
		}
		
		else if($atts['style']=='style12'){
		$btn_code='<a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'; border:2px solid '.$atts['title_color'].'">'. $atts['button_text'].'</a>';
		}
		
		
		else if($atts['style']=='style13'){
		$btn_code=' <a '. $attributes.' class="btn-table btn-1 hvr-sweep-to-right" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].';">'. $atts['button_text'].'</a> ';
		}
		
		else if($atts['style']=='style14'){
		$btn_code='<a '. $attributes.' class="btn-table btn-1" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'">'. $atts['button_text'].'</a>';
		}
		
		else if($atts['style']=='style15'){
		$btn_code='<a '. $attributes.' class="btn-table btn-1" style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].'">'. $atts['button_text'].'</a> ';
		}
		
		else{
			$btn_code= '<a '. $attributes.' class="btn-table btn-1" style="background:'.$atts['button_color'].'; border-color: '.$atts['button_color'].';  color:'.$atts['button_text_color'].'">'. $atts['button_text'].'</a>';

			$html .= '<style>				 
			 	.btn-table.btn-1:hover{
				 	background-color:'.$button_hover_background.';
				 	color:'.$button_hover_color.';
				}
			</style>';


		}
		
		//featured check
		$featured='';
		$featured_class='';
		
		if( $atts['featured'] == 'true' ){
			if($atts['feature_text']!=''){
			$featured = '<span class="popular">' .$atts['feature_text'].'</span>';
			}
			$featured_class='featured';
			$popular='popular_plan';
		}
		
		
		// style setup
		if($atts['style']==''){
			$atts['style']='style1';
		}		
		
		if($atts['style']=='style2'){ 
			require $dir . '/style2.php';
		}
		
		elseif($atts['style']=='style3'){
			require $dir . '/style3.php';
		}
		elseif($atts['style']=='style6' || $atts['style']=='style8'){
			require $dir . '/style6.php';
		}
		elseif($atts['style']=='style9'){
			require $dir . '/style9.php';
		}
		elseif($atts['style']=='style7'){
			require $dir . '/style7.php';
		}
		elseif($atts['style']=='style10'){
			require $dir . '/style10.php';
		}
		
		elseif($atts['style']=='style11'){
			require $dir . '/style11.php';
		}
		elseif( $atts['style']=='style12'){
			require $dir . '/style12.php';
		}
		
		else if( $atts['style']=='style13'){
			require $dir . '/style13.php';
		}
		
		elseif( $atts['style']=='style14'){
			require $dir . '/style14.php';
		}
		elseif( $atts['style']=='style15'){
			require $dir . '/style15.php';
		}
		else{
		$title_color_price = ($atts['title_color']) ? 'style="color:'.$atts['title_color'].'"' : '';	
		$html .='<section class="cl-pricing-wrap">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'" '.$boxes_color.'>
			  <div class="cl-pricetable-wrap '.$featured_class.'">
				<div class="top">
				 '.$featured.'
				  <div class="cl-header">
					<h4 '.$title_color_price.'>'.$atts['title'].'</h4>           
				  </div>
				  <div class="cl-subheader">
					<h3 style="color:'.$atts['title_color'].'"> <span class="dolar"  style="color:'.$atts['title_color'].'">'.$atts['currency'].'</span>'. $atts['price'].'					  
					</h3>
				    <h5 '.$title_color_price.'> '.$atts['per'].'</h5>
					 <h6 '.$title_color_price.'>'. $atts['subtitle'].'</h6>
				  </div>
				</div>
				<div class="bottom"  style="color:'.$atts['text_color'].'"><p>
				  '.$atts['content'].' 
				  '.$btn_code.' </div>
			  </div>
			</div>
		  </div>
		</section>';
		
		}	
		
	return $html;
	}
?>
