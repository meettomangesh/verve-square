<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @package grassywp
 * @author RS Theme
 * @link http://www.rstheme.com
 */
?>
<?php
// Register Client Post Type
function grassy_client_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Clients', 'grassywp' ),
		'singular_name'      => esc_html__( 'Client', 'grassywp' ),
		'add_new'            => esc_html_x( 'Add New Client', 'grassywp', 'grassywp' ),
		'add_new_item'       => esc_html__( 'Add New Client', 'grassywp' ),
		'edit_item'          => esc_html__( 'Edit Client', 'grassywp' ),
		'new_item'           => esc_html__( 'New Client', 'grassywp' ),
		'all_items'          => esc_html__( 'All Clients', 'grassywp' ),
		'view_item'          => esc_html__( 'View Client', 'grassywp' ),
		'search_items'       => esc_html__( 'Search Clients', 'grassywp' ),
		'not_found'          => esc_html__( 'No Clients found', 'grassywp' ),
		'not_found_in_trash' => esc_html__( 'No Clients found in Trash', 'grassywp' ),
		'parent_item_colon'  => esc_html__( 'Parent Client:', 'grassywp' ),
		'menu_name'          => esc_html__( 'Client', 'grassywp' ),
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
	register_post_type( 'client', $args );
}
add_action( 'init', 'grassy_client_register_post_type' );

// Meta Box
/*--------------------------------------------------------------
*			Client info
*-------------------------------------------------------------*/
function grassy_client_info_meta_box() {
	add_meta_box( 'client_info_meta', esc_html__( 'Client Info', 'grassywp' ), 'grassy_client_info_meta_callback', 'client', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'grassy_client_info_meta_box');
// member info callback
function grassy_client_info_meta_callback( $client_info ) {
	wp_nonce_field( 'client_social_metabox', 'client_social_metabox_nonce' ); ?>
	<div style="margin: 10px 0;"><label for="tagline" style="width:150px; display:inline-block;"><?php esc_html_e( 'Client Link', 'grassywp' ) ?></label>
	<?php $client_link = get_post_meta( $client_info->ID, 'client_link', true ); ?>
	<input type="text" name="client_link" id="client_link" class="client_link" value="<?php echo esc_html($client_link); ?>" style="width:300px;"/>
	</div>
<?php }
/*--------------------------------------------------------------
 *			Save member social meta
*-------------------------------------------------------------*/
function save_grassy_client_social_meta( $post_id ) {
	if ( ! isset( $_POST['client_social_metabox_nonce'] ) ) {
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( 'client' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}
	$mymeta = array( 'client_link' );
	foreach ( $mymeta as $keys ) {
		if ( is_array( $_POST[ $keys ] ) ) {
			$data = array();

			foreach ( $_POST[ $keys ] as $key => $value ) {
				$data[] = $value;
			}
		} else {
			$data = sanitize_text_field( $_POST[ $keys ] );
		}
		update_post_meta( $post_id, $keys, $data );
	}
}
add_action( 'save_post', 'save_grassy_client_social_meta' );