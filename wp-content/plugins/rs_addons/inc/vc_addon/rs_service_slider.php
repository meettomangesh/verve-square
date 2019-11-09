<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
    function vc_rs_service_slider_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'bstart' ) => '0' );  
        $args = array(
            'taxonomy' => array('service-category'),//ur taxonomy
            'hide_empty' => false,                  
        );

        $terms_= new WP_Term_Query( $args );
        foreach ( (array)$terms_->terms as $term ) {
            $category_dropdown[$term->name] = $term->slug;      
        } 
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Service Slider', 'bstart'),
                'base' => 'vc_serviceslider',
                'description' => __('Rs Service Slider Information', 'bstart'), 
                'category' => __('by RS Theme', 'bstart'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                    
                    array(
                        "type" => "dropdown",
                        "heading" => __("Slider Style", "bstart"),
                        "param_name" => "service_slider_style",
                        "value" => array(                                                       
                            'Style 1' => "Style 1", 
                            'Style 2' => "Style 2",                                                     
                            'Style 3' => "Style 3",                                                     
                        ),                        
                    ),

                    array(
                        'type'       => 'dropdown',
                        'heading'    => __( 'Slider Thumbnail Align', 'rsaddon' ),
                        'param_name' => 'align',
                        'value' => array(
                            __( 'Select' )   => '',
                            __( 'Left', 'rsaddon' )   => 'left',
                            __( 'Right', 'rsaddon' )  => 'right',
                        ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 3')),
                    ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Show title", "bstart"),
                        "param_name" => "title",
                        "value" => array(                                                       
                            'Yes' => "Yes", 
                            'No' => "No",                                                                                                                                                                       
                        ), 
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 3')),                       
                    ), 

                    array(
                    "type" => "dropdown_multi",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __( "Categories", 'bstart' ),
                    "param_name" => "cat",
                    'value' => $category_dropdown,
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Service Per Pgae", "bstart"),
                        "param_name" => "team_per",
                        'value' =>"6",
                        'description' => __( 'You can write how many team member show. ex(2)', 'bstart' ),                  
                    ),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => __( 'Service Link', 'rsaddon' ),
                        'param_name'  => 'link_type',
                        "value" => array(                                                       
                            'No Link' => "", 
                            'Default Link' => "default_link",                                                                  
                            'External Link' => "external_link"                                                                        
                        ),                     
                    ),

                    array(
                        'type'        => 'vc_link',
                        'heading'     => __( 'External URL (Link)', 'rsaddon' ),
                        'param_name'  => 'service_link',
                        'description' => __( 'Add link to Serices Pages.', 'rsaddon' ),
                        "dependency" => Array('element' => 'link_type', 'value' => array('external_link')),                   
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Read More Text", 'rsaddon'),
                        "param_name" => "more_text",
                        'description' => __( 'Type your read more text here', 'rsaddon' ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Service Title Color", "rsaddon" ),
                        "param_name" => "title_color",
                        "value" => '',
                        "description" => __( "Choose title color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ), 

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Border Color", "rsaddon" ),
                        "param_name" => "border_color",
                        "value" => '',
                        "description" => __( "Choose border color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Service Description Color", "rsaddon" ),
                        "param_name" => "desc_color",
                        "value" => '',
                        "description" => __( "Choose description color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ), 

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Service Background Color", "rsaddon" ),
                        "param_name" => "desc_bg",
                        "value" => '',
                        "description" => __( "Choose description Background color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),

                    //item show depending on screen size
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Desktops > 1199px )", 'rsaddon' ),
                        "param_name" => "col_lg",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "3",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style 3')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Desktops > 991px )", 'rsaddon' ),
                        "param_name" => "col_md",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "3",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Tablets > 767px )", 'rsaddon' ),
                        "param_name" => "col_sm",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "3",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Small Phones < 480px )", 'rsaddon' ),
                        "param_name" => "col_mobile",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "1",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Navigation Dots", 'rsaddon' ),
                        "param_name" => "slider_dots",
                        "value" => array(
                            __( 'Disabled', 'rsaddon' ) => 'false',
                            __( 'Enabled', 'rsaddon' )  => 'true',
                            ),
                        "description" => __( "Enable or disable navigation dots. Default: Disable", 'rsaddon' ),
                        'group' => 'Style',                      
                    ),
                
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'CSS box', 'bstart' ),
                        'param_name' => 'css',
                        'group' => __( 'Design Options', 'bstart' ),
                    ),            
                        
                ),
                
                    
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_rs_service_slider_mapping' );
     
    // Element HTML
    function vc_rsservice_slider_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'                => '',                      
                    'team_per'             => '6',                                     
                    'align'                => '',                                     
                    'css_class_custom'     => '',                                     
                    'service_slider_style' => '',                                     
                    'css'                  => '' ,
                    'cat'                  => '',           
                    'more_text'            => '',           
                    'link_type'            => '',           
                    'service_link'         => '',           
                    'title_color'          => '',           
                    'border_color'         => '',           
                    'desc_color'           => '',           
                    'desc_bg'              => '',
                    'col_lg'               => '3',
                    'col_md'               => '3',
                    'col_sm'               => '3',
                    'col_mobile'           => '1',          
                    'slider_dots'          => 'false',          
                ), 
                $atts,'vc_serviceslider'
           )
        );
    
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        //parse link for vc linke
        if($link_type == "external_link"){
            //parse link for vc linke       
            $service_link = ( '||' === $service_link ) ? '' : $service_link;
            $service_link = vc_build_link( $service_link );
            $use_link = false;
            if ( strlen( $service_link['url'] ) > 0 ) {
                $use_link = true;
                $a_href = $service_link['url'];
                $a_title = $service_link['title'];
                $a_target = $service_link['target'];
            }
            
            if ( $use_link ) {
                $attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
                $attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
                if ( ! empty( $a_target ) ) {
                    $attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
                }
            }
            $attributes = implode( ' ', $attributes );
        }

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
        
        //extract content
        $atts['content'] = $content;

        //extact icon 
        $iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
        //extract css edit box
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

        //custom color added
        $title_color  = ($title_color) ? ' style="color: '.$title_color.'"' : '';
        $border_color = ($border_color) ? ' style="border-color: '.$border_color.'"' : '';
        $desc_color   = ($desc_color) ? ' style="color: '.$desc_color.'"' : '';
        $desc_bg      = ($desc_bg) ? ' style="background: '.$desc_bg.'"' : '';

        $html='<div class="rs-team">
        <div class="team-carousel owl-carousel owl-navigation-yes">';       
        $post_title_show='';
        $degination='';
        $description_team='';
            
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

            for ($i=0; $i < count($arr) ; $i++) { 
            //$cats = get_term_by('slug', $arr[$i], $taxonomy);
            // if(is_object($cats)):
            $arr_cats[]= $arr[$i];
            //endif;
        }  
        if(empty($cat)){
            $best_wp = new wp_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    
            ));   
        }   
        else{
            $best_wp = new wp_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'service-category',
                            'field' => 'slug', //can be set to ID
                            'terms' => $arr_cats//if field is ID you can reference by cat/term number
                        ),
                    )
            ));   
        }  
            
            if("Style 2" == $service_slider_style ){

                $html = '<div class="service-carousel">';
                    while($best_wp->have_posts()): $best_wp->the_post();

                        $post_title= get_the_title($best_wp->ID);
                        $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');

                        if($link_type == ""){
                            $attributes = '';
                            $service_title = $post_title;
                        }
                        if($link_type == "default_link"){
                            $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                            $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                        }
                        if($link_type == "external_link"){
                            $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                        }

                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        if($link_type != ""){
                            $more_text = ($more_text) ? '<a class="readon" '.$attributes.'>Read More</a>' : '';
                        }else{
                            $more_text = '';
                        }

                        $service_item_data = array(
                                'col_lg'     => $col_lg,
                                'col_md'     => $col_md,
                                'col_sm'     => $col_sm,
                                'col_mobile' => $col_mobile,
                                'slider_dots'=> $slider_dots,
                            );                            
                            wp_localize_script( 'finoptis-main', 'service_slider_data', $service_item_data );

                        $html .= '
                            <div class="service-item slider-services-style2 '.$css_class.' '.$css_class_custom.'" '.$border_color.'>';
                                if ($post_img_url) {
                                    $html .= '<div class="service-img">
                                        <img src="'.$post_img_url.'" />
                                    </div>';

                                }
                                $html .= '
                                    <div class="services-desc">
                                        <h4 class="services-title">'.$service_title.'</h4>
                                        <p '.$desc_color.'>'.$excerpt.'</p>
                                        '.$more_text.'
                                    </div>
                                </div>';
                        endwhile;
                $html .='</div>';   
            }

            else if("Style 3" == $service_slider_style ){
                $html = '<section id="rs-services-slider" class="rs-services3 services-'.$align.'">                  
                        <div class="slider-service-slick col-services10">';
                            $left="";
                            $right="";

                            $service3_item_data = array(
                                'col_lg'     => $col_lg
                            );                            
                            wp_localize_script( 'finoptis-main', 'service3_slider_data', $service3_item_data );

                            while($best_wp->have_posts()): $best_wp->the_post();
                                $post_title= get_the_title($best_wp->ID);    
                                $excerpt = get_the_excerpt();
                                $post_url = get_post_permalink($best_wp->ID); 
                                $post_img_url = get_the_post_thumbnail($best_wp->ID,'finoptis_image_slider_big');
                                $readmore="";

                                if($link_type == ""){
                                    $attributes = '';
                                    $service_title = $post_title;
                                    $service_image = $post_img_url;
                                }
                                if($link_type == "default_link"){
                                    $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                                    $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                    $service_image = '<a '.$attributes.'> '.$post_img_url.'</a>';
                                }
                                if($link_type == "external_link"){
                                    $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                    $service_image = '<a '.$attributes.'> '.$post_img_url.'</a>';
                                }

                                if(!empty($post_img_url) && $link_type != ""){
                                    $readmore = '<a class="readon" '.$attributes.'>Read More</a>';
                                }

                            $html .= '<div class="owl-dot">
                            
                                <div class="img_wrap">
                                    <a '.$attributes.'> '.$post_img_url.'</a>
                                    <h5 class="feature-title">'.$service_title.'</h5>
                                </div>';

                                if(!empty($excerpt)){
                                    $html .= '<p>'.$excerpt.'</p>';
                                }

                            $html .= '
                                '.$readmore.'
                            </div>';
                            endwhile; 
                        $html .= '</div>
                            <div class="col-services2">
                            <div class="slick-nav item-thumb slider-nav">';
                                while($best_wp->have_posts()): $best_wp->the_post();
                                $post_title= get_the_title($best_wp->ID);
        
                                $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                                $post_url = get_post_permalink($best_wp->ID); 
                                
                                 if($title!='No'){
                                     $post_title = get_the_title($best_wp->ID);
                                }   
                                else{
                                     $post_title = '';
                                } 
                                $excerpt = get_the_excerpt();
                                $html .='<div class="cl-ft-item">                                      
                                        <img src="'. $post_img_url.'" alt="" >
                                    <div class="feature-content clearfix">
                                        <div class="heading-block">
                                            <h4 class="feature-title">                                                    
                                                '.$post_title.'                                                    
                                            </h4>                                                
                                        </div>
                                    </div>
                                </div>';                      
                                endwhile;            
                        $html .='</div></div>
                </section>' ;  
            }
            else
            {
                $html = '<section id="rs-services-slider" class="rs-services gray-color rs-services1">  
                    <div>                   
                        <div class="clfeatures">
                            <div class="row common-height clearfix">
                                <div class="col-md-7 col-sm-12 col-xs-12 nopadding-sm clearfix">
                                    <div class="vertical-middle">
                                        <div class="col-padding clearfix">
                                            <div id="item-thumb" class="item-thumb">';
                                                while($best_wp->have_posts()): $best_wp->the_post();
                                                    $post_title= get_the_title($best_wp->ID);
                        
                            
                                                     $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');

                                                    $ttile = get_the_title();

                                                     $service3_item_data = array(
                                                        'col_lg'     => $col_lg
                                                    );                            
                                                    wp_localize_script( 'finoptis-main', 'service3_slider_data', $service3_item_data );
               
                                                $html .= '<div class="owl-dot">
                                                     <img src="'.$post_img_url.'" alt="" />
                                                    <h5 class="overlay-feature-title">
                                                        <a href="#">
                                                            '.$ttile.'
                                                        </a>
                                                    </h5>

                                                </div>';

                                                endwhile; 

                                            $html .= '</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12 col-xs-12 nopadding">

                                    <div id="feature-left" class="menu-carousel owl-carousel image-carousel feature-left custom-js owl-loaded">';
                                        while($best_wp->have_posts()): $best_wp->the_post();
                                            $post_title= get_the_title($best_wp->ID);
                
                    
                                            $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                                            $post_url = get_post_permalink($best_wp->ID); 
                                            $title = get_the_title();
                                            $excerpt = get_the_excerpt();

                                            if($link_type == ""){
                                                $attributes = '';
                                                $service_title = $post_title;
                                                $service_image = '<img src="'. $post_img_url.'" alt="" >';
                                            }
                                            if($link_type == "default_link"){
                                                $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                                                $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                                $service_image = '<a '.$attributes.'><img src="'. $post_img_url.'" alt="" ></a>';
                                            }
                                            if($link_type == "external_link"){
                                                $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                                $service_image = '<a '.$attributes.'><img src="'. $post_img_url.'" alt="" ></a>';
                                            }

                                            $html .='<div class="cl-ft-item">
                                                '.$service_image.'
                                                <div class="feature-content clearfix">
                                                    <div class="heading-block">
                                                        <h4 class="feature-title">'.$service_title.'</h4>
                                                        '.$excerpt.'
                                                    </div>
                                                </div>
                                            </div>';                      
                                            endwhile;            
                                    $html .='</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>' ;
            }
    return $html; 
}

add_shortcode( 'vc_serviceslider', 'vc_rsservice_slider_html' );