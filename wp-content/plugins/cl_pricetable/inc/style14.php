<?php
$html='<section class="cl-pricing-wrap">
  <div class="clpricing-table">
    <div class="price-table '.$atts['style'].'">
      <div class="cl-pricetable-wrap" style="background:'.$atts['boxes_color'].'">
        <div class="top" style="background:'.$atts['title_background'].'">
		 '.$featured.'
          <div class="cl-header">
            <h4 style="color:'.$atts['title_color'].'">'.$atts['title'].'</h4>           
          </div>
          <div class="cl-subheader">
            <h3 style="color:'.$atts['title_color'].'"> <span class="dolar"  style="color:'.$atts['title_color'].'">'.$atts['currency'].'</span>'. $atts['price'].'
              <h5 style="color:'.$atts['title_color'].'"> '.$atts['per'].'</h5>
            </h3>
           
             <h6 style="color:'.$atts['subtitle_color'].'">'. $atts['subtitle'].'</h6>
          </div>
        </div>
        <div class="bottom"  style="color:'.$atts['text_color'].'">
          '.$atts['content'].'
          '.$btn_code.' </div>
      </div>
    </div>
  </div>
</section>';

return $html;

?>
