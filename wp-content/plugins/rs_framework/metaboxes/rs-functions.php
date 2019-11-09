<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'rs_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function rs_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}


add_action( 'cmb2_admin_init', 'rs_register_event_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_event_metabox() {
	$prefix = 'rs_'; 



	$cmb_event = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-event',
		'title'         => esc_html__( 'Event Information', 'rs-framework' ),
		'object_types'  => array( 'events' ), // Post type
		
	) );

	
	$cmb_event->add_field( array(
		'name' => esc_html__( 'Event Start Date', 'rs-framework' ),
		'desc' => esc_html__( 'add event start date', 'rs-framework' ),
		'id'   => 'ev_start_date',
		'type' => 'text_date',
		'date_format' => 'j F, Y'		
	) );

	$cmb_event->add_field( array(
		'name' => esc_html__( 'Event Start Time', 'rs-framework' ),
		'desc' => esc_html__( 'Add event start time', 'rs-framework' ),
		'id'   => 'ev_start_time',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );	

	$cmb_event->add_field( array(
		'name' => esc_html__( 'Event End Date', 'rs-framework' ),
		'desc' => esc_html__( 'add event end date', 'rs-framework' ),
		'id'   => 'ev_end_date',
		'type' => 'text_date',
		'date_format' => 'j F, Y'		
	) );

	$cmb_event->add_field( array(
		'name' => esc_html__( 'Event End Time', 'rs-framework' ),
		'desc' => esc_html__( 'Add event end time', 'rs-framework' ),
		'id'   => 'ev_end_time',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );

	

	$cmb_event->add_field( array(
		'name' => esc_html__( 'Event Location', 'rs-framework' ),
		'desc' => esc_html__( 'Add your event location', 'rs-framework' ),
		'id'   => 'ev_location',
		'type' => 'text_medium',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );

}




//Sponsor info

add_action( 'cmb2_admin_init', 'days_register_general_info' );

function days_register_general_info() {
	$prefix = 'day_info_';

	$cmb_day = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-info',
		'title'         => esc_html__( 'Day Information', 'rs-framework' ),
		'object_types'  => array( 'day' ), // Post type
		
	) );

	$cmb_day->add_field( array(
		'name' => esc_html__( 'Date', 'rs-framework' ),		
		'id'   => 'date',
		'type' => 'text_date',
		'date_format' => 'Y-m-d'		
	) );

	$cmb_day->add_field( array(
		'name' => esc_html__( 'Text Color', 'rs-framework' ),		
		'id'   => 'date_color',
		'type' => 'colorpicker'		
	) );
	$cmb_day->add_field( array(
		'name' => esc_html__( 'Text Background', 'rs-framework' ),		
		'id'   => 'date_bg',
		'type' => 'colorpicker'		
	) );
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function rs_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rs_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rs_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function rs_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'rs_register_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_project_metabox() {
	$prefix = 'rs_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-project',
		'title'         => esc_html__( 'Poject Images', 'rs-framework' ),
		'object_types'  => array( 'portfolios' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_project->add_field( array(
	'name' => 'Upload Project Images',
	'desc' => '',
	'id'   => 'Screenshot',
	'type' => 'file_list',
	// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	// 'query_args' => array( 'type' => 'image' ), // Only images attachment
	// Optional, override default text strings
	'text' => array(
		'add_upload_files_text' => 'Upload Files', // default: "Add or Upload Files"
		'remove_image_text' => 'Replacement', // default: "Remove Image"
		'file_text' => 'Replacement', // default: "File:"
		'file_download_text' => 'Replacement', // default: "Download"
		'remove_text' => 'Replacement', // default: "Remove"
	),
) );

	$cmb_project->add_field( array(
		'name'             => esc_html__( 'Project Image Style', 'rs-framework' ),
		'desc'             => esc_html__( 'chosse your  style', 'rs-framework' ),
		'id'               => 'image_select',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'slider' => esc_html__( 'Slider', 'rs-framework' ),
			'gallery' => esc_html__( 'Gallery', 'rs-framework' ),
			
		),
	) );




}

add_action( 'cmb2_admin_init', 'rs_register_career_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_career_metabox() {
	$prefix = 'rs_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-career',
		'title'         => esc_html__( 'Career Info', 'rs-framework' ),
		'object_types'  => array( 'careers' ), // Post type
	) );

	$cmb_project->add_field( array(
		'name' => esc_html__( 'Company Name', 'rs-framework' ),
		'desc' => '',
		'id'   => 'career_summery',
		'type' => 'text'
	) );

	$cmb_project->add_field( array(
		'name'    => esc_html__( 'Year', 'rs-framework' ),
		'desc'    => esc_html__( 'Joining year', 'rs-framework' ),
		'id'      => 'join_year',
		'type'    => 'text',
	) );

	$cmb_project->add_field( array(
		'name' => esc_html__( 'Job Start Date', 'rs-framework' ),
		'desc' => esc_html__( 'Joining date', 'rs-framework' ),
		'id'   => 'job_start_date',
		'type' => 'text_date'
				
	) );

	$cmb_project->add_field( array(
		'name' => esc_html__( 'Job End Date', 'rs-framework' ),
		'desc' => esc_html__( 'Leave empty if currently working here', 'rs-framework' ),
		'id'   => 'job_end_date',
		'type' => 'text_date'
				
	) );

	$cmb_project->add_field( array(
		'name' => esc_html__( 'Youtube Video ID', 'rs-framework' ),
		'desc' => '',
		'id'   => 'career_video',
		'type' => 'text',
		'desc' => esc_html__( 'exe ID: dauW3zQSrGM', 'rs-framework' ),
	) );
}

