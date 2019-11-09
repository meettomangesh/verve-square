<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @package rs
 * @author RS Theme
 * @link http://www.rstheme.com
 */
?>
<?php
// Register Client Post Type
function rsclient_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Client', 'rsaddon' ),
		'singular_name'      => esc_html__( 'Client', 'rsaddon' ),
		'add_new'            => esc_html_x( 'Add New Client', 'rsaddon', 'rsaddon' ),
		'add_new_item'       => esc_html__( 'Add New Client', 'rsaddon' ),
		'edit_item'          => esc_html__( 'Edit Client', 'rsaddon' ),
		'new_item'           => esc_html__( 'New Client', 'rsaddon' ),
		'all_items'          => esc_html__( 'All Client', 'rsaddon' ),
		'view_item'          => esc_html__( 'View Client', 'rsaddon' ),
		'search_items'       => esc_html__( 'Search Client', 'rsaddon' ),
		'not_found'          => esc_html__( 'No Client found', 'rsaddon' ),
		'not_found_in_trash' => esc_html__( 'No Client found in Trash', 'rsaddon' ),
		'parent_item_colon'  => esc_html__( 'Parent Client:', 'rsaddon' ),
		'menu_name'          => esc_html__( 'Client', 'rsaddon' ),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title', 'thumbnail' ),		
	);
	register_post_type( 'rsclient', $args );
}
add_action( 'init', 'rsclient_register_post_type' );

function tr_create_rsclient() {
	register_taxonomy(
		'rsclient-category',
		'rsclient',
		array(
			'label' => __( 'Client Categories','rsaddon' ),
			'rewrite' => array( 'slug' => 'rsclient-category' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'tr_create_rsclient' );