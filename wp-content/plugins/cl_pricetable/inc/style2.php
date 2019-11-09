<?php
$randvalue=rand(0,10000);

$html='<section class="cl-pricing-wrap '.$atts['style'].'-'.$randvalue.'">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap '.$featured_class.' price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].'; border:1px solid '.$atts['title_background'].'">
			<div class="top">
		 		'.$featured.'
				<div class="cl-header">
            <h4 style="background:'.$atts['title_background'].'">'.$atts['title'].' <span class="dolar"  style="color:'.$atts['title_background'].'">'.$atts['currency'].$atts['price'].'</span></h4>           
          </div>		   
         '.$btn_code.'
			</div>
					
					 <div class="bottom"  style="color:'.$atts['text_color'].';border: 1px solid '.$border_color.'"><p>
						 '.$atts['content'].'
					</div>	
				</div>
			</div>			
		</div>		  
	</section>
		
	 <style>
	 
	 	.'.$atts['style'].'-'.$randvalue.' li.show{
		 border-left:5px solid '.$atts['title_background'].';
		}
		
		.'.$atts['style'].'-'.$randvalue.' .price-table  .btn-table:before{background:'.$atts['title_background'].' !important;}
	 </style>
';
		
		
return $html;
?>
