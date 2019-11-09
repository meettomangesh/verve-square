
<?php
    global $finoptis_option; 
    $header_grid2 = "";
    
    $header_width_meta = get_post_meta(get_the_ID(), 'header_width_custom2', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $finoptis_option['header_grid2'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
?>

<?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'footer1'  )
        && ! is_active_sidebar( 'footer2' )
        && ! is_active_sidebar( 'footer3'  )
        && ! is_active_sidebar( 'footer4' )
    ){
      
    } 
   global $finoptis_option 
?>

<?php if(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && is_active_sidebar('footer4'))
  {?>
  <div class="footer-top">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
          <div class="col-lg-3">                                  
                <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                        <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                    </a>
                <?php } ?>            
              <?php dynamic_sidebar('footer1');?>      
                              
          </div>              
          <div class="col-lg-3">
            <?php dynamic_sidebar('footer2'); 
            
            ?>                             
          </div>
          <div class="col-lg-3">
              <?php dynamic_sidebar('footer3'); ?>
             
          </div>
          <div class="col-lg-3">
             <?php dynamic_sidebar('footer4'); ?>   
          </div>
      </div>
    </div>
  </div>
  <?php }
 elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  {?>
  <div class="footer-top">
      <div class="<?php echo esc_attr($header_width);?>" style="width:100%;">
        <div class="row">                   
          <div class="col-lg-2">                                          
              <div class="about-widget widget">
                <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                        <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                    </a>
                <?php } ?> 
                <?php dynamic_sidebar('footer1');?>                  
                  
              </div>                       
          </div>              
          <!--<div class="col-lg-1">
            <?php //dynamic_sidebar('footer2'); ?>                            
          </div>-->
          <div class="col-lg-10">
		  
			<div class="row">
				<div class="col-lg-3">
				 <section id="custom_html-3" class="widget_text widget widget_custom_html">
					<h3 class="footer-title" >Traditional Services</h3>
					<div class="textwidget custom-html-widget">
					   <ul id="menu-services-menu" class="menu">
						  <li id="menu-item-4239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4239"><a href="http://vervesquare.com/services/traditional-testing-service/" target="_self">System Testing</a></li>
						  <li id="menu-item-4240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4240"><a href="http://vervesquare.com/services/traditional-testing-service/" target="_self">Integration Testing</a></li>
						  <li id="menu-item-4241" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4241"><a href="http://vervesquare.com/services/traditional-testing-service/" target="_self">Regression Testing</a></li>
						  <li id="menu-item-4242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4242"><a href="http://vervesquare.com/services/traditional-testing-service/" target="_self">Data Migration Testing</a></li>
					   </ul>
					</div>
				 </section>
				</div>
				<div class="col-lg-3">
				 <section id="custom_html-4" class="widget_text widget widget_custom_html">
					<h3 class="footer-title">Specialized Testing</h3>
					<div class="textwidget custom-html-widget">
					   <ul id="menu-services-menu" class="menu">
						  <li id="menu-item-4239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4239"><a href="http://vervesquare.com/services/specialized-testing/" target="_self">Performance Testing</a></li>
						  <li id="menu-item-4240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4240"><a href="http://vervesquare.com/services/specialized-testing/" target="_self">Security Testing</a></li>
						  <li id="menu-item-4241" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4241"><a href="http://vervesquare.com/services/specialized-testing/" target="_self">Data Warehouse Testing</a></li>
						  <li id="menu-item-4242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4242"><a href="http://vervesquare.com/services/specialized-testing/" target="_self">Mobile Test Automation</a></li>
					   </ul>
					</div>
				 </section>
				</div>
				<div class="col-lg-3">
				 <section id="custom_html-9" class="widget_text widget widget_custom_html">
					<h3 class="footer-title">New Age Solutions</h3>
					<div class="textwidget custom-html-widget">
					   <ul id="menu-services-menu" class="menu">
						  <li id="menu-item-4239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4239"><a href="http://vervesquare.com/services/new-age-solutions/" target="_self">DevOps Enablement</a></li>
						  <li id="menu-item-4241" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4241"><a href="http://vervesquare.com/services/new-age-solutions/" target="_self">Crowd Testing</a></li>
						  <li id="menu-item-4242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4242"><a href="http://vervesquare.com/services/new-age-solutions/" target="_self">IoT Testing</a></li>
						  <li id="menu-item-4240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4240"><a href="http://vervesquare.com/services/new-age-solutions/" target="_self">Test Automation with ML</a></li>
					   </ul>
					</div>
				 </section>
				</div>
				<div class="col-lg-3">
				 <section id="custom_html-10" class="widget_text widget widget_custom_html">
					<h3 class="footer-title">Test Consulting</h3>
					<div class="textwidget custom-html-widget">
					   <ul id="menu-services-menu" class="menu">
						  <li id="menu-item-4239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4239"><a href="http://vervesquare.com/services/test-consulting/" target="_self">Test Process Consulting</a></li>
						  <li id="menu-item-4241" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4241"><a href="http://vervesquare.com/services/test-consulting/" target="_self">TCoE Setup</a></li>
						  <li id="menu-item-4242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4242"><a href="http://vervesquare.com/services/test-consulting/" target="_self">Test Maturity Assessment</a></li>
						  <li id="menu-item-4240" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4240"><a href="http://vervesquare.com/services/test-consulting/" target="_self">Test Strategy Development</a></li>
					   </ul>
					</div>
				 </section>
				</div>
			</div>
		
              <?php //dynamic_sidebar('footer3'); 
             ?> 
          </div>         
      </div>
    </div>
  </div>
<?php } 
 elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">
            <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                    <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </a>
            <?php } ?> 
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer2'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
  }

elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && !is_active_sidebar('footer3') && is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">
            <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                    <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </a>
            <?php } ?> 
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer4'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}

elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">
            <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                    <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </a>
            <?php } ?> 
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer3'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}


elseif(!is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && !is_active_sidebar('footer4'))
  { ?>
  <div class="footer-top"> 
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">   
          <div class="col-lg-6">
            <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                    <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </a>
            <?php } ?> 
            <?php dynamic_sidebar('footer1'); ?>                            
          </div>                 
          <div class="col-lg-6">
            <?php dynamic_sidebar('footer3'); ?>                            
          </div>          
      </div>
    </div>
  </div>
  <?php
}

 elseif(is_active_sidebar('footer1') && !is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4')) {
?>
<div class="footer-top"> 
<div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
          <div class="col-lg-4-12">                                          
              <div class="about-widget widget">
                 <?php              
                   if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                         <img class="footer-logo" src="<?php echo esc_url( $finoptis_option['footer_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                      <?php } 
                                 
                   ?>
                  <?php dynamic_sidebar('footer1'); 
                  get_template_part ( 'inc/footer/footer','social' );?>
              </div>                  
          </div>                  
      </div>
  </div>
</div>
<?php } 

 elseif(!is_active_sidebar('footer1') && is_active_sidebar('footer2') && !is_active_sidebar('footer3') && !is_active_sidebar('footer4')) {
?>
<div class="footer-top"> 
<div class="<?php echo esc_attr($header_width);?>">
        <div class="row">                   
          <div class="col-md-12">
            <?php if(!empty($finoptis_option['footer_logo']['url'])) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                    <img src="<?php  echo esc_url($finoptis_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </a>
            <?php } ?>                                       
                <?php dynamic_sidebar('footer2'); ?>       
          </div>                  
      </div>
  </div>
</div>
<?php } ?>