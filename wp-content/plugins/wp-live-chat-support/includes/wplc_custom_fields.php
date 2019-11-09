<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( "wplc_pro_update_db_hook", "wplc_custom_fields_tables_mrg" );
function wplc_custom_fields_tables_mrg(){
	global $wpdb;
	global $wplc_custom_fields;
	$wplc_custom_fields = $wpdb->prefix."wplc_custom_fields";
	$sql = "
        CREATE TABLE " . $wplc_custom_fields . " (
          id int(11) NOT NULL AUTO_INCREMENT,
          field_name varchar(700) NOT NULL,
          field_type int(11) NOT NULL,
          field_content varchar(700) NOT NULL,          
          status tinyint(1) NOT NULL,
          PRIMARY KEY  (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
    ";

    dbDelta($sql);
}

function wplc_custom_fields_page(){		

	wplc_enqueue_admin_styles_mrg();


	if ( ( isset( $_GET['wplc_action'] ) && $_GET['wplc_action'] == 'delete_custom_field' ) && isset( $_GET['fid'] ) && ( isset( $_GET['confirmed'] ) && $_GET['confirmed'] == 'true' ) ) {		

		$custom_field_id = sanitize_text_field( $_GET['fid'] );

		if (!isset($_GET['wplc_custom_field_nonce']) || !wp_verify_nonce($_GET['wplc_custom_field_nonce'], 'wplc_custom_field_nonce')){
              wp_die(__("You do not have permission do perform this action", "wplivechat"));
        }

		wplc_delete_custom_field_mrg( $custom_field_id );
	}

	if( isset( $_GET['wplc_action'] ) && $_GET['wplc_action'] == 'add_custom_field' ){

		wplc_custom_fields_add_page_mrg();		

	} else if ( isset( $_GET['wplc_action'] ) && $_GET['wplc_action'] == 'edit_custom_field' ){

		$custom_field_id = sanitize_text_field( $_GET['fid'] );

		wplc_custom_fields_edit_page_mrg( $custom_field_id );		

	} else if ( isset( $_GET['wplc_action'] ) && $_GET['wplc_action'] == 'delete_custom_field' ){

		$custom_field_id = sanitize_text_field( $_GET['fid'] );

		wplc_custom_fields_delete_page_mrg( $custom_field_id );		

	} else {

		wplc_custom_fields_display_page_mrg();

	}	

}

function wplc_custom_fields_display_page_mrg(){

	$wplc_add_button = isset($_GET['wplc_action']) ? "" : "<a href='?page=wplivechat-menu-custom-fields&wplc_action=add_custom_field' class='wplc_add_new_btn'>". __("Add New", 'wp-livechat') ."</a>";

	$content = "<div class='wrap wplc_wrap'>";

	$content .= "<h2>".__('WP Live Chat Support Custom Fields', 'wp-livechat'). $wplc_add_button . "</h2>";

 	$results = wplc_get_all_custom_fields_mrg();  	
	
	$content .= "<table class=\"wp-list-table wplc_list_table widefat fixed \" cellspacing=\"0\" style='width:98%'>";
	$content .= 	"<thead>";
  	$content .= 		"<tr>";
    $content .= 			"<th scope='col'><span>" . __("ID", "wplivechat") . "</span></th>";
    $content .= 			"<th scope='col'><span>" . __("Name", "wplivechat") . "</span></th>";
    $content .= 			"<th scope='col'>" . __("Type", "wplivechat") . "</th>";
    $content .= 			"<th scope='col'>" . __("Content", "wplivechat") . "</th>";
    $content .= 			"<th scope='col'>" . __("Status", "wplivechat") . "</th>";
    $content .= 			"<th scope='col'><span>" . __("Action", "wplivechat") . "</span></th>";
    $content .= 		"</tr>";
  	$content .= 	"</thead>";

  	
  	if($results){

  		foreach ($results as $result) {  			   		

  			$content .= "<tr>";

  			$content .= "<td>".$result->id."</td>";
  			$content .= "<td>".$result->field_name."</td>";
  			$content .= "<td>".wplc_return_custom_field_type_mrg( $result->field_type )."</td>";
  			if( $result->field_type == 0 ){
				$content .= "<td>".$result->field_content."</td>";
  			} else {
  				
  				$current_content = $result->field_content;
  				$current_content = str_replace("\\r", "", $current_content);
  				$current_content = json_decode( stripslashes( $current_content ) );
  				$content .= "<td>";
  				if($current_content !== NULL){
	  				foreach( $current_content as $val ){
	  					$content .= "<span>".$val."</span><br/>";
	  				}
  				}
  				$content .= "</td>";

  			}

  			if( $result->status ){  			
  				$status_string = __("Active", "wplivechat");  		
  			} else {  				
  				$status_string = __("Inactive", "wplivechat");
  			}

  			$content .= "<td>".$status_string."</td>";
  			
  			$wplc_edit_button = "<a href='".admin_url("admin.php?page=wplivechat-menu-custom-fields&wplc_action=edit_custom_field&fid=".$result->id)."' class='button'>".__("Edit", "wplivechat")."</a>";
  			$wplc_delete_button = "<a href='".admin_url("admin.php?page=wplivechat-menu-custom-fields&wplc_action=delete_custom_field&fid=".$result->id)."' class='button'>".__("Delete", "wplivechat")."</a>";
  			
  			$content .= "<td>$wplc_edit_button $wplc_delete_button</td>";

  			$content .= "</tr>";

  		}

  	} else {

  		$content .= "<tr><td colspan='7'>".__("Create your first custom field", "wplivechat")."</td></tr>";

  	}

  	$content .= 	"</table>";

  	$content .= "</div>";

	echo $content;

}

function wplc_custom_fields_add_page_mrg(){

	global $wpdb;

	$wplc_custom_field_nonce = wp_create_nonce('wplc_custom_field_nonce');

	$content = "";
	$content .= "<div class='wrap wplc_wrap'>";
	$content .= "	<h2>".__("Create a Custom Field", "wplivechat")."</h2>";
	$content .= "	<form method='POST'>";
	$content .= "	<table class='wp-list-table wplc_list_table widefat fixed wpgmza-listing'>";		
	$content .= "		<tbody>";
	$content .= "			<tr>";
	$content .= "				<td>".__('Field Name', 'wplivechat')."</td>";
	$content .= "				<td><input type='text' name='wplc_field_name' id='wplc_field_name' style='width: 250px;'/></td>";
	$content .= "			</tr>";
	$content .= "			<tr>";
	$content .= "				<td>".__('Field Type', 'wplivechat')."</td>";
	$content .= "				<td>";
	$content .= "					<select name='wplc_field_type' id='wplc_field_type' style='width: 250px;'>";
	$content .= "						<option value='0'>".__("Text", "wplivechat")."</option>";
	$content .= "						<option value='1'>".__("Drop Down", "wplivechat")."</option>";
	$content .= "					</select>";
	$content .= "				</td>";
	$content .= "			</tr>";	
	$content .= "			<tr id='wplc_field_value_row'>";
	$content .= "				<td>".__('Default Field Value', 'wplivechat')."</td>";
	$content .= "				<td><input type='text' name='wplc_field_value' id='wplc_field_value' style='width: 250px;'/></td>";
	$content .= "			</tr>";
	$content .= "			<tr id='wplc_field_value_dropdown_row' style='display: none;'>";
	$content .= "				<td>".__('Drop Down Contents', 'wplivechat')."</td>";
	$content .= "				<td><textarea name='wplc_drop_down_values' id='wplc_drop_down_values' rows='6' style='width: 250px;'></textarea><br/><small>".__("Enter each option on a new line", "wplivechat")."</small></td>";
	$content .= "			</tr>";
	$content .= "			<tr>";
	$content .= "				<td></td>";
	$content .= "				<td><input type='submit' class='button button-primary' name='wplc_create_custom_field' value='".__('Create Custom Field', 'wplivechat')."' /></td>";
	$content .= "			</tr>";
	$content .= "		</tbody>";
	$content .= "	</table>";
	$content .= "<input name='wplc_custom_field_nonce' type='hidden' value='" . $wplc_custom_field_nonce . "' >";
	$content .= "	</form>";
	$content .= "</div>";
	echo $content;
}	

function wplc_custom_fields_edit_page_mrg( $id ){

	global $wpdb;
	
	$wplc_custom_field_nonce = wp_create_nonce('wplc_custom_field_nonce');


	$wplc_custom_fields_table = $wpdb->prefix."wplc_custom_fields";

	$id = sanitize_text_field( $id );
	
	$sql = "SELECT * FROM $wplc_custom_fields_table WHERE `id` = %d";
	$sql = $wpdb->prepare($sql, $id);
	$result = $wpdb->get_row( $sql );

	if($result){
		$field_content = $result->field_content;
		if( intval($result->field_type) == 1) {
			$field_content = str_replace("[", "", $field_content);
			$field_content = str_replace("\\r", "\n", $field_content);
			$field_content = str_replace("\\n", "\n", $field_content);
			$field_content = str_replace("\"", "", $field_content);
			$field_content = str_replace(",", "\n", $field_content);
			$field_content = str_replace("]", "", $field_content);
		}

		$content = "";
		$content .= "<div class='wrap wplc_wrap'>";
		$content .= "	<h2>".__("Edit a Custom Field", "wplivechat")."</h2>";
		$content .= "	<form method='POST'>";
		$content .= "	<table class='wp-list-table wplc_list_table widefat fixed wpgmza-listing'>";		
		$content .= "		<tbody>";
		$content .= "			<tr>";
		$content .= "				<td>".__('Field Name', 'wplivechat')."</td>";
		$content .= "				<td><input type='text' name='wplc_field_name' id='wplc_field_name' style='width: 250px;' value='".$result->field_name."'/></td>";
		$content .= "			</tr>";
		if( intval($result->field_type) != 1) {
			$content .= "			<tr>";
			$content .= "				<td>".__('Default Field Value', 'wplivechat')."</td>";
			$content .= "				<td><input type='text' name='wplc_field_value' id='wplc_field_value' style='width: 250px;' value='".$field_content."'/></td>";
			$content .= "			</tr>";
		}
		$content .= "			<tr>";
		$content .= "				<td>".__('Field Type', 'wplivechat')."</td>";
		$content .= "				<td>";
		$content .= "					<select name='wplc_field_type' id='wplc_field_type' style='width: 250px;'>";
											if( $result->field_type == 0 ) { $sel = 'selected'; } else { $sel = ''; }
											if( $result->field_type == 1 ) { $sel1 = 'selected'; } else { $sel1 = ''; }
		$content .= "						<option value='0' $sel>".__("Text", "wplivechat")."</option>";
		$content .= "						<option value='1' $sel1>".__("Drop Down", "wplivechat")."</option>";
		$content .= "					</select>";
		$content .= "				</td>";
		$content .= "			</tr>";	

		if( intval($result->field_type) == 1) {
			$content .= "			<tr>";
			$content .= "				<td>".__('Drop Down Contents', 'wplivechat')."</td>";
			$content .= "				<td><textarea name='wplc_drop_down_values' id='wplc_drop_down_values' rows='6' style='width: 250px;'>".$field_content."</textarea><br/><small>".__("Enter each option on a new line", "wplivechat")."</small></td>";
			$content .= "			</tr>";
		}
		$content .= "			<tr>";
		$content .= "				<td></td>";
		$content .= "				<td><input type='submit' class='button button-primary' name='wplc_update_custom_field' value='".__('Update Custom Field', 'wplivechat')."' /></td>";
		$content .= "			</tr>";
		$content .= "		</tbody>";
		$content .= "	</table>";
		$content .= "<input name='wplc_custom_field_nonce' type='hidden' value='" . $wplc_custom_field_nonce . "' >";
		$content .= "	</form>";
		$content .= "</div>";
	} else {
		$content = "";
		$content .= "<div class='wrap wplc_wrap'>";
		$content .= "	<h2>".__("Custom Field Not Found", "wplivechat")."</h2>";
		$content .= "	<a href='". admin_url("admin.php?page=wplivechat-menu-custom-fields")."' class='button button-primary'>".__("Back", "wplivechat")."</a>";
		$content .= "</div>";
	}
	echo $content;

}

function wplc_custom_fields_delete_page_mrg( $id ){

	$wplc_custom_field_nonce = wp_create_nonce('wplc_custom_field_nonce');

	$content = "";

	$content .= "<div class='update-nag'>";
	$content .= "<p>".__("Are you sure you want to delete this custom field?", "wplivechat")."</p>";
	$content .= "<p><a href='".admin_url("admin.php?page=wplivechat-menu-custom-fields&wplc_action=delete_custom_field&fid=$id&confirmed=true&wplc_custom_field_nonce=" . $wplc_custom_field_nonce )."'>".__("Yes", "wplivechat")."</a> | <a href='".admin_url("admin.php?page=wplivechat-menu-custom-fields")."'>".__("No", "wplivechat")."</a></p>";
	$content .= "</div>";

	echo $content;

}

function wplc_delete_custom_field_mrg( $id ){
	global $wpdb; 
	$wplc_custom_fields_table = $wpdb->prefix."wplc_custom_fields";

	$id = intval( $id );

	$wpdb->delete( $wplc_custom_fields_table, array( 'id' => $id ), array( '%d' ) );

	?><script>window.location = "<?php echo admin_url( 'admin.php?page=wplivechat-menu-custom-fields' ); ?>" </script><?php
}

function wplc_get_all_custom_fields_mrg(){
	global $wpdb;
	$wplc_custom_fields = $wpdb->prefix."wplc_custom_fields";

	$sql = "SELECT * FROM $wplc_custom_fields";

	$results = $wpdb->get_results( $sql );

	return $results;
}

function wplc_return_custom_field_type_mrg( $type ){

	$type = intval( $type );

	switch( $type ){
		case 0:
			$val = __("Text Field", "wplivechat");
			break;
		case 1:
			$val = __("Dropdown", "wplivechat");
			break;
		default:
			$val = __("Unknown", "wplivechat");
			break;
	}

	return $val;

}

add_filter( "wplc_start_chat_user_form_after_filter", "wplc_display_custom_fields_in_chatbox_mrg", 11, 2 );

function wplc_display_custom_fields_in_chatbox_mrg( $string ){	
	
	$ret = "";
	$custom_fields = wplc_get_all_custom_fields_mrg();

	if( $custom_fields ){

		foreach( $custom_fields as $field ){

			if( $field->field_type == 0 ){				
				
				$ret .= "<input type='text' name='wplc_custom_field[".$field->id."]' id='wplc_custom_field_".$field->id."' fname='".$field->field_name."' placeholder='".$field->field_content."' />";
			
			} else if( $field->field_type == 1 ){
			
				$ret .= "<select class='wplc_custom_dropdown unselected' name='wplc_custom_field[".$field->id."]' id='wplc_custom_field_".$field->id."' fname='".$field->field_name."'>";
				$content = $field->field_content;
				$content = str_replace("\\r", "", $content);
				$options = json_decode( $content );				

				$ret .= "	<option value='$field->field_name' wplc-holder='true'>".trim( $field->field_name )."</option>";

				if( $options ){
					foreach( $options as $key => $val ){
						$ret .= "	<option value='$val'>".trim( $val )."</option>";
					}
				}

				$ret .= "</select>";

			}

		}

	}

	return $string . $ret;
}

add_filter( "wplc_filter_advanced_info", "wplc_advanced_info_custom_fields_mrg", 10, 4 );

function wplc_advanced_info_custom_fields_mrg( $string, $cid, $name, $chat_data = false ){
    $extra_data = "";
    $content = "";
    $atleast_one_field = false;
    $cid = intval($cid);
    if (!$chat_data) { $chat_data = wplc_get_chat_data( $cid, __LINE__ ); }
    if( $chat_data && $chat_data->other ){
        $extra_data = maybe_unserialize( $chat_data->other );

        if( $extra_data && isset( $extra_data['wplc_extra_data'] ) && isset( $extra_data['wplc_extra_data']['custom_fields'] ) ) {

            $content .= "<br/><div class='admin_visitor_advanced_info admin_agent_rating'>";
            $content .= "<strong>".__("Custom Field Data", "wplivechat")."</strong>";
            $content .= "<hr>";
            $the_extra_data = maybe_unserialize( $extra_data['wplc_extra_data']);
            $the_extra_data = json_decode( stripslashes( $extra_data['wplc_extra_data']['custom_fields'] ) );

            if( $the_extra_data ){
                foreach( $the_extra_data as $data ){
                    $atleast_one_field = true;
                    $content .= "<span class='part1'>".$data->{0}.":</span> <span class='part2'>".$data->{1}."</span><br/>";
                }
            }

            $content .= "</div>";

        }
    }

    if($atleast_one_field){
        return $string . $content;
    }

    return $string;
    
}

add_action( "admin_head", "wplc_custom_fields_admin_head_mrg" );

function wplc_custom_fields_admin_head_mrg(){

	global $wpdb;
	$custom_field_table = $wpdb->prefix."wplc_custom_fields";

	if( ( isset( $_POST['wplc_create_custom_field'] ) || ( isset( $_POST['wplc_update_custom_field'] ) && isset( $_GET['fid'] ) ) ) ){

		$field_name = sanitize_text_field( $_POST['wplc_field_name'] );
		
		$field_type = sanitize_text_field( $_POST['wplc_field_type'] );

		$field_id = intval( sanitize_text_field( isset($_GET['fid']) ? $_GET['fid'] : '' ) );

		if( isset( $_POST['wplc_drop_down_values'] ) && $_POST['wplc_drop_down_values'] != "" && $field_type == 1){

			$dropdown_contents = $_POST['wplc_drop_down_values'];		

			$field_value = explode( "\n", $dropdown_contents );

			if($field_value){
				foreach ($field_value as $key => $value) {
					$field_value[$key] = sanitize_text_field($value);
				}
			}

			$field_value = json_encode( $field_value );

		} else {

			$field_value = sanitize_text_field( $_POST['wplc_field_value'] );
			
		}

		if ( isset( $_POST['wplc_create_custom_field'] ) ) {
			if (!isset($_POST['wplc_custom_field_nonce']) || !wp_verify_nonce($_POST['wplc_custom_field_nonce'], 'wplc_custom_field_nonce')){
	              wp_die(__("You do not have permission do perform this action", "wplivechat"));
	        }
	        
			$wpdb->insert(
				$custom_field_table,
				array(
					'field_name' 	=> $field_name,
					'field_type' 	=> $field_type,
					'field_content'	=> $field_value,
					'status'		=> 1
				),
				array(
					'%s',
					'%s',
					'%s',
					'%d',
				)
			);
		} else if ( isset( $_POST['wplc_update_custom_field'] ) ) {
			if (!isset($_POST['wplc_custom_field_nonce']) || !wp_verify_nonce($_POST['wplc_custom_field_nonce'], 'wplc_custom_field_nonce')){
	              wp_die(__("You do not have permission do perform this action", "wplivechat"));
	        }

			$wpdb->update(
				$custom_field_table,
				array(
					'field_name' 	=> $field_name,
					'field_type' 	=> $field_type,
					'field_content'	=> $field_value,
					'status'		=> 1
				),
                array( 'id' => $field_id ),
				array(
					'%s',
					'%s',
					'%s',
					'%d',
				),
                array( '%d' )
			);
        }

		?><script>window.location = "<?php echo admin_url( 'admin.php?page=wplivechat-menu-custom-fields' ); ?>" </script><?php

	}

}


add_filter("wplc_start_chat_hook_other_data_hook", "wplc_custom_fields_start_chat_other_data_hook_mrg", 15, 1);

function wplc_custom_fields_start_chat_other_data_hook_mrg($other_data){
	if(isset($_POST['wplc_extra_data']) && isset($_POST['wplc_extra_data']['custom_fields'])){
		$other_data['wplc_extra_data']['custom_fields'] = sanitize_text_field($_POST['wplc_extra_data']['custom_fields']);
	}
	return $other_data;
}


add_action("wplc_api_route_hook", "wplc_custom_field_rest_end_points_mrg");
function wplc_custom_field_rest_end_points_mrg(){
    register_rest_route('wp_live_chat_support/v1', '/get_custom_field_info', array(
                        'methods' => 'GET, POST',
                        'callback' => 'wplc_custom_field_rest_get_info_mrg'
    ));
}

function wplc_custom_field_rest_get_info_mrg(WP_REST_Request $request){
	$request = wplc_api_sanitize_request_params($request);
	
    $return_array = array();
    if(isset($request)){
        if(isset($request['security'])){
            $check_token = get_option('wplc_api_secret_token');
            if($check_token !== false && $request['server_token'] === $check_token){
                if(isset($request['cid'])){
                    $cid = $request['cid'];
                    if( ! filter_var($cid, FILTER_VALIDATE_INT) ) {
                        $cid = wplc_return_chat_id_by_rel($cid);
                    }

                    $html = wplc_advanced_info_custom_fields_mrg("", $cid, "", false);

                    $return_array['response'] = "Success";
                    $return_array['code'] = "200";
                    $return_array['data'] = $html;
                    
                 } else {
                    $return_array['response'] = "No 'cid' found";
                    $return_array['code'] = "401";
                    $return_array['requirements'] = array("security" => "YOUR_SECRET_TOKEN",
                                                      "cid"   => "Chat ID");
                }
             } else {
                $return_array['response'] = "Nonce is invalid";
                $return_array['code'] = "401";
            }
        } else{
            $return_array['response'] = "No 'security' found";
            $return_array['code'] = "401";
            $return_array['requirements'] = array("security" => "YOUR_SECRET_TOKEN",
                                              "cid"   => "Chat ID");
        }
    }else{
        $return_array['response'] = "No request data found";
        $return_array['code'] = "400";
        $return_array['requirements'] = array("security" => "YOUR_SECRET_TOKEN",
                                          "cid"   => "Chat ID");
    }
    
    return $return_array;
}