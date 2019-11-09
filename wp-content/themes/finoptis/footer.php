<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
?>
     
</div><!-- .main-container -->
<?php
global $finoptis_option;
 $header_width_meta = get_post_meta(get_the_ID(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $finoptis_option['header-grid'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
$footer_bg = get_post_meta(get_the_ID(),'footer_bg', true);
$copyright_bg = get_post_meta(get_the_ID(),'copyright_bg', true);
$footer_bg = ($footer_bg) ? $footer_bg : '';
$footer_select = get_post_meta(get_the_ID(),'footer_select', true);
$footer_select = ($footer_select) ? $footer_select : '';

if(!empty( $footer_bg)):?>
    <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" style="background: <?php echo esc_attr($footer_bg);?>">

<?php elseif( !empty( $finoptis_option['footer_bg_image']['url'])):?>
    <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" style="background-image: url('<?php echo esc_url($finoptis_option['footer_bg_image']['url']);?>')">
    <?php else:?>
        <footer id="rs-footer" class="<?php echo esc_attr($footer_select);?> rs-footer footer-style-1" >
<?php endif; ?>
  <?php  
    get_template_part( 'inc/footer/footer','top' ); 
?>  


  <div class="footer-bottom" <?php if(!empty( $copyright_bg)): ?> style="background: <?php echo esc_attr($copyright_bg); ?>;" <?php endif; ?>>
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="copyright">
                    <?php if(!empty($finoptis_option['copyright'])){?>
                    <p><?php echo wp_kses_post($finoptis_option['copyright']); ?></p>
                    <?php }
                     else{
                        ?>
                    <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
                    </p>
                    <?php
                     }   
                    ?>
                </div>
            </div>
             
            </div>
        </div>
  </div>
</footer>
</div><!-- #page -->
<?php 
if(!empty($finoptis_option['show_top_bottom'])){
?>
 <!-- start scrollUp  -->
<div id="scrollUp">
    <i class="fa fa-angle-up"></i>
</div>   
<?php } ?>   

<?php wp_footer(); ?>
<script>
/*var wpcf7Elm = document.querySelector( '#wpcf7-f4294-o1');
 if(wpcf7Elm){
	// #wpcf7mailsent 
wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
   //window.open(window.location.origin+"/Verve%20Square%20Technologies_Corporate%20Presentation_2019.pdf");

   location.href = window.location.origin+"/Verve%20Square%20Technologies_Corporate%20Presentation_2019.pdf";
}, false );
}*/
</script>
  </body>
</html>