add_action( 'cmb2_admin_init', 'rs_register_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_header_metabox() {
	$prefix = 'rs_'; 

  /**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Header Settings', 'rs-framework' ),
		'object_types'  => array( 'page','post','teams','portfolios','services','product','archive' ), // Post type
		
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Select Banner Image', 'rs-framework' ),
		'desc' => esc_html__( 'Upload an image or enter a URL for page banner.', 'rs-framework' ),
		'id'   => 'banner_image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Header Style', 'rs-framework' ),
		'desc'             => esc_html__( 'chosse your individual header style', 'rs-framework' ),
		'id'               => 'header_select',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'header1' => esc_html__( 'Header Style 1', 'rs-framework' ),
			'header2' => esc_html__( 'Header Style 2(Transparent)', 'rs-framework' ),
			'header3' => esc_html__( 'Header Style 3', 'rs-framework' ),
			'header4' => esc_html__( 'Header Style 4', 'rs-framework' ),
			'header5' => esc_html__( 'Header Style 5', 'rs-framework' ),		
		),
	) );


	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Header Width', 'rs-framework' ),
		'desc'             => esc_html__( 'Choose your individual header width', 'rs-framework' ),
		'id'               => 'header_width_custom',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'container' => esc_html__( 'Container', 'rs-framework' ),
			'full' => esc_html__( 'Container Fluid', 'rs-framework' ),
				
		),
	) );

	

   
	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Logo Type', 'rs-framework' ),
		'desc'             => esc_html__( 'You can select logo type', 'rs-framework' ),
		'id'               => 'select-logo',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'light' => esc_html__( 'Light', 'rs-framework' ),
			'dark' => esc_html__( 'Dark', 'rs-framework' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Menu Area Background', 'rs-framework' ),
		'desc'    => esc_html__( 'chosse your background', 'rs-framework' ),
		'id'      => 'menu-type-bg',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Menu Type', 'rs-framework' ),
		'desc'             => esc_html__( 'You can select menu type', 'rs-framework' ),
		'id'               => 'menu-type',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'light' => esc_html__( 'Light', 'rs-framework' ),
			'dark' => esc_html__( 'Dark', 'rs-framework' ),			
		),
	) );



	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Page Title', 'rs-framework' ),
		'desc'             => esc_html__( 'You can show/hide page title', 'rs-framework' ),
		'id'               => 'select-title',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Top Bar', 'rs-framework' ),
		'desc'             => esc_html__( 'You can show/hide topbar', 'rs-framework' ),
		'id'               => 'select-top',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Breadcurmbs', 'rs-framework' ),
		'desc'             => esc_html__( 'You can show/hide  breadcurmbs here', 'rs-framework' ),
		'id'               => 'select-bread',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	) 
);
}

//page section metabox

add_action( 'cmb2_admin_init', 'rs_register_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_page_metabox() {
	$prefix = 'rs_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_meta_page = new_cmb2_box( array(
		'id'            => $prefix . 'page',
		'title'         => esc_html__( 'Page Settings', 'rs-framework' ),
		'object_types'  => array( 'page' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Content Top Padding', 'rs-framework' ),
		'desc'    => esc_html__( 'example(100px)', 'rs-framework' ),
		'default' => esc_attr__( '100px', 'rs-framework' ),
		'id'      => 'content_top',
		'type'    => 'text_medium',
	) );

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Content Bottom Padding', 'rs-framework' ),
		'desc'    => esc_html__( 'example(100px)', 'rs-framework' ),
		'default' => esc_attr__( '100px', 'rs-framework' ),
		'id'      => 'content_bottom',
		'type'    => 'text_medium',
	) );
}

add_action( 'cmb2_admin_init', 'rs_register_footer_metabox' );

function rs_register_footer_metabox() {
	$prefix = 'rs_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */


	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'footer',
		'title'         => esc_html__( 'Footer Settings', 'rs-function' ),
		'object_types'  => array( 'page' ), // Post type		
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Footer Width', 'rs-framework' ),
		'desc'             => esc_html__( 'Choose your individual header width', 'rs-framework' ),
		'id'               => 'header_width_custom2',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'container' => esc_html__( 'Container', 'rs-framework' ),
			'full' => esc_html__( 'Container Fluid', 'rs-framework' ),
				
		),
	) );


	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Footer Background', 'cmb2' ),
		'desc'    => esc_html__( 'select footer background', 'cmb2' ),
		'id'      => 'footer_bg',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Copyright Background', 'cmb2' ),
		'desc'    => esc_html__( 'select copyright background', 'cmb2' ),
		'id'      => 'copyright_bg',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Footer Text Style', 'rs-function' ),
		'desc'             => esc_html__( 'chosse your footer color', 'rs-function' ),
		'id'               => 'footer_select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'footerlight' => esc_html__( 'Light', 'rs-function' ),
			'footerdark' =>  esc_html__( 'Dark', 'rs-function' ),			
		),
	) );
	
}


/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function rs_options_page_message_callback( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'rs-framework' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function rs_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

