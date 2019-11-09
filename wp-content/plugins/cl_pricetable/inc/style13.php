<?php
$randvalue=rand(0,10000);
$popular='';
$html='<section class="cl-pricing-wrap" class="'.$atts['style'].'-'.$randvalue.'">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap '.$popular.'  price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].';">			
			
				<div class="top">
				'.$featured.'
				  <div class="cl-subheader">
					<h3><span class="dolar"  style="color:'.$atts['title_color'].'; background:'.$atts['title_background'].'">'.$atts['currency'].$atts['price'].'</span></h3>
				  </div>
				  <div class="cl-header">
					 <h4 style="color:'.$atts['title_color'].'; background:'.$atts['title_background'].'">'.$atts['title'].'</h4> 
				  </div>
				</div>
		
				<div class="bottom" style="color:'.$atts['text_color'].'">
				  '.$atts['content'].'
				 '.$btn_code.'
				</div>				
			</div>			
		</div>	
	</div>	  
</section>
		
	 <style>
	 
	
	 

	 .'.$atts['style'].'-'.$randvalue.' .clpricing-table .price-'.$atts['style'].'  .bottom .btn-table:before{
		 background: '.$atts['text_color'].' !important;
		 border-radius:5px !important;	 
	 }
	 
	.'.$atts['style'].'-'.$randvalue.' .clpricing-table .price-'.$atts['style'].'  .bottom .btn-table:hover{		 
		  color: '.$atts['boxes_color'].' !important;
		  border-radius:5px !important;				  
	 }
	 



	 </style>
';
		
		
return $html;
?>
