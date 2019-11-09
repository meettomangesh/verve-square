<?php
/**
* Plugin Name: CL Testimonial
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: Testimonial Addon plugin For Visual Composer
* Version: 1.1
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



function cl_testi_add(){ 
    //adding css to plugin
	wp_register_style( 'cl-style1-clt', 	plugin_dir_url( __FILE__ ) . 'css/hover-min.css');
	wp_register_style( 'cl-style2-clt', 	plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css');
	wp_register_style( 'cl-style3-clt', 	plugin_dir_url( __FILE__ ) . 'css/slick.css');
	wp_register_style( 'cl-style4-clt', 	plugin_dir_url( __FILE__ ) . 'css/slick-theme.css');
	wp_register_style( 'cl-style-clt', 		plugin_dir_url( __FILE__ ) . 'css/style.css');
	wp_enqueue_style( 'cl-style-clt' );
	wp_enqueue_style( 'cl-style1-clt' );
	wp_enqueue_style( 'cl-style2-clt');
	wp_enqueue_style( 'cl-style3-clt');
	wp_enqueue_style( 'cl-style4-clt');
}
add_action( 'wp_enqueue_scripts', 'cl_testi_add' );

function cl_testi_script_add(){
    // Register the script    
	wp_register_script( 'cl-carousel-clt', 	plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array('jquery'), '1.3', true); 
	wp_enqueue_script( 'cl-carousel-clt' );
}
add_action( 'wp_enqueue_scripts', 'cl_testi_script_add' );

//Register js

function cl_testi_adding_scripts() {
	wp_register_script('custom_script_clt', plugin_dir_url( __FILE__ ) . 'js/main.js', array('jquery'), '1.1', true);
	wp_enqueue_script('custom_script_clt');
}
add_action ('wp_enqueue_scripts', 'cl_testi_adding_scripts');




$dir = plugin_dir_path( __FILE__ );

//For testimonail
require_once $dir .'/inc/testimonial/vc_testimonial.php';
require_once $dir . '/inc/testimonial/clt_testimonail_shortcode.php';
require_once $dir .'/inc/testimonial/meta-box.php';

?>