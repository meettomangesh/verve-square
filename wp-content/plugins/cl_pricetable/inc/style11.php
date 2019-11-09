<?php
$randvalue=rand(0,10000);
$popular='';
$html='<section class="cl-pricing-wrap" class="'.$atts['style'].'-'.$randvalue.'">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap '.$popular.'  price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].'; border:1px solid '.$atts['boxes_color'].'">
			<div class="inner-box" style="border:1px solid '.$atts['inner_border'].'">
			<div class="top">
		 		'.$featured.'
				<div class="cl-header">
                  
            <h4 style="color:'.$atts['title_color'].'; background:'.$atts['title_background'].'">'.$atts['title'].' <span class="dolar"  style="color:'.$atts['title_background'].'"></span></h4> 
			<h5 style="color:'.$atts['title_color'].'">'.$atts['per'].'</h5>          
          </div>		   
       
			</div>
			<div class="featured"  style="color:'.$atts['text_color'].'">
			  '.$atts['content'].'
			</div>
			
			<div class="bottom">
				<div class="dolar" style="color:'.$atts['text_color'].'">'.$atts['currency'].$atts['price'].'</div>
					'.$btn_code.'
					</div>	
				</div>
			</div>			
		</div>	
		</div>	  
	</section>
		
	 <style>
	 
	
	 
	  .'.$atts['style'].'-'.$randvalue.'  .price-'.$atts['style'].' .inner-box:hover{
		 background:'.$atts['inner_color'].' !important;
		 border:1px solid '.$atts['inner_color'].' !important;
	 }
		 
	  .'.$atts['style'].'-'.$randvalue.' .clpricing-table .bottom .btn-table:before{
		 background: '.$atts['boxes_color'].' !important;
	 }
	 
	.'.$atts['style'].'-'.$randvalue.' .clpricing-table .price-'.$atts['style'].' .cl-pricetable-wrap .bottom .btn-table:hover{
		  border:2px solid '.$atts['boxes_color'].' !important;
	 }
	 
	 .clpricing-table  .price-'.$atts['style'].' .popular_plan .inner-box{
		 background:'.$atts['inner_color'].' !important;
		 border:1px solid '.$atts['inner_color'].' !important;
	 }


	 </style>
';
		
		
return $html;
?>
