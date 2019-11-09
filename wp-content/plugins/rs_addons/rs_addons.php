<?php
/**
* Plugin Name: Rs Addons
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: by Rs Addons plugin
* Version: 1.0
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

/**
* Function when plugin is activated
*
* @param void
*
*/

function check_visual_composer_plugin() {
  if ( is_plugin_active('js_composer/js_composer.php') ) {
        
      // Create multi dropdown param type
        vc_add_shortcode_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
        function dropdown_multi_settings_field( $param, $value ) {
           $param_line = '';
           $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
           foreach ( $param['value'] as $text_val => $val ) {
               if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                            $text_val = $val;
                        }
                        $text_val = __($text_val, "js_composer");
                        $selected = '';

                        if(!is_array($value)) {
                            $param_value_arr = explode(',',$value);
                        } else {
                            $param_value_arr = $value;
                        }

                        if ($value!=='' && in_array($val, $param_value_arr)) {
                            $selected = ' selected="selected"';
                        }
                        $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
                    }
           $param_line .= '</select>';

           return  $param_line;
        } 

  }
}
add_action( 'admin_init', 'check_visual_composer_plugin' );


//Including file that manages all template

//All Post type include here

$dir = plugin_dir_path( __FILE__ );
require_once $dir .'/inc/vc_addon/inc/abstruct.php';
//For team
require_once $dir .'/inc/team/team.php';
//For portfolio
require_once $dir .'/inc/portfolio/portfolio.php';
//For career
require_once $dir .'/inc/career/career.php';
//For Screenshoot
require_once $dir .'/inc/screenshoot/client.php';
//For Client
require_once $dir .'/inc/rsclient/rsclient.php';
require_once $dir .'/inc/service/service.php';

require_once $dir .'/post-type/client/sponsor.php';
//shordcode 
require_once $dir .'/inc/vc_addon/rs_call_toaction.php';
require_once $dir .'/inc/vc_addon/rs_banner.php';
require_once $dir .'/inc/vc_addon/rs_gallery.php';
require_once $dir .'/inc/vc_addon/rs_client.php';
require_once $dir .'/inc/vc_addon/rs_contact.php';
//require_once $dir .'/inc/vc_addon/rs-tab.php';
require_once $dir .'/inc/vc_addon/rs_heading.php';
require_once $dir .'/inc/vc_addon/rs_title.php';
require_once $dir .'/inc/vc_addon/rs_button.php';
require_once $dir .'/inc/vc_addon/rs_services.php';
require_once $dir .'/inc/vc_addon/rs_team.php';
require_once $dir .'/inc/vc_addon/rs_blog.php';
require_once $dir .'/inc/vc_addon/rs_video.php';
require_once $dir .'/inc/vc_addon/rs_particle.php';
require_once $dir .'/inc/vc_addon/rs_portfolio.php';
require_once $dir .'/inc/vc_addon/rs_service_slider.php';
require_once $dir .'/inc/vc_addon/rs_services-grid.php';
require_once $dir .'/inc/vc_addon/rs_menu.php';
require_once $dir .'/inc/vc_addon/countdown.php';
require_once $dir .'/inc/vc_addon/rs_portfolio_slider.php';
require_once $dir .'/inc/vc_addon/rs_career_timeline.php';
require_once $dir .'/inc/vc_addon/rs-circular skill bars.php';
?>