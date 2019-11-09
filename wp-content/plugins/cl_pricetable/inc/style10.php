<?php
$randvalue=rand(0,10000);
$popular='';
$html='<section class="cl-pricing-wrap" class="'.$atts['style'].'-'.$randvalue.'">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap '.$popular.'  price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].'; border:1px solid '.$atts['boxes_color'].'">
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
	</section>
		
	 <style>
	 
	
	 
	  .'.$atts['style'].'-'.$randvalue.' .price-style10:hover{
		 background:'.$atts['title_color'].' !important;
		 border:1px solid '.$atts['title_color'].' !important;
	 }
	 
	  .'.$atts['style'].'-'.$randvalue.' .popular_plan:hover{
		 background:'.$atts['boxes_color'].' !important;
		 border:1px solid '.$atts['boxes_color'].' !important;
	 }
	 
	 
	  .'.$atts['style'].'-'.$randvalue.' .price-style10:hover .btn-table{
		  border:2px solid '.$atts['text_color'].' !important;
	  }
	 
	 	 .'.$atts['style'].'-'.$randvalue.' .price-style10 a.btn-table:hover{
		   color:'.$atts['title_color'].' !important;
		}
		
		.'.$atts['style'].'-'.$randvalue.' .price-table  .btn-table:before{background:'.$atts['title_background'].' !important;}
	 </style>
';
		
		
return $html;
?>
