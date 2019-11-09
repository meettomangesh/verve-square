<?php

$html='<section class="cl-pricing-wrap">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].';">
			<div class="top">
		 		'.$featured.'
				<div class="cl-header">
            <h4 style="color:'.$atts['title_color'].'; background:'.$atts['title_background'].'">'.$atts['title'].'</h4>           
          </div>	
		  
		  <div class="cl-subheader" style="color:'.$atts['title_color'].';">
				<h3 style="color:'.$atts['title_color'].';>
				   <span class="dolar">'.$atts['currency'].'</span>'.$atts['price'].'
				   <h5 >'.$atts['per'].'</h5>
				</h3>
				<h6 style="color:'.$atts['subtitle_color'].'">'. $atts['subtitle'].'</h6>
           </div>	   
           '.$btn_code.'
			</div>
			
					 <div class="bottom"  style="color:'.$atts['text_color'].'">
						 '.$atts['content'].'
					</div>	
				</div>
			</div>			
		</div>		  
	</section>

';
		
		
return $html;
?>
