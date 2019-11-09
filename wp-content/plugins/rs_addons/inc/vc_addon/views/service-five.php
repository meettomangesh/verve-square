<?php
 $title_css = '';
if ( $title_color != '' ) {    
	        $title_css = "color: {$title_color};";  
	}
	$html = '<div class="rs-services">
		<div class="service-inner services-style-5 text-'.$align.' '.$css_class.' '.$css_class_custom.'">
			<div class="services-wrap"> 
		        <div class="services-item">
					<div class="services-desc">	
						<div class="icon_bg" '.$icon_bg.'>
							'.$imagebg.'
						</div>
						<h4 class="services-title services-title2" '.$desc_bg.'><a '. $attributes.' style="'.$title_css.'">'.$title.'</a></h4>					
					</div>	
				</div>	
			</div>
		</div>
	</div>';
	echo $html;
?>