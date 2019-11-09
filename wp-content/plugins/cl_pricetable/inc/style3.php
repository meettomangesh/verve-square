<?php
$randvalue='';
$html='<section class="cl-pricing-wrap">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].';">
                              <div class="top">
                                 '.$featured.'
                                 <div class="cl-header">
                                    <h4 style="color:'.$atts['title_color'].'; ">'.$atts['title'].'</h4>
                                    <h5 style="color:'.$atts['title_color'].'; ">'.$atts['per'].'</h5>
                                 </div> 
                              </div>
                              <div class="featured">
                              '.$atts['content'].';
                              </div>
                              <div class="bottom">
                                 <div class="cl-footer">
                                    <div class="dolar"  style="color:'.$atts['title_color'].'; ">'.$atts['currency'].$atts['price'].'</div>
                                   '.$btn_code.'
                          </div>
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
